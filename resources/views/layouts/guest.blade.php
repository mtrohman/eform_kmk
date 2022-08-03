<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    {{-- <link rel="apple-touch-icon" href="pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png"> --}}
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="Meet pages - The simplest and fastest way to build web UI for your dashboard or app." name="description" />
    <meta content="Ace" name="author" />
    <link href="{{ asset("assets/plugins/pace/pace-theme-flash.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("assets/plugins/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />

    

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset("assets/plugins/jquery-scrollbar/jquery.scrollbar.css") }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{ asset("assets/plugins/select2/css/select2.min.css") }}" rel="stylesheet" type="text/css" media="screen" />
    <link class="main-stylesheet" href="{{ asset("assets/css/themes/modern.css") }}" rel="stylesheet" type="text/css" />

    @yield('header')
    @yield('styles')
  </head>
  <body class="fixed-header horizontal-menu horizontal-app-menu ">
    <!-- START PAGE-CONTAINER -->
    <div class="header p-r-0 bg-primary">
      <div class="header-inner header-md-height">
        <a href="#" class="btn-link toggle-sidebar d-lg-none text-white sm-p-l-0 btn-icon-link" data-toggle="horizontal-menu">
          <i class="pg-icon">menu</i>
        </a>
        <div class="">
          <div class="brand inline no-border d-sm-inline-block">
            <a href="{{ route('guest.index') }}" class="text-white">
              <h4>{{ env('APP_NAME', 'Eform BPR') }}</h4>{{-- <img src="{{ asset("assets/img/logo_white.png") }}" alt="logo" data-src="{{ asset("assets/img/logo_white.png") }}" data-src-retina="{{ asset("assets/img/logo_white_2x.png") }}" width="78" height="22"> --}}
              
            </a>
          </div>
          
          
        </div>
        <div class="d-flex align-items-center">
          
          <a href="{{ route('admin.dashboard')}}" class="header-icon m-l-10 sm-no-margin sm-p-r-0 d-inline-block">
            <i class="pg-icon btn-icon-link">shield_lock</i>
          </a>
        </div>
      </div>
      <div class="bg-white">
        <div class="container">
          <div class="menu-bar header-sm-height" data-pages-init='horizontal-menu' data-hide-extra-li="-1">
            <a href="#" class="btn-link header-icon toggle-sidebar d-lg-none" data-toggle="horizontal-menu">
              <i class="pg-icon">close</i>
            </a>
            <ul>
              <li>
                <a href="https://bprkmk.com/">Home</a>
              </li>

              <li>
                <a href="javascript:;"><span class="title">e-Form</span>
                <span class=" arrow"></span></a>
                <ul class="">
                  <li class="">
                    <a href="\guest?form=tabungan">
                      Tabungan
                    </a>
                  </li>
                  <li class="">
                    <a href="\guest?form=deposito">
                      Deposito
                    </a>
                  </li>
                  <li class="">
                    <a href="\guest?form=kredit">
                      Kredit
                    </a>
                  </li>
                </ul>
              </li>

              <li>
                <a href="https://bprkmk.com/tabungan/">Tabungan</a>
              </li>

              <li>
                <a href="https://bprkmk.com/deposito/">Deposito</a>
              </li>

              <li>
                <a href="https://bprkmk.com/kredit-2/">Kredit</a>
              </li>

              <li>
                <a href="https://bprkmk.com/contact-us/">Hubungi Kami</a>
              </li>

            </ul>
            
          </div>
        </div>
      </div>
    </div>
    
    
    <div class="page-container ">
      <!-- START PAGE CONTENT WRAPPER -->
      <div class="page-content-wrapper ">
        <div class="page-content-wrapper content-builder full-height active pb-5" id="titleParallax">
          <!-- START PAGE CONTENT -->
          <div class="content">
            <!-- START JUMBOTRON -->
            {{-- <div class="jumbotron no-margin" data-pages="parallax"> --}}
            <div class="jumbotron" data-pages="parallax" data-scroll-element=".page-container">  
              {{-- <div class=" container container-fixed-lg sm-p-l-0 sm-p-r-0"> --}}
              <div class=" container container-fixed-lg sm-p-l-0 sm-p-r-0">  
                <div class="inner"> {{-- style="transform: translateY(0px); opacity: 1;"style="transform: translateY(0px); opacity: 1;" --}}
                  <h3 class="">@yield('title')</h3>
                  @yield('jumbotron')

                </div>
              </div>
            </div>
            <!-- END JUMBOTRON -->
              <main class="py-4 pb-5">
                @yield('content')
              </main>
            
            
          </div>
          <!-- END PAGE CONTENT -->
        </div>

        <!-- START COPYRIGHT -->
        <!-- START CONTAINER FLUID -->
        <div class="container footer">
          <div class="copyright sm-text-center">
            <p class="small-text no-margin pull-left sm-pull-reset">
              Formulir Elektronik
              <span class="hint-text m-l-15">{{ env("APP_CLIENT") }}</span>
            </p>
            <p class="small no-margin pull-right sm-pull-reset">
              Hand-crafted <span class="hint-text"> <a href="#">by Omegatama Computer</a></span>{{-- https://mtrohman.github.io/cv --}}
            </p>
            <div class="clearfix"></div>
          </div>
        </div>
        <!-- END COPYRIGHT -->
      </div>
      <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTAINER -->
    
    <!-- START OVERLAY -->
    
    <!-- END OVERLAY -->
    <!-- BEGIN VENDOR JS -->
    <script src="{{ asset("assets/plugins/pace/pace.min.js") }}" type="text/javascript"></script>
    <!--  A polyfill for browsers that don't support ligatures: remove liga.js if not needed-->
    <script src="{{ asset("assets/plugins/liga.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets/plugins/jquery/jquery-3.2.1.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets/plugins/modernizr.custom.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets/plugins/jquery-ui/jquery-ui.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets/plugins/popper/umd/popper.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets/plugins/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets/plugins/jquery/jquery-easy.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets/plugins/jquery-unveil/jquery.unveil.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets/plugins/jquery-ios-list/jquery.ioslist.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets/plugins/jquery-actual/jquery.actual.min.js") }}"></script>
    <script src="{{ asset("assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("assets/plugins/select2/js/select2.full.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("assets/plugins/classie/classie.js") }}"></script>
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="{{ asset("assets/js/pages.min.js") }}"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="{{ asset("assets/js/scripts.js") }}" type="text/javascript"></script>
    @yield('scripts')
    <!-- END PAGE LEVEL JS -->
  </body>
</html>