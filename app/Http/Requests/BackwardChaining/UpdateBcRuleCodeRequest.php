<?php

namespace App\Http\Requests\BackwardChaining;

use App\Models\BackwardChaining\BcRuleCode;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBcRuleCodeRequest extends FormRequest
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
        $rules = BcRuleCode::$rules;
        
        return $rules;
    }
}
