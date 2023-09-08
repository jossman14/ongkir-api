<?php

namespace App\Interfaces;

interface UserInterface
{
    public function findByEmail($email);

    public function incrementLoginAttempts($user);

    public function resetLoginAttempts($user);

    public function setLastLoginAttempt($user);

    public function getLastLoginAttempt($user);
}
