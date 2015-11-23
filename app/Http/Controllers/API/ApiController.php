<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class ApiController
 * @package App\Http\Controllers\API
 */
class ApiController extends MainController
{

    /**
     * @var int
     */
    protected $statusCode=200;

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     * @return $this
     */

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }


    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseNotFound($message='not found')
    {
       return $this->respondWithError($message);
    }


    /**
     * @param $data
     * @param array $header
     * @return \Illuminate\Http\JsonResponse
     */
    public function respond($data, $header = [])
    {
      return response()->json($data, $this->getStatusCode(),$header );
    }

    /**
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondWithError($message)
    {
        return $this->respond([

            'Error'=>[
                'message' => $message,
                'code'    => $this->getStatusCode()
            ]
        ]);

    }


}
