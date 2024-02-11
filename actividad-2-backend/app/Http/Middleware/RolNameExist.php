<?php

namespace App\Http\Middleware;

use App\libs\ResultResponse;
use App\Models\Rol;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolNameExist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $data = json_decode($request->getContent());

        $rol = Rol::where('nombre_rol', $data->nombre_rol)->first();

        if($rol){
            $response = new ResultResponse();
            $response->setStatusCode(ResultResponse::ERROR_CODE);
            $response->setMessage(ResultResponse::TKT_ERROR_CODE);
            return response()->json($response);
        }
        return $next($request);
    }
}
