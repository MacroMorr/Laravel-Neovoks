<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactValidation extends FormRequest
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
                'name' => 'required|min:3',
                'email' => 'required|email',
                'homepage' => 'max:255',
                'message' => 'required|min:15|max:500',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Введите имя пользователя',
            'email.required' => 'Введите email',
            'email.email' => 'E-mail введен не корректно',
            'homepage' => 'Введите корректный URL адрес',
            'message.required' => 'Поле сообщения обязательное(мин. 15 символов)'
        ];
    }

    // Для зарегистрированных пользователей
    public function regUser(Post $post) {
        if (Auth::id() !== $post->name) {
            return view('home')->withErrors('Вы не зарегистрированный пользователь');
        } else {
            return view('message-update-submit')->with('post', $post);
        }
    }

}
