<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.usuarios.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $roles = Role::all();
        return view('admin.usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //
        try {
            DB::beginTransaction();

            //Encriptar contraseña
            $fieldHash = Hash::make($request->password);
            //Modificar el valor de password en nuestro request
            $request->merge(['password' => $fieldHash]);

            //Crear usuario
            $user = User::create($request->all());

            //Asignar su rol
            $user->assignRole($request->role);


            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('usuarios.index')->with('success', 'usuario registrado');


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

        $usuario = User::findOrFail($id);

        return view('admin.usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user_id)
    {
        //
        $user_id = User::find($request->hidden_id);
        $user_id->name = $request->name;
        $user_id->email = $request->email;
        $user_id->password = $request->password;

        $user_id->save();

        try {
            DB::beginTransaction();

            /*Comprobar el password y aplicar el Hash*/
            if (empty($request->password)) {
                $request = Arr::except($request, array('password'));
            } else {
                $fieldHash = Hash::make($request->password);
                $request->merge(['password' => $fieldHash]);
            }

            $user_id->update($request->all());

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('usuarios.index')->with('success','Usuario editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
