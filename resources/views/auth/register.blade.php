<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER FORM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        .login-bg {
            background-color: #800080; /* purple */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .register-container {
            background-color: rgba(255, 255, 255, 0.8); /* White with transparency */
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .title {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 1rem;
            text-align: center;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            opacity: 0.8;
        }
        .link-container {
            display: flex;
            justify-content: space-between;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="login-bg">
        <div class="register-container">
            <h3 class="title text-success">Registration Form</h3>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="form-group">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="form-control mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
                </div>

                <!-- Gender -->
                <div class="form-group">
                    <x-input-label for="gender" :value="__('Gender')" />
                    <select id="gender" name="gender" class="form-control mt-1" required>
                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                    </select>
                    <x-input-error :messages="$errors->get('gender')" class="mt-2 text-danger" />
                </div>

                <!-- Contact Number -->
                <div class="form-group">
                    <x-input-label for="contact_number" :value="__('Contact Number')" />
                    <x-text-input id="contact_number" class="form-control mt-1" type="text" name="contact_number" :value="old('contact_number')" required autocomplete="contact_number" />
                    <x-input-error :messages="$errors->get('contact_number')" class="mt-2 text-danger" />
                </div>

                <!-- Email Address -->
                <div class="form-group">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="form-control mt-1" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                </div>

                <!-- Password -->
                <div class="form-group">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="form-control mt-1" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="form-control mt-1" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
                </div>

                <div class="link-container">
                    <a class="text-sm text-primary" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                </div>

                <button type="submit" class="btn btn-success mt-3 w-100">
                    {{ __('Register') }}
                </button>
            </form>
        </div>
    </div>
</body>
</html>
