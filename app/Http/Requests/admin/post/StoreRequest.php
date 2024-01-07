<?php

namespace App\Http\Requests\admin\post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        return [
           'title' => 'required|string',
           'message' => 'required|string',
           'main_image' => 'required|image|mimes:jpeg,png,jpg,gif',
           'preview_image' => 'required|image|mimes:jpeg,png,jpg,gif',
           'category_id' => 'required|integer|exists:categories,id',
           'tag_ids' => 'nullable|array',
           'tag_ids.*' => 'nullable|integer|exists:tags,id',

        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле должно быть заполнено',
            'title.string' => 'Поле должно содержать буквы',
            'message.required' => 'Поле должно быть заполнено',
            'message.string' => 'Поле должно содержать буквы',
            'main_image.required' => 'Файл должен быть выбран',
            'main_image.image' => 'Файл должен быть изображением',
            'preview_image.required' => 'Файл должен быть выбран',
            'preview_image.image' => 'Файл должен быть изображением',
            'category_id.required' => 'Выберите категорию',
            'category_id.integer' => 'Выберите категорию',
            'category_id.integer' => 'Такой категории не существует',
        ];
    }
}
