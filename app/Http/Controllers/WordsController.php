<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Word;
use Log;

use App\User;
use App\Notifications\SlackNotification;

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
    public function store(Request $request)
    {
        $existence = Word::isExistMention($request);
        if($existence) {
            // $mension = Word::getMension($request);
            // $word_id = Word::getRandomWordId($request, $mension);
            // $word = Word::findOrFail($word_id[0]['id']);
            // $user = new User();
            // $user->notify(new SlackNotification($mension .mb_substr($word->word, 2)));
            User::getMessageSend ($request);
        }else {
            $word_id = Word::getRandomWordId($request);
            $word = Word::findOrFail($word_id[0]['id']);
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
