<?php

namespace Domain\News\Requests;

use Domain\News\States\NewsState;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
//    public function authorize()
//    {
//        return false;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'         => ['required'],
            'description'   => ['required'],
            'status'        => ['required',Rule::in(NewsState::getValues())]
        ];
    }
}
