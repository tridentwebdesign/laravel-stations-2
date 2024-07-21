<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'published_year' => 'required|integer',
            'is_showing' => 'required|boolean',
            'description' => 'required|string',
            'genre' => 'required|string|max:255',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        // タイトルの文字数制限を超えた場合は500エラーを返す
        if ($errors->has('title') && $errors->first('title') === 'The title must not be greater than 255 characters.') {
            throw new HttpResponseException(response()->json($errors, 500));
        }

        // それ以外のバリデーションエラーは302ステータスを返す
        throw new HttpResponseException(
            redirect()
                ->back()
                ->withInput()
                ->withErrors($errors)
        );
    }
}
