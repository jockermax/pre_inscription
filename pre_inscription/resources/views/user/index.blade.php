@extends('layouts.user.base')
@section('content')
    <div class="hero_area">
        <!-- header section strats -->
        <div class="hero_bg_box">
            <div class="img-box">
                <img src="{{asset('front/images/isi.png')}}" alt="">
            </div>
        </div>
        @if (session('status'))
            <div id="statusAlert" class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; top: 120px; right: 10px; z-index: 9999;">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <!-- end header section -->
        <!-- slider section -->
        <section class="slider_section">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9 col-lg-7">
                                    <div class="detail-box">
                                        <h1>
                                            NOUS FAISONS DES DEMANDE de Pré-inscription <br>
                                            PROCESSUS PLUS RAPIDE
                                        </h1>
                                        <div class="btn-box">
                                            <a href="" class="btn-1"> En savoir plus </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9 col-lg-7">
                                    <div class="detail-box">
                                        <h1>
                                            NOUS FAISONS DES DEMANDE de Pré-inscription <br>
                                            PROCESSUS PLUS RAPIDE
                                        </h1>

                                        <div class="btn-box">
                                            <a href="" class="btn-1"> En savoir plus </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9 col-lg-7">
                                    <div class="detail-box">
                                        <h1>
                                            NOUS FAISONS DES DEMANDE de Pré-inscription <br>
                                            PROCESSUS PLUS RAPIDE
                                        </h1>

                                        <div class="btn-box">
                                            <a href="" class="btn-1"> En savoir plus </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container idicator_container">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                </div>
            </div>
        </section>
        <!-- end slider section -->
    </div>


    <section class="service_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Our services
                </h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="box ">
                        <div class="img-box">
                            <img src="{{asset('front/images/s1.png')}}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                Business Visa
                            </h6>
                            <p>
                                Minima consequatur architecto eaque assumenda ipsam itaque quia eum in doloribus debitis
                                impedit ut
                                minus tenetur corrupti excepturi ullam.
                            </p>
                            <a href="">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box ">
                        <div class="img-box">
                            <img src="images/s2.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                Work Visa
                            </h6>
                            <p>
                                Minima consequatur architecto eaque assumenda ipsam itaque quia eum in doloribus debitis
                                impedit ut
                                minus tenetur corrupti excepturi ullam.
                            </p>
                            <a href="">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box ">
                        <div class="img-box">
                            <img src="images/s3.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                Tourist Visa
                            </h6>
                            <p>
                                Minima consequatur architecto eaque assumenda ipsam itaque quia eum in doloribus debitis
                                impedit ut
                                minus tenetur corrupti excepturi ullam.
                            </p>
                            <a href="">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box ">
                        <div class="img-box">
                            <img src="images/s4.png" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>
                                Student Visa
                            </h6>
                            <p>
                                Minima consequatur architecto eaque assumenda ipsam itaque quia eum in doloribus debitis
                                impedit ut
                                minus tenetur corrupti excepturi ullam.
                            </p>
                            <a href="">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end service section -->

    <!-- about section -->

    <section class="about_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 px-0">
                    <div class="img_container">
                        <div class="img-box">
                            <img src="images/about-img.jpg" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 px-0">
                    <div class="detail-box">
                        <div class="heading_container ">
                            <h2>
                                QUI SOMMES NOUS ?
                            </h2>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                            enim ad minim veniam, quis nostrud exercitation ullamco laboris
                            nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                            in reprehenderit in voluptate velit
                        </p>
                        <div class="btn-box">
                            <a href="">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end about section -->


    <!-- contact section -->
    <section class="contact_section layout_padding">
        <div class="contact_bg_box">
            <img src="images/contact-bg.jpg" alt="">
        </div>
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Contact Us
                </h2>
            </div>
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <div class="form_container">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" placeholder="First Name" />
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" placeholder="Last Name" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="email" class="form-control" placeholder="Email" />
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" placeholder="Phone Number" />
                                </div>
                            </div>
                            <div class="form-group ">
                                <input type="text" class="message-box" placeholder="Message" />
                            </div>
                            <div class="btn-box">
                                <button type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact section -->

    <!-- info section -->
    <section class="info_section ">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="info_logo">
                        <a class="navbar-brand" href="index.html">
                            <span>
                                Viseas
                            </span>
                        </a>
                        <p>
                            Dolor sit amet, consectetur magna aliqua. Ut enim ad minim veniam, quisdotempor incididunt r
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info_links">
                        <h5>
                            Useful Link
                        </h5>
                        <ul>
                            <li>
                                <a href="">
                                    Dolor sit amet, consectetur
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    Magna aliqua. Ut enim ad
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    Minim veniam
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    Quisdotempor incididunt r
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info_info">
                        <h5>
                            Contact Us
                        </h5>
                    </div>
                    <div class="info_contact">
                        <a href="" class="">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>
                                Lorem ipsum dolor sit amet,
                            </span>
                        </a>
                        <a href="" class="">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>
                                Call : +01 1234567890
                            </span>
                        </a>
                        <a href="" class="">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>
                                demo@gmail.com
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info_form ">
                        <h5>
                            Newsletter
                        </h5>
                        <form action="#">
                            <input type="email" placeholder="Enter your email">
                            <button>
                                Subscribe
                            </button>
                        </form>
                        <div class="social_box">
                            <a href="">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-youtube" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end info_section -->
@endsection

