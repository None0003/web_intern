<template>
    <div>
        <HeaderComponent />

        <div class="banner position-relative">
            <div class="container">
                <h1 class="mb-0 position-absolute text-capitalize banner-title"><strong>service</strong></h1>
            </div>
        </div>

        <div class="container my-5 text-start">
            <div class="row card-services">
                <div class="col-md-3">
                    <iconify-icon icon="icomoon-free:price-tags"></iconify-icon>
                    <h5 class="my-3"><strong>Get Best Price</strong></h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed arcu eu, dui tortor, proin eu lectus pellentesque. A cras suscipit amet </p>
                </div>
                <div class="col-md-3">
                    <iconify-icon icon="majesticons:map-simple-destination"></iconify-icon>
                    <h5 class="my-3"><strong>All Destination</strong></h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed arcu eu, dui tortor, proin eu lectus pellentesque. A cras suscipit amet </p>
                </div>
                <div class="col-md-3">
                    <iconify-icon icon="arcticons:city-transit"></iconify-icon>
                    <h5 class="my-3"><strong>City Tours</strong></h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed arcu eu, dui tortor, proin eu lectus pellentesque. A cras suscipit amet </p>
                </div>
                <div class="col-md-3">
                    <iconify-icon icon="majesticons:image-photography-line"></iconify-icon>
                    <h5 class="my-3"><strong>Photography</strong></h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed arcu eu, dui tortor, proin eu lectus pellentesque. A cras suscipit amet </p>
                </div>
            </div>
        </div>

        <FooterComponent />
    </div>
</template>

<script>
import HeaderComponent from '@/components/HeaderComponent.vue';
import FooterComponent from '@/components/FooterComponent.vue';

export default {
    name: 'ServicePage',
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
    background: url("../assets/service-banner.png") no-repeat;
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

.card-services iconify-icon {
    font-size: 44px;
    color: #3D3E48;
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
