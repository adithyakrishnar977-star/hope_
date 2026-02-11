

 <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="images/logo.svg" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-4">
                        <li class="nav-item">
                            @if (auth()->user()->role == 'therapist')
                        <a class="nav-link active" aria-current="page" href="{{ route('therapist.dashboard') }}">Dashboard</a>
                        @elseif (auth()->user()->role == 'patient')
                            <a class="nav-link active" aria-current="page" href="{{ route('patient.dashboard') }}">Dashboard</a>
                         @elseif (auth()->user()->role == 'admin')
                            <a class="nav-link active" aria-current="page" href="{{ route('admin.dashboard') }}">Dashboard</a>
                        @endif
                        </li>
                        <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Patient</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Therapist</a>
                        </li> -->
                    </ul>
                    <div class="d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="profimg">
                                <a href="{{route('profile.edit')}}">
                                    <img src="{{ auth()->user()->pfp
                                        ? asset('storage/' . auth()->user()->pfp)
                                        : asset('images/20180125_001_1_.jpg') }}"
                                    alt="Profile Picture" alt="">
                                </a>
                            </div>
                            <span>{{ auth()->user()->name }}</span>
                        </div>
                        <div>
                             <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                
                                </x-responsive-nav-link>
                                <button class="btn logout"><img src="images/Log out.svg" alt=""></button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </nav>  
    </header>