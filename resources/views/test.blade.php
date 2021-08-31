@extends('layouts.peddyhub')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawrex Template | Blog</title>
    <!-- Stylesheets -->
    
    <link href="{{ asset('peddyhub/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('peddyhub/css/imagehover.css') }}" rel="stylesheet">
    <link href="{{ asset('peddyhub/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('peddyhub/css/responsive.css') }}" rel="stylesheet">
    <!--Color Switcher Mockup-->
    <link href="{{ asset('peddyhub/css/color-switcher-design.cs') }}" rel="stylesheet">
    <!--Color Themes-->
    <link href="{{ asset('peddyhub/css/color-themes/default-theme.css') }}" rel="stylesheet">
    <!--Favicon-->
    <link href="{{ asset('peddyhub/images/favicon.png') }}" type="image/x-icon">
    <link href="{{ asset('peddyhub/images/favicon.png') }}" type="image/x-icon">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>
    <div class="main-wrapper pet b_profile">
        <div class="pet blog_right">
            <section class="job">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="profile mt-4">
                                <div class="details">
                                    <div class="image">
                                        <img src="peddyhub/images/home_5/event-bg.jpg" alt="Image Of Event" title="Event"
                                            class="img-fluid">

                                    </div>
                                    <h4 class="mt-4 mb-2">Some toughly useful much walking before
                                    </h4>
                                    <p>
                                        Forwardly echidna outside tiger split thanks far vibrantly gosh
                                        hence pang. Oh while frog urgent a circa connected atro
                                        us some neutral inside elusive by more the jeez orca tarantula
                                        meadowlark barring that on clinically oh ouch far jeezpa
                                        much grizzly amidst in grabbed wallaby well expediently much giraffe
                                        constantly and forbade a one yet belligerent the
                                        robust cried goodness more sedulously vulgar yet however.
                                    </p>
                                    <p class="mb-4">
                                        Reproachful lugubrious dry gazelle far lobster deftly shoddy and far
                                        checkedr more wow much darn far grudgingly yet
                                        speechlessly gosh where less away and adequate before upon by until
                                        respectful found a like authentically much after
                                        clapped impolite goodness showy witlessly the rhinoceros he the
                                        beaver the hello far excluding opossum gibber closed
                                        jeepers scowled crud more.
                                    </p>
                                </div>
                                <div class="elements">
                                    <span class="tags">
                                        <span class="heading"> Post Tags: </span>
                                        <a href="#" title="Pets"> Pets </a> ,
                                        <a href="#" title="Grooming"> Grooming </a> ,
                                        <a href="#" title="Shelter"> Shelter </a> ,
                                        <a href="#" title="Breed"> Breed </a> ,
                                    </span>
                                    <span class="share">
                                        <span class="heading"> Share This Post: </span>
                                        <a href="#" title="facebook"><i class="fas fa-facebook"></i></a>
                                        <a href="#" title="twitter"><i class="fas fa-twitter"></i></a>
                                        <a href="#" title="instagram"><i class="fas fa-instagram"></i></a>
                                    </span>
                                    <div class="comments mt-2">
                                        <h5>
                                            Comments
                                        </h5>
                                        <div class="comment">
                                            <div class="image pr-4 pt-3">
                                                <img class="img-fluid" src="peddyhub/images/home_5/reviewer-1.png"
                                                    alt="Image of Author" title="Author">
                                            </div>
                                            <div class="context">
                                                <h5>Natasha</h5>
                                                <p class="mb-0">
                                                    <span>March 2, 2021</span> || <span><a href="#"
                                                            title="Reply">Reply</a> </span>
                                                </p>
                                                <p>
                                                    And one into considering ahead yet tepid far oriole
                                                    pointed wildebeest jeepers contrary circa hello
                                                    rolled
                                                    alas goldfinch less apt wherever suitably.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="comment pt-3">
                                            <div class="image pr-4 pt-3">
                                                <img class="img-fluid" src="peddyhub/images/home_5/reviewer-2.png"
                                                    alt="Image of Author" title="Author">
                                            </div>
                                            <div class="context">
                                                <h5>Cindy Cambell</h5>
                                                <p class="mb-0">
                                                    <span>March 2, 2021</span> || <span><a href="#"
                                                            title="Reply">Reply</a> </span>
                                                </p>
                                                <p>
                                                    And one into considering ahead yet tepid far oriole
                                                    pointed wildebeest jeepers contrary circa hello
                                                    rolled
                                                    alas goldfinch less apt wherever suitably.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form mt-4">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="name"
                                                            placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" name="email"
                                                            placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <textarea name="comment" id="" cols="30" rows="5"
                                                            class="form-control"
                                                            placeholder="Leave A Comment..."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn">Leave Comment</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="r_sidebar mt-4">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <input type="search" name="search" id="search" class="form-control"
                                            placeholder="Search">
                                        <button type="submit" class="form-control"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                </form>
                                <div class="categories">
                                    <h5>Categories</h5>
                                    <ul>
                                        <li class="py-1"><a href="#" title="Pets Lover"><i
                                                    class="orange fas fa-paw"></i>Pets
                                                Lover</a></li>
                                        <li class="py-1"><a href="#" title="Cats & Dog Foods"><i
                                                    class="orange fas fa-paw"></i>Cats
                                                & Dog Foods</a></li>
                                        <li class="py-1"><a href="#" title="Other Pets"><i
                                                    class="orange fas fa-paw"></i>Other
                                                Pets</a></li>
                                        <li class="py-1"><a href="#" title="Pets Health"><i
                                                    class="orange fas fa-paw"></i>Pets
                                                Health</a></li>
                                        <li class="py-1"><a href="#" title="Homemade & DIY"><i
                                                    class="orange fas fa-paw"></i>Homemade & DIY</a>
                                        </li>
                                        <li class="py-1"><a href="#" title="Pets Adoption"><i
                                                    class="orange fas fa-paw"></i>Pets
                                                Adoption</a></li>
                                        <li class="py-1"><a href="#" title="Vaccine Care"><i
                                                    class="orange fas fa-paw"></i>Vaccine
                                                Care</a></li>
                                    </ul>
                                </div>
                                <div class="adopt_gallery">
                                    <h5>For Adoption</h5>
                                    <ul>
                                        <li>
                                            <div class="image">
                                                <figure class="imghvr-slide-down">
                                                    <img src="peddyhub/images/home_5/pet-1.png" alt="Image of pet" title="Pet"
                                                        class="img-fluid">
                                                    <figcaption class="text-center">
                                                        <div class="icon">
                                                            <i class="fas fa-camera"></i>
                                                        </div>
                                                    </figcaption>
                                                    <a href="#"></a>
                                                </figure>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="image">
                                                <figure class="imghvr-slide-down">
                                                    <img src="peddyhub/images/home_5/pet-2.png" alt="Image of pet" title="Pet"
                                                        class="img-fluid">
                                                    <figcaption class="text-center">
                                                        <div class="icon">
                                                            <i class="fas fa-camera"></i>
                                                        </div>
                                                    </figcaption>
                                                    <a href="#"></a>
                                                </figure>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="image">
                                                <figure class="imghvr-slide-down">
                                                    <img src="peddyhub/images/home_5/pet-3.png" alt="Image of pet" title="Pet"
                                                        class="img-fluid">
                                                    <figcaption class="text-center">
                                                        <div class="icon">
                                                            <i class="fas fa-camera"></i>
                                                        </div>
                                                    </figcaption>
                                                    <a href="#"></a>
                                                </figure>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="image">
                                                <figure class="imghvr-slide-down">
                                                    <img src="peddyhub/images/home_5/pet-4.png" alt="Image of pet" title="Pet"
                                                        class="img-fluid">
                                                    <figcaption class="text-center">
                                                        <div class="icon">
                                                            <i class="fas fa-camera"></i>
                                                        </div>
                                                    </figcaption>
                                                    <a href="#"></a>
                                                </figure>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="image">
                                                <figure class="imghvr-slide-down">
                                                    <img src="peddyhub/images/home_5/pet-5.png" alt="Image of pet" title="Pet"
                                                        class="img-fluid">
                                                    <figcaption class="text-center">
                                                        <div class="icon">
                                                            <i class="fas fa-camera"></i>
                                                        </div>
                                                    </figcaption>
                                                    <a href="#"></a>
                                                </figure>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="image">
                                                <figure class="imghvr-slide-down">
                                                    <img src="peddyhub/images/home_5/pet-6.png" alt="Image of pet" title="Pet"
                                                        class="img-fluid">
                                                    <figcaption class="text-center">
                                                        <div class="icon">
                                                            <i class="fas fa-camera"></i>
                                                        </div>
                                                    </figcaption>
                                                    <a href="#"></a>
                                                </figure>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tags">
                                    <h5>Tags</h5>
                                    <p class="mt-3">
                                        <a href="#" title="Pet">Pet Lovers</a>
                                        <a href="#" title="Cat">Cat</a>
                                        <a href="#" title="Grooming">Grooming</a>
                                        <a href="#" title="Pet">Pet Care</a>
                                        <a href="#" title="Pet">Pet Lovers</a>
                                    </p>
                                </div>
                                <div class="recent">
                                    <h5>Recent Posts</h5>
                                    <div class="card">
                                        <div class="post">
                                            <a href="blog-profile.html" title="Image">
                                                <img src="peddyhub/images/home_5/event-3-post.png" alt="Image of Post" title="Post" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="context">
                                            <div class="content">
                                                <a href="blog-profile.html" title="Post">
                                                    <p>
                                                        Considering At Aesthetic <br> More Some Dreamed
                                                    </p>
                                                </a>
                                                <div class="purple date">Feb 28, 2021</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="post">
                                            <a href="blog-profile.html" title="Image">
                                                <img src="peddyhub/images/home_5/event-4-post.png" alt="Image of Post" title="Post" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="context">
                                            <div class="content">
                                                <a href="blog-profile.html" title="Post">
                                                    <p>
                                                        Considering At Aesthetic <br> More Some Dreamed
                                                    </p>
                                                </a>
                                                <div class="purple date">Feb 28, 2021</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="post">
                                            <a href="blog-profile.html" title="Image">
                                                <img src="peddyhub/images/home_5/event-5-post.png" alt="Image of Post" title="Post" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="context">
                                            <div class="content">
                                                <a href="blog-profile.html" title="Post">
                                                    <p>
                                                        Considering At Aesthetic <br> More Some Dreamed
                                                    </p>
                                                </a>
                                                <div class="purple date">Feb 28, 2021</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script src="{{ asset('pessyhub/js/jquery.js') }}"></script>
    <script src="{{ asset('pessyhub/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('pessyhub/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('pessyhub/js/mousewheel.js') }}"></script>

    <script src="{{ asset('pessyhub/js/wow.min.js') }}"></script>
    <script src="{{ asset('pessyhub/js/vivus.min.js') }}"></script>

    <script src="{{ asset('pessyhub/js/script.js') }}"></script>
    <script src="{{ asset('pessyhub/js/color-settings.js') }}"></script>

    <script src="{{ asset('') }}"></script>

    @endsection