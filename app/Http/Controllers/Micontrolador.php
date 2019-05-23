<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Vista;
use App\Http\Requests\Storevistarequest;

class Micontrolador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin','user']); //autorizan a todos los roles que sean administradores

        // return view('vistas/entrenar');
        $vista=Vista::all();
        return view('vistas.index',compact("vista"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('vistas.entrenar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storevistarequest $request)
    {
//aca validaremos nuestros datos
// $validatedData = $request->validate([
//     'name'  =>'required|max:10',
//     'avatar'=>'required|image',
//     'slug'  =>'required'
// ]);


//nos trabaja nuestro archivo que se subira
        if ($request->hasFile('avatar')) {
            
            $file=$request->file('avatar');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);//recibe el lugar donde recibira el archivo
            // return $name;
        }
        // return $request;
        // return $request->all();

        $vista=new Vista();
        $vista->nombre=$request->input('name');
        $vista->slug=$request->input('slug');
        $vista->avatar=$name;
        $vista->comentario=$request->input('comentario');
        $vista->save(); 
        //return 'guardado';

        return redirect()->route('vistas.index')->with('status','Se ha agregado un nuevo entrenador');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug){
    // {
    //     $vista=Vista::find($slug);
        $vista=Vista::where('slug','=',$slug)->firstOrFail();
        return view('vistas.show',compact('vista'));
        
        //return "tengo que retornar el recurso con el id".$id;
    }

    /**
     * Show the form for editing the specif ied resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       $vista=Vista::where('slug','=',$id)->firstOrFail();
       return view('vistas.editar',compact('vista'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$slug)

    {

      $vista = Vista::where('slug','=',$slug)->firstOrFail();

      if ($request->hasFile('avatar') ){
        $file=$request->file('avatar');
        $name= time().$file->getClientOriginalName();
        $file->move(public_path().'/images/',$name);
        $vista->avatar = $name;
    }

    $vista->nombre = $request->input('name');
    $vista->slug=$request->input('slug');
    $vista->comentario = $request->input('comentario');
    $vista->save();
    // return 'Registro modificado con éxito...';
    return redirect()->route('vistas.show',[$vista->slug])->with('status','Entrenador actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        

        $vista=Vista::where('slug','=',$slug)->firstOrFail();


        //borramos nuestro archivo file (la foto) 
        $file_path=public_path().'/images/'.$vista->avatar;
        \File::delete($file_path);
  

        $vista->delete();
        // return "ha sido eliminado!!";
        return redirect()->route('vistas.index')->with('status','Ha sido eliminado');;
    }
}
