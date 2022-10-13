<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class pokedex extends Controller
{
    public function index(){
        $response = Http::get('https://pokeapi.co/api/v2/pokemon/2/');
        return view('index', ['resposta' => $response]);
    }

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
