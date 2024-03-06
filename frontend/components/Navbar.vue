<template>
    <div id="NavBar" class="z-2">

        <div class="container-fluid " style="width: 100%;">
            <div class="row">
                <div class="col-md-12 col-sm-12 px-0">

                    <nav class="navbar navbar-expand-lg bg-body-transparent">
                        <div class="container">
                            <LazyNuxtLink class="navbar-brand p-2 wow fadeIn" to="/"><img src="/assets/images/Logo.png"
                                    class="img-fluid" alt=""></LazyNuxtLink>
                            <div class="offcanvas-lg offcanvas-end bodyOffcanvas  justify-content-between" style=""
                                tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasResponsiveLabel"><img
                                            src="/assets/images/Logo.png" style="max-height: 40px;" alt=""></h5>
                                    <button type="button" class="btn-close btn-close" data-bs-dismiss="offcanvas"
                                        data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0  wow fadeIn">

                                        
                                        <li class="nav-item">
                                            <LazyNuxtLink class="nav-link " aria-current="page" to="/store"
                                                style="text-decoration: none;">Store </LazyNuxtLink>
                                        </li>
                                        <li class="nav-item">
                                            <LazyNuxtLink class="nav-link " aria-current="page" to="/about"
                                                style="text-decoration: none;">About </LazyNuxtLink>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " aria-current="page" href="#"
                                                style="text-decoration: none;">Live Chat</a>
                                        </li>
                                        <li class="nav-item">
                                            <LazyNuxtLink class="nav-link " aria-current="page" to="/contact"
                                                style="text-decoration: none;">Contact</LazyNuxtLink>
                                        </li>
                                    </ul>

                                    <ul class=" store_buttons  m-0 ms-auto  wow fadeIn"
                                        style="list-style: none; padding: 0;">
                                        <li class="nav-item">

                                            <a href="#" class="nav-link app_download"><span
                                                    class="material-symbols-outlined">
                                                    download
                                                </span>Apple </a>
                                        </li>
                                        <li class="nav-item">

                                            <a href="#" class="nav-link app_download"><span
                                                    class="material-symbols-outlined">download</span>Android
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                                <div class="offcanvas-footer second_ul_hide">
                                    <ul class=" store_buttons_m m-auto text-center wow fadeIn" v-if="!email">
                                        <hr>
                                        <li class="nav-item">
                                            <LazyNuxtLink class="nav-link btn-login" aria-current="page" to="/sign-in"
                                                style="text-decoration: none;">Log In</LazyNuxtLink>
                                        </li>
                                        <li class="nav-item">
                                            <LazyNuxtLink class="btn btn_trial" aria-current="page"
                                                to="/sing-up-location" style="text-decoration: none;">Sign up
                                            </LazyNuxtLink>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <ul class="navbar-nav  mb-2 mb-lg-0 second_ul_none ">
                                <!-- If user is logged in, show Dashboard and Logout -->
                                <li v-if="email" class="nav-item">
                                    <LazyNuxtLink class="nav-link" aria-current="page" to="/partner/dashboard"
                                        style="text-decoration: none;">
                                        Dashboard
                                    </LazyNuxtLink>
                                    <LazyNuxtLink class="nav-link" aria-current="page" to="#" @click="logout()"
                                        style="text-decoration: none;">
                                        Logout
                                    </LazyNuxtLink>
                                </li>

                                <!-- If user is not logged in, show Log In and Sign Up -->

                                <li v-else class="nav-item">
                                    <LazyNuxtLink class="nav-link btn-login" aria-current="page" to="/sign-in"
                                        style="text-decoration: none;">
                                        Log In
                                    </LazyNuxtLink>

                                    <LazyNuxtLink class="btn btn_trial" aria-current="page" to="/signupfirststep"
                                        style="text-decoration: none;">
                                        Sign Up
                                    </LazyNuxtLink>
                                </li>

                            </ul>

                            <div class="d-flex">
                                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive">
                                    <span class=""> <i class="fa-solid fa-bars"></i></span>
                                </button>
                            </div>
                        </div>
                    </nav>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { useUserStore } from '~~/stores/user';
import { storeToRefs } from 'pinia';

export default {
    setup() {
        const userStore = useUserStore();
        const { email } = storeToRefs(userStore);
        const logout = () => {
            // Perform logout action
            // For example, clearing user session or token
            alert("Logout");
        };
        return { email, logout };
    },
};
</script>

<style>
.navFixed {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
}
</style>