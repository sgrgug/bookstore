<x-app-layout>


    <div class="max-w-screen-2xl m-auto px-5 py-1 lg:px-24 object-cover">
        <img src="{{ asset('/assets/images/slider.jpg') }}" alt="">
    </div>


    <div class="max-w-screen-2xl m-auto">
        <div class="px-5 py-1 lg:px-24 my-16">
            <h1 class="text-2xl font-bold my-4">Popular Book</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
                @foreach ($pop_books as $book)
                    <a href="{{ route('product', $book->id) }}">
                        <div class="border-[1px] flex flex-col justify-center items-center hover:shadow-lg">
                            <div>
                                <img class="h-40" src="{{ asset('/assets/images/book/' . $book->image) }}" alt="">
                            </div>
                            <div class="py-5">
                                <div>
                                    <h1 class="font-bold">{{ $book->title }}</h1>
                                </div>
                                <div class="text-slate-500">
                                    $ {{ $book->price }}
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

        </div>
    </div>

    <div class="max-w-screen-2xl m-auto">
        <div class="px-5 py-1 lg:px-24 my-16">
            <h1 class="text-2xl font-bold my-4">New Book</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
                @foreach ($new_books as $book)
                    <a href="{{ route('product', $book->id) }}">
                        <div class="border-[1px] flex flex-col justify-center items-center hover:shadow-lg">
                            <div>
                                <img class="h-40" src="{{ asset('/assets/images/book/' . $book->image) }}" alt="">
                            </div>
                            <div class="py-5">
                                <div>
                                    <h1 class="font-bold">{{ $book->title }}</h1>
                                </div>
                                <div class="text-slate-500">
                                    $ {{ $book->price }}
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

        </div>
    </div>


    {{-- footer --}}
    @include('layouts.footer');
</x-app-layout>
