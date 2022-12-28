<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
            'category_id' => 'required',
            'name' => 'required',
        ];
    }

    public function getAllData()
    {
        $inputs = [
            'category_id' => $this->get('category_id'),
            'sub_category_id' => $this->get('sub_category_id'),
            'name' => $this->get('name'),
            'difficulty_level' => $this->get('difficulty_level'),
            'no_of_days' => $this->get('no_of_days'),
            'no_of_nights' => $this->get('no_of_nights'),
            'location' => $this->get('location'),
            'overview' => $this->get('overview'),
            'summary' => $this->get('summary'),
            'cost_info' => $this->get('cost_info'),
            'price' => $this->get('price'),
            'confirmation_policy' => $this->get('confirmation_policy'),
            'refund_policy' => $this->get('refund_policy'),
            'cancellation_policy' => $this->get('cancellation_policy'),
            'payment_terms_policy' => $this->get('payment_terms_policy'),
            'is_published'=> ($this->get('is_published') ? $this->get('is_published') : '') == 'on' ? '1' : '0',
            'is_featured' => ($this->get('is_featured') ? $this->get('is_featured') : '') == 'on' ? '1' : '0',
            'is_trending' => ($this->get('is_trending') ? $this->get('is_trending') : '') == 'on' ? '1' : '0',
        ];

        if ($this->has('publish')) {
            $inputs['is_published'] = true;
        }

        return $inputs;
    }
}
