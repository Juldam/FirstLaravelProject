@include('head')

<body>

    @if(Session::has('usuario_borrado'))
        {{ session('usuario_borrado')}}
        {{Session::forget('usuario_borrado')}}
    @endif
    

    <div class="container">

        <h1>PAGINA PRINCIPAL DEL ADMINISTRADOR</h1>


        <table class="table table-bordered table-striped" width="300px">
            <tr class="bg-info" style="color:white">
                <th>Id</th>
                <th>Foto</th>
                <th>Role_id</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Creado</th>
                <th>Actualizado</th>
            </tr>

            @if($users)
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                @if($user->foto)
                <td><img src="../images/{{$user->foto->ruta_foto}}" alt="Foto de usuario" width="100px"></td>
                @else
                <td><img src="../images/nouser.jpg" alt="Usuario sin foto" width="100px"></td>
                @endif
                <td>{{$user->role_id}}</td>
                <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->updated_at}}</td>
            </tr>
            @endforeach
            @endif

        </table>

    </div>



</body>

</html>