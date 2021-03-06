<?php
/**
 * Author: Parallax Technologies (pvt) Ltd
 * Email: info@parallax.lk
 * Contact: (+94)77 9436364
 * Date: 5/25/16
 * Time: 3:40 PM
 * File Name: ApiResponser.php
 * Project: genie
 * Copyright: Any unauthorised broadcasting, public performance, copying or re-recording will constitute an
 * infringement of copyright.
 */

namespace PrllxTchz\ApiResponser;

/**
 * Class ApiResponser
 * @package PrllxTchz\ApiResponser
 */
class ApiResponser {

    /**
     * @var int
     */
    protected $statesCode = 200;

    /**
     * @var array
     */
    protected $headers;

    protected $accessHeaders = [
        'Access-Control-Allow-Headers'     => 'Content-Type, Auth-Token',
        'Access-Control-Allow-Methods'     => 'POST, GET, OPTIONS, DELETE, PUT',
        'Access-Control-Max-Age'           => '600',
        'Access-Control-Allow-Credentials' => 'true'
    ];

    /**
     * @return array
     */
    private function getHeaders() {
        return $this->headers;
    }

    /**
     * @param array $headers
     */
    private function setHeaders( $headers ) {
        $this->headers = $headers;
    }

    /**
     * @return mixed
     */
    private function getStatesCode() {
        return $this->statesCode;
    }

    /**
     * @param mixed $statesCode
     * @return $this
     */
    private function setStatesCode( $statesCode ) {
        $this->statesCode = $statesCode;

        return $this;
    }

    /**
     * Add any additional headers to be sent.
     */
    private function setAdditionalHeaders() {
        $this->accessHeaders = array_merge( $this->accessHeaders,
            [
                'X-Frame-Options'             => 'DENY',
                'Access-Control-Allow-Origin' => config( 'app.origin' )
            ]
        );
    }

    /**
     * @param       $data
     * @param int   $status
     * @param array $headers
     * @param bool  $addAccessHeaders
     * @return \Illuminate\Http\JsonResponse
     */
    public function respond( $data, $status = 200, $headers = [], $addAccessHeaders = TRUE ) {
        $this->setStatesCode( $status );
        $this->setHeaders( $headers );
        $this->setAdditionalHeaders();

        $addAccessHeaders ? $this->setHeaders( $this->accessHeaders ) : NULL;

        return response()->json( $data, $this->getStatesCode(), $this->getHeaders() );
    }

}
