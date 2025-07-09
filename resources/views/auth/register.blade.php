<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <!-- Bootstrap + Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
   
</head>
<body>

    <div class="register-card">
        <h4 class="mb-4 text-center">Create your account</h4>

        <!-- Register Form -->
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3 position-relative">
                <i class="fa-solid fa-user form-icon"></i>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                       placeholder="Full Name" required value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3 position-relative">
                <i class="fa-solid fa-envelope form-icon"></i>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                       placeholder="Email address" required value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-3 position-relative">
                <i class="fa-solid fa-lock form-icon"></i>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                       placeholder="Password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-3 position-relative">
                <i class="fa-solid fa-lock form-icon"></i>
                <input type="password" name="password_confirmation" class="form-control"
                       placeholder="Confirm Password" required>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-success w-100">Register</button>

            <!-- Extra Links -->
            <div class="text-center mt-3">
                <a href="{{ route('login') }}">Already have an account? Login</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
