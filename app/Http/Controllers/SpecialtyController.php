<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialty;

class SpecialtyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3'
        ];
        $messages =[
            'name.required' => 'Necesario Agregar un nombre',
            'name.min'=> 'El nombre tiene que tener como minimo 3 letras'
        ];
        $this->validate($request,$rules,$messages);
        //dd($request->all());
        $specialty = new Specialty();
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();

        //
        return redirect('/specialties');
    }


}
