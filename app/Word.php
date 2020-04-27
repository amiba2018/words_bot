<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Log;

class Word extends Model
{
    protected $fillable = ['word'];

    public static function jageExistMension($request) {
        if (is_null($request->text)) {
            return false;
        }
        if (mb_strpos($request->text,"<@")===false) {
            return false;
        }
        return true;
    }

    public static function getMension($request) {
        $cut_position = mb_strpos($request->text, "<@");
        $mension = mb_substr($request->text, $cut_position);
        return $mension;
    }
}
