<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\SocialData;

/**
 * Class User
 * @package App
 * @property integer $id
 * @property string $user_name
 * @property string $email
 * @property int $email_verified_at @description timestamp email verified
 * @property boolean $hide_user_name
 * @property array $bets
 * @property array $messages
 * @property array $social
 * @property string $avatar
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 'email', 'password', 'email_verified_at', 'hide_user_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function social(){
        return $this->belongsTo(SocialData::class);
    }

    public function bets(){
        return $this->hasMany(Bet::class);
    }

    public function messages(){
        return $this->hasMany(Message::class, 'receiver_id');
    }
}
