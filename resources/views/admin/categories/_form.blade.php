<form id='form__category'
      action="{{ isset($category)? '/admin/categories/'.$category->id : '/admin/categories' }}"
      method="POST" novalidate>

    @csrf

    @if(isset($category))
    @method('PATCH')
    @endif

    <div class="form-group required">
        <label class="form-col-form-label" for="name">Name</label>
        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
               id="name" name="name" type="text"
               value="{{ old('name',isset($category)? $category->name : '') }}" required>
        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
    </div>

    @if(isset($category))
    <div class="form-group">
        <label class="form-col-form-label" for="slug">Slug</label>
        <input class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}"
               id="slug" name="slug" type="text"
               value="{{ old('slug',isset($category)? $category->slug : '') }}" disabled>
        <div class="invalid-feedback">{{ $errors->first('slug') }}</div>
        <small class="form-text text-muted">
            The slug is automatically generated from the name.
        </small>
    </div>
    @endif

    <div class="form-group">
        <label class="form-col-form-label" for="meta_title">Meta Title</label>
        <input class="form-control{{ $errors->has('meta_title') ? ' is-invalid' : '' }}"
               id="meta_title" name="meta_title" type="text"
               value="{{ old('meta_title',isset($category)? $category->meta_title : '') }}">
        <div class="invalid-feedback">{{ $errors->first('meta_title') }}</div>
        <small class="form-text text-muted">
            Ideal Meta title length is 60 chars long.
        </small>
    </div>

    <div class="form-group">
        <label class="form-col-form-label" for="meta_description">Meta Description</label>
        <input class="form-control{{ $errors->has('meta_description') ? ' is-invalid' : '' }}"
               id="meta_description" name="meta_description" type="text"
               value="{{ old('meta_description',isset($category)? $category->meta_description : '') }}">
        <div class="invalid-feedback">{{ $errors->first('meta_description') }}</div>
        <small class="form-text text-muted">
            Ideal Meta Description length is 300 chars long.
        </small>
    </div>

</form>








