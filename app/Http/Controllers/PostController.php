<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index(User $user)

    {
    
        
        return view('dashboard', [
            'user'=> $user
        ]);
    }

    //Crear metodo create para mostrar el formulario d publicacion
    public function create(){
        //dd('Creando post');
        return view('post.create');
    }

  //Método para guardar imágenes
  public function store(Request $request) {
    $this->validate($request, [
        'titulo' => 'required|max:255',
        'descripcion' => 'required',
        'imagen' => 'required'
    ]);
}
}