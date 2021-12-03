<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PinjamMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
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
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $tanggal=Carbon::now()->format('d F Y');
        return $this->subject('Pinjam Buku')
                    ->from('perpustakaan@sekolah.ac.id','Perpustakaan')
                    ->view('emails.pinjam')
                    ->with(
                        [
                            'student' => $this->student,
                            'listBuku' => $this->listBuku,
                            'tanggal' => $tanggal
                        ]
                        );
    }
}
