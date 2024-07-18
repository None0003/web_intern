<template>
    <div class="text-white admin-panel">
        <div class="row title-box">
            <div class="my-4 d-flex justify-content-center align-items-center title-logo">
                <a href=""><strong>Admin</strong></a>
            </div>
        </div>
        <div class="row ms-5 panel-box">
            <ul>
                <li class="py-3 d-flex align-items-center choice"><i class='bx bxs-book-content pe-2'></i><a href="">Tours</a></li>
                <li class="py-3 d-flex align-items-center choice-current"><i class='bx bxs-book-content pe-2'></i><a href="">News</a></li>
                <li class="py-3 d-flex align-items-center choice"><i class='bx bxs-book-content pe-2'></i><a href="">Bookings</a></li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SideBarComponent",
    }
</script>

<style scoped>
    .title-logo a {
        font-size: 45px;
        text-decoration: none;
        color: white;
    }

    .panel-box {
        .choice {
            color: #A4A6B3;
            a {
                color: #A4A6B3;
            }
        }
        a {
            font-size: 16px;
            text-decoration: none;
            color: white;
        }
        ul {
            list-style-type: none;
        }
    }
</style>