{{-- <script>
    function Mudarestado(el) {
        var display = document.getElementById(el).style.display;
        if(display == "block")
            document.getElementById(el).style.display = 'none';
        else
            document.getElementById(el).style.display = 'block';
    }
</script> --}}
@if(Auth::user()->role_id == 1)
    <link href="{{asset('css/user.css')}}" rel="stylesheet">
@endif
<body style="background:rgb(250, 250, 250)">
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="pt-3 sidebar-sticky" style="background: lightgray;">
              <br>
                <div class="nav flex-column" style="text-shadow: 1px 1px #000105">

                    <span class="nav-item">
                        <a class="nav-link @if(request()->is('manager/users*')) active @endif" href="{{route('topics.index')}}">
                            <img style="margin-left: 4%; margin-top: 8%;" src=https://cdn.jsdelivr.net/npm/bootstrap-icons/icons/house.svg width="16" height="16" alt="home">
                            <svg style="margin-left: 4%" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                                <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
                              </svg>
                        </a>
                        <hr>
                    </span>
                    <span  class="nav-item">
                    <a  class="nav-link @if (Auth::user()->role_id == 1)menuColor @endif @if(request()->is('manager/users')) active @endif" href="{{route('users.index')}}">
                        <span data-feather="file"></span>
                                USUÁRIOS
                    </a>
                    <hr>
                    </span>


                    <span   class="nav-item">
                    <a  class="nav-link  @if(Auth::user()->role_id == 1)menuColor @endif  @if(request()->is('manager/roles*')) active @endif" href="{{route('roles.index')}}">
                        <span data-feather="home "></span>
                            PAPÉIS
                        <span class="sr-only">(current)</span>
                    </a>
                    <hr>
                    </span>

                    <span   class="nav-item">
                    <a class="nav-link  @if(Auth::user()->role_id == 1) menuColor @endif  @if(request()->is('manager/resources*')) active @endif" href="{{route('resources.index')}}">
                        <span data-feather="file"></span>
                            RECURSOS
                    </a>
                    <hr>

                    </span>
                    {{-- @if((Auth::user()->role_id  ) == 1) --}}

                        {{-- @foreach ($modules as $m)
                            <h6 class="px-3 mt-4 mb-1 sidebar-heading d-flex justify-content-between align-items-center text-muted"> --}}

                                {{-- <button type="button" class="btn btn-dark dropdown-toggle" onclick="Mudarestado('minhaDiv');" style=" color: lightgray; margin-left:-5px; margin-top:-10%"> --}}
                                    {{-- {{$m['name']}} --}}
                                {{-- </button> --}}
                                {{-- </buttom> --}}

                                {{-- <a class="link-secondary" href="#" aria-label="Add a new report"> --}}
                                {{-- </a> --}}
                            {{-- </h6> --}}
                            {{-- <div id="minhaDiv" style="display:none"> --}}

                            {{-- <span style="border-bottom: 1px solid lightgray; padding-bottom: 5px;"></span> --}}
                            {{-- <br> --}}
                            {{-- @foreach ($m['resources'] as $rec) --}}
                                {{-- <span  class="nav-item"> --}}
                                    {{-- <a  class="nav-link  @if(request()->is('manager/users*')) active @endif" href="{{route($rec->resource)}}"> --}}
                                        {{-- <span data-feather="file"></span> --}}
                                        {{-- {{$rec->name}} --}}
                                    {{-- </a> --}}

                                {{-- </span> --}}

                            {{-- @endforeach --}}
                        {{-- @endforeach --}}
                    {{-- </div> --}}
                {{-- @endif --}}
                </div>
            </div>
        </nav>
</body>
