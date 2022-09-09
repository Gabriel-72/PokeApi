<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class pokedex extends Controller
{
    public function index(){
        $response = Http::get('https://pokeapi.co/api/v2/pokemon/1/');
        dd($response)->json();
    }

    public function GetPikachu($id) {

        $response = Http::get('https://pokeapi.co/api/v2/pokemon/'.$id);

        return $response;
    }

}
