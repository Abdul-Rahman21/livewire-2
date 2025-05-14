<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function saveUserDetails(User $user)
    {
        $fullName = "{$user->firstname} {$user->middlename} {$user->lastname}";
        $middleInitial = strtoupper(substr($user->middlename, 0, 1)) . '.';
        $avatar = $user->photo ?? 'default-avatar.png';
        $gender = $user->prefixname === 'Mr.' ? 'Male' : 'Female';

        $details = [
            ['key' => 'full_name', 'value' => $fullName],
            ['key' => 'middle_initial', 'value' => $middleInitial],
            ['key' => 'avatar', 'value' => $avatar],
            ['key' => 'gender', 'value' => $gender],
        ];

        foreach ($details as $detail) {
            $user->details()->updateOrCreate(
                ['key' => $detail['key']],
                ['value' => $detail['value'], 'status' => '1', 'type' => 'detail']
            );
        }
    }
}
