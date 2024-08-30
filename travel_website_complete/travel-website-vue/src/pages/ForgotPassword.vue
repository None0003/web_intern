<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center">
                <div v-if="!isSent">
                    <div class="login-box">
                        <div class="box-main-title"><strong>Forgot password</strong></div>
                        <div class="box-sub-title"><strong>Please enter your email to reset the password</strong></div>
                        <form class="mt-5 login-form" @submit.prevent="send">
                            <div class="mb-3 input-box">
                                <label for="email" class="form-label"><strong>Email address</strong></label>
                                <input type="email" class="form-control" id="email" v-model="email" aria-describedby="emailHelp" placeholder="Enter your email">
                            </div>
                            <button type="submit" class="btn d-flex justify-content-center text-white mt-4 login-button"><strong>Send</strong></button>
                        </form>
                    </div>
                </div>
                <div v-else>
                    <div class="box-main-title"><strong>Check your email</strong></div>
                    <div class="box-sub-title"><strong>Name
                        We sent you an email with introductions for resetting your password</strong></div>
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
    name: "ForgotPassword",
    setup() {
        const email = ref('');
        const isSent = ref(false);
        
        const send = () => {
            console.log(email);
            isSent.value = true;
        }

        return {
            send
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
        padding-left: 10px
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