<?php

namespace App\Http\Controllers\Auth;

use App\Models\Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'cpf'=> 'required|string|min:11|max:11|unique:usuario',
            'nome' => 'required|string|max:255',
            'fone' => 'string|max:12',
            'celular' => 'required|string|max:13',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
            'tipoAcesso' => 'required|integer|min:0|max:2',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Usuario::create([
            'cpf' => $data ['cpf'],
            'nome' => $data['nome'],
            'fone' => $data['fone'],
            'celular' => $data['celular'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'tipoAcesso' => $data['tipoAcesso'],
        ]);
    }
}
