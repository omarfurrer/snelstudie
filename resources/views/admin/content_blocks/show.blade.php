@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <form class="form-horizontal">
            <div class="form-group row">
                <label class="col-md-1 col-form-label" for="name">Name</label>
                <div class="col-md-11">
                    <input class="form-control" id="name" type="text" name="name" value="{{ $contentBlock->name }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-1 col-form-label" for="code">Code</label>
                <div class="col-md-11">
                    <input class="form-control" id="code" type="text" name="code" value="{{ $contentBlock->code }}" disabled>
                </div>
            </div>
        </form>
    </div>
</div>
<p>Full width</p>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                {!! $contentBlock->content !!}
            </div>
        </div>
    </div>
</div>
<p>50% width</p>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                {!! $contentBlock->content !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                {!! $contentBlock->content !!}
            </div>
        </div>
    </div>
</div>
<p>33% width</p>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                {!! $contentBlock->content !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                {!! $contentBlock->content !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                {!! $contentBlock->content !!}
            </div>
        </div>
    </div>
</div>
@endsection
