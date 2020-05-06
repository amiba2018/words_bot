<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Http\Controllers\WordsController;
use App\Word;

class SlashCommandRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     * @return void
     * @throw HttpResponseException
     */
    protected function failedValidation(Validator $validator): void
    {
        $response['text'] = $validator->errors()->first();
        $response["response_type"] = "ephemeral";
        throw new HttpResponseException(response()->json($response, 200));
    }

    public function withValidator(Validator $validator) {
        $validator->after(function ($validator) {
            $request = $this->input();
            $mention_existence = Word::isExistMention($request);
            if($mention_existence) {
                $mention = Word::getMention($request);
                $check = self::checkWordText($request, $mention);
            }else {
                $check = self::checkWordText($request);
            }
            if(!$check) {
                $msg = "正しい形式で入力してください";
                $validator->errors()->add('text', $msg);
            }
        });
    }

    //発話された内容が正しい形式で入力されているかをチェック
    private static function checkWordText($request, $mention=null) {
        if(mb_strpos($request['text'],WordsController::COMMAND_TYPE_COMPLIMENT)!== false) {
            return true;
        }
        if(mb_strpos($request['text'],WordsController::COMMAND_TYPE_YELL)!== false) {
            return true;
        }
        if(mb_strpos($request['text'],WordsController::COMMAND_TYPE_LORD)!== false) {
            return true;
        }
        if($request['text'] === $mention) {
            return true;
        }
        return false;
    }
}
