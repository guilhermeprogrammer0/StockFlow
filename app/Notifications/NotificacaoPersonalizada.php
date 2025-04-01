<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotificacaoPersonalizada extends Notification
{
    use Queueable;

    public $token;

    /**
     * Cria uma nova instância de notificação.
     *
     * @param string $token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Obter os canais de entrega da notificação.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Obter a representação da notificação por e-mail.
     */
    public function toMail(object $notifiable): MailMessage
    {
        // Usando o $notifiable->name para personalizar a saudação
        return (new MailMessage)
        ->subject('Redefinição de Senha')
        ->greeting('Olá, ' . $notifiable->name . '!') // Personalizando o cumprimento
        ->line('Recebemos uma solicitação para redefinir sua senha.')
        ->action('Redefinir Senha', url(route('password.reset', $this->token, false)))
        ->line('Se você não fez essa solicitação, pode ignorar este e-mail.')
        ->line('Este link de redefinição de senha expirará em 60 minutos.')
        ->line('Atenciosamente, ' . config('app.name'));
    }

    /**
     * Obter a representação da notificação como um array.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            // Aqui, você pode adicionar dados extras, se necessário.
        ];
    }
}
