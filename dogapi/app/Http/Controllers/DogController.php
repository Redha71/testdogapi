<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DogController extends Controller
{
    public function index(){

        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, 'https://dog.ceo/api/breeds/list/all');
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        $jsonData = json_decode(curl_exec($curlSession));
        curl_close($curlSession);

        return view('dog',compact('jsonData'));


    }
    public function randomBreed(){
        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, 'https://dog.ceo/api/breeds/image/random');
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        $jsonData = json_decode(curl_exec($curlSession));

           return view('randombreed',compact('jsonData'));
    }
    public function getbreedlist(){
        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, 'https://dog.ceo/api/breeds/list/all');
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        $jsonData = json_decode(curl_exec($curlSession));
        curl_close($curlSession);

        return view('selectbreedimage',compact('jsonData'));
    }

    public function selectBreedImage(Request $request){
        $breed =$request->breed;
        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, 'https://dog.ceo/api/breeds/list/all');
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        $jsonData = json_decode(curl_exec($curlSession));
        curl_close($curlSession);

 $image='public/image/dog.png';
        if(isset($breed)){
            $curlSession = curl_init();
            curl_setopt($curlSession, CURLOPT_URL, 'https://dog.ceo/api/breed/'.$breed.'/images/random');
            curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
            curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

            $image = json_decode(curl_exec($curlSession));

        }

        return view('selectbreedimage',compact('jsonData','image'));
    }

}
