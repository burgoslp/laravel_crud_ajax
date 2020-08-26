<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\personaRequest;
use App\persona;
class personaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listing(){
        $personas=persona::all();
        return  response()->json($personas->toArray());
        
    }

    public function index()
    {   
       
        return view('personas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(personaRequest $request)
    {
        if($request->ajax()){
            $persona=persona::create($request->all());
            $persona->save();

           return  response()->json(['respuesta' => $request->all()]);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $persona=persona::findOrFail($id);

        return response()->json($persona->toArray());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $persona=persona::find($id);
        $persona->update($request->all());
        $persona->save();
        return  response()->json(['msj' => 'actualizado']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona=persona::find($id);
        $persona->delete();  

        return  response()->json(['msj' => "borrado"]);
    }


    public function Search(Request $request){


        $persona=persona::all()->where('cedula',$request->cedula);

        return response()->json($persona->toArray());
    }
}
