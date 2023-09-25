<?php

namespace App\Exceptions;

use App\Helpers\JsonFormatter;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    // public function register()
    // {
    //     $this->reportable(function (Throwable $e) {
    //         //
    //     });
    // }

    // public function render($request, Throwable $exception)
    // {
    //     if (config('app.debug')) {
    //         $response = $this->handleException($request, $exception);
    //     } else {
    //         $response = JsonFormatter::error(
    //             null,
    //             'Internal Server Error',
    //             500
    //         );
    //     }
    //     return $response;
    // }
    
    // public function handleException($request, Throwable $exception){
    //     if ($exception instanceof AuthenticationException) {
    //         return JsonFormatter::error(
    //             null,
    //             'Unauthenticated',
    //             401
    //         );
    //     }

    //     if ($exception instanceof MethodNotAllowedHttpException) {
    //         return JsonFormatter::error(
    //             null,
    //             'The specified method for the request is invalid',
    //             405
    //         );
    //     }


    //     if ($exception instanceof NotFoundHttpException) {
    //         return JsonFormatter::error(
    //             null,
    //             'The specified URL cannot be found',
    //             404
    //         );
    //     }

    //     if ($exception instanceof HttpException) {
    //         return JsonFormatter::error(
    //             null,
    //             $exception->getMessage(),
    //             $exception->getStatusCode()
    //         );

    //     }

    //     if ($exception instanceof ValidationException) {
    //         return JsonFormatter::error(
    //             $exception->errors(),
    //             'Validation Error',
    //             422
    //         );
    //     }
        
    //     if (config('app.env') == 'local') {
    //         return JsonFormatter::error(
    //             null,
    //             $exception->getMessage(),
    //             500
    //         );
    //     }else{
    //         return JsonFormatter::error(
    //             null,
    //             'Internal Server Error',
    //             500
    //         );
    //     }

      
    // }
}
