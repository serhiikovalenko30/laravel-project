<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Socialite;
use Auth;

class OAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->stateless()->user();
        } catch (Exception $e) {
            return redirect()->route('login');
        }
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect(RouteServiceProvider::HOME);
    }

    public function findOrCreateUser($user, $provider)	{
        $authUser = User::where('email', $user->email)->first();
        if ($authUser) {
            if(empty($authUser->provider)) {
                $authUser->provider = $provider;
                $authUser->provider_id = $user->id;
                $authUser->save();
            }
            return $authUser;
        } else {
            $authUser = User::where('provider_id', $user->id)->first();
            if ($authUser) {
                return $authUser;
            } else {
                return User::create([
                    'name' 	=> $user->name,
                    'email'	=> $user->email,
                    'password' => 'password',
                    'provider' => $provider,
                    'provider_id' => $user->id
                ]);
            }
        }
    }



}
