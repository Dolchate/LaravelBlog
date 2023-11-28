<?php

namespace App\Listeners;

use App\Events\CategoryUsedEvent;
use App\Mail\CategoryUsedMail;
use App\Mail\WelcomeMail;
use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class CategoryUsedListener
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
    public function handle(CategoryUsedEvent $event): void
    {
//        Mail::to('fake@gmail.com')->send(new WelcomeMail());

        $category = $event->category;

        $users = User::all();

        foreach ($users as $user) {
            if ($category->user_id == $user->id) {
                $mailAddress = $user->email;
                $userInterested = $user;
            }
        }
        // send email to the user who created the category
        Mail::to($mailAddress)->send(new CategoryUsedMail($category,$userInterested));
    }
}
