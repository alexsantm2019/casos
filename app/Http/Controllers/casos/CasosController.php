<?php

namespace App\Http\Controllers\casos;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Casos;
use Carbon\Carbon;

class CasosController extends Controller
{
    public function index()
    {
        $casos = DB::table('casos')
        ->select('casos.*', 'users.name as nombre_usuario', 
        DB::raw('CASE 
            WHEN casos.estado = 1 THEN "Abierto"
            WHEN casos.estado = 2 THEN "En Proceso"
            WHEN casos.estado = 3 THEN "Cerrado"
            ELSE "Desconocido" END as nombre_estado'))
        ->join('users', 'casos.users_id', '=', 'users.id')
        ->paginate(10);
        
        return view('casos.index')->with(['casos' => $casos]);
    }

    public function create()
    {
        $estados = [
            1 => 'Abierto',
            2 => 'En Proceso',
            3 => 'Cerrado',
        ];

        return view('casos/create',
        [   
            'casos' => new Casos(), 
            'estados' => $estados        
        ]);
    }

    public function store(Request $request)
    {
        $data = request()->all();
        $rulesFirstRequest = [
            'titulo'=>'required',
            'descripcion'=>'required',            
            'estado'=>'required',            
        ];

        $messageFirstRequest = array(
            'titulo' => 'Título no puede ser nulo.',
            'descripcion' => 'Descripción no puede ser nula',
            'estado' => 'Estado no puede ser nulo',
       );

        $validator1 = \Validator::make($request->all(), $rulesFirstRequest, $messageFirstRequest);

        if ($validator1->fails()) {
            return \Redirect::back()->withErrors($validator1)->withInput();
        } else {

            $casos =  Casos::create([
                'titulo'            => $data['titulo'],
                'descripcion'       => $data['descripcion'],
                'estado'            => $data['estado'],
                'users_id'          => \Auth::id(),
                'fecha_creacion'    => Carbon::now(),                
            ]);
        }
        
        toastr()->success('Caso añadido correctamente', 'Success');  
        
        return redirect()->route('casos.index');        
    }

    public function edit(Casos $caso)
    {
        $titulo = "Editar Caso Cabin";        

        $estados = [
            1 => 'Abierto',
            2 => 'En Proceso',
            3 => 'Cerrado',
        ];

        $caso = Casos::find($caso->id);
        
        return view('casos/edit', [
            "casos" => $caso,
            'estados' => $estados,
            'titulo' => $titulo
        ]);
    }

    public function update(Request $request, Casos $caso)
    {
        $rulesFirstRequest = [
            'titulo'=>'required',
            'descripcion'=>'required',            
            'estado'=>'required',            
        ];

        $messageFirstRequest = array(
            'titulo' => 'Título no puede ser nulo.',
            'descripcion' => 'Descripción no puede ser nula',
            'estado' => 'Estado no puede ser nulo',
       );

        $validator1 = \Validator::make($request->all(), $rulesFirstRequest, $messageFirstRequest);

        if ($validator1->fails()) {
            return \Redirect::back()->withErrors($validator1)->withInput();
        } else {

            $caso->update([
                'titulo' => $request->input('titulo'),
                'descripcion' => $request->input('descripcion'),
                'estado' => $request->input('estado'),
            ]);

            toastr()->success('Caso actualizado correctamente', 'Success');  
            return redirect()->route('casos.index');
        }       
    }

    public function destroy(Request $request, Casos $caso)
    {
        $caso->delete();
        toastr()->success('Caso eliminado correctamente', 'Success');  
        return back();
    }
}
