@extends('layouts.app')

@section('content')
    <h3 class="page-title">Categorías</h3>
    
    {!! Form::model($product_category, ['method' => 'PUT', 'route' => ['admin.product_categories.update', $product_category->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            Modificar
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6 form-group">
                    {!! Form::label('name', 'Nombre', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
                <div class="col-sm-6 form-group">
                    {!! Form::label('parent_id', 'Categoría Superior', ['class' => 'control-label']) !!}
                    {!! Form::select('parent_id', $parent_categories, old('parent_id'), ['class' => 'form-control', 'placeholder'=>'Seleccione']) !!}
                    @if($errors->has('parent_id'))
                        <p class="help-block">
                            {{ $errors->first('parent_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', 'Descripción', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                {{-- 
                <div class="col-xs-12 form-group">
                    @if ($product_category->photo)
                        <a href="{{ asset(env('UPLOAD_PATH').'/'.$product_category->photo) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/'.$product_category->photo) }}"></a>
                    @endif
                    {!! Form::label('photo', trans('quickadmin.product-categories.fields.photo'), ['class' => 'control-label']) !!}
                    {!! Form::file('photo', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('photo_max_size', 8) !!}
                    {!! Form::hidden('photo_max_width', 6000) !!}
                    {!! Form::hidden('photo_max_height', 6000) !!}
                    
                    @if($errors->has('photo'))
                        <p class="help-block">
                            {{ $errors->first('photo') }}
                        </p>
                    @endif
                </div>
            </div>
            --}}
        </div>
    </div>

    {!! Form::submit('Guardar', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

