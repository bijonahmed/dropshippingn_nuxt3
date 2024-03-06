<template>
  <div class="bg_login">
    <div class="container">
      <div class="row px-md-5 px-sm-3 mx-md-5 align-items-center " style="min-height: 100vh;">
        <div class="col-md-6 m-auto">
          <div class="left_side">
            <h1 class="mb-2 fw-bold">Create a dropshipping account</h1>
            <p>One last step before dropshipping account</p>
            <form action="">
              <div class="input_group">
                <p>Phone</p>
                <div class="_code">
                  <input type="text" class="form-control w-100" id="mobile_code">
                  <!-- <input type="tel" value="" class="form-control"> -->
                  <button class="send_code">Send Code</button>
                </div>
              </div>
              <div class="input_group">
                <p>OTP</p>
                <div class="d-flex">
                  <input type="text" class="form-control w-50">
                  <p class="ms-2" style="font-size: 12px;">Click 'Send Code,' check your phone (inbox/message) for the
                    OTP.
                  </p>
                </div>
                <p class="text-danger">Wrong OTP</p>
              </div>
              <div class="input_group">
                <p>New Password</p>
                <div class="eye_icon">
                  <input id="newpass" type="password" name="password" class="form-control">
                  <i toggle="#newpass" class="fa-regular fa-eye toggle_password"></i>
                </div>
              </div>
              <div class="input_group">
                <p>Retype Password</p>
                <div class="eye_icon">
                  <input id="repass" type="password" name="password" class="form-control">
                  <i toggle="#repass" class="fa-regular fa-eye toggle_password"></i>
                </div>
                <p class="text-danger">Password dosen't match</p>
              </div>
              <div class="input_group">
                <p>Invite Code</p>
                <div class="d-flex">
                  <input type="text" class="form-control w-50">
                  <p class="ms-2" style="font-size: 12px;">Enter the invitation code for registration or access.</p>
                </div>
                <p class="text-danger">Invite Code dosen't match</p>
              </div>
              <div class="input_group d-flex align-items-center">
                <input type="checkbox">
                <p class="ms-2 mb-0" style="font-size: 14px;">Read and agree <a href="#terms">Terms & Conditions</a></p>
              </div>
              <button class="btn btn-secondary w-100 my-2">Create a new account</button>



              <div class="header__center">Or</div>
              <p class="text-center">Already have a account? <LazyNuxtLink to="/sign-in">Signin</LazyNuxtLink></p>

              <span>By proceeding, you agree to the <a href="#">Terms and Conditions</a> and <a href="#">Privacy
                  Policy</a></span>

            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>