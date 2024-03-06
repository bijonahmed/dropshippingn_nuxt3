<template>
    <title>Fund</title>
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
                                <h1 class="m-0">Fund</h1>
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
                                    <!-- no data  -->
                                    <div class="no_data">
                                        <i class="fa-solid fa-triangle-exclamation"></i>
                                        <p>No withdrawal method is set, please bind the withdrawal method first! <a
                                                href="bankList.html" type="button">Add withdrawal address</a></p>
                                    </div>
                                    <!-- if data  -->
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
                                                <p class="text-start">Generally in pre transaction, Withdrawal, Freeze the
                                                    corresponding amount when the transaction is not
                                                    completed</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- list part start here  -->
                                    <div class="tab_btns">
                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="pills-tab_one-tab" data-bs-toggle="pill"
                                                    data-bs-target="#pills-tab_one" type="button" role="tab"
                                                    aria-controls="pills-tab_one" aria-selected="true">Fund List </button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-tab_two-tab" data-bs-toggle="pill"
                                                    data-bs-target="#pills-tab_two" type="button" role="tab"
                                                    aria-controls="pills-tab_two" aria-selected="false">Holding
                                                    records</button>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- tabs part start here  -->
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-tab_one" role="tabpanel"
                                            aria-labelledby="pills-tab_one-tab">
                                            <!-- first tab  -->
                                            <table class="table" style="    table-layout: fixed;
                                    width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Product Name</th>
                                                        <th>Number of days</th>
                                                        <th>Daily invesment</th>
                                                        <th>Operation</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Operation center </td>
                                                        <td>1</td>
                                                        <td>1</td>
                                                        <td class="btn-group">
                                                            <a href="#" type="button"
                                                                class="btn-secondary px-md-3 py-1 px-1">Details</a>
                                                            <a href="#" type="button"
                                                                class="btn-danger px-md-3 py-1 px-1">Buy</a>
                                                        </td>
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
                                                        <select name="" class="form-control w-50" id="">
                                                            <option value="">Status type</option>
                                                            <option value="">In progress</option>
                                                            <option value="">Satalement complete</option>
                                                        </select>
                                                        <button type="button" class="btn mx-1 btn-success ">Search</button>
                                                        <button type="button"
                                                            class="btn btn-outline-secondary ">Clear</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="table_section">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Fund name </th>
                                                            <th>Days</th>
                                                            <th>Daily returns(%) </th>
                                                            <th>Ammount held</th>
                                                            <th>Pre-earnings</th>
                                                            <th>state</th>
                                                            <th>Purches time</th>
                                                            <th>Date of expiry</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Operation center </td>
                                                            <td>1</td>
                                                            <td>1</td>
                                                            <td>1</td>
                                                            <td>1</td>
                                                            <td>1</td>
                                                            <td>1</td>
                                                            <td>1-5-24</td>
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
    </div></template>
<script>
import { defineComponent } from '@vue/composition-api'

export default defineComponent({
    setup() {

    },
})
</script>
