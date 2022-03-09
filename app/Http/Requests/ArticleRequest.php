<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Article;

class ArticleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => 'required|min:5|max:100',
            'short_description' => 'required|max:255',
            'long_description' => 'required',
            'body' => 'required',
            'slug' => ['required', 'regex:/^[a-zA-Z0-9-_]+$/', 'unique:articles'],
        ];

        if (in_array('PATCH', $this->route()->methods)) {
            $idToIgnore = ($this->route()->parameter('article')->id);
            $rules['slug'][2] = "unique:articles,slug,$idToIgnore";
        }
        return $rules;
    }

    public function getTags()
    {
        $tags = collect(explode(',', request('tags')))->keyBy(function ($item) {
            return $item;
        });
        return $tags;
    }
}
