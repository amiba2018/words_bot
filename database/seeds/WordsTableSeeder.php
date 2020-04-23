<?php

use Illuminate\Database\Seeder;
use App\Word;

class WordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Word::create([
            "word"  => '1:ごっつえやん！',
        ]);

        Word::create([
            "word"  => '1:ナイス！',
        ]);

        Word::create([
            "word"  => '2:ドンマイ！',
        ]);
    }
}
