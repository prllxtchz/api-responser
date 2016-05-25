<?php
/**
 * Author: Parallax Technologies (pvt) Ltd
 * Email: info@parallax.lk
 * Contact: (+94)77 9436364
 * Date: 5/25/16
 * Time: 3:40 PM
 *
 * File Name: ApiResponser.php
 * Project: genie
 * Copyright: Any unauthorised broadcasting, public performance, copying or re-recording will constitute an infringement of copyright.
 */

namespace PrllxTchz\ApiResponser;


class ApiResponser
{

    /**
     * @var int
     */
    protected $statesCode = 200;

    /**
     * @return mixed
     */
    public function getStatesCode()
    {
        return $this->statesCode;
    }

    /**
     * @param mixed $statesCode
     * @return $this
     */
    public function setStatesCode($statesCode)
    {
        $this->statesCode = $statesCode;

        return $this;
    }

    /**
     * @param string $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondNotFound($msg = 'Not Found')
    {
        return $this->setStatesCode('404')->respondWithError($msg);
    }


    /**
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function respond($data)
    {
        return response()->json($data, $this->getStatesCode());
    }

    public function respondWithError($msg)
    {
        return $this->respond([
            'error' => $msg
        ]);
    }


    /**
     * @param $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondCreated($msg)
    {
        return $this->setStatesCode(201)->respond([
            'message' => $msg
        ]);
    }

} 