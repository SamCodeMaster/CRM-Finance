<?php

namespace App\Http\Controllers;

use App\libs\ResultResponse;
use App\Models\Comercializacion as ModelsComercializacion;
use DateTime;
use Exception;
use Illuminate\Http\Request;

class Comercializacion extends Controller
{
    function getAll(){
        $response = new ResultResponse();

        try{
            $comercializacion = ModelsComercializacion::all();
            if($comercializacion){
                $response->setStatusCode(ResultResponse::SUCCESS_CODE);
                $response->setMessage(ResultResponse::TKT_SUCCESS_CODE);
                $response->setData($comercializacion);
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
            $comercializacion = ModelsComercializacion::insert(
                ['monto_credito' => $data->monto_credito,
                'numero_total_cuotas' => $data->numero_total_cuotas,
                'estado' => $data->estado,
                'empleado_id' => $data->empleado_id,
                'cliente_id' => $data->cliente_id,
                'credito_id' => $data->credito_id,
                'created_at' => $date,
                'updated_at' => $date
                ]
            );
            $response->setStatusCode(ResultResponse::SUCCESS_CODE);
            $response->setMessage(ResultResponse::TKT_SUCCESS_CODE);
            $response->setData($comercializacion);
        }catch(Exception $e){
            $response->setStatusCode(ResultResponse::ERROR_CODE);
            $response->setMessage(ResultResponse::TKT_ERROR_CODE);
        }

        return response()->json($response);
    }

    function delete($pId){
        $response = new ResultResponse();
        try{
            $comercializacion = ModelsComercializacion::find($pId);
            if($comercializacion){
                $comercializacion->delete();
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
            
            $comercializacion = ModelsComercializacion::find($pId);
            
            if($comercializacion){
                $comercializacion->monto_credito = $data->monto_credito;
                $comercializacion->numero_total_cuotas = $data->numero_total_cuotas;
                $comercializacion->estado = $data->estado;
                $comercializacion->empleado_id = $data->empleado_id;
                $comercializacion->cliente_id = $data->cliente_id;
                $comercializacion->credito_id = $data->credito_id;
                $comercializacion->updated_at = $date;

                $comercializacion->save();

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
            $comercializacion = ModelsComercializacion::find($pId);
            if($comercializacion){
                $response->setStatusCode(ResultResponse::SUCCESS_CODE);
                $response->setMessage(ResultResponse::TKT_SUCCESS_CODE);
                $response->setData($comercializacion);
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

    function findByEmpleadoId($pEmpleadoId){
        $response = new ResultResponse();
        try{
            $comercializacion = ModelsComercializacion::where('empleado_id',$pEmpleadoId);
            if($comercializacion){
                $response->setStatusCode(ResultResponse::SUCCESS_CODE);
                $response->setMessage(ResultResponse::TKT_SUCCESS_CODE);
                $response->setData($comercializacion);
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

    function findByClienteId($pClienteId){
        $response = new ResultResponse();
        try{
            $comercializacion = ModelsComercializacion::where('cliente_id',$pClienteId);
            if($comercializacion){
                $response->setStatusCode(ResultResponse::SUCCESS_CODE);
                $response->setMessage(ResultResponse::TKT_SUCCESS_CODE);
                $response->setData($comercializacion);
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

    function findByCreditoId($pCreditoId){
        $response = new ResultResponse();
        try{
            $comercializacion = ModelsComercializacion::where('credito_id',$pCreditoId);
            if($comercializacion){
                $response->setStatusCode(ResultResponse::SUCCESS_CODE);
                $response->setMessage(ResultResponse::TKT_SUCCESS_CODE);
                $response->setData($comercializacion);
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
