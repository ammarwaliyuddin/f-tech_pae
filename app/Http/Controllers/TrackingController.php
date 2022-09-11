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

    public function list(Request $request){     

        $searching = $request->input('searching');
        
        $trackings = empty($searching) ? Tracking::latest()->paginate(10) : Tracking::where('no_resi','like','%'.$searching.'%')->paginate(10);
        
        return view('dashboard.view.list_tracking',compact('trackings'));
    }

}
