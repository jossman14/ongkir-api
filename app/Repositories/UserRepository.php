<?php
namespace App\Repositories;

use App\Models\User;
use App\Interfaces\UserInterface;

class UserRepository implements UserInterface
{
    public function findByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    public function incrementLoginAttempts($user)
    {
        $user->login_attempts += 1;
        $user->save();
    }

    public function resetLoginAttempts($user)
    {
        $user->login_attempts = 0;
        $user->save();
    }

    public function setLastLoginAttempt($user)
    {
        $user->last_login_attempt_at = now();
        $user->save();
    }

    public function getLastLoginAttempt($user)
    {
        return $user->last_login_attempt_at;
    }
}
