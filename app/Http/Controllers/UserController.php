<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $table = 'user';
    public function index()
    {
        $users = DB::table('users')
            ->leftJoin('model_has_roles','users.id','=','model_has_roles.model_id')
            ->select('users.*','model_has_roles.role_id')
            ->where('name','!=','SNAVEN')
            ->paginate(10);
        return view($this->table.'.index', [
            'table' =>  $this->table,
            'title'=>'Listado de usurios',
            'rol'=> Role::all()->where('id','>','1'),
            'data'=> $users
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->table.'.create', ['table' =>  $this->table, 'title'=>'Agregar Usurio']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $validated = $request->validated();
        $obj = new User();
        $obj->name = $validated['name'];
        $obj->email = $validated['email'];
        $obj->password = $validated['password'];
        $e = $obj->save();
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
        $obj = User::findOrFail($id);
        return view($this->table.'.edit', [
            'table' =>  $this->table,
            'title'=>'Editar User',
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
    public function update(UserRequest $request, $id)
    {
        $validated = $request->validated();
        $obj = User::find($id);
        $obj->name = $validated['name'];
        $obj->email = $validated['email'];
        $e = $obj->save();
        return redirect()->route($this->table.'.index')->with(($e)?'info':'danger',($e)?'Se edito un registro con exito. ':'Ocurrio un problema al editar el User intente de nuevo.');
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
