<?php

namespace App\Http\Controllers;

use App\libs\ResultResponse;
use App\Models\Cliente as ModelsCliente;
use DateTime;
use Exception;
use Illuminate\Http\Request;

class Cliente extends Controller
{
    function getAll(){
        $response = new ResultResponse();
        try{
            $cliente = ModelsCliente::all();
            if($cliente){
                $response->setStatusCode(ResultResponse::SUCCESS_CODE);
                $response->setMessage(ResultResponse::TKT_SUCCESS_CODE);
                $response->setData($cliente);
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
            $cliente = ModelsCliente::insert(
                ['dni' => $data->dni,
                'nombre' => $data->nombre,
                'apellido' => $data->apellido,
                'telefono' => $data->telefono,
                'direccion' => $data->direccion,
                'correo' => $data->correo,
                'created_at' => $date,
                'updated_at' => $date]
            );
            $response->setStatusCode(ResultResponse::SUCCESS_CODE);
            $response->setMessage(ResultResponse::TKT_SUCCESS_CODE);
            $response->setData($cliente);
        }catch(Exception $e){
            $response->setStatusCode(ResultResponse::ERROR_CODE);
            $response->setMessage(ResultResponse::TKT_ERROR_CODE);
        }

        return response()->json($response);
    }

    function delete($pId){
        $response = new ResultResponse();
        try{
            $cliente = ModelsCliente::find($pId);
            if($cliente){
                $cliente->delete();
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
            
            $cliente = ModelsCliente::find($pId);
            
            if($cliente){
                $cliente->dni = $data->dni;
                $cliente->nombre = $data->nombre;
                $cliente->apellido = $data->apellido;
                $cliente->telefono = $data->telefono;
                $cliente->direccion = $data->direccion;
                $cliente->correo = $data->correo;
                $cliente->updated_at = $date;
                $cliente->save();

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
            $cliente = ModelsCliente::find($pId);
            if($cliente){
                $response->setStatusCode(ResultResponse::SUCCESS_CODE);
                $response->setMessage(ResultResponse::TKT_SUCCESS_CODE);
                $response->setData($cliente);
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

    function findByDni($pDni){
        $response = new ResultResponse();
        try{
            $cliente = ModelsCliente::where('dni',$pDni)->first();
            //dd($cliente);
            if($cliente){
                $response->setStatusCode(ResultResponse::SUCCESS_CODE);
                $response->setMessage(ResultResponse::TKT_SUCCESS_CODE);
                $response->setData($cliente);
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
