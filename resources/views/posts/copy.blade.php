@extends('layouts.app')

@section('title', 'Create')

@section('content')
<div class="container mt-5">
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

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <x-form_label for="title">Title</x-form_label>
            <input name="title" class="form-control" type="text" aria-label="default input example">
            <x-form_error name="title" />
        </div>

        <div class="mb-3">
            <x-form_label for="description">Description</x-form_label>
            <input name="description" class="form-control" type="text" aria-label="default input example">
            <x-form_error name="description" />
        </div>

        <div class="mb-3">
            <x-form_label for="creator">Creator</x-form_label>
            <select name="creator" class="form-select" aria-label="Default select example">
                @foreach ($user as $u)
                    <option value="{{ $u['id'] }}">{{ $u['name'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>
</div>
@endsection
