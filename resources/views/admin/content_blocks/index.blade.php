@extends('layouts.admin')

@section('content')
<div class="row mb-2">
    <div class="col-sm-12">
        <a class="btn btn-primary btn-sm pull-right text-white" href="/admin/content_blocks/create"><i class="fa fa-plus mr-1"></i>Add Content Block</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> {{ $contentBlocks->count() }} Content Blocks
            </div>
            @if($contentBlocks->isNotEmpty())
            <div class="card-body">
                <table class="table table-responsive-sm table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Content</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contentBlocks as $contentBlock)
                        <tr>
                            <td>{{ $contentBlock->name == NULL ? '-' : $contentBlock->name }}</td>
                            <td>{{ $contentBlock->code }}</td>
                            <td>{{ str_limit($contentBlock->content) }}</td>
                            <td>
                                <a class="btn btn-primary" href="/admin/content_blocks/{{ $contentBlock->id }}">
                                    <i class="fa fa-search-plus"></i>
                                </a>
                                <a class="btn btn-info text-white" href="/admin/content_blocks/{{ $contentBlock->id }}/edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-danger" href="#"
                                   onclick="return deleteModel(event,'delete-form-{{$contentBlock->id}}', 'Are you sure you want to delete this content block ? All related data will be lost');">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                                @include("subviews.components.delete_form",["id"=>$contentBlock->id, "action"=> url("admin/content_blocks/". $contentBlock->id )])
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
