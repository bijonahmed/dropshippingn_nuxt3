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
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Bank List</h1>
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
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="m-0">Bank Card</h6>
                                        <button class="btn-primary addWB p-2">
                                            <i class="fa-solid fa-plus"></i> Add address
                                        </button>
                                    </div>
                                    <!-- no data  -->
                                    <div class="no_data">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                        <p>No Data Found</p>
                                    </div>
                                    <ul class="card_list">
                                        <li>
                                            <div class="carde">
                                                <div class="card-inner">
                                                    <div class="front">
                                                        <img src="https://i.ibb.co/PYss3yv/map.png" class="map-img">
                                                        <div class="rows">
                                                            <img src="https://i.ibb.co/G9pDnYJ/chip.png" width="30px"
                                                                style="width: 50px;">
                                                            <img src="https://i.ibb.co/WHZ3nRJ/visa.png" width="30px"
                                                                style="width: 50px;">
                                                        </div>
                                                        <div class="rows card-no">
                                                            <p>464646464654564</p>
                                                        </div>
                                                        <div class="rows card-holder">
                                                            <p>xyz</p>
                                                            <!-- <p>VALID TILL</p> -->
                                                        </div>
                                                        <!-- <div class="rows name">
                                                    <p>JOE ALISON</p>
                                                    <p>10 / 25</p>
                                                </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>

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
</script>

