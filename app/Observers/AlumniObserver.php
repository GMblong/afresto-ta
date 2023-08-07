<?php

namespace App\Observers;

use App\Models\Alumni;
use Illuminate\Support\Str;

class AlumniObserver
{
    /**
     * Handle the Alumni "created" event.
     */
    public function created(Alumni $alumni): void
    {
        // Generate random password
        do {
            $randomPassword = Str::random(6);
        } while (Alumni::where('password', $randomPassword)->exists());

        $alumni->password = $randomPassword;
    }

    /**
     * Handle the Alumni "updated" event.
     */
    public function updated(Alumni $alumni): void
    {
        //
    }

    /**
     * Handle the Alumni "deleted" event.
     */
    public function deleted(Alumni $alumni): void
    {
        //
    }

    /**
     * Handle the Alumni "restored" event.
     */
    public function restored(Alumni $alumni): void
    {
        //
    }

    /**
     * Handle the Alumni "force deleted" event.
     */
    public function forceDeleted(Alumni $alumni): void
    {
        //
    }
}
