<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB;

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
    protected $redirectTo = 'busqueda';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }


    public function ActivatedValidator($request)
    {
      $datos = DB::table('users')->where('email',$request['email'])->first();
      if ($datos==null){
        return true;
      }elseif ($datos->is_activated ==0)
      {
        return false;
          // return response()->json(['error'=>array([
          //   'code'=>422,'message'=>'Verifique su bandeja de correos para activar su cuenta.Su cuenta no esta activa'])],422);

      }
      return true;
    }
}
