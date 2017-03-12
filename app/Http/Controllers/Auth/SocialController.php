<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use Socialite;

class SocialController extends Controller
{
    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect()->back();
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $fbUser
     * @return User
     */
    private function findOrCreateUser($fbUser)
    {

        if ($authUser = User::where('email', $fbUser->email)->first()) {

            if (!$authUser->facebook_id) {
                $authUser->update(['facebook_id' => $fbUser->id]);
            }
            if (!$authUser->avatar) {
                $authUser->update(['avatar' => $fbUser->avatar]);
            }

            return $authUser;
        }

        return User::create([
            'name' => $fbUser->name,
            'email' => $fbUser->email,
            'facebook_id' => $fbUser->id,
            'avatar' => $fbUser->avatar,
            'password' => '',
        ]);

    }
}
