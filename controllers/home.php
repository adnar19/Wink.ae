<?php
/**
* 
*/
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class home extends Controller
{
	
	function __construct()
	{ 
		parent::__construct();
        $this->load_model("User");
	}
	
    public function index ()
    {
		$this->view->loadview('index');
	}

    public function contact($method="else",$id=-1)
	{  
        if ($method=="add") {
			if (isset($_POST)) {

                if (!empty($_POST)) {
                    $data['name'] = $_POST["name"];
                    $data['email'] = $_POST["email"];
                    $data['subject'] = $_POST["subject"];
                    $data['message'] = $_POST["message"];
                    $result=$this->model->contact($data);
                    if ($result) {
                        $db_msg = "Your message has been sent";
                        $type_db_msg = "success";
                    } else {
                        $db_msg = "Error trying to save contact.";
                        $type_db_msg = "error";
                    }
                }
        
                // Only process POST reqeusts.
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Get the form fields and remove whitespace.
                    $name = strip_tags(trim($_POST["name"]));
                    $name = str_replace(array("\r","\n"),array(" "," "),$name);
                    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
                    $message = trim($_POST["message"]);
                    // Check that data was sent to the mailer.
                    if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        // Set a 400 (bad request) response code and exit.
                        echo "";
                        exit;
                    }
                    // Update this to your desired email address.
                    $recipient = "contact@wink.ae";
                    $subject = "Message from $name";
                    // Email content.
                    $email_content = "Name: $name\n";
                    $email_content .= "Email: $email\n\n";
                    $email_content .= "Subject: $subject\n\n";
                    $email_content .= "Message: $message\n";
                    // Email headers.
                    $email_headers = "From: $name <$email>\r\nReply-to: <$email>";
                    // Send the email.
                    if (mail($recipient, $subject, $email_content, $email_headers)) {
                        // Set a 200 (okay) response code.
                        http_response_code(200);
                        echo "Thank You! Your message has been sent.";
                        exit;
                    } else {
                        // Set a 500 (internal server error) response code.
                        http_response_code(500);
                        echo "Oops! Something went wrong and we couldn't send your message.";
                        exit;
                    }
                } else {
                    // Not a POST request, set a 403 (forbidden) response code.
                    http_response_code(403);
                    echo "";
                }

            }
            else{
                echo 'error';
            }
        }
        else
        {
            $this->view->loadview('contact');
        }
      

	  
    }

    public function termsofuse()
    {
        $this->view->loadview('termsofuse');
    }

    public function error()
    {
        $this->view->loadview('404');
    }

    public function newsletter()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
            $email = $_POST["newsletter_email"];
            $data['email']=$email;
            $ip = $this->getUserIP();
            $data['ip']=$ip;
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $id=$this->model->getNewsletterId($data);
                if($id>0) {
                    $db_msg = "Vous êtes déjà inscrit à notre Newsletter";
                    $type_db_msg = "error";
                }
                else{
                    $result=$this->model->addNewsLetter($data);
                    if ($result) {
                        $db_msg = "Vous êtes désormais abonnés à notre Newsletter";
                        $type_db_msg = "success";
                    } else {
                        
                        $db_msg = "Une erreur s'est produite. Veuillez réessayer ultérieurement";
                        $type_db_msg = "error";
                        
                    }
                }
            }
            else{
                $db_msg = "l'Adresse email n'est pas valide";
                $type_db_msg = "error";
            }  
        }
        
        echo json_encode(array('message' => $db_msg,"type_message" => $type_db_msg));
    }


    public function sendEmail()
    {
                $recipients = array();

                $recipients[] = array(
                'email' => '',
                'name' => ''
                );


                // Set the sender email address here
                $sender = array(
                'email' => 'donotreply@mywebsite.com',
                'name' => 'Company Name'
                );


                // reCaptcha Secret Key - Add this only if you use reCaptcha with your Contact Forms
                $recaptcha_secret = '';


                // PHPMailer Initialization
                $mail = new PHPMailer();

                // If you intend you use SMTP, add your SMTP Code after this Line


                // End of SMTP


                // Form Messages
                $message = array(
                'success'           => 'Thank you for your message. It has been sent.',
                'error'             => 'There was an error trying to send your message. Please try again later.',
                'error_bot'         => 'Bot Detected! Message could not be send. Please try again.',
                'error_unexpected'  => 'There was an unexpected error trying to send your message. Please try again later.',
                'recaptcha_invalid' => 'Captcha not Validated! Please Try Again.',
                'recaptcha_error'   => 'Captcha not Submitted! Please Try Again.'
                );

                // Form Processor
                if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

                $prefix    = !empty( $_POST['prefix'] ) ? $_POST['prefix'] : '';
                $submits   = $_POST;
                $botpassed = false;

                $message_form                 = !empty( $submits['message'] ) ? $submits['message'] : array();
                $message['success']           = !empty( $message_form['success'] ) ? $message_form['success'] : $message['success'];
                $message['error']             = !empty( $message_form['error'] ) ? $message_form['error'] : $message['error'];
                $message['error_bot']         = !empty( $message_form['error_bot'] ) ? $message_form['error_bot'] : $message['error_bot'];
                $message['error_unexpected']  = !empty( $message_form['error_unexpected'] ) ? $message_form['error_unexpected'] : $message['error_unexpected'];
                $message['recaptcha_invalid'] = !empty( $message_form['recaptcha_invalid'] ) ? $message_form['recaptcha_invalid'] : $message['recaptcha_invalid'];
                $message['recaptcha_error']   = !empty( $message_form['recaptcha_error'] ) ? $message_form['recaptcha_error'] : $message['recaptcha_error'];


                // Bot Protection
                if( isset( $submits[ $prefix . 'botcheck' ] ) ) {
                    $botpassed = true;
                }

                if( !empty( $submits[ $prefix . 'botcheck' ] ) ) {
                    $botpassed = false;
                }

                if( $botpassed == false ) {
                    echo '{ "alert": "error", "message": "' . $message['error_bot'] . '" }';
                    exit;
                }


                // reCaptcha
                if( isset( $submits['g-recaptcha-response'] ) ) {

                    $recaptcha_data = array(
                        'secret' => $recaptcha_secret,
                        'response' => $submits['g-recaptcha-response']
                    );

                    $rc_verify = curl_init();
                    curl_setopt( $rc_verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify" );
                    curl_setopt( $rc_verify, CURLOPT_POST, true );
                    curl_setopt( $rc_verify, CURLOPT_POSTFIELDS, http_build_query( $recaptcha_data ) );
                    curl_setopt( $rc_verify, CURLOPT_SSL_VERIFYPEER, false );
                    curl_setopt( $rc_verify, CURLOPT_RETURNTRANSFER, true );
                    $rc_response = curl_exec( $rc_verify );

                    $g_response = json_decode( $rc_response );

                    if ( $g_response->success !== true ) {
                        echo '{ "alert": "error", "message": "' . $message['recaptcha_invalid'] . '" }';
                        exit;
                    }
                }

                $html_title	= !empty( $submits['html_title'] ) ? $submits['html_title'] : 'Form Response';
                $forcerecaptcha	= ( !empty( $submits['force_recaptcha'] ) && $submits['force_recaptcha'] != 'false' ) ? true : false;
                $replyto = !empty( $submits['replyto'] ) ? explode( ',', $submits['replyto'] ) : false;

                if( $forcerecaptcha ) {
                    if( !isset( $submits['g-recaptcha-response'] ) ) {
                        echo '{ "alert": "error", "message": "' . $message['recaptcha_error'] . '" }';
                        exit;
                    }
                }

                $mail->Subject = !empty( $submits['subject'] ) ? $submits['subject'] : 'Form response from your website';
                $mail->SetFrom( $sender['email'] , $sender['name'] );

                if( !empty( $replyto ) ) {
                    if( count( $replyto ) > 1 ) {
                        $replyto_e = $submits[ $replyto[0] ];
                        $replyto_n = $submits[ $replyto[1] ];
                        $mail->AddReplyTo( $replyto_e , $replyto_n );
                    } elseif( count( $replyto ) == 1 ) {
                        $replyto_e = $submits[ $replyto[0] ];
                        $mail->AddReplyTo( $replyto_e );
                    }
                }

                foreach( $recipients as $recipient ) {
                    $mail->AddAddress( $recipient['email'] , $recipient['name'] );
                }

                $unsets = array( 'prefix', 'subject', 'replyto', 'message', $prefix . 'botcheck', 'g-recaptcha-response', 'force_recaptcha', $prefix . 'submit' );

                foreach( $unsets as $unset ) {
                    unset( $submits[ $unset ] );
                }

                $fields = array();

                foreach( $submits as $name => $value ) {
                    if( empty( $value ) ) continue;

                    $name = str_replace( $prefix , '', $name );
                    $name = ucwords( str_replace( '-', ' ', $name ) );

                    if( is_array( $value ) ) {
                        $value = implode( ', ', $value );
                    }

                    $fields[$name] = $value;
                }

                $response = array();

                foreach( $fields as $fieldname => $fieldvalue ) {
                    $response[] = $fieldname . ': ' . $fieldvalue;
                }

                $referrer = $_SERVER['HTTP_REFERER'] ? '<br><br><br>This Form was submitted from: ' . $_SERVER['HTTP_REFERER'] : '';

                $body = implode( "<br>", $response ) . $referrer;

                $mail->MsgHTML( $body );
                $sendEmail = $mail->Send();

                if( $sendEmail == true ):
                    if( $autores && !empty( $replyto_e ) ) {
                        $send_arEmail = $autoresponder->Send();
                    }

                    echo '{ "alert": "success", "message": "' . $message['success'] . '" }';
                else:
                    echo '{ "alert": "error", "message": "' . $message['error'] . '<br><br><strong>Reason:</strong><br>' . $mail->ErrorInfo . '" }';
                endif;

                } else {
                echo '{ "alert": "error", "message": "' . $message['error_unexpected'] . '" }';
                }
    }



    public function subscribe()
    {
            $MC_apiKey = ''; // Your MailChimp API Key
            $MC_listId = ''; // Your MailChimp List ID

            if( isset( $_GET['list'] ) AND $_GET['list'] != '' ) {
                $MC_listId = $_GET['list'];
            }

            if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
                if( $_POST['sf-email'] != '' ) {

                    $email = isset( $_POST['sf-email'] ) ? $_POST['sf-email'] : '';
                    $datacenter = explode( '-', $MC_apiKey );
                    $submit_url = "https://" . $datacenter[1] . ".api.mailchimp.com/3.0/lists/" . $MC_listId . "/members/" ;

                    $data = array(
                        'email_address' => $email,
                        'status' => 'pending' // "subscribed", "unsubscribed", "cleaned", "pending"
                    );

                    $payload = json_encode($data);

                    $auth = base64_encode( 'user:' . $MC_apiKey );

                    $header   = array();
                    $header[] = 'Content-type: application/json; charset=utf-8';
                    $header[] = 'Authorization: Basic ' . $auth;

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $submit_url);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

                    $result = curl_exec($ch);
                    curl_close($ch);
                    $data = json_decode($result);
                    
                    if ( isset( $data->status ) AND $data->status == 'subscribed' ){
                        echo '{ "alert": "success", "message": "You have been successfully subscribed to our email list." }';
                    } else if ( isset( $data->status ) AND $data->status == 'pending' ){
                        echo '{ "alert": "success", "message": "We have sent you a confirmation email." }';
                    } else {
                        echo '{ "alert": "error", "message": "' . $data->title . '" }';
                    }
                } else {
                    echo '{ "alert": "error", "message": "Please fill up all the fields and try again." }';
                }
            } else {
                echo '{ "alert": "error", "message": "An unexpected error occured. Please try again later." }';
            }
    }

    public function terms()
	{
	  $this->view->loadview('terms');
    }

    public function cookies()
	{
	  $this->view->loadview('cookies');
    }

    public function privacy()
	{
	  $this->view->loadview('privacy');
    }

    public function seucrity()
	{
	  $this->view->loadview('seucrity');
    }

    public function legalnotice()
    {
        $this->view->loadview('legalnotice');
    }
    

    private function getUserIP()
    {
            // Get real visitor IP behind CloudFlare network
            if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                    $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                    $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            }
            $client  = @$_SERVER['HTTP_CLIENT_IP'];
            $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
            $remote  = $_SERVER['REMOTE_ADDR'];

            if(filter_var($client, FILTER_VALIDATE_IP))
            {
                $ip = $client;
            }
            elseif(filter_var($forward, FILTER_VALIDATE_IP))
            {
                $ip = $forward;
            }
            else
            {
                $ip = $remote;
            }

            return  $ip;

    }



	
    
}

?>
