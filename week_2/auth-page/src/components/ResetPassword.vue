<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center">
                <div class="login-box">
                    <div class="box-main-title"><strong>Reset Password</strong></div>
                    <form class="mt-5 login-form" @submit.prevent="updatePassword">
                        <div class="mb-3 input-box">
                            <label for="password" class="form-label"><strong>Confirm Password</strong></label>
                            <input type="password" class="form-control" id="password" v-model="password" placeholder="Enter your password">
                        </div>
                        <div class="mb-3 input-box">
                            <label for="password" class="form-label"><strong>Confirm Password</strong></label>
                            <input type="password" class="form-control" id="password" v-model="confirmPassword" placeholder="Re-enter your password">
                        </div>
                        <button type="submit" class="btn d-flex justify-content-center text-white mt-4 login-button"><strong>Update Password</strong></button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 img-box">

            </div>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue';

export default {
    name: "ResetPassword",
    setup() {
        const password = ref('');
        const confirmPassword = ref('');
        
        const updatePassword = () => {
            console.log(confirmPassword, password)
        }

        return {
            updatePassword,
        };
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
        font-size: 32px;
    }

    .box-sub-title {
        font-size: 16px;
    }

    .form-label {
        font-size: 16px;
    }

    .input-box input {
        color: #D9D9D9;
        font-size: 16px;
        padding-left: 20px
    }

    .forgot-password-nav a {
        text-decoration: none;
        color: #0C2A92;
        font-size: 10px;
    }

    @media only screen and (min-width: 1024px) {
        .img-box {
            background-image: url("../assets/auth-bg.jpg");
            background-position: center 60%;
            height: 1042px;
            width: 724px;
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