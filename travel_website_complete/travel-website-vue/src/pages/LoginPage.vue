<template>
    <div class="container-fluid vh-100">
        <div class="row h-100">
            <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center">
                <div class="login-box">
                    <div class="box-main-title"><strong>Welcome back!</strong></div>
                    <div class="box-sub-title"><strong>Enter your Credentials to access your account</strong></div>
                    <form class="mt-5 login-form" @submit.prevent="onSubmit">
                        <div class="mb-3 input-box">
                            <label for="email" class="form-label"><strong>Email address</strong></label>
                            <input type="email" class="form-control" id="email" v-model="email" aria-describedby="emailHelp" placeholder="Enter your email">
                        </div>
                        <div class="mb-3 input-box">
                            <label for="password" class="form-label"><strong>Password</strong></label>
                            <div class="d-flex align-items-center justify-content-start">
                                <input type="password" class="form-control position-relative" id="password" v-model="password" placeholder="Enter your password">
                                <!-- <i class='bx bx-hide pe-2 position-absolute hide-button text-end'></i> -->
                            </div>
                        </div>
                        <div class="mb-3 forgot-password-nav">
                            <a class="d-flex flex-row-reverse" href="forgot-password">forgot password</a>
                        </div>
                        <button type="submit" class="btn d-flex justify-content-center text-white mt-4 login-button"><strong>Login</strong></button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 img-box"></div>
        </div>
    </div>
</template>

<script>
import axios from '../plugins/axios';

export default {
    name: "LoginPage",
    data() {
        return {
            email: '',
            password: '',
        };
    },
    methods: {
        async onSubmit() {
            try {
                const response = await axios.post('login', {
                    email: this.email,
                    password: this.password,
                });
                console.log(response.data);
                this.$router.push('/admin-list-news');
            } catch (error) {
                console.error('Login failed:', error.response ? error.response.data : error.message);
            }
        },
    },
};
</script>

<style>
    * {
        padding: 0px;
        margin: 0px;
        box-sizing: border-box;
    }

    body {
        font-family: "Poppins";
    }

    .box-main-title {
        text-align: left;
        font-size: 32px;
    }

    .box-sub-title {
        font-size: 16px;
    }

    .form-label {
        font-size: 16px;
    }

    .input-box {
        text-align: left;
    }

    .input-box input {
        color: #D9D9D9;
        font-size: 16px;
        padding-left: 10px;
    }

    /* .input-box input::placeholder {
        color: #D9D9D9;
        opacity: 1;
        padding-left: 10px;
    } */

    .hide-button {
        font-size: 20px;
    }

    .forgot-password-nav a {
        text-decoration: none;
        color: #0C2A92;
        font-size: 10px;
    }

    @media only screen and (min-width: 1280px) {
        .img-box {
            background-image: url("../assets/auth-bg.png");
            background-position: center 60%;
            height: 100vh; 
            background-repeat: no-repeat;
            background-size: cover;
            border-radius: 45px 0px 0px 45px;
        }
    }

    .login-button {
        background-color: #3A5B22 !important;
        width: 100%;
    }
</style>
