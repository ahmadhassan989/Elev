<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HealthCheckController extends Controller
{
 
    public function check()
    {
        
        return response()->json(['status' => 'Server is running'], 200);
    }
}
