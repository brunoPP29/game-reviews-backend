<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class GamesAPIService
{
    public string $apiKey;

    public function __construct()
    {
        $this->apiKey = env('API_KEY');
    }

    public function searchByName($search, $page)
    {
        $cacheKey = "games_search_{$search}_{$page}";

        return Cache::remember($cacheKey, 1440, function () use ($search, $page) {
            $ch = curl_init();
            curl_setopt_array($ch, [
                CURLOPT_URL => 'https://api.thegamesdb.net/v1/Games/ByGameName?apikey=' . $this->apiKey . '&name=' . $search . '&page=' . $page,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 10,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => [
                    'Accept: application/json'
                ],
            ]);

            $response = curl_exec($ch);

            if ($response === false) {
                dd(curl_error($ch));
            }

            curl_close($ch);

            return json_decode($response, true);
        });
    }

    public function getGameInfos($idGame)
    {
        $cacheKey = "game_infos_{$idGame}";

        return Cache::remember($cacheKey, 1440, function () use ($idGame) {
            $response = Http::timeout(30)
                ->retry(3, 1000)
                ->acceptJson()
                ->get('https://api.thegamesdb.net/v1/Games/ByGameID', [
                    'apikey' => $this->apiKey,
                    'id'     => $idGame,
                ]);

            if ($response->failed()) {
                dd($response->body());
            }

            $data = $response->json();

            $platformId  = $data['data']['games'][0]['platform'] ?? 0;
            $developerId = $data['data']['games'][0]['developers'][0] ?? 0;

            $developerName = $this->getDeveloperName($developerId);
            $platformName  = $this->getPlatformName($platformId);

            return [$data, $developerName, $platformName];
        });
    }

    public function getDeveloperName($developerId)
    {
        $cacheKey = "developers_list";

        $data = Cache::remember($cacheKey, 1440, function () {
            $response = Http::timeout(30)
                ->retry(3, 1000)
                ->acceptJson()
                ->get('https://api.thegamesdb.net/v1/Developers', [
                    'apikey' => $this->apiKey
                ]);

            if ($response->failed()) {
                dd($response->body());
            }

            return $response->json();
        });

        return $data['data']['developers'][$developerId]['name'] ?? 'N/A';
    }

    public function getPlatformName($plataformId)
    {
        $cacheKey = "platforms_list";

        $data = Cache::remember($cacheKey, 1440, function () {
            $response = Http::timeout(30)
                ->retry(3, 1000)
                ->acceptJson()
                ->get('https://api.thegamesdb.net/v1/Platforms', [
                    'apikey' => $this->apiKey
                ]);

            if ($response->failed()) {
                dd($response->body());
            }

            return $response->json();
        });

        return $data['data']['platforms'][$plataformId]['name'] ?? 'N/A';
    }

    public function getGameName($gameId)
    {
        $cacheKey = "game_name_{$gameId}";

        return Cache::remember($cacheKey, 1440, function () use ($gameId) {
            $response = Http::timeout(30)
                ->retry(3, 1000)
                ->acceptJson()
                ->get('https://api.thegamesdb.net/v1/Games/ByGameID', [
                    'apikey' => $this->apiKey,
                    'id'     => $gameId,
                ]);

            if ($response->failed()) {
                dd($response->body());
            }

            $data = $response->json();
            return $data['data']['games'][0]['game_title'] ?? 'N/A';
        });
    }
}

