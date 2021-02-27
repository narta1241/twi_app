<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use Illuminate\Support\Facades\Auth;

class RetweetController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         $retweet = Tweet::where('id', $request->input('tweet_id'))->first();
        // dd($retweet);
        //  if ($retweet)  {
            
        //     return redirect()->route('timeline.index');
        // } else {
            return view('retweet.create', compact('retweet'));
        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        Tweet::create([
            'text' => $request->input('text'),
            'user_id' => $request->input('user_id'),
            'retweet_flg' => 1,
            'parent_tweet_id' => $request->input('tweet_id'),
        ]);
        // if($request->input('tweet_id')==NULL){
        //     Tweet::update([
        //         'parent_tweet_id' => ' '
        //         ]);
        // }
       
        
       return redirect()->route('timeline.index');
    }

    
}
