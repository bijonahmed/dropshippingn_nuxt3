<template>
    <title>Personal Data</title>
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
                                <h1 class="m-0">Personal Data</h1>
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
                                    <div class="row">
                                        <div class="col-md-8 m-auto">
                                            <div class="personal_data">

                                                <form @submit.prevent="saveData()" id="userSubmitFrm"
                                                    class="form-horizontal" enctype="multipart/form-data">
                                                    <label for="profile" class="d-flex justify-content-center">

                                                        <img v-if="previewUrl" :src="previewUrl" alt="Preview"
                                                            class="img-fluids" />
                                                        <img v-else src="/assets/images/blankUser.jpg"
                                                            id="preview_image" width="80px" height="80px" alt=""
                                                            class="img-fluid rounded shadow">


                                                    </label>
                                                    <input type="file" id="profile" name="image"
                                                        accept="image/png,image/jpeg" ref="files"
                                                        @change="onFileSelected" hidden>

                                                    <center><span class="text-danger" v-if="errors.file">{{
                                                    errors.file[0] }}</span></center>
                                                    <div class="d-flex justify-content-center">

                                                        <button type="submit" class="btn btn-primary "
                                                            style="font-size: 12px;"> Update </button>
                                                    </div>
                                                </form>
                                                <div class="data_">
                                                    <h6>Email: </h6>
                                                    <p>{{ email }}</p>
                                                </div>
                                                <form @submit.prevent="updateSocial()" enctype="multipart/form-data">
                                                    <div class="data_">
                                                        <h6>Telegrame: </h6>
                                                        <input type="text" class="" placeholder="Not filled"
                                                            v-model="telegram">
                                                        <button type="submit">Update&nbsp;<i
                                                                class="fa-regular fa-pen-to-square"></i></button>


                                                    </div>
                                                </form>
                                                <form @submit.prevent="updateSocial()" enctype="multipart/form-data">
                                                <div class="data_">
                                                    <h6>WhatsApp: </h6>
                                                    <input type="text" class="" placeholder="Not filled"
                                                        v-model="whtsapp">
                                                    <button type="submit">Update&nbsp;<i
                                                            class="fa-regular fa-pen-to-square"></i></button>
                                                </div>
                                            </form>
                                            <form @submit.prevent="updateSocial()" enctype="multipart/form-data">
                                                <div class="data_">
                                                    <h6>Othes way to contact: </h6>
                                                    <input type="text" class="form control" placeholder="Not filled"
                                                        v-model="othersway_connect">
                                                    <button type="submit">Update&nbsp;<i
                                                            class="fa-regular fa-pen-to-square"></i></button>
                                                </div>
                                            </form>
                                                <div class="data_">
                                                    <h6>Registration Time: </h6>
                                                    <p>{{ created_at }}</p>
                                                </div>
                                                <div class="data_">
                                                    <h6>Update Time:</h6>
                                                    <p>{{ updated_at }}</p>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- content part end here  -->
                            </div>
                        </div>
                    </div>
                </section>
                <!-- content section end here  -->
                <PartnerFooterLayout />
            </div>
        </div>
    </div>
</template>

<script setup>
definePageMeta({
    middleware: 'is-logged-out',
})
import { ref, reactive, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';
import swal from 'sweetalert2';
const router = useRouter();
if (process.client) {
    window.Swal = swal;

}
const previewUrl = ref(null);
const files = ref(null);
const file = ref(null);
const errors = ref({});
const name = ref('');
const email = ref('');
const othersway_connect = ref('');

const created_at = ref('');
const updated_at = ref('');


const telegram = ref('');
const whtsapp = ref('');


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

const onFileSelected = (event) => {
    previewImage(event)
    file.value = event.target.files[0];
};

const saveData = () => {
    const formData = new FormData();
    formData.append('file', file.value);
    const headers = {
        'Content-Type': 'multipart/form-data'
    };
    axios.post('/user/updateUserProfileImg', formData, { headers })
        .then((res) => {
            file.value = res.data.dataImg;
            document.getElementById('userSubmitFrm').reset();
            success_noti();
            router.push('/partner/datamanagement/personalData');
        }).catch(error => {
            if (error.response && error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
    });
};

const updateSocial = () =>{

    const formData = new FormData();
    formData.append('telegram', telegram.value);
    formData.append('whtsapp', whtsapp.value);
    formData.append('othersway_connect', othersway_connect.value);
    
    const headers = {
        'Content-Type': 'multipart/form-data'
    };
    axios.post('/auth/updateUserProfileSocial', formData, { headers })
        .then((res) => {
            telegram.value = res.data.telegram;
            whtsapp.value = res.data.whtsapp;
            whtsapp.othersway_connect = res.data.othersway_connect;

            success_noti();
            router.push('/partner/datamanagement/personalData');
        }).catch(error => {
            if (error.response && error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
    });

}


//Find Product Row
const checkRow = () => {
    axios.get(`/auth/showProfileData`).then(response => {
        //console.log("========" + response.data.data.name);
        name.value = response.data.data.name;
        email.value = response.data.data.email;
        telegram.value = response.data.data.telegram;
        whtsapp.value = response.data.data.whtsapp;
        othersway_connect.value = response.data.othersway_connect;
        previewUrl.value = response.data.dataImg;
        created_at.value = response.data.created_at;
        updated_at.value = response.data.updated_at;
    });
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
}


// Call the loadeditor function when the component is mounted
onMounted(async () => {
    checkRow();

});

</script>

<style scoped>
input[type=text] {
    border: 2px solid red;
    border-radius: 1px;
    background-color: #c8cac8;
}
</style>