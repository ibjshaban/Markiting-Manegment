<?php
namespace App\Http\Controllers\ValidationsApi\V1;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class MarketerControllerRequest extends FormRequest {

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
             'name_ar'=>'required|string',
             'name_en'=>'required|string',
             'email'=>'required|string|email',
             'password'=>'required|string',
             'mobile'=>'required|numeric',
             'balance'=>'numeric',
             'address_ar'=>'required|string',
             'address_en'=>'required|string',
             'photo_profile'=>'image',
             'remember_token'=>'',
		];
	}


	protected function onUpdate() {
		return [
             'name_ar'=>'required|string',
             'name_en'=>'required|string',
             'email'=>'required|string|email',
             'password'=>'required|string',
             'mobile'=>'required|numeric',
             'balance'=>'numeric',
             'address_ar'=>'required|string',
             'address_en'=>'required|string',
             'photo_profile'=>'image',
             'remember_token'=>'',
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
             'name_ar'=>trans('admin.name_ar'),
             'name_en'=>trans('admin.name_en'),
             'email'=>trans('admin.email'),
             'password'=>trans('admin.password'),
             'mobile'=>trans('admin.mobile'),
             'balance'=>trans('admin.balance'),
             'address_ar'=>trans('admin.address_ar'),
             'address_en'=>trans('admin.address_en'),
             'photo_profile'=>trans('admin.photo_profile'),
             'remember_token'=>trans('admin.remember_token'),
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