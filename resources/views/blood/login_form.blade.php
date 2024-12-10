<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donor - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #e63946;
        }

        .navbar-brand,
        .nav-link {
            color: #fff !important;
        }

        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('http://www.blooddonors.in/img/donate1.jpg') no-repeat center center/cover;
            height: 557px;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .hero p {
            font-size: 1.2rem;
            margin-top: 10px;
        }

        .btn-custom {
            background-color: #e63946;
            color: #fff;
            border: none;
            padding: 10px 20px;
        }

        .btn-custom:hover {
            background-color: #d62828;
        }

        .nav_logo {
            height: 40px;
            width: 40px;
            background-color: #fff;
        }

        /* nav {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)) !important;
        } */

        @media(max-width:600px) {
            .hero {
                height: 500px;
            }
        }
    </style>
    <style>
        .navbar-brand img {
            border-radius: 50%;
            /* Makes the logo circular */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            /* Adds a shadow */
        }


        /* Modal Shadow */
        .modal-content {
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        /* Input Field Focus */
        .form-control:focus,
        .form-select:focus {
            border-color: #dc3545;
            box-shadow: 0 0 5px rgba(220, 53, 69, 0.5);
        }

        /* Button Hover Effect */
        .btn-danger:hover {
            background-color: #c82333;
            box-shadow: 0 4px 10px rgba(220, 53, 69, 0.5);
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#"> <img class="nav_logo" src="{{ asset('image/blood_logo.png') }}"
                    alt="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger" href="{{ route('blood-index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger" href="{{ route('blood-search') }}">Search</a>
                    </li>

                    <li class="nav-item">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#gainerRegistrationModal">
                            Blood Gainer Registration
                        </button>
                    </li>

                    <li class="nav-item">
                        <!-- Donor Registration Button -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#donorRegistrationModal">
                            Blood Donor Registration
                        </button>
                    </li>
                    <li class="nav-item">
                        <!-- Donor Registration Button -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#loginModal">
                            Login
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal -->
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
                                <div class="form-check col-md-2 ms-2 mx-4">
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
                            <label for="kshetra" class="form-label">Kshetra</label>
                            <input type="text" class="form-control shadow-sm" id="kshetra" name="kshetra"
                                placeholder="Enter your kshetra name" required>
                        </div>

                        <div class="mb-4">
                            <label for="prant" class="form-label">Prant</label>
                            <input type="text" class="form-control shadow-sm" id="prant" name="prant"
                                placeholder="Enter your prant name" required>
                        </div>

                        <div class="mb-4">
                            <label for="vibhag" class="form-label">Vibhag</label>
                            <input type="text" class="form-control shadow-sm" id="vibhag" name="vibhag"
                                placeholder="Enter your vibhag name" required>
                        </div>

                        <div class="mb-4">
                            <label for="maha_nagar" class="form-label">Maha-Nagar</label>
                            <input type="text" class="form-control shadow-sm" id="maha_nagar" name="maha_nagar"
                                placeholder="Enter your maha-nagar name" required>
                        </div>

                        <div class="mb-4">
                            <label for="bhag" class="form-label">Bhag</label>
                            <select class="form-select shadow-sm" id="bhag" name="bhag" required>
                                <option value="" disabled selected>Select your bhag</option>
                                <option value="Krishna Bhag">Krishna Bhag</option>
                                <option value="Balram Bhag">Balram Bhag</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="nagar" class="form-label">Nagar</label>
                            <select class="form-select shadow-sm" id="nagar" name="nagar" required>
                                <option value="" disabled selected>Select your nagar</option>
                                <option value="Yudhishthira Nagar">Yudhishthira Nagar</option>
                                <option value="Bhim Nagar">Bhim Nagar</option>
                                <option value="Arjun Nagar">Arjun Nagar</option>
                                <option value="Nakul Naga">Nakul Nagar</option>
                                <option value="Sahadev Nagar">Sahadev Nagar</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="shakha" class="form-label">Shakha</label>
                            <input type="text" class="form-control shadow-sm" id="shakha" name="shakha"
                                placeholder="Enter your shakha name" required>
                        </div>

                        <div class="mb-4">
                            <label for="user_post_name" class="form-label">User Post Name</label>
                            <select class="form-select shadow-sm" id="user_post_name" name="user_post_name" required>
                                <option value="" disabled selected>Select your nagar</option>
                                <option value="Kshetra Pracharak">Kshetra Pracharak</option>
                                <option value="Prant Pracharak">Prant Pracharak</option>
                                <option value="Vibhag Pracharak">Vibhag Pracharak</option>
                                <option value="Maha-nagar Pracharak">Maha-nagar Pracharak</option>
                                <option value="Nagar Pracharak">Nagar Pracharak</option>
                                <option value="Swayam-sevak">Swayam-sevak</option>
                            </select>
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
                    <form action="" method="POST">
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
                                <div class="form-check col-md-2 ms-2 mx-4">
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
                            <label for="kshetra" class="form-label">Kshetra</label>
                            <input type="text" class="form-control shadow-sm" id="kshetra" name="kshetra"
                                placeholder="Enter your kshetra name" required>
                        </div>

                        <div class="mb-4">
                            <label for="prant" class="form-label">Prant</label>
                            <input type="text" class="form-control shadow-sm" id="prant" name="prant"
                                placeholder="Enter your prant name" required>
                        </div>

                        <div class="mb-4">
                            <label for="vibhag" class="form-label">Vibhag</label>
                            <input type="text" class="form-control shadow-sm" id="vibhag" name="vibhag"
                                placeholder="Enter your vibhag name" required>
                        </div>

                        <div class="mb-4">
                            <label for="maha_nagar" class="form-label">Maha-Nagar</label>
                            <input type="text" class="form-control shadow-sm" id="maha_nagar" name="maha_nagar"
                                placeholder="Enter your maha-nagar name" required>
                        </div>

                        <div class="mb-4">
                            <label for="bhag" class="form-label">Bhag</label>
                            <select class="form-select shadow-sm" id="bhag" name="bhag" required>
                                <option value="" disabled selected>Select your bhag</option>
                                <option value="Krishna Bhag">Krishna Bhag</option>
                                <option value="Balram Bhag">Balram Bhag</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="nagar" class="form-label">Nagar</label>
                            <select class="form-select shadow-sm" id="nagar" name="nagar" required>
                                <option value="" disabled selected>Select your nagar</option>
                                <option value="Yudhishthira Nagar">Yudhishthira Nagar</option>
                                <option value="Bhim Nagar">Bhim Nagar</option>
                                <option value="Arjun Nagar">Arjun Nagar</option>
                                <option value="Nakul Naga">Nakul Nagar</option>
                                <option value="Sahadev Nagar">Sahadev Nagar</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="shakha" class="form-label">Shakha</label>
                            <input type="text" class="form-control shadow-sm" id="shakha" name="shakha"
                                placeholder="Enter your shakha name" required>
                        </div>

                        <div class="mb-4">
                            <label for="user_post_name" class="form-label">User Post Name</label>
                            <select class="form-select shadow-sm" id="user_post_name" name="user_post_name" required>
                                <option value="" disabled selected>Select your nagar</option>
                                <option value="Kshetra Pracharak">Kshetra Pracharak</option>
                                <option value="Prant Pracharak">Prant Pracharak</option>
                                <option value="Vibhag Pracharak">Vibhag Pracharak</option>
                                <option value="Maha-nagar Pracharak">Maha-nagar Pracharak</option>
                                <option value="Nagar Pracharak">Nagar Pracharak</option>
                                <option value="Swayam-sevak">Swayam-sevak</option>
                            </select>
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

    <!--Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered justify-content-center login_diolog">
                <div class="modal-content login_content">
                    <div class="modal-header text-white" id="login_head">
                        <h5 class="modal-title" id="loginModalLabel">Login</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body login_body">
                        <form action="{{ route('login.dashboard') }}" method="POST">
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
                                <button type="submit" id="login_btn" class="btn">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer text-center">
                        <small class="text-muted w-100">Don't have an account? <a href="#"
                                class="text-primary">Register</a></small>
                    </div>
                </div>
            </div>
        </div>

    <!-- Footer -->
    <footer class="text-center py-4 bg-dark text-white">
        &copy; 2024 Blood Donor. All Rights Reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
