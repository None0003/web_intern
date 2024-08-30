<template>
    <footer class="px-5 footer">
            <div class="bg"></div>
            <div class="row justify-content-between align-items-center pt-5 pb-2 title text-start">
                <div class="col-md-3">
                    <h1>travelaja</h1>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <div class="footer-title"><strong>Links</strong></div>
                </div>
                <div class="col-md-3">
                    <div class="footer-title"><strong>Services</strong></div>
                </div>
                <div class="col-md-3">
                    <div class="footer-title"><strong>Contact</strong></div>
                </div>
            </div>
            <div class="row text-start">
                <div class="col-md-3">
                    <div class="desc text-start">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam,
                        purus sit amet luctus venenatis, lectus magna fringilla urna, 
                        porttitor rhoncus dolor purus non enim praesent elementum facilisis leo, vel</div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <ul class="desc">
                        <li><router-link to="/discover">Discover</router-link></li>
                        <li><router-link to="/special-deals">Special Deals</router-link></li>
                        <li><router-link to="/services">Services</router-link></li>
                        <li><router-link to="/community">Community</router-link></li>
                        <li><router-link to="/about-us">About Us</router-link></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul class="desc">
                        <li><router-link to="/about-us">About Us</router-link></li>
                        <li><router-link to="/blog">Blog & Articles</router-link></li>
                        <li><router-link to="/terms">Terms and Condition</router-link></li>
                        <li><router-link to="/privacy">Privacy Policy</router-link></li>
                        <li><router-link to="/contact-us">Contact Us</router-link></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul class="desc">
                        <li>Address: Jl.Codelaras No.205A Kediri, Pare AG17</li>
                        <li>Phone: 123 456 7890</li>
                        <li>Email: myagungperdana@gmail.com</li>
                        <li>Maps: Kediri, East java</li>
                    </ul>
                </div>
            </div>
            <div class="pb-4 pt-4 row text-start">
                <div class="name"><strong>Ikuti Kami</strong></div>
                <div class="desc">
                    <a href="instagram"><i class='bx bxl-instagram'></i></a>
                    <a href=""><i class='bx bxl-facebook-circle'></i></a>
                    <a href=""><i class='bx bxl-twitter'></i></a>
                    <a href=""><i class='bx bx-basketball'></i></a>
                    <a href=""><i class='bx bxl-github'></i></a>
                </div>
            </div>
        </footer>
</template>
  
<script>
    export default {
        name: 'FooterComponent',
    };
</script>
  
<style scoped>
* {
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
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
  