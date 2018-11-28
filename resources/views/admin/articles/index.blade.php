@extends('layouts.admin')

@section('content')
<div class="row mb-2">
    <div class="col-sm-12">
        <a class="btn btn-primary btn-sm pull-right text-white" href="/admin/articles/create"><i class="fa fa-plus mr-1"></i>Add Article</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card card-accent-primary">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> {{ $articles->count() }} Articles
            </div>
            @if($articles->isNotEmpty())
            <div class="card-body">
                <table class="table table-responsive-sm">
                    <thead class="thead-dark">
                        <tr>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Content</th>
                            <th>Meta Description</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->slug }}</td>
                            <td class="w-25">{{ str_limit($article->content) }}</td>
                            <td class="w-25">{{ $article->meta_description == NULL ? '-' : $article->meta_description }}</td>
                            <td>{{ $article->category == NULL ? '-' : $article->category->name }}</td>
                            <td>
                                <a class="btn btn-info text-white" href="/admin/articles/{{ $article->id }}/edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-danger" href="#"
                                   onclick="return deleteModel(event,'delete-form-{{$article->id}}', 'Are you sure you want to delete this content block ? All related data will be lost');">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                                @include("subviews.components.delete_form",["id"=>$article->id, "action"=> url("admin/articles/". $article->id )])
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
