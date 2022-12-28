<?php

namespace App\Http\Requests\Video;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
            'video' => 'mimes:mpeg,ogg,mp4,webm,3gp,mov,avi,wmv,ts|max:100040',
        ];
    }

    public function getAllData()
    {
        $inputs = [
            'title' => $this->get('title'),
            'caption' => $this->get('caption'),
            'has_link' => $this->get('has_link'),
            'video_link' => $this->get('video_link'),
            'is_published' => ($this->get('is_published') ? $this->get('is_published') : '') == 'on' ? '1' : '0',
        ];

        if ($this->has('publish')) {
            $inputs['is_published'] = true;
        }

        return $inputs;
    }
}
