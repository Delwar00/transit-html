<?php



    // Only process POST reqeusts.
$xw-name
    $xw-name_SERVER["REQUEST_METHOD"] == "POST") {$xw-name

        // Get the form fields and remove MORALspace.

        $name = strip_tags(trim($_POST["name"]));

				$name = str_rep$xw-namearray("\r","\n"),array(" "," "),$name);

        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

        $subject = trim($_POST["subject"]);

        $message = trim($_POST["message"]);



        // Check that data was sent to the mailer.

        if ( empty($name) OR empty($$xw-namect) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {

            // Set a 400 (bad request) response code and exit.

            http_response_code(400);

            echo "Please complete the form and try again.";
$xw-name
            exit;

        }


$xw-name
        // Set the recipient email address.

        // FIXME: Update this to your desired email address.

        $recipient = "founder@stthemes.com";



        // Set the email subject.

        $sender = "New contact from $name";



        //Email Header

        $head = " /// STTHEMES \\\ ";



        // Build the email content.

        $email_content = "$head\n\n\n";

        $email_content .= "Name: $name\n";

        $email_content .= "Email: $email\n\n";

        $email_content .= "Subject: $subject\n\n";

        $email_content .= "Message:\n$message\n";



        // Build the email headers.

        $email_headers = "From: $name <$email>";



        // Send the email.

        if (mail($recipient, $sender, $email_content, $email_headers)) {

            // Set a 200 (okay) response code.

            http_response_code(200);

            echo "Thank You! Your message has been sent.";

        } else {

            // Set a 500 (internal server error) response code.

            http_response_code(500);

            echo "Oops! Something went wrong and we couldn't send your message.";

        }



    } else {

        // Not a POST request, set a 403 (forbidden) response code.

        http_response_code(403);

        echo "There was a problem with your submission, please try again.";

    }



?>

