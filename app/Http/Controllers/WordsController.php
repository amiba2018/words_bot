<?php

namespace App\Http\Controllers;
use App\Http\Requests\SlashCommandRequest;

use Illuminate\Http\Request;
use App\Word;
use App\User;

class WordsController extends Controller
{
    public const COMMAND_TYPE_COMPLIMENT = 'ほめる';
    public const COMMAND_TYPE_YELL = 'はげます';

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SlashCommandRequest $request)
    {
        $mention_existence = Word::isExistMention($request);
        if($mention_existence) {
            User::getWordSend($request);
        }else {
            $word_id = Word::getRandomWordId($request);
            $word = Word::findOrFail($word_id[0]['id']);
            //メンションがない場合はスラッシュコマンドで返す
            return mb_substr($word->word, 2);
        }
    }
}
