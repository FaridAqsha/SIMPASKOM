<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ValidasiPengetahuanNotif extends Notification
{
    use Queueable;
    protected $pelatihan;
    protected $serkom;
    protected $message;
    protected $time;

    /**
     * Create a new notification instance.
     */
    public function __construct($message, $pelatihan, $serkom, $time)
    {
        $this->pelatihan = $pelatihan;
        $this->serkom = $serkom;
        $this->message = $message;
        $this->time = $time;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => $this->message,
            'time' => $this->time,

            'pbidang' => $this->pelatihan->bidang,
            'pusers' => $this->pelatihan->id_pengguna,
            'pelatihan_id' => $this->pelatihan->id,

            'swaktu' => $this->serkom->waktu,
            'susers' => $this->serkom->id_pengguna,
            'serkom_id' => $this->serkom->id,

        ];
    }
}