<template>
    <div>

        <title>Signin</title>
        <div class="container-fluid bg_login">
            <div class="row px-md-5 px-sm-3 mx-md-5 align-items-center " style="height: 100vh;">
                <div class="col-md-6 m-auto">
                    <div class="left_side">
                        <h1 class="mb-2">One step before signin to your account</h1>
                        <p>Select your preferred method</p>
                        <form action="">
                            <div class="input_group">
                                <LazyNuxtLink to="/signin/email-login" class="btn_signMail"><i
                                        class="fa-regular fa-envelope"></i>Sign in with email</LazyNuxtLink>
                                <!-- <LazyNuxtLink to="/signin/mobile-login" class="btn_signMail"><i
                                        class="fa-solid fa-mobile-screen-button"></i>Sign in with phone</LazyNuxtLink> -->
                            </div>
                            <div class="header__center">Or</div>
                            <p class="text-center">Create a dropshipping account? <LazyNuxtLink to="/signupfirststep">Sign
                                    up</LazyNuxtLink>
                            </p>

                            <span>By proceeding, you agree to the <a href="#">Terms and Conditions</a> and <a
                                    href="#">Privacy
                                    Policy</a></span>
                            <br />
                            <span>
                                <center>
                                    <LazyNuxtLink to="/">Back to Home</LazyNuxtLink>
                                </center>
                            </span>

                        </form>
                    </div>
                </div>
            </div>
        </div>

</div></template>
 
