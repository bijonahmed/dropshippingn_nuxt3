<template>
    <title>Withdraw</title>
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
                                <h1 class="m-0">Withdraw</h1>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- content-header -->

                <!-- Main content -->
                <!-- Main content -->
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- content part start here  -->
                                <div class="s_content">
                                    <div class="row">
                                        <div class="col-md-6 m-auto">

                                            <center><span class="deposit_error" style="color: red;"></span></center>
                                            <center><span class="withdrawal_mini_error" style="color: red;"></span>
                                            </center>

                                            <form @submit.prevent="saveData()">
                                                <p class="badge_"><i class="fa-solid fa-circle-exclamation"></i>Minimum
                                                    withdraw ${{ setting.withdraw_minimum_amount }}</p>

                                                <div class="form_group">
                                                    <p>Current Amount ${{ depositAmount }}</p>

                                                </div>

                                                <div class="form_group">
                                                    <p>Withdrawal Amount</p>
                                                    <input type="text" v-model="withdrawData.withdraw_amount"
                                                        @keyup="validateInput" class="form-control rounded-0">
                                                    <span class="text-danger" v-if="errors.withdraw_amount">{{
                                                errors.withdraw_amount[0] }}</span>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form_group">
                                                            <br />
                                                            <p>Transaction Fee
                                                                {{ withdrawData.transaction_fee }} %</p>
                                                        </div>

                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form_group">
                                                            <br />
                                                            <p>Payable Amount {{ withdrawData.payable_amount }}</p>
                                                        </div>
                                                    </div>
                                                    <br />

                                                </div>
                                                <div class="form_group">
                                                    <p>Withdrawal Method</p>
                                                    <input type="text" class="form-control"
                                                        v-model="withdrawData.cyrrencytname" readonly disabled />
                                                    <input type="hidden" class="form-control"
                                                        v-model="withdrawData.bank_card" />
                                                    <span class="text-danger" v-if="errors.bank_card">{{
                                                errors.bank_card[0] }}</span>
                                                    <br />
                                                </div>

                                                <div class="form_group">
                                                    <center><span class="passwordValError" style="color: red;"></span>
                                                    </center>
                                                    <p>Please enter withdrawal password</p>
                                                    <input type="password" placeholder="xxxxxxxxxx"
                                                        v-model="withdrawData.password" class="form-control rounded-0">
                                                    <span class="text-danger" v-if="errors.password">{{
                                                errors.password[0] }}</span>

                                                </div>
                                                <button type="submit" class="btn btn-primary w-100 mt-3">Confirm
                                                    Withdrawal</button>
                                            </form>
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
            <!-- content section end here  -->
            <PartnerFooterLayout />
        </div>
        <!-- Start Modal  -->
        <!-- modal  -->
        <div class="depo_modal modal_">
            <div class="mdal_content">
                <div class="m_head">
                    Confirm
                    <div class="w-50"></div>
                    <button class="bt_close" @click="depositModalCls">
                        <i class="fa-solid fa-x"></i>
                    </button>
                </div>
                <div class="_body">
                    <div class="form_group">
                        <p class="text-black text-center">The work processing time of the Finance
                            Department is from 10 am to 10 pm.
                            Withdrawal orders submitted at other times
                            will be processed during business hours.</p>
                        <button type="button" class="btn btn-primary w-100 mt-3 bt_s"
                            @click="depositModalCls">Confirm</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- END Modal -->
    </div>
</template>

<script setup>
const router = useRouter()
import axios from "axios";
import Swal from 'sweetalert2'
definePageMeta({
    middleware: 'is-logged-out',
})
const loading = ref(false);
const depositAmount = ref();
const setting = ref('');
const passwordValError = ref('');

const withdrawData = ref({
    withdraw_amount: '',
    bank_card: '',
    password: '',
    transaction_fee: '',
    payable_amount: '',
    cyrrencytname: '',

})

const errors = ref({})

const validateInput = (event) => {
    if (/\D/g.test(event.target.value)) {
        event.target.value = event.target.value.replace(/\D/g, '');
    } else {
        //make percetage calulation : 
        //console.log("input value: " + event.target.value);
        const withdrawal = parseFloat(event.target.value); // Assuming withdrawal amount is 1000
        const percentageAmt = parseFloat(withdrawData.value.transaction_fee); // Assuming percentage fee is 5%
        const result = (withdrawal * percentageAmt) / 100; // 5% of 1000 = 50
        const pay_amont = withdrawal - result;
        withdrawData.value.payable_amount = pay_amont;
      //  console.log('pay_amont', pay_amont);

    }
}

const depositModal = () => {
    $(".depo_modal").fadeIn();
}

const depositModalCls = () => {
    $(".depo_modal").fadeOut();
}

const saveData = async () => {
    const formData = new FormData();
    formData.append('withdraw_amount', withdrawData.value.withdraw_amount);
    formData.append('bank_card', withdrawData.value.bank_card);
    formData.append('password', withdrawData.value.password);
    formData.append('payable_amount', withdrawData.value.payable_amount);
    const headers = {
        'Content-Type': 'multipart/form-data'
    };
    try {
        const res = await axios.post('/dropUser/withdrawRequest', formData, { headers });
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
            title: "Successfully send your request"
        });
        router.push('/partner/globalstores/myWallet')

    } catch (error) {
        if (error.response && error.response.status === 422) {
            const responseData = error.response.data;
            if (responseData) {
                $(".passwordValError").html(responseData.password_error);
                $(".deposit_error").html(responseData.deposit_error);
                $(".withdrawal_mini_error").html(responseData.withdrawal_mini_error);
            }

            errors.value = error.response.data.errors;
        } else {
            //console.error("An error occurred:", error);
        }
    }
}

const checkWithdrawalMethod = async () => {
    try {
        let response;
        response = await axios.get("/dropUser/chkfindWithdraInfo");
       // console.log("chkfindWithdraInfo: " + response.data.data.id);
        withdrawData.value.bank_card = response.data.data.id;
        withdrawData.value.cyrrencytname = response.data.data.name;

    } catch (error) {
        console.error("Error fetching list:", error);
    }
};

const depositList = async () => {
    try {
        loading.value = true; // Set loading to true before making the request

        let response;
        response = await axios.get("/dropUser/getMyDepositAmount");
        //console.log("deposit amount is: " + response.data.data);
        setting.value = response.data.setting;
        withdrawData.value.transaction_fee = response.data.setting.withdraw_service_charge;
        depositAmount.value = response.data.data;
    } catch (error) {
        console.error("Error fetching deposit list:", error);
    } finally {
        loading.value = false; // Set loading to false after the request completes (whether success or failure)
    }
};

onMounted(() => {
    depositModal();
    checkWithdrawalMethod();
    depositList(); // Call the brandlist function when the component is mounted
});

</script>

<style scoped>
.s_content {
    padding: 10px;
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 0 37px #0815420d;
}

.content-header {
    padding: 5px .5rem;
}

.dash_box {
    display: flex;
    justify-content: space-between;
    background: #fff;
    padding: 5px;
    border-radius: 15px;
    box-shadow: 0 0 37px #0815420d;
}
</style>