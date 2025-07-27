 <!DOCTYPE html>
 <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <title>Laravel</title>

     <!-- Fonts -->
     <link rel="preconnect" href="https://fonts.bunny.net">
     <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

     <!-- Bootstrap CSS CDN -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <!-- Bootstrap JS CDN (optional) -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
 </head>

 <body class="bg-light text-dark d-flex p-4 justify-content-center align-items-center min-vh-100 flex-column">
     <header class="w-100 mb-4">
         @if (Route::has('login'))
         <nav class="d-flex justify-content-end gap-2">
             @auth
             <a
                 href="{{ url('/dashboard') }}"
                 class="btn btn-outline-dark px-3 py-2">
                 Dashboard
             </a>
             @else
             <a
                 href="{{ route('login') }}"
                 class="btn btn-outline-dark px-3 py-2">
                 Log in
             </a>

             @if (Route::has('register'))
             <a
                 href="{{ route('register') }}"
                 class="btn btn-outline-dark px-3 py-2">
                 Register
             </a>
             @endif
             @endauth
         </nav>
         @endif
     </header>
     <div class="container" style="max-width: 400px;">
         <div class="card shadow-lg border-0 mt-4">
             <div class="card-body p-4">
                 <h2 class="mb-4 text-center text-primary">Register</h2>
                 <form method="POST" action="{{ route('register') }}">
                     @csrf
                     <div class="mb-3">
                         <label for="name" class="form-label">Name</label>
                         <input type="text" class="form-control rounded-pill" id="name" name="name" required autofocus>
                     </div>
                     <div class="mb-3">
                         <label for="email" class="form-label">Email address</label>
                         <input type="email" class="form-control rounded-pill" id="email" name="email" required>
                     </div>
                     <div class="mb-3">
                         <label for="password" class="form-label">Password</label>
                         <input type="password" class="form-control rounded-pill" id="password" name="password" required>
                     </div>
                     <div class="mb-3">
                         <label for="password_confirmation" class="form-label">Confirm Password</label>
                         <input type="password" class="form-control rounded-pill" id="password_confirmation" name="password_confirmation" required>
                     </div>
                     <button type="submit" class="btn btn-primary w-100 rounded-pill">Register</button>
                 </form>
             </div>
         </div>
     </div>
 </body>

 </html>