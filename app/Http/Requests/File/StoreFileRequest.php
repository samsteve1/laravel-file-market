<?php

namespace App\Http\Requests\File;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StoreFileRequest extends FormRequest
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

    protected function validationData()
    {
        $this->merge(['uploads' => $this->file->id]);

        return $this->all();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' =>  'required|max:255',
            'overview_short'    =>  'required|max:300',
            'overview'  =>  'required|max:5000',
            'price' =>  'required|numeric',
            'uploads'   => [
                'required',
                Rule::exists('uploads', 'file_id')->where(function ($query) {
                    $query->whereNull('deleted_at');
                })
            ]
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'File title is required.',
            'title.max' =>  'File title must be a maximum of 255 characters.',
            'overview_short.required' => 'Please fill in some short file overview.',
            'overview_short.max'    => 'Short overview must be a maximum of 300 characters.',
            'overview.required'     =>  'A file overview is required.',
            'overview.max'  => 'File overview must be a maximum of 5000 characters.',
            'price.required'    =>  'File price is required.',
            'price.numeric' =>  'File price must be a number.',
            'uploads.exists'    => 'Please upload at least one file'

        ];
    }
}
