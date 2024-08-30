<template>
    <div>
        <HeaderComponent />

        <div class="banner position-relative">
            <div class="container">
                <h1 class="mb-0 position-absolute text-capitalize banner-title"><strong>about us</strong></h1>
            </div>
        </div>

        <div class="container">
            <div class="why-choose mt-5">
                <h2><strong>Why choose us ?</strong></h2>
                <p>These popular destinations have a lot to offer</p>
            </div>

            <div class="row my-5 desc-logo">
                <div class="col-md-4">
                    <iconify-icon icon="bi:shield-check" class="icon"></iconify-icon>
                    <div class="main-desc">
                        <h4>Best price guarantee</h4>
                    </div>
                    <div class="sub-desc">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit
                    </div>
                </div>
                <div class="col-md-4">
                    <iconify-icon icon="healthicons:i-schedule-school-date-time-outline" class="icon"></iconify-icon>
                    <div class="main-desc">
                        <h4>Easy Booking</h4>
                    </div>
                    <div class="sub-desc">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit
                    </div>
                </div>
                <div class="col-md-4">
                    <iconify-icon icon="ri:customer-service-2-line" class="icon"></iconify-icon>
                    <div class="main-desc">
                        <h4>Customer Service 24h</h4>
                    </div>
                    <div class="sub-desc">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit
                    </div>
                </div>
            </div>

            <div class="row py-5 about">
                <div class="col-md-8 text-start">
                    <div class="main-name mb-3"><strong>About Travelaja.com</strong></div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet dictum et in feugiat. Platea in diam, est congue. 
                        Posuere sapien morbi augue ultrices. Et facilisi orci sollicitudin placerat lacus lacus nibh. Egestas semper 
                        massa viverra massa proin in morbi placerat. Pharetra nec, est non integer nisi, ut faucibus. Non, in nam sollicitudin 
                        vitae volutpat ac molestie. Turpis pellentesque sit pellentesque id cras lobortis tortor, blandit.
                    </p>
                    <p>
                        Id ac non, semper turpis maecenas. Convallis tempor fringilla quisque arcu, dictum. Vitae cursus vel netus tincidunt 
                        vitae. Malesuada velit, at mattis adipiscing quisque tristique id magna. Blandit porta sit nam magna sit. Turpis vestibulum 
                        facilisis placerat habitant gravida eget. Lacus pretium, arcu non adipiscing sed faucibus semper eget tempor.
                    </p>
                </div>
                <div class="col-md-4 about-img"></div>
            </div>

            <div class="our-teams">
                <div class="row text-start my-5">
                    <h3><strong>Our Teams</strong></h3>
                    <p>Lorem ipsum dolor sit amet</p>
                </div>

                <div class="row text-start d-flex justify-content-center">
                    <div class="col-md-2">
                        <img src="../assets/about/team-mem-1.png" alt="">
                        <div class="name"><strong>Agung perdana</strong></div>
                        <div class="pos">Web Designer</div>
                    </div>
                    <div class="col-md-2">
                        <img src="../assets/about/team-mem-2.png" alt="">
                        <div class="name"><strong>Viola Resti</strong></div>
                        <div class="pos">Marketing Director</div>
                    </div>
                    <div class="col-md-2">
                        <img src="../assets/about/team-mem-3.png" alt="">
                        <div class="name"><strong>Rahardianysah</strong></div>
                        <div class="pos">International Relations</div>
                    </div>
                    <div class="col-md-2">
                        <img src="../assets/about/team-mem-4.png" alt="">
                        <div class="name"><strong>Andika</strong></div>
                        <div class="pos">Medical Check</div>
                    </div>
                    <div class="col-md-2">
                        <img src="../assets/about/team-mem-5.png" alt="">
                        <div class="name"><strong>Theresa Russell</strong></div>
                        <div class="pos">Doctor Assistant</div>
                    </div>

                </div>
            </div>

            <div class="row my-5 icon-tour">
                <div class="col-md-3">
                    <iconify-icon icon="emojione-monotone:ship" class="icon"></iconify-icon>
                    <p>TRAVEL</p>
                </div>
                <div class="col-md-3">
                    <iconify-icon icon="healthicons:city-outline" class="icon"></iconify-icon>
                    <p>CITY TOUR</p>
                </div>
                <div class="col-md-3">
                    <iconify-icon icon="mdi:island" class="icon"></iconify-icon>
                    <p>ISLAND TOUR</p>
                </div>
                <div class="col-md-3">
                    <iconify-icon icon="gis:map-route" class="icon"></iconify-icon>
                    <p>EXPLORE WORLD</p>
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
    name: 'AboutPage',
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
    background: url("../assets/about-us-banner.png") no-repeat;
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

.desc-logo {
    .icon {
        font-size: 128px;
        color: #43B97F;
    }
}

.row img {
    width: 100%; /* Set the width to fill the column */
    height: auto; /* Maintain aspect ratio */
    max-width: 200px; /* Set a maximum width */
    max-height: 247px; /* Set a maximum height */
    object-fit: cover; /* Ensure the image covers the space without distortion */
}


.about-img {
    background: url("../assets/about/about.png") no-repeat;
    background-position: center 60%;
    height: 580px;
}

.icon-tour {
    color: #A8A7AB;
    .icon {
        font-size: 128px;
    }
}

</style>
