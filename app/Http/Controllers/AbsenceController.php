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
        $hours = [
            // Bloque de la mañana
            '08:00-08:50 - 1ª hora (mañana)',
            '08:50-09:40 - 2ª hora (mañana)',
            '09:40-10:30 - 3ª hora (mañana)',
            '10:30-10:50 - Recreo (mañana)',
            '10:50-11:40 - 4ª hora (mañana)',
            '11:40-12:30 - 5ª hora (mañana)',
            '12:30-13:20 - 6ª hora (mañana)',
        
            // Recreo intermedio
            '13:20-13:50 - Recreo (mediodía)',
        
            // Bloque de la tarde
            '13:50-14:40 - 1ª hora (tarde)',
            '14:40-15:30 - 2ª hora (tarde)',
            '15:30-16:20 - 3ª hora (tarde)',
            '16:20-17:10 - 4ª hora (tarde)',
            '17:10-18:00 - 5ª hora (tarde)',
            '18:00-18:50 - 6ª hora (tarde)',
        ];

        return view('absences.create', ['hours' => $hours]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        request()->validate([
            'date' => ['required', 'date'],
            'hour' => ['required'],
            'comment' => ['required', 'min:5'],
        ]);
        
        $absence = Absence::create([
            'user_id' => Auth::getUser()->id,
            'date' => request('date'),
            'hour' => ['required'],
            'comment' => request('comment'),
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
        $hours = [
            // Bloque de la mañana
            '08:00-08:50 - 1ª hora (mañana)',
            '08:50-09:40 - 2ª hora (mañana)',
            '09:40-10:30 - 3ª hora (mañana)',
            '10:30-10:50 - Recreo (mañana)',
            '10:50-11:40 - 4ª hora (mañana)',
            '11:40-12:30 - 5ª hora (mañana)',
            '12:30-13:20 - 6ª hora (mañana)',
        
            // Recreo intermedio
            '13:20-13:50 - Recreo (mediodía)',
        
            // Bloque de la tarde
            '13:50-14:40 - 1ª hora (tarde)',
            '14:40-15:30 - 2ª hora (tarde)',
            '15:30-16:20 - 3ª hora (tarde)',
            '16:20-17:10 - 4ª hora (tarde)',
            '17:10-18:00 - 5ª hora (tarde)',
            '18:00-18:50 - 6ª hora (tarde)',
        ];

        return view('absences.edit', ['absence' => $absence, 'hours' => $hours]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Absence $absence)
    {
        request()->validate([
            'date' => ['required', 'date'],
            'hour' => ['required'],
            'comment' => ['required', 'min:5'],
        ]);
        
        Absence::create([
            'user_id' => Auth::getUser()->id,
            'date' => request('date'),
            'hour' => ['required'],
            'comment' => request('comment'),
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
