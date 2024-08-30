<template>
    <div>
        <HeaderComponent />

        <!-- banner -->
        <div class="banner position-relative">
            <div class="container">
                <h1 class="mb-0 position-absolute text-capitalize banner-title text-start">
                    <strong>Travel Booking Before Missing The Discount</strong>
                    <div class="upload-date">September 19, 2022</div>
                </h1>
            </div>
        </div>
        
        <!-- Content -->
        <div class="content text-start">
            <div class="container mb-5">
                <div class="row mt-5">
                    <div class="col-md-8">
                        <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venena, lectus magna fringilla urna, porttitor rhoncus dolor purus non enim praesent elementum facilisis leo, vel fringilla est ullamcorper eget nulla facilisi.</p>
                        <p class="mb-4">Enim lobortis scelerisque fermentum dui faucibus in ornare quam viverra orci sagittis eu volutpat odio facilisis mauris sit amet massa vitae tortor condimentum lacinia quis vel eros donec ac odio tempor orci dapibus ultrices in iaculis nunc sed augue lacus, viverra vitae congue eu, consequat ac felis donec et odio pellentesque diam volutpat commodo sed egestas egestas fringilla fau.</p>
                        <div class="img-big mb-4"></div>
                            <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet integer facilisis aliquet erat vitae viverra ornare. Placerat urna integer nibh justo. Dictum vulputate odio mauris amet, dictumst molestie. Faucibus consectetur mauris tristique dolor ut diam, adipiscing et. Semper mi proin malesuada orci phasellus. Consectetur posuere iaculis amet sem. Euismod turpis pellentesque sit risus eu, sagittis nulla. Facilisis urna, mi pharetra sed.</p>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet integer facilisis aliquet erat vitae viverra ornare. Placerat urna integer nibh justo. Dictum vulputate odio mauris amet, dictumst molestie.</p>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="img-small-1"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="img-small-2"></div>
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet integer facilisis aliquet erat vitae viverra ornare. Placerat urna integer nibh justo. Dictum vulputate odio mauris amet, dictumst molestie. Faucibus consectetur mauris tristique dolor ut diam, adipiscing et. Semper mi proin malesuada orci phasellus. Consectetur posuere iaculis amet sem. Euismod turpis pellentesque sit risus eu, sagittis nulla. Facilisis urna, mi pharetra sed.</p>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6 title-name">Other Destinations</div>
                            <div class="col-md-6 d-flex flex-row-reverse extent-btn"><a href="#">See all</a></div>
                        </div>
                        <div class="card text-white mt-3">
                            <div class="card-img-overlay position-absolute">
                                <div class="card-title mt-4"><strong>Wakatobi beach is a paradise for coral reets in indonesia</strong></div>
                                <p class="card-text">Yogyakarta, Indonesia</p>
                                <a href="#" class="btn text-white mt-4 view-more"><strong>View More</strong></a>
                            </div>
                        </div>
                        <div class="card text-white mt-3">
                            <div class="card-img-overlay position-absolute">
                                <div class="card-title mt-4"><strong>Wakatobi beach is a paradise for coral reets in indonesia</strong></div>
                                <p class="card-text">Yogyakarta, Indonesia</p>
                                <a href="#" class="btn text-white mt-4 view-more"><strong>View More</strong></a>
                            </div>
                        </div>
                        <div class="card text-white mt-3">
                            <div class="card-img-overlay position-absolute">
                                <div class="card-title mt-4"><strong>Wakatobi beach is a paradise for coral reets in indonesia</strong></div>
                                <p class="card-text">Yogyakarta, Indonesia</p>
                                <a href="#" class="btn text-white mt-4 view-more"><strong>View More</strong></a>
                            </div>
                        </div>
                        <div class="card text-white mt-3">
                            <div class="card-img-overlay position-absolute">
                                <div class="card-title mt-4"><strong>Wakatobi beach is a paradise for coral reets in indonesia</strong></div>
                                <p class="card-text">Yogyakarta, Indonesia</p>
                                <a href="#" class="btn text-white mt-4 view-more"><strong>View More</strong></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <FooterComponent />
    </div>
</template>

<script>
import HeaderComponent from '@/components/HeaderComponent.vue';
import FooterComponent from '@/components/FooterComponent.vue';

export default {
    name: 'ContactPage',
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
</style>
