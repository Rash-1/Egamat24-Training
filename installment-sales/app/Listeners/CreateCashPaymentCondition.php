<?php

namespace App\Listeners;

use App\Events\ProviderRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\PaymentCondition;

class CreateCashPaymentCondition
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param ProviderRegistered $event
     * @return void
     */
    public function handle(ProviderRegistered $event)
    {
        $cash_payment_condition = [
            'provider_id' => $event->provider->id,
            'total_increase_in_percentage'=>0,
            'number_of_instalments'=>0,
            'duration_of_each_instalment'=>0,
            'description' => 'Cash',
            'is_default'=>true,
        ];
        PaymentCondition::create($cash_payment_condition);
    }
}
