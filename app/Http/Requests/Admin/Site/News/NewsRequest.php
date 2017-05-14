<?php 

namespace App\Http\Requests\Admin\Site\News;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
	    $id = (int) $this->route('news');

        if(!$id){
            $rules = [
                'news_title' => 'required|max:255',
                'news_body' => 'required|min:10',
                'news_image' => "required|image|mimes:jpeg,png,jpg,gif,svg|max:1024",
            ];
        }else{
            $rules = [
                'news_title' => 'required|max:255',
                'news_body' => 'required|min:10',
            ];
        }

        return $rules;
	}

}