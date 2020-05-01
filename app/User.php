<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Word;
use App\Notifications\SlackNotification;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    //メンションがある場合はwebhookで返す
    public static function getWordSend($request) {
        $mension = Word::getMention($request);
        $word_id = Word::getRandomWordId($request, $mension);
        $word = Word::findOrFail($word_id[0]['id']);
        $user = new User();
        $user->notify(new SlackNotification($mension .mb_substr($word->word, 2)));
    }


    public function routeNotificationForSlack($notification)
    {
        return env('SLACK_URL');
    }
}
