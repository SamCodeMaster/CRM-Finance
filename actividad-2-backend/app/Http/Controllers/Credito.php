<?php

namespace App\Http\Controllers;

use App\libs\ResultResponse;
use App\Models\Credito as ModelsCredito;
use Exception;
use Illuminate\Http\Request;

class Credito extends Controller
{
    function getAll(){
        $response = new ResultResponse();
        try{
            $credito = ModelsCredito::all();
            if($credito){
                $response->setStatusCode(ResultResponse::SUCCESS_CODE);
                $response->setMessage(ResultResponse::TKT_SUCCESS_CODE);
                $response->setData($credito);
            }else{
                $response->setStatusCode(ResultResponse::ERROR_ELEMENT_NOT_FOUNO_CODE);
                $response->setMessage(ResultResponse::TKT_ERROR_ELEMENT_NOT_FOUND_CODE);
            }
        }catch(Exception $e){
            $response->setStatusCode(ResultResponse::ERROR_CODE);
            $response->setMessage(ResultResponse::TKT_ERROR_CODE);
        }

        return response()->json($response);
    }
}
