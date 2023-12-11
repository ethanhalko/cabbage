<?php

namespace App\Http\Controllers;

use App\Models\Cabbage;
use App\Models\CabbageUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class CabbageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'max:75',
            'type' => 'exists:cabbage_types,id'
        ]);

        $cabbage = Cabbage::create([
            'cabbage_type_id' => $request->type,
            'created_by' => Auth::user()->id
        ]);

        CabbageUser::create([
            'user_id' => $cabbage->created_by,
            'amount' => $request->amount,
            'cabbage_id' => $cabbage->id
        ]);
    }

    public function addUser(Request $request, Cabbage $cabbage)
    {
        $user = Auth::user();
        $request->validate([
            'user_id' => ['required', 'exists:users,id', Rule::excludeIf($request->user_id === $user->id)]
        ]);

        return $cabbage;
    }
}
