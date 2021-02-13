@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title"> <a href="{{ route('admin.library_categories.create') }}" class="btn btn-success pull-right">Agregar</a>Biblioteca / Categorías</h3>
           
       <div class="panel panel-default">
        <div class="panel-heading">
            Listado
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($library_categories) > 0 ? 'datatable' : '' }}">
                <thead>
                    <tr>
                        <th>Categoría</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($library_categories) > 0)
                        @foreach ($library_categories as $library_category)
                            <tr data-entry-id="{{ $library_category->id }}">
                                <td field-key='name'>{{ $library_category->name }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('library_category_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('Está segur@?');",
                                        'route' => ['admin.library_categories.restore', $library_category->id])) !!}
                                    {!! Form::submit('Recuperar', array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('library_category_delete')
                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('Está segur@?');",
                                        'route' => ['admin.library_categories.perma_del', $library_category->id])) !!}
                                    {!! Form::submit('Eliminar', array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>

                                    @can('library_category_edit')
                                    <a href="{{ route('admin.library_categories.edit',[$library_category->id]) }}" class="btn btn-xs btn-info">Modificar</a>
                                    @endcan
                                    @can('library_category_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('Está segur@?');",
                                        'route' => ['admin.library_categories.destroy', $library_category->id])) !!}
                                    {!! Form::submit('Eliminar', array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
      
    </script>
@endsection