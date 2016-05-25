<?php
/**
 * Author: Parallax Technologies (pvt) Ltd
 * Email: info@parallax.lk
 * Contact: (+94)77 9436364
 * Date: 5/25/16
 * Time: 3:40 PM
 *
 * File Name: ApiResponserFacade.php
 * Project: genie
 * Copyright: Any unauthorised broadcasting, public performance, copying or re-recording will constitute an infringement of copyright.
 */

namespace PrllxTchz\ApiResponser;

use Illuminate\Support\Facades\Facade;

class ApiResponserFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ApiResponser';
    }
} 