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
class Character extends Model
{
    protected $table = 'characters';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'owner_id', 'account_status', 'user_name',
        'item_chestplate_id', 'item_legs_id', 'item_gloves_id', 'item_helmet_id', 'item_shoulder_id', 'item_boots_id',
        'item_cape_id', 'character_gender', 'character_skin', 'character_hairstyle', 'character_haircolor',
        'character_weapon', 'character_wins', 'character_losses'
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
    protected $with = ['owner', 'item_chestplate', 'item_legs', 'item_gloves', 'item_helmet', 'item_shoulder',
        'item_boots', 'item_cape',];

    public function scopeByOwner($q, $owner)
    {
        $q->where('owner_id', $owner);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id')->select(['id', 'user_name', 'avatar', 'hide_user_name']);
    }

    public function item_chestplate()
    {
        return $this->belongsTo(Item::class, 'item_chestplate_id')->select(['id', 'name', 'item_2d', 'item_3d', 'price', 'is_buyable']);
    }
    public function item_legs()
    {
        return $this->belongsTo(Item::class, 'item_legs_id')->select(['id', 'name', 'item_2d', 'item_3d', 'price', 'is_buyable']);
    }
    public function item_gloves()
    {
        return $this->belongsTo(Item::class, 'item_gloves_id')->select(['id', 'name', 'item_2d', 'item_3d', 'price', 'is_buyable']);
    }
    public function item_helmet()
    {
        return $this->belongsTo(Item::class, 'item_helmet_id')->select(['id', 'name', 'item_2d', 'item_3d', 'price', 'is_buyable']);
    }
    public function item_shoulder()
    {
        return $this->belongsTo(Item::class, 'item_shoulder_id')->select(['id', 'name', 'item_2d', 'item_3d', 'price', 'is_buyable']);
    }
    public function item_boots()
    {
        return $this->belongsTo(Item::class, 'item_boots_id')->select(['id', 'name', 'item_2d', 'item_3d', 'price', 'is_buyable']);
    }
    public function item_cape()
    {
        return $this->belongsTo(Item::class, 'item_cape_id')->select(['id', 'name', 'item_2d', 'item_3d', 'price', 'is_buyable']);
    }
}