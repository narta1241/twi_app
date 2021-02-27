<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favorites = Favorite::where('user_id', Auth::id())->get();
        // dd($favorites);
        return view('favorites.index', compact('favorites'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // いいねを取得する
        $favorite = Favorite::where('user_id', Auth::id())
            ->where('tweet_id', $request->input('tweet_id'))
            ->first();
        // 既にいいねされている場合
        if ($favorite)  {
            $favorite->delete();
        //  dump($favorite);
        //     exit;
        // いいねされていない場合
        } else {
            Favorite::create([
                'tweet_id' => $request->input('tweet_id'),
                'user_id' => Auth::id(),
            ]);
        }
        
        return redirect()->route('tweets.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favorite $favorite)
    {
        $favorite->delete();
    }
}
