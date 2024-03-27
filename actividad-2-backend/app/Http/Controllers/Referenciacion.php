<?php

namespace App\Http\Controllers;

use App\libs\ResultResponse;
use App\Models\Referenciacion as ModelsReferenciacion;
use DateTime;
use Exception;
use Illuminate\Http\Request;

class Referenciacion extends Controller
{
    function getAll(){
        $response = new ResultResponse();

        try{
            $referenciacion = ModelsReferenciacion::all();
            if($referenciacion){
                $response->setStatusCode(ResultResponse::SUCCESS_CODE);
                $response->setMessage(ResultResponse::TKT_SUCCESS_CODE);
                $response->setData($referenciacion);
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
            $referenciacion = ModelsReferenciacion::insert(
                ['estado' => $data->estado,
                'comercializacione_id' => $data->comercializacione_id,
                'empleado_id' => $data->empleado_id,
                'created_at' => $date,
                'updated_at' => $date
                ]
            );
            $response->setStatusCode(ResultResponse::SUCCESS_CODE);
            $response->setMessage(ResultResponse::TKT_SUCCESS_CODE);
            $response->setData($referenciacion);
        }catch(Exception $e){
            $response->setStatusCode(ResultResponse::ERROR_CODE);
            $response->setMessage(ResultResponse::TKT_ERROR_CODE);
        }

        return response()->json($response);
    }

    function delete($pId){
        $response = new ResultResponse();
        try{
            $referenciacion = ModelsReferenciacion::find($pId);
            if($referenciacion){
                $referenciacion->delete();
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
            
            $referenciacion = ModelsReferenciacion::find($pId);
            
            if($referenciacion){
                $referenciacion->estado = $data->estado;
                $referenciacion->empleado_id = $data->empleado_id;
                $referenciacion->updated_at = $date;

                $referenciacion->save();

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
            $referenciacion = ModelsReferenciacion::find($pId);
            if($referenciacion){
                $response->setStatusCode(ResultResponse::SUCCESS_CODE);
                $response->setMessage(ResultResponse::TKT_SUCCESS_CODE);
                $response->setData($referenciacion);
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
            $referenciacion = ModelsReferenciacion::where('empleado_id',$pEmpleadoId);
            if($referenciacion){
                $response->setStatusCode(ResultResponse::SUCCESS_CODE);
                $response->setMessage(ResultResponse::TKT_SUCCESS_CODE);
                $response->setData($referenciacion);
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

    function findByEstado($pEstado){
        $response = new ResultResponse();
        try{
            $referenciacion = ModelsReferenciacion::where('estado',$pEstado);
            if($referenciacion){
                $response->setStatusCode(ResultResponse::SUCCESS_CODE);
                $response->setMessage(ResultResponse::TKT_SUCCESS_CODE);
                $response->setData($referenciacion);
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
