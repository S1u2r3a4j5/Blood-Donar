<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>Blood Donor - Search</title> --}}
    <title>@yield('title', 'Test Page')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
       
        .btn-danger {
            --bs-btn-hover-bg: none;
            --bs-btn-hover-border-color: none;
        }

        .div_name_menu {
            display: flex;
            justify-content: space-between;
            width: 295px;
            align-items: center;
        }

        .div_donar_gainer {
            display: inline-grid;
        }

        .marquee {
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            box-sizing: border-box;
        }

        .marquee span {
            display: inline-block;
            padding-left: 100%;
            animation: marquee 10s linear infinite;
        }

        @keyframes marquee {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }
    </style>

</head>

<body>


    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">

                @if (Auth::check())
                    <div class="d-flex">
                        <a class="navbar-brand" href="#"> <img class="nav_logo"
                                src="{{ asset('image/blood_logo.png') }}" alt="logo"></a>

                        <div class="div_name_menu">
                            <div>
                                <strong>{{ Auth::user()->name }} </strong>
                            </div>

                            <div>


                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarLogout">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Logout Form -->
                    <div class="collapse navbar-collapse" id="navbarLogout">
                        <div class="text-center text_center">
                            <div class="div_donar_gainer">
                                <a class="btn btn-danger" href="{{ route('blood-search') }}">Donar Search </a>
                                <a class="btn btn-danger" href="{{ route('blood-gainer') }}">Gainer Search</a>
                            </div>
                            <div>
                                <!-- <form action="{{ route('logout.user') }}" method="POST" id="logoutForm">
                                    @csrf
                                    <button type="submit" class="btn btn-danger"
                                        onclick="logout()">Logout</button>
                                </form> -->
                                <!-- Logout Link -->
                                <!-- <a href="javascript:void(0)" onclick="logout()" class="text-danger">Logout</a> -->
                                <button onclick="logout()" class="btn btn-danger">Logout</button>


                            </div>
                        </div>
                    </div>
                @else
                    <a class="navbar-brand" href="#"> <img class="nav_logo"
                            src="{{ asset('image/blood_logo.png') }}" alt="logo"></a>
                    {{-- <strong>Guest</strong> --}}
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto ul_class_item">

                            <li class="nav-item">
                                <a class="nav-link btn btn-danger" href="{{ route('blood-index') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-danger" href="{{ route('blood-search') }}">Search</a>
                            </li>

                            <li class="nav-item">
                                <button type="button" class="nav-link btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#gainerRegistrationModal">
                                    Blood Gainer Registration
                                </button>
                            </li>
                            <li class="nav-item">
                                <!-- Donor Registration Button -->
                                <button type="button" class="nav-link btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#donorRegistrationModal">
                                    Donor Registration
                                </button>
                            </li>

                            <li class="nav-item">
                                <button type="button" class="nav-link btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#loginModal">
                                    Login
                                </button>
                            </li>

                        </ul>
                    </div>
                @endif


            </div>
        </nav>
    </header>



    <main>
        @yield('content')
    </main>



    <!-- Footer -->
    <footer class="text-center py-4 bg-dark text-white">
        {{-- &copy; 2024 Blood Donor. All Rights Reserved. --}}
        <marquee behavior="scroll" direction="left">&copy; 2024 Blood Donor. All Rights Reserved. !! Donate Blood Save
            Lives !! </marquee>

    </footer>

    <!--Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered justify-content-center login_diolog">
            <div class="modal-content login_content">
                <div class="modal-header text-white" id="login_head">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body login_body">
                    <form action="{{ route('login.dashboard') }}" method="POST" id="loginForm">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Enter your email" required>

                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Enter your password" required>


                        </div>
                        <div class="d-grid">
                            <button type="submit" id="login_btn" class="btn"
                                onclick="disableLoginLink(this, event)">Login</button>
                        </div>
                    </form>

                    <div id="message"></div>



                </div>
                <div class="modal-footer text-center">
                    <small class="text-muted w-100">Don't have an account? <a href="#" class="text-primary"
                            data-bs-toggle="modal" data-bs-target="#donorRegistrationModal">Register</a></small>
                </div>
            </div>
        </div>
    </div>

    <!-- Donar Register Modal -->
    <div class="modal fade" id="donorRegistrationModal" tabindex="-1" aria-labelledby="donorRegistrationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="donorRegistrationModalLabel">Donor Registration</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{ route('blood-store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control shadow-sm" id="name" name="name"
                                placeholder="Enter your full name" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control shadow-sm" id="email" name="email"
                                placeholder="Enter your email address" required>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control shadow-sm" id="password" name="password"
                                placeholder="Enter your password" required>
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control shadow-sm"
                                placeholder="Enter confirm-password" required>
                        </div>

                        <div class="mb-4">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control shadow-sm" id="phone" name="phone"
                                placeholder="Enter your phone number" maxlength="10" required>
                        </div>

                        <div class="mb-4">
                            <label for="blood_group" class="form-label">Blood Group</label>
                            <select class="form-select shadow-sm" id="blood_group" name="blood_group" required>
                                <option value="" disabled selected>Select Blood Group</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </div>



                        <div class="mb-4">
                            <label class="form-label">Gender</label>
                            <div class="row ms-2">
                                <div class="form-check col-md-2">
                                    <input class="form-check-input" type="radio" name="gender" id="male"
                                        value="Male" required>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check col-md-2">
                                    <input class="form-check-input" type="radio" name="gender" id="female"
                                        value="Female" required>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <div class="form-check col-md-2">
                                    <input class="form-check-input" type="radio" name="gender" id="other"
                                        value="Other" required>
                                    <label class="form-check-label" for="other">Other</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="age" class="form-label">Age</label>
                            <input type="text" class="form-control shadow-sm" id="age" name="age"
                                placeholder="Enter your age" required>
                        </div>
                        <div class="mb-4">
                            <label for="pincode" class="form-label">Pincode</label>
                            <input type="text" class="form-control shadow-sm" id="pincode" name="pincode"
                                placeholder="Enter your pincode" required>
                        </div>
                        <div class="mb-4">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control shadow-sm" id="city" name="city"
                                placeholder="Enter your city" required>
                        </div>
                        <div class="mb-4">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control shadow-sm" id="state" name="state"
                                placeholder="Enter your state" required>
                        </div>
                        <div class="mb-4">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" class="form-control shadow-sm" id="country" name="country"
                                placeholder="Enter your country" required>
                        </div>

                       
                        <div class="mb-4">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control shadow-sm" id="address" name="address"
                                placeholder="Enter your address" required>
                        </div>


                        <button type="submit" class="btn btn-danger w-100 shadow-sm">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Gainer Registration Modal -->
    <div class="modal fade" id="gainerRegistrationModal" tabindex="-1"
        aria-labelledby="gainerRegistrationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="gainerRegistrationModalLabel">Blood Gainer Registration</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{ route('gainer.registration') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control shadow-sm" id="name" name="name"
                                value="{{ old('name') }}" placeholder="Enter your full name" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control shadow-sm" id="email" name="email"
                                value="{{ old('email') }}" placeholder="Enter your email address" required>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control shadow-sm" id="password" name="password"
                                placeholder="Enter your password" required>
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control shadow-sm"
                                placeholder="Enter confirm-password" required>
                        </div>

                        <div class="mb-4">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control shadow-sm" id="phone" name="phone"
                                value="{{ old('phone') }}" placeholder="Enter your phone number" maxlength="10"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="blood_group" class="form-label">Blood Group</label>
                            <select class="form-select shadow-sm" id="blood_group" name="blood_group" required>
                                <option value="" disabled {{ old('blood_group') ? '' : 'selected' }}>Select
                                    Blood Group</option>
                                <option value="A+" {{ old('blood_group') == 'A+' ? 'selected' : '' }}>A+</option>
                                <option value="A-" {{ old('blood_group') == 'A-' ? 'selected' : '' }}>A-</option>
                                <option value="B+" {{ old('blood_group') == 'B+' ? 'selected' : '' }}>B+</option>
                                <option value="B-" {{ old('blood_group') == 'B-' ? 'selected' : '' }}>B-</option>
                                <option value="O+" {{ old('blood_group') == 'O+' ? 'selected' : '' }}>O+</option>
                                <option value="O-" {{ old('blood_group') == 'O-' ? 'selected' : '' }}>O-</option>
                                <option value="AB+" {{ old('blood_group') == 'AB+' ? 'selected' : '' }}>AB+
                                </option>
                                <option value="AB-" {{ old('blood_group') == 'AB-' ? 'selected' : '' }}>AB-
                                </option>
                            </select>
                        </div>



                        <div class="mb-4">
                            <label class="form-label">Gender</label>
                            <div class="row ms-2">
                                <div class="form-check col-md-2">
                                    <input class="form-check-input" type="radio" name="gender" id="male"
                                        value="Male" {{ old('gender') == 'Male' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check col-md-2 me-sm-3">
                                    <input class="form-check-input" type="radio" name="gender" id="female"
                                        value="Female" {{ old('gender') == 'Female' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <div class="form-check col-md-2">
                                    <input class="form-check-input" type="radio" name="gender" id="other"
                                        value="Other" {{ old('gender') == 'Other' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="other">Other</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="age" class="form-label">Age</label>
                            <input type="text" class="form-control shadow-sm" id="age" name="age"
                                value="{{ old('age') }}" placeholder="Enter your age" required>
                        </div>
                        <div class="mb-4">
                            <label for="pincode" class="form-label">Pincode</label>
                            <input type="text" class="form-control shadow-sm" id="pincode" name="pincode"
                                value="{{ old('pincode') }}" placeholder="Enter your pincode" required>
                        </div>
                        <div class="mb-4">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control shadow-sm" id="city" name="city"
                                value="{{ old('city') }}" placeholder="Enter your city" required>
                        </div>
                        <div class="mb-4">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control shadow-sm" id="state" name="state"
                                value="{{ old('state') }}" placeholder="Enter your state" required>
                        </div>
                        <div class="mb-4">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" class="form-control shadow-sm" id="country" name="country"
                                value="{{ old('country') }}" placeholder="Enter your country" required>
                        </div>

                       
                        <div class="mb-4">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control shadow-sm" id="address" name="address"
                                value="{{ old('address') }}" placeholder="Enter your address" required>
                        </div>


                        <button type="submit" class="btn btn-danger w-100 shadow-sm">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script>
        function disableLoginLink(button, event) {
            event.preventDefault(); // Prevent form submission on the first click

            button.style.pointerEvents = "none"; // Disable button click
            button.style.opacity = "0.6"; // Change opacity to show it's disabled
            button.onclick = function() {
                return false;
            }; // Prevent further clicks

            // Submit the form after disabling the button
            document.getElementById("loginForm").submit();
        }

        function disableLink(button, event) {
            event.preventDefault(); // Prevent form submission on the first click

            button.style.pointerEvents = "none"; // Disable button click
            button.style.opacity = "0.6"; // Change opacity to show it's disabled
            button.onclick = function() {
                return false;
            }; // Prevent further clicks

            // Submit the form after disabling the button
            document.getElementById("logoutForm").submit();
        }
    </script> -->

  

    <script>
        // Login form submit karte waqt
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent form submission

            // Form data ko get karein
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            // Loading state ko enable karein
            const loginButton = document.getElementById('login_btn');
            loginButton.disabled = true; // Disable button while loading
            loginButton.innerText = 'Logging in...'; // Button text ko update karein

            // API ko request bhejein
            fetch("{{ route('login.dashboard') }}", {
                // fetch("/api/login", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    email: email,
                    password: password
                })
            })
            .then(response => {
                // Agar response successful hai (200 range)
                if (!response.ok) {
                    throw new Error('Invalid credentials or something went wrong!');
                }
                return response.json();
            })
            .then(data => {
                if (data.access_token) {
                    // Agar login successful ho to token ko localStorage mein save karein
                    localStorage.setItem('access_token', data.access_token);
                    alert(data.message); // Success message show karein
                    window.location.href = 'api/blood/donor-search-login-user'; // Ya kisi page par redirect karein
                } else {
                    // Agar login unsuccessful ho to error message show karein
                    alert(data.message || 'Login failed. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again later.');
            })
            .finally(() => {
                // Loading state ko off karein
                loginButton.disabled = false;
                loginButton.innerText = 'Login'; // Button text ko restore karein
            });
        });

        

        // Function to logout
        function logout() {
            fetch('/api/logout', {
                method: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('access_token'),
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.message === 'Logged out successfully!') {
                    alert(data.message); // Show success message
                    localStorage.removeItem('access_token'); // Clear token from localStorage

                    // Optional: You can also clear cookies or session storage if necessary
                    sessionStorage.removeItem('access_token');  // If you store any session tokens

                    // Clear any other session-related data here, if needed
                    window.location.href = '/'; // Redirect to the homepage or login page
                } else {
                    alert("Logout failed. Please try again."); // Show error if logout fails
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }



    </script>

</body>

</html>
