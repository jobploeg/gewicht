<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ChartJSController extends Controller
{
    public function index()
    {
        $userData = Auth::user()->logs;

        $bmi = $userData->pluck('bmi');

        $gewicht = $userData->pluck('gewicht');

        $dates = $userData->pluck('toegevoegd');

        return view('stats',  compact('gewicht', 'dates', 'bmi'));
    }
}
