<!-- Header -->
@if (!Route::is(['index-one', 'index-three', 'index-four', 'pos']))
    <div class="header">
@endif
@if (Route::is(['index-one', 'pos']))
    <div class="header header-one">
@endif
@if (Route::is(['index-three']))
    <div class="header header-three">
@endif
@if (Route::is(['index-four']))
    <div class="header header-four">
@endif
@if (Route::is(['index-two']))
    <div class="container">
@endif
@if (Route::is(['index-two']))
    <div class="d-flex justify-content-between align-items-center header-block">
@endif
<!-- Logo -->
<div class="header-left active">
    <a href="{{ route('cashier.index') }}" class="logo logo-normal">
        <img src="{{ URL::asset('/assets/img/logo.png') }}" alt="">
    </a>

    <a href="{{ route('cashier.index') }}" class="logo logo-white">
        <img src="{{ URL::asset('assets/img/logo-white.png') }}" alt="">
    </a>
    <a href="{{ route('cashier.index') }}" class="logo-small">
        <img src="{{ URL::asset('/assets/img/logo-small.png') }}" alt="">
    </a>
    {{--  @if (!Route::is(['index-one', 'index-three', 'index-four', 'pos']))
		<a id="toggle_btn" href="javascript:void(0);">
			<i data-feather="chevrons-left" class="feather-16"></i>
		</a>
		@endif  --}}

</div>
<!-- /Logo -->

<a id="mobile_btn" class="mobile_btn" href="#sidebar">
    <span class="bar-icon">
        <span></span>
        <span></span>
        <span></span>
    </span>
</a>
<!-- Header Menu -->
<ul class="nav user-menu">
    <!-- Search -->
    <li class="nav-item nav-searchinputs">
        <div class="top-nav-search">
            <a href="javascript:void(0);" class="responsive-search">
                <i class="fa fa-search"></i>
            </a>
            <form action="#">
                <div class="searchinputs">
                    <input type="text" placeholder="Search">
                    <div class="search-addon">
                        <span><i data-feather="search" class="feather-14"></i></span>
                    </div>
                </div>
            </form>
        </div>
    </li>
    <!-- /Search -->

    <!-- Flag -->
    {{--  <li class="nav-item dropdown has-arrow flag-nav nav-item-box">
			<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
				<i data-feather="globe"></i>
			</a>
			<div class="dropdown-menu dropdown-menu-right">
				<a href="javascript:void(0);" class="dropdown-item active">
					<img src="{{ URL::asset('/assets/img/flags/us.png')}}" alt="" height="16"> English
				</a>
				<a href="javascript:void(0);" class="dropdown-item">
					<img src="{{ URL::asset('/assets/img/flags/fr.png')}}" alt="" height="16"> French
				</a>
				<a href="javascript:void(0);" class="dropdown-item">
					<img src="{{ URL::asset('/assets/img/flags/es.png')}}" alt="" height="16"> Spanish
				</a>
				<a href="javascript:void(0);" class="dropdown-item">
					<img src="{{ URL::asset('/assets/img/flags/de.png')}}" alt="" height="16"> German
				</a>
			</div>
		</li>  --}}
    <!-- /Flag -->

    <li class="nav-item nav-item-box">
        <a href="{{ route('cashier.index') }}"><i data-feather="home"></i></a>
    </li>

    <li class="nav-item nav-item-box">
        <a href="{{ route('cashier.pos') }}"><i data-feather="hard-drive"></i></a>
    </li>
    <li class="nav-item nav-item-box">
        <a href="{{ route('cashier.maptable') }}"><i data-feather="map"></i></a>
    </li>
    <!-- Notifications -->
    <li class="nav-item dropdown nav-item-box dropdown-notifications">
        <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
            <i data-feather="bell"></i>
            <span data-count="0" class="badge rounded-pill">
            </span>
            {{--  <i data-count="0" class="glyphicon glyphicon-bell notification-icon"></i>  --}}
        </a>
        <div class="dropdown-menu notifications">
            <div class="topnav-dropdown-header">
                <span class="notification-title">Notifications (<span id="notif-count">0</span>)</span>
                {{--  <a href="javascript:void(0)" class="clear-noti"> Clear All </a>  --}}
            </div>
            <div class="noti-content">
                <ul class="dropdown-menu dropdown-notifications notification-list">
                </ul>
            </div>
            {{--  <div class="topnav-dropdown-footer">
                <a href="{{ url('activities') }}">View all Notifications</a>
            </div>  --}}
        </div>
    </li>

    <!-- /Notifications -->

    {{--  <li class="nav-item nav-item-box">
			<a href="{{ route('cashier.listbills') }}">

                <i data-feather="file-text"></i>
				<span class="badge rounded-pill">{{ $number_neworder }}</span>
			</a>
		</li>  --}}
    <li class="nav-item nav-item-box">
        <a href="{{ route('cashier.listbills') }}">
            <i data-feather="grid"></i>
            <span class="badge rounded-pill">{{ $number_neworder }}</span>
        </a>
    </li>
    <li class="nav-item nav-item-box">
        <a href="javascript:void(0);" id="btnFullscreen">
            <i data-feather="maximize"></i>
        </a>
    </li>
    <li class="nav-item nav-item-box">
        <a href="generalsettings"><i data-feather="settings"></i></a>
    </li>
    <li class="nav-item dropdown has-arrow main-drop">
        <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
            <span class="user-info">
                <span class="user-letter">
                    <img src="{{ URL::asset('/assets/img/profiles/avator1.jpg') }}" alt="">
                </span>
                <span class="user-detail">
                    <span class="user-name">{{ Auth::user()->name }}</span>
                    <span class="user-role">Super Cashier</span>
                </span>
            </span>
        </a>
        <div class="dropdown-menu menu-drop-user">
            <div class="profilename">
                <div class="profileset">
                    <span class="user-img"><img src="{{ URL::asset('/assets/img/profiles/avator1.jpg') }}"
                            alt="">
                        <span class="status online"></span></span>
                    <div class="profilesets">
                        <h6>{{ Auth::user()->name }}</h6>
                        <h5>Super Cashier</h5>
                    </div>
                </div>
                <hr class="m-0">
                <a class="dropdown-item" href="{{ url('profile') }}"> <i class="me-2" data-feather="user"></i> My
                    Profile</a>
                <a class="dropdown-item" href="{{ url('generalsettings') }}"><i class="me-2"
                        data-feather="settings"></i>Settings</a>
                <hr class="m-0">
                <form method="post" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item logout pb-0">
                        <img src="{{ URL::asset('/assets/img/icons/log-out.svg') }}" class="me-2" alt="img">
                        Logout
                    </button>
                </form>

            </div>
        </div>
    </li>
</ul>
<!-- /Header Menu -->

<!-- Mobile Menu -->
<div class="dropdown mobile-user-menu">
    <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
        aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="{{ url('profile') }}">My Profile</a>
        <a class="dropdown-item" href="{{ url('generalsettings') }}">Settings</a>
        <a class="dropdown-item" href="{{ url('admin/signin') }}">Logout</a>
    </div>
</div>

<!-- /Mobile Menu -->

@if (Route::is(['index-three']))
    </div>
@endif
@if (Route::is(['index-two']))
    </div>
    </div>
@endif

</div>

<!-- Header -->
<script>
    function toggleFullscreen(elem) {
        elem = elem || document.documentElement;
        if (!document.fullscreenElement && !document.mozFullScreenElement &&
            !document.webkitFullscreenElement && !document.msFullscreenElement) {
            if (elem.requestFullscreen) {
                elem.requestFullscreen();
            } else if (elem.msRequestFullscreen) {
                elem.msRequestFullscreen();
            } else if (elem.mozRequestFullScreen) {
                elem.mozRequestFullScreen();
            } else if (elem.webkitRequestFullscreen) {
                elem.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
            }
        } else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            }
        }
    }

    document.getElementById('btnFullscreen').addEventListener('click', function() {
        toggleFullscreen();
    });

</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://js.pusher.com/4.3/pusher.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
</script>
<script type="text/javascript/pusher">
    const notificationsWrapper = $('.dropdown-notifications');
    const notificationsToggle = notificationsWrapper.find('a[data-toggle]');
    const notificationsCountElem = notificationsToggle.find('span[data-count]');
    const notificationsCount = parseInt(notificationsCountElem.data('count'));
    const notifications = notificationsWrapper.find('ul.dropdown-menu');

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    const pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
        cluster: 'ap1',
        encrypted: true
    });

    // Subscribe to the channel we specified in our Laravel Event
    const channel = pusher.subscribe('Notify');

    // Bind a function to a Event (the full Laravel class)
    channel.bind('send-message', function(data) {
        const existingNotifications = notifications.html();
        const newNotificationHtml = `
          <li class="notification active">
                <div class="media d-flex">
                    <div class="media-body flex-grow-1">
                        <p class="noti-details"><span class="noti-title">` + data.title + `</span></p>
                        <p class="noti-time"><span class="notification-time">` + data.content + `</span></p>
                        <p class="noti-time"><span class="notification-time">about a minute ago</span></p>
                    </div>
                </div>
          </li>
        `;
        notifications.html(newNotificationHtml + existingNotifications);
        notificationsCount += 1;
        notificationsCountElem.attr('data-count', notificationsCount);
        notificationsWrapper.find('#notif-count').text(notificationsCount);
        notificationsWrapper.show();
    });
</script>
