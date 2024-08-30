<template>
    <div>
        <HeaderComponent />

        <div class="banner position-relative">
            <div class="container">
                <h1 class="mb-0 position-absolute text-capitalize banner-title"><strong>our news</strong></h1>
            </div>
        </div>

        <FooterComponent />
    </div>
</template>

<script>
import HeaderComponent from '@/components/HeaderComponent.vue';
import FooterComponent from '@/components/FooterComponent.vue';

export default {
    name: 'NewsPage',
    components: {
        HeaderComponent,
        FooterComponent
    }
};
</script>

<style scoped>
/* Banner background */
.banner {
    position: relative; 
    background: url("../assets/news-banner.png") no-repeat;
    background-position: center 60%;
    height: 250px;
    background-size: cover;
}

.banner::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.2); 
    z-index: 2; 
}

.banner-title {
    font-size: 33.18px;
    color: #ffffff;
    position: relative; 
    top: 160px;
    left: 50px;
    z-index: 3;
}


/* Main name styling */
.main-name {
    font-size: 27.65px;
}

/* Input form styling */
.input-form {
    font-size: 16px;
}

/* Feedback form button styling */
.feedback .btn {
    border-radius: 8px;
    color: #ffffff;
    background-color: #43b97f;
}

/* Text alignment */
.sub {
    text-align: right;
}

/* Phone number styling */
.phone-number {
    font-size: 68.8px;
}
</style>
