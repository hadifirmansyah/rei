{!! Form::open(['route' => 'auth.register.post']) !!}
    {!! Form::email('email', null, ['placeholder' => 'example@example.com']) !!}
    {!! Form::text('first_name', null, ['placeholder' => 'First Name']) !!}
    {!! Form::text('last_name', null, ['placeholder' => 'Last Name']) !!}
    {!! Form::password('password', ['placeholder' => 'Password']) !!}
    {!! Form::password('password_confirmation', ['placeholder' => 'Password Confirmation']) !!}
    {!! Form::submit('Register') !!}
{!! Form::close() !!}