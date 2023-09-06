<?php

$to = 'anshulsood27@gmail.com';
$headers = 'From: anshul.sood@juit.ac.in' . "\r\n" .
$headers = "MIME-Version: 1.0" . "\r\n" .
$headers = "Content-type:text/html;charset=iso-8859-1" . "\r\n" .
            'Reply-To: anshul.sood@juit.ac.in' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();
$subject = "Confirmation For Request";
$message = '<html>
                <body>
                    <p>Hi </p>
                    <p>
                        We recieved below details from you. Please use given Request/Ticket ID for future follow up:
                    </p>
                    <p>
                        Your Request/Ticket ID:
                    </p>
                    <p>
                    Thanks,<br>
                     Team.
                    </p>
                </body>
            </html>';
			ini_set('sendmail_from', 'anshul.sood@juit.ac.in');
ini_set('SMTP','juit.ac.in');
ini_set('smtp_port',25);
if (mail($to, $subject, $message, $headers)) {
    echo("<p>Message successfully sent!</p>");
} else {
    echo("<p>Message delivery failed...</p>");
}
?>