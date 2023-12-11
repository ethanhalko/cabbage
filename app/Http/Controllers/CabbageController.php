<?php

namespace App\Http\Controllers;

use App\Http\Requests\CabbageRequest;
use App\Models\Cabbage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CabbageController extends Controller
{
    public function store(CabbageRequest $request)
    {
        $user = Auth::user();
        $cabbage = Cabbage::create(['cabbage_type_id' => $request->type, 'owner_id' => Auth::user()->id]);
        $cabbage->createCabbageUser(collect(['user_id' => $cabbage->owner_id, 'amount' => $request->amount]));
        $cabbages = $user?->cabbages;
        return redirect('/');
    }

    public function destroy(Cabbage $cabbage)
    {
        $cabbage->delete();

        return redirect()->route('home')->with('message', 'Cabbage deleted');
    }
}

