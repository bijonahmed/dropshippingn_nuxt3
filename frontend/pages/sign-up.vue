<template>
    <title>Signup</title>
    <div>
        <div class="container-fluid bg_login">
            <div class="row px-md-5 px-sm-3 mx-md-5 align-items-center " style="height: 100vh;">
                <div class="col-md-6 m-auto">
                    <div class="left_side">
                        <h1 class="mb-2">Create Your Dropshipping account</h1>
                        <p>One last step before starting your free trial.</p>
                        <form action="">
                            <div class="input_group">
                                <LazyNuxtLink to="/singup/email" class="btn_signMail"><i class="fa-regular fa-envelope"></i>Sign up
                                    with email</LazyNuxtLink>

                                <LazyNuxtLink to="/singup/phone" class="btn_signMail d-none"><i
                                        class="fa-solid fa-mobile-screen-button"></i>Sign up with
                                    phone</LazyNuxtLink>
                                
                            </div>
                            <div class="header__center">Or</div>

                            <p class="text-center">Already have a dropshipping account? <LazyNuxtLink to="/sign-in">Sign in</LazyNuxtLink>
                            </p>

                            <span>By proceeding, you agree to the <a href="#">Terms and Conditions</a> and <a
                                    href="#">Privacy
                                    Policy</a></span>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>