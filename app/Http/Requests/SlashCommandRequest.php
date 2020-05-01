<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Word;
use Log;

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
            // 'text' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'text.required' => 'お名前を入力してください。',
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
}