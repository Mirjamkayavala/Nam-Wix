

<!DOCTYPE html>
<html>
<head>
    <title>Show Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .box-container {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    
        @foreach ($post as $pt)
            <div class="box-container">
                <h1>{{ $pt->title }}</h1>
                <p>{{ $pt->body }}</p>
                <a href="{{ route('posts.index') }}" class="btn btn-primary">Back to Posts</a>
                <a href="{{ route('posts.edit', $pt->id) }}" class="btn btn-secondary">Edit Post</a>
                
                <form action="{{ route('posts.destroy', $pt->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Post</button>
                </form>

                <h2 class="mt-4">Comments</h2>
                <button class="btn btn-info show-comments-btn" data-post-id="{{ $pt->id }}">Show Comments</button>
                <div class="comments mb-3" id="comments-{{ $pt->id }}" style="display: none;">
                    @if($pt->comments && $pt->comments->count() > 0)
                        @foreach ($pt->comments as $comment)
                            <div class="mb-2">
                                <p>{{ $comment->body }}</p>
                                <small class="text-muted">Commented by {{ $comment->user->name }} on {{ $comment->created_at->format('d M Y, h:i A') }}</small>
                            </div>
                        @endforeach
                    @else
                        <p>No comments yet.</p>
                    @endif
                </div>

                <form action="{{ route('comments.store', $pt->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="commentBody" class="form-label">Add a comment</label>
                        <textarea class="form-control" id="commentBody" name="body" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Comment</button>
                </form>
            </div>
        @endforeach
    
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-HoAfbwipOD1T9lBgt9IfICFp8HxyobK6mQmXblHLQ78+u3vxYYm2q9d0NTlwD8GH" crossorigin="anonymous"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.show-comments-btn').forEach(button => {
            button.addEventListener('click', function () {
                const postId = this.getAttribute('data-post-id');
                const commentsDiv = document.getElementById('comments-' + postId);
                
                if (commentsDiv.style.display === 'none') {
                    commentsDiv.style.display = 'block';
                    this.textContent = 'Hide Comments';
                } else {
                    commentsDiv.style.display = 'none';
                    this.textContent = 'Show Comments';
                }
            });
        });
    });

    Echo.private('App.Models.User.' + {{ auth()->id() }})
        .notification((notification) => {
            alert('New comment on ' + notification.post_title + ': ' + notification.comment_body);
        });
</script>
</body>
</html>
