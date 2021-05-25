<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">

        <!-- Styles -->
        <style>
          body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif;}
          body, html {
            height: 100%;
            color: #777;
            line-height: 1.8;
          }

          /* Create a Parallax Effect */
          .bgimg-1, .bgimg-2, .bgimg-3 {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
          }

          /* First image (Logo. Full height) */
          .bgimg-1 {
            min-height: 100%;
          }

          /* Second image (Portfolio) */
          .bgimg-2 {
            background-image: url("https://www.w3schools.com/w3images/parallax2.jpg");
            min-height: 400px;
          }

          /* Third image (Contact) */
          .bgimg-3 {
            background-image: url("https://www.w3schools.com/w3images/parallax3.jpg");
            min-height: 400px;
          }

          .w3-wide {letter-spacing: 10px;}
          .w3-hover-opacity {cursor: pointer;}

          /* Turn off parallax scrolling for tablets and phones */
          @media only screen and (max-device-width: 1600px) {
            .bgimg-1, .bgimg-2, .bgimg-3 {
              background-attachment: scroll;
              min-height: 400px;
            }
          }
            @yield('style')
        </style>
    </head>
    <body>
    <div class="container" id="app">
    <!-- Navbar (sit on top) -->
        <div class="w3-top">
        <div class="w3-bar" id="myNavbar">
            <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
            <i class="fa fa-bars"></i>
            </a>
            <a href="#home" class="w3-bar-item w3-button">HOME</a>
            <a href="#about" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-user"></i> ABOUT</a>
            <a href="#portfolio" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-th"></i> PORTFOLIO</a>
            <a href="#contact" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-envelope"></i> CONTACT</a>
            <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-red">
            <i class="fa fa-search"></i>
            </a>
        </div>

        <!-- Navbar on small screens -->
        <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
            <a href="#about" class="w3-bar-item w3-button" onclick="toggleFunction()">ABOUT</a>
            <a href="#portfolio" class="w3-bar-item w3-button" onclick="toggleFunction()">PORTFOLIO</a>
            <a href="#contact" class="w3-bar-item w3-button" onclick="toggleFunction()">CONTACT</a>
            <a href="#" class="w3-bar-item w3-button">SEARCH</a>
        </div>
        </div>

        <parallex-component></parallex-component> 
        @yield('content')
        </div>
       

        <!-- Footer -->
        <footer class="w3-center w3-black w3-padding-64 w3-opacity w3-hover-opacity-off">
          <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
          <div class="w3-xlarge w3-section">
            <i class="fa fa-facebook-official w3-hover-opacity"></i>
            <i class="fa fa-instagram w3-hover-opacity"></i>
            <i class="fa fa-snapchat w3-hover-opacity"></i>
            <i class="fa fa-pinterest-p w3-hover-opacity"></i>
            <i class="fa fa-twitter w3-hover-opacity"></i>
            <i class="fa fa-linkedin w3-hover-opacity"></i>
          </div>
          <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
        </footer>
                
        <script>
        // Modal Image Gallery
        function onClick(element) {
          document.getElementById("img01").src = element.src;
          document.getElementById("modal01").style.display = "block";
          var captionText = document.getElementById("caption");
          captionText.innerHTML = element.alt;
        }

        // Change style of navbar on scroll
        window.onscroll = function() {myFunction()};
        function myFunction() {
            var navbar = document.getElementById("myNavbar");
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                navbar.className = "w3-bar" + " w3-card" + " w3-animate-top" + " w3-white";
            } else {
                navbar.className = navbar.className.replace(" w3-card w3-animate-top w3-white", "");
            }
        }

        // Used to toggle the menu on small screens when clicking on the menu button
        function toggleFunction() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
        </script>

    </body>
</html>
<script src="{{asset('./js/app.js')}}"></script>

@yield('script')