<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DogController extends Controller
{
      /**
     * Show the list dog.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, 'https://dog.ceo/api/breeds/list/all');
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
        $jsonData = json_decode(curl_exec($curlSession));
        curl_close($curlSession);

        return view('dog',compact('jsonData'));


    }
      /**
     * Show the list random dog.
     *
     * @return \Illuminate\Http\Response
     */
    public function randomBreed(){
        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, 'https://dog.ceo/api/breeds/image/random');
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        $jsonData = json_decode(curl_exec($curlSession));

           return view('randombreed',compact('jsonData'));
    }
     /**
     * Show the list dog list.
     *
     * @return \Illuminate\Http\Response
     */
    public function getbreedlist(){
        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, 'https://dog.ceo/api/breeds/list/all');
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        $jsonData = json_decode(curl_exec($curlSession));
        curl_close($curlSession);

        return view('selectbreedimage',compact('jsonData'));
    }
    /**
     * Show the select dog.
     *
     * @return \Illuminate\Http\Response
     */
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
    /**
     * Show the save breed in table.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveBreed(){
        $checkbreed=DB::table('breeds')->get();
        if($checkbreed->isEmpty()){
            $curlSession = curl_init();
            curl_setopt($curlSession, CURLOPT_URL, 'https://dog.ceo/api/breeds/list/all');
            curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
            curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
            $jsonData = json_decode(curl_exec($curlSession));
            curl_close($curlSession);
            $data=array();
            foreach ($jsonData->message as $key=>$message){
                $data['breed']=$key;
                   foreach($message as $item){
                       if($item){
                        $data['sub_breed']=$item;
                       }
                    }
                        $imageSession = curl_init();
                        curl_setopt($imageSession, CURLOPT_URL, 'https://dog.ceo/api/breed/'.$key.'/images/random');
                        curl_setopt($imageSession, CURLOPT_BINARYTRANSFER, true);
                        curl_setopt($imageSession, CURLOPT_RETURNTRANSFER, true);
                        $image = json_decode(curl_exec($imageSession));
                        curl_close($imageSession);
                        $data['image']=$image->message;

                       $savebreed=DB::table('breeds')->insert($data);
                   }

        }else{
            $getbreed=DB::table('breeds')->get();
            return view('savebreed',compact('getbreed'));
        }



    }
    public function userBSelect(){

        return view('userbreed');
    }
    public function saveBUser(Request $request){
        $userid = $request->user;
       $checkUser= DB::table('user_favourite_breeds')->where('user_id',$userid)->where('breed_id',$request->breed)->get();

       if($checkUser->isEmpty()){
        $data=array();
        $data['user_id']=$request->user;
        $data['location_id']=$request->location;
        $data['breed_id']=$request->breed;
        $UsBSave = DB::table('user_favourite_breeds')->insert($data);
       }

             return view('userbreed');

    }

}




