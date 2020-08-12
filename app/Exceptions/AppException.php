<?php

namespace App\Exceptions;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException as LaravelValidationException;

class AppException extends \RuntimeException
{
    /**
     * Http status code
     *
     * @var int
     */
    protected $statusCode;

    /**
     * Error Bags
     *
     * @var mixed
     */
    protected $errors;

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function render(Request $request)
    {
        $data = ['message' => $this->message];
        if (!empty($this->errors))
            $data = array_merge($data, ['errors' => $this->errors]);
        return new JsonResponse($data, $this->statusCode);
    }

    /**
     * Handle exception from API request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public static function handle(Request $request, \Exception $exception)
    {
        switch (true) {
            case $exception instanceof LaravelValidationException:
                $e = new ValidationException($exception->errors());
                break;

            case $exception instanceof ModelNotFoundException:
                $e = new NotFoundException();
                break;

            default:
                $e = new self();
                break;
        }

        return $e->render($request);
    }
}
