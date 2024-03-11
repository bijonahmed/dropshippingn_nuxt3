<template>
    <title>Faq</title>
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
                                <h1 class="m-0">FAQs</h1>
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
                                    <!-- faq section start here  -->
                                    <div class="section">
                                        <div class="row">
                                            <div class="col-10 m-auto">
                                                <div class="faq_content">
                                                    <div class="accordion" id="accordionExample">
                                                            <div class="accordion-item"
                                                                v-for="(post, index) in postdata" :key="index">
                                                                <h2 class="accordion-header"
                                                                    :id="'headingOne__' + post.id">
                                                                    <button class="accordion-button" type="button"
                                                                        :data-bs-toggle="'collapse'"
                                                                        :data-bs-target="'#collapseOne__' + post.id"
                                                                        :aria-expanded="index === 0 ? 'true' : 'false'"
                                                                        :aria-controls="'collapseOne__' + post.id">
                                                                       {{ post.question }}
                                                                    </button>
                                                                </h2>
                                                                <div :id="'collapseOne__' + post.id"
                                                                    class="accordion-collapse collapse"
                                                                    :class="{ 'show': index === 0 }"
                                                                    :aria-labelledby="'headingOne__' + post.id"
                                                                    :data-bs-parent="'#accordionExample'">
                                                                    <div class="accordion-body">
                                                                        {{ post.answer }}
                                                                    </div>
                                                                </div>
                                                            </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- faq section end here  -->
                                </div>
                                <!-- content part end here  -->
                            </div>
                        </div>
                    </div>
                </section>
                <!-- main content part end here  -->
            </div>
            <!-- main content part end here  -->
        </div>
        <!-- content section end here  -->
        <PartnerFooterLayout />
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
    allPostCategory(3);

});
</script>
