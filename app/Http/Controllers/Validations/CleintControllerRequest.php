<?php

namespace App\Http\Controllers\Validations;

use Illuminate\Foundation\Http\FormRequest;

class CleintControllerRequest extends FormRequest
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
            'name_ar' => 'required|string',
            'name_en' => 'string|nullable',
            'email' => 'required|string|email',
            'password' => 'string|nullable',
            'address' => 'required|string',
            'transport_type' => 'required|string',
            'to_country' => 'nullable|string',
            'to_city' => 'nullable|string',
            'note' => 'nullable|string',
            'mobile' => 'required|numeric',
            'photo_profile' => 'file|image',
            'status' => 'nullable|string',
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
            'name_ar' => 'required|string',
            'name_en' => 'string|nullable',
            'email' => 'required|string|email',
            'password' => 'string|nullable',
            'address' => 'required|string',
            'transport_type' => 'required|string',
            'to_country' => 'required|string',
            'to_city' => 'required|string',
            'note' => 'nullable|string',
            'mobile' => 'required|numeric',
            'photo_profile' => 'file|image',
            'status' => 'nullable|string',
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
            'name_ar' => trans('admin.name_ar'),
            'name_en' => trans('admin.name_en'),
            'email' => trans('admin.email'),
            'password' => trans('admin.password'),
            'address' => trans('admin.address'),
            'transport_type' => trans('admin.transport_type'),
            'to_country' => trans('admin.to_country'),
            'to_city' => trans('admin.to_city'),
            'note' => trans('admin.note'),
            'mobile' => trans('admin.mobile'),
            'status' => trans('admin.status'),
            'photo_profile' => trans('admin.photo_profile'),
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
