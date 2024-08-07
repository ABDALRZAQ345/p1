<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <title> Results </title>
</head>
<body>



@extends('layouts.app')
@section('title')
    Results
@endsection


@section('content')
    <x-search/>
    <div>
        <h1 class="text-center text-success ">{{$posts->total()}} Results for {{request()->search}}</h1>

    </div>



    <div class="mt-5">
        @auth
            <div class="text-center mb-4">
                <a href="{{ route('posts.create') }}" class="btn btn-success">Create</a>
            </div>
        @endauth

    </div>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">postedBy</th>
                <th scope="col">created at </th>
                <th scope="col">action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($posts  as $a )
                <tr>
                    <th scope="row">{{$a['id']}}</th>

                    <td>{{$a['title']}}</td>
                    <td>{{$a->user->name}}</td>
                    <td>{{$a["created_at"]}}</td>

                    <td> <a href="{{Route('posts.show',$a)}}" class="btn btn-success">View</a>

                        @auth
                            @can('edit',$a)
                                <a href="{{route('posts.edit',$a['id'])}}" class="btn btn-info">Edit</a>
                                <form style="display : inline; " action="{{Route('posts.destroy',$a->id)}}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete </button>
                                </form>
                    @endif
                    @endauth
                    <td>

                </tr>
            @endforeach

            </tbody>
        </table>

        <div>
            {{$posts->links() }}
        </div>

    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
