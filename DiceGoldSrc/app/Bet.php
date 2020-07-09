<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Bet
 * @package App
 */
class Bet extends Model
{
    protected $table = 'bets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'bet_amount', 'payout', 'chance', 'game_number', 'game_type', 'roll', 'profit',
    ];


    /**
     * Description: Convert SocialData records to array of name/value
     * @param array[SocialData] $socialData
     * @return array
     */
    public static function convertProperties($bets){
        $properties = [];
        foreach ($bets as $bet) {
            $properties[$bet->property_name] = $bet->property_value;
        }
        return $properties;
    }

    // Relationships
    public function user(){
        return $this->belongsTo(User::class);
    }
}
