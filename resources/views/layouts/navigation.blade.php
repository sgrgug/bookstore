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
            <form action="" method="get">
                <div class="flex justify-center items-center">
                    <input class="w-96 p-3 border-slate-300" type="text" placeholder="Search">
                    <ion-icon class="text-2xl p-3 text-white cursor-pointer" name="search-outline"></ion-icon>
                </div>
            </form>
        </div>
        <div class="flex justify-center items-center">
            <ion-icon class="text-2xl lg:hidden" name="search-outline"></ion-icon>
            <div class="hidden lg:flex lg:justify-center lg:items-center">
                <div>
                    Login
                </div>
                <div>
                    |
                </div>
                <div>
                    Register
                </div>
            </div>
            <a href="{{ route('my_cart') }}"><ion-icon class="text-2xl" name="cart-outline"></ion-icon></a>
        </div>
    </div>
</div>