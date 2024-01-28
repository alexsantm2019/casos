<?php

namespace App\Http\Controllers\usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{

    public function index()
    {
        $users = Usuarios::all();
        return view('usuarios.index')->with(['usuarios' => Usuarios::paginate(10)]);
    }

    public function create()
    {
        return view(
            'usuarios/create',
            [
                'usuarios' => new Usuarios()
            ]
        );
    }

    public function store(Request $request)
    {
        $data = request()->all();
        $rulesFirstRequest = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',            
        ];

        $messageFirstRequest = array(
            'name' => 'Nombre es requerido',
            'email' => 'Correo es requerido',
            'password' => 'Contraseña es requerida',            
        );

        $validator1 = \Validator::make($request->all(), $rulesFirstRequest, $messageFirstRequest);

        // Almacenar la foto
        $photoPath = "";
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = 'images/users/' . time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images/users'), $photoPath);
        }else{
            $photoPath = 'images/users/default.jpeg';
        }

        if ($validator1->fails()) {
            return \Redirect::back()->withErrors($validator1)->withInput();
        } else {

            $users =  Usuarios::create([
                'name'          => $data['name'],
                'email'         => $data['email'],
                'password'      => Hash::make($data['password']),
                'created_at'    => Carbon::now(),
                'photo'         => $photoPath,
            ]);
        }

        toastr()->success('Usuario añadido correctamente', 'Success');

        return redirect()->route('usuarios.index');
    }

    public function edit(Usuarios $usuario)
    {
        $usuario = Usuarios::find($usuario->id);
        return view('usuarios/edit', [
            "usuarios" => $usuario
        ]);
    }

    public function update(Request $request, Usuarios $usuario)
    {       
        $data = request()->all();
        
        $rulesFirstRequest = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $messageFirstRequest = array(
            'name' => 'Nombre es requerido',
            'email' => 'Correo es requerido',
            'password' => 'Contraseña es requerida',
            'photo' => 'Imagen en formato inapropiado',
        );

        $validator1 = \Validator::make($request->all(), $rulesFirstRequest, $messageFirstRequest);

        if ($validator1->fails()) {
            return \Redirect::back()->withErrors($validator1)->withInput();
        } else {
         
            // Actualizar datos del usuario
            $usuario->name =$data['name'];
            $usuario->email = $data['email'];
            $usuario->password = Hash::make($data['password']);
            $usuario->updated_at = Carbon::now();

            // // Verificar si se proporcionó una nueva foto
            $photoPath ="";
            if ($request->hasFile('photo')) {
                $photoPath = $usuario->photo;
                if (!empty($usuario->photo) && file_exists(public_path($photoPath))) {                   
                    unlink(public_path($usuario->photo));
                }

                // Almacenar la nueva foto
                $photo = $request->file('photo');
                $photoPath = 'images/users/' . time() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('images/users'), $photoPath);
                $usuario->photo = $photoPath;
            }else{
                $photoPath = 'images/users/default.jpeg';
                $usuario->photo = $photoPath;
            }

            // // Guardar los cambios en la base de datos
            $usuario->save();

            toastr()->success('Usuario actualizado correctamente', 'Success');
            return redirect()->route('usuarios.index');
        }
    }

    public function destroy(Request $request, Usuarios $usuario)
    {
        $usuario->delete();
        toastr()->success('Usuario eliminado correctamente', 'Success');
        return back();
    }

}
