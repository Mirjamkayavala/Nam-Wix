<div class="comment">
    <p>{{ $comment->body }}</p>
    <p>By {{ $comment->user->name }}</p>
    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</div>
