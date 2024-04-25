<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">

                </div>
                <ul class="navbar-nav header-right">



                    <li class="nav-item dropdown notification_dropdown">
                        <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M23.3333 19.8333H23.1187C23.2568 19.4597 23.3295 19.065 23.3333 18.6666V12.8333C23.3294 10.7663 22.6402 8.75902 21.3735 7.12565C20.1068 5.49228 18.3343 4.32508 16.3333 3.80679V3.49996C16.3333 2.88112 16.0875 2.28763 15.6499 1.85004C15.2123 1.41246 14.6188 1.16663 14 1.16663C13.3812 1.16663 12.7877 1.41246 12.3501 1.85004C11.9125 2.28763 11.6667 2.88112 11.6667 3.49996V3.80679C9.66574 4.32508 7.89317 5.49228 6.6265 7.12565C5.35983 8.75902 4.67058 10.7663 4.66667 12.8333V18.6666C4.67053 19.065 4.74316 19.4597 4.88133 19.8333H4.66667C4.35725 19.8333 4.0605 19.9562 3.84171 20.175C3.62292 20.3938 3.5 20.6905 3.5 21C3.5 21.3094 3.62292 21.6061 3.84171 21.8249C4.0605 22.0437 4.35725 22.1666 4.66667 22.1666H23.3333C23.6428 22.1666 23.9395 22.0437 24.1583 21.8249C24.3771 21.6061 24.5 21.3094 24.5 21C24.5 20.6905 24.3771 20.3938 24.1583 20.175C23.9395 19.9562 23.6428 19.8333 23.3333 19.8333Z" fill="#717579"/>
                                <path d="M9.9819 24.5C10.3863 25.2088 10.971 25.7981 11.6766 26.2079C12.3823 26.6178 13.1838 26.8337 13.9999 26.8337C14.816 26.8337 15.6175 26.6178 16.3232 26.2079C17.0288 25.7981 17.6135 25.2088 18.0179 24.5H9.9819Z" fill="#717579"/>
                            </svg>
                            <span class="badge light text-white bg-warning rounded-circle" style="font-size: 0.6em; padding: 0.2em 0.4em; margin-left: -9px;" id="countNotifications">{{ Auth::check() ? Auth::user()->unreadNotifications->whereNotIn('type', ['App\Notifications\LikedDBNotify', 'App\Notifications\FollowDBNotify', 'App\Notifications\MessageDBNotify'])->count() : 0 }}
                            </span>                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div id="DZ_W_Notification1" class="widget-media dlab-scroll p-3" style="height:380px;">
                                <ul class="timeline" style="max-height: 200px; overflow-y: auto;">
                                    <div id="unreadNotifications">
                                    @foreach(Auth::user()->unreadNotifications as $notification)
                                    @if ($notification->type !== 'App\Notifications\LikedDBNotify' && $notification->type !== 'App\Notifications\FollowDBNotify' && $notification->type !== 'App\Notifications\MessageDBNotify'  )
                                    <li>
                                        <div class="timeline-panel">
                                            <div class="media me-2">
                                                @if(isset($notification->data['image']))
                                                <img alt="image" width="50" src="{{ asset('images/profile/' . $notification->data['image']) }}" />
                                                @endif
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mb-1">{{ $notification->data['user'] }} {{ $notification->data['title'] }}</h6>
                                                <small class="d-block">{{ $notification->created_at->format('d F Y - H:i A') }}</small>

                                                @if ($notification->data['operation'] == 'create' || $notification->data['operation'] == 'update' || $notification->data['operation'] == 'delete')

                                                    <a href="{{ route('ListSecteur') }}" >Voir les secteurs</a>
                                                    <a href="{{ route('markAsReadId', $notification->id) }}" class="btn btn-link" >
                                                        Marquer comme lu
                                                    </a>
                                                @elseif ($notification->data['operation'] == 'deleteFondateur')
                                                    <a href="{{ route('ListFondateur') }}">Voir les fondateurs</a>
                                                    <a href="{{ route('markAsReadId', $notification->id) }}" class="btn btn-link">
                                                        Marquer comme lu>>
                                                    </a>
                                                @elseif ($notification->data['operation'] == 'deleteInvestisseur')
                                                    <a href="{{ route('ListInvestisseur') }}">Voir les investisseurs</a>
                                                    <a href="{{ route('markAsReadId', $notification->id) }}" class="btn btn-link" >
                                                        Marquer comme lu
                                                    </a>
                                                @elseif($notification->data['operation'] == 'deleteStartup')
                                                    <a href="{{ route('ListStartup') }}">Voir les startup</a>
                                                    <a href="{{ route('markAsReadId', $notification->id) }}" class="btn btn-link" >
                                                        Marquer comme lu
                                                    </a>
                                                @endif


                                            </div>
                                        </div>
                                    </li>
                                    @endif

                                    @endforeach
                                    </div>
                                </ul>
                            </div>
                            <a class="all-notification" href="{{route('MarkAsRead_all')}}">Efface toutes les notifications <i class="ti-arrow-end"></i></a>
                        </div>
                    </li>



                    <li class="nav-item dropdown notification_dropdown">
                          <a class="nav-link bell dz-fullscreen"  href="javascript:void(0);">
                             <svg id="icon-full" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3" style="stroke-dasharray: 37, 57; stroke-dashoffset: 0;"></path></svg>
                             <svg id="icon-minimize" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="A098AE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize"><path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3" style="stroke-dasharray: 37, 57; stroke-dashoffset: 0;"></path></svg>
                          </a>
                    </li>
                    <li class="nav-item ps-3">
                        <div class="dropdown header-profile2">


                            <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="header-info2 d-flex align-items-center">
                                    <div class="header-media">
                                    @if(Auth::user()->image)
    <img src="{{ asset('images/profile/'.Auth::user()->image) }}" style="width:30px; height:30px;">
@else
    <img src="{{ asset('images/avatar/1.png') }}" style="width:30px; height:30px;">
@endif



                                    </div>
                                    <div class="header-info">
                                        <h6>{{ Auth::user()->name }}
                                        </h6>
                                    </div>

                                </div>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" >

                                <div class="card border-0 mb-0">
                                    <div class="card-header py-2">
                                        <div class="products">
                                        @if(Auth::user()->image)
                                        <img src="{{ asset('images/profile/' . Auth::user()->image) }}" style="width:30px; height:30px;">
                                            @endif
                                            <div>
                                                <h6>{{ Auth::user()->email }}
                                                </h6>
                                                <span>Administrateur</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body px-0 py-2">
                                        <a href="{{route('profile')}}" class="dropdown-item ai-icon ">
                                            <svg  width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9848 15.3462C8.11714 15.3462 4.81429 15.931 4.81429 18.2729C4.81429 20.6148 8.09619 21.2205 11.9848 21.2205C15.8524 21.2205 19.1543 20.6348 19.1543 18.2938C19.1543 15.9529 15.8733 15.3462 11.9848 15.3462Z" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9848 12.0059C14.5229 12.0059 16.58 9.94779 16.58 7.40969C16.58 4.8716 14.5229 2.81445 11.9848 2.81445C9.44667 2.81445 7.38857 4.8716 7.38857 7.40969C7.38 9.93922 9.42381 11.9973 11.9524 12.0059H11.9848Z" stroke="var(--primary)" stroke-width="1.42857" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>

                                            <span class="ms-2">Profile </span>
                                        </a>

                                    </div>
                                    <div class="card-footer px-0 py-2">
                                        <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();" class="dropdown-item ai-icon">
                                            <svg class="profle-logout" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ff7979" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                            <span class="ms-2 text-danger"> {{ __('Logout') }} </span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
@section('scripts')
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>

  Pusher.logToConsole = true;

  var pusher = new Pusher('b0c3e7977d6e00a166ef', {
    cluster: 'eu'
  });

  var channel = pusher.subscribe('my-channel');
  channel.bind('my-event', function(data) {
    alert(JSON.stringify(data));
  });
</script>
@endsection
