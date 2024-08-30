<template>
    <div>
        <!-- header -->
        <div class="header">
            <div class="d-flex justify-content-between align-items-center nav-bar">
                <div class="brand">
                    <router-link to="/">travelaja</router-link>
                </div>
                <div class="menus">
                    <div class="menu-box"><router-link to="/">Home</router-link></div>
                    <div class="menu-box"><router-link to="/discover">Discover</router-link></div>
                    <div class="menu-box"><router-link to="/service">Service</router-link></div>
                    <div class="menu-box"><router-link to="/news">News</router-link></div>
                    <div class="menu-box"><router-link to="/about-us">About Us</router-link></div>
                    <div class="menu-box-current"><router-link to="/contact"><strong>Contact</strong></router-link></div>
                </div>
                <div class="me-4 language"> 
                    <div class="dropdown">
                        <button class="btn dropdown-toggle language-select text-white" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                            <strong>ID</strong>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <li><button class="dropdown-item" type="button">Action</button></li>
                            <li><button class="dropdown-item" type="button">Another action</button></li>
                            <li><button class="dropdown-item" type="button">Something else here</button></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column justify-content-center hero-content mt-5 pt-5">
                <div class="container">
                    <div class="row hero-title">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 d-flex flex-column justify-content-center text-white">
                        <div class="hero-title">
                            <div class="d-flex justify-content-center text-center hero-main-title">
                                Explore the world with a smile
                            </div>
                            <div class="text-center hero-sub-title">
                                <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam,
                                purus sit amet luctus venenatis, lectus magna fringilla urna, porttitor
                                rhoncus dolor purus non enim praesent elementum facilisis leo,
                                </p>
                            </div>
                        </div>
                        <form class="hero-search" @submit.prevent="findTrip">
                            <div class="row d-flex justify-content-between">
                                <div class="col-md-4">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="City or Destination"
                                        v-model="destination"
                                        aria-label="City or Destination"
                                    />
                                </div>
                                <div class="col-md-3">
                                    <input
                                        id="startDate"
                                        class="form-control"
                                        type="date"
                                        v-model="startDate"
                                    />
                                </div>
                                <div class="col-md-2">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Person"
                                        v-model="personCount"
                                        aria-label="Person"
                                    />
                                </div>
                                <div class="col-md-3">
                                    <button
                                        type="submit"
                                        class="mb-5 btn text-white d-flex align-items-center find-button"
                                    >
                                    Find Trip Now<i class="bx bx-search ps-2 search-icon"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- travelers-point -->
        <div class="travelers-point">
            <div class="container">
            <div class="row py-5">
                <div class="col-xxl-6 position-relative desc-img">
                    <div class="position-absolute img-1"></div>
                    <div class="position-absolute img-2"></div>
                    <div class="position-absolute img-3"></div>
                </div>
                <div class="col-xxl-6">
                <div class="class-name"><strong>Travelers Point</strong></div>
                <div class="py-3 title-name"><strong>We help to find your dream place</strong></div>
                <div class="desc">
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit
                    amet luctus venenatis, lectus magna fringilla urna, porttitor rhoncus dolor
                    purus non enim praesent elementum facilisis leo, vel fringilla est ullamcorper
                    eget nulla facilisi
                    </p>
                </div>
                <div class="row pt-3 pb-5">
                    <div class="col-md-6">
                    <div class="proof-number"><strong>100+</strong></div>
                    <div class="proof-name">Holiday Package</div>
                    </div>
                    <div class="col-md-6">
                    <div class="proof-number"><strong>172</strong></div>
                    <div class="proof-name">Hotels</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="proof-number"><strong>68</strong></div>
                    <div class="proof-name">Elite Transportation</div>
                    </div>
                    <div class="col-md-6">
                    <div class="proof-number"><strong>32M+</strong></div>
                    <div class="proof-name">we help to find your dream place</div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    
        <!-- top-destination -->
        <div class="mt-5 top-destination">
            <div class="container">
                <div class="row">
                    <div class="class-name d-flex justify-content-center"><strong>Top Destination</strong></div>
                    <div class="py-3 d-flex justify-content-center title-name"><strong>Discover your love</strong></div>
                </div>
                <div class="row">
                    <div class="col-md-4" v-for="destination in destinations" :key="destination.id">
                        <div class="row">
                            <div class="mt-3 mb-4 card">
                                <img :src="destination.image" class="card-img-top mt-2" alt="..." />
                                <div class="card-body">
                                    <div class="card-title"><a href=""><strong>{{ destination.name }}</strong></a></div>
                                    <div class="row mt-4">
                                        <div class="col-md-6 text-start card-price"><strong>{{ destination.price }}</strong></div>
                                        <div class="col-md-6 d-flex flex-row-reverse align-items-center neccessary-time">
                                        <div class="time-spend">{{ destination.days }} days for trips</div>
                                            <i class="bx bxs-navigation pe-2 navi-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- testimonial -->
        <div class="mt-5 testimonial">
            <div class="container">
            <div class="row">
                <div class="class-name d-flex justify-content-center"><strong>Testimonial</strong></div>
                <div class="py-3 d-flex justify-content-center title-name"><strong>What they say about us</strong></div>
            </div>
            <div class="row feedback">
                <!-- Add your testimonial components here -->
            </div>
            </div>
        </div>

        <FooterComponent />
        </div>
</template>
    
<script>
    import { ref } from 'vue';
    import FooterComponent from '@/components/FooterComponent.vue';
    
    export default {
        components: {
            FooterComponent
        },
        setup() {
        const destination = ref('');
        const startDate = ref('');
        const personCount = ref('');
        const destinations = ref([
            { id: 1, name: 'Taman Nasional Komodo', price: 'Rp. 7,5jt', days: 7, image: require('../assets/home/taman-nasional-komodo.png') },
            { id: 2, name: 'Taman Nasional Bunaken', price: 'Rp. 7,5jt', days: 7, image: require('../assets/home/taman-nasional-bunaken.png') },
            { id: 3, name: 'Raja Ampat, Papua Barat', price: 'Rp. 7,5jt', days: 7, image: require('../assets/home/raja-ampat-papua-barat.png') },
            { id: 4, name: 'Kepulauan Wakatobi', price: 'Rp. 7,5jt', days: 7, image: require('../assets/home/kepulauan-wakatobi.png') },
            { id: 5, name: 'Taman Nasional Bromo', price: 'Rp. 7,5jt', days: 7, image: require('../assets/home/taman-nasional-bromo.png') },
            { id: 6, name: 'Gili Trawangan Lombok', price: 'Rp. 7,5jt', days: 7, image: require('../assets/home/gili-trawangan-lombok.png') }
        ]);
    
        const findTrip = () => {
            console.log('Finding trip with:', {
            destination: destination.value,
            startDate: startDate.value,
            personCount: personCount.value
            });
        };
    
        return {
            destination,
            startDate,
            personCount,
            destinations,
            findTrip
        };
        }
    };
</script>
    
<style scoped>
    .header {
        position: relative;
        background: url("../assets/home/home-banner.png") no-repeat;
        background-position: center 60%;
        height: 720px;
        background-size: cover;
    }
    .header::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.2); 
        z-index: 2; 
    }
    .nav-bar {
        position: relative;
        z-index: 3;
        .brand a {
            text-decoration: none;
            color: white;
        }
        .brand {
            font-size: 33.18px;
            margin-left: 50px;
        }
        .menus {
            display: flex;
            align-items: center;
            text-align: center;
            text-decoration: none;
            .menu-box {
                padding: 10px;
            }
            .menu-box-current a{
                padding: 10px;
                color: white;
            }
        }
        .menus a {
            text-decoration: none;
            color: white;
            font-size: 16px;
        }
        .language {
            display: flex;
            text-align: center;
            color: white;
        }
    }
    .hero-content {
        z-index: 3;
        position: relative;
        .hero-main-title {
            font-size: 47.78px;
        }
        .find-button {
            background-color: #43B97F;
        }
    }
</style>
    