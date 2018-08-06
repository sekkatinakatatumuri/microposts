@if (Auth::user()->id != $user->id)
    @if (Auth::user()->is_liking($user->id))
        {!! Form::open(['route' => ['users.unlike', $user->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unlike', ['class' => "btn btn-danger btn-xs"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['users.like', $user->id]]) !!}
            {!! Form::submit('Like', ['class' => "btn btn-primary btn-xs"]) !!}
        {!! Form::close() !!}
    @endif
@endif