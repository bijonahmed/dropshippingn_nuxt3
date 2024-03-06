<template>

  <head>
    <title>Signup</title>
  </head>
  <div class="bg_login">
    <div class="container">
      <div class="row px-md-5 px-sm-3 mx-md-5 align-items-center " style="min-height: 100vh;">
        <div class="col-md-6 m-auto">
          <div class="left_side">
            <h1 class="mb-2 fw-bold">Create a dropshipping account</h1>
            <p>One last step before dropshipping account</p>

            <form class="mt-12" @submit.prevent="register()">
              <div class="input_group">
                <p>Email</p>
                <span class="text-danger" v-if="errors.email">{{ errors.email[0] }}</span>
                <div class="_code">
                  <input type="email" class="form-control" v-model="email">
                  <button type="button" class="send_code" @click="sendCode" :disabled="buttonDisabled">
                    <span v-if="loading">Loading...</span>
                    <span v-else>Send Code</span>
                  </button>

                </div>
              </div>
              <div class="input_group">
                <p>OTP</p>
                <div class="d-flex">
                  <input type="text" class="form-control w-50" v-model="otp">
                  <p class="ms-2" style="font-size: 12px;">Click 'Send Code,' check your email (inbox/spam) for the OTP.
                  </p>
                </div>
                <span class="text-danger" v-if="errors.otp">{{ errors.otp[0] }}</span>
              </div>
              <div class="input_group">
                <p>New Password</p>
                <div class="eye_icon">
                  <input id="newpass" :type="passwordFieldType" name="password" class="form-control" v-model="password">
                  <i class="fa-regular"
                    :class="{ 'fa-eye': passwordFieldType === 'password', 'fa-eye-slash': passwordFieldType === 'text' }"
                    @click="togglePassword('#newpass')"></i>
                  <span class="text-danger" v-if="errors.password">{{ errors.password[0] }}</span>
                </div>
              </div>
              <div class="input_group">
                <p>Retype Password</p>
                <div class="eye_icon">
                  <input id="repass" :type="confirmPasswordFieldType" name="password" class="form-control"
                    v-model="confirmPassword">
                  <i class="fa-regular"
                    :class="{ 'fa-eye': confirmPasswordFieldType === 'password', 'fa-eye-slash': confirmPasswordFieldType === 'text' }"
                    @click="togglePassword('#repass')"></i>
                </div>
                <span class="text-danger" v-if="errors.confirmPassword">{{ errors.confirmPassword[0] }}</span>
              </div>
              <div class="input_group">
                <p>Invite Code</p>
                <div class="d-flex">
                  <input type="text" class="form-control w-50" v-model="inviteCode">
                  <p class="ms-2" style="font-size: 12px;">Enter the invitation code for registration or access.</p>
                </div>
                <span class="text-danger" v-if="errors.inviteCode">{{ errors.inviteCode[0] }}</span>
              </div>
              <div class="input_group d-flex align-items-center">
                <input type="checkbox" checked>
                <p class="ms-2 mb-0" style="font-size: 14px;">Read and agree <a href="#terms">Terms & Conditions</a></p>
              </div>
              <button type="submit" class="btn btn-secondary w-100 my-2">Create a new account</button>

              <div class="header__center">Or</div>
              <p class="text-center">Already have a account? <LazyNuxtLink to="/sign-in">Signin</LazyNuxtLink>
              </p>

              <span>By proceeding, you agree to the <a href="#">Terms and Conditions</a> and <a href="#">Privacy
                  Policy</a></span>

            </form>

          </div>
        </div>
      </div>
    </div>

  </div>
</template>

<script setup>
import { ref, watch, onMounted } from "vue";
import { useUserStore } from '~~/stores/user';
import axios from "axios";

const router = useRouter();
const userStore = useUserStore()
const loading = ref(false);
const errors = ref({});

let email = ref('');
let name = ref('');
let password = ref(null);
let inviteCode = ref(null);
let confirmPassword = ref(null);
let otp = ref(null)

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

const checkEmail = async () => {
  try {
    loading.value = true;
    const response = await axios.post('/unauthenticate/checkEmail', {
      email: email.value // Send the email value in the request body
    });
    console.log("Send Code: " + response.data);
    //productdata.value = response.data.data;

  } catch (error) {
    if (error.response && error.response.status === 422) {
      errors.value = error.response.data.errors;
    } else {
      // Handle other types of errors here
      console.error('An error occurred:', error);
    }
  }
};

const buttonDisabled = ref(false); // Initially, button is enabled

async function sendCode() {
  if (!buttonDisabled.value) { // Check if button is not disabled
    try {
      loading.value = true; // Show loader
      buttonDisabled.value = true; // Disable the button to prevent double-clicking
      // Your asynchronous operation (e.g., axios request)
      await checkEmail(); // Assuming checkEmail is an asynchronous function
    } finally {
      loading.value = false; // Hide loader
      buttonDisabled.value = false; // Re-enable the button after operation completes or fails
    }
  }
}

const register = async () => {
  errors.value = null

  try {
    await userStore.register(
      name.value,
      email.value,
      otp.value,
      inviteCode.value,
      password.value,
      confirmPassword.value
    )
    router.push('/signin/email-login')
  } catch (error) {
    //console.log(error)
    errors.value = error.response.data.errors
  }
}
</script>
