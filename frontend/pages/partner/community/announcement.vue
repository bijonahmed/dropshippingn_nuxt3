<template>
    <title>Announcement</title>
    <div>
        <div class="wrapper">
            <!-- Navbar -->
            <PartnerNavbarLayout />
            <!-- navbar -->
            <!-- Main Sidebar Container -->
            <PartnerSidebarLayout />
            <!-- Content section start here  -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Announcement</h1>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- content part start here  -->
                                <div class="s_content">
                                    <div v-for="(post, index) in postdata" :key="index">
                                        <img :src="post.images" class="img-fluid" loading="lazy" alt="">
                                        <h6>{{ post.name }}:</h6>
                                        <p>{{ post.description_full }}</p>
                                    </div>

                                </div>
                                <!-- content part end here  -->
                            </div>
                        </div>
                    </div>
                </section>
                <!-- main content part end here  -->
            </div>
            <!-- content section end here  -->
            <PartnerFooterLayout />
        </div>
    </div>
</template>

<script setup>
import { ref, reactive, onMounted } from 'vue';
import axios from 'axios';
import swal from 'sweetalert2';
import { useRouter } from 'vue-router';
const router = useRouter();
definePageMeta({
    middleware: 'is-logged-out',
})

const postdata = ref([]);
const allPostCategory = async (postcatid) => {
    try {
        const response = await axios.get(`/post/postCategoryData`, {
            params: {
                id: postcatid // Assuming 'searchParam' is the parameter you want to send
            }
        });
        // console.log(response.data);
        postdata.value = response.data.data;

    } catch (error) {
        console.error(error);
    }
};


onMounted(async () => {
    allPostCategory(1);

});
</script>
