<?php

namespace App\Http\Controllers;

use App\Models\Cabbage;
use Exception;
use App\Models\CabbageType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cabbages = $user?->cabbages;
        $cabbages = Cabbage::formatCabbagesForDashboard($cabbages);

        $types = CabbageType::all()->map(fn($cabbage) => ['label' => Str::title($cabbage->type), 'value' => $cabbage->id]);

        return Inertia::render('Dashboard', [
            'cabbageTypes' => $types,
            'cabbages' => $cabbages,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }
}
