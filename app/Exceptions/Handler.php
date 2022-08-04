<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
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
    public function register()
    {

        $this->renderable(function (Exception $e, $request) {
            if ($e instanceof NotFoundHttpException) {
                if ($e->getPrevious() && $e->getPrevious() instanceof ModelNotFoundException) {
                    $mnfe = $e->getPrevious();
                    $error = [
                        'status' => '404',
                        'message' => Arr::last(explode('\\',$mnfe->getModel())) . ' not found by id: ' . collect($mnfe->getIds())->first(),
                    ];
                    return response()->json($error)->setStatusCode(Response::HTTP_NOT_FOUND);
                }
            }
        });

        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
