{{-- Top header --}}
<div class="hidden lg:block max-w-screen-2xl m-auto">
    <div class="flex justify-between items-center border-b-[1px] p-1">
        <div class="px-24">
            <a class="px-3" href="#">English</a>
            <a class="px-3" href="#">NPR</a>
        </div>
        <div class="px-24">
            <a class="px-3" href="#">Email</a>
            <a class="px-3" href="#">Call Us</a>
        </div>
    </div>
</div>

{{-- Header --}}
<div class="max-w-screen-2xl m-auto">
    <div class="flex justify-between items-center shadow-sm py-4 px-3 lg:px-24">
        <div class="lg:hidden">
            <ion-icon class="text-2xl" name="menu-outline"></ion-icon>
        </div>
        <div>
            <a href="/"><x-application-logo/></a>
        </div>
        <div class="hidden lg:block bg-blue-700">
            <form action="{{ route('search') }}" method="get">
                <div class="flex justify-center items-center">
                    <input class="w-96 p-4 border-slate-300" type="text" placeholder="Search" name="search">
                    <button><ion-icon class="text-2xl p-3 text-white cursor-pointer" name="search-outline"></ion-icon></button>
                </div>
            </form>
        </div>
        <div class="flex justify-center items-center">
            <ion-icon class="text-2xl lg:hidden" name="search-outline"></ion-icon>
            <div class="hidden lg:flex lg:justify-center lg:items-center space-x-2 px-6">

                @if (Auth::check())
                    <div>
                        {{ auth()->user()->name }}
                    </div>
                    <div> | </div>
                    <div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                    </div>
                @else
                    <div>
                        Login
                    </div>
                    <div>
                        |
                    </div>
                    <div>
                        Register
                    </div>
                @endif
            </div>
            <a href="{{ route('my_cart') }}">
                <div class="relative">
                    <ion-icon class="text-2xl" name="cart-outline"></ion-icon>
                    @if (Auth::check())
                        <div class="absolute -top-2 -right-2 z-10 bg-red-400 text-sm px-1 rounded text-white">
                            {{ App\Models\MyCart::where('user_id', auth()->user()->id)->count()  }}
                        </div>
                    @else
                        {{-- show nothing --}}
                    @endif
                </div>
            </a>
        </div>
    </div>
</div>