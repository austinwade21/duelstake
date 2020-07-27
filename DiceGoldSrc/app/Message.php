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
class Message extends Model
{
    protected $table = 'messages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'receiver_id', 'message', 'is_public',
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
    protected $with = ['sender', 'receiver'];

    public function scopeBySender($q, $sender)
    {
        $q->where('sender_id', $sender);
    }

    public function scopeByReceiver($q, $sender)
    {
        $q->where('receiver_id', $sender);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'user_id')->select(['id', 'user_name', 'avatar', 'hide_user_name']);
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id')->select(['id', 'user_name', 'avatar', 'hide_user_name']);
    }
}