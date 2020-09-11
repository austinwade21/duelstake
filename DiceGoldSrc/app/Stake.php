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
class Stake extends Model
{
    protected $table = 'stakes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users', 'amount', 'currency_id',
        'commission', 'fee', 'profit', 'won', 'winner_id', 'loser_id',
    ];


    /**
     * Description: Convert SocialData records to array of name/value
     * @param array[SocialData] $socialData
     * @return array
     */
    public static function convertProperties($messages)
    {
        $properties = [];
        foreach ($messages as $message) {
            $properties[$message->property_name] = $message->property_value;
        }
        return $properties;
    }

    // Relationships
    protected $with = ['currency', 'winner', 'loser', ];

    public function scopeByWinner($q, $winner)
    {
        $q->where('winner_id', $winner);
    }

    public function scopeByLoser($q, $loser)
    {
        $q->where('winner_id', $loser);
    }

    public function winner()
    {
        return $this->belongsTo(User::class, 'winner_id')->select(['id', 'user_name', 'avatar', 'hide_user_name']);
    }

    public function loser()
    {
        return $this->belongsTo(User::class, 'loser_id')->select(['id', 'user_name', 'avatar', 'hide_user_name']);
    }

    public function currency()
    {
        return $this->belongsTo(Item::class, 'currency_id');
    }
}