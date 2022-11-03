<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEDDyHUB Comming Soon</title>
    <!-- Stylesheets -->
    <link href="{{ asset('peddyhub/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('peddyhub/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('peddyhub/css/responsive.css') }}" rel="stylesheet">
    <!--Color Switcher Mockup-->
    <link href="{{ asset('peddyhub/css/color-switcher-design.css') }}" rel="stylesheet">
    <!--Color Themes-->
    <link id="theme-color-file" href="{{ asset('peddyhub/css/color-themes/default-theme.css') }}" rel="stylesheet">
    <!--Favicon-->
    <link href="{{ asset('peddyhub/images/home_5/favicon.png') }}" type="image/x-icon" rel="shortcut icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
  <link href="https://kit-pro.fontawesome.com/releases/v6.1.1/css/pro.min.css" rel="stylesheet">

</head>



<body>

    <div class="main-wrapper pet comming">
        <div id="preloading"></div>
        <section class="featured">
            <div class="crumb center">
                <div class="container">
                    <h1 class="text-center">
                        PEDDyHUB <span class="wow pulse" data-wow-delay="1s"> Comming Soon </span>
                    </h1>
                    <div class="bg_tran">
                        Comming Soon
                    </div>
                    <h5>WE ARE PREPARING SOMETHING <span> MESMERIZING </span></h5>
                </div>
            </div>
        </section>

        <section class="coming d-none">
            <div class="container">
                <ul data-countdown="2022/08/14 12:00:00" class="timer text-center">
                    <li>
                        <h2 class="days">264</h2>
                        <h4>Days</h4>
                    </li>
                    <li>
                        <h2 class="hours">18</h2>
                        <h4>Hours</h4>
                    </li>
                    <li>
                        <h2 class="minutes">10</h2>
                        <h4>Minutes</h4>
                    </li>
                    <li>
                        <h2 class="seconds">05</h2>
                        <h4>Seconds</h4>
                    </li>
                </ul>
                <div class="button text-center">
                    <a href="https://lin.ee/QRPGdf7" class="btn main hvr-rectangle-in"><i class="fas fa-paw me-2"></i> Follow us for
                        updates</a>
                </div>
                <div class="image">
                    <img src="{{ url('/peddyhub/images/home_5/dots.png') }}" alt="" class="dots rotate">
                </div>
            </div>
        </section>

    </div>

    <script src="{{ asset('peddyhub/js/jquery.js') }}"></script>
    <script src="{{ asset('peddyhub/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('peddyhub/js/jquery.countdown.js') }}"></script>
    <script src="{{ asset('peddyhub/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('peddyhub/js/mousewheel.js') }}"></script>

    <script src="{{ asset('peddyhub/js/wow.min.js') }}"></script>
    <script src="{{ asset('peddyhub/js/vivus.min.js') }}"></script>

    <script src="{{ asset('peddyhub/js/script.js') }}"></script>
    <script src="{{ asset('peddyhub/js/color-settings.js') }}"></script>
    <script>
        $('[data-countdown]').each(function () {
            var $this = $(this),
                finalDate = $(this).data('countdown');
            $this.countdown(finalDate, function (event) {
                $(this).find(".days").html(event.strftime("%D"));
                $(this).find(".hours").html(event.strftime("%H"));
                $(this).find(".minutes").html(event.strftime("%M"));
                $(this).find(".seconds").html(event.strftime("%S"));
            });
        });
    </script>

</body>

</html>
