<?php

namespace App\Http\Controllers;

use App\Http\Requests\CabbageUserRequest;
use App\Models\Cabbage;
use Illuminate\Http\Request;

class CabbageUserController extends Controller
{
    public function store(CabbageUserRequest $request, Cabbage $cabbage)
    {
        $cabbage->createCabbageUser($request->validated());

        return redirect('/');
    }
}
