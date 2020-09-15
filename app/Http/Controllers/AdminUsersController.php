<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Foto;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('admin.users.index', compact('users')); //Este string dentro de compact 'users' hace referencia a la variable anterior $users
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $entrada=$request->all();

        //SI HAY FOTO HAGO ESTO PARA GUARDARLA:
        if($archivo=$request->file('foto_id')){
            $nombre=$archivo->getClientOriginalName();
            $archivo->move('images', $nombre);
            $foto=Foto::create(['ruta_foto'=>$nombre]);
            $entrada['foto_id']=$foto->id;
        }else{
            //Si no ha introducido nada como foto, ponemos null para que lo almacene como null en la base de datos.
            $entrada['foto_id']=null;
        }

        //Antes de almacenar en la base de datos encriptamos con BCrypt la contraseña:
        $entrada['password']=bcrypt($request->password);

        User::create($entrada);

        return redirect('/admin/users');
        
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
     *  Muestra el formulario que servirá para editar la información del usuario y que en el action lo enviará a la función update
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user=User::findOrFail($id);
        return view('admin.users.edit', compact('user')); //Este 'user' es el $user. admin.users.edit no es lo mismo que admin.users.create, en la primera tiene hecho un method PATCH (PUT) y en la última un POST
    }

    /**
     * Update the specified resource in storage.
     * Esta función actualiza la información que le viene de la función edit, actualizando la información en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user=User::findOrFail($id);

        $entrada=$request->all();

        //SI HAY FOTO HAGO ESTO PARA GUARDARLA:
        if($archivo=$request->file('foto_id')){
            $nombre=$archivo->getClientOriginalName();
            $archivo->move('images', $nombre);
            $foto=Foto::create(['ruta_foto'=>$nombre]);
            $entrada['foto_id']=$foto->id;
        }else{
            //Si no ha introducido nada como foto, ponemos null para que lo almacene como null en la base de datos.
            $entrada['foto_id']=null;
        }

        
        
        //Esto no se puede hacer!! porque estamos diciendo que actualice todos los modelos de User con la información dada
        //User::update($entrada);
    
        $user->update($entrada);

        //En teoría también se podría hacer así, pero no me sale, dice que hay un campo que no se reconoce:
        //User::where('id', $id)->update($request->all());

        return redirect('/admin/users');
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
        $user=User::findOrFail($id)->delete();
        //$user->delete();

        //Esto es para mostrar un mensaje:
        Session::flash('usuario_borrado', 'El usuario ha sido eliminado con éxito');

        return redirect('/admin/users');
    }
}
