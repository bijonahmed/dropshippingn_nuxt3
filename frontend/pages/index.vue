<template>
    <title>Welcome</title>
    <Navbar />
    <Child />
    <Footer />
</template>

<script setup>
import CommonHeader from '~~/layouts/CommonHeader.vue';
import Child from '~/pages/child.vue';;
// import {
//     useCartStore
// } from '~~/stores/cart';
// import {
//     useProductStore
// } from '~~/stores/product';
// import {
//     storeToRefs
// } from 'pinia';
// const cartStore = useCartStore()
// const productStore = useProductStore()
// const {
//     products
// } = storeToRefs(productStore)
// //console.log("products from index " + products);

// const addToCart = async (productID) => {
//     try {
//         await cartStore.addToCart(productID);
//     } catch (error) {}
// }

// onMounted(async () => {
//     try {
//         await productStore.getProduct()
//     } catch (error) {
//         console.log(error)
//     }
// })
</script>
