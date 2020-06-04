<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SocialProvider;

class SocialData extends Model
{
    protected $table = 'social_data';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'social_id', 'property_name', 'property_value'
    ];


    /**
     * Description: Convert SocialData records to array of name/value
     * @param array[SocialData] $socialData
     * @return array
     */
    public static function convertProperties($socialData){
        $properties = [];
        foreach ($socialData as $socialDatum) {
            $properties[$socialDatum->property_name] = $socialDatum->property_value;
        }
        return $properties;
    }

    // Relationships
    public function user(){
        return $this->hasOne('\App\User');
    }

    public function social(){
        return $this->hasOne('\App\SocialProvider');
    }
}
