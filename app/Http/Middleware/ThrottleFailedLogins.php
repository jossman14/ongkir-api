<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;
use App\Interfaces\UserInterface;

class ThrottleFailedLogins
{
    protected $user;

    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = $this->user->findByEmail($request->email);

        if ($user && $user->login_attempts >= 3) {
            $lastLoginAttempt = $this->user->getLastLoginAttempt($user);
            $timeSinceLastLoginAttempt = Carbon::now()->diffInMinutes($lastLoginAttempt);

            if ($timeSinceLastLoginAttempt < 30) {
                return response()->json(['message' => 'You have reached max login attempts. Please try again after 30 minutes.'], 429);
            } else {

                $this->user->resetLoginAttempts($user);
            }
        }

        return $next($request);
    }
}
