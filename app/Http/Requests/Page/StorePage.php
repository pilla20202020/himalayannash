<?php

namespace App\Http\Requests\Page;

use Illuminate\Foundation\Http\FormRequest;

class StorePage extends FormRequest
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
            'title' => 'required|max:200'
        ];
    }

    public function pageFillData()
    {
        $inputs = [
            'title'            => $this->get('title'),
            'meta_description' => $this->get('meta_description'),
            'content'          => $this->get('content'),
            'url' => $this->get('url'),
            'is_published' => ($this->get('is_published') ? $this->get('is_published') : '') == 'on' ? '1' : '0',
            'is_primary' => ($this->get('is_primary') ? $this->get('is_primary') : '') == 'on' ? '1' : '0',

        ];

        if ($this->has('publish')) {
            $inputs['is_published'] = true;
        }

        return $inputs;
    }
}
