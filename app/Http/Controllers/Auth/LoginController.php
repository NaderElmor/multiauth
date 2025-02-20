<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }




        /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($service)
    {
        $user = Socialite::driver($service)->stateless()->user();

        $findUser = User::where('email', $user->getEmail())->first();

        //if this email exist
        if($findUser){
             Auth::login($findUser);   
        }else{ 
            if($service == 'github'){
                $newUser = User::create([
                    'name'         => $user->getNickname(),
                    'email'        => $user->getEmail(),
                    'avatar'       => $user->getAvatar(),
                    'providername' => $service
                    ]);
                    $newUser->save();

            } 
            if($service == 'facebook'){
                $newUser = User::create([
                    'name'         => $user->getName(),
                    'email'        => $user->getEmail(),
                    'avatar'       => $user->getAvatar(),
                    'providername' => $service
                    ]);
                    $newUser->save();

            }
           
      
        Auth::login($newUser);
        }
         return redirect('home');
      
}
}
