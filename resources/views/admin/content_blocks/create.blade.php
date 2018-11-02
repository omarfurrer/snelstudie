@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <strong>New Content Block</strong>
            </div>
            <div class="card-body">
                @include('admin.content_blocks._form')
            </div>
            <div class="card-footer">
                <button type="submit" form="form__cotent_block" class="btn btn-primary pull-right">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection
