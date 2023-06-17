<x-app-layout>
    @include('layouts.navigation')

    <div class="text-4xl font-bold bg-neutral-300 p-10 lg:p-16">Our Store</div>

    <div class="max-w-screen-2xl m-auto">
        <div class="px-5 py-1 lg:px-24 my-16">


            <div class="w-full overflow-hidden">
                <div class="w-full lg:w-[22%] float-left py-4 px-5 border-2 m-2">
                    <div class="text-blue-500 font-bold">Genres</div>
                    <div class="py-5">
                        <a class="hover:text-blue-600" href="{{ route('store', 'all') }}">All</a> /
                        @foreach ($genres as $genre)
                            <a class="hover:text-blue-600" href="{{ route('store', $genre->genre) }}">{{ $genre->genre }}</a> / 
                        @endforeach
                    </div>
                </div>
                <div class="w-full lg:w-[73%] float-left m-2 border-[1px]">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 p-3">
                        @foreach ($books as $book)
                            <div class="border-[1px] flex flex-col justify-center items-center hover:shadow-lg">
                                <a href="{{ route('product', $book->id) }}">
                                    <div>
                                        <img class="h-40" src="{{ asset('/assets/images/book/' . $book->image) }}" alt="">
                                    </div>
                                    <div class="py-5 text-center">
                                        <div>
                                            <h1 class="font-bold">{{ $book->title }}</h1>
                                        </div>
                                        <div class="text-slate-500">
                                            $ {{ $book->price }}
                                        </div>
                                    </div>
                                </a>
                                <form class="w-full" action="{{ route('product', $book->id) }}" method="post">
                                    @csrf
                                    <div class="pl-4">
                                        Quantity: <input class="w-12" type="number" name="qty" id="" value="1" min="1">
                                    </div>
                                    <input class="w-full bg-green-700 text-white my-2 p-3 cursor-pointer" type="submit" value="Add to cart">
                                </form>
                            </div>
                        @endforeach
                    </div>
                    <div class="p-4">
                        {{ $books->links() }}
                    </div>
                </div>
            </div>


        </div>
    </div>


    {{-- footer --}}
    @include('layouts.footer');
</x-app-layout>
