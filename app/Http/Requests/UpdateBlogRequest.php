<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $blog_id = $this->route('blog.id');;
        return [
            'title' => 'required|min:3',
            'slug' => ['required', Rule::unique('blogs', 'slug')->ignore($blog_id)],
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'intro' => 'required|min:4',
            'body' => 'required|min:8',
        ];
    }
}
