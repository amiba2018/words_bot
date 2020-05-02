<?php

namespace App\Http\Controllers;
use App\Http\Requests\SlashCommandRequest;

use Illuminate\Http\Request;
use App\Word;
use App\User;
use Log;

class WordsController extends Controller
{
    public const COMMAND_TYPE_COMPLIMENT = 'ほめる';
    public const COMMAND_TYPE_YELL = 'はげます';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    // {
    //     dd($request->text);
        // \Log::info($request->text);
    //     \Log::debug($word->word);
    // }

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
            $check = Word::checkWordId($request);
            if(!$check) {
                $msg = "正しい形式で入力してください";
                return $msg;
            }
            $word_id = Word::getRandomWordId($request);
            $word = Word::findOrFail($word_id[0]['id']);
            //メンションがない場合はスラッシュコマンドで返す
            return mb_substr($word->word, 2);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
