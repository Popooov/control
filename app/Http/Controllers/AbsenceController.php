<?php

namespace App\Http\Controllers;

use App\Mail\AbsencePosted;
use App\Models\Absence;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absences = Absence::with('user')->latest()->paginate(12);

        return view('absences.index', [
            'absences' => $absences
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('absences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        request()->validate([
            'prueba' => ['required', 'min:1'],
            'reason' => ['required', 'min:3'],
        ]);
        
        $absence = Absence::create([
            'user_id' => Auth::getUser()->id,
            'prueba' => request('prueba'),
            'reason' => request('reason'),
        ]);
        
        Mail::to($absence->user)
            ->send(new AbsencePosted($absence));
        
        return redirect('/absences');
    }

    /**
     * Display the specified resource.
     */
    public function show(Absence $absence)
    {
        return view('absences.show', ['absence' => $absence]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absence $absence)
    {
        return view('absences.edit', ['absence' => $absence]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Absence $absence)
    {
        request()->validate([
            'date' => ['required', 'date'],
            'reason' => ['required', 'min:3'],
        ]);
        
        Absence::create([
            'user_id' => Auth::getUser()->id,
            'date' => request('date'),
            'reason' => request('reason'),
        ]);

        return redirect('/absences/' . $absence->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absence $absence)
    {
        $absence->delete();

        return redirect('/absences');
    }
}
