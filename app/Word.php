<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\WordsController;
use App\Notifications\SlackNotification;

class Word extends Model
{
    protected $fillable = ['word'];

    public static function isExistMention($request) {
        if(is_null($request['text'])) {
            return false;
        }
        if(mb_strpos($request['text'],"<@")===false) {
            return false;
        }
        return true;
    }
    //入力されたメンションを切り取って、取得する
    public static function getMention($request) {
        $left_cut_position = mb_strpos($request['text'], "<@");
        $right_cut_position = mb_strpos($request['text'], ">") + 1;
        $mention = mb_substr($request['text'], $left_cut_position, $right_cut_position);
        return $mention;
    }
    //発話された内容に従って、wordsテーブルからランダムなidを取得する
    public static function getRandomWordId($request, $mention=null) {
        if(mb_strpos($request->text,WordsController::COMMAND_TYPE_COMPLIMENT)!== false) {
            $word_ids = Word::where('word', 'LIKE', "%1:%")->get(['id'])->random(1);
        }
        if(mb_strpos($request->text,WordsController::COMMAND_TYPE_YELL)!== false) {
            $word_ids = Word::where('word', 'LIKE', "%2:%")->get(['id'])->random(1);
        }
        if(mb_strpos($request->text,WordsController::COMMAND_TYPE_LORD)!== false) {
            $word_ids = Word::where('word', 'LIKE', "%3:%")->get(['id'])->random(1);
        }
        if($request->text === $mention) {
            $word_ids = Word::get(['id'])->random(1);
        }
        return $word_ids;
    }
}
