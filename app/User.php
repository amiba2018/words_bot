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

    //メンションがある場合はwebhookで返す
    public static function getWordSend($request) {
        $mention = Word::getMention($request);
        $word_id = Word::getRandomWordId($request, $mention);
        $word = Word::findOrFail($word_id[0]['id']);
        $user = new User();
        $user->notify(new SlackNotification($mention .mb_substr($word->word, 2)));
    }

    public function routeNotificationForSlack($notification)
    {
        return env('SLACK_URL');
    }
}
