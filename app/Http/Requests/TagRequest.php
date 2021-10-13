<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
    public function rules()
    {
        return [
            //
        ];
    }

    public function getTags(): \Illuminate\Support\Collection
    {
        $tags = collect(explode(',', request('tags')))
            ->map(function ($item) {
                return trim($item);
            });
        return $tags;
    }
}
