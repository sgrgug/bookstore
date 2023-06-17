<x-app-layout>
    @include('layouts.navigation')

    <div class="text-xl font-bold bg-neutral-300 p-7 lg:p-12">Your Search: {{ $search }}</div>

    <div class="max-w-screen-2xl m-auto">
        <div class="px-5 py-1 lg:px-24 my-16">


            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 p-3">
                @foreach ($results as $item)
                    <div class="border-[1px] flex flex-col justify-center items-center hover:shadow-lg">
                        <a href="{{ route('product', $item->id) }}">
                            <div>
                                <img class="h-40" src="{{ asset('/assets/images/book/' . $item->image) }}" alt="">
                            </div>
                            <div class="py-5 text-center">
                                <div>
                                    <h1 class="font-bold">{{ $item->title }}</h1>
                                </div>
                                <div class="text-slate-500">
                                    $ {{ $item->price }}
                                </div>
                            </div>
                        </a>
                        <form class="w-full" action="{{ route('product', $item->id) }}" method="post">
                            @csrf
                            <div class="pl-4">
                                Quantity: <input class="w-12" type="number" name="qty" id="" value="1" min="1">
                            </div>
                            <input class="w-full bg-green-700 text-white my-2 p-3 cursor-pointer" type="submit" value="Add to cart">
                        </form>
                    </div>
                @endforeach

            </div>
            {{ $results->links() }}

        </div>
    </div>


    {{-- footer --}}
    @include('layouts.footer');
</x-app-layout>
