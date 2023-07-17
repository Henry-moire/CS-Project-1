<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opportunities;

class OpportunitiesController extends Controller
{
    public function index(Request $request)
    {
        $opportunities = Opportunities::where([
            ['id', '!=', Null],
            [function ($query) use ($request) {
                if (($s = $request->s)) {
                    $query->orWhere('title', 'LIKE', '%' . $s . '%')
                        ->orWhere('date', 'LIKE', '%' . $s . '%')
                        ->orWhere('location', 'LIKE', '%' . $s . '%')
                        ->orWhere('tags', 'LIKE', '%' . $s . '%')
                        ->orWhere('schedule', 'LIKE', '%' . $s . '%')
                        ->orWhere('skills', 'LIKE', '%' . $s . '%')
                        ->orWhere('requirements', 'LIKE', '%' . $s . '%')
                        ->get();
                }
            }]
        ])->paginate(6);

        return view('opportunities', compact('opportunities'));
    }
}
