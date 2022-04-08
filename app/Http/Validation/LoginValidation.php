<?php

namespace App\Http\Validation;

use JetBrains\PhpStorm\ArrayShape;

/**
 * Class LoginValidation
 * @package App\Http\Validation
 */
class LoginValidation
{
    /**
     * @return \string[][]
     */
    #[ArrayShape(['email' => "string[]", 'password' => "string[]"])] public function Rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required']
        ];
    }

    /**
     * @return string[]
     */
    #[ArrayShape(['email.required' => "string", 'password.required' => "string"])] public function Messages(): array
    {
        return [
            'email.required' => 'Need your email please',
            'password.required' => 'Need your password please'
        ];
    }
}
