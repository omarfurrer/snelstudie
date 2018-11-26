<form id='form__article'
      action="{{ isset($article)? '/admin/articles/'.$article->id : '/admin/articles' }}"
      method="POST" novalidate>

    @csrf

    @if(isset($article))
    @method('PATCH')
    @endif

    <div class="form-group required">
        <label class="form-col-form-label" for="title">Title</label>
        <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
               id="title" name="title" type="text"
               value="{{ old('title',isset($article)? $article->title : '') }}" required>
        <div class="invalid-feedback">{{ $errors->first('title') }}</div>
    </div>

    @if(isset($article))
    <div class="form-group">
        <label class="form-col-form-label" for="slug">Slug</label>
        <input class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}"
               id="slug" name="slug" type="text"
               value="{{ old('slug',isset($article)? $article->slug : '') }}" disabled>
        <div class="invalid-feedback">{{ $errors->first('slug') }}</div>
        <small class="form-text text-muted">
            The slug is automatically generated from the title.
        </small>
    </div>
    @endif

    <div class="form-group required">
        <label class="form-col-form-label" for="content">Content</label>
        <textarea class="form-control tiny-editor{{ $errors->has('content') ? ' is-invalid' : '' }}"
                  id="content" name="content" rows="20" required>
            {{old('content',isset($article)? $article->content : '')}}
        </textarea>
        <div class="invalid-feedback">{{ $errors->first('content') }}</div>
    </div>

    <div class="form-group ideal-length">
        <label class="form-col-form-label" for="meta_description">Meta Description</label>
        <input class="form-control{{ $errors->has('meta_description') ? ' is-invalid' : '' }}"
               id="meta_description" name="meta_description" type="text"
               value="{{ old('meta_description',isset($article)? $article->meta_description : '') }}">
        <div class="invalid-feedback">{{ $errors->first('meta_description') }}</div>
        <small class="form-text text-muted">
            Ideal Meta Description length is 300 chars long.
        </small>
        <small class="text-muted input-length"></small>
    </div>

</form>







