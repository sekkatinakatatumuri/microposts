@if (Auth::user()->is_favorite($micropost->id))
    {!! Form::open(['route' => ['user.unfavorite', $micropost->id], 'method' => 'delete']) !!}
        {!! Form::submit('unfavorite', ['class' => "btn btn-warning btn-xs btn-xs--extend"]) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['user.favorite', $micropost->id], 'method' => 'post']) !!}
        {!! Form::submit('favorite', ['class' => "btn btn-success btn-xs btn-xs--extend"]) !!}
    {!! Form::close() !!}
@endif