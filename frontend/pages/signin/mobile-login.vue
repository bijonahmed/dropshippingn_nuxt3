<template>
    <title>Mobile Login</title>
    <div>
        <div class="container-fluid bg_login">
            <div class="row px-md-5 px-sm-3 mx-md-5 align-items-center " style="min-height: 100vh;">
                <div class="col-md-6 m-auto">
                    <div class="left_side">
                        <h1 class="mb-2 fw-bold">Login</h1>
                        <p>Continue with your dropshipping account</p>
                        <form action="">
                            <div class="input_group">
                                <p>Phone</p>
                                <input type="text" class="form-control w-100" id="mobile_code">
                            </div>
                            <div class="input_group">
                                <p>Password</p>
                                <div class="eye_icon">
                                    <input id="newpass" type="password" name="password" class="form-control">
                                    <i toggle="#newpass" class="fa-regular fa-eye toggle_password"></i>
                                </div>
                                <p class="text-danger">Wrong Password</p>
                            </div>
                            <div class="input_group">
                                <div class='CaptchaWrap'>
                                    <div id="CaptchaImageCode" class="CaptchaTxtField">
                                        <canvas id="CapCode" class="capcode" width="300" height="80"></canvas>
                                    </div>
                                    <input type="button" class="ReloadBtn" onclick='CreateCaptcha();'>
                                </div>
                                <!-- <input type="button" class="btnSubmit"  value="Submit"> -->
                                <input type="text" id="UserCaptchaCode" class="CaptchaTxtField form-control mt-2"
                                    placeholder='Enter Captcha - Case Sensitive'>
                                <span id="WrongCaptchaError" class="error"></span>
                            </div>

                            <button class="btn btn-secondary w-100 my-2" onclick="CheckCaptcha();" type="button">Continue
                                with your account</button>



                            <div class="header__center">Or</div>
                            <p class="text-center">Create a dropshipping account? <LazyNuxtLink to="/sing-up-location">Sign up</LazyNuxtLink></p>

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
    </div>
</template>