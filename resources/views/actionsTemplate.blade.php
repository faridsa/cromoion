@can($gateKey.'view')
    <a href="{{ route($routeKey.'.show', $row->id) }}"
       class="btn btn-xs btn-primary">Ver</a>
@endcan
@can($gateKey.'edit')
    <a href="{{ route($routeKey.'.edit', $row->id) }}" class="btn btn-xs btn-info">Modificar</a>
@endcan
@can($gateKey.'delete')
    {!! Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'DELETE',
        'onsubmit' => "return confirm('Está segur@?');",
        'route' => [$routeKey.'.destroy', $row->id])) !!}
    {!! Form::submit('Borrar', array('class' => 'btn btn-xs btn-danger')) !!}
    {!! Form::close() !!}
@endcan