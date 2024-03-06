<template>
    <title>Messages</title>
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
                                <h1 class="m-0">Messages</h1>
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
                                    <div class="row align-items-center btns_">
                                        <div class="col-xl-8 mb-2">
                                            <form action="">
                                                <div class="d-flex align-items-center">
                                                    <div class="mx-2">
                                                        <p>Month</p>
                                                        <select name="" class="form-control" id="">
                                                            <option value="">This Month</option>
                                                            <option value="">Last Month</option>
                                                            <option value="">Whole</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <p>Business Type</p>
                                                        <select name="" class="form-control" id="">
                                                            <option value="">Select One </option>
                                                            <option value="">System</option>
                                                            <option value="">System</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-xl-4 mb-2">
                                            <form action="">
                                                <div class="d-flex align-items-center">
                                                    <button type="button" class="btn btn-outline-secondary "><i
                                                            class="fa-solid me-2 fa-rotate-right"></i>Reset</button>
                                                    <button type="button" class="btn mx-1 btn-success "><i
                                                            class="fa-solid fa-magnifying-glass me-2"></i>Search</button>
                                                    <button type="button"
                                                        class="btn btn-outline-secondary ">Expend</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- order table part start here -->
                                    <div class="dtble" style="width: 100%; overflow: auto;">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Month</th>
                                                    <th>Business Type</th>
                                                    <th>Title</th>
                                                    <th>Details</th>
                                                    <th>Status </th>
                                                    <th>Time</th>
                                                    <th>Operation</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>202402</td>
                                                    <td>Shop</td>
                                                    <td>Shop</td>
                                                    <td>You have subscribe to renew this service </td>
                                                    <td>Unread</td>
                                                    <td>2024-02-07 12:00:00</td>
                                                    <td class="">
                                                        <div class="btn-group">
                                                            <a class="btn btn-secondary bt_details  w-100 d-flex align-items-center"
                                                                style="font-size: 12px;"><i
                                                                    class="fa-regular fa-eye me-1"
                                                                    style="font-size: 12px;"></i>Details</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>202402</td>
                                                    <td>Shop</td>
                                                    <td>Shop</td>
                                                    <td>You have subscribe to renew this service </td>
                                                    <td>Unread</td>
                                                    <td>2024-02-07 12:00:00</td>
                                                    <td class="">
                                                        <div class="btn-group">
                                                            <a class="btn btn-secondary bt_details  w-100 d-flex align-items-center"
                                                                style="font-size: 12px;"><i
                                                                    class="fa-regular fa-eye me-1"
                                                                    style="font-size: 12px;"></i>Details</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>202402</td>
                                                    <td>Order</td>
                                                    <td>Shop</td>
                                                    <td>You have subscribe to renew this service </td>
                                                    <td>Unread</td>
                                                    <td>2024-02-07 12:00:00</td>
                                                    <td class="">
                                                        <div class="btn-group">
                                                            <a class="btn btn-secondary bt_details  w-100 d-flex align-items-center"
                                                                style="font-size: 12px;"><i
                                                                    class="fa-regular fa-eye me-1"
                                                                    style="font-size: 12px;"></i>Details</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>202402</td>
                                                    <td>Order</td>
                                                    <td>Shop</td>
                                                    <td>You have subscribe to renew this service </td>
                                                    <td>Unread</td>
                                                    <td>2024-02-07 12:00:00</td>
                                                    <td class="">
                                                        <div class="btn-group">
                                                            <a class="btn btn-secondary bt_details  w-100 d-flex align-items-center"
                                                                style="font-size: 12px;"><i
                                                                    class="fa-regular fa-eye me-1"
                                                                    style="font-size: 12px;"></i>Details</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- order table part end here  -->
                                </div>
                                <!-- content part end here  -->
                            </div>
                        </div>
                    </div>
                </section>
                <!-- content section end here  -->
                <PartnerFooterLayout />
            </div>
        </div>
    </div>
</template>

<script setup>
definePageMeta({
    middleware: 'is-logged-out',
})
</script>
