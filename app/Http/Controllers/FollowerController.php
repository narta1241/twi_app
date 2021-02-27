<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follower;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        switch($request->input('pattern')){
            case 'following':
                $followers = Follower::where('following_user_id', Auth::id())->get();
                return view('followers.following', compact('followers'));
            case 'followed':
                $followers = Follower::where('followed_user_id', Auth::id())->get();
                        //  dd($followers);
                return view('followers.followed', compact('followers'));
            default:
                
        }
        
        
        
        // if($pattern = 'following'){
        //     $followers = Follower::where('following_user_id', Auth::id())
        //                 ->get();
        //                 dd($pattern);
        //     return view('followers.following', compact('followers'));
        // }else{
        //     $followers = Follower::where('followed_user_id')
        //                 ->get();
        //                 dd($pattern);
        //     return view('followers.followed', compact('followers'));
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
        //フォロー情報を取得する
        $follow = Follower::where('following_user_id', Auth::id())
             ->where('followed_user_id', $request->input('followed_user_id'))
            ->first();
        
        // 既にフォローされている場合$follow
        if ($follow)  {
            // dd($follow);
            $follow->delete();
        // フォローされていない場合
        } else {
            // dd($follow);
            Follower::create([
                'followed_user_id' => $request->input('followed_user_id'),
                'following_user_id' => Auth::id(),
            ]);
            
        }
        
        return redirect()->route('users.index');
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
        //
    }
}
