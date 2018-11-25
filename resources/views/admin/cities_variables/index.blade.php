@extends('layouts.admin')

@section('content')
<div class="row mb-2">
    <div class="col-sm-12">
        <a class="btn btn-primary btn-sm pull-right text-white" href="/admin/cities_variables/create"><i class="fa fa-plus mr-1"></i>Add Cities Variable</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card card-accent-primary">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> {{ $citiesVariables->count() }} Cities Variables
            </div>
            @if($citiesVariables->isNotEmpty())
            <div class="card-body">
                <table class="table table-responsive-sm">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Default Value</th>
                            <th>Fixed Value</th>
                            <th>Field Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($citiesVariables as $citiesVariable)
                        <tr>
                            <td>{{ $citiesVariable->name == NULL ? '-' : $citiesVariable->name }}</td>
                            <td>{{ $citiesVariable->code }}</td>
                            <td>{{ $defaultValuesList[$citiesVariable->default_value] }}</td>
                            <td>{{ $citiesVariable->default_fixed_value == NULL ? '-' : $citiesVariable->default_fixed_value }}</td>
                            <td>{{ $citiesVariable->default_field_name == NULL ? '-' : $defaultFieldNamesList[$citiesVariable->default_field_name] }}</td>
                            <td>
                                <a class="btn btn-info text-white" href="/admin/cities_variables/{{ $citiesVariable->id }}/edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-danger" href="#"
                                   onclick="return deleteModel(event,'delete-form-{{$citiesVariable->id}}', 'Are you sure you want to delete this city variable ? All related data will be lost');">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                                @include("subviews.components.delete_form",["id"=>$citiesVariable->id, "action"=> url("admin/cities_variables/". $citiesVariable->id )])
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection
