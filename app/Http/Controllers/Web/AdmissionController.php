<?php

namespace App\Http\Controllers\Web;

use App\Models\Admission;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class AdmissionController extends Controller
{
    public function index(): View
    {
        return view('website.admissions.index');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'student_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'date_of_birth' => 'required|date',
            'grade_applying' => 'required|string|max:50',
            'message' => 'nullable|string|max:1000',
            'parent_name' => 'required|string|max:255',
            'parent_email' => 'required|email|max:255',
            'parent_phone' => 'required|string|max:20',
            'parent_address' => 'nullable|string|max:500',
        ]);

        Admission::create($validated);

        return redirect()->route('admissions.index')
            ->with('success', 'Application submitted successfully! We will review it shortly.');
    }
}
