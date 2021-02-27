<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;

class TimelineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tweets = Tweet::orderBy('id', 'DESC')->get();
        
        return view('timeline.index', compact('tweets'));
    }

}
