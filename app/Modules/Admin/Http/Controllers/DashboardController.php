<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
// use App\Modules\User\Repositories\UserInterface;

class DashboardController extends Controller
{

     
    public function index()
    {
       
        return view('admin::dashboard.index');
    }

    
}
