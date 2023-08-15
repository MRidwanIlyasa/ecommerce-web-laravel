

<form action="{{ route('konfirmasipesanan') }}" method="POST">
    @csrf
    <input type="hidden" value="{{ $info->id }}" name="id">
    <input type="text" value="sent" id="status" name="status">
   
    <button type="submit" class="btn btn-primary mb-3">KOnfirmasi </button>
                 


</form>