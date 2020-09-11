<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property boolean $is_public
 * @property string $sender
 * @property string $receiver
 * @property int $user_id
 * @property int $receiver_id
 * @property string $message
 * @property string $created_at datetime created
**/
class Currency extends Model
{
    protected $table = 'currencies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'label', 'icon', 'price',
    ];


    /**
     * Description: Convert SocialData records to array of name/value
     * @param array[SocialData] $socialData
     * @return array
     */
    public static function convertProperties($items)
    {
        $properties = [];
        foreach ($items as $item) {
            $properties[$item->property_name] = $item->property_value;
        }
        return $properties;
    }

}