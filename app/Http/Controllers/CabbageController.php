<?php

namespace App\Http\Controllers;

use App\Http\Requests\CabbageRequest;
use App\Models\Cabbage;
use Illuminate\Http\RedirectResponse;

class CabbageController extends Controller
{
    public function store(CabbageRequest $request): RedirectResponse
    {
        $cabbage = Cabbage::create(['cabbage_type_id' => $request->type, 'owner_id' => $request->user()->id]);
        $cabbage->createCabbageUser(collect(['user_id' => $cabbage->owner_id, 'amount' => $request->amount]));

        return redirect('/');
    }

    public function destroy(Cabbage $cabbage): RedirectResponse
    {
        $cabbage->delete();

        return redirect()->route('home')->with('message', 'Cabbage deleted');
    }
}

