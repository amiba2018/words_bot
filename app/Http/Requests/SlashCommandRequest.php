<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Word;

use App\User;
use App\Notifications\SlackNotification;

class SlashCommandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

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
                $check = Word::checkWordText($request, $mention);
            }else {
                $check = Word::checkWordText($request);
            }
            if(!$check) {
                $msg = "正しい形式で入力してください";
                $validator->errors()->add('text', $msg);
            }
        });
    }
}
