<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewOrderNotification extends Notification
{
    use Queueable;

    public function __construct(public Order $order)
    {
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Order Created: ' . $this->order->order_number)
            ->line('A new order has been created.')
            ->line('Order Number: ' . $this->order->order_number)
            ->line('Customer: ' . $this->order->customer->name)
            ->line('Amount: ₹' . number_format($this->order->amount, 2))
            ->line('Status: ' . ucfirst($this->order->status))
            ->action('View Order', url('/orders/' . $this->order->id))
            ->line('Thank you for using ImpactGuru CRM!');
    }
}