<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewAccount extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * User's email.
     *
     * @var string
     */
    private $email;

    /**
     * Users's password.
     *
     * @var string
     */
    private $password;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
                    ->subject('Votre compte Notaprof !')
                    ->greeting('Bienvenue,')
                    ->line("Votre compte Notaprof vient d'être créée !")
                    ->line('Vous trouverez ci-dessous les informations de connexion pour votre compte:')
                    ->line('Identifiant: '.$this->email)
                    ->line('Mot de passe (temporaire): '.$this->password)
                    ->action('Me connecter', route('login'))
                    ->line('À vos notes, prêt, partez !');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
