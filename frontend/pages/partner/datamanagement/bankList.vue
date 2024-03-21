<template>
    <title>Bank List</title>
    <div>
        <div class="wrapper">
            <!-- Navbar -->
            <PartnerNavbarLayout />
            <!-- navbar -->
            <!-- Main Sidebar Container -->
            <PartnerSidebarLayout />
            <!-- Content section start here  -->
            <div class="content-wrapper">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><nuxt-link to="/partner/dashboard">Dashboard</nuxt-link></li>
                        <li class="breadcrumb-item"><a href="#">Withdrawal Method</a></li>
                    </ol>
                </nav>

                <div class="loading-indicator" v-if="loading" style="text-align: center;">
                    <Loader />
                </div>
                <center>
                    <!-- If ID exists, show Update button -->
                    <button v-if="idExists" class="btn-primary bank_paymentMethod_open p-2" @click="editCard">
                        <i class="fa-solid fa-edit"></i> Update address
                    </button>
                    <!-- If ID does not exist, show Add button -->
                    <button v-else class="btn-primary bank_paymentMethod_open p-2" @click="addCard">
                        <i class="fa-solid fa-plus"></i> Add address
                    </button>
                </center>


                <!-- Main content -->
                <section class="content">
                    <div class="s_content">
                        <ul class="card_list">
                            <li>
                                <div class="carde">
                                    <div class="card-inner">
                                        <div class="front">
                                            <img src="/assets/images/card.jpg" class="map-img">
                                            <div class="rows card-no">
                                                <span id="walletAddress" style="display: none;">{{ editinsertData.wallet_address }}</span>
                                                <p class="d-flex align-items-center"> {{ formatedAddress(editinsertData.wallet_address) }}
                                                    <button class="btn_edit" @click="copyAddressToClipboard"><i
                                                            class="fa-solid fa-eye"></i></button>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>
                <!-- main content part end here  -->
            </div>
        </div>


        <!-- add bank card part start start here  -->
        <div class="bank_paymentMethod modal_">
            <div class="mdal_content">
                <div class="m_head py-1">
                    <!-- <h6>Deposite Modal</h6> -->
                    <div class="w-50"></div>
                    <button class="bt_close" @click="closeCard">
                        <i class="fa-solid fa-x"></i>
                    </button>
                </div>
                <div class="_body">
                    <div class="form_group">



                        <div class="st_filter">
                            <form @submit.prevent="saveData()">

                                <div class="input_group">
                                    <p>Currency type<span class="text-danger">*</span></p>
                                    <select name="" id="mySelect2" class="form-control"
                                        v-model="insertData.currency_type_id">
                                        <option value="" disabled selected>Select one </option>
                                        <option v-for="type in typeArr" :key="type.id" :value="type.id">
                                            {{ type.name }}</option>
                                    </select>
                                    <span class="text-danger" v-if="errors.currency_type_id">{{
                    errors.currency_type_id[0] }}</span>

                                </div>
                                <div id="additionalFields2">
                                    <div class="input_group">
                                        <p>Address<span class="text-danger">*</span> </p>
                                        <input type="text" placeholder="Address" class="form-control"
                                            v-model="insertData.wallet_address">
                                        <span class="text-danger" v-if="errors.wallet_address">{{
                    errors.wallet_address[0] }}</span>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 mt-2">Save</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- add bank part end here  -->

        <!-- For edit mode -->

        <div class="bank_paymentMethod_edit modal_">
            <div class="mdal_content">
                <div class="m_head py-1">
                    <h6>Update</h6>
                    <div class="w-50"></div>
                    <button class="bt_close" @click="editCardCls">
                        <i class="fa-solid fa-x"></i>
                    </button>
                </div>
                <div class="_body">
                    <div class="form_group">
                        <div class="st_filter">
                            <form @submit.prevent="updateData()">
                                <input type="hidden" v-model="editinsertData.id" />
                                <div class="input_group">
                                    <p>Currency type<span class="text-danger">*</span></p>
                                    <select name="" id="mySelect2" class="form-control"
                                        v-model="editinsertData.currency_type_id">
                                        <option value="" disabled selected>Select one </option>
                                        <option v-for="type in typeArr" :key="type.id" :value="type.id">
                                            {{ type.name }}</option>
                                    </select>
                                    <span class="text-danger"
                                        v-if="errors.currency_type_id">{{ errors.currency_type_id[0] }}</span>

                                </div>
                                <div id="additionalFields2">
                                    <div class="input_group">
                                        <p>Address<span class="text-danger">*</span> </p>
                                        <input type="text" placeholder="Address" class="form-control"
                                            v-model="editinsertData.wallet_address">
                                        <span class="text-danger" v-if="errors.wallet_address">{{
                                            errors.wallet_address[0] }}</span>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 mt-2">Save</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>




        <!-- END edit mode -->
    </div>
</template>

<script setup>

definePageMeta({
    middleware: 'is-logged-out',
})
const router = useRouter()
import axios from "axios";
import Swal from 'sweetalert2'
const loading = ref(false);
const typeArr = ref([]);
const errors = ref({})
const idExists = ref();

const editCard = () => {
    $(".bank_paymentMethod_edit").fadeIn();
}

const editCardCls = () => {
    $(".bank_paymentMethod_edit").fadeOut();
}

const addCard = () => {
    $(".bank_paymentMethod").fadeIn();
}

const closeCard = () => {
    $(".bank_paymentMethod").fadeOut();
}


const currencyType = async () => {
    try {
        loading.value = true; // Set loading to true before making the request
        let response;
        response = await axios.get("/dropUser/getCurrencyType");
        //console.log("wallet: " + response.data.chkWallet);
        idExists.value = response.data.chkWallet;
        typeArr.value = response.data.data;
    } catch (error) {
        console.error("Error fetching deposit list:", error);
    } finally {
        loading.value = false; // Set loading to false after the request completes (whether success or failure)
    }

}



const copyAddressToClipboard = ()=> {
    // Get the text to copy
    const walletAddress = document.getElementById('walletAddress').innerText;

    // Create a textarea element to temporarily hold the text
    const textarea = document.createElement('textarea');
    textarea.value = walletAddress;
    textarea.setAttribute('readonly', '');
    textarea.style.position = 'absolute';
    textarea.style.left = '-9999px'; // Move the textarea off-screen

    // Add the textarea to the document
    document.body.appendChild(textarea);

    // Select the text in the textarea
    textarea.select();

    // Copy the selected text to the clipboard
    document.execCommand('copy');

    // Remove the textarea from the document
    document.body.removeChild(textarea);

    // Show a notification or perform any other action
    //alert('Address copied to clipboard');
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
            title: "Successfully copy"
        });
}


const editinsertData = ref({
    id: '',
    currency_type_id: '',
    wallet_address: '',
})


const formatedAddress = (wallet_address) => {

    console.log("wallet_address: " + wallet_address);
    const firstThreeDigits = wallet_address.substring(0, 3);
    const lastThreeDigits = wallet_address.substring(wallet_address.length - 3);
    return `${firstThreeDigits}******${lastThreeDigits}`;

}

const checkWithdrawlMethodList = async () => {
    try {
        loading.value = true; // Set loading to true before making the request
        let response;
        response = await axios.get("/dropUser/checkWithdrawalMethod");
        //console.log("wallet: " + response.data.data.wallet_address);
        idExists.value = response.data.data.id;
        editinsertData.value.id = response.data.data.id;
        editinsertData.value.wallet_address = response.data.data.wallet_address;
        editinsertData.value.currency_type_id = response.data.data.currency_type_id;
    } catch (error) {
        console.error("Error fetching deposit list:", error);
    } finally {
        loading.value = false; // Set loading to false after the request completes (whether success or failure)
    }

}


const insertData = ref({
    currency_type_id: '',
    wallet_address: '',
})


const updateData = async () => {
    const formData = new FormData();
    formData.append('id', editinsertData.value.id);
    formData.append('currency_type_id', editinsertData.value.currency_type_id);
    formData.append('wallet_address', editinsertData.value.wallet_address);
    const headers = {
        'Content-Type': 'multipart/form-data'
    };
    try {
        const res = await axios.post('/dropUser/updateMakeBank', formData, { headers });
        idExists.value = res.data;
        //console.log("resposen: " + res.data);
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
            title: "Successfully Update"
        });
        editCardCls();
        checkWithdrawlMethodList()
        router.push('/partner/datamanagement/bankList')

    } catch (error) {
        if (error.response && error.response.status === 422) {
            errors.value = error.response.data.errors;
        } else {
            //console.error("An error occurred:", error);
        }
    }
}


const saveData = async () => {
    const formData = new FormData();
    formData.append('id', editinsertData.value.id);
    formData.append('currency_type_id', insertData.value.currency_type_id);
    formData.append('wallet_address', insertData.value.wallet_address);
    const headers = {
        'Content-Type': 'multipart/form-data'
    };
    try {
        const res = await axios.post('/dropUser/makeBank', formData, { headers });
        idExists.value = res.data;
        //console.log("resposen: " + res.data);
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
            title: "Successfully"
        });
        closeCard();
        router.push('/partner/datamanagement/bankList')

    } catch (error) {
        if (error.response && error.response.status === 422) {
            errors.value = error.response.data.errors;
        } else {
            //console.error("An error occurred:", error);
        }
    }
}

onMounted(() => {
    currencyType();
    checkWithdrawlMethodList()
});
</script>

<style scoped>
.s_content {
    padding: 5px;
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 0 37px #0815420d;
}
</style>
