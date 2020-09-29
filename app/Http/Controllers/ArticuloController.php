<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;

class ArticuloController extends Controller
{

    public function index()
    {
        $articulos = Articulo::all();
        return view("articulos.index", compact("articulos"));
    }

    public function create()
    {
        return view('articulos.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required',
            'precio' => 'required'
        ]);
        $input = $request->all();
        if ($request->imagen) {
            $nombre = $request->imagen->getClientOriginalExtension();
            $filename = time() . "." . $nombre;
            $request->imagen->move('images', $filename);
            $input['imagen'] = $filename;
        }

        Articulo::create($input);
        return redirect("/articulos")->with('success', 'Artículo creado!');
    }


    public function show($id)
    {
        $articulo = Articulo::findOrFail($id);

        return view('articulos.show', compact('articulo'));
    }

    public function edit($id)
    {
        $articulo = Articulo::findOrFail($id);
        return view("articulos.edit", compact("articulo"));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'nombre' => 'required',
            'precio' => 'required'
        ]);



        $articulo = Articulo::findOrFail($id);
        $articulo->nombre = $request->input('nombre');
        $articulo->precio = $request->input('precio');


        if ($request->imagen) {
            //add new image
            $nombre = $request->imagen->getClientOriginalExtension();
            $filename = time() . "." . $nombre;
            $request->imagen->move('images', $filename);
            //update database
            $articulo->imagen = $filename;
        }
        $articulo->save();


        return redirect("/articulos")->with('success', 'Artículo actualizado!');
    }

    public function destroy($id)
    {
        $articulo = Articulo::findOrFail($id);
        $articulo->delete();
        return redirect("/articulos")->with('success', 'Artículo eliminado!');
    }
}
