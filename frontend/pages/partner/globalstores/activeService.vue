<template>
    <title>Active Service</title>
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
                                <h1 class="m-0">Active Service</h1>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">

                        <div class="s_content">
                            <div class="storeList">
                                <div class="store_">
                                    <strong>Status: <span class="text-success">Active</span></strong>
                                    <img src="/assets/images/Mediamodifier-Design.svg" class="img-fluid" loading="lazy"
                                        alt="">
                                    <h6>New agency store </h6>
                                    <div class="store_details">
                                        <p>Original Price: $30.00 </p>
                                        <p>Discount Price: $30 </p>
                                        <p>30 days or operation</p>
                                        <p>Effection time: <span class="text-success">2024-22-03</span></p>
                                    </div>
                                    <input type="checkbox">
                                </div>
                                <div class="store_">
                                    <strong>Status: <span class="text-success">Active</span></strong>
                                    <img src="/assets/images/Mediamodifier-Design.svg" class="img-fluid" loading="lazy"
                                        alt="">
                                    <h6>Basic agency store </h6>
                                    <div class="store_details">
                                        <p>Original Price: $30.00 </p>
                                        <p>Discount Price: $30 </p>
                                        <p>30 days or operation</p>
                                        <p>Effection time: <span class="text-success">2024-22-03</span></p>
                                    </div>
                                    <input type="checkbox">
                                </div>
                                <div class="store_">
                                    <strong>Status: <span class="text-secondary">Inctive</span></strong>
                                    <img src="/assets/images/Mediamodifier-Design.svg" class="img-fluid" loading="lazy"
                                        alt="">
                                    <h6>Standered agency store </h6>
                                    <div class="store_details">
                                        <p>Original Price: $30.00 </p>
                                        <p>Discount Price: $30 </p>
                                        <p>30 days or operation</p>
                                        <p>Effection time: <span class="text-success">2024-22-03</span></p>
                                    </div>
                                    <input type="checkbox" class="">
                                </div>
                                <div class="store_">
                                    <strong>Status: <span class="text-secondary">Inctive</span></strong>
                                    <img src="/assets/images/Mediamodifier-Design.svg" class="img-fluid" loading="lazy"
                                        alt="">
                                    <h6>Exclusive agency store </h6>
                                    <div class="store_details">
                                        <p>Original Price: $30.00 </p>
                                        <p>Discount Price: $30 </p>
                                        <p>30 days or operation</p>
                                        <p>Effection time: <span class="text-success">2024-22-03</span></p>
                                    </div>
                                    <input type="checkbox">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p>Duration</p>
                                    <select name="" id="" class="form-control ms-2">
                                        <option value="">1 month</option>
                                        <option value="">2 month</option>
                                        <option value="">3 month</option>
                                        <option value="">4 month</option>
                                        <option value="">5 month</option>
                                        <option value="">6 month</option>
                                        <option value="">7 month</option>
                                        <option value="">8 month</option>
                                        <option value="">9 month</option>
                                        <option value="">10 month</option>
                                        <option value="">12 month</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-primary confirm_">Confirm payment $30</button>
                                </div>
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

