<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Event;
use DB;

class MemberController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    public function show($id)
    {
        $user = User::find($id);
        $events = $user->events()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'events' => $events,
        ];
        

        $data += $this->counts($user);

        return view('users.show', $data);
    }
    
    
    public function sanka($event_id){
        //var_dump($event_id);exit;
        $user_id = \Auth::user()->id;
        if(DB::select("select * from event_user where user_id = $user_id and event_id = $event_id" )){
            DB::delete("delete from event_user where `user_id` = $user_id and `event_id` = $event_id");
        }else{
        $a = Event::find($event_id);
        $a->users()->attach($user_id);
        }
        return redirect('/');
    }
    
    public function unsanka($event_id){
        $user_id = \Auth::user()->id;
        DB::delete("delete * from event_user where user_id = $user_id and event_id = $event_id");
        return redirect('/');
    }
}