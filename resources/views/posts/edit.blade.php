@extends('layouts.app')
@section('title')
edit
@endsection

@section('content')
</div>
</nav>
</div>
{{--
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
--}}
<form action="{{Route('posts.update',$post['id'])}}" method="POST" >
    @csrf
    @method('PUT')
<div class="mb-3">
    <label for="title" >Title</label>
    <input name ='title'class="form-control form-control-lg" type="text"  aria-label=".form-control-lg example" value='{{$post->title}}'>
    <x-form_error name='title' />
</div>

<div class="mb-3">
    <x-form_label for='description '>Description</x-form_label>
    <textarea id="description" name="description" cols=170></textarea>
    <x-form_error name='description'/>
</div>





<div class="mb-3 d-flex justify-content-end">
    <input type="submit" value="Update" class="btn btn-primary">
</div>

</form>


</div>



@endsection
