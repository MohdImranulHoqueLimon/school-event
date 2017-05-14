<?php

namespace App\Http\Requests\Admin\Site;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialsRequest extends FormRequest
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
            'testimonial_client' => 'required|max:100',
            'testimonial_designation' => 'required|max:100',
            'testimonial_company' => 'required|max:100',
            'testimonial_body' => 'required|min:10'
        ];
    }
}
