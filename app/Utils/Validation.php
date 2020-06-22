<?php

namespace App\Utils;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class Validation
{
    public function addGig($data)
    {
        $validator =  Validator::make($data, [
            'role' => "required|min:3|regex:/^([a-zA-z\s\-\'\(\)]*)$/",
            'company' => "required|min:3|regex:/^([a-zA-z\s\'\-\(\)]*)$/",
            'country' => "required|min:3|regex:/^([a-zA-z\s\'\-\(\)]*)$/",
            'state' => "required|min:3|regex:/^([a-zA-z\s\'\-\(\)]*)$/",
            'address' => "required|min:3|regex:/^([a-zA-z\s\'\-\(\)]*)$/",
            'tags' => "required|min:3|regex:/^([a-zA-z\s\'\-\(\)]*)$/",
            'max_salary' => "required|min:3|regex:/^([0-9])/",
            'min_salary' => "required|min:3|regex:/^([0-9])/"
        ]);
        

        if($validator->fails()){
            $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $errors 
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
        }
    }
}