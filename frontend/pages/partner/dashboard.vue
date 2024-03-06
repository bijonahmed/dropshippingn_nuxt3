<template>

    <head>
        <title>Dashboard</title>
    </head>
    <div>
        <center>
            <div class="loading-indicator" v-if="loading" style="text-align: center;">
                <Loader />
            </div>
        </center>
        <AdminLTELayout />
    </div>

</template>


<script setup>
import AdminLTELayout from '~~/layouts/AdminLTELayout.vue';
import { useUserStore } from '~~/stores/user'
import { storeToRefs } from 'pinia';
const router = useRouter()
const userStore = useUserStore()

const { email } = storeToRefs(userStore)
const loading = ref(true)
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