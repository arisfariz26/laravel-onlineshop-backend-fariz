<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class OrderController extends Controller
{
    //index
    public function index(Request $request)
    {
        //get orders paginate 10
        $orders = Order::latest()->get();


        return view('pages.order.index', compact('orders'));
    }

    //show
    public function show($id)
    {
        return abort(404);
    }

    //edit
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('pages.order.edit', compact('order'));
    }

    //update
    public function update(Request $request, $id)
    {
        //update status order
        $order =  Order::findOrFail($id);
        $order->update([
            'status' => $request->status,
            'shipping_resi' => $request->shipping_resi,
        ]);

         //send notification to user
         if ($request->status == 'on_delivery') {
            $this->sendNotificationToUser($order->first()->user_id, 'Paket Dikirim dengan nomor resi ' . $request->shipping_resi);
        }

        //redirect to index
        return redirect()->route('order.index')->with([
            'message' => 'Data Berhasil Diedit!',
        'alert-type' => 'success'
    ]);
    }

    public function sendNotificationToUser($userId, $message)
    {
        // Dapatkan FCM token user dari tabel 'users'

        $user = User::find($userId);
        $token = $user->fcm_id;

        // Kirim notifikasi ke perangkat Android
        $messaging = app('firebase.messaging');
        $notification = Notification::create('Paket Dikirim', $message);

        $message = CloudMessage::withTarget('token', $token)
            ->withNotification($notification);

        $messaging->send($message);
    }
}
