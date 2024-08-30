<template>
    <header>
        <!-- Navbar -->
        <nav class="d-flex justify-content-between align-items-center nav-bar">
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
                    <button class="btn dropdown-toggle language-select" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                        <strong>ID</strong>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <li><button class="dropdown-item" type="button">Action</button></li>
                        <li><button class="dropdown-item" type="button">Another action</button></li>
                        <li><button class="dropdown-item" type="button">Something else here</button></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</template>
  
<script>
    export default {
        name: 'HeaderComponent',
        props: {
        bannerImage: {
            type: String,
            default: ''
        },
        bannerTitle: {
            type: String,
            default: 'Default Title'
        }
        }
    };
</script>
  
<style scoped>
* {
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
}

body {
    font-family: Poppins;
}

.nav-bar {
    .brand a {
        text-decoration: none;
        color: #295943;
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
            color: #43b97f;
        }
    }
    .menus a {
        text-decoration: none;
        color: black;
        font-size: 16px;
    }
    .language {
        display: flex;
        text-align: center;
    }
}

.banner {
    background-position: center 60%;
    height: 250px;
    background-size: cover;
}
.banner::before {
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.2);
    z-index: 2;
}
.banner-title {
    font-size: 33.18px;
    color: #ffffff;
    top: 160px;
    left: 50px;
    z-index: 3;
}

.form-label:after {
    content:" *";
    color: red;
}

.footer {
    background-color: #295943;
    color: white;
}
ul {
    list-style-type: none;
    padding: 0;
}
li {
    padding: .25rem 0px .25rem 0px;
}
.desc {
    font-size: 16px;
}
.desc a {
    text-decoration: none;
    color: #FFFFFF;
}
</style>
  