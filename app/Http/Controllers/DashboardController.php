<?php

namespace App\Http\Controllers;

use App\Models\Cabbage;
use App\Models\CabbageType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function index(Request $request): Response
    {
        $cabbages = $request->user()?->cabbages;
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
