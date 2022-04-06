<?php

namespace App\Http\Validation;

use JetBrains\PhpStorm\ArrayShape;

class LoginValidation
{
    #[ArrayShape(['email' => "string[]", 'password' => "string[]"])] public function Rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required']
        ];
    }

    #[ArrayShape(['email.required' => "string", 'password.required' => "string"])] public function Messages(): array
    {
        return [
            'email.required' => 'Need your email please',
            'password.required' => 'Need your password please'
        ];
    }
}
