<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'title' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'title.required' => 'Title must be filled',
        ];
    }

    public function getAllData()
    {
        $inputs = [
            'title'            => $this->get('title'),
            'meta_description' => $this->get('meta_description'),
            'content'          => $this->get('content'),
            'is_published' => ($this->get('is_published') ? $this->get('is_published') : '') == 'on' ? '1' : '0',
        ];

        if ($this->has('publish')) {
            $inputs['is_published'] = true;
        }

        return $inputs;
    }
}
