<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Dashboard Harbolnas</title>
  {{-- <meta name="description" content="" /> --}}
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="shortcut icon" href="/images/Resources/harbolnas_logo.png">
  <link rel="stylesheet" href="/plugins/template/animate.css/animate.css" type="text/css" />
  <link rel="stylesheet" href="/plugins/template/font-awesome/css/font-awesome.css" type="text/css" />
  <link rel="stylesheet" href="/plugins/template/waves/dist/waves.css" type="text/css" />

  <link rel="stylesheet" href="/plugins/template/bootstrap/dist/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="/plugins/template/styles/font.css" type="text/css" />
  <link rel="stylesheet" href="/plugins/template/styles/app.css" type="text/css" />

  <link rel="stylesheet" href="/css/palette.css">
  @yield('styles')
  @yield('modal')
</head>
<body>
  <div class="app">

    <!-- aside -->
    <aside id="aside" class="app-aside modal fade" role="menu">
      <div class="left">
        <div class="box bg-white">
          <div class="navbar md-whiteframe-z1 no-radius bg-primary">
            <!-- brand -->
            <a class="navbar-brand" href="/">
              <img src="images/Resources/logo-harbolnas.png" alt="." style="max-height: 32px;">
              <span class="hidden-folded m-l inline">Harbolnas</span>
            </a>
            <!-- / brand -->
          </div>
          <div class="box-row">
            <div class="box-cell scrollable hover">
              <div class="box-inner">
                {{-- user thing --}}
                <div class="p hidden-folded blue-50" style="background-image:url(images/Resources/Category-1.jpg); background-size:cover">
                  {{-- <div class="rounded w-64 bg-white inline pos-rlt">
                    <img src="/images/a0.jpg" class="img-responsive rounded">
                  </div> --}}
                  <a class="block m-t-sm c-w">
                    <span class="block font-bold">{{Auth::user()->name}}</span>
                    {{Auth::user()->email}}
                  </a>
                </div>
                {{-- sidebar nav --}}
                <div id="nav">
                  <nav ui-nav>
                    <ul class="nav">
                      <li class="nav-header m-v-sm hidden-folded"></li>
                      <li class="{{Request::is('dashboard/*') || Request::is('dashboard') ? 'active' : ''}}">
                        <a href="/dashboard">
                          <i class="icon fa fa-newspaper-o i-20"></i>
                          <span>Dashboard</span>
                        </a>
                      </li>
                      {{-- <li class="{{Request::is('content-upload/*') || Request::is('content-upload') ? 'active' : ''}}">
                        <a href="/content-upload">
                          <i class="icon fa fa-image i-20"></i>
                          <span>Upload Banner</span>
                        </a>
                      </li> --}}
                      @if (Auth::user()->role != 3)
                        <li class="{{Request::is('user-management/*') || Request::is('user-management') ? 'active' : ''}}">
                          <a href="/user-management">
                            <i class="icon fa fa-users i-20"></i>
                            <span>User Management</span>
                          </a>
                        </li>

                        {{-- <li class="{{Request::is('content-management/*') || Request::is('content-management') ? 'active' : ''}}">
                          <a href="#">
                            <i class="icon fa fa-file-text i-20"></i>
                            <span>Content Management</span>
                          </a>
                        </li> --}}
                      @endif

                      <li class="b-b b m-v-sm"></li>
                      <li class="{{Request::is('account-setting/*') || Request::is('account-setting') ? 'active' : ''}}">
                        <a href="/account-setting">
                          <span>Account Setting</span>
                        </a>
                      </li>
                    </ul>
                  </nav>
                </div>

              </div>
            </div>
          </div>

          <nav>
            <ul class="nav b-t b">
              <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  <i class="icon fa fa-power-off i-20"></i>
                  <span>Log Out</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </nav>

        </div>
      </div>
    </aside>
    <!-- / aside -->

    <!-- content -->
    <div id="content" class="app-content" role="main">
      <div class="box">
        <!-- Content Navbar -->
        <div class="navbar md-whiteframe-z1 no-radius bg-primary">
          <!-- Open side - Naviation on mobile -->
          <a md-ink-ripple  data-toggle="modal" data-target="#aside" class="navbar-item pull-left visible-xs visible-sm" style="margin-top:-3px">
            <i class="fa fa-navicon i-24"></i>
          </a>
          <!-- / -->
          <!-- Page title - Bind to $state's title -->
          <div class="navbar-item pull-left h4">@yield('title_page')</div>
          <!-- / -->
          <!-- Common tools -->
        </div>

        <!-- Content -->
        <div class="box-row">
          <div class="box-cell">
            <div class="box-inner padding">
              @yield('contents')
            </div>
          </div>
        </div>
        <!-- / content -->

      </div>
    </div>
  </div>

<script src="/plugins/template/jquery/dist/jquery.js"></script>
<script src="/plugins/template/bootstrap/dist/js/bootstrap.js"></script>
<script src="/plugins/template/waves/dist/waves.js"></script>

@yield('scripts')
</body>
</html>
