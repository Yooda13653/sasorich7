<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Event;
use DB;
use App\Food;

class FoodController extends Controller
{
    public function index()
    {
        $foods = new Food;
        $foodeat=[];
        $user_id=\Auth::user()->id;
        $food=[];
        $results=DB::select("select foodseaten from foods where user_id = $user_id");
        for ($i=0; $i<count($results);$i++) {
            array_push($foodeat, $results[$i]->foodseaten);
        }
        
        return view('food', [
            'foodeat' => $foodeat,
            'foods' => $foods,
            
        ]);
    }
    
    public function store(Request $request)
    {
        
        $foods = new Food;
        $user_id = \Auth::user()->id;
        $foods->foodseaten = $request->foodseaten;
       
        $foods->user_id = $user_id;
        $foods->save();
        
        $foodeat=[];
        $user_id=\Auth::user()->id;
        $food=[];
        $results=DB::select("select foodseaten from foods where user_id = $user_id");
        for ($i=0; $i<count($results);$i++) {
            array_push($foodeat, $results[$i]->foodseaten);
        }
        
        return view('food', [
            'foodeat' => $foodeat,
            'foods' => $foods,
            
        ]);
        

    }
    
    public function match(){
        $user_id = \Auth::user()->id;
        $foodeat=[];
        $id=[];
        $matchuser=[];
        $namesmatch+[];
        $results=DB::select("select foodseaten from foods where user_id = $user_id");
        for ($i=0; $i<count($results);$i++) {
            array_push($foodeat, $results[$i]->foodseaten);
        }
        foreach($foodeat as $foodeat){
                 $matchuser=DB::select("select `user_id` from `foods` where `foodseaten` = '$foodeat'");
        }
         
        for ($i=0; $i<count($matchuser);$i++) {
            array_push($id, $matchuser[$i]->user_id);
        }
        
        foreach($id as $id){
                 $namesmatch=DB::select("select `names` from `users` where `user_id` = '$id'");
        }
        var_dump($namesmatch);exit;
        
        
        return view('match'); 
    }

}
