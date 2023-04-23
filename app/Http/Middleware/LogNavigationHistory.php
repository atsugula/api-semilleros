<?php

namespace App\Http\Middleware;

use App\Models\NavigationHistory;
use App\Traits\UserDataTrait;
use Illuminate\Http\Request;
use Closure;

class LogNavigationHistory
{
    use UserDataTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $exceptRoute = "have-access";
        $user_id = $this->getIdUserAuth();
        $currentRoute = $request->route()->getName();

        if ($currentRoute != $exceptRoute) {
            $history = new NavigationHistory();
            $history->user_id = $user_id;
            $history->url = $currentRoute;
            $history->save();
        }

        return $next($request);
    }
}
