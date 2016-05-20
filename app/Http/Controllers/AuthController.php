<?php namespace App\Http\Controllers;
use Hash;
use Config;
use Validator;
use \Firebase\JWT\JWT;
use Illuminate\Http\Request;
use GuzzleHttp;
use GuzzleHttp\Subscriber\Oauth\Oauth1;
use App\User;
use Auth;
use Response;

class AuthController extends Controller {
    /**
     * Generate JSON Web Token.
     */
    protected function createToken($user)
    {
        $payload = [
            'sub' => $user->id,
            'iat' => time(),
            'exp' => time() + (2 * 7 * 24 * 60 * 60)
        ];
        return JWT::encode($payload, Config::get('app.token_secret'));
    }


    /**
     * Unlink provider.
     */
    public function unlink(Request $request, $provider)
    {
        $user = User::find($request['user']['sub']);
        if (!$user)
        {
            return response()->json(['message' => 'User not found']);
        }
        $user->$provider = '';
        $user->save();
        
        return response()->json(array('token' => $this->createToken($user)));
    }
    /**
     * Log in with Email and Password.
     */
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::where('email', '=', $email)
                ->orWhere('userId','=',$email)
                ->first();
                
        if (!$user)
        {
            //Notification::success('Нэр болон нууц үгээ зөв оруулна уу!');
           // return redirect()->back();
            $request->session()->flash('alert-danger', 'Нэр болон нууц үгээ зөв оруулна уу!.', 200);
            return redirect()->back();
        }
        if (Hash::check($password, $user->password))
        {
        	Auth::login($user);
            unset($user->password);
            return redirect()->intended('dashboard');
            //return response()->json(['token' => $this->createToken($user)]);
        }
        else
        {
            $request->session()->flash('alert-warning', 'Нууц үгээ зөв оруулна уу!.', 200);
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
    	Auth::logout();
        //unset($user->password);
        //return view('auth.login',[]);
        return redirect()->intended('/');
    }
    /**
     * Create Email and Password Account.
     */
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'displayName' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => $validator->messages()], 400);
        }
        $user = new User;
        $user->displayName = $request->input('displayName');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return response()->json(['token' => $this->createToken($user)]);
    }

    public function password(Request $request)
    {
        if (Hash::check($request->oldPassword, Auth::user()->password))
        {
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->verifyPassword);
            $user->save();
            return Response::json(['status' => 'success']);
        }
        else
        {
            return Response::json(['status' => '_notValid']);
        }
    }
}