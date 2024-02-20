 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
     integrity="sha512-...">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css">
 <link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
     rel="stylesheet">

 <style>
     .login {
         min-height: 100vh;
     }

     .bg-image {
         background-image: url('/images/coffee.jpg');
         background-size: cover;
         background-position: center;
     }

     .login-heading {
         font-weight: 300;
     }

     .btn-login {
         font-size: 0.9rem;
         letter-spacing: 0.05rem;
         padding: 0.75rem 1rem;
     }

     .d-grid {
         color: #00704A;
     }

     .small {
         color: #00704A;
         font-size: 10px;
     }
 </style>


 <div class="container-fluid ps-md-0">
     <div class="row g-0">
         <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
         <div class="col-md-8 col-lg-6">
             <div class="login d-flex align-items-center py-5">
                 <div class="w-50 m-auto">
                     <div class="row">
                         <div class="col-md-9 col-lg-8 mx-auto">
                             <h3 class="login-heading mb-4">Create Your Account</h3>

                             <!-- Register Form -->
                             <form action="/registers/register" method="post">
                                 @csrf
                                 <div class="form-floating mb-3">
                                     <input type="text" class="form-control" id="name" name="name"
                                         placeholder="Full Name">
                                     <label for="floatingFullName">Full Name</label>
                                 </div>
                                 <div class="form-floating mb-3">
                                     <input type="email" class="form-control" id="email" name="email"
                                         placeholder="name@example.com">
                                     <label for="floatingInput">Email address</label>
                                 </div>
                                 <div class="form-floating mb-3">
                                     <input type="password" class="form-control" id="password" name="password"
                                         placeholder="Password">
                                     <label for="floatingPassword">Password</label>
                                 </div>

                                 <div class="d-grid">
                                     <button class="btn btn-lg btn-success btn-login text-uppercase fw-bold mb-2"
                                         type="submit">Register</button>
                                     <div class="text-center">
                                         <a class="small" href="/logins/login">Already have an account? Sign in</a>
                                     </div>
                                 </div>

                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
