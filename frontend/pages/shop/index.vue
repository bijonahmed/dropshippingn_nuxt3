<template>
  <title>Shop</title>
  <div>
    <Navbar />

    <section class="main_section py-3">
      <div class="container">
        <!-- product section start here  -->
        <div class="row">
          <div class="col-md-12">
            <h5>Filter By Shop</h5>
            <div class="filterButtons">
              <button class="filterBtn">Official strore1</button>
              <button class="filterBtn">Official strore2 </button>
              <button class="filterBtn">Official strore3</button>
              <button class="filterBtn">Official strore4</button>
              <button class="filterBtn">Official strore5</button>
              <button class="filterBtn">Official strore6</button>
            </div>
            <h5>Filter By Brands</h5>
            <div class="filterButtons sub_cat">
              <button class="filterBtn">
                <img src="/assets/images/brand(1).jpg" class="img-fluid" alt="">
              </button>
              <button class="filterBtn">
                <img src="/assets/images/brand(2).jpg" class="img-fluid" alt="">
              </button>
              <button class="filterBtn">
                <img src="/assets/images/brand(3).jpg" class="img-fluid" alt="">
              </button>
              <button class="filterBtn">
                <img src="/assets/images/brand(4).jpg" class="img-fluid" alt="">
              </button>
              <button class="filterBtn">
                <img src="/assets/images/brand(5).jpg" class="img-fluid" alt="">
              </button>
              <button class="filterBtn">
                <img src="/assets/images/brand(1).jpg" class="img-fluid" alt="">
              </button>
            </div>
            <div class="pro_container">
              <div v-for="(pro, index) in brands" :key="index" class="pro_item">
                <LazyNuxtLink :to="{ path: '/shop-details/', query: { details: pro.slug } }">
                  <img :src="pro.thumnail" class="img-fluid" loading="lazy" alt="">
                  <h1>{{ pro.name }}</h1>
                  <p>${{ pro.selling_price }} <del>${{ pro.selling_price }}</del></p>
                  <span>Sales Volume: {{ pro.selling_price }}+</span>
                </LazyNuxtLink>
                <LazyNuxtLink :to="{ path: '/shop-details/', query: { details: pro.slug } }" class="view_btn">View</LazyNuxtLink>
              </div>


            </div>
          </div>
        </div>
        <!-- product section end here  -->
      </div>
    </section>
    <Footer />
  </div>
</template>



<script setup>
import axios from "axios";
const brands = ref([]);
const queryParams = new URLSearchParams(window.location.search);
const categorySlug = queryParams.get('category');
const subcategorySlug = queryParams.get('subcategory');
const brandlist = async () => {
  try {
    let categorySlug = queryParams.get('category');
    let subcategorySlug = queryParams.get('subcategory');

    let response = await axios.get("/unauthenticate/productWiseBrand", {
      params: {
        categorySlug: categorySlug,
        subcategorySlug: subcategorySlug
      }
    });

    // Assuming brands is a reactive object
    brands.value = response.data;
  } catch (error) {
    console.error("Error fetching brands:", error);
  }
}

onMounted(() => {
  // Check if code is running in a browser environment
  if (typeof window !== 'undefined') {
    brandlist(); // Call the brandlist function when the component is mounted
  }
});
</script>
