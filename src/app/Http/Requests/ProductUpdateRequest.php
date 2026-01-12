<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => ['required'],
            'price' => ['required', 'numeric', 'min:0', 'max:10000'],
            'seasons' => ['required', 'array'],
            'description' => ['required', 'max:120'],
        ];

        // delete_imageが'1'で、かつ新しい画像がアップロードされていない場合は必須
        if ($this->input('delete_image') === '1' && !$this->hasFile('image')) {
            $rules['image'] = ['required', 'file', 'mimes:png,jpeg'];
        } elseif ($this->hasFile('image')) {
            $rules['image'] = ['file', 'mimes:png,jpeg'];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => '商品名を入力してください',
            'price.required' => '値段を入力してください',
            'price.numeric' => '数値で入力してください',
            'price.min' => '0~10000円以内で入力してください',
            'price.max' => '0~10000円以内で入力してください',
            'image.required' => '画像を登録してください',
            'image.mimes' => '.pngまたは.jpeg形式でアップロードしてください',
            'seasons.required' => '季節を選択してください',
            'description.required' => '商品説明を入力してください',
            'description.max' => '120文字以内で入力してください',
        ];
    }
}
