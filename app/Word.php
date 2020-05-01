<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\WordsController;
use Log;

class Word extends Model
{
    protected $fillable = ['word'];

    public static function isExistMention($request) {
        if (is_null($request->text)) {
            return false;
        }
        if (mb_strpos($request->text,"<@")===false) {
            return false;
        }
        return true;
    }

    public static function getMention($request) {
        $cut_position = mb_strpos($request->text, "<@");
        $mension = mb_substr($request->text, $cut_position);
        return $mension;
    }

    //発話された内容に従って、wordsテーブルからランダムなidを取得する
    public static function getRandomWordId($request, $mention=null) {
        if (mb_strpos($request->text,WordsController::COMMAND_TYPE_COMPLIMENT)!== false) {
            $word_id = Word::where('word', 'LIKE', "%1%")->get(['id'])->random(1);
        }
        if (mb_strpos($request->text,WordsController::COMMAND_TYPE_YELL)!== false) {
            $word_id = Word::where('word', 'LIKE', "%2%")->get(['id'])->random(1);
        }
        if ($request->text === $mention) {
            $word_id = Word::get(['id'])->random(1);
        }
        return $word_id;
    }
}
