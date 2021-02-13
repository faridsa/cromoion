@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.internal-notifications.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            Ver
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.internal_notifications.index') }}" class="btn btn-default">Volver</a>
        </div>
    </div>
@stop