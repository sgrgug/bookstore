<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyCart;
use App\Models\Order;
use Illuminate\Support\Str;
use Carbon\Carbon;

require '../vendor/autoload.php';
use Cixware\Esewa\Client;
use Cixware\Esewa\Config;

class EsewaController extends Controller
{
    public function esewaPay(Request $request)
    {
        $mycart = MyCart::where('user_id', auth()->user()->id)->get();



        //creating unique id for delivery proccess id
        //get last number of order table id and add 1
        $unique_id = Order::max('id') + 1;
        $unique_id_gen_by_php = uniqid();
        $f_uniqid = $unique_id . $unique_id_gen_by_php;


        foreach ($mycart as $item) {
            Order::create([
                'user_id' => $item->user_id,
                'book_id' => $item->book_id,
                'book_name' => $item->book_name,
                'photo' => $item->photo,
                'quantity' => $item->quantity,
                'price' => $item->price,
                'total' => $item->total,
                'payment' => 'esewa',
                'esewa_status' => 'unverified',
                'pid' => $f_uniqid,
            ]);
        }



        // //total amt
        $mycarts_total_amt = MyCart::where('user_id', auth()->user()->id)->sum('total');

        // set success and failure callback urls
        $successUrl = url('/success');
        $failureUrl = url('/failure');

        // config for development
        $config = new Config($successUrl, $failureUrl);


        // initialize eSewa client
        $esewa = new Client($config);

        $esewa->process($f_uniqid, $mycarts_total_amt, 0, 0, 0);
    }

    public function esewaPaySuccess()
    {
        // echo 'success';

        $pid = $_GET['oid'];
        $refId = $_GET['refId'];
        $amount = $_GET['amt'];

        $order = Order::where('pid', $pid)->get();
        
        foreach ($order as $key => $value) {
            //dd($order);
            $update_status = Order::find($value->id)->update([
                'esewa_status' => 'verified',
                'updated_at' => Carbon::now(),
            ]);
        }


        $my_cart = MyCart::where('user_id', auth()->user()->id);

        $my_cart->delete();

        if ($update_status) {
            
            return redirect()->route('my_cart')->with('status', 'Payment Success');
        }
    }
    public function esewaPayFailure()
    {
        //do when payment fails.
        $pid = $_GET['pid'];
        $order = Order::where('pid', $pid)->get();

        foreach ($order as $key => $value) {
            //dd($order);
            $update_status = Order::find($value->id)->update([
                'esewa_status' => 'failed',
                'updated_at' => Carbon::now(),
            ]);
        }


        if ($update_status) {

            
            return redirect()->route('my_cart')->with('status', 'Payment Failed');
        }
    }
}
