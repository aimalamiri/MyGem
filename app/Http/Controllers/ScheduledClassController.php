<?php

namespace App\Http\Controllers;

use App\Models\ClassType;
use App\Models\ScheduledClass;
use Illuminate\Http\Request;

class ScheduledClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classTypes = ClassType::select(['id', 'name'])->get();
        return view('instructor.schedule', compact('classTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date_time = $request->get('date') . ' ' . $request->get('time');
        $request->merge([
            'date_time' => $date_time,
            'instructor_id' => auth()->user()->id,
        ]);

        $validated = $request->validate([
            'class_type_id' => 'required|exists:class_types,id',
            'instructor_id' => 'required|exists:users,id',
            'date_time' => 'required|unique:scheduled_classes,date_time|after:now',
        ]);

        $scheduledClass = ScheduledClass::create($validated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
