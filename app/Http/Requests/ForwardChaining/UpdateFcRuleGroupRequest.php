<?php

namespace App\Http\Requests\ForwardChaining;

use App\Models\ForwardChaining\FcRuleGroup;
use Illuminate\Foundation\Http\FormRequest;

class UpdateFcRuleGroupRequest extends FormRequest
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
        $rules = FcRuleGroup::$rules;
        
        return $rules;
    }
}
