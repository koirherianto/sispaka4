<?php

namespace App\Http\Requests;

use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
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

    public function rules() : array
    {
        return [
            'title' => 'required|string|max:100',
            'status_publish' => 'required|string',
            'slug' => 'required|string|max:130',
            'seo_keyword' => 'nullable|string|max:100',
            'seo_description' => 'nullable|string|max:160',
            'content' => 'nullable|string|max:65535',
            'method_id' => 'required',
        ];
    }
}
