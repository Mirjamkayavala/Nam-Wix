

<!DOCTYPE html>
<html>
<head>
    <title>{{ $post->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
    <div class="container mt-5">
        <div class="box-container">
            <a href="{{ url('/dashboard') }}" class="btn btn-success mt-3">Home</a>
            
            <h2><a href="{{ route('posts.update', $post) }}">{{ $post->title }}</a></h2>
            <p>{{ $post->body }}</p>
            <p>By {{ $post->user->name }}</p>

            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @csrf
                @method ('PATCH')
                <div class="form-group">
                    <label for="title">Title:</label><br>
                    <input type="text" name="title" id="title" class="form-control"><br>
                </div>
                <div class="form-group">
                    <label for="body">Body:</label><br>
                    <textarea name="body" id="body" class="form-control"></textarea><br><br>
                </div>
                <button type="submit" class="btn btn-primary">UPDATE POST</button>
            </form>
        </div>
    </div>
</body>
</html>
