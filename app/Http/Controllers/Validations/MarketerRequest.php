<?php

namespace App\Http\Controllers\Validations;

use Illuminate\Foundation\Http\FormRequest;

class MarketerRequest extends FormRequest
{

    /**
     * Baboon Script By [it v 1.6.32]
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return request()->isMethod('put') || request()->isMethod('patch') ?
            $this->onUpdate() : $this->onCreate();
    }

    protected function onUpdate()
    {
        return [
            'first_name_ar' => 'required|string',
            'last_name_ar' => 'required|string',
            'first_name_en' => 'string|nullable',
            'last_name_en' => 'string|nullable',
            'email' => 'required|string|email',
            'password' => 'required|string',
            'mobile' => 'required|numeric',
            'balance' => 'numeric|nullable',
            'address_ar' => 'required|string',
            'address_en' => 'string|nullable',
            'photo_profile' => 'image|nullable',
            'amount_due' => 'numeric',
            'amount_paid' => 'numeric',
            'remember_token' => '',
        ];
    }

    /**
     * Baboon Script By [it v 1.6.32]
     * Get the validation rules that apply to the request.
     *
     * @return array (onCreate,onUpdate,rules) methods
     */
    protected function onCreate()
    {
        return [
            'first_name_ar' => 'required|string',
            'last_name_ar' => 'required|string',
            'first_name_en' => 'string|nullable',
            'last_name_en' => 'string|nullable',
            'email' => 'required|string|email',
            'password' => 'required|string',
            'mobile' => 'required|numeric',
            'balance' => 'numeric',
            'address_ar' => 'required|string',
            'address_en' => 'required|string',
            'photo_profile' => 'image|nullable',
            'amount_due' => 'required|numeric',
            'amount_paid' => 'required|numeric',
            'remember_token' => '',
        ];
    }

    /**
     * Baboon Script By [it v 1.6.32]
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'first_name_ar' => trans('admin.first_name_ar'),
            'last_name_ar' => trans('admin.last_name_ar'),
            'first_name_en' => trans('admin.first_name_en'),
            'last_name_en' => trans('admin.last_name_en'),
            'email' => trans('admin.email'),
            'password' => trans('admin.password'),
            'mobile' => trans('admin.mobile'),
            'balance' => trans('admin.balance'),
            'address_ar' => trans('admin.address_ar'),
            'address_en' => trans('admin.address_en'),
            'photo_profile' => trans('admin.photo_profile'),
            'amount_due' => trans('admin.amount_due'),
            'amount_paid' => trans('admin.amount_paid'),
            'remember_token' => trans('admin.remember_token'),
        ];
    }

    /**
     * Baboon Script By [it v 1.6.32]
     * response redirect if fails or failed request
     *
     * @return redirect
     */
    public function response(array $errors)
    {
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
