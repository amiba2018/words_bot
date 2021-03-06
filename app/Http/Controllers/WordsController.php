<?php

namespace App\Http\Controllers;

use App\Http\Requests\SlashCommandRequest;
use Illuminate\Http\Request;
use App\Word;
use App\User;

class WordsController extends Controller
{
    public const COMMAND_TYPE_COMPLIMENT = 'ほめる';
    public const COMMAND_TYPE_YELL = '関西弁';
    public const COMMAND_TYPE_LORD = '殿様';

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function slackMessageReturn(SlashCommandRequest $request)
    {
        $mention_existence = Word::isExistMention($request);
        if($mention_existence) {
            User::getWordSend($request);
        }else {
            $word_ids = Word::getRandomWordId($request);
            $word = Word::findOrFail($word_ids[0]['id']);
            //メンションがない場合はスラッシュコマンドで返す
            return mb_substr($word->word, 2);
        }
    }
}
