<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use \LaravelTreats\Model\Traits\HasCompositePrimaryKey;
    
    public $incrementing = false;
    
    protected $primaryKey = ['user_id', 'tweet_id'];
    // created_at, updated_atを使わない
    //  public $timestamps = false;
    
    protected $fillable = ['user_id', 'tweet_id'];
    
    public function tweet()
    {
        return $this->belongsTo('App\Tweet');
    }
}