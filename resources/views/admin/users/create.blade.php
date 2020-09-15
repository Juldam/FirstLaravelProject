@include('head')

<body>
    <div class="jumbotron">
        <h1>Pagina CREATE del administrador</h1>
        <p>Aquí puede agregar los usuarios a la base de datos.</p>
    </div>

    {!! Form::open(['method' => 'POST', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}
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
                {!! Form::label('password', 'Password:')!!}
            </td>
            <td>
                {!! Form::password('password')!!}
            </td>
        </tr>
        <tr>
            <td>
                {!! Form::label('email', 'Email:')!!}
            </td>
            <td>
                {!! Form::text('email', 'ejemplo@email.com')!!}
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
        <tr>
            <td>
                {!! Form::label('foto', 'Fotografía:')!!}
            </td>
            <td>
                {!! Form::file('foto_id')!!}
            </td>
        </tr>
        <tr>
            <td>
                {!! Form::submit('Crear usuario', ['class' => 'btn btn-success'])!!}
            </td>
            <td>
                {!! Form::reset('Limpiar formulario', ['class' => 'btn btn-primary'])!!}
            </td>
        </tr>
    </table>
    {!! Form::close() !!}

</body>

</html>