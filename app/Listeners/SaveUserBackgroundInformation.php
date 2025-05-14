<?php

namespace App\Listeners;

use App\Events\UserSaved;
use App\Services\UserService;

class SaveUserBackgroundInformation
{
    protected $userService;

    /**
     * Create the event listener.
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Handle the event.
     */
    public function handle(UserSaved $event)
    {
        $this->userService->saveUserDetails($event->user);
    }
}
