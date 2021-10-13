<?php

namespace App\Http\Requests;

use App\Models\Article;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class StoreArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [
            'title' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string'],
            'body' => ['required', 'string'],
            'slug' => ['unique']
        ];

        $id = Article::get('id');
        if ($this->method() === 'PATCH') {
            $rules['slug'] = [Rule::unique('articles', 'slug')->ignore($id)];
        }
        return $rules;
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Необходимо указать название',
            'description.required'  => 'Необходимо написать краткое описание',
            'body.required'  => 'Необходимо написать детальное описание',
            'slug.unique' => 'Такое название уже есть'
        ];
    }

    public function getPublishedAt(): ?Carbon
    {
        return (request('checkbox') === "on") ? carbon::now() : null;
    }
}
