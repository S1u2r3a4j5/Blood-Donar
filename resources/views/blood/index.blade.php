@extends('layouts.layout')

@section('title', 'Index blade')

@section('content')


@if (session('success'))
    <div class="alert alert-success class_msg">{{ session('success') }}</div>
@endif


<!-- Hero Section -->
<div class="hero">
    <div class="sub_hero">
        <h1>Save Lives, Donate Blood</h1>
        <p>Join our community of life-saving heroes.</p>
        <a href="{{ route('blood-search') }}" class="btn btn-custom" id="findBloodDonors" onclick="disableLink(this)" >Find Blood Donors</a>
        <a href="{{ route('blood-gainer') }}" class="btn btn-custom gainer_btn">Find Blood Gainers</a>

    </div>
</div>


<script>
    function disableLink(link) {
        // Prevent the default action and prevent further clicks
        event.preventDefault(); // Prevent page reload
        
        // Disable the link to prevent further clicks
        link.style.pointerEvents = "none"; // Disable pointer events
        link.style.opacity = "0.6"; // Make it look visually disabled
        link.onclick = function() { return false; }; // Disable the click event
        window.location.href = link.href; // Manually navigate to the URL after disabling
    }
</script>

@endsection