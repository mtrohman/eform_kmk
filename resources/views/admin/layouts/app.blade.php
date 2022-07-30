<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
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
          <div class="text-white brand inline no-border d-sm-inline-block">
            <h4>BPR Mitra Mulia Persada</h4>{{-- <img src="{{ asset("assets/img/logo_white.png") }}" alt="logo" data-src="{{ asset("assets/img/logo_white.png") }}" data-src-retina="{{ asset("assets/img/logo_white_2x.png") }}" width="78" height="22"> --}}
          </div>
          
          
        </div>
        <div class="d-flex align-items-center">
          <!-- START User Info-->
          <div class="pull-left p-r-10 fs-14 d-lg-inline-block d-none text-white">
            <span class="bold">{{Auth::user()->name}}</span> <span class=""></span>
          </div>
          <div class="dropdown pull-right d-lg-block">
            <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="profile dropdown">
              <span class="thumbnail-wrapper d32 circular inline">
						    <img src="{{ asset("assets/img/profiles/avatar.jpg") }}" alt="" data-src="{{ asset("assets/img/profiles/avatar.jpg") }}"
							  data-src-retina="{{ asset("assets/img/profiles/avatar_small2x.jpg") }}" width="32" height="32">
					    </span>
            </button>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
              <a href="#" class="dropdown-item"><span>Signed in as <br /><b>{{Auth::user()->email}}</b></span></a>
              <div class="dropdown-divider"></div>
              {{-- <a href="#" class="dropdown-item">Your Profile</a>
              <a href="#" class="dropdown-item">Your Activity</a>
              <a href="#" class="dropdown-item">Your Archive</a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">Features</a>
              <a href="#" class="dropdown-item">Help</a>
              <a href="#" class="dropdown-item">Settings</a> --}}
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
              {{-- <div class="dropdown-divider"></div>
              <span class="dropdown-item fs-12 hint-text">Last edited by David<br />on Friday at 5:27PM</span> --}}
            </div>
          </div>
          <!-- END User Info-->
          {{-- <a href="#" class="header-icon m-l-10 sm-no-margin sm-p-r-0 d-inline-block" data-toggle="quickview" data-toggle-element="#quickview">
            <i class="pg-icon btn-icon-link">menu_add</i>
          </a> --}}
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
                <a href="{{ route('admin.dashboard')}}">Dashboard</a>
              </li>
              
              <li>
                <a href="javascript:;"><span class="title">Master Data</span>
                <span class=" arrow"></span></a>
                <ul class="">
                  <li class="">
                    <a href="{{ route('admin.work-types.index') }}">
                      {{ __('Work Types') }}
                    </a>
                  </li>

                  <li class="">
                    <a href="{{ route('admin.family-relations.index') }}">
                      {{ __('Family Relations') }}
                    </a>
                  </li>

                  <li class="">
                    <a href="{{ route('admin.home-ownership-statuses.index') }}">
                      {{ __('Home Ownership Statuses') }}
                    </a>
                  </li>

                  <li class="">
                    <a href="{{ route('admin.home-facilities.index') }}">
                      {{ __('Home Facilities') }}
                    </a>
                  </li>

                  <li class="">
                    <a href="{{ route('admin.credit-times.index') }}">
                      {{ __('Credit Times') }}
                    </a>
                  </li>

                  <li class="">
                    <a href="{{ route('admin.purpose-usages.index') }}">
                      {{ __('Purpose Usages') }}
                    </a>
                  </li>

                  <li class="">
                    <a href="{{ route('admin.income-sources.index') }}">
                      {{ __('Income Sources') }}
                    </a>
                  </li>

                  <li class="">
                    <a href="{{ route('admin.debt-guarantees.index') }}">
                      {{ __('Debt Guarantees') }}
                    </a>
                  </li>

                  <li class="">
                    <a href="{{ route('admin.guarantee-statuses.index') }}">
                      {{ __('Guarantee Statuses') }}
                    </a>
                  </li>

                </ul>
              </li>

              

              <li>
                <a href="javascript:;"><span class="title">Form Responses</span>
                <span class=" arrow"></span></a>
                <ul class="">
                  <li>
                    <a href="{{ route('admin.form-responses.index', ['form' => 'tabungan'])}}">Form Pengajuan Tabungan</a>
                  </li>
                  <li>
                    <a href="{{ route('admin.form-responses.index', ['form' => 'deposito'])}}">Form Pengajuan Deposito</a>
                  </li>
                  <li>
                    <a href="{{ route('admin.form-responses.index', ['form' => 'kredit'])}}">Form Pengajuan Kredit</a>
                  </li>
                </ul>
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
            <div class="jumbotron no-margin" data-pages="parallax">
              <div class=" container container-fixed-lg sm-p-l-0 sm-p-r-0">
                <div class="inner" style="transform: translateY(0px); opacity: 1;">
                  <h3 class="">@yield('title', 'Page Title')</h3>
                </div>
              </div>
            </div>
            <!-- END JUMBOTRON -->
              <main class="py-4 pb-5">
                @yield('content')
              </main>
            {{-- <div class=" container">
              <!-- PLEASE REMOVE demo-container CLASS ABOVE, ITS ONLY FOR DEMO PUPPOSE
                    TO SHOW THE PARRALAX EFFECT
                  -->
            </div> --}}
            
          </div>
          <!-- END PAGE CONTENT -->
        </div>

        <!-- START COPYRIGHT -->
        <!-- START CONTAINER FLUID -->
        <div class="container footer">
          <div class="copyright sm-text-center">
            <p class="small-text no-margin pull-left sm-pull-reset">
              Formulir Elektronik
              <span class="hint-text m-l-15">BPR Online</span>
            </p>
            <p class="small no-margin pull-right sm-pull-reset">
              Hand-crafted <span class="hint-text"> <a href="https://mtrohman.github.io/cv">by MTrohman</a></span>
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