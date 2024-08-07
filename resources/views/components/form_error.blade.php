@props(['name'])
</div>

@error($name)
<div  class="alert alert-danger">
{{$message }}
</div>
@enderror



<div>
