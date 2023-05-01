<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>

        <!-- mobile responsive meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
        <meta name="description" content="This is meta description">
        <meta name="author" content="Themefisher">

        <!-- theme meta -->
        <meta name="theme-name" content="logbook-bulma" />

        <!-- plugins -->
        <link rel="preload" href="https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFWJ0bbck.woff2" style="font-display: optional;">
        <link rel="stylesheet" href="{{ asset('assets/plugins/bulma/bulma.min.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:600%7cOpen&#43;Sans&amp;display=swap" media="screen">

        <link rel="stylesheet" href="{{ asset('assets/plugins/themify-icons/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/plugins/slick/slick.css') }}">

        <!-- Main Stylesheet -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

        <!--Favicon-->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
     </head>
    <body>

        @section('sidebar')
            <!-- navigation -->
            <header class="is-sticky-top bg-white border-bottom border-default">
                <div class="container">

                <nav class="navigation navbar is-white">
                    <a class="navbar-brand is-inline-flex ml-0 is-align-items-center" href="{{ route('home') }}">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="logo">
                    </a>
                    <button role="button" class="navbar-burger burger" data-hidden="true" data-target="navigation">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </button>

                    <ul class="navbar-end navbar-menu" id="navigation">
                        <li class="navbar-item has-dropdown is-hoverable has-active">
                            <a class="navbar-link">Home</a>
                        </li>

                        <li class="navbar-item">
                            <a class="navbar-link is-arrowless" href="about.html">About</a>
                        </li>

                        <li class="navbar-item">
                            <a class="navbar-link is-arrowless" href="contact.html">Contact</a>
                        </li>

                        {{-- <li class="navbar-item has-dropdown is-hoverable has-active">
                            <a class="navbar-link">Pages <small class="ti-angle-down ml-1"></small></a>
                            <div class="navbar-dropdown">
                            <a class="navbar-item" href="author.html">Author</a>
                            <a class="navbar-item" href="post-details-1.html">Post Details 1</a>
                            <a class="navbar-item" href="post-details-2.html">Post Details 2</a>
                            <a class="navbar-item" href="post-elements.html">Post Elements</a>
                            <a class="navbar-item" href="privacy-policy.html">Privacy Policy</a>
                            <a class="navbar-item" href="terms-conditions.html">Terms Conditions</a>
                            </div>
                        </li> --}}

                        <li class="navbar-item">
                            <select class="m-2 is-borderless" id="select-language">
                            <option id="en" value="about/" selected>En</option>
                            <option id="fr" value="fr/about/">Fr</option>
                            </select>
                        </li>

                        <li class="navbar-item">
                            <button id="searchOpen" class="search-btn"><i class="ti-search"></i></button>
                        </li>

                        <!-- search -->
                        <div class="search">
                            <div class="search-wrapper">
                            <form action="javascript:void(0)" class="h-100">
                                <input class="search-box pl-4" id="search-query" name="s" type="search" placeholder="Type &amp; Hit Enter...">
                            </form>
                            <button id="searchClose" class="search-close"><i class="ti-close text-dark"></i></button>
                            </div>
                        </div>
                    </ul>
                </nav>
                </div>
            </header>
            <!-- /navigation -->
        @show

        <section class="section">
            <div class="container">
                @yield('content')
            </div>
        </section>

        <footer class="section-sm pb-0 border-top border-default">
            <div class="container">
               <div class="columns is-multiline is-justify-content-space-between">
                  <div class="column is-3-desktop">
                     <a class="mb-5 is-block" href="index.html">
                        <img class="" width="150px" src="images/logo.png" alt="LogBook">
                     </a>
                     <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                  </div>

                  <div class="column is-2-widescreen is-3-desktop is-6">
                     <h6 class="mb-4">Quick Links</h6>
                     <ul class="list-unstyled footer-list">
                        <li><a href="about.html">About</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="privacy-policy.html">Privacy Policy</a></li>
                        <li><a href="terms-conditions.html">Terms Conditions</a></li>
                     </ul>
                  </div>

                  <div class="column is-2-widescreen is-3-desktop is-6">
                     <h6 class="mb-4">Social Links</h6>
                     <ul class="list-unstyled footer-list">
                        <li><a href="#">facebook</a></li>
                        <li><a href="#">twitter</a></li>
                        <li><a href="#">linkedin</a></li>
                        <li><a href="#">github</a></li>
                     </ul>
                  </div>

                  <div class="column is-3-desktop">
                     <h6 class="mb-4">Subscribe Newsletter</h6>
                     <form class="subscription" action="javascript:void(0)" method="post">
                        <div class="is-relative">
                           <i class="ti-email email-icon"></i>
                           <input type="email" class="input" placeholder="Your Email Address">
                        </div>
                        <button class="btn btn-primary w-100 rounded mt-2" type="submit">Subscribe now</button>
                     </form>
                  </div>
               </div>
               <div class="scroll-top">
                  <a href="javascript:void(0);" id="scrollTop"><i class="ti-angle-up"></i></a>
               </div>
               <div class="has-text-centered">
                  <p class="content">&copy; 2020 - Design &amp; Develop By <a href="https://themefisher.com/" target="_blank">Themefisher</a></p>
               </div>
            </div>
         </footer>


         <!-- JS Plugins -->
         <script src="{{ asset('assets/plugins/jQuery/jquery.min.js') }}"></script>
         <script src="{{ asset('assets/plugins/slick/slick.min.js') }}"></script>

         <!-- Main Script -->
         <script src="{{ asset('assets/js/script.js') }}"></script>

    </body>
</html>
