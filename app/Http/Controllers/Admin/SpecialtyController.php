<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Specialty;
use App\Http\Controllers\Controller;

class SpecialtyController extends Controller
{
    // midlecontroller  se omite esta parte
    //public function __construct()
    //{
     //   $this->middleware('auth');
   // }
    //
    public function index()
    {
        $specialties =  Specialty::all();
        return view('specialties.index', compact('specialties'));
    }
    public function create()
    {
        return view('specialties.create');
    }
    private function reglasValidacion(Request $request)
    {
        $rules = [
            'name' => 'required|min:3'
        ];
        $messages =[
            'name.required' => 'Necesario Agregar un nombre',
            'name.min'=> 'El nombre tiene que tener como minimo 3 letras'
        ];
        $this->validate($request,$rules,$messages);
    }
    public function store(Request $request)
    {
        $this->reglasValidacion($request);
        //dd($request->all());
        $specialty = new Specialty();
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();

        //
        $notificacion = 'Especialidad '.$specialty->name.' Registrada con Exito';
        return redirect('/specialties')->with(compact('notificacion'));
    }
    public function edit(Specialty $specialty)
    {
        return view('specialties.edit', compact('specialty'));
    }
    public function update(Request $request, Specialty $specialty)
    {
        $this->reglasValidacion($request);
        //dd($request->all());
        
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();

        //
        $notificacion = 'La Especialidad '.$specialty->name.' se ha actualizado exitosamente';
        return redirect('/specialties')->with(compact('notificacion'));
    }
    public function destroy(Specialty $specialty)
    {
        $eliminarEspecialidad = $specialty->name;
        $specialty->delete();
        $notificacion = 'La Especialidad '.$eliminarEspecialidad.' se ha eliminado exitosamente';
        return redirect('/specialties')->with(compact('notificacion'));
    }


}
