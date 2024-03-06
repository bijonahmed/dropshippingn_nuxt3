<template>
    <title>Email Login</title>
    <div>
        <div class="container-fluid bg_login">
            <div class="row px-md-5 px-sm-3 mx-md-5 align-items-center " style="min-height: 100vh;">
                <div class="col-md-6 m-auto">
                    <div class="left_side">
                        <h1 class="mb-2 fw-bold">Login</h1>
                        <p>Continue with your dropshipping account</p>
                        <form @submit.prevent="login()">
                            <center><span class="text-danger text-center">{{ errors.account }}</span></center>
                            <div class="input_group">
                                <p>Email</p>
                                <input type="email" class="form-control" v-model="email">
                                <span class="text-danger">{{ errors.email }}</span>
                            </div>
                            <div class="input_group">
                                <p>Password</p>
                                <div class="eye_icon">
                                    <input id="newpass" :type="passwordFieldType" name="password" class="form-control"
                                        v-model="password">
                                    <i class="fa-regular"
                                        :class="{ 'fa-eye': passwordFieldType === 'password', 'fa-eye-slash': passwordFieldType === 'text' }"
                                        @click="togglePassword('#newpass')"></i>
                                    <span class="text-danger">{{ errors.password }}</span>
                                </div>
                            </div>
                            <div class="input_group">
                                <div class='CaptchaWrap'>
                                    <div id="CaptchaImageCode" class="CaptchaTxtField">
                                        <canvas id="CapCode" class="capcode" width="300" height="80"></canvas>
                                    </div>
                                    <input type="button" class="ReloadBtn" @click="createCaptcha">
                                </div>

                                <input type="hidden" id="UserCaptchaCode" class="CaptchaTxtField form-control mt-2"
                                    placeholder='Enter Captcha - Case Sensitive' v-model="captchaInput"
                                    @input="validateCaptcha">


                                <input type="text" class="CaptchaTxtField form-control mt-2"
                                    placeholder='Enter Captcha - Case Sensitive' v-model="userCapInput">

                                <span id="WrongCaptchaError" class="error">{{ captchaError }}</span>
                                <span class="text-danger">{{ errors.userCapInput }}</span>
                            </div>

                            <button class="btn btn-secondary w-100 my-2" type="submit" :disabled="loading">
                                <span v-if="loading">Loading...</span>
                                <span v-else>Continue with your account</span>
                            </button>
                            <div class="header__center">Or</div>
                            <p class="text-center">Create a dropshipping account? <LazyNuxtLink to="/sing-up-location">
                                    Sign up</LazyNuxtLink>
                            </p>

                            <span>By proceeding, you agree to the <a href="#">Terms and Conditions</a> and <a
                                    href="#">Privacy Policy</a></span>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from 'axios';
import {
    useUserStore
} from '~~/stores/user';

const userStore = useUserStore()
const router = useRouter()

definePageMeta({
    middleware: 'is-logged-in'
})

const loading = ref(false)
const email = ref('')
const password = ref('')
const errors = ref({ email: '', password: '' }); // Initialize error messages
const emailError = ref('');
const passwordError = ref('');

const captchaInput = ref('');
const userCapInput = ref('');
const account = ref('');
const captchaError = ref('');
const captchaValid = ref(false);


const passwordFieldType = ref('password');
const confirmPasswordFieldType = ref('password');

const togglePassword = (id) => {
    const inputField = document.querySelector(id);
    if (inputField.type === 'password') {
        inputField.type = 'text';
    } else {
        inputField.type = 'password';
    }
};


function createCaptcha() {
    const canvas = document.getElementById('CapCode');
    const context = canvas.getContext('2d');
    const captchaCode = generateCaptchaCode(6); // Change the length as needed

    context.clearRect(0, 0, canvas.width, canvas.height);
    context.font = '48px Arial';
    context.fillText(captchaCode, 10, 50);

    captchaInput.value = captchaCode;
}

function generateCaptchaCode(length) {
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    let result = '';
    for (let i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    return result;
}

function validateCaptcha() {

    if (captchaInput.value.toUpperCase() !== document.getElementById('UserCaptchaCode').value.toUpperCase()) {
        captchaError.value = 'Incorrect CAPTCHA code';
        captchaValid.value = false;
    } else {
        captchaError.value = '';
        captchaValid.value = true;
    }

}

async function login() {

    try {
        loading.value = true;
        // Your login logic here
        // Assuming you're making an API request to log in
        await userStore.login(email.value, password.value, captchaInput.value, userCapInput.value);
        const token = window.localStorage.getItem('token');
        //console.log("My token: " + token);
        if (token) {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + userStore.api_token;
        }
        router.push('/partner/dashboard')
    } catch (error) {
        loading.value = false;
        // If the request fails, display the error messages
        if (error.response && error.response.data.errors) {
            const responseErrors = error.response.data.errors;
            errors.value = {
                email: responseErrors.email ? responseErrors.email[0] : '',
                password: responseErrors.password ? responseErrors.password[0] : '',
                userCapInput: responseErrors.userCapInput ? responseErrors.userCapInput[0] : '',
                account: responseErrors.account ? responseErrors.account[0] : ''
            };
        } else {
            console.error('An error occurred while logging in:', error);
        }
    }
}

onMounted(() => {
    createCaptcha();
});

</script>
