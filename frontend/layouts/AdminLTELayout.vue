<!-- layouts/AdminLTELayout.vue -->

<template>
    <div>
        <div class="wrapper">
            <!-- Navbar -->
            <PartnerNavbarLayout />
            <!-- navbar -->
            <!-- Main Sidebar Container -->
            <PartnerSidebarLayout />
            <!-- Content section start here  -->
            <!-- Content section start here  -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Dashboard</h1>
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
                                <div class="target_box">
                                    <div class="target_text">
                                        <h3>Hello! Admin.</h3>
                                        <p>You have got 0 new orders.</p>
                                    </div>
                                </div>
                                <!-- first box end here  -->
                            </div>
                            <div class="col-md-12">
                                <!-- count box part start here  -->
                                <div class="homeDash">
                                    <div class="dash_box">
                                        <!-- <i class="far fa-user"></i> -->
                                        <div class="dash_C">
                                            <h3><a href="#" style="list-style: none; color: #182444;">Online Service </a>
                                            </h3>
                                            <!-- <h1>1,02,890</h1>
                                    <p class="up">+40%</p>
                                    <span>this month</span> -->
                                        </div>
                                    </div>
                                    <div class="dash_box">
                                        <!-- <i class="far fa-user"></i> -->
                                        <div class="dash_C">
                                            <h3><a href="#" style="list-style: none; color: #182444;">Company Profile </a>
                                            </h3>
                                            <!-- <h1>$56,562</h1>
                                    <p class="down">-40%</p>
                                    <span>this month</span> -->
                                        </div>
                                    </div>
                                    <div class="dash_box">
                                        <!-- <i class="far fa-user"></i> -->
                                        <div class="dash_C">
                                            <h3><a href="contact.html" style="list-style: none; color: #182444;">Contact
                                                    Us</a>
                                            </h3>
                                            <!-- <h1>1,02,890</h1>
                                    <p class="up">+40%</p>
                                    <span>this month</span> -->
                                        </div>
                                    </div>
                                    <div class="dash_box">
                                        <!-- <i class="far fa-user"></i> -->
                                        <div class="dash_C">
                                            <h3><a href="#" style="list-style: none; color: #182444;">License
                                                    information</a>
                                            </h3>
                                            <!-- <h1>$56,562</h1>
                                    <p class="down">-40%</p>
                                    <span>this month</span> -->
                                        </div>
                                    </div>
                                </div>
                                <!-- count box part end here  -->
                            </div>
                        </div>
                    </div>
                </section>
                <nuxt />
                <!-- main content part end here  -->
            </div>
            <!-- content section end here  -->
            <!-- content section end here  -->
            <PartnerFooterLayout />
        </div>

    </div>
</template>
  
 

<script>
import PartnerNavbarLayout from '@/components/PartnerNavbarLayout.vue'; // Import your Header component
import PartnerFooterLayout from '@/components/PartnerFooterLayout.vue'; // Import your Sidebar component
import PartnerSidebarLayout from '@/components/PartnerSidebarLayout.vue'; // Import your Footer component

export default {
  components: {
    PartnerNavbarLayout,
    PartnerFooterLayout,
    PartnerSidebarLayout
  }
}
</script>