<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

use App\Images;

class ImagenesController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // Storage::disk('images')->put('file.txt', 'Contents');
        // echo asset('storage/images/file.txt');
        $images = DB::table('images')->orderBy('id', 'DESC')->get();
        return view('principal', array(
          'titulo' => "Principal",
          'principal' => true,
          'images' => $images,
          'mostrar' => false,

        ));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('subir', array(
          'titulo' => "Subir imagen",
          'principal' => false
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
              'img' => 'required|mimes:jpeg,jpg,png',
        ]);

        $last = DB::table('images')->orderBy('id', 'DESC')->first();
        $number = $last != null ? $last->id + 1 : 1;
        $filename = $request->user()->username."_".$number.'.'.$request->file('img')->extension();
        $path = Storage::disk('images')->putFileAs(
          $request->user()->username, $request->file('img'),
          $filename);

        $imagen = DB::table('images')->insert([
          'id_user' => $request->user()->id,
          'image' => $filename,
          'descripcion' => $request->input('desc'),
          'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        return redirect()->action('ImagenesController@index');
    }

    public function like($id) {
      if (Images::find($id) != null) {
        $user_id = Auth::user()->id;
        $liked = Images::find($id)->likes->where('id_user', $user_id)->first() == null;
        if ($liked){
          DB::table('likes')->insert([
            'id_user' => $user_id,
            'id_image' => $id,
          ]);
        } else {
          DB::table('likes')->where('id_user', $user_id)->where('id_image', $id)->delete();
        }
      }
      return redirect()->action('ImagenesController@index');
    }

    public function comment(Request $request) {
      DB::table('comments')->insert([
        'id_user' => $request->user()->id,
        'id_image' => $request->image,
        'descripcion' => $request->comentario,
        'created_at' => Carbon::now()->toDateTimeString(),
      ]);
      return redirect('/p/'.$request->image);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
      $image = Images::find($id);
      if ($image != null) {
        return view('image', array(
          'titulo' => "Imagen - " . $image->descripcion,
          'principal' => true,
          'image' => $image,
          'mostrar' => true,
        ));
      } else {
        return redirect()->action('ImagenesController@index');
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
      $image = Images::find($id);

      if ($image->id_user == $request->user()->id) {
        DB::table('images')->where('id', $id)->update([
          'descripcion' => $request->descripcion
        ]);
      }
      return redirect('/p/'.$id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
      $img = Images::find($id);
      if ($img != null && $img->id_user == Auth::user()->id) {
        Storage::disk('images')->delete(Auth::user()->username.'/'.$img->image);
        DB::table('images')->where('id', $id)->delete();
      }

      return redirect()->action('ImagenesController@index');
    }
}
