<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{

    /**
     * @SWG\Swagger(
     *     basePath="/api/v1",
     *     @SWG\Info(
     *         version="1.0.0",
     *         title="Roster Management System API",
     *         description="Complete HR Management System",
     *         @SWG\Contact(
     *             email="omprakash.jagri@bidhee.com"
     *         ),
     *     )
     * )
     */


    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
