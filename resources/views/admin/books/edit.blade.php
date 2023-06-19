<x-app-layout>

    <div class="flex">

        @include('admin.include.sidebar')



        <div class="w-full h-screen px-4 py-2 bg-gray-200 lg:w-full">
            <div class="container mx-auto">
                <div class="">
                    
                    @if (session()->has('status'))
                        <div class="bg-green-500 text-white p-2 my-1 shadow-sm rounded-md font-bold">{{ session('status') }}</div>
                    @endif
                    <div class="px-7 py-6 bg-white rounded-md shadow-md">
                        <h1 class="font-bold text-2xl">Add New Book</h1>
                        <div>
                            <form action="{{ route('books.update', $book->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="grid grid-cols-1 md:grid-cols-2">
                                    <div class="py-3">
                                        @error('book_title')
                                            <div class="text-red-400">{{ $message }}</div>
                                        @enderror
                                        <label class="" for="">Book Title:</label><br>
                                        <input class="w-1/3" type="text" name="book_title" placeholder="Book Title" value="{{ $book->title }}">
                                    </div>
                                    <div class="py-3">
                                        @error('book_author')
                                            <div class="text-red-400">{{ $message }}</div>
                                        @enderror
                                        <label class="" for="">Book Author:</label><br>
                                        <input class="w-1/3" type="text" name="book_author" placeholder="Book Author" value="{{ $book->author }}">
                                    </div>
                                    <div class="py-3">
                                        @error('p_year')
                                            <div class="text-red-400">{{ $message }}</div>
                                        @enderror
                                        <label class="" for="">Publication Year:</label><br>
                                        <input class="w-1/3" type="number" name="p_year" placeholder="Publication Year" min='0' value="{{ $book->publication_year }}">
                                    </div>
                                    <div class="py-3">
                                        @error('rating')
                                            <div class="text-red-400">{{ $message }}</div>
                                        @enderror
                                        <label class="" for="">Rating:</label><br>
                                        <input class="w-1/3" type="number" name="rating" min="0" max="5" placeholder="Rating" value="{{ $book->rating }}">
                                    </div>
                                    <div class="py-3">
                                        @error('price')
                                            <div class="text-red-400">{{ $message }}</div>
                                        @enderror
                                        <label class="" for="">Price:</label><br>
                                        <input class="w-1/3" type="number" name="price" min="0" placeholder="$ Price" value="{{ $book->price }}">
                                    </div>
                                    <div>
                                        <label class="" for="">Genre:</label><br>
                                        <select name="genre" id=""">
                                            @foreach ($genres as $genre)
                                                <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
    
                                    <div class="py-3">
                                        <label class="" for="">Book Image:</label><br>
                                        <input type="file" name="book_image" id="">
                                    </div>
                                    <img class="h-40" src="{{ asset('/assets/images/book/' . $book->image) }}" alt="">
                                </div>

                                <input class="my-4 bg-blue-500 text-white px-6 py-2 cursor-pointer shadow-sm rounded-md text-xl" type="submit" value="Add">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</x-app-layout>