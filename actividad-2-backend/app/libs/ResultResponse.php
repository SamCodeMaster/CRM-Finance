<?php
namespace App\libs;

class ResultResponse{

    const SUCCESS_CODE = 200;
    const ERROR_CODE = 300;
    const ERROR_ELEMENT_NOT_FOUNO_CODE = 404;

    const TKT_SUCCESS_CODE = "Success";
    const TKT_ERROR_CODE = "Error";
    const TKT_ERROR_ELEMENT_NOT_FOUND_CODE = "Element not found";

    public $statusCode;
    public $message;
    public $data;


    function __construct() {
        $this->statusCode = seLf::ERROR_CODE;
        $this->message = 'Error';
    }


    /**
     * Get the value of statusCode
     */ 
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Set the value of statusCode
     *
     * @return  self
     */ 
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }


    /**
     * Get the value of data
     */ 
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @return  self
     */ 
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }


}

?>