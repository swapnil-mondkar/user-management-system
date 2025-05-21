<?php
/**
 * Copyright (c) 2025, All rights reserved.
 * Author: Swapnil Mondkar
 * Date: 2025-05-21
 * Description: BaseeFormRequest class for handling form requests.
 * This class extends the FormRequest class and overrides the failedValidation method to return a JSON response.
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseFormRequest extends FormRequest
{
    /**
     * Override failedValidation to return JSON response.
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Validation failed',
            'errors' => $validator->errors()
        ], 422));
    }
}
