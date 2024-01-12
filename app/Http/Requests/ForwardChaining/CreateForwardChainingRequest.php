<?php

namespace App\Http\Requests\ForwardChaining;

use App\Models\ForwardChaining\ForwardChaining;
use Illuminate\Foundation\Http\FormRequest;

class CreateForwardChainingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
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
        return ForwardChaining::$rules;
    }
}
