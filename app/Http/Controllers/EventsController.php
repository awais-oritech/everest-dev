<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
class EventsController extends Controller
{
    public function index()
    {
        $events = Events::paginate(5);
        return view('site.home.events',['events'=>$events]);
    }
}
