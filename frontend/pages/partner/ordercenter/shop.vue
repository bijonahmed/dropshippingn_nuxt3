<template>
    <title>Shop</title>
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
                                <h1 class="m-0">Shop</h1>
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
                                    <div class="dash_C mb-3">
                                        <h3>Available ammount: $1,02,890.00</h3>
                                        <h3>Estimate profit: $1,02,890.00</h3>
                                        <h3>Pending orders: $10,020.00</h3>
                                    </div>
                                    <div class="row align-items-center btns_">
                                        <div class="col-xl-8 mb-2">
                                            <form action="">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <p>Essential information</p>
                                                        <input type="text" class="form-control"
                                                            placeholder="Search by order id">
                                                    </div>
                                                    <div class="mx-2">
                                                        <p>Month</p>
                                                        <select name="" class="form-control" id="">
                                                            <option value="">This Month</option>
                                                            <option value="">Last Month</option>
                                                            <option value="">Whole</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <p>Order status</p>
                                                        <select name="" class="form-control" id="">
                                                            <option value="">To be confiremed</option>
                                                            <option value="">To be paid</option>
                                                            <option value="">To be shipped</option>
                                                            <option value="">Goods To be receive</option>
                                                            <option value="">Complete</option>
                                                            <option value="">Canceled</option>
                                                            <option value="">Platform procced</option>
                                                            <option value="">Returning</option>
                                                            <option value="">Return complete</option>
                                                            <option value="">Abnormal order</option>
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
                                                    <th>Essential information</th>
                                                    <th>Month</th>
                                                    <th>Order status</th>
                                                    <th>Cost price($)</th>
                                                    <th>profit($)</th>
                                                    <th>Purchas quantity</th>
                                                    <th>Operation</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h6 class="d-flex align-items-center"><i
                                                                class="fa-solid fa-ribbon ms-1"></i>5466464646</h6>
                                                        <div class="t_product">
                                                            <img src="/assets/images/product/product(1).jpg"
                                                                class="img-fluid" loading="lazy" alt="">
                                                            <div>
                                                                <h6>iPhone 15 pro max 256GB space gray</h6>
                                                                <p><del>$300</del></p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>202402</td>
                                                    <td>To be paid</td>
                                                    <td>134.10</td>
                                                    <td>20.11</td>
                                                    <td>1</td>
                                                    <td class="">
                                                        <div class="btn-group">
                                                            <a href="details.html"
                                                                class="btn btn-secondary  w-100 d-flex align-items-center"
                                                                style="font-size: 12px;"><i
                                                                    class="fa-regular fa-eye me-1"
                                                                    style="font-size: 12px;"></i>Details</a>
                                                            <a class="btn payment_ btn-primary w-100 d-flex align-items-center "
                                                                style="font-size: 12px;"><i
                                                                    class="fa-brands fa-paypal me-1"></i>Payment</a>
                                                            <a href="transfer.html"
                                                                class="btn btn-secondary w-100 d-flex align-items-center"
                                                                style="font-size: 12px;"><i
                                                                    class="fa-solid fa-arrow-turn-down"></i>Transfer</a>
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
                <!-- main content part end here  -->
            </div>
            <!-- content section end here  -->
            <PartnerFooterLayout />
        </div>
    </div>
</template>

<script setup>
definePageMeta({
    middleware: 'is-logged-out',
})
</script>
