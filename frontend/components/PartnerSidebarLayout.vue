<template>
    <div>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <!-- Brand Logo -->
            <LazyNuxtLink to="/partner/dashboard" class="brand-link">
                <img src="/assets/images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Dropshipping</span>

            </LazyNuxtLink>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/assets/images/blankUser.jpg" class="img-circle elevation-2" alt="User">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ userStore.email }}</a>


                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <LazyNuxtLink to="/partner/dashboard" class="nav-link" @click="toggleSidebar">
                                <i class="fa-solid fa-gauge"></i> &nbsp;
                                <p>Dashboard</p>
                            </LazyNuxtLink>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link">
                                <i class=" nav-icon fa-solid fa-users"></i>
                                <p>
                                    Community
                                    <i class="right fa-solid fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <LazyNuxtLink to="/partner/community/announcement" class="nav-link "
                                        @click="toggleSidebar">
                                        <i class="nav-icon fa-solid fa-bullhorn"></i>
                                        <p>Annumcement</p>
                                    </LazyNuxtLink>
                                </li>
                                <li class="nav-item">
                                    <LazyNuxtLink to="/partner/community/event" class="nav-link" @click="toggleSidebar">
                                        <i class="nav-icon fa-solid fa-calendar-days "></i>
                                        <p>Event</p>
                                    </LazyNuxtLink>
                                </li>
                                <li class="nav-item">
                                    <LazyNuxtLink to="/partner/community/faq" class="nav-link" @click="toggleSidebar">
                                        <i class="nav-icon fa-solid fa-person-circle-question"></i>
                                        <p>FAQ</p>
                                    </LazyNuxtLink>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item ">
                            <LazyNuxtLink to="/partner/operation-center" class="nav-link" @click="toggleSidebar">
                                <i class=" nav-icon fa-solid fa-chart-column"></i>
                                <p>OperationCenter</p>
                            </LazyNuxtLink>
                        </li>
                        <li class="nav-item ">
                            <LazyNuxtLink to="/partner/fund" class="nav-link " @click="toggleSidebar">
                                <i class=" nav-icon fa-solid fa-chart-line"></i>
                                <p>Dropshipping Fund</p>
                            </LazyNuxtLink>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link">
                                <i class=" nav-icon fa-solid fa-box"></i>
                                <p>
                                    Order Center
                                    <i class="right fa-solid fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <LazyNuxtLink to="/partner/ordercenter/orderList" class="nav-link "
                                        @click="toggleSidebar">
                                        <i class="nav-icon fa-regular fa-file-lines"></i>
                                        <p>OrderList</p>
                                    </LazyNuxtLink>
                                </li>
                                <li class="nav-item">
                                    <LazyNuxtLink target="_blank" to="/store" class="nav-link" @click="toggleSidebar">
                                        <i class="nav-icon fa-solid fa-boxes-stacked"></i>
                                        <p>Product Center</p>
                                    </LazyNuxtLink>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link">
                                <i class=" nav-icon fa-solid fa-store"></i>
                                <p>
                                    Global Stores
                                    <i class="right fa-solid fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">

                                    <LazyNuxtLink to="/partner/globalstores/activeService" class="nav-link "
                                        @click="toggleSidebar">
                                        <i class="nav-icon fa-solid fa-users-gear"></i>
                                        <p>Active Service</p>
                                    </LazyNuxtLink>
                                </li>
                                <li class="nav-item">
                                    <LazyNuxtLink to="/partner/globalstores/myStore" class="nav-link "
                                        @click="toggleSidebar">
                                        <i class="nav-icon fa-solid fa-store"></i>
                                        <p>My store</p>
                                    </LazyNuxtLink>
                                </li>
                                <li class="nav-item">
                                    <LazyNuxtLink to="/partner/globalstores/myWallet" class="nav-link "
                                        @click="toggleSidebar">
                                        <i class="nav-icon fa-solid fa-wallet"></i>
                                        <p>My Wallet</p>
                                    </LazyNuxtLink>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link">
                                <i class=" nav-icon fa-solid fa-database"></i>
                                <p>Data Management
                                    <i class="right fa-solid fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <LazyNuxtLink to="/partner/datamanagement/personalData" class="nav-link "
                                        @click="toggleSidebar">
                                        <i class="nav-icon fa-regular fa-id-card"></i>
                                        <p>Personal Data </p>
                                    </LazyNuxtLink>
                                </li>
                                <li class="nav-item">

                                    <LazyNuxtLink to="/partner/datamanagement/accountSecurity" class="nav-link "
                                        @click="toggleSidebar">
                                        <i class="nav-icon fa-solid fa-shield-halved"></i>
                                        <p>Account Security</p>
                                    </LazyNuxtLink>
                                </li>
                                <li class="nav-item">

                                    <LazyNuxtLink to="/partner/datamanagement/myMassage" class="nav-link "
                                        @click="toggleSidebar">
                                        <i class="nav-icon fa-regular fa-message"></i>
                                        <p>My massage</p>
                                    </LazyNuxtLink>
                                </li>
                                <li class="nav-item">
                                    <LazyNuxtLink to="/partner/datamanagement/bankList" class="nav-link "
                                        @click="toggleSidebar">
                                        <i class="nav-icon fa-solid fa-building-columns"></i>
                                        <p>Bank List</p>
                                    </LazyNuxtLink>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item ">
                            <LazyNuxtLink to="/partner/contact" class="nav-link " @click="toggleSidebar">
                                <i class=" nav-icon fa-solid fa-envelope"></i>
                                <p>Contact</p>
                            </LazyNuxtLink>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" @click="logoutModal">
                                <i class=" nav-icon fa-solid fa-sign-out-alt"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- logout modal  -->
        <div class="logout modal_">
            <div class="mdal_content">
                <div class="m_head">
                    <h6>Logout</h6>
                    <div class="w-50"></div>
                    <button class="bt_close" @click="logoutModalClose">
                        <i class="fa-solid fa-x"></i>
                    </button>
                </div>
                <div class="_body">
                    <div class="form_group">

                        <button class="btn btn-primary mr-2 btn-block" @click="logout">Yes</button>
                        <button class="btn btn-secondary btn-block" @click="logoutModalClose">No</button>

                    </div>
                </div>
            </div>
        </div>






    </div>
</template>

<script setup>
// Import ref and define reactive variable for sidebar state
import { ref } from 'vue';
import { useUserStore } from '~~/stores/user'
import { storeToRefs } from 'pinia';
import { useCartStore } from '~~/stores/cart';
const userStore = useUserStore();
const {
    isLoggedIn
} = storeToRefs(userStore)
const cartStore = useCartStore()
computed(async () => {
    try {
        await userStore.getUser()
    } catch (error) { }
})
const isSidebarOpen = ref(false);

// Method to close sidebar
const logoutModal = () => {
    $(".logout").fadeIn();
};
const logoutModalClose = () => {
    $(".logout").fadeOut();
};


// Method to toggle sidebar state
const toggleSidebar = () => {
    isSidebarOpen.value = !isSidebarOpen.value;

    // Trigger the click event of the nav-link with the data-widget attribute set to pushmenu
    if (window.innerWidth < 768) {
        const sidebarToggle = document.querySelector('.nav-link[data-widget="pushmenu"]');
        if (sidebarToggle) {
            sidebarToggle.click();
        }
    }

};
// Method to close sidebar
const closeSidebar = () => {
    isSidebarOpen.value = false;
};
const logout = async () => {
    const router = useRouter(); // Get the router object
    //let res = confirm('Are you sure you want to sign out?');
    try {
        await userStore.logout();
        localStorage.removeItem('token');
        router.push('/'); // Redirect to the root route
        return;

    } catch (error) {
        console.error(error);
    }
};
</script>

<style scoped>
.sidebar {
    /* width: 270px; */
    /* background: var(--primaryColor); */
    /* padding: 20px; */
    height: 85vh;
    overflow: auto;
    /* position: fixed; */
    /* left: 0; */
    /* top: 0; */
    scrollbar-width: 0;
    /* transition: .4s all ease-in-out; */
    /* z-index: 99999; */
}
</style>