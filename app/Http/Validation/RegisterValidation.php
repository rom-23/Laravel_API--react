<?php

namespace App\Http\Validation;

use JetBrains\PhpStorm\ArrayShape;

/**
 * Class RegisterValidation
 * @package App\Http\Validation
 */
class RegisterValidation
{
    /**
     * @return \string[][]
     */
    #[ArrayShape(['email' => "string[]", 'password' => "string[]", 'confirmPassword' => "string[]"])]
    public function Rules(): array
    {
        return [
            'email' => ['required', 'email', 'string', 'unique:users'],
            'password' => ['required'],
            'confirmPassword' => ['required', 'same:password']
        ];
    }

    /**
     * @return string[]
     */
    #[ArrayShape(['email.required' => "string", 'email.unique' => "string", 'password.required' => "string", 'confirmPassword.same' => "string"])]
    public function Messages(): array
    {
        return [
            'email.required' => 'Need your email please',
            'email.unique' => 'This email already exists',
            'password.required' => 'Need your password please',
            'confirmPassword.same' => 'It must the same as your password'
        ];
    }
}
