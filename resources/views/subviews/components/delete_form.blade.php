<form id="delete-form-{{$id}}" action="{{ $action }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>