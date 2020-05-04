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
            ['word' => '1:すこぶる調子いいね！', 'created_at' => $now, 'updated_at' => $now],
            ['word' => '1:抜きんでている！', 'created_at' => $now, 'updated_at' => $now],
            //関西弁
            ['word' => '2:ええやん!', 'created_at' => $now, 'updated_at' => $now],
            ['word' => '2:ごっつええやん!', 'created_at' => $now, 'updated_at' => $now],
            ['word' => '2:今日はどうしたん？えらいシュッとしているやん！', 'created_at' => $now, 'updated_at' => $now],
            ['word' => '2:ほ、ほれてまうやろ！', 'created_at' => $now, 'updated_at' => $now],
            ['word' => '2:すてきやん！', 'created_at' => $now, 'updated_at' => $now],
            //殿様
            ['word' => '3:大儀であった!', 'created_at' => $now, 'updated_at' => $now],
            ['word' => '3:あっぱれ!', 'created_at' => $now, 'updated_at' => $now],
            ['word' => '3:よきかな♪ よきかな♪', 'created_at' => $now, 'updated_at' => $now],
            ['word' => '3:お主やりよるな', 'created_at' => $now, 'updated_at' => $now],
            ['word' => '3:ほめてつかわす！！', 'created_at' => $now, 'updated_at' => $now],
        ];
        DB::table('words')->insert($data);
    }
}
