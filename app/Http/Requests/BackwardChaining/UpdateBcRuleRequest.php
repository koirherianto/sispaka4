<?php

namespace App\Http\Requests\BackwardChaining;

use App\Models\BackwardChaining\BcRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBcRuleRequest extends FormRequest
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
        $rules = BcRule::$rules;
        
        return $rules;
    }
}
