<?php

namespace App\Exceptions;

class ValidationException extends AppException
{
    /**
     * Http status code
     *
     * @var integer
     */
    protected $statusCode = 422;

    /**
     * The error message
     *
     * @var string
     */
    protected $message = 'validationError';

    /**
     * Constructor
     *
     * @param array $errors     The errror Bags
     * @return void
     */
    public function __construct(array $errors)
    {
        $this->errors = $errors;
    }
}
