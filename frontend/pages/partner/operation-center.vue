<template>
    <title>Operation Center</title>
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
                                <h1 class="m-0">Operation Center</h1>
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
                                    <div class="countDash">
                                        <div class="dash_box">
                                            <!-- <i class="far fa-user"></i> -->
                                            <i class="fa-solid fa-tag"></i>
                                            <div class="dash_C">
                                                <h3>Total Sale</h3>
                                                <h1>1,02,890</h1>
                                                <span>Current month sale: $00.00</span>
                                                <span>Last month sale: $00.00</span>
                                            </div>
                                        </div>
                                        <div class="dash_box">
                                            <!-- <i class="far fa-user"></i> -->
                                            <i class="fa-solid fa-wallet"></i>
                                            <div class="dash_C">
                                                <h3>Available balance</h3>
                                                <h1>$56,562</h1>
                                                <span>In transection: $00.00</span>
                                                <span>Number of conplaints: 00</span>
                                            </div>
                                        </div>
                                        <div class="dash_box">
                                            <!-- <i class="far fa-user"></i> -->
                                            <i class="fa-solid fa-chart-line"></i>
                                            <div class="dash_C">
                                                <h3>Total Profit </h3>
                                                <h1>$1,02,890</h1>
                                                <span>Profit for this month: $00.00</span>
                                                <span>Last month's profit: $00.00</span>
                                            </div>
                                        </div>
                                        <div class="dash_box">
                                            <!-- <i class="far fa-user"></i> -->
                                            <i class="fa-solid fa-boxes-stacked"></i>
                                            <div class="dash_C">
                                                <h3>Total Order</h3>
                                                <h1>56,562</h1>
                                                <span>Order's for current month: 0</span>
                                                <span>Order's of last month: 0</span>
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
<script>
import { defineComponent } from '@vue/composition-api'

export default defineComponent({
    setup() {

    },
})
</script>
