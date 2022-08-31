<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ChartJSController extends Controller
{
    public function index()
    {
        $gewicht = Log::all()->pluck('gewicht');

        $bmi = Log::all()->pluck('bmi');

        $dates = Log::all()->pluck('toegevoegd');

        return view('stats',  compact('gewicht', 'dates', 'bmi'));
    }
}
