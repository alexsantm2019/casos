<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('users.index')->with(['users' => User::paginate(5)]);
    }

    public function create()
    {
        return view(
            'users/create',
            [
                'users' => new User()
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
            'password' => 'Contraseña',            
        );

        $validator1 = \Validator::make($request->all(), $rulesFirstRequest, $messageFirstRequest);

        // Almacenar la foto
        // Almacenar la foto
        // $photo = $request->file('photo');
        // $photoPath = 'images/users/' . time() . '.' . $photo->getClientOriginalExtension();
        // $photo->move(public_path('users'), $photoPath);



        if ($validator1->fails()) {
            return \Redirect::back()->withErrors($validator1)->withInput();
        } else {

            $users =  User::create([
                'name'          => $data['name'],
                'email'         => $data['email'],
                'password'      => Hash::make($data['password']),
                'created_at'    => Carbon::now(),
                // 'photo'         => $photoPath,
            ]);
        }

        toastr()->success('Usuario añadido correctamente', 'Success');

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        $user = User::find($user->id);
        return view('users/edit', [
            "users" => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $rulesFirstRequest = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $messageFirstRequest = array(
            'name' => 'Nombre es requerido',
            'email' => 'Correo es requerido',
            'password' => 'Contraseña',
            'photo' => 'Imagen en formato inapropiado',
        );

        $validator1 = \Validator::make($request->all(), $rulesFirstRequest, $messageFirstRequest);

        if ($validator1->fails()) {
            return \Redirect::back()->withErrors($validator1)->withInput();
        } else {

            $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ]);


            // Actualizar datos del usuario
            // $user->name = $request->input('name');
            // $user->email = $request->input('email');
            // $user->password = $request->input('password');

            // // Verificar si se proporcionó una nueva foto
            // if ($request->hasFile('photo')) {
            //     // Eliminar la foto anterior si existe
            //     if (File::exists(public_path($user->photo))) {
            //         File::delete(public_path($user->photo));
            //     }

            //     // Almacenar la nueva foto
            //     $photo = $request->file('photo');
            //     $photoPath = 'images/users/' . time() . '.' . $photo->getClientOriginalExtension();
            //     $photo->move(public_path('users'), $photoPath);
            //     $user->photo = $photoPath;
            // }

            // // Guardar los cambios en la base de datos
            // $user->save();



            toastr()->success('Usuario actualizado correctamente', 'Success');
            return redirect()->route('users.index');
        }
    }

    public function destroy(Request $request, User $user)
    {
        $user->delete();
        toastr()->success('Usuario eliminado correctamente', 'Success');
        return back();
    }


    // public function index()
    // {
    //     $users = User::all();
    //     return view('users.index', compact('users'));
    // }

    // public function create()
    // {
    //     return view('users.create');
    // }

    // public function store(Request $request)
    // {
    //     // Validar y guardar el nuevo usuario
    // }

    // public function edit($id)
    // {
    //     $user = User::find($id);
    //     return view('users.edit', compact('user'));
    // }

    // public function update(Request $request, $id)
    // {
    //     // Validar y actualizar el usuario
    // }

    // public function destroy($id)
    // {
    //     // Eliminar el usuario
    // }
}
