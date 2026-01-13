<?php

namespace App\Http\Services;

use App\Models\Review;

class SearchService{
    public function searchByName($search, $page){
            $apikey = env('API_KEY');
            $ch = curl_init();
            curl_setopt_array($ch, [
                CURLOPT_URL => 'https://api.thegamesdb.net/v1/Games/ByGameName?apikey='.$apikey.'&name=' . $search.'&page='.$page,
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
            $apikey = '';

            return json_decode($response, true);
    }

}