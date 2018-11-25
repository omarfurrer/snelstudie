<form id='form__cotent_block'
      action="{{ isset($contentBlock)? '/admin/content_blocks/'.$contentBlock->id : '/admin/content_blocks' }}"
      method="POST" novalidate>

    @csrf

    @if(isset($contentBlock))
        @method('PATCH')
    @endif

    <div class="form-group">
        <label class="form-col-form-label" for="name">Name</label>
        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
               id="name" name="name" type="text"
               value="{{ old('name',isset($contentBlock)? $contentBlock->name : '') }}" required>
        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
    </div>

    <div class="form-group">
        <label class="form-col-form-label" for="code">Code</label>
        <input class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}"
               id="code" name="code" type="text"
               value="{{ old('code',isset($contentBlock)? $contentBlock->code : '') }}" required>
        <div class="invalid-feedback">{{ $errors->first('code') }}</div>
    </div>

    <div class="form-group">
        <label class="form-col-form-label" for="content">Content</label>
        <textarea class="form-control tiny-editor{{ $errors->has('content') ? ' is-invalid' : '' }}"
                  id="content" name="content" required>
            {{old('content',isset($contentBlock)? $contentBlock->content : '')}}
        </textarea>
        <div class="invalid-feedback">{{ $errors->first('content') }}</div>
    </div>

</form>






