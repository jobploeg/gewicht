<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LogController extends Controller
{
    public function index()
    {
        $logs = Auth::user()->logs;

        $gewicht = $logs->pluck('gewicht');
        $dates = $logs->pluck('toegevoegd');

        return view('dashboard', compact('logs', 'gewicht', 'dates'));
    }

    public function create()
    {
        return view('dashboard');
    }

    public function store(Request $request)
    {
        $gewicht = $request->gewicht;
        $lengte= Auth::user()->lengte;

        $lengte = $lengte * $lengte;
        $bmi = $gewicht / $lengte;
        $currentTime = Carbon::now();


        $log = new Log();
        $log->user_id = Auth::user()->id;
        $log->gewicht = $request->gewicht;
        $log->bmi = $bmi;
        $log->toegevoegd = $currentTime->format('m/d/Y');
        $log->save();


        return redirect('/dashboard')->with('success','gewicht is toegevoegd!');
    }

    public function destroy(Log $log)
    {
        $log->delete();
        return redirect('/dashboard')->with('success','Post deleted successfully!');
    }
}
