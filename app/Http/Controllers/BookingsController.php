<?php

namespace App\Http\Controllers;

use App\Models\ScheduledClass;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
   public function index()
   {
       $bookings = auth()->user()->bookings()->upcoming()->get();

       return view('member.upcoming', compact('bookings'));
   }

    public function create()
    {
        $scheduledClasses = ScheduledClass::upcoming()
            ->notBooked()
            ->with('classType', 'instructor')
            ->oldest()
            ->get();
        return view('member.book', compact('scheduledClasses'));
    }

    public function store(Request $request)
    {
        auth()->user()->bookings()->attach($request->get('scheduled_class_id'));

        return redirect()->route('bookings.index');
    }

    public function destroy(int $id)
    {
        auth()->user()->bookings()->detach($id);

        return redirect()->route('bookings.index');
    }
}
