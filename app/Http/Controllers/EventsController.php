<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Event;
use App\User;
use DB;

class EventsController extends Controller
{
    
    public function index()
    {
        $events = Event::all();
        $users = User::all();
        $a = $events->toArray();
            
        return view('index', [
            'events' => $events,
            'users' => $users,
                        'a' => $a,
        ]);
    }
    
    public function show($id)
    {
        $events = Event::find($id);
        $userid=[];
        $name=[];
        $results=DB::select("select user_id from event_user where event_id = $id");
        for ($i=0; $i<count($results);$i++) {
            array_push($userid, $results[$i]->user_id);
        }
        foreach($userid as $userid){
            $results=DB::select("select name from users where id = $userid");
            for ($i=0; $i<count($results);$i++) {
                array_push($name, $results[$i]->name);
            }
        }
        
        return view('show', [
            'events' => $events,
            'name' => $name,
        ]);
    }
    
    public function create()
    {
        $events = new Event;

        return view('create', [
            'events' => $events,
        ]);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:100',
            'day' => 'required|date',
            'timefrom' => 'required|string',
            'timeto' => 'required|string',
            'place' => 'required|string',
            'theme' => 'required|string|max:100',
            'details' => 'required|string|max:500',
            'maxpeople' => 'required|integer|max:100',
        ]);
        $event = new Event;
        $event->title = $request->title;
        $event->day = $request->day;
        $event->timefrom = $request->timefrom;
        $event->timeto = $request->timeto;
        $event->place = $request->place;
        $event->theme = $request->theme;
        $event->details = $request->details;
        $event->maxpeople = $request->maxpeople;
        $event->host = \Auth::user()->name;
        
        $event->save();
        
        return redirect('/');

    }
    
    public function edit($id)
    {
        $category = Category::find($id);

        return view('categories.edit', [
            'categories' => $categories,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $event->title = $request->title;
        $event->day = $request->day;
        $event->timefrom = $request->timefrom;
        $event->timeto = $request->timeto;
        $event->place = $request->place;
        $event->theme = $request->theme;
        $event->details = $request->details;
        $event->maxpeople = $request->maxpeople;
        $event->save();

        return redirect('/');
    }
    
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        
        return redirect('/');
    }
    
    public function createpage()
    {
        $events = Event::all();
        $users = User::all();
        $a = $events->toArray();
        
        return view('create', [
            'events' => $events,
            'users' => $users,
            'a' => $a,
        ]);
    }
    
    public function top(){
        return redirect('/');
    }
    
    public function profile(){
        $id=\Auth::user()->id;
        $events = Event::find($id);
        $userid=[];
        $name=[];
        $results=DB::select("select event_id from event_user where user_id = $id");
        for ($i=0; $i<count($results);$i++) {
            array_push($userid, $results[$i]->event_id);
        }
        foreach($userid as $userid){
            $results=DB::select("select title from events where id = $userid");
            for ($i=0; $i<count($results);$i++) {
                array_push($name, $results[$i]->title);
            }
        }
        
        
        $events = Event::all();
        $users = User::all();
        $a = $events->toArray();
        return view('profile', [
            'events' => $events,
            'users' => $users,
            'a' => $a,
            'name' => $name,
        ]);
    }
}
