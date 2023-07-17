<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opportunities;

class OpportunitiesController extends Controller
{
    function show()
    {
        $opportunitiesList = Opportunities::all();
        return view('opportunities', ['opportunities' => $opportunitiesList]);
    }
}
