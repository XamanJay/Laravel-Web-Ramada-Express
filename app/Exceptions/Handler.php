<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\QueryException;
use App\Traits\ApiResponser;
use Throwable;
use App;

class Handler extends ExceptionHandler
{
    use ApiResponser;
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
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if( $request->is('api/*')){
            //dd($exception);
            if($exception instanceof ValidationException){
                return $this->errorResponse($exception->errors(),$exception->status);
            }
            if($exception instanceof ModelNotFoundException){
                $modelo = class_basename($exception->getModel());
                return response()->json(['message' => 'No existe ninguna instancia de '.$modelo.' con el id solicitado', 'code' => 404]);
            }
            if($exception instanceof AuthenticationException){
                return $this->errorResponse('Usuario no autenticado',401);
            }
            if($exception instanceof AuthorizationException){
                return $this->errorResponse('No posees permisos para esta acción',403);
            }
            if($exception instanceof NotFoundHttpException){
                return $this->errorResponse('No se encontró la URL especificada',404);
            }
            if($exception instanceof MethodNotAllowedHttpException){
                return $this->errorResponse('El método especificado en la peticion no es valido',405);
            }
            if($exception instanceof HttpException){
                dd($exception);
                return $this->errorResponse($exception->getMessage(),$exception->getStatusCode());
            }
            if($exception instanceof QueryException){
                $codigo = $exception->errorInfo[1];
                switch ($codigo) {
                    case 1451:
                        return $this->errorResponse('No se puede eliminar de forma permanente el recurso porque esta relacionado con algun otro',409);
                        break;
                    case 1045:
                        return $this->errorResponse('Credenciales incorrectas al conectarse a la BD',409); 
                        break;
                    case 1062:
                        return $this->errorResponse('El email ya se encuentra registrado',409);
                        break;
                    default:
                        return response()->json(['message' => 'Falla inesperada  '.$exception, 'code' => 409]);
                        break;
                }
            }
            return response()->json(['message' => 'Falla inesperada. Intente Luego '.$exception, 'code' => 500]);
        }

        if ($exception instanceof NotFoundHttpException) {
            return redirect()->route('not-found', App::getLocale());
        }

        return parent::render($request, $exception);
    }
}
