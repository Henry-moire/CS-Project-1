<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Opportunity;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisterOpportunityController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('organization.organization_dashboard');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'tags' => ['required', 'string', 'max:255'],
            'schedule' => ['required', 'string', 'max:255'],
            'skills' => ['required', 'string', 'max:255'],
            'requirements' => ['required', 'string', 'max:255'],
            'no_of_volunteers_needed' => ['required', 'int', 'max:255'],
        ]);

        $opportunity = Opportunity::create([
            'title' => $request->title,
            'date' => $request->date,
            'location' => $request->location,
            'tags' => $request->tags,
            'schedule' => $request->schedule,
            'skills' => $request->skills,
            'requirements' => $request->requirements,
            'no_of_volunteers_needed' => $request->no_of_volunteers_needed,
        ]);
    }
}
