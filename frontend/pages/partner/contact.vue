<template>
    <title>Contact</title>
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
                                <h1 class="m-0">Contact</h1>
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
                                <!-- fist box start here  -->
                                <div class="target_box justify-content-start">
                                    <div class="target_text">
                                        <img src="/assets/images/email.png" loading=" lazy" alt="" class="img-fluid">
                                    </div>
                                    <div class="target_text">
                                        <h3>examplmail@mail.com</h3>
                                        <p>For inquiries, kindly reach out to us via email.</p>
                                    </div>
                                </div>
                                <!-- first box end here  -->
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
<script>
import { defineComponent } from '@vue/composition-api'

export default defineComponent({
    setup() {

    },
})
</script>
