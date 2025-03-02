<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePersonalRequest;
use App\Http\Requests\UpdatePersonalRequest;
use App\Models\Dependencia;
use App\Models\Personal_policial;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $personal = Personal_policial::all();
       
        return view('admin.personal_policial.index', compact('personal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $dependencias = Dependencia::all();

        $roles = Role::all();

        return view('admin.personal_policial.create', compact('dependencias', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePersonalRequest $request)
    {
        //

        $user = User::create([
            'name' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
            'tipo_usuario' => 'policia', 
        ]);

        $user->assignRole('policia');

        $policial = Personal_policial::create($request->validated() + [
            'nombre' => $request->nombre,
            'cedula' => $request->cedula,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'tipo_sangre' => $request->tipo_sangre,
            'ciudad_nacimiento' => $request->ciudad_nacimiento,
            'celular' => $request->celular,
            'rango' => $request->rango,
            'dependencia_id' => $request->dependencia_id,
            'email' => $request->email,
            'user_id' => $user->id,
        ]);

        $policial->saveOrFail();

        return redirect()->route('personal_policial.index')->with('success', 'personal policial registrado');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //

        $personal_pro = Personal_policial::findOrFail($id);

        return view('admin.personal_policial.edit', compact('personal_pro'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePersonalRequest $request, Personal_policial $poli)
    {
        //

        $poli = Personal_policial::find($request->hidden_id);
        
        $poli->cedula = $request->cedula;
        $poli->nombre = $request->nombre;
        $poli->fecha_nacimiento = $request-> fecha_nacimiento;
        $poli->tipo_sangre = $request-> tipo_sangre;
        $poli->ciudad_nacimiento = $request-> ciudad_nacimiento;
        $poli->celular = $request-> celular;
        $poli->rango = $request-> rango;
        $poli->save();

        return redirect()->route('personal_policial.index')->with('success', 'Personal Policial Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        
        Personal_policial::findOrFail($id)->delete();

        return redirect()->route('personal_policial.index')->with('eliminar', 'personal eliminado');
    }
}
