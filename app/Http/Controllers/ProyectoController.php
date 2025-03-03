<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;


class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $proyectos = Proyecto::all();
        return view('proyectos.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proyectos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'horas_previstas' => 'required|integer|min:1',
            'fecha_de_comienzo' => 'required|date',
        ]);

        Proyecto::create($request->all());

        return redirect()->route('proyectos.index')
            ->with('success', 'El proyecto ha sido creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proyecto $proyecto)
    {
        return view('proyectos.show', compact('proyecto'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('proyectos.edit', compact('proyecto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'horas_previstas' => 'required|integer|min:1',
            'fecha_de_comienzo' => 'required|date',
        ]);

        $proyecto->update($request->all());

        return redirect()->route('proyectos.index')
            ->with('success', 'El proyecto ha sido actualizado con éxito.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyecto $proyecto) // 🔹 Corrige el tipo de parámetro
    {
        $proyecto->delete();

        return redirect()->route('proyectos.index')
            ->with('success', 'El proyecto ha sido eliminado correctamente.');
    }
}
