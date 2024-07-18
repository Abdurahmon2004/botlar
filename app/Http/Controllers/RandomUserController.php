<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;
class RandomUserController extends Controller
{
    public function webhook(Request $request)
    {
        $update = Telegram::getWebhookUpdates();

        $chatId = $update['message']['chat']['id'];
        $text = $update['message']['text'];

        if ($update->isType('callback_query')) {
            $callbackQuery = $update->getCallbackQuery();
            $data = $callbackQuery->getData();
            switch ($data) {
                case 'start_bot':
                    // $this->sendSubscriptionMessage($chatId);
                    break;
                // case 'check_membership':
                //     $this->checkMembership($chatId);
                //     break;
                // case 'participate_quiz':
                //     $this->sendQuizMessage($chatId);
                //     break;
                // case 'get_referral_code':
                //     $this->sendReferralCode($chatId);
                //     break;
                // case 'check_referral_points':
                //     $this->sendReferralPoints($chatId);
                //     break;
            }
        } else {
            switch ($text) {
                case '/start':
                    $this->sendWelcomeMessage($chatId);
                    break;
                // Boshqa komandalarga mos keladigan kodlarni qo'shing
            }
        }
    }
    protected function sendWelcomeMessage($chatId){
        Telegram::sendMessage([
            'chat_id' => $chatId,
            'text' => "Salom! Botdan foydalanish uchun 'Botni ishga tushurish' tugmasini bosing.",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [['text' => 'Botni ishga tushurish', 'callback_data' => 'start_bot']],
                ]
            ])
        ]);
    }
}
