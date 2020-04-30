<?php

namespace App\Http\Controllers;
use App\Http\Requests\SlashCommandRequest;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Word;
use Log;

use App\User;
use App\Notifications\SlackNotification;

class WordsController extends Controller
{
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
        $existence = Word::jageExistMension($request);
        if($existence) {
            $mension = Word::getMension($request);
            if (mb_strpos($request->text,"ほめる")!== false) {
                $word_id = Word::where('word', 'LIKE', "%1%")->get(['id'])->random(1);
                $word = Word::findOrFail($word_id[0]['id']);
                $user = new User();
                $user->notify(new SlackNotification($mension .mb_substr($word->word, 2)));
            } elseif ($request->text == "はげます") {
                $word_id = Word::where('word', 'LIKE', "%2%")->get(['id'])->random(1);
                $word = Word::findOrFail($word_id[0]['id']);
                $user = new User();
                $user->notify(new SlackNotification($mension .mb_substr($word->word, 2)));
            }else {
                $word_id = Word::get(['id'])->random(1);
                $word = Word::findOrFail($word_id[0]['id']);
                return $mension .mb_substr($word->word, 2);
            }
        }else {
            if (mb_strpos($request->text,"ほめる")!== false) {
                $word_id = Word::where('word', 'LIKE', "%1%")->get(['id'])->random(1);
                $word = Word::findOrFail($word_id[0]['id']);
                $user = new User();
                $user->notify(new SlackNotification(mb_substr($word->word, 2)));
            } elseif ($request->text == "はげます") {
                $word_id = Word::where('word', 'LIKE', "%2%")->get(['id'])->random(1);
                $word = Word::findOrFail($word_id[0]['id']);
                $user = new User();
                $user->notify(new SlackNotification(mb_substr($word->word, 2)));
            }else {
                $word_id = Word::get(['id'])->random(1);
                $word = Word::findOrFail($word_id[0]['id']);
                return mb_substr($word->word, 2);
            }
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
