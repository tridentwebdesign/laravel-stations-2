<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMovieRequest extends FormRequest
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
            'title' => 'required|string|max:255|unique:movies,title,' . $this->route('movie'),
            'image_url' => 'required|url|max:255',
            'published_year' => 'required|integer|min:1900|max:' . date('Y'),  // 公開年の範囲を追加
            'is_showing' => 'required|boolean',
            'description' => 'required|string',
            'genre' => 'nullable|string|max:255',
        ];
    }
}
