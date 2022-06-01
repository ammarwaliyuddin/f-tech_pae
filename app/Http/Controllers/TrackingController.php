<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tracking;

class TrackingController extends Controller
{
    public function index()
    { 
        
        return view('dashboard.tracking');
    }

    public function list(){     
        $trackings = Tracking::all();
        
        return view('dashboard.view.list_tracking',compact('trackings'));
    }

}
