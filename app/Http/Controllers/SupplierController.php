<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $table = "supplier";
    public function index()
    {
        $data = DB::table('suppliers')
            ->select('*')
            ->paginate(10);
        return view(
            $this->table.'.index',[
                'table' =>  $this->table,
                'title'=>'Listado de proveedores',
                'data'=> $data
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
                'title'=>'Agregar proveedores',
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierRequest $request)
    {
        $valid = $request->validated();
        $obj = new Supplier();
        $obj->name = $valid['name'];
        $obj->nit_company = $valid['nit_company'];
        $obj->phone = $valid['phone'];
        $obj->addres = $valid['addres'];
        $obj->email = $valid['email'];
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
        $obj = Supplier::find($id);
        return view(
            $this->table.'.edit',[
                'table' => $this->table,
                'title'=> 'Editar proveedores',
                'data'=> $obj,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupplierRequest $request, $id)
    {
        $valid = $request->validated();
        $obj = Supplier::find($id);
        $obj->name = $valid['name'];
        $obj->nit_company = $valid['nit_company'];
        $obj->phone = $valid['phone'];
        $obj->addres = $valid['addres'];
        $obj->email = $valid['email'];
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
        $obj = Supplier::findOrFail($id);
        $e = $obj->delete();
        return redirect()->route(
            $this->table.'.index')->with(
                ($e)?'info':'danger',
                ($e)?'Se borro un registro correctamente.':'Ocurrio un error al borrar el registro... Intente de nuevo'
        );
    }
}
