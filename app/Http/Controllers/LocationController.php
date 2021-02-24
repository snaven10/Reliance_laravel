<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationRequest;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $table = 'location';
    public function index()
    {
        $users = DB::table('locations')
            ->select('*')
            ->paginate(10);
        return view(
            $this->table.'.index',[
                'table' =>  $this->table,
                'title'=>'Listado de estantes',
                'data'=> $users
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            $this->table.'.create',[
                'table' =>  $this->table,
                'title'=>'Agregar Estante',
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationRequest $request)
    {
        $validated = $request->validated();
        $obj = new Location();
        $obj->code = $validated['code'];
        $obj->shelvest = $validated['shelvest'];
        $e = $obj->save();
        return redirect()->route(
            $this->table.'.index')->with(
                ($e)?'info':'danger',
                ($e)?'Guardado con exito':'Ocurrio un problema al guardar el usuario intente de nuevo.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = Location::find($id);
        return view($this->table.'.edit', [
            'table' =>  $this->table,
            'title'=>'Editar Estantes',
            'data'=> $obj
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LocationRequest $request, $id)
    {
        $valid = $request->validated();
        $obj = Location::find($id);
        $obj->code = $valid['code'];
        $obj->shelvest = $valid['shelvest'];
        $e = $obj->save();
        return redirect()->route(
            $this->table.'.index')->with(
                ($e)?'info':'danger',
                ($e)?'Se edito un registro con exito.':'Ocurrio un problema al editar el User intente de nuevo.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Location::findOrFail($id);
        $e = $obj->delete();
        return redirect()->route(
            $this->table.'.index')->with(
                ($e)?'info':'danger',
                ($e)?'Se borro un registro correctamente.':'Ocurrio un error al borrar el registro... Intente de nuevo'
        );
    }
}
