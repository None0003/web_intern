@extends('app')

@section('title', 'Register')

@section('content')
<div class="container my-5 d-flex justify-content-center">
    <div class="col-md-6">
        <h2 class="text-center">Register</h2>
        <form id="registerForm">
            <div class="mb-3">
                <label for="usernameInput" class="form-label fs-5">Username</label>
                <input type="text" class="form-control" id="usernameInput" required>
            </div>
            <div class="mb-3">
                <label for="emailInput" class="form-label fs-5">Email</label>
                <input type="email" class="form-control" id="emailInput" required>
            </div>
            <div class="mb-3">
                <label for="passwordInput" class="form-label fs-5">Password</label>
                <input type="password" class="form-control" id="passwordInput" required>
            </div>
            <div class="mb-3">
                <label for="passwordConfirmInput" class="form-label fs-5">Confirm Password</label>
                <input type="password" class="form-control" id="passwordConfirmInput" required>
            </div>
            <button type="submit" class="btn btn-dark w-100">Register</button>
        </form>
        <div id="errorMessage" class="text-danger mt-3"></div>
        <div id="successMessage" class="text-success mt-3"></div>
    </div>
</div>

<script>
document.getElementById("registerForm").addEventListener("submit", async function(event) {
    event.preventDefault();

    let name = document.getElementById("nameInput").value;
    let email = document.getElementById("emailInput").value;
    let password = document.getElementById("passwordInput").value;
    let password_confirmation = document.getElementById("passwordConfirmInput").value;
    let errorMessage = document.getElementById("errorMessage");
    let successMessage = document.getElementById("successMessage");

    errorMessage.textContent = "";
    successMessage.textContent = "";

    try {
        let response = await fetch("{{ route('api.register') }}", {  // Gọi route API
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ name, email, password, password_confirmation })
        });

        let data = await response.json();

        if (response.ok) {
            successMessage.textContent = "Registration successful! Redirecting to login...";
            setTimeout(() => window.location.href = "/login", 2000);
        } else {
            errorMessage.textContent = data.message || "Registration failed. Please check your inputs.";
        }
    } catch (error) {
        errorMessage.textContent = "Something went wrong. Please try again!";
    }
});
</script>
@endsection
