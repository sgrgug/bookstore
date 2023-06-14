<x-app-layout>


    <div class="max-w-screen-2xl m-auto">
        <div class="px-5 py-1 lg:px-24 my-16">


            @if (session()->has('status'))
                <div class="bg-green-500 text-lg text-white px-7 py-3">{{ session('status') }}</div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 bg-slate-100">
                <div class="m-auto">
                    <img class="h-96" src="{{ asset('/assets/images/book/' . $book->image) }}" alt="">
                </div>
                <div class="px-7 py-14 md:py-10 md:px-20 border-l-2">
                    <span class="text-slate-500">{{ $book_genre->genre }}</span>
                    <h1 class="text-3xl font-bold">{{ $book->title }}</h1>
                    <span class="font-bold text-xl inline-block py-3">${{ $book->price }}</span><br />
                    
                    <div class="py-4">
                        <div class="inline-block font-bold italic px-3">
                            {{ $book->author }}({{ $book->publication_year }})
                        </div>
                        <div class="inline-block px-3">
                            {{ $book->rating }} Rating
                        </div>
                    </div>
                    
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit quibusdam itaque quidem, corrupti eos minima impedit non. Reiciendis amet nesciunt aut illo voluptatum ut impedit, iure itaque sit sed nostrum a id ullam distinctio dolorum quae laborum atque. Adipisci ad qui quam nobis modi minus accusamus voluptatibus quasi ipsum ipsam.</p>
                    <div class="mt-4 font-bold">Quantity</div>
                    <form action="{{ route('product', $book->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="price" value="{{ $book->price }}">
                        <input class="w-14" type="number" name="qty" id="" value="1" min="1"><br />
                        <input class="w-full bg-green-700 text-white my-2 p-3 cursor-pointer" type="submit" value="Add to cart">
                    </form>
                </div>
            </div>


        </div>
    </div>


    {{-- footer --}}
    @include('layouts.footer');
</x-app-layout>
