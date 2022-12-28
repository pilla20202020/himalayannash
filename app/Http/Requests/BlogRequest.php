<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required',
            'content.required' => 'Content is required',
        ];
    }

    public function getAllData()
    {
        $inputs = [
            'title'            => $this->get('title'),
            'meta_description' => $this->get('meta_description'),
            'content'          => $this->get('content'),
            'has_link'          => $this->get('has_link') ? $this->get('has_link') : 'No',
            'link'          => $this->get('has_link') == 'Yes' ? $this->get('link') : null,
            'is_published' => ($this->get('is_published') ? $this->get('is_published') : '') == 'on' ? '1' : '0',
            'is_featured' => ($this->get('is_featured') ? $this->get('is_featured') : '') == 'on' ? '1' : '0',
        ];

        if ($this->has('publish')) {
            $inputs['is_published'] = true;
        }

        return $inputs;
    }
}
