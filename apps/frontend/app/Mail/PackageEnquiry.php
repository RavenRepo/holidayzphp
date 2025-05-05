<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PackageEnquiry extends Mailable
{
    use Queueable, SerializesModels;

    public $enquiry;

    /**
     * Create a new message instance.
     *
     * @param  array  $enquiry
     * @return void
     */
    public function __construct(array $enquiry)
    {
        $this->enquiry = $enquiry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.package-enquiry')
                    ->subject('New Package Enquiry: ' . $this->enquiry['package'])
                    ->with([
                        'enquiry' => $this->enquiry
                    ]);
    }
}
