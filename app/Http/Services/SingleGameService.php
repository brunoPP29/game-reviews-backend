<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;

class SingleGameService{
    public string $apiKey;
    public function __construct()
    {
        $this->apiKey = env('API_KEY');
    }

    public function getGameInfos($idGame){

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


            //variaveis que precisam de outra busca
            $plataformId = $response['data']['games'][0]['platform'] ?? 0;
            $developerId = $response['data']['games'][0]['developers'][0] ?? 0;
            ///////////////////
                //platform GET
                //tem que pegar a lista de todas as plataformas e pegar o id, mas carregar tudo...
                //mesma coisa com o developer
                //pessima api pra ter que pegar todos os dados, poderia ter um endpoint que pegava literalmente todas as infos, enquanto tivesse
                //outra que pegava mais filtrado sem tantos dados, pra um display mais simples, porem pra uma single page ter que fazer
                //todos esses processos eh mt nada aver, ou to deixando passar algo bem burro e simples........ esperoq  nao
            $developerName = $this->getDeveloperName($developerId);
            $platformName = $this->getPlatformName($plataformId);
            return array($data, $developerName, $platformName);
    }



    public function getDeveloperName($developerId){
        $response = Http::timeout(30)
            ->retry(3, 1000)
            ->acceptJson()
            ->get('https://api.thegamesdb.net/v1/Developers', [
                'apikey' => $this->apiKey
            ]);

        if ($response->failed()) {
            dd($response->body());
        }
        
        $data = $response->json();
        return $data['data']['developers'][$developerId]['name'] ?? 'N/A';
    }

    public function getPlatformName($plataformId){
        $response = Http::timeout(30)
            ->retry(3, 1000)
            ->acceptJson()
            ->get('https://api.thegamesdb.net/v1/Platforms', [
                'apikey' => $this->apiKey
            ]);

            if ($response->failed()) {
            dd($response->body());
        }
        
        $data = $response->json();
        return $data['data']['platforms'][$plataformId]['name'] ?? 'N/A';
        
        }

        public function getGameName($gameId){
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
        
        }
}