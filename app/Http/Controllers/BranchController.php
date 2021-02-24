<?php

namespace App\Http\Controllers;

use App\Http\Requests\BranchRequest;
use App\Models\Branch_office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $table = 'branch';
    public function index()
    {
        $branchs = DB::table('branch_offices')
                    ->select('id','branch_office','direction','matrix')->paginate(10);
        return view($this->table.'.index', [
            'table' =>  $this->table,
            'title'=>'Listado de Sucursales',
            'data'=> $branchs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BranchRequest $request)
    {
        $validated = $request->validated();
        $branch = new Branch_office();
        $branch->branch_office = $validated['branch_office'];
        $branch->direction = $validated['direction'];
        $e = $branch->save();
        return redirect()->route($this->table.'.index')->with(($e)?'info':'danger',($e)?'Guardado con exito':'Ocurrio un problema al guardar el usuario intente de nuevo.');
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
        $obj = Branch_office::find($id);
        return view($this->table.'.edit', [
            'table' =>  $this->table,
            'title'=>'Editar Sucursal',
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
