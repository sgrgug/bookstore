<x-app-layout>

    <div class="max-w-screen-2xl m-auto">
        <div class="px-5 py-1 lg:px-24 my-16">



            <div class="w-full">
                <div class="w-full lg:w-[72%] float-left bg-red-200 m-2">
                    @foreach ($data as $item)
                        {{ $item->name }}
                    @endforeach
                </div>
                <div class="w-full lg:w-[22%] float-left bg-red-200 m-2">
                    2
                </div>
            </div>


            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>

        </div>
    </div>


    {{-- footer --}}
    @include('layouts.footer');
</x-app-layout>
