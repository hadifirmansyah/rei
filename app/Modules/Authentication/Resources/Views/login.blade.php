{!! Form::open(['route' => 'auth.login.post']) !!}
    {!! Form::email('email', null, ['placeholder' => 'example@example.com']) !!}
    {!! Form::password('password', ['placeholder' => 'Password']) !!}
    {!! Form::submit('Login') !!}
{!! Form::close() !!}