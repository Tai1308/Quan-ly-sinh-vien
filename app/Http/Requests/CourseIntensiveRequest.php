<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseIntensiveRequest extends FormRequest
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
            //
            'name' => 'required|unique:course_detail',
            'startDate' => 'required',
            'endDate' => 'required|after:startDate',
        ];
    }

    public function messages()
    {
        return [

            'startDate.required' => 'Ngày Bắt đầu không được để trống',
            'startDate.after' => 'Ngày bắt đầu phải lớn hơn bằng ngày hiện tại',
            'endDate.required' => 'Ngày kết thúc không được để trống',
            'endDate.after' => 'Ngày kết thúc phải lớn hơn ngày bắt đầu',
            'name.required' => 'Tên lớp không được để trống',
            'name.unique' => 'Lớp học đã tồn tại'
        ];
    }
}
