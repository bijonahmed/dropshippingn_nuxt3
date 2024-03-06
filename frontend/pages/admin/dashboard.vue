<template>
    <title>Admin Dashboard</title>
    <div>
        <h1>Admin Dashboard</h1>
        {{ email }}
    </div>
</template>

<script setup>

import { useUserStore } from '~~/stores/user'
import { storeToRefs } from 'pinia';
const router = useRouter()
const userStore = useUserStore()

const { email } = storeToRefs(userStore)
const loading =ref(true)
definePageMeta({
    middleware: 'is-logged-out',

})

onMounted(async () => {
    // After 5 seconds, hide the loading indicator
    setTimeout(() => {
        loading.value = false; // Hide the loading indicator after 5 seconds
    }, 500);


    try {
        await userStore.getUser()
    } catch (error) {
        //  console.log(error)
    }
})


</script>