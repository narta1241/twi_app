<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    use \LaravelTreats\Model\Traits\HasCompositePrimaryKey;
    
    public $incrementing = false;
    
    protected $primaryKey = ['followed_user_id', 'following_user_id'];
    
    protected $fillable = ['followed_user_id', 'following_user_id'];
    
    public function user_followed()
    {
        return $this->belongsTo('App\User','followed_user_id');
    }
    
    public function user_following()
    {
        return $this->belongsTo('App\User','following_user_id');
    }
    
    
}
