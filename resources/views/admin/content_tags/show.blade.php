@extends('layouts.app')

@section('content')
<h3 class="page-title">Tags</h3>

<div class="panel panel-default">
    <div class="panel-heading">
        Ver
    </div>

    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Tags</th>
                        <td>{{ $content_tag->title }}</td>
                    </tr>
                    <tr>
                        <th>Tags</th>
                        <td>{{ $content_tag->slug }}</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
</div>

<p>&nbsp;</p>

<a href="{{ route('admin.content_tags.index') }}" class="btn btn-default">Volver</a>
</div>
</div>
@stop