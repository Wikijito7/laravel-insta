<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $table_user = DB::table('usuarios')->where('username', $id)->first();

        if ($table_user == null) {
          return redirect()->action('ImagenesController@index');
        }

        $user = User::find($table_user->id);
        return view('profile', array(
          'titulo' => "Perfil " . $user->username,
          'principal' => true,
          'user' => $user,
          'images' => $user->images,
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit() {
      $user = Auth::user();
      return view('config', array(
        'titulo' => "Editar perfil",
        'principal' => true,
        'user' => $user,
      ));
    }

    public function cambiarAvatar(Request $request) {
      $this->validate($request, [
        'img' => 'required|mimes:jpeg,jpg,png',
      ]);

      $filename = $request->user()->username.'.'.$request->file('img')->extension();

      Storage::disk('avatars')->putFileAs(
        '', $request->file('img'),
        $filename);

      DB::table('usuarios')->where('id', $request->user()->id)->update([
        'avatar' => $filename
      ]);
      return redirect()->action('ProfileController@edit');
    }

    public function eliminarAvatar() {
      $filename = $request->user()->username.'.'.$request->file('img')->extension();
      Storage::disk('images')->delete($filename);

      DB::table('usuarios')->where('id', $request->user()->id)->update([
        'avatar' => 'default/default-avatar.png'
      ]);
      return redirect()->action('ProfileController@edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
      DB::table('usuarios')->where('id', $request->user()->id)->update([
        'name' => $request->name,
        'email' => $request->email,
      ]);

      return redirect()->action('ProfileController@edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {}
}
