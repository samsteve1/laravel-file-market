<?php

namespace App\Mail\File;

use App\Models\{File, User};
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdatedFileRejected extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $_file;
    public $_user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(File $file)
    {
        $this->_file =$file;
        $this->_user = $file->user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Chnages to file rejected")->markdown('emails.file.updated.filerejected');
    }
}
