<template>
    <title>My wallet</title>
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
                                <h1 class="m-0">My wallet</h1>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- content-header -->

                <!-- Main content -->
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- content part start here  -->
                                <div class="s_content">
                                    <!-- no data  -->
                                    <!-- <div class="no_data">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <p>No withdrawal method is set, please bind the withdrawal method first! <a href="bankCard.html" type="button">Add withdrawal address</a></p>
                            </div> -->
                                    <div class="countDash">
                                        <div class="dash_box">
                                            <div class="dash_C">
                                                <h1>$1,02,890.00</h1>
                                                <h3>Available ammount</h3>
                                                <p class="text-start">Available ammount for operating transection</p>
                                            </div>
                                        </div>
                                        <div class="dash_box">
                                            <div class="dash_C">
                                                <h1>$1,02,890.00</h1>
                                                <h3>In transection</h3>
                                                <p class="text-start">Generally in pre transaction, Withdrawal, Freeze
                                                    the
                                                    corresponding amount when the transaction is not
                                                    completed</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- list part start here  -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="tab_btns">
                                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="pills-tab_one-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-tab_one"
                                                        type="button" role="tab" aria-controls="pills-tab_one"
                                                        aria-selected="true">Account
                                                        Details</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-tab_two-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-tab_two"
                                                        type="button" role="tab" aria-controls="pills-tab_two"
                                                        aria-selected="false">Deposite
                                                        records</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-tab_two-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-tab_three"
                                                        type="button" role="tab" aria-controls="pills-tab_three"
                                                        aria-selected="false">Withdrawal
                                                        records</button>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="btn-group">
                                            <button class="btn btn-outline-primary bt_depo"
                                                @click="depositModal">Deposite</button>
                                                <nuxt-link to="/partner/globalstores/withdraw" class="btn btn-primary">Withdraw</nuxt-link>
                                           
                                        </div>
                                    </div>
                                    <!-- tabs part start here  -->
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-tab_one" role="tabpanel"
                                            aria-labelledby="pills-tab_one-tab">
                                            <!-- first tab  -->
                                            <div class="row align-items-center btns_">
                                                <div class="col-xl-12 mb-2">
                                                    <form action="">
                                                        <div class="d-flex align-items-center">
                                                            <div class="mx-2">
                                                                <select name="" class="form-control" id="">
                                                                    <option value="">This Month</option>
                                                                    <option value="">Last Month</option>
                                                                    <option value="">Whole</option>
                                                                </select>
                                                            </div>
                                                            <div class="mx-2">
                                                                <select name="" class="form-control" id="">
                                                                    <option value="">Business type </option>
                                                                    <option value="">System</option>
                                                                </select>
                                                            </div>
                                                            <div class="me-2">
                                                                <select name="" class="form-control" id="">
                                                                    <option value="">Operation Type </option>
                                                                    <option value="">To be paid</option>
                                                                </select>
                                                            </div>
                                                            <div class="me-2">
                                                                <select name="" class="form-control" id="">
                                                                    <option value="">Account Type </option>
                                                                    <option value="">To be paid</option>
                                                                </select>
                                                            </div>

                                                            <button type="button" class="btn mx-1 btn-success "><i
                                                                    class="fa-solid fa-magnifying-glass me-2"></i>Search</button>
                                                            <button type="button"
                                                                class="btn btn-outline-secondary ">Expend</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <table class="table" style="font-size: 12px;">
                                                <thead>
                                                    <tr>
                                                        <th>Business Type </th>
                                                        <th>Operation Type</th>
                                                        <th>Amount Type</th>
                                                        <th>Operation Amount</th>
                                                        <th>Original Amount</th>
                                                        <th>Latest Amount</th>
                                                        <th>Charge description</th>
                                                        <th>Operation time</th>
                                                        <th>More</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>System</th>
                                                        <th class="text-danger">Reduce</th>
                                                        <th>Valid</th>
                                                        <th class="text-danger">-$0.00</th>
                                                        <th>$120.00</th>
                                                        <th>$690.00</th>
                                                        <th>Buy service pack*1(Decrease in effective amount)</th>
                                                        <th>24-12-12 12:00</th>
                                                        <th>More</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="pills-tab_two" role="tabpanel"
                                            aria-labelledby="pills-tab_two-tab">
                                            <!-- second tab  -->
                                            <div class="st_filter">
                                                <form action="">
                                                    <div class="d-flex align-items-center">
                                                        <input type="text" class="form-control w-50"
                                                            placeholder="Recharge order id" v-model="searchDOrderId">
                                                        <button type="button" class="btn mx-1 btn-success"
                                                            @click="depositList">Search</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table_section">
                                                <div class="loading-indicator" v-if="loading"
                                                    style="text-align: center;">
                                                    <Loader />
                                                </div>
                                                <table class="table" style="font-size: 12px;">
                                                    <thead>
                                                        <tr>
                                                            <th>Recharge Order Number </th>
                                                            <th>Deposite amount($)</th>
                                                            <th>Payment amount($)</th>
                                                            <th>Payment method</th>
                                                            <th>Payment time</th>
                                                            <th>Creation time</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="item in depositArr" :key="item.id">
                                                            <td>{{ item.depositID }}</td>
                                                            <td>{{ item.deposit_amount }}</td>
                                                            <td>{{ item.receivable_amount }}</td>
                                                            <td>{{ item.payment_method }}</td>
                                                            <td>{{ formatDate(item.created_at) }}</td>
                                                            <td>{{ formatDate(item.created_at) }}</td>
                                                            <td>{{ getStatus(item.status) }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-tab_three" role="tabpanel"
                                            aria-labelledby="pills-tab_three-tab">
                                            <!-- third tab  -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="st_filter">
                                                        <form action="">
                                                            <div class="d-flex align-items-center">
                                                                <input type="text" class="form-control w-10 me-1"
                                                                    placeholder="Withdraw Order Id " v-model="searchWOrderId">
                                                                <!-- <select name="" id="" class="form-control w-10">
                                                                    <option value="">Unpaid Payment</option>
                                                                    <option value="">Unpaid Payment</option>
                                                                </select> -->
                                                                <button type="button"
                                                                    class="btn mx-1 btn-success" @click="withdrawalList">Search</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table_section">
                                                <div class="loading-indicator" v-if="loading"
                                                    style="text-align: center;">
                                                    <Loader />
                                                </div>
                                                <table class="table" style="font-size: 12px;">
                                                    <thead>
                                                        <tr>
                                                            <th>Order Number </th>
                                                            <th>Withdrawal amount($)</th>
                                                            <th>Transaction Fee</th>
                                                            <th>Payable amount($)</th>
                                                            <th>Payment method</th>
                                                            <th>Payment time</th>
                                                            <th>Creation time</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="item in withdrawArr" :key="item.id">
                                                            <td>{{ item.withdrawID }}</td>
                                                            <td class="text-center">{{ item.withdraw_amount }}</td>
                                                            <td class="text-center">{{ item.transection_fee }}%</td>
                                                            <td class="text-center">{{ item.payable_amount }}</td>
                                                            <td>{{ item.currency_type_name }}</td>
                                                            <td>{{ formatDate(item.created_at) }}</td>
                                                            <td>{{ formatDate(item.created_at) }}</td>
                                                            <td>{{ getStatus(item.status) }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
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
                    <h6>Deposite Modal</h6>
                    <button class="bt_close" @click="depositModalCls">
                        <i class="fa-solid fa-x"></i>
                    </button>
                </div>
                <div class="_body">
                    <div class="form_group">
                        <input type="text" class="form-control rounded-0" placeholder="Deposite amount"
                            v-model="walletData.depsoitAmount" @keyup="validateInput">
                        <button class="btn btn-primary w-100 mt-2 bt_s" type="button"
                            @click="submitDepositAmount">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <!--payment modal  -->
        <div class="payment_ modal_">
            <div class="mdal_content">
                <div class="m_head">
                    <h6>Payment Varification</h6>
                    <button class="bt_close" @click="paymentclose">
                        <i class="fa-solid fa-x"></i>
                    </button>
                </div>
                <div class="_body">

                    <form @submit.prevent="saveData()">
                        <div class="form_group">
                            <!-- <h6 class="fw-bold m-0">Recharge Order Id: 978347234723</h6> -->
                            <p class="fw-bold mb-2">Recharge Amount: ${{ walletData.depsoitAmount }}</p>
                            <!-- tab buttons  -->
                            <div class="tab_btns d-flex justify-content-center">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-one-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-one" type="button" role="tab"
                                            aria-controls="pills-one" aria-selected="true">Online Deposite</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-two-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-two" type="button" role="tab"
                                            aria-controls="pills-two" aria-selected="false">Offline Deposite</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-one" role="tabpanel"
                                    aria-labelledby="pills-one-tab">
                                    <h6 class="mb-0">Payment Option</h6>
                                    <input type="hidden" class="form-control rounded-0" placeholder="Deposite amount"
                                        v-model="walletData.depsoitAmount" @keyup="validateInput">
                                    <p>{{ walletData.payment_method }}</p>
                                    <img src="/assets/images/780x432.png" class="img-fluid" loading="lazy" alt="">
                                    <button class="btn btn-primary w-100 mt-2" type="submit">Confirm</button>
                                </div>
                                <div class="tab-pane fade show" id="pills-two" role="tabpanel"
                                    aria-labelledby="pills-two-tab">
                                    <!-- no data  -->
                                    <div class="no_data">
                                        <i class="fa-solid fa-triangle-exclamation"></i>
                                        <p>Offline Deposite not supported</p>
                                    </div>
                                    <!-- <button class="btn btn-primary w-100 mt-2" type="submit">Confirm</button> -->
                                </div>
                            </div>
                        </div>
                    </form>


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
const depositArr = ref([]);
const withdrawArr = ref([]);
const searchDOrderId = ref('');
const searchWOrderId = ref('');
const walletData = ref({
    depsoitAmount: '',
    payment_method: 'Crypto',
})

const getStatus = (status) => {
    let result = '';
    if (status === 0) {
        result = 'Under review';
    } else if (status === 1) {
        result = 'Has been approved';
    } else if (status === 2) {
        result = 'Has been rejected';
    }
    return result;
}

const formatDate = (dateTimeString) => {
    const date = new Date(dateTimeString);
    const day = date.getDate();
    const month = date.getMonth() + 1;
    const year = date.getFullYear();
    const hours = date.getHours();
    const minutes = date.getMinutes();
    const seconds = date.getSeconds();

    const formattedDay = day < 10 ? '0' + day : day;
    const formattedMonth = month < 10 ? '0' + month : month;
    const formattedHours = hours < 10 ? '0' + hours : hours;
    const formattedMinutes = minutes < 10 ? '0' + minutes : minutes;
    const formattedSeconds = seconds < 10 ? '0' + seconds : seconds;

    return `${formattedDay}-${formattedMonth}-${year} ${formattedHours}:${formattedMinutes}:${formattedSeconds}`;
};


const validateInput = (event) => {
    if (/\D/g.test(event.target.value)) {
        event.target.value = event.target.value.replace(/\D/g, '');
    }
}

const depositModal = () => {
    $(".depo_modal").fadeIn();
}

const depositModalCls = () => {
    $(".depo_modal").fadeOut();
}

const submitDepositAmount = () => {
    $(".depo_modal").fadeOut();

    const depositAmount = walletData?.value?.depsoitAmount;
    // Regular expression to match only numeric values
    const numericRegex = /^[0-9]+$/;
    if (!depositAmount || !numericRegex.test(depositAmount)) {

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
            icon: "error",
            title: "Please input a valid  amount"
        });
        return false;
    }

    $(".payment_").fadeIn();
}

const paymentclose = () => {
    $(".payment_").fadeOut();
}

const saveData = async () => {
    const formData = new FormData();
    formData.append('depsoitAmount', walletData.value.depsoitAmount);
    formData.append('payment_method', walletData.value.payment_method);
    const headers = {
        'Content-Type': 'multipart/form-data'
    };
    try {
        const res = await axios.post('/dropUser/depositRequest', formData, { headers });
        console.log(res);
        walletData.value.depsoitAmount = '';
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
        depositList();
        paymentclose();
        router.push('/partner/globalstores/myWallet')

    } catch (error) {
        if (error.response && error.response.status === 422) {
            errors.value = error.response.data.errors;
        } else {
            console.error("An error occurred:", error);
        }
    }
}

const depositList = async () => {
    try {
        loading.value = true; // Set loading to true before making the request

        let response;
        if (searchDOrderId.value) {
            response = await axios.get(`/dropUser/depositRequestList?orderId=${searchDOrderId.value}`);
        } else {
            response = await axios.get("/dropUser/depositRequestList");
        }

        depositArr.value = response.data.data;
    } catch (error) {
        console.error("Error fetching deposit list:", error);
    } finally {
        loading.value = false; // Set loading to false after the request completes (whether success or failure)
    }
};


const withdrawalList = async () => {
    try {
        loading.value = true; // Set loading to true before making the request

        let response;
        if (searchWOrderId.value) {
            response = await axios.get(`/dropUser/withDrawalRequestList?orderId=${searchWOrderId.value}`);
        } else {
            response = await axios.get("/dropUser/withDrawalRequestList");
        }

        withdrawArr.value = response.data.data;
    } catch (error) {
        console.error("Error fetching withdrawal list:", error);
    } finally {
        loading.value = false; // Set loading to false after the request completes (whether success or failure)
    }
};

onMounted(() => {
    depositList(); 
    withdrawalList();
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