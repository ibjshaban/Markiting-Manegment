<?php
namespace App\Http\Controllers\ValidationsApi\V1;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ShippingRequest extends FormRequest {

	/**
	 * Baboon Script By [it v 1.6.32]
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Baboon Script By [it v 1.6.32]
	 * Get the validation rules that apply to the request.
	 *
	 * @return array (onCreate,onUpdate,rules) methods
	 */
	protected function onCreate() {
		return [
             'country'=>'required|string|in:accept,pending',
             'vehicle_types'=>'required|string|in:accept,pending',
             'cost'=>'required|numeric',
		];
	}


	protected function onUpdate() {
		return [
             'country'=>'required|string|in:accept,pending',
             'vehicle_types'=>'required|string|in:accept,pending',
             'cost'=>'required|numeric',
		];
	}

	public function rules() {
		return request()->isMethod('put') || request()->isMethod('patch') ?
		$this->onUpdate() : $this->onCreate();
	}


	/**
	 * Baboon Script By [it v 1.6.32]
	 * Get the validation attributes that apply to the request.
	 *
	 * @return array
	 */
	public function attributes() {
		return [
             'country'=>trans('admin.country'),
             'vehicle_types'=>trans('admin.vehicle_types'),
             'cost'=>trans('admin.cost'),
		];
	}

	/**
	 * Baboon Script By [it v 1.6.32]
	 * response redirect if fails or failed request
	 *
	 * @return redirect
	 */
	public function response(array $errors) {
		return $this->ajax() || $this->wantsJson() ?
		response([
			'status' => false,
			'StatusCode' => 422,
			'StatusType' => 'Unprocessable',
			'errors' => $errors,
		], 422) :
		back()->withErrors($errors)->withInput(); // Redirect back
	}



}
