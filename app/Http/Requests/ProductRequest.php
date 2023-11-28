<?php

namespace App\Http\Requests;


use Illuminate\Support\Str;
use App\Enums\ProductStatus;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $rule_name_unique = Rule::unique('products', 'name');
        if ($this->method() !== 'POST') {
            $rule_name_unique->ignore($this->product->id);
        }

        $rule_image = File::image()->min('1kb')->max('4mb');

        return [
            'name' => ['required', 'min:6', 'max:255', $rule_name_unique],
            'description' => ['required'],
            'place' => ['required', 'min:6', 'max:255'],
            'image' => [request()->isMethod('post') ? 'required' : '', $rule_image],
            'category_id' => ['required', 'exists:categories,id'],
            'status' => '',
            'slug' => '',

        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->name),
            'status' => $this->status ?? ProductStatus::INACTIVE->value,
        ]);
    }
}
