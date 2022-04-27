<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\models\Page;


class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
      
    }
   
    public function index(Request $request)
    {
       
        

    }

}

