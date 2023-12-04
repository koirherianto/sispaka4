<?php

namespace App\Http\Requests\BackwardChaining;

use App\Models\BackwardChaining\BcGoal;
use Illuminate\Foundation\Http\FormRequest;

class CreateBcGoalRequest extends FormRequest
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
        return BcGoal::$rules;
    }
}
