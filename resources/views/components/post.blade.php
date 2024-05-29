<div class="post">
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->body }}</p>
    <p>By {{ $post->user->name }}</p>
    <a href="{{ route('posts.show', $post->id) }}">View</a>
    <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</div>
