<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;

class NotifBukuPinjam extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $listBuku;
    protected $student;
    public function __construct($inputStudent, $inputListBuku)
    {
        $this->student = $inputStudent;
        $this->listBuku = $inputListBuku;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail' , 'database'];
    }

    public function toDatabase($notifiable)
    {
        //ini akan masuk kedalma database dikolom notification
        return [
            "student" => $this->student,
            "listbuku" => $this->listBuku,
        ];

    }
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // return (new MailMessage)
        //             ->line('The introduction to the notification.')
        //             ->action('Notification Action', url('/'))
        //             ->line('Thank you for using our application!');
        $tanggal=Carbon::now()->format('d F Y');
        return (new MailMessage)
                    ->subject('Notifikasi Buku Telah Dipinjam oleh Anda')
                    ->from('perpustakaan@sekolah.ac.id','Perpustakaan')
                    ->view('emails.pinjam',[
                        "student" => $this->student,
                        "listBuku" => $this->listBuku,
                        "tanggal" => $tanggal
                    ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
