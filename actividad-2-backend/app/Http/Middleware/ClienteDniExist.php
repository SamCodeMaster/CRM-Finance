<?php

namespace App\Http\Middleware;

use App\libs\ResultResponse;
use App\Models\Cliente;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClienteDniExist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $data = json_decode($request->getContent());

        $cliente = Cliente::where('dni', $data->dni)->first();

        if($cliente){
            $response = new ResultResponse();
            $response->setStatusCode(ResultResponse::ERROR_CODE);
            $response->setMessage(ResultResponse::TKT_ERROR_CODE);
            return response()->json($response);
        }
        return $next($request);
    }
}
