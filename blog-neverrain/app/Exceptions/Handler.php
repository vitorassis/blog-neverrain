<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use App\Jogo;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($this->isHttpException($exception)) {
            if (strval($exception->getStatusCode())[0] == "4") {
                return response()->view('errors.' . '404', ['jogos'=>Jogo::orderBy('id', 'DESC')->get()], 404);
            }
             
            if (strval($exception->getStatusCode())[0] == "5") {
                return response()->view('errors.' . '500', ['jogos'=>Jogo::orderBy('id', 'DESC')->get()], 500);
            }
        }
        return response()->view('errors.' . 'any', ['jogos'=>Jogo::orderBy('id', 'DESC')->get()], 500);
           
        //return parent::render($request, $exception);
    }
}
