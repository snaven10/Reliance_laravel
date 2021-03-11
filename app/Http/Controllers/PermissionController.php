<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $table = "permission";
    public function index($search = "")
    {
        $data = DB::table('permissions')
                ->select('*')
                ->paginate(5);
        if ($search == "")
            return view(
                $this->table.'.index',[
                    'table' =>  $this->table,
                    'title'=>'Listado de permisos',
                    'searchs' => false,
                    'data'=> $data
                ]
            );
        return view(
            $this->table.'.search',[
                'table' =>  $this->table,
                'title'=>'Listado de permisos',
                'searchs' => false,
                'data'=> $data
            ]
        );
    }

    public function search(Request $r)
    {
        return view($this->table.'.search', [
            'table' =>  $this->table,
            'title' =>'Listado de permisos',
            'search' => true,
            'data'=> Permission::where('name', 'like', "%".$r->txtSearch."%")->take(5)->paginate(5)
            ]);
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
                'title'=>'Agregar permiso',
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        $valid = $request->validated();
        Permission::create(['name' => $valid['name']]);
        return redirect()->route(
            $this->table.'.index')->with('info','Guardado con exito');
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
        $obj = Permission::find($id);
        return view(
            $this->table.'.edit',[
                'table' => $this->table,
                'title'=> 'Editar permiso',
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

    }
}
