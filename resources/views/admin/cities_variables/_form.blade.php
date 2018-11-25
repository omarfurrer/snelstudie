<form id='form__cities_variable'
      action="{{ isset($citiesVariable)? '/admin/cities_variables/'.$citiesVariable->id : '/admin/cities_variables' }}"
      method="POST" novalidate>

    @csrf

    @if(isset($citiesVariable))
    @method('PATCH')
    @endif

    <div class="form-group required">
        <label class="form-col-form-label" for="name">Name</label>
        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
               id="name" name="name" type="text"
               value="{{ old('name',isset($citiesVariable)? $citiesVariable->name : '') }}" required>
        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
    </div>

    <div class="form-group required">
        <label class="form-col-form-label" for="code">Code</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">{{ App\Models\CitiesVariable::$codePrefix }}</span>
            </div>
            <input class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}"
                   id="code" name="code" type="text"
                   value="{{ old('code',isset($citiesVariable)? $citiesVariable->code : '') }}" required>
            <div class="invalid-feedback">{{ $errors->first('code') }}</div>
        </div>
    </div>

    <div class="form-group required">
        <label for="default_value">Default Value</label>
        <select name="default_value" class="form-control{{ $errors->has('default_value') ? ' is-invalid' : '' }}" id="default_value" required>
            @foreach($defaultValuesList as $key => $name)
            <option value="{{ $key }}"
                    {{  old('default_value') != NULL ? (old('default_value') == $key ? 'selected' : '' ) : (isset($citiesVariable)? ($citiesVariable->default_value == $key ? 'selected' : '') :'')   }}        
                    >{{ $name }}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">{{ $errors->first('default_value') }}</div>
    </div>

    <div id="default_fixed_value_wrapper" class="form-group d-none required">
        <label class="form-col-form-label" for="default_fixed_value">Default Fixed Value</label>
        <input class="form-control{{ $errors->has('default_fixed_value') ? ' is-invalid' : '' }}"
               id="default_fixed_value" name="default_fixed_value" type="text"
               value="{{ old('default_fixed_value',isset($citiesVariable)? $citiesVariable->default_fixed_value : '') }}">
        <div class="invalid-feedback">{{ $errors->first('default_fixed_value') }}</div>
    </div>

    <div id="default_field_name_wrapper" class="form-group d-none required">
        <label for="default_field_name">Default Field Name</label>
        <select name="default_field_name" class="form-control{{ $errors->has('default_field_name') ? ' is-invalid' : '' }}" id="default_field_name">
            <option value="">Select Field</option>
            @foreach($defaultFieldNamesList as $key => $name)
            <option value="{{ $key }}"
                    {{  old('default_field_name') != NULL ? (old('default_field_name') == $key ? 'selected' : '' ) : (isset($citiesVariable)? ($citiesVariable->default_field_name == $key ? 'selected' : '') :'')   }}        
                    >{{ $name }}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">{{ $errors->first('default_field_name') }}</div>
    </div>
</form>

@push("scripts")
<script>
    var defaultValues = @json($defaultValuesList);
            $(function () {

                showHideDefaultFields($("#default_value").val());

                $('#default_value').change(function () {
                    showHideDefaultFields($(this).val())
                });

                function showHideDefaultFields(optionSelected) {
                    if (defaultValues[optionSelected] == 'FIXED') {
                        $("#default_fixed_value_wrapper").removeClass("d-none");
                        $("#default_fixed_value_wrapper").prop("required", true);
                        $("#default_field_name_wrapper").addClass("d-none");
                        $("#default_field_name_wrapper").removeProp("required");
                    } else if (defaultValues[optionSelected] == 'FIELD') {
                        $("#default_field_name_wrapper").removeClass("d-none");
                        $("#default_field_name_wrapper").prop("required", true);
                        $("#default_fixed_value_wrapper").addClass("d-none");
                        $("#default_fixed_value_wrapper").removeProp("required");
                    } else {
                        $("#default_fixed_value_wrapper").addClass("d-none");
                        $("#default_fixed_value_wrapper").removeProp("required");
                        $("#default_field_name_wrapper").addClass("d-none");
                        $("#default_field_name_wrapper").removeProp("required");
                    }
                }
            });


</script>
@endpush






