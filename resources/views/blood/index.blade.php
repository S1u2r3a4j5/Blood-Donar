@extends('layouts.layout')

@section('title', 'Index blade')

@section('content')
    <style>
        .hero {
            background: linear-gradient(rgb(14 6 6 / 50%), rgb(15 1 1 / 50%)),
                url("{{ asset('image/background-home.jpeg') }}") no-repeat center center / cover;
            height: 630px !important;
        }

        /* Hero Section CSS */

        .sub_hero h1 {
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
            font-size: 3rem !important;
            font-weight: bold !important;
        }

        .sub_hero p {
            font-size: 1.2rem;
            margin-bottom: 20px;
            color: #f3f3f3;
        }

        .btn-custom {
            display: inline-block;
            background-color: #e63946;
            color: #fff;
            padding: 15px 30px;
            font-size: 1rem;
            /* border-radius: 50px; */
            text-decoration: none;
            margin: 10px;
            transition: all 0.3s ease-in-out;
        }

        .btn-custom:hover {
            background-color: #d62828;
            transform: scale(1.1);
        }

        .gainer_btn {
            background-color: #e63946;
        }

        .gainer_btn:hover {
            background-color: #e63946;
        }

        #findBloodDonors:disabled {
            background-color: #555 !important;
            cursor: not-allowed;
        }

        /* Blood Donor Information Section CSS */
        .blood-donor-info {
            background-color: #f8f9fa;
            padding: 80px 20px;
        }

        .section-title {
            font-size: 2.5rem;
            text-align: center;
            font-weight: bold;
            color: #e63946;
            margin-bottom: 40px;
            position: relative;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 100px;
            height: 4px;
            background-color: #e63946;
            margin: 10px auto;
        }

        .intro-text {
            font-size: 1.1rem;
            text-align: center;
            color: #555;
            margin-bottom: 40px;
        }

        .guidelines {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .guideline-box {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 30%;
            min-width: 280px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s ease-in-out;
        }

        .guideline-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .guideline-box i {
            font-size: 3rem;
            color: #e63946;
            margin-bottom: 20px;
        }

        .guideline-box h3 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #333;
        }

        .guideline-box ul {
            text-align: left;
            padding-left: 20px;
        }

        .guideline-box ul li {
            margin-bottom: 10px;
            font-size: 1rem;
            color: #555;
        }

        .guideline-box ul li strong {
            color: #e63946;
        }

        .final-note {
            text-align: center;
            margin-top: 40px;
            font-size: 1.2rem;
            color: #333;
        }

        @media (max-width: 600px) {

            .hero {
                height: 584px !important;
            }


            .sub_hero {
                margin-bottom: 60px;

            }

            .sub_hero h1 {
                text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
                font-size: 3rem !important;
                font-weight: bold !important;
            }
        }
    </style>

    @if (session('success'))
        <div class="alert alert-success ">{{ session('success') }}</div>
    @endif


    <!-- Hero Section -->
    <div class="hero">
        <div class="sub_hero">
            <h1>Save Lives, Donate Blood</h1>
            <p>Join our community of life-saving heroes.</p>
            <a href="{{ route('blood-search') }}" class="btn btn-custom" id="findBloodDonors" onclick="disableLink(this)">Find
                Blood Donors</a>
            <a href="{{ route('blood-gainer') }}" class="btn btn-custom gainer_btn">Find Blood Gainers</a>

        </div>
    </div>

    <!-- Blood Donor Information Section -->
    <section class="blood-donor-info">
        <div class="container">
            <h2 class="section-title">Important Guidelines for Blood Donors</h2>
            <p class="intro-text">Donating blood is a noble act that can save lives. Please follow these essential
                guidelines to ensure both your safety and the safety of the recipient:</p>

            <div class="guidelines">
                <div class="guideline-box">
                    <i class="fas fa-exclamation-circle"></i>
                    <h3>What Blood Donors Should Avoid</h3>
                    <ul>
                        <li><strong>Do not donate blood if you are sick:</strong> Wait until you're fully recovered.</li>
                        <li><strong>Avoid alcohol and smoking:</strong> Refrain from alcohol and smoking for at least 24
                            hours before donation.</li>
                        <li><strong>Do not donate on an empty stomach:</strong> Eat a light meal before donating blood.</li>
                        <li><strong>Avoid strenuous physical activity:</strong> Rest after donating blood and avoid heavy
                            exercise.</li>
                        <li><strong>Avoid certain medications:</strong> Consult with the donation center if you're on any
                            medication.</li>
                    </ul>
                </div>

                <div class="guideline-box">
                    <i class="fas fa-check-circle"></i>
                    <h3>What to Do Before and After Donating Blood</h3>
                    <ul>
                        <li><strong>Stay hydrated:</strong> Drink plenty of water before and after donating.</li>
                        <li><strong>Eat a healthy meal:</strong> Include iron-rich foods like spinach and red meat in your
                            diet.</li>
                        <li><strong>Rest:</strong> Relax for a few minutes after donating blood to avoid dizziness.</li>
                    </ul>
                </div>

                <div class="guideline-box">
                    <i class="fas fa-info-circle"></i>
                    <h3>Eligibility Criteria for Blood Donation</h3>
                    <ul>
                        <li>Age: 18 to 65 years (In some cases, from 17 with consent).</li>
                        <li>Weight: At least 50 kg (110 lbs).</li>
                        <li>Hemoglobin: Must have a healthy hemoglobin level.</li>
                        <li>Health: Must be free of infections or chronic conditions.</li>
                    </ul>
                </div>
            </div>

            <p class="final-note">By following these guidelines, you can safely donate blood and help save lives. Thank you
                for being a life-saving hero!</p>
        </div>
    </section>

    <script>
        function disableLink(link) {
            // Prevent the default action and prevent further clicks
            event.preventDefault(); // Prevent page reload

            // Disable the link to prevent further clicks
            link.style.pointerEvents = "none"; // Disable pointer events
            link.style.opacity = "0.6"; // Make it look visually disabled
            link.onclick = function() {
                return false;
            }; // Disable the click event
            window.location.href = link.href; // Manually navigate to the URL after disabling
        }
    </script>

@endsection
