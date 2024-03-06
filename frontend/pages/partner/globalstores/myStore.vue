<template>
    <title>My Store</title>
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
                                <h1 class="m-0">My Store</h1>
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
                                    <img src="/assets/images/Mediamodifier-Design.svg" class="img-fluid" loading="lazy"
                                        alt="">
                                    <h6>New agency store </h6>
                                    <a href="activeService.html" class="btn btn-secondary disabled w-100"
                                        style="font-size: 12px;">Open store </a>
                                </div>
                                <div class="store_">
                                    <img src="/assets/images/Mediamodifier-Design.svg" class="img-fluid" loading="lazy"
                                        alt="">
                                    <h6>Basic agency store </h6>
                                    <a href="activeService.html" class="btn btn-secondary disabled w-100"
                                        style="font-size: 12px;">Open store </a>
                                </div>
                                <div class="store_">
                                    <img src="/assets/images/Mediamodifier-Design.svg" class="img-fluid" loading="lazy"
                                        alt="">
                                    <h6>Standered agency store </h6>
                                    <a href="activeService.html" class="btn btn-primary w-100"
                                        style="font-size: 12px;">Open
                                        store </a>
                                </div>
                                <div class="store_">
                                    <img src="/assets/images/Mediamodifier-Design.svg" class="img-fluid" loading="lazy"
                                        alt="">
                                    <h6>Exclusive agency store </h6>
                                    <a href="activeService.html" class="btn btn-primary w-100"
                                        style="font-size: 12px;">Open
                                        store </a>
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
