@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card border-primary">
            <div class="card-header bg-primary">
                <strong>Edit {{ $citiesVariable->code }}</strong>
            </div>
            <div class="card-body">
                @include('admin.cities_variables._form')
            </div>
            <div class="card-footer">
                <button type="submit" form="form__cities_variable" class="btn btn-primary pull-right">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card border-primary">
            <div class="card-body">
                <city-variable-rules cities-variable-id="{{ $citiesVariable->id }}"></city-variable-rules>
            </div>
        </div>
    </div>
</div>

@endsection
