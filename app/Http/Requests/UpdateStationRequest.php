<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStationRequest extends FormRequest {

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
            'name' => 'required|unique:station,name,'.$this->station, 
            'frequency' => 'required', 
            'image' => 'required', 
            'stream_url' => 'required', 
            'streamplace_id' => 'required', 
            
		];
	}
}
