<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

/**
 * @group Contratos
 *
 * Enpoints para manipulação de contratos
 */

class pokedex extends Controller
{
    public function index(){
        $response = Http::get('https://pokeapi.co/api/v2/pokemon/2/');
        return view('index', ['resposta' => $response]);
    }


    /**
     * Endpoint de teste
     *
     * Check that the service is up. If everything is okay, you'll get a 200 OK response.
     *
     * Otherwise, the request will fail with a 400 error, and a response listing the failed services.
     *
     * @urlParam id float required The ID of the post.
     * @urlParam razao_social required Razao social do contrato
     *
     * @response 400 scenario="Service is unhealthy" {"status": "down", "services": {"database": "up", "redis": "down"}}
     * @responseField status The status of this API (`up` or `down`).
     * @responseField services Map of each downstream service and their status (`up` or `down`).
     */

    public static function getPikachu($id) {


       $response = Http::get('https://pokeapi.co/api/v2/pokemon/'.$id);
       $pokemon = json_decode($response, true); //transforma o json em array
        $data = [ //array contendo as informaçoes que eu quero pegar da api
            'name' => Arr::get($pokemon, 'forms.0.name'), //informação
            'height' => Arr::get($pokemon, 'height') //informação
        ];
        return view('index', ['resposta' => $data]); //retorna essa informação na view com os dados que eu selecionei

    }

    public static function jsonpokemon() {
        return [
            'json' => [
                'name',
                'height'

            ]
        ];


    }


}
