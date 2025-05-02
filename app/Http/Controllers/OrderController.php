<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class OrderController extends Controller
{
    public function save(Request $request)
    {
        $order = new Order();
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->comment = $request->comment;
        $order->save();
        $order->products()->attach($request->product_ids);
        $info = 'Новая заявка отправлено'. PHP_EOL . 'Имя: ' . $order->name . PHP_EOL . 'Телефон: ' . $order->phone;
        $products = [];

        foreach ($request->product_ids as $key => $value) {
            $products[] = 'ID: ' . Product::find($value)->id . ' Названия: ' . Product::find($value)->title;
        }

        $text = $info . PHP_EOL . $products;
        Telegram::sendMessage(
            [
                'chat_id' => '-1002295762738',
                'text' => $text,
            ]
        );
        return response()->json(['success' => true, 'message' => 'Ваш запрос успешно отправлено']);
    }
}
