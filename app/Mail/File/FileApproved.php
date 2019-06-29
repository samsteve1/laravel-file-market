<?php

namespace App\Mail\File;

use App\Models\File;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FileApproved extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $_user;
    public $_file;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(File $file)
    {
        $this->_file = $file;
        $this->_user = $file->user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Your file {$this->_file->title} has been approved!")->markdown('emails.file.new.fileapproved');
    }
}
