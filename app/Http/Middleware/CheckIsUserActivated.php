<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Session;
use Carbon\Carbon;
use App\Models\Activation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use DB;

class CheckIsUserActivated
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (config('settings.activation')) {

            $user           = Auth::user();
            $currentRoute   = Route::currentRouteName();
            $routesAllowed  = [
                'activation-required',
                'activate/{token}',
                'activate',
                'activation',
                'exceeded',
                'authenticated.activate',
                'authenticated.activation-resend',
                'social/redirect/{provider}',
                'social/handle/{provider}',
                'logout',
                'welcome',
                'updateUserPassword',
                'updateUserPasswordDone',
            ];

            if (!in_array($currentRoute, $routesAllowed)) {
                if ($user && $user->activated != 1) {

                    Log::info('Non-activated user attempted to visit ' . $currentRoute . '. ', [$user]);

                    return redirect()->route('activation-required')
                        ->with([
                            'message' => 'Activation is required. ',
                            'status'  => 'danger'
                        ]);
                }

            }

            if ($user && $user->activated != 1) {

                $activationsCount = Activation::where('user_id', $user->id)
                    ->where('created_at', '>=', Carbon::now()->subHours(config('settings.timePeriod')))
                    ->count();

                if ($activationsCount >= config('settings.maxAttempts')) {

                    return redirect()->route('exceeded');

                }
            }

            if (in_array($currentRoute, $routesAllowed)) {

                if ($user && $user->activated == 1) {

                    Log::info('Activated user attempted to visit ' . $currentRoute . '. ', [$user]);

                    if ($user->isAdmin()) {
                        return redirect('home');
                    }

                    return redirect('home');

                }

                if (!$user) {

                    Log::info('Non registered visit to ' . $currentRoute . '. ');

                    return redirect()->route('welcome');

                }

            }
        }

        #if user created by admin and user has yet to update their admin assigned password
        #force them
        
        if ($user && $user->activated == 1 && is_null($user->adminCreatedPass) == false) {
            #echo '<pre>';
            #dd($request->route()->uri);
            #echo '</pre>';
            $thisUrl = $request->route()->uri;
        
            if(strpos($thisUrl, 'Password') == false){
                #return ' no updateUserPassword';

                return redirect()->route('accountSettings')
                        ->with([
                            'message' => 'Because your account was setup by our admin you must change your password. Better safe than sorry.',
                            'status'  => 'danger'
                        ]);
            }else{
                
                DB::table('users')->where('id', '=', $user->id)->update(['adminCreatedPass' => null]);
                #return $next($request);

            }
            return $next($request);
        }
        
        return $next($request);

    }
}