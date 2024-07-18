<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;
class RandomUserController extends Controller
{
    public function webhook(Request $request)
    {
        $update = Telegram::getWebhookUpdates();
        if($update){
            $chatId = $update['message']['chat']['id'];
            $text = $update['message']['text'];
            switch ($text) {
                case '/star':
                    $this->startBot($chatId);
                    break;

                default:
                    # code...
                    break;
            }
        }
    }
    public function startBot($chatId){
        Telegram::sendMessage([
            'chat_it'=>$chatId,
            'text'=>$chatId
        ]);
    }
}
