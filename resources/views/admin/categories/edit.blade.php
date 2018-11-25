@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <strong>Edit {{ $category->code }}</strong>
            </div>
            <div class="card-body">
                @include('admin.categories._form')
            </div>
            <div class="card-footer">
                <button type="submit" form="form__category" class="btn btn-primary pull-right">Save</button>
            </div>
        </div>
    </div>
</div>

@endsection
