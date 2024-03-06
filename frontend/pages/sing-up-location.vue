<template>
    <title>Signin</title>
    <div>
        <Navbar />
        <!-- navbar end here  -->
        <section class="sign_up_ mt-5">
            <div class="container mt-md-5">
                <div class="row px-md-5 px-sm-3 mx-md-5 ">
                    <div class="col-md-6 px-0">
                        <div class="left_side">
                            <h1>Let’s create your free Business account</h1>
                            <form action="">
                                <div class="input_group mt-5">
                                    <p>Country/region</p>
                                    <select name="" class="form-control" id="">
                                        <option value="Pakistan">Pakistan</option>
                                    </select>
                                </div>
                                <a href="#" @click="gotoPages" class="btn_sign">Sign up</a>
                                <p>Already an Dropshipping Business customer? <LazyNuxtLink to="/sign-in">Sign in
                                    </LazyNuxtLink>
                                </p>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 px-0">
                        <div class="right_part">
                            <h1>One Step Dropshipping Solution</h1>
                            <ul>
                                <li>
                                    <div>
                                        <!-- <span class="material-symbols-outlined"> heap_snapshot_large </span> -->
                                        <i class="fa-solid fa-users-gear"></i>
                                    </div>
                                    <div>
                                        <h6>Setting Up Your Dropshipping Business</h6>
                                        <p>From commerce to education, save on over 60 million products when you buy two
                                            or
                                            more.</p>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <!-- <i class="fa-solid fa-people-group"></i> -->
                                        <i class="fa-solid fa-boxes-stacked"></i>
                                    </div>
                                    <div>
                                        <h6> Managing Product Listings and Marketing</h6>
                                        <p>Create groups, share payment methods, and manage supplies across locations.
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <!-- <span class="material-symbols-outlined">local_shipping</span> -->
                                        <i class="fa-regular fa-file-lines"></i>
                                    </div>
                                    <div>
                                        <h6>Order Fulfillment and Scaling</h6>
                                        <p>Just one Business Prime membership covers unlimited free shipping on eligible
                                            orders for your
                                            entire
                                            organization.</p>
                                    </div>
                                </li>
                            </ul>
                            <img src="/assets/images/416LUsi8c6L.svg" class="img-fluid" loading="lazy" alt="">
                            <div class="lfooter">
                                <a href="#">Learn more about Dropshipping Business</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <Footer />
    </div>
</template>


<script setup>

const router = useRouter()

async function gotoPages() {
    router.push('/sign-up')

}
</script>
