<x-app-layout>

    <div class="max-w-screen-2xl m-auto">
        <div class="px-5 py-1 lg:px-24 my-16">



            <div class="w-full overflow-hidden">
                <div class="w-full lg:w-[72%] float-left py-4 px-2 lg:px-5 border-2 m-2">
                    <span class="text-blue-500 font-bold">My Carts: </span>{{ $mycarts_no_of_items }}
                    <div class="py-3">
                        @foreach ($mycarts as $mycart)

                            <div class="grid grid-cols-6 m-1 p-2 items-center {{ $loop->odd ? 'bg-zinc-100' : 'bg-white' }}">
                                <div class="col-span-4 flex items-center">
                                    <img class="h-20 rounded" src="{{ asset('/assets/images/book/' . $mycart->photo) }}" alt="">
                                    <div class="px-4 text-sm">
                                        <div>{{ $mycart->book_name }}</div>
                                        <div><b>Quantity: </b>x{{ $mycart->quantity }}</div>
                                    </div>
                                </div>
                                <div class="col-span-1">
                                    <span class="font-bold text-sm md:text-xl">Rs. {{ $mycart->total }}.00</span>
                                </div>
                                <div class="col-span-1">
                                    <form action="{{ route('my_cart_delete', $mycart->id) }}" method="post">
                                        @csrf
                                        <input class="cursor-pointer text-center w-auto bg-red-400 p-1 rounded-md px-2 text-white" type="submit" value="X">
                                    </form>
                                </div>
                            </div>

                            @endforeach
                    </div>
                </div>
                <div class="w-full lg:w-[23%] float-left m-2 border-[1px]">
                    <div class="flex justify-between items-center p-3">
                        <div>Grand Total:</div>
                        <div class="font-bold">Rs. {{ $mycarts_total }}.00</div>
                    </div>
                    <hr class="w-[90%] m-auto">
                    <div class="py-2 px-3">
                        <div class="flex justify-center items-center">
                            <img class="h-12" src="https://p1.hiclipart.com/preview/274/863/723/visa-mastercard-logo-credit-card-financial-services-debit-card-maestro-payment-card-orange-yellow-png-clipart.jpg" alt="">
                            <img class="h-8" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpF1IqCHTpWxhp8N1xLJkHtX2dqp6jrCL3Un4wdlPxDAnl03ejI7qH8oSu7XlmnjKv930&usqp=CAU" alt="">
                        </div>
                        <div class="bg-blue-500 text-center text-white py-2 rounded-lg m-1"><a href="{{ route('store','all') }}">Continue Shopping</a></div>
                        <div class="bg-green-500 text-center text-white py-2 rounded-lg m-1"><a href="#">Pay with Esewa</a></div>
                        <div class="bg-yellow-500 text-center text-white py-2 rounded-lg m-1"><a href="#">Checkout</a></div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    {{-- footer --}}
    @include('layouts.footer');
</x-app-layout>
