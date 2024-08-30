<template>
    <div>
        <HeaderComponent />

        <div class="banner position-relative">
            <div class="container">
                <h1 class="mb-0 position-absolute text-capitalize banner-title"><strong>service</strong></h1>
            </div>
        </div>

        <!-- Content -->
        <div class="container">
            <div class="row pt-5 pb-2 content">
                <div class="col-md-6">
                    <div class="main-name text-start"><strong>Get in touch</strong></div>
                    <div class="my-3 main-desc text-start">
                        Get in touch
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus 
                        venenatis, lectus magna fringilla urna, porttitor rhoncus dolor purus non enim praesent 
                        elementum facilisis leo, vel fringilla est ullamcorper eget nulla facilisi etiam dignissim 
                        diam quis enim lobortis scelerisque fermentum dui faucibus in ornare quam viverra
                    </div>
                    <form class="feedback text-start">
                        <div class="input-form">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="mb-3 form-control" id="name" placeholder="Input your name">
                        </div>
                        <div class="input-form">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="mb-3 form-control" id="email" placeholder="Email">
                        </div>
                        <div class="input-form">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="mb-3 form-control" id="message" rows="3"></textarea>
                        </div>
                        <button type="submit" class="mb-5 btn">Send</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="map">
                        <div class="ratio ratio-21x9">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.3503598307657!2d110.42114577398945!3d-7.752613992266289!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a597e8601ab39%3A0x29f7e13adf6499d1!2sJl.%20Cindelaras%2C%20Krodan%2C%20Maguwoharjo%2C%20Kec.%20Depok%2C%20Kabupaten%20Sleman%2C%20Daerah%20Istimewa%20Yogyakarta%2C%20Indonesia!5e0!3m2!1svi!2s!4v1719825695179!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="information">
                        <div class="row py-3">
                            <div class="d-flex col-md-6">
                                <div class="col-md-4 text-start">Address:</div>
                                <div class="col-md-8 sub">JL.Cinderlara No.205A</div>
                            </div>
                            <div class="d-flex col-md-6">
                                <div class="col-md-4 text-start">Phone:</div>
                                <div class="col-md-8 sub">+62 1234 432 567</div>
                            </div>
                        </div>
                        <div class="row py-3">
                            <div class="d-flex col-md-6">
                                <div class="col-md-4 text-start">City:</div>
                                <div class="col-md-8 sub">Yogyakarta, Indonesia</div>
                            </div>
                            <div class="d-flex col-md-6">
                                <div class="col-md-4 text-start">Email:</div>
                                <div class="col-md-8 sub">info@travelaja.com</div>
                            </div>
                        </div>
                        <div class="row py-3">
                            <div class="d-flex col-md-6">
                                <div class="col-md-4 text-start">Open:</div>
                                <div class="col-md-8 sub">At 8AM</div>
                            </div>
                            <div class="d-flex col-md-6">
                                <div class="col-md-4 text-start">Close:</div>
                                <div class="col-md-8 sub">At 8PM</div>
                            </div>
                        </div>
                        <div class="row text-start">
                            <p>AVAILABLE AT 9AM - 10PM</p>
                        </div>
                        <div class="row text-start">
                            <div class="phone-number">+124 4537 9756</div>
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
    background: url("../assets/contact-banner.png") no-repeat;
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
