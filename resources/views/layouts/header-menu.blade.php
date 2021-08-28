    <div class="main-header">
            <div class="logo">
                <!-- <img src="{{asset('assets/images/logo.png')}}" alt=""> -->
                <h3 style="padding-left: 30px;">Cranium</h3>
            </div>

            

            <div style="margin: auto"></div>

            <div class="header-part-right">
                <!-- Full screen toggle -->
                <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>             
                
                <!-- User avatar dropdown -->
                <div class="dropdown">
                    <div  class="user col align-self-end">
                        <a id="userDropdown" data-toggle="dropdown">{{ Auth::user()->name }}</a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{route('login')}}">Sign out</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- header top menu end -->
