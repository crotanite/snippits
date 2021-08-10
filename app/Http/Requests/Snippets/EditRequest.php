<?php

namespace App\Http\Requests\Snippets;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'anonymous' => ['in:on,off'],
            'direct_url' => ['url', 'nullable'],
            'language' => ['required', 'exists:languages,code'],
            'snippet' => ['required'],
            'theme' => ['required', 'exists:themes,key'],
        ];
    }
}
