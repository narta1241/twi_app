<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    // 許可したパラメータ
    protected $fillable = ['user_id', 'text', 'parent_tweet_id', 'retweet_flg'];
    
    /**
     * いいね一覧情報
     */
    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }
    
     public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function parents($parent)
    {
        $tweet = Tweet::where('id', $parent)->value('text');
        // dd($tweet);
        return $tweet;
    }
    public function retweet_count($parent)
    {
        if($parent != 0){
            $tweet = Tweet::where('parent_tweet_id', $parent)->get();
            $tweet = count($tweet);
        }else{
            $tweet = 0;
        }
        // dd($tweet);
        return $tweet;
    }
}