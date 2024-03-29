<?php

namespace App\Http\Controllers;

use App\libs\ResultResponse;
use App\Models\Rol as ModelsRol;
use DateTime;
use Exception;
use Illuminate\Http\Request;

class Rol extends Controller
{
    function getAll(){
        $response = new ResultResponse();
        try{
            $rol = ModelsRol::all();
            if($rol){
                $response->setStatusCode(ResultResponse::SUCCESS_CODE);
                $response->setMessage(ResultResponse::TKT_SUCCESS_CODE);
                $response->setData($rol);
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
            $rol = ModelsRol::insert(
                ['nombre_rol' => $data->nombre_rol,
                'descripcion' => $data->descripcion,
                'created_at' => $date,
                'updated_at' => $date]
            );
            $response->setStatusCode(ResultResponse::SUCCESS_CODE);
            $response->setMessage(ResultResponse::TKT_SUCCESS_CODE);
            $response->setData($rol);
        }catch(Exception $e){
            $response->setStatusCode(ResultResponse::ERROR_CODE);
            $response->setMessage(ResultResponse::TKT_ERROR_CODE);
        }

        return response()->json($response);
    }

    function delete($pId){
        $response = new ResultResponse();
        try{
            $rol = ModelsRol::find($pId);
            if($rol){
                $rol->delete();
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
            
            $rol = ModelsRol::find($pId);
            
            if($rol){
                $rol->nombre_rol = $data->nombre_rol;
                $rol->descripcion = $data->descripcion;
                $rol->updated_at = $date;
                $rol->save();

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
            $rol = ModelsRol::find($pId);
            if($rol){
                $response->setStatusCode(ResultResponse::SUCCESS_CODE);
                $response->setMessage(ResultResponse::TKT_SUCCESS_CODE);
                $response->setData($rol);
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
