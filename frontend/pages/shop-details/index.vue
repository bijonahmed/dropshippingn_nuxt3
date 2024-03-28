<template>
    <title>Shop Details</title>
    <div>
        <Navbar />
        <section class="main_section mt-5">
            <div class="container">
                <div class="row">


                    <div class="col-md-8">
                        <!-- product details part start here  -->
                        <div class="single_product_view">
                            <div class="row">
                                <div class="col-md-5">
                                    <!-- Main Carousel -->
                                    <!-- Main Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div v-for="(product, index) in addi_products" :key="index" :class="{ 'carousel-item': true, 'active': index === 0 }">
          <img :src="product.images" class="d-block w-100" alt="...">
        </div>
      </div>
      <div class="carousel-indicators">
        <button type="button" v-for="(product, index) in addi_products" :key="index" :data-bs-target="'#carouselExampleIndicators'" :data-bs-slide-to="index" :class="{ 'active': index === 0, 'thumbnail': true }" aria-current="index === 0" :aria-label="'Slide ' + (index + 1)">
          <img :src="product.images" class="d-block w-100" alt="...">
        </button>
      </div>
    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="product_details">
                                        <h1>{{ productsrow.product_name }}</h1>
                                        <!-- <h2><i class="fa-solid fa-eye"></i> 9419</h2> -->
                                        <p>{{ productsrow.description_short }}</p>
                                        <h6><i class="fa-solid fa-eye"></i> Browse:9419</h6>
                                        <ul>
                                            <li>
                                                <span>Selling Price:</span>
                                                <strong>${{ productsrow.selling_price }}</strong>
                                            </li>
                                            <li>
                                                <span>Agency price:</span>
                                                <strong>${{ productsrow.buying_price }}</strong>
                                            </li>
                                            <li>
                                                <span>Profit:</span>
                                                <strong>${{ productsrow.profit }}</strong>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="description_part">
                                        <p><br></p>
                                        <h1 class="nav-item nav-link active"><span>DESCRIPTION</span></h1>
                                        <span class="description_full" style="width: 100%;"></span>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details part end here  -->

                    </div>
                    <div class="col-md-4">
                        <div class="pd_sidebar">
                            <h4>Similar Product</h4>
                            <ul>
                                <li v-for="(product, index) in similarpro" :key="index">
                                    <div class="s_img">
                                        <img src="/assets/images/product/product(1).jpg" class="img-fluid"
                                            loading="lazy" alt="">
                                    </div>
                                    <div class="s_tdetails">
                                        <h3>{{ product.product_name }}</h3>
                                        <p>${{ product.selling_price }} <del>${{ product.selling_price }}</del></p>
                                        <span>Sales Volume: 99999+</span>
                                        <LazyNuxtLink :to="{ path: '/shop-details/', query: { details: product.slug } }"
                                            class="view_btn">View</LazyNuxtLink>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <Footer />
    </div>
</template>

<script setup>

import axios from "axios";
import { ref, onMounted } from 'vue';
import Swiper from 'swiper';

const productsrow = ref('');
const similarpro = ref([]);
const addi_products = ref([]);
const productDetails = async () => {

    try {
        const queryParams = new URLSearchParams(window.location.search);
        const prodcutSlug = queryParams.get('details');
        let response = await axios.get("/unauthenticate/getProductrow", {
            params: {
                slug: prodcutSlug,
            }
        });
        $(".description_full").html(response.data.description_full);

        productsrow.value = response.data;
        similarpro.value = response.data.similarproducts;
        addi_products.value = response.data.addi_products;

    } catch (error) {
        console.error("Error fetching brands:", error);
    }
}




onMounted(() => {
    productDetails();

});
</script>

<style>
/* Add your custom styles here */
.carousel-indicators button.thumbnail {
    width: 100px;
}

.carousel-indicators button.thumbnail:not(.active) {
    opacity: 0.7;
}

.carousel-indicators {
    position: static;
}

@media screen and (min-width: 992px) {
    .carousel {
        max-width: 70%;
        margin: 0 auto;
    }
}
</style>