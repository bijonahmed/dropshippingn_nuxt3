<template>
    <title>Account Security</title>
    <div>
        <div class="wrapper">
            <!-- Navbar -->
            <PartnerNavbarLayout />
            <!-- navbar -->
            <!-- Main Sidebar Container -->
            <PartnerSidebarLayout />
            <!-- Content section start here  -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Account Security</h1>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- content part start here  -->
                                <div class="s_content">
                                    <div class="sequrity_container">
                                        <div class="sequrity_div">
                                            <i class="fa-solid fa-user"></i>
                                            <h5>Password</h5>
                                            <p>There is a risk of theft on the Internet. It is recommended that
                                                you regularly change your password to protect security,</p>
                                            <a class="btn btn-primary pass_mdal_open w-100"
                                                @click="changePassword">Change</a>
                                        </div>
                                        <div class="sequrity_div">
                                            <i class="fa-solid fa-wallet"></i>
                                            <h5>Withdrawal Password</h5>
                                            <p>By default, the password is blank, For safety reasons, please
                                                change it to a different valin,</p>
                                            <div v-if="with_show_password !== ''">
                                                <a class="btn wdrl_mdal_open btn-primary w-100"
                                                    @click="createWithdrawPass">Update</a>
                                            </div>
                                            <div v-else>
                                                <a class="btn wdrl_mdal_open btn-primary w-100"
                                                    @click="createWithdrawPass">Create</a>
                                            </div>


                                        </div>
                                        <div class="sequrity_div">
                                            <i class="fa-solid fa-mobile"></i>
                                            <h5>Phone Number</h5>
                                            <p>You haven't bound your mobile phone number yet Can be
                                                used for login, password retrieval, nocount security
                                                management verification, and acceptance of account reminder
                                                notifications</p>
                                            <div v-if="chk_phone_number !== ''">
                                                <a class="btn phone_mdal_open btn-primary w-100"
                                                    @click="cahgnePhoneNumber">Update</a>
                                            </div>
                                            <div v-else>
                                                <a class="btn phone_mdal_open btn-primary w-100"
                                                    @click="cahgnePhoneNumber">Change</a>
                                            </div>

                                        </div>
                                        <div class="sequrity_div">
                                            <i class="fa-solid fa-envelope"></i>
                                            <h5>E-mail</h5>
                                            <p>You have not hound an email yet Can be used for login,
                                                password retrieval, account security management verification,
                                                and receiving account reminder emails,</p>

                                           <div v-if="chk_phone_number !== ''">
                                                    <a class="btn email_mdal_open btn-primary w-100"
                                                @click="changeEmailModal">Update</a>
                                            </div>
                                            <div v-else>
                                                <a class="btn email_mdal_open btn-primary w-100"
                                                @click="changeEmailModal">Change</a>
                                            </div>



                                           
                                        </div>
                                        <div class="sequrity_div">
                                            <i class="fa-solid fa-envelope"></i>
                                            <h5>Passport/Id card Photo</h5>
                                            <p>Passport/ID card image binding … It can be used for password
                                                retrieval, account security management authentication</p>
                                                <div v-if="chk_doc_file !== ''">
                                                    <a class="btn btn-primary id_mdal_open w-100"
                                                @click="passportCartModal">Upload</a>
                                            </div>
                                            <div v-else>
                                                <a class="btn btn-primary id_mdal_open w-100"
                                                @click="passportCartModal">Change</a>
                                            </div>






                                          
                                        </div>
                                        <div class="sequrity_div">
                                            <i class="fa-solid fa-envelope"></i>
                                            <h5>Account Cancelation</h5>
                                            <p>You must be no unfinish order to log off</p>
                                            <a class="btn btn-danger cancel_mdal_open w-100"
                                                @click="cancelationModal">Cancelation</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- content part end here  -->
                            </div>
                        </div>
                    </div>
                </section>
                <!-- main content part end here  -->
            </div>
        </div>
        <!-- Start Modal -->
        <!-- password modal  -->
        <div class="pass_mdal modal_">
            <div class="mdal_content">
                <div class="m_head">
                    <h6>Change Password</h6>
                    <div class="w-50"></div>
                    <button class="bt_close" @click="closePassword">
                        <i class="fa-solid fa-x"></i>
                    </button>
                </div>
                <div class="_body">
                    <div class="form_group">
                        <form @submit.prevent="updatePassword()" id="pass_formrest" class="forms-sample"
                            enctype="multipart/form-data">
                            <div class="form_group">
                                <div class="input_group">
                                    <p>Old Password</p>
                                    <div class="eye_icon">
                                        <input id="oldpassp" type="password" name="password" class="form-control"
                                            v-model="update_pass.old_password">
                                        <i toggle="#oldpassp" @click="togglePassword('#oldpassp')"
                                            class="fa-regular fa-eye toggle_password"></i>
                                        <span class="text-danger" v-if="errors.old_password">{{ errors.old_password[0]
                                            }}</span>
                                    </div>
                                </div>
                                <div class="input_group">
                                    <p>New Password</p>
                                    <div class="eye_icon">
                                        <input id="newpassp" type="password" name="password" class="form-control"
                                            v-model="update_pass.password">
                                        <i toggle="#newpassp" @click="togglePassword('#newpassp')"
                                            class="fa-regular fa-eye toggle_password"></i>
                                        <span class="text-danger" v-if="errors.password">{{ errors.password[0] }}</span>
                                    </div>
                                </div>
                                <div class="input_group">
                                    <p>Confirm Password</p>
                                    <div class="eye_icon">
                                        <input id="repassp" type="password" name="password" class="form-control"
                                            v-model="update_pass.password_confirmation">
                                        <i toggle="#repassp" @click="togglePassword('#repassp')"
                                            class="fa-regular fa-eye toggle_password"></i>
                                        <span class="text-danger" v-if="errors.password_confirmation">{{
                                                    errors.password_confirmation[0] }}</span>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary  w-100 mt-3 bt_s">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- Withdrawal password modal  -->
        <div class="wdrl_mdal modal_">
            <div class="mdal_content">
                <div class="m_head">
                    <h6>Withdrawal</h6>
                    <div class="w-50"></div>
                    <button class="bt_close" @click="createWithdrawPassClose">
                        <i class="fa-solid fa-x"></i>
                    </button>
                </div>
                <div class="_body">
                    <div class="form_group">
                        <form @submit.prevent="updateWithPassword()" id="pass_with_formrest" class="forms-sample"
                            enctype="multipart/form-data">
                            <div class="form_group">
                                <p class="badge_" v-if="with_show_password !== ''"><i
                                        class="fa-solid fa-circle-exclamation"></i>

                                    If you forget your
                                    withdrawal
                                    password please contact us support@dropshipping.com</p>
                                <div class="input_group">
                                    <p>New Password</p>
                                    <div class="eye_icon">
                                        <input id="newpass" type="password" name="password" class="form-control"
                                            v-model="with_pass.password">
                                        <i toggle="#newpass" @click="togglePassword('#newpass')"
                                            class="fa-regular fa-eye toggle_password"></i>
                                        <span class="text-danger" v-if="errors.password">{{ errors.password[0] }}</span>
                                    </div>
                                </div>
                                <div class="input_group">
                                    <p>Retype Password</p>
                                    <div class="eye_icon">
                                        <input id="repass" type="password" class="form-control"
                                            v-model="with_pass.password_confirmation">
                                        <i toggle="#repass" @click="togglePassword('#repass')"
                                            class="fa-regular fa-eye toggle_password"></i>
                                        <span class="text-danger" v-if="errors.password_confirmation">{{
                                                    errors.password_confirmation[0] }}</span>
                                    </div>

                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary  w-100 mt-3 bt_s">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Phone number  modal  -->
        <div class="phone_mdal modal_">
            <div class="mdal_content">
                <div class="m_head">
                    <h6>Phone Number</h6>
                    <div class="w-50"></div>
                    <button class="bt_close" @click="cahgnePhoneNumberClose">
                        <i class="fa-solid fa-x"></i>
                    </button>
                </div>
                <div class="_body">
                    <div class="form_group">

                        <form @submit.prevent="updatePhoneInfo()" id="phone_formrest" class="forms-sample"
                            enctype="multipart/form-data">
                            <div class="form_group">
                                <div class="input_group">
                                    <p>Phone</p>
                                    <div class="_code">
                                        <input type="text" class="form-control w-100 phoneNumber" id="mobile_code"
                                            v-model="update_phone.phone_number">
                                        <span class="text-danger" v-if="errors.phone_number">{{ errors.phone_number[0]
                                            }}</span>
                                    </div>
                                </div>

                                <div class="input_group">
                                    <p>Password</p>
                                    <div class="eye_icon">
                                        <input id="repassph" type="password" name="password" class="form-control"
                                            v-model="update_phone.password">
                                        <i toggle="#repassph" @click="togglePassword('#repassph')"
                                            class="fa-regular fa-eye toggle_password"></i>
                                    </div>
                                    <span class="text-danger" v-if="errors.password">{{ errors.password[0] }}</span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary  w-100 mt-3 bt_s">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- email modal  -->
        <div class="email_mdal modal_">
            <div class="mdal_content">
                <div class="m_head">
                    <h6>Email</h6>
                    <div class="w-50"></div>
                    <button class="bt_close" @click="changeEmailModalClose">
                        <i class="fa-solid fa-x"></i>
                    </button>
                </div>
                <div class="_body">
                    <div class="form_group">

                        <form @submit.prevent="updateEmailInfo()" id="email_formrest" class="forms-sample"
                            enctype="multipart/form-data">
                            <div class="form_group">
                                <div class="input_group">
                                    <p>Email</p>
                                    <div class="_code">
                                        <input type="email" class="form-control w-100" v-model="update_email.email">
                                        <!-- <input type="tel" value="" class="form-control"> update_email-->
                                        <!-- <button type="button" class="send_code">Send Code</button> -->
                                        <span class="text-danger" v-if="errors.email">{{ errors.email[0]
                                            }}</span>
                                    </div>
                                </div>
                                <div class="input_group d-none">
                                    <p>OTP</p>
                                    <div class="d-flex">
                                        <input type="text" class="form-control w-50">
                                        <p class="ms-2" style="font-size: 12px;">Click 'Send Code,' check your phone
                                            (inbox/message) for the
                                            OTP.
                                        </p>
                                    </div>
                                </div>
                                <div class="input_group">
                                    <p>Password</p>
                                    <div class="eye_icon">
                                        <input id="passE" type="password" name="password" class="form-control"
                                            v-model="update_email.password">
                                        <i toggle="#passE" click="togglePassword('#passE')"
                                            class="fa-regular fa-eye toggle_password"></i>
                                    </div>
                                    <span class="text-danger" v-if="errors.password">{{ errors.password[0] }}</span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary  w-100 mt-3 bt_s">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Passport/Id modal  -->
        <div class="id_mdal modal_">
            <div class="mdal_content">
                <div class="m_head">
                    <h6>Passport/Id card photo </h6>
                    <div class="w-50"></div>
                    <button class="bt_close" @click="passportCartModalClose">
                        <i class="fa-solid fa-x"></i>
                    </button>
                </div>
                <div class="_body">
                    <div class="form_group">

                        <form @submit.prevent="updateProffPass()" id="docSubmitFrm" class="form-horizontal"
                            enctype="multipart/form-data">
                            <div class="form_group">
                                <div class="input_group">
                                    <label for="profile" class="text-center d-flex">
                                        <div class="img_div">
                                            <img v-if="previewUrl" :src="previewUrl" alt="Preview" class="img-fluids"
                                                style="height:100%; width:100%;" />
                                            <img v-else src="/assets/images/upload-to-cloud-100.png" style="
                                        max-height: 250px;
                                        object-fit: cover;
                                        width: 100%;" id="preview_image" class=" img-fluid" alt="">

                                            <span class="text-danger" v-if="errors.doc_file">{{ errors.doc_file[0]
                                                }}</span>

                                        </div>
                                    </label>
                                    <input type="file" name="image" id="profile" @change="onFileSelected" hidden
                                        class="form-control">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary  w-100 mt-3 bt_s">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- cancel modal  -->
        <div class="cancel_mdal modal_">
            <div class="mdal_content">
                <div class="m_head">
                    <h6>Are you sure?</h6>
                    <div class="w-50"></div>
                    <button class="bt_close" @click="cancelationModalclose">
                        <i class="fa-solid fa-x"></i>
                    </button>
                </div>
                <div class="_body">
                    <p class="text-center"><strong>Please read the content:
                            The term of these Terms of Service will begin on the date of your completed registration for
                            use
                            of
                            a Service and continue
                            until terminated by us or by you, as provided below (the "Term" ).
                            You may cancel your Account and terminate the Terms of Service at any time by contacting
                            Shopify
                            top
                            and then following
                            the specific instructions indicated to you in Shopify top' s response.
                            Without limiting any other remedies, we may suspend or terminate your Account or the Terms
                            of
                            Service for any reason,
                            without notice and at any time (unless otherwise required by law),
                            activity in connection with the Service
                            Term and condition</strong></p>
                    <button type="button" class="btn btn-danger  w-100 mt-3"
                        @click="submitCancelAccount">Confirm</button>

                    <button type="button" class="btn btn-success  w-100 mt-3 bt_s"
                        @click="cancelationModalclose">Cancel</button>
                </div>
            </div>
        </div>
        <!-- END Modal -->
    </div>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue';
import axios from 'axios';
import swal from 'sweetalert2';
import { storeToRefs } from 'pinia';
import { useRouter } from 'vue-router';
import { useUserStore } from '~~/stores/user'
const router = useRouter();
const userStore = useUserStore();
const {
    isLoggedIn
} = storeToRefs(userStore)
computed(async () => {
    try {
        await userStore.getUser()
    } catch (error) { }
})
if (process.client) {
    window.Swal = swal;

}

definePageMeta({
    middleware: 'is-logged-out',

})
const errors = ref({});
const notifmsg = ref('');
const file = ref(null);
const previewUrl = ref(null);

const update_pass = reactive({
    password: '',
    old_password: '',
    password_confirmation: '',
});

const with_pass = reactive({
    password: '',
    password_confirmation: '',
});

const update_phone = reactive({
    phone_number: '',
    password: '',
});

const update_email = reactive({
    email: '',
    password: '',
});

const onFileSelected = (event) => {
    previewImage(event)
    file.value = event.target.files[0];
};

const previewImage = (event) => {
    const file = event.target.files[0];
    previewUrl.value = URL.createObjectURL(file);
    checkImageDimensionsThunbnail(file);
};

const checkImageDimensionsThunbnail = (file) => {
    const reader = new FileReader();
    reader.onload = (e) => {
        const img = new Image();
        img.src = e.target.result;
        img.onload = () => {
            previewUrl.value = e.target.result;
        };
    };
    reader.readAsDataURL(file);
    //resetInput();
};

const togglePassword = (inputId) => {
    const input = document.querySelector(inputId); // Get the password input element
    if (input) {
        // Toggle the input type between "password" and "text"
        input.type = input.type === "password" ? "text" : "password";
    }
};

const updateEmailInfo = () => {
    const formData = new FormData();
    formData.append('email', update_email.email);
    formData.append('password', update_email.password);

    const headers = {
        'Content-Type': 'multipart/form-data'
    };
    axios.post('/user/changeEmailPartner', formData, { headers })
        .then((res) => {
            document.getElementById('email_formrest').reset();
            success_noti();
            changeEmailModalClose();
            router.push('/partner/datamanagement/accountSecurity');
        }).catch(error => {
            if (error.response && error.response.status === 422) {
                errors.value = error.response.data.errors;
            } else {
                // Handle other types of errors here
                console.error('An error occurred:', error);
            }
        });
};
const updatePhoneInfo = () => {
    const formData = new FormData();
    formData.append('phone_number', update_phone.phone_number);
    formData.append('password', update_phone.password);

    const headers = {
        'Content-Type': 'multipart/form-data'
    };
    axios.post('/user/changeMobileNumPartner', formData, { headers })
        .then((res) => {
            document.getElementById('phone_formrest').reset();
            success_noti();
            cahgnePhoneNumberClose();
            router.push('/partner/datamanagement/accountSecurity');
        }).catch(error => {
            if (error.response && error.response.status === 422) {
                errors.value = error.response.data.errors;
            } else {
                // Handle other types of errors here
                console.error('An error occurred:', error);
            }
        });
};

const updatePassword = () => {
    const formData = new FormData();
    formData.append('old_password', update_pass.old_password);
    formData.append('password', update_pass.password);
    formData.append('password_confirmation', update_pass.password_confirmation)

    const headers = {
        'Content-Type': 'multipart/form-data'
    };
    axios.post('/user/changePasswordPartner', formData, { headers })
        .then((res) => {
            document.getElementById('pass_formrest').reset();
            success_noti();
            closePassword();
            router.push('/partner/datamanagement/accountSecurity');
        }).catch(error => {
            if (error.response && error.response.status === 422) {
                errors.value = error.response.data.errors;
            } else {
                // Handle other types of errors here
                console.error('An error occurred:', error);
            }
        });
};

const updateWithPassword = () => {
    const formData = new FormData();
    formData.append('password', with_pass.password);
    formData.append('password_confirmation', with_pass.password_confirmation)

    const headers = {
        'Content-Type': 'multipart/form-data'
    };
    axios.post('/user/withdrawPasswordPartner', formData, { headers })
        .then((res) => {
            document.getElementById('pass_formrest').reset();
            success_noti();
            createWithdrawPassClose();
            router.push('/partner/datamanagement/accountSecurity');
        }).catch(error => {
            if (error.response && error.response.status === 422) {
                errors.value = error.response.data.errors;
            } else {
                // Handle other types of errors here
                console.error('An error occurred:', error);
            }
        });
};

const submitCancelAccount = () => {

    const formData = new FormData();
    formData.append('status', 0);
    const headers = {
        'Content-Type': 'multipart/form-data'
    };
    axios.post('/user/cancelAccount', formData, { headers })
        .then((res) => {
            //  document.getElementById('pass_formrest').reset();
            success_noti();
            cancelationModalclose();
            logout();
            router.push('/');

        }).catch(error => {
            if (error.response && error.response.status === 422) {
                errors.value = error.response.data.errors;
            } else {
                // Handle other types of errors here
                console.error('An error occurred:', error);
            }
        });
};
const updateProffPass = () => {
    const formData = new FormData();
    formData.append('doc_file', file.value);
    const headers = {
        'Content-Type': 'multipart/form-data'
    };
    axios.post('/user/updateUserProPass', formData, { headers })
        .then((res) => {
            file.value = res.data.doc_file;
            document.getElementById('docSubmitFrm').reset();
            success_noti();
            passportCartModalClose();
            router.push('/partner/datamanagement/accountSecurity');
        }).catch(error => {
            if (error.response && error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        });
};

const logout = async () => {
    const router = useRouter(); // Get the router object
    //let res = confirm('Are you sure you want to sign out?');
    try {
        await userStore.logout();
        localStorage.removeItem('token');
        router.push('/'); // Redirect to the root route
        return;

    } catch (error) {
        // console.error(error);
    }
};
const success_noti = () => {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 1000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
    Toast.fire({
        icon: "success",
        title: "Successfully update."
    });
};

//For all modal action
const changePassword = () => {
    $(".pass_mdal").fadeIn();
};
const closePassword = () => {
    $(".pass_mdal").fadeOut();
};

const createWithdrawPass = () => {
    $(".wdrl_mdal").fadeIn();
};
const createWithdrawPassClose = () => {
    $(".wdrl_mdal").fadeOut();
};

const passportCartModal = () => {
    $(".id_mdal").fadeIn();
};
const passportCartModalClose = () => {
    $(".id_mdal").fadeOut();
};
const cancelationModal = () => {
    $(".cancel_mdal").fadeIn();
};
const cancelationModalclose = () => {
    $(".cancel_mdal").fadeOut();
};

const cahgnePhoneNumber = () => {
    $(".phone_mdal").fadeIn();
};
const cahgnePhoneNumberClose = () => {
    $(".phone_mdal").fadeOut();
};

const changeEmailModal = () => {
    $(".email_mdal").fadeIn();
};
const changeEmailModalClose = () => {
    $(".email_mdal").fadeOut();
};


const with_show_password = ref('');
const chk_phone_number = ref('');
const chk_email_info = ref('');
const chk_doc_file = ref('');


const checkRow = () => {
    axios.get(`/auth/showProfileData`).then(response => {
        //console.log("========" + response.data.doc_file);
        with_show_password.value = response.data.data.with_show_password;
        chk_email_info.value = response.data.data.email;
        chk_doc_file.value = response.data.data.doc_file;
        previewUrl.value = response.data.doc_file;
        update_email.email = response.data.data.email;
        chk_phone_number.value = response.data.data.phone_number;
        update_phone.phone_number = response.data.data.phone_number;
    });
};


// Call the loadeditor function when the component is mounted
onMounted(async () => {
    checkRow();
});

</script>

<style scoped>
.m_head {
    background: #373063;
    border-radius: 0;
    padding: 10px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: #fff;
}
</style>