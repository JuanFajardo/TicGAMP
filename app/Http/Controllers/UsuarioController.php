<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

class UsuarioController extends Controller
{
  public function __construct(){
    /*$this->middleware('auth');

    if( \Auth::guest() )
      return redirect('index.php/login');
    elseif(\Auth::user()->grupo_id != 2 && \Auth::user()->grupo_id != 3 && \Auth::user()->grupo_id != 1)
      return abort(503);
      */
  }

  public function index(){
        $usuarios = User::all();
        return view('auth.lista')->with('usuarios', $usuarios);
  }

  public function showRegistrationForm(){
      return view('auth.register');
  }

  protected function validator(array $data)
  {
      return Validator::make($data, [
          'nombre' => 'required|max:255',
          'paterno' => 'required|max:255',
          'materno' => 'required|max:255',
          'ci' => 'required|numeric',
          'unidad' => 'required|max:255',
          'cargo' => 'required|max:255',
          'imei' => 'required|max:255',
          'grupo' => 'required|max:255',
          'username' => 'required|max:255|unique:users',
          'password' => 'required|confirmed|min:6',

      ]);
  }

  protected function create(Request $data){
      User::create([
          'username' => $data['username'],
          'password' => bcrypt($data['password']),
          'unidad'   => $data['unidad'],
          'nombre'   => $data['nombre'],
          'paterno'   => $data['paterno'],
          'materno'   => $data['materno'],
          'ci'   => $data['ci'],
          'imei'   => $data['imei'],
          'cargo'   => $data['cargo'],
          'grupo'   => $data['grupo'],
      ]);
      return redirect('/usuarios');
  }

  public function edit($id){
    $user = User::find($id);
    return view('auth.editar', compact('user'));
  }

  public function update(Request $request, $id){
    $user = User::find($id);
    $user->username = $request->input('username');
    $user->unidad   = $request->input('unidad');
    $user->nombre   = $request->input('nombre');
    $user->paterno  = $request->input('paterno');
    $user->materno  = $request->input('materno');
    $user->ci       = $request->input('ci');
    $user->imei     = $request->input('imei');
    $user->cargo    = $request->input('cargo');
    $user->grupo    = $request->input('grupo');
    if( strlen($request->input('password')) > 0 )
      $user->password = bcrypt($request->input('password'));
    $user->save();
    return  redirect('/usuarios');
  }

  public function viewuser($id){
    $user = User::find($id);
    return view('auth.ver', compact('user'));
  }

  public function delete($id){/*
    $user = User::find($id);
    $user->delete();
    return redirect()->action('Auth\AuthController@index');*/
  }

  public function profile(Request $request){
    $id = \Auth::user()->id;
    $user = User::find($id);
    return view('auth.profile', compact('user'));
  }

  public function profileActulizar(Request $request){
    $id = \Auth::user()->id;
    $user = User::find($id);
    $estado = false;
    if($request->input('estado') == 'on'){
        $estado = true;
    }
    $user->name       = $request->input('name');
    $user->email      = $request->input('email');
    if( strlen($request->input('password')) > 0 )
      $user->password = bcrypt($request->input('password'));
    $user->grupo_id   = $request->input('grupo_id');
    $user->nombres    = $request->input('nombres');
    $user->apellidos  = $request->input('apellidos');
    $user->ci         = $request->input('ci');
    $user->direccion  = $request->input('direccion');
    $user->telefono   = $request->input('telefono');
    $user->observacion= $request->input('observacion');
    $user->estado     = $estado;
    $user->save();
    return  redirect('usuarios/info/ver?msj=1');
  }

}
