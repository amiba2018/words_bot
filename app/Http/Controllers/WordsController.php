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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    // {
    //     \Log::info($request);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->text == "ほめる") {
            $word_id = Word::where('word', 'LIKE', "%1%")->get(['id'])->random(1);
            $word = Word::findOrFail($word_id[0]['id']);
            $user = new User();
            $user->notify(new SlackNotification($word->word));
        } elseif ($request->text == "はげます") {
            $word_id = Word::where('word', 'LIKE', "%2%")->get(['id'])->random(1);
            $word = Word::findOrFail($word_id[0]['id']);
            $user = new User();
            $user->notify(new SlackNotification($word->word));
        }else {
            return "自画自賛";
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
