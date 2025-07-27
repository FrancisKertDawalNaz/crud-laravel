 <!DOCTYPE html>
 <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

 <head>
     <!-- SweetAlert2 CDN -->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <title>Laravel</title>

     <!-- Fonts -->
     <link rel="preconnect" href="https://fonts.bunny.net">
     <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
     <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

     <!-- Bootstrap CSS CDN -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <!-- Bootstrap JS CDN (optional) -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
 </head>

 <body class="bg-light text-dark d-flex p-4 justify-content-center align-items-center min-vh-100 flex-column">
     @if(session('success'))
     <div class="alert alert-success alert-dismissible fade show mx-auto w-100" role="alert" style="max-width:1000px;">
         <strong>Success!</strong> {{ session('success') }}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
     @endif
     <div class="container" style="max-width: 1000px;">
         <div class="card shadow-lg border-5 mt-4">
             <div class="card-body p-4">
                 <h2 class="mb-4 text-center text-primary">Register</h2>
                 <div class="container">
                     <div class="row">
                         <div class="col-md-4 text-start">
                             <button type="button" class="btn btn-primary w-80 rounded-1 mb-4" data-bs-toggle="modal" data-bs-target="#registerModal">
                                 Open Register Modal
                             </button>
                         </div>
                     </div>
                 </div>

                 <!-- Modal -->
                 <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                         <div class="modal-content rounded-3 shadow-lg" style="border: none;">
                             <div class="modal-header" style="background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%);">
                                 <h5 class="modal-title text-white" id="registerModalLabel">Register User</h5>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                             </div>
                             <form method="POST" action="{{ route('register.store') }}">
                                 @csrf
                                 <div class="modal-body">
                                     <div class="mb-3">
                                         <label for="modalName" class="form-label">Name</label>
                                         <input type="text" class="form-control" id="modalName" name="name" required autofocus>
                                     </div>
                                     <div class="mb-3">
                                         <label for="modalEmail" class="form-label">Email</label>
                                         <input type="email" class="form-control" id="modalEmail" name="email" required>
                                     </div>
                                     <div class="mb-3">
                                         <label for="modalPassword" class="form-label">Password</label>
                                         <input type="password" class="form-control" id="modalPassword" name="password" required>
                                     </div>
                                 </div>
                                 <div class="modal-footer">
                                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                     <button type="submit" class="btn btn-light" style="background-color: #6a11cb; color: white;">Submit</button>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>

                 <!-- Users Table -->
                 <table class="table table-hover table-bordered table-striped">
                     <thead>
                         <tr>
                             <th scope="col">ID</th>
                             <th scope="col">Name</th>
                             <th scope="col">Password</th>
                             <th scope="col">Registered At</th>
                             <th scope="col">Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach($users as $user)
                         <tr>
                             <td>{{ $user->id }}</td>
                             <td>{{ $user->name }}</td>
                             <td>{{ $user->password }}</td>
                             <td>{{ $user->created_at }}</td>
                             <td>
                                 <form method="POST" action="{{ route('user.delete', $user->id) }}" style="display:inline;">
                                     @csrf
                                     @method('DELETE')
                                     <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this user?')">Delete</button>
                                 </form>
                                 <button type="button"
                                     class="btn btn-warning btn-sm ms-1"
                                     data-bs-toggle="modal"
                                     data-bs-target="#editModal{{ $user->id }}">
                                     Edit
                                 </button>
                                 <!-- Edit Modal -->
                                 <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $user->id }}" aria-hidden="true">
                                     <div class="modal-dialog">
                                         <div class="modal-content rounded-3 shadow-lg" style="border: none;">
                                             <div class="modal-header" style="background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%);">
                                                 <h5 class="modal-title text-white" id="editModalLabel{{ $user->id }}">Edit User</h5>
                                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                             </div>
                                             <form method="POST" action="{{ route('user.update', $user->id) }}">
                                                 @csrf
                                                 @method('PUT')
                                                 <div class="modal-body">
                                                     <div class="mb-3">
                                                         <label for="editName{{ $user->id }}" class="form-label">Name</label>
                                                         <input type="text" class="form-control" id="editName{{ $user->id }}" name="name" value="{{ $user->name }}" required>
                                                     </div>
                                                     <div class="mb-3">
                                                         <label for="editPassword{{ $user->id }}" class="form-label">Password</label>
                                                         <input type="password" class="form-control" id="editPassword{{ $user->id }}" name="password" placeholder="Leave blank to keep current">
                                                     </div>
                                                 </div>
                                                 <div class="modal-footer">
                                                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                     <button type="submit" class="btn btn-light" style="background-color: #6a11cb; color: white;">Save Changes</button>
                                                 </div>
                                             </form>
                                         </div>
                                     </div>
                                 </div>
                             </td>
                         </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </body>

 </html>