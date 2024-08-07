@extends('layouts.app')
@section('title')
show
@endsection

@section('content')
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href='{{Route('posts.index')}}'

                >مدري كبوس وما حيطلع شي</a>
              </li>


            </ul>

          </div>
        </div>
      </nav>

</div>
<div>
    <div class="card">
        <h5 class="card-header">{{$post['title']}}</h5>
        <div class="card-body">
          <h5 class="card-title">{{$post['description']}}</h5>
          <p class="card-text">created by {{$post->user->name}}.</p>
        </div>
      </div>

</div>
@endsection()
