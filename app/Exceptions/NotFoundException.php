<?php

namespace App\Exceptions;

class NotFoundException extends AppException
{
    /**
     * Http status code
     *
     * @var integer
     */
    protected $statusCode = 404;

    /**
     * The error message
     *
     * @var string
     */
    protected $message = 'NotFound';
}
