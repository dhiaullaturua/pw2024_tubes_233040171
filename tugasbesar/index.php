<?php
session_start();
require 'functions.php';

if( !isset($_SESSION["login"]) ) {
    header("location: login.php");
    exit;
}



?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MrBobKampungInggris</title>

    <!-- Feather Ions -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- My Style -->
    <link rel="stylesheet" href="assets/css/stylee.css">

    <!-- Aos Style -->
    <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> -->
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <a href="#" class="navbar-logo">
            <img src="assets/img/removebg.png" alt="">
        </a>


        <div class="navbar-nav">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#menu">Menu</a>
            <a href="#highlight">Highlight</a>
            <a href="#contact">Contact</a>
        </div>


        <div class="navbar-extra">
            <!-- <div class="search-box">
                <input type="text" class="search-txt" name="" placeholder="find..."> -->
            <!-- <div class="search-container">
                <div class="search-icon">
                    <a href="#" id="search"><i data-feather="search"></i></a>
                </div>
                <div id="searchBar" class="search-bar">
                    <input type="text" id="searchInput" placeholder="Find...">
                    <button id="searchButton">Search</button>
                </div>
            </div> -->
            <!-- </div> -->
            <a href="#" id="user"><i data-feather="user"></i></a>
            <!-- <a href="#" id="shopping-cart"><i data-feather="shopping-cart"></i></a> -->
            <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        </div>
    </nav>


    <!-- User Modal -->
    <div id="userModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>User Options</h2>
            <button class="btn" id="loginBtn">Login</button>
            <button class="btn" id="registerBtn">Register</button>
            <button class="btn" id="logoutBtn">Log Out</button>
        </div>
    </div>
    <script>
        // Get modal element
        var modal = document.getElementById("userModal");

        // Get open modal button
        var btn = document.getElementById("user");

        // Get close button
        var span = document.getElementsByClassName("close")[0];

        // Listen for open click
        btn.onclick = function() {
            modal.style.display = "flex";
        }

        // Listen for close click
        span.onclick = function() {
            modal.style.display = "none";
        }

        // Listen for outside click
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Additional logic for buttons can be added here
        document.getElementById("loginBtn").onclick = function() {
            window.location.href = "login.php"; // Redirect to login page
        }

        document.getElementById("registerBtn").onclick = function() {
            window.location.href = "registrasi.php"; // Redirect to register page
        }

        document.getElementById("logoutBtn").onclick = function() {
            window.location.href = "login.php"; // Redirect to login page
        }
    </script>

    <!-- Hero Section  -->
    <section class="hero" id="home">
        <div class="ltr">
            <img src="assets/img/bg.jpeg" alt="" height="800vh" width="240%">
        </div>
        <main class="content">
            <h1>Mr.<span>Bob</span></h1>
            <p>#Mr.BobSuperSeru</p>
            <a href="https://linktr.ee/mrbobkampunginggris?fbclid=PAAaa9ZITpXfuT77yuiw-VQiYIWC9f3wFHHCFKn0n5W3cV2B1IsU_fzTBfG0A" class="cta">Daftar Sekarang</a>
        </main>

    </section>


    <!-- About Section -->
    <section id="about" class="about">
        <h2><span>About</span> Us</h2>


        <div class="row">
            <div class="about-img">
                <img src="assets/img/mrboblogo.jpeg" alt="about us">
            </div>
            <div class="content">
                <h3>Kenapa Memilih Kami?</h3>
                <p>Spesialis Terapi Ngomong Inggris dan Pendongkrak 'PeDe.' </p>
                <p> Program di Mr.bob itu simple dan gampang banget dipahami, praktek ngomong inggris tiap hari, dan
                    kelasnya SuperSeru,Super Fun dan Super Relax
                    <b>#MrBobSuperSeru!.</b>
                </p>
            </div>
        </div>
    </section>


    <!-- Menu Section -->
    <section id="menu" class="menu">
        <h2><span>Our</span>Menu</h2>
        <p>Kami menyediakan program kelas untuk semua kalangan dari anak anak sampai dewasa dan camp serta buku yang
            asik untuk mudah dipahami.</p>


        <div class="row">
            <div class="menu-card">
                <img src="assets/img/2 MINGGU.jpeg" alt="2minggu" width="300px" height="300px">
                <h3 class="menu-card-tittle">-2 Minggu-</h3>
                <!-- <p class="menu-card-price">IDR 70K</p> -->
            </div>
            <div class="menu-card">
                <img src="assets/img/1 BULAN.jpg" alt="1Bulan" width="150%" height="300px">
                <h3 class="menu-card-tittle">-1 Bulan-</h3>
                <!-- <p class="menu-card-price">IDR 70K</p> -->
            </div>
            <div class="menu-card">
                <img src="assets/img/3 BULAN.jpg" alt="3Bulan" width="300px" height="300px">
                <h3 class="menu-card-tittle">-3 Bulan-</h3>
                <!-- <p class="menu-card-price">IDR 70K</p> -->
            </div>
            <div class="menu-card">
                <img src="assets/img/IELTS.webp" alt="IELTS" width="600px" height="300px">
                <h3 class="menu-card-tittle">-IELTS-</h3>
                <!-- <p class="menu-card-price">IDR 70K</p> -->
            </div>
            <div class="menu-card">
                <img src="assets/img/TOEFL.webp" alt="TOEFL" width="300px" height="300px">
                <h3 class="menu-card-tittle">-TOEFL-</h3>
                <!-- <p class="menu-card-price">IDR 70K</p> -->
            </div>
            <div class="menu-card">
                <img src="assets/img/CAMP AJA.jpeg" alt="campaja" width="300px" height="300px">
                <h3 class="menu-card-tittle">-Camp aja-</h3>
                <!-- <p class="menu-card-price">IDR 70K</p> -->
            </div>
            <div class="menu-card">
                <img src="assets/img/Non-Camp.jpeg" alt="Non-Camp" width="200px" height="300px">
                <h3 class="menu-card-tittle">-Non Camp-</h3>
                <!-- <p class="menu-card-price">IDR 70K</p> -->
            </div>
            <div class="menu-card">
                <img src="assets/img/buku.jpeg" alt="buku" width="300px" height="300px">
                <h3 class="menu-card-tittle">-Buku-</h3>
                <!-- <p class="menu-card-price">IDR 70K</p> -->
            </div>
        </div>
    </section>



    <!-- Highlight -->
    <section id="highlight">
        <div class="highlight">
            <h2><span>High</span>light</h2>
        </div>
        <div class="cards">
            <div class="card">
                <div class="wrapper">
                    <img src="assets/img/highlight1.jpeg" alt="" class="cover-image" />
                </div>
                <img src="assets/img/pngimg/hl1.png" alt="" class="character" />
            </div>
            <div class="card">
                <div class="wrapper">
                    <img src="assets/img/highlight2.jpeg" alt="" class="cover-image" />
                </div>
                <img src="assets/img/pngimg/hl2.png" alt="" class="character" />
            </div>
            <div class="card">
                <div class="wrapper">
                    <img src="assets/img/highlight3.jpeg" alt="" class="cover-image" />
                </div>
                <img src="assets/img/pngimg/hl3.png" alt="" class="character" />
            </div>
            <div class="card">
                <div class="wrapper">
                    <img src="assets/img/highlight4.jpeg" alt="" class="cover-image" />
                </div>
                <img src="assets/img/pngimg/hl4.png" alt="" class="character" />
            </div>
            <!-- <div class="card">
                <div class="wrapper">
                    <img src="images/Goju.jpg" alt="" class="cover-image" />
                </div>
                <img src="images/Jujutsu_Kaisen_logo (1).png" alt="" class="title title-2" />
                <img src="images/Satoru_Gojo_289.webp" alt="" class="character" />
            </div>
            <div class="card">
                <div class="wrapper">
                    <img src="images/Goju.jpg" alt="" class="cover-image" />
                </div>
                <img src="images/Jujutsu_Kaisen_logo (1).png" alt="" class="title title-2" />
                <img src="images/Satoru_Gojo_289.webp" alt="" class="character" />
            </div>
            <div class="card">
                <div class="wrapper">
                    <img src="images/Goju.jpg" alt="" class="cover-image" />
                </div>
                <img src="images/Jujutsu_Kaisen_logo (1).png" alt="" class="title title-2" />
                <img src="images/Satoru_Gojo_289.webp" alt="" class="character" />
            </div>
            <div class="card">
                <div class="wrapper">
                    <img src="images/Goju.jpg" alt="" class="cover-image" />
                </div>
                <img src="images/Jujutsu_Kaisen_logo (1).png" alt="" class="title title-2" />
                <img src="images/Satoru_Gojo_289.webp" alt="" class="character" />
            </div>
            <div class="card">
                <div class="wrapper">
                    <img src="images/Goju.jpg" alt="" class="cover-image" />
                </div>
                <img src="images/Jujutsu_Kaisen_logo (1).png" alt="" class="title title-2" />
                <img src="images/Satoru_Gojo_289.webp" alt="" class="character" />
            </div>
            <div class="card">
                <div class="wrapper">
                    <img src="images/Goju.jpg" alt="" class="cover-image" />
                </div>
                <img src="images/Jujutsu_Kaisen_logo (1).png" alt="" class="title title-2" />
                <img src="images/Satoru_Gojo_289.webp" alt="" class="character" />
            </div> -->
        </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="contact">
        <h2><span>Contact</span> Us</h2>
        <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, odio?</p> -->


        <div class="row1">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.356365029286!2d112.18027027420598!3d-7.751974676862326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e785c51db8d93c9%3A0x9e07f2c3f4e5b411!2sMr.BOB%20Pare%20Kediri%20Jawa%20Timur!5e0!3m2!1sru!2sid!4v1704456348946!5m2!1sru!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>



            <form action="">
                <div class="input-group">
                    <i data-feather="user"></i>
                    <input type="text" placeholder="user">
                </div>
                <div class="input-group">
                    <i data-feather="mail"></i>
                    <input type="text" placeholder="email">
                </div>
                <div class="input-group">
                    <i data-feather="phone"></i>
                    <input type="text" placeholder="No.Hp">
                </div>

                <button type="submit" class="btn">Kirim Pesan</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="socials">
            <a href="https://www.instagram.com/mrbobkampunginggris?igsh=MW9nOTU4Nnc0N2djYw=="><i data-feather="instagram"></i></a>
            <!-- <a href="#"><i data-feather="twitter"></i></a> -->
            <a href="https://www.facebook.com/profile.php?id=100084859385141&mibextid=ZbWKwL"><i data-feather="facebook"></i></a>
        </div>

        <div class="links">
            <a href="#home">Home</a>
            <a href="#about">About Us</a>
            <a href="#menu">Our Menu</a>
            <a href="#highlight">Highlight</a>
            <a href="#contact">Contact Us</a>
        </div>


        <div class="credit">
            <p>Created by <a href=""> Dhiaulhaq Laturua</a>. | &copy; 2023.</p>
        </div>


    </footer>

    <!-- Aos -->
    <script>
        AOS.init();
    </script>

    <!-- Feather Icons -->
    <script>
        feather.replace();
    </script>

    <!-- My JavaScript -->
    <script src="./js/script.js"></script>
    <!-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> -->
</body>

</html>