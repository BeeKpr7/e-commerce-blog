<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Enums\PostStatus;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()?->can('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rule_title_unique = Rule::unique('posts', 'title');
        if ($this->method() !== 'POST') {
            $rule_title_unique->ignore($this->post->id);
        }

        return [
            'title' => ['required', 'min:6', 'max:255', $rule_title_unique],
            'excerpt' => ['required'],
            'image' => request()->isMethod('post') ? 'required|image' : 'image',
            'body' => ['required'],
            'categories.*' => ['required', 'exists:categories,id'],
            'slug' => '',
            'user_id' => ''
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->title),
            'user_id' => auth()->id()
        ]);
    }
}