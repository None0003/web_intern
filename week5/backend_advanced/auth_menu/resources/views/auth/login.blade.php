@extends('app')

@section('title', 'Login')

@section('content')
<div class="container my-5 d-flex justify-content-center">
    <div class="col-md-6">
        <h2 class="text-center">Login</h2>
        <form id="loginForm">
            <div class="mb-3">
                <label for="emailInput" class="form-label fs-5">Email</label>
                <input type="email" class="form-control" id="emailInput" required>
            </div>
            <div class="mb-3">
                <label for="passwordInput" class="form-label fs-5">Password</label>
                <input type="password" class="form-control" id="passwordInput" required>
            </div>
            <div class="d-flex">
                <div class="col-md-6 fs-6 my-2">
                    <a href="{{ route('forgot-password') }}" class="text-black">Forgot password?</a>
                </div>
                <div class="col-md-6 fs-6 my-2 text-end">
                    <a href="{{ route('register') }}" class="text-black">Don't have an account? Register</a>
                </div>
            </div>
            <button type="submit" class="btn btn-dark w-100">Login</button>
        </form>
        <div id="errorMessage" class="text-danger mt-3"></div>
    </div>
</div>

<script>
document.getElementById("loginForm").addEventListener("submit", async function(event) {
    event.preventDefault(); // Ngăn chặn reload trang

    let email = document.getElementById("emailInput").value;
    let password = document.getElementById("passwordInput").value;
    let errorMessage = document.getElementById("errorMessage");

    errorMessage.textContent = ""; // Xóa lỗi cũ

    try {
        let response = await fetch("{{ route(name: 'api.login') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ email, password })
        });

        let data = await response.json();

        if (response.ok) {
            localStorage.setItem("authToken", data.token); // Lưu token vào localStorage
            window.location.href = "/dashboard"; // Điều hướng sau khi đăng nhập thành công
        } else {
            errorMessage.textContent = data.message || "Invalid email or password";
        }
    } catch (error) {
        errorMessage.textContent = "Something went wrong. Please try again!";
    }
});
</script>
@endsection
