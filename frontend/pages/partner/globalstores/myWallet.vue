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
                                            <button class="btn btn-outline-primary bt_depo">Deposite</button>
                                            <a href="withdraw.html" class="btn btn-primary">Withdraw</a>
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
                                            <table class="table">
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
                                                            placeholder="Recharge order id ">
                                                        <button type="button"
                                                            class="btn mx-1 btn-success ">Search</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table_section">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Recharge Order Number </th>
                                                            <th>Deposite amount($)</th>
                                                            <th>Payment amount($)</th>
                                                            <th>State</th>
                                                            <th>Payment method</th>
                                                            <th>Payment time</th>
                                                            <th>Creation time</th>
                                                            <th>More </th>
                                                            <th>Operation </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>3546544654</td>
                                                            <td>1324</td>
                                                            <td></td>
                                                            <td>Unpaid</td>
                                                            <td>T1-brazil method</td>
                                                            <td>24-01-29 12:00</td>
                                                            <td>24-01-29 12:00</td>
                                                            <td>see more</td>
                                                            <td>Cosed</td>
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
                                                                    placeholder="Withdraw Order Id ">
                                                                <select name="" id="" class="form-control w-10">
                                                                    <option value="">Unpaid Payment</option>
                                                                    <option value="">Unpaid Payment</option>
                                                                </select>
                                                                <button type="button"
                                                                    class="btn mx-1 btn-success ">Search</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table_section">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Withdrawal information </th>
                                                            <th>Collection information</th>
                                                            <th>Payment information</th>
                                                            <th>remarks</th>
                                                            <th>Application time </th>
                                                            <th>More</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
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
    </div>
</template>


<script setup>
definePageMeta({
    middleware: 'is-logged-out',
})
</script>

