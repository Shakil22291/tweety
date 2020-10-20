<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function index()
    {
        return view('explore.index', [
            'users' => auth()->user()->unFollows()
        ]);
    }
}
