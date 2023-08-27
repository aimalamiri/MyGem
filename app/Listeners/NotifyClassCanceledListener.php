<?php

namespace App\Listeners;

use App\Events\ClassCanceledEvent;
use App\Mail\ClassCacneledMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class NotifyClassCanceledListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ClassCanceledEvent $event): void
    {
        $members = $event->scheduledClass->members();

        $className = $event->scheduledClass->classType->name;
        $dateTime = $event->scheduledClass->date_time;

        $details = compact('className', 'dateTime');

        $members->each(function ($user) use ($details) {
            Mail::to($user)->send(new ClassCacneledMail($details));
        });
    }
}
