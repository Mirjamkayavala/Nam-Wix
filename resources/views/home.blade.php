<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome to Nam-Wix, connect with us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="row w-100">
                    <div class="col text-center">
                        <h5 class="text-center">Welcome to Nam-Wix, connect with us</h5>
                    </div>
                    <div class="col-auto ms-auto">
                        <a href="{{ url('/dashboard') }}" class="btn btn-success">Home</a>
                    </div>
                </div>
            </div>
        </nav>
        
        <div class="d-flex justify-content-center my-4">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>
        </div>

        <!-- Optional navigation menu -->
        <!--
        <ul class="nav">
            <li class="nav-item"><a class="nav-link active" href="/home">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="/notification">Notification</a></li>
            <li class="nav-item"><a class="nav-link" href="/messaging">Messaging</a></li>
        </ul>
        -->
        <!-- Include posts.show view -->
        @include('posts.show')
    </div>

    <!-- Bootstrap JavaScript and dependencies (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybDhjK/Uyw33dQIdybOylbUm/UYKxECA6d+lF5eC/P6cbi1PB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>
</html>
