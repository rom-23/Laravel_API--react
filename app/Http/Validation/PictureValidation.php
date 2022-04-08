<?php

namespace App\Http\Validation;

use JetBrains\PhpStorm\ArrayShape;

/**
 * Class PictureValidation
 * @package App\Http\Validation
 */
class PictureValidation
{
    /**
     * @return string[][]
     */
    #[ArrayShape(['title' => "string[]", 'description' => "string[]", 'image' => "string[]"])]
    public function Rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'description' => ['required', 'max:250'],
            'image' => ['required', 'image']
        ];
    }

    /**
     * @return string[]
     */
    #[ArrayShape(['title.required' => "string", 'description.required' => "string", 'image.required' => "string", 'image.image' => "string"])]
    public function Messages(): array
    {
        return [
            'title.required' => 'Need a title please',
            'description.required' => 'Need your description please',
            'image.required' => 'Need a picture please',
            'image.image' => 'This is not a valid format'
        ];
    }
}
