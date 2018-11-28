<form id='form__review'
      action="{{ isset($review)? '/admin/reviews/'.$review->id : '/admin/reviews' }}"
      method="POST" novalidate>

    @csrf

    @if(isset($review))
    @method('PATCH')
    @endif

    <div class="form-group required">
        <label class="form-col-form-label" for="name">Reviewer Name</label>
        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
               id="name" name="name" type="text"
               value="{{ old('name',isset($review)? $review->name : '') }}" required>
        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
    </div>

    <div class="form-group required">
        <label class="form-col-form-label" for="content">Content</label>
        <textarea class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}"
                  id="content" name="content" rows="10" required>
            {{old('content',isset($review)? $review->content : '')}}
        </textarea>
        <div class="invalid-feedback">{{ $errors->first('content') }}</div>
    </div>

    <div class="form-group required">
        <label class="form-col-form-label" for="rating">Rating</label>
        <select id="rating" name="rating" class="form-control{{ $errors->has('rating') ? ' is-invalid' : '' }}" required>
            <option value="1" {{  old('rating') != NULL ? (old('rating') == 1 ? 'selected' : '' ) : (isset($review)? ($review->rating == 1 ? 'selected' : '') :'')   }}>1/5</option>
            <option value="2" {{  old('rating') != NULL ? (old('rating') == 2 ? 'selected' : '' ) : (isset($review)? ($review->rating == 2 ? 'selected' : '') :'')   }}>2/5</option>
            <option value="3" {{  old('rating') != NULL ? (old('rating') == 3 ? 'selected' : '' ) : (isset($review)? ($review->rating == 3 ? 'selected' : '') :'')   }}>3/5</option>
            <option value="4" {{  old('rating') != NULL ? (old('rating') == 4 ? 'selected' : '' ) : (isset($review)? ($review->rating == 4 ? 'selected' : '') :'')   }}>4/5</option>
            <option value="5" {{  old('rating') != NULL ? (old('rating') == 5 ? 'selected' : '' ) : (isset($review)? ($review->rating == 5 ? 'selected' : '') :'')   }}>5/5</option>
        </select>
        <div class="invalid-feedback">{{ $errors->first('rating') }}</div>
    </div>

    <div class="form-group">
        <label class="form-col-form-label" for="category_id">Category</label>
        <select id="category_id" name="category_id" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}">
            <option value="">No Category</option>
            @foreach($categories as $key => $name)
            <option value="{{ $key }}" {{  old('category_id') != NULL ? (old('category_id') == $key ? 'selected' : '' ) : (isset($review)? ($review->category_id == $key ? 'selected' : '') :'')   }}>{{ $name }}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">{{ $errors->first('category_id') }}</div>
    </div>



</form>







