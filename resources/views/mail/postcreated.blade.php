<div>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
    <h1>new post created by you with title {{$post->title}}  </h1>
    <a href={{route('posts.show',$post->id)}} >click here to see the post</a>
</div>
