<template>
    <div>
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <!-- <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li> -->
               
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <LazyNuxtLink class="nav-link" data-widget="navbar-search" to="/" role="button">
                        <i class='fas fa-home'></i>
                    </LazyNuxtLink>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button" @click="logoutModal">
                        <i class='fas fa-sign-out-alt' style='font-size:20px;color:red'></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
    </div>


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



</template>

<script setup>
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

// Method to close sidebar
const logoutModal = () => {
    $(".logout").fadeIn();
};
const logoutModalClose = () => {
    $(".logout").fadeOut();
};


const logout = async () => {
    const router = useRouter(); // Get the router object
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