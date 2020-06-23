<?php

namespace App\Observers;

use App\Todo;
use Illuminate\Support\Facades\Auth;

class TodoObserver
{
    /**
     * Handle the todo "created" event.
     *
     * @param  \App\Todo  $todo
     * @return void
     */
    public function created(Todo $todo)
    {
        //
    }
    public function creating(Todo $todo)
    {
            $todo->user_id = Auth::id();
    }

    /**
     * Handle the todo "updated" event.
     *
     * @param  \App\Todo  $todo
     * @return void
     */
    public function updated(Todo $todo)
    {
        //
    }

    /**
     * Handle the todo "deleted" event.
     *
     * @param  \App\Todo  $todo
     * @return void
     */
    public function deleted(Todo $todo)
    {
        //
    }

    /**
     * Handle the todo "restored" event.
     *
     * @param  \App\Todo  $todo
     * @return void
     */
    public function restored(Todo $todo)
    {
        //
    }

    /**
     * Handle the todo "force deleted" event.
     *
     * @param  \App\Todo  $todo
     * @return void
     */
    public function forceDeleted(Todo $todo)
    {
        //
    }
}
