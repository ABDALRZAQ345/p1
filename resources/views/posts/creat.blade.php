
@extends('layouts.app')
@section('title')
Create
@endsection

@section('content')


</div>
</nav>
</div>


<form action="{{Route('posts.store')}}" method="POST" >
    @csrf
<div>
    <div class="mb-3">
        <x-form_label for='title '>Title</x-form_label>
        <input name='title' class="form-control" type="text" aria-label="default input example" >
        <x-form_error name='title' />
    </div>

<div class="mb-3">
    <x-form_label for='description '>Description</x-form_label>
    <textarea id="description" name="description" cols=170></textarea>
    <x-form_error name='description'/>
</div>



</div>

<div class="mb-3 d-flex justify-content-end">
    <input type="submit" value="Submit" class="btn btn-primary">
</div>

</form>


</div>



@endsection
