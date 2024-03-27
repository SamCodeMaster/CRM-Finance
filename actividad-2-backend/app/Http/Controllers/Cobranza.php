<?php

namespace App\Http\Controllers;

use App\libs\ResultResponse;
use App\Models\Cobranza as ModelsCobranza;
use DateTime;
use Exception;
use Illuminate\Http\Request;

class Cobranza extends Controller
{
    function getAll(){
        $response = new ResultResponse();

        try{
            $cobranza = ModelsCobranza::all();
            if($cobranza){
                $response->setStatusCode(ResultResponse::SUCCESS_CODE);
                $response->setMessage(ResultResponse::TKT_SUCCESS_CODE);
                $response->setData($cobranza);
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

    function add(Request $pRequest){
        $response = new ResultResponse();
        try{
            $date = new DateTime();
            $data = json_decode($pRequest->getContent());
            $cobranza = ModelsCobranza::insert(
                ['numero_cuota' => $data->numero_cuota,
                'valor_cuota' => $data->valor_cuota,
                'estado' => $data->estado,
                'referenciacione_id' => $data->referenciacione_id,
                'empleado_id' => $data->empleado_id,
                'created_at' => $date,
                'updated_at' => $date
                ]
            );
            $response->setStatusCode(ResultResponse::SUCCESS_CODE);
            $response->setMessage(ResultResponse::TKT_SUCCESS_CODE);
            $response->setData($cobranza);
        }catch(Exception $e){
            $response->setStatusCode(ResultResponse::ERROR_CODE);
            $response->setMessage(ResultResponse::TKT_ERROR_CODE);
        }

        return response()->json($response);
    }

    function delete($pId){
        $response = new ResultResponse();
        try{
            $cobranza = ModelsCobranza::find($pId);
            if($cobranza){
                $cobranza->delete();
                $response->setStatusCode(ResultResponse::SUCCESS_CODE);
                $response->setMessage(ResultResponse::TKT_SUCCESS_CODE);
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

    function update(Request $pRequest, $pId){
        $response = new ResultResponse();
        try{
            $date = new DateTime();
            $data = json_decode($pRequest->getContent());
            
            $cobranza = ModelsCobranza::find($pId);
            
            if($cobranza){
                $cobranza->numero_cuota = $data->numero_cuota;
                $cobranza->valor_cuota = $data->valor_cuota;
                $cobranza->estado = $data->estado;
                $cobranza->referenciacione_id = $data->referenciacione_id;
                $cobranza->empleado_id = $data->empleado_id;
                $cobranza->updated_at = $date;

                $cobranza->save();

                $response->setStatusCode(ResultResponse::SUCCESS_CODE);
                $response->setMessage(ResultResponse::TKT_SUCCESS_CODE);
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

    function findById($pId){
        $response = new ResultResponse();
        try{
            $cobranza = ModelsCobranza::find($pId);
            if($cobranza){
                $response->setStatusCode(ResultResponse::SUCCESS_CODE);
                $response->setMessage(ResultResponse::TKT_SUCCESS_CODE);
                $response->setData($cobranza);
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
