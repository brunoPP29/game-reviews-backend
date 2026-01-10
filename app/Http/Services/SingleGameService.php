<?php

namespace App\Http\Services;

class SingleGameService{
    public function getGameInfos($idGame){
        $apikey = env('API_KEY');
            $ch = curl_init();
            curl_setopt_array($ch, [
                CURLOPT_URL => 'https://api.thegamesdb.net/v1/Games/ByGameID?apikey='.$apikey.'&id='.$idGame,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 10,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => [
                    'Accept: application/json'
                ],
            ]);

            $response = curl_exec($ch);

            $response = json_decode($response, true);


            //variaveis que precisam de outra busca
            $plataformId = $response['data']['games'][0]['platform'];
            $developer = $response['data']['games'][0]['developers'][0];
            ///////////////////
            curl_close($ch);

            if ($response === false) {
                dd(curl_error($ch));
            }
                //platform GET
                //tem que pegar a lista de todas as plataformas e fazer uma filtragem pelo id
                //mesma coisa com o developer
                //pessima api pra ter que pegar todos os dados, poderia ter um endpoint que pegava literalmente todas as infos, enquanto tivesse
                //outra que pegava mais filtrado sem tantos dados, pra um display mais simples, porem pra uma single page ter que fazer
                //todos esses processos eh mt nada aver, ou to deixando passar algo bem burro e simples........ esperoq  nao
    }
}