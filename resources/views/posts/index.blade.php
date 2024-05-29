
<!DOCTYPE html>
<html>
<head>
    <title>Welcome </title>
</head>
<body>
    {{--  @include('home')   --}} 
  
    <!-- <h1>Blog Posts</h1> -->
    <a href="{{ route('posts.create') }}">Create New Post</a> 
    <!-- <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a> -->
    <ul>
        @foreach ($posts as $post)
            <li>
                <!-- <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>  -->
                <a href = "{{route('posts.edit', $post->id) }}">{{$post->title}}</a> 
                <a href="{{ url('/dashboard') }}" class="btn btn-success">Home</a> 
            </li>
            
        @endforeach
    </ul>
</body>
</html>

