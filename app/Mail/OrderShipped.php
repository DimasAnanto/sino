namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thank You for Your Order', // Set the email subject
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.order_thank_you', // Specify the Blade view for the email content
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
