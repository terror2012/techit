<nav id="topNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <img class="img-responsive" src="{{url('/assets/logo.png')}}" width="270" height="50" alt="">

        </div>
        <div class="navbar-collapse collapse" id="bs-navbar">
            <ul class="nav navbar-nav">
                <li>
                    <a class="page-scroll" href="{{url('/')}}">Home</a>
                </li>
                <li>
                    <a class="page-scroll" href="{{url('/services')}}">Services</a>
                </li>
                <li>
                    <a class="page-scroll" href="{{url('/howto')}}">How To</a>
                </li>
                <li>
                    <a class="page-scroll" href="{{url('/comments')}}">Comments</a>
                </li>
                <li>
                    <a class="page-scroll" href="{{url('/schedule')}}">Schedule</a>
                </li>
                <li>
                    <a class="page-scroll" href="{{url('/remote_connect')}}">Remote Connect</a>
                </li>

                <li>
                    <a class="page-scroll" href="{{url('/contact')}}">Contact</a>
                </li>
                <li>
                    <a class="page-scroll" href="{{url('/about_us')}}">About Us</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <!-- This is the push drop down... Hopefully -->

                @if(Auth::guest())
                    <li class="dropdown">
                        <a href="http://phpoll.com/login" class="dropdown-toggle" data-toggle="dropdown">Log In <span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-lr animated slideInRight" role="menu">
                            <div class="col-lg-12">
                                <div class="text-center"><h3><b>Log In</b></h3></div>
                                <form id="ajax-login-form" action="{{url('/login')}}" method="post" role="form" autocomplete="off">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="" autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-7">
                                                <input type="checkbox" tabindex="3" name="remember" id="remember">
                                                <label for="remember"> Remember Me</label>
                                            </div>
                                            <div class="col-xs-5 pull-right">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-success" value="Log In">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="{{url('/password/reset')}}" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </ul>
                    </li>
                    @else
                    <li class="dropdown">

                        <?php

                            $name = explode(' ', Auth::user()->name);

                            $user_inf = \App\Eloquent\user_info::find(Auth::user()->id);

                        ?>

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$name['1']}}  <span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-lr animated slideInRight" role="menu">
                            <li>
                                <a class="page-scroll" href="{{url('/account')}}">My Account</a>
                            </li>
                            @if($user_inf->rank == "3")
                                <li>
                                    <a class="page-scroll" href="{{url('/admin/')}}">Admin Panel</a>
                                </li>
                            @endif
                            <li>
                                <a class="page-scroll" href="{{url('/logout')}}">Log Out</a>
                            </li>
                    @endif
            </ul>
        </div>
    </div>
</nav>