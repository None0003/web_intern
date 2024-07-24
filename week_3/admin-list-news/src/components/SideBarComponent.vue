<template>
    <div class="text-white admin-panel">
        <div class="row title-box">
            <div class="my-4 d-flex justify-content-center align-items-center title-logo">
                <a href=""><strong>Admin</strong></a>
            </div>
        </div>
        <div class="row ms-5 panel-box">
            <ul>
                <li @click="goToTours" class="py-3 d-flex align-items-center choice"><i class='bx bxs-book-content pe-2'></i><a href="">Tours</a></li>
                <li @click="goToNews" class="py-3 d-flex align-items-center choice-current"><i class='bx bxs-book-content pe-2'></i><a href="">News</a></li>
                <li @click="goToBookings" class="py-3 d-flex align-items-center choice"><i class='bx bxs-book-content pe-2'></i><a href="">Bookings</a></li>
            </ul>
        </div>
    </div>
</template>

<script>
import { useRouter } from 'vue-router';
import { defineComponent } from 'vue';

export default defineComponent({
    name: "SideBarComponent",
    setup() {
        const router = useRouter();

        const goToTours = () => {
            router.push('admin-list-tours');
        };

        const goToNews = () => {
            router.push('../admin-list-news');
        };

        const goToBookings = () => {
            router.push('admin-list-bookings');
        };

        return {
            goToTours,
            goToNews,
            goToBookings
        };
    }
});
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
