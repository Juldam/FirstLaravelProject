@include('head')

<body>
    <div class="jumbotron">
        <h1>Página para editar los usuarios</h1>
        <p>Aquí puede modificar los datos de los usuarios registrados en la base de datos</p>
    </div>

    {!! Form::model($user, ['method' => 'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}
    <table class="table table-bordered">
        <tr>
            <td>
                {!! Form::label('name', 'Nombre:')!!}
            </td>
            <td>
                {!! Form::text('name')!!}
            </td>
        </tr>
        <tr>
            <td>
                {!! Form::label('email', 'Email:')!!}
            </td>
            <td>
                {!! Form::text('email')!!}
            </td>
        </tr>
        <tr>
            <td>
                {!! Form::label('email', 'Verificar email:')!!}
            </td>
            <td>
                {!! Form::text('email_verified_at')!!}
            </td>
        </tr>
        <tr>
            <td>
                {!! Form::label('role', 'Role:')!!}
            </td>
            <td>
                {!! Form::text('role_id')!!}
            </td>
        </tr>
        <tr>
            <!--<td>
                {!! Form::label('foto', 'Fotografía:')!!}
            </td>-->
            @if($user->foto)
            {{$image=$user->foto->ruta_foto}}
            <td><img src='{{asset("../public/images/$image")}}' alt="Foto de usuario" width="100px"></td>
            @else
            <td><img src="{{asset('../public/images/nouser.jpg')}}" alt="Usuario sin foto" width="100px"></td>
            @endif

            <td>
                {!! Form::file('foto_id', ['class'=>'btn btn-primary'])!!}
            </td>
        </tr>

        <tr>
            <td>
                {!! Form::submit('Modificar usuario', ['class'=>'btn btn-success'])!!}
            </td>
            <td>
                {!! Form::reset('Limpiar formulario', ['class'=>'btn btn-primary'])!!}
            </td>
        </tr>

    </table>
    {!! Form::close() !!}

    {!! Form::model($user, ['method' => 'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}

    <table>
        <tr>
            <td>
                {!! Form::submit('Eliminar usuario', ['class' => 'btn btn-danger'])!!}
            </td>
        </tr>
    </table>
    {!! Form::close() !!}



</body>

</html>