<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SocialData;

class SocialProvider extends Model
{
    protected $table = 'social_providers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'url',
    ];

    public function properties(){
        return $this->belongsTo('\App\SocialData', 'social_id');
    }

    public function users(){
        return $this->belongsToMany('\App\User', 'social_data', 'social_id', 'user_id');
    }
}
