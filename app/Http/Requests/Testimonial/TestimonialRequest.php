<?php

namespace App\Http\Requests\Testimonial;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
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
            'name' => 'required',
            'review' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'review.required' => 'Review is required',
        ];
    }

    public function getAllData()
    {
        $inputs = [
            'name' => $this->get('name'),
            'review' => $this->get('review'),
            'customer_rating' => $this->get('customer_rating'),
            'is_published' => ($this->get('is_published') ? $this->get('is_published') : '') == 'on' ? '1' : '0',
            'is_featured' => ($this->get('is_featured') ? $this->get('is_featured') : '') == 'on' ? '1' : '0',
        ];

        if ($this->has('publish')) {
            $inputs['is_published'] = true;
        }

        return $inputs;
    }
}
