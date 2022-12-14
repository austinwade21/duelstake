<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DiceGold') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('theme/css/bootstrap-dark.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{ asset('theme/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{ asset('theme/css/app-dark.min.css') }}" id="app-style" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/app.css') }}" id="app-style" rel="stylesheet" type="text/css"/>
    <script src="//{{ request()->getHost() }}:{{env('LARAVEL_ECHO_PORT')}}/socket.io/socket.io.js"></script>
    <script>
        window.laravel_echo_port='{{env("LARAVEL_ECHO_PORT")}}';
        @auth
            window.api_token = '{{\Illuminate\Support\Facades\Auth::user()->api_token}}';
        @endauth

    </script>

</head>
<body data-topbar="dark" class="dark" data-layout="horizontal">

<div id="layout-wrapper">
    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="{{ url('/') }}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{asset('images/logo.png')}}" alt="" height="22">
                                </span>
                        <span class="logo-lg">
                                    <img src="{{asset('images/logo.png')}}" alt="" height="20">
                                </span>
                    </a>

                    <a href="{{ url('/') }}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{asset('images/logo.png')}}" alt="" height="22">
                                </span>
                        <span class="logo-lg">
                                    <img src="{{asset('images/logo.png')}}" alt="" height="20">
                                </span>
                        {{--                        {{ config('app.name', 'Laravel') }}--}}
                    </a>
                </div>


            </div>
            <div class="d-flex">
                <div class="chat-switcher">
                    <div class="d-block" href="#" id="chat-switcher"><i
                                class="fas fa-comments align-middle mr-lg-1"></i></div>
                </div>

                <div class="dropdown d-inline-block user-dropdown">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @guest
                            <img id="profile-image" class="rounded-circle header-profile-user"
                                 src="{{asset('theme/images/users/avatar-2.jpg')}}"
                                 alt="Header Avatar">
                        @else
                            @if(\Illuminate\Support\Facades\Auth::user()->avatar)
                                <img id="profile-image" class="rounded-circle header-profile-user"
                                     src="{{Illuminate\Support\Facades\Storage::url(\Illuminate\Support\Facades\Auth::user()->avatar)}}"
                                     alt="Header Avatar">
                            @else
                                <img id="profile-image" class="rounded-circle header-profile-user"
                                     src="{{asset('theme/images/users/avatar-2.jpg')}}"
                                     alt="Header Avatar">
                            @endif
                        @endguest
                        <span class="d-none d-xl-inline-block ml-1">
                            @guest
                                {{ __('Guest') }}
                            @else
                                {{ Auth::user()->user_name }}
                            @endguest
                            </span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- Right Side Of Navbar -->
                        <!-- Authentication Links -->
                        @guest
                            <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myInfoDialog"><i class="fas fa-user align-middle mr-1"></i> My Info</a>
                            <a class="dropdown-item d-block" href="#" data-toggle="modal" data-target="#settingsDialog"><i
                                        class="fa fa-cog align-middle mr-1"></i> Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"><i
                                        class="fas fa-power-off align-middle mr-1 text-danger"></i> {{ __('Logout') }}
                            </a>

                            <div class="dropdown-item" aria-labelledby="navbarDropdown">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>

                        @endguest

                    </div>
                </div>
            </div>

        </div>
    </header>
{{--    @if(\Illuminate\Support\Facades\Session::has('message'))--}}
{{--        @foreach(\Illuminate\Support\Facades\Session::get('message') as $message)--}}
{{--            <p class="alert {{ $message['alert-class'] }}">{{ $message['message'] }}</p>--}}
{{--        @endforeach--}}
{{--    @endif--}}
    @if(session()->has('message.level'))
        <div class="alert alert-{{ session('message.level') }}">
            {!! session('message.content') !!}
        </div>
    @endif

    <main class="py-4">
        @yield('content')
    </main>

    @auth
        <div class="modal fade" id="settingsDialog" tabindex="-1" role="dialog"
             aria-labelledby="settingsDialogTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0"
                            id="exampleModalScrollableTitle">{{__('Settings')}}</h5>
                        <button type="button" class="close" data-dismiss="modal"
                                aria-label="{{__('Close')}}">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabPassword"
                                   role="tab" aria-selected="true">
                                    <span class="d-none d-sm-block">{{__('PASSWORD')}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabEmail" role="tab"
                                   aria-selected="false">
                                    <span class="d-none d-sm-block">{{__('E-MAIL')}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabPrivacy" role="tab"
                                   aria-selected="false">
                                    <span class="d-none d-sm-block">{{__('PRIVACY')}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabSocial" role="tab"
                                   aria-selected="false">
                                    <span class="d-none d-sm-block">{{__('SOCIAL')}}</span>
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="tabPassword" role="tabpanel">
                                <form action="#" method="post" class="custom-validation" id="change-password-form">
                                    <div class="form-group">
                                        <label for="old-password-input">{{__('Current Password')}}</label>
                                        <div>
                                            <input type="password" name="current_password"
                                                   class="form-control" required
                                                   id="old-password-input"
                                                   placeholder="Input your current password.">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="new-password-input">{{__('New Password')}}</label>
                                        <div>
                                            <input type="password" name="new_password"
                                                   class="form-control" required
                                                   id="new-password-input"
                                                   data-parsley-minlength="8"
                                                   placeholder="Min 8 chars.">
                                        </div>
                                    </div>

                                    <input type="hidden" name="api_token"
                                           value="{{\Illuminate\Support\Facades\Auth::user()->api_token}}">

                                    <div class="form-group mb-0 mt-lg-4">
                                        <div class="center-button">
                                            <button type="submit" id="btn-change-password"
                                                    class="btn btn-primary waves-effect waves-light mr-1">
                                                Save Changes
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="tabEmail" role="tabpanel">
                                @unless (\Illuminate\Support\Facades\Auth::user()->hasVerifiedEmail())
                                    <div class="dynamic-message">
                                        Your E-mail address must be confirmed so that you can receive security and
                                        marketing E-mails.
                                        <a href="{{route('verification.resend')}}" id="resend-email" data-token="{{csrf_token()}}">Resend</a>
                                    </div>
                                @endunless

                                <form action="#" method="post" id="change-email-form" class="custom-validation"
                                      novalidate>
                                    <div class="form-group">
                                        <label for="email-input">{{__('Current Email')}}</label>
                                        <div>
                                            <input type="email" id="email-input" class="form-control" required
                                                   parsley-type="email" name="email"
                                                   value="{{\Illuminate\Support\Facades\Auth::user()->email}}"/>
                                        </div>
                                    </div>
                                    <input type="hidden" name="api_token"
                                           value="{{\Illuminate\Support\Facades\Auth::user()->api_token}}">

                                    <div class="form-group mb-0 mt-lg-4">
                                        <div class="center-button">
                                            <button type="submit"
                                                    class="btn btn-primary waves-effect waves-light mr-1">
                                                Save Changes
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="tabPrivacy" role="tabpanel">
                                <div class="static-message">
                                    If you disagree with any aspect of previously accepted customer agreement you
                                    can revoke your consent. The consent revoke will trigger account removal and all
                                    personal data erasure from our database, such action may not be reverted. Note
                                    that your funds must be withdrawn from the system to delete an account.
                                </div>
                                <br>
                                <form action="#" method="post" id="change-hide-username-form">
                                    <div class="row">
                                        <div class="col-md-11">
                                            {{__('Hide My User Name')}}
                                        </div>
                                        <div class="col-md-1">
                                            <div class="custom-control custom-switch mb-2" dir="rtl">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="hide-username-toggle" name="hide_user_name"
                                                       @if (\Illuminate\Support\Facades\Auth::user()->hide_user_name)
                                                               checked
                                                       @endif
                                                       >
                                                <label class="custom-control-label" for="hide-username-toggle"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="api_token"
                                           value="{{\Illuminate\Support\Facades\Auth::user()->api_token}}">

                                    <div class="form-group mb-0 mt-lg-4">
                                        <div class="center-button">
                                            <button type="submit"
                                                    class="btn btn-primary waves-effect waves-light mr-1">
                                                Save Changes
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="tabSocial" role="tabpanel">
                                @foreach($socialData as $social)
                                    <div class="row">
                                        <div class="col-md-11">
                                            <div>{{$social['name']}}</div>
                                            @if(isset($social['properties']['name']))
                                                <div class="social-client-name">{{$social['properties']['name']}}</div>
                                            @endif
                                        </div>
                                        <div class="col-md-1">
                                            <div class="custom-control custom-switch mb-2" dir="rtl">
                                                <input type="checkbox" class="custom-control-input social-toggle"
                                                       data-social-id="{{$social['id']}}" id="{{$social['name']}}-toggle"
                                                       data-token="{{\Illuminate\Support\Facades\Auth::user()->api_token}}"
                                                @if(isset($social['properties']['name']))
                                                    checked
                                                @endif
                                                >
                                                <label class="custom-control-label" for="{{$social['name']}}-toggle"></label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <script>
            var token = '{{\Illuminate\Support\Facades\Auth::user()->getRememberToken()}}';
        </script>
@endauth


<!-- Scripts -->
    <script src="{{ asset('theme/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('theme/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('theme/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('theme/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('theme/libs/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ asset('theme/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ asset('theme/js/app.js') }}"></script>
    <script>
        $( document ).ready(function() {
            $("#change-password-form").submit(function(e){
                $.ajax
                ({
                    type: "POST",
                    url: "/api/user/changePassword",
                    dataType: 'json',
                    data: $(this).serialize(),
                    success: function (res){
                        alert(res.message);
                    },
                    error(message, ...optionalParams) {
                        alert(message.responseText);
                    }
                });
                return false;
            });

            $("#change-email-form").submit(function(e){
                $.ajax
                ({
                    type: "POST",
                    url: "/api/user/changeEmail",
                    dataType: 'json',
                    data: $(this).serialize(),
                    success: function (res){
                        alert(res.message);
                    },
                    error(message, ...optionalParams) {
                        alert(message.responseText);
                    }

                });
                return false;
            });

            $("#change-hide-username-form").submit(function(e){
                $.ajax
                ({
                    type: "POST",
                    url: "/api/user/setHideUserName",
                    dataType: 'json',
                    data: $(this).serialize(),
                    success: function (res){
                        alert(res.message);
                    },
                    error(message, ...optionalParams) {
                        alert(message.responseText);
                    }

                });
                return false;
            });

            $('#resend-email').click(function(e){
                e.preventDefault();
                $.ajax
                ({
                    type: "POST",
                    url: this.href,
                    dataType: 'json',
                    data: {'_token': $(this).data('token')},
                    success: function (res){
                        alert(res.message);
                    },
                    error(message, ...optionalParams) {
                        alert(message.responseText);
                    }

                });
            });

            $('.social-toggle').click(function (e) {
                if($(this).prop('checked')){
                    window.open('/user/social?social_id=' + $(this).data('social-id'),'_blank');
                }
                else{
                    $.ajax
                    ({
                        type: "POST",
                        url: '/api/user/social/unlink',
                        dataType: 'json',
                        data: {
                            'api_token': $(this).data('token'),
                            'social_id': $(this).data('social-id'),
                        },
                        success: function (res){
                            alert(res.message.toString());
                        },
                        error(message, ...optionalParams) {
                            alert(message.responseText);
                        }

                    });

                    $(this).closest(".row").find('.social-client-name').hide();
                }
            });

            $('#chat-switcher').click(function (e) {
                var chatBox = $('#chat');
                if(chatBox.is(":visible")){
                    chatBox.hide();
                    $('.game-area').addClass("margin-center");
                }
                else{
                    chatBox.show();
                    $('.game-area').removeClass("margin-center");
                }
            });
        });
    </script>
</div>
<div id="info-mute"></div>

</body>
</html>
