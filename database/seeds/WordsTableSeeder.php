<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class WordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $data = [
            //ほめる
            ['word' => '1:さすが！！百年に1人の逸材！', 'created_at' => $now, 'updated_at' => $now],
            ['word' => '1:ナイス×3！', 'created_at' => $now, 'updated_at' => $now],
            ['word' => '1:全てにおいて神がかり的！', 'created_at' => $now, 'updated_at' => $now],
            ['word' => '1:すこぶる調子いい！', 'created_at' => $now, 'updated_at' => $now],
            ['word' => '1:抜きんでている！', 'created_at' => $now, 'updated_at' => $now],
            //関西弁
            ['word' => '2:ええやん!', 'created_at' => $now, 'updated_at' => $now],
            ['word' => '2:ごっつええやん!', 'created_at' => $now, 'updated_at' => $now],
            ['word' => '2:今日はどうしたん？えらいシュッとしているやん！', 'created_at' => $now, 'updated_at' => $now],
            ['word' => '2:自分おもろいやつやな！', 'created_at' => $now, 'updated_at' => $now],
            ['word' => '2:アンタにはかなわんわ！', 'created_at' => $now, 'updated_at' => $now],
        ];
        DB::table('words')->insert($data);
    }
}
