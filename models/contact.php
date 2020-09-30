<?php
 header("Content-type:application/json");
 // Import PHPMailer classes into the global namespace
 // These must be at the top of your script, not inside a function
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 
 // Load Composer's autoloader
 require '../PHPMailer/vendor/autoload.php';
 if(isset($_POST['posalji'])){
  $email=$_POST['email'];
  $lozinka=$_POST['lozinka'];
  $subject=$_POST['subject'];
  $tekstt=$_POST['tekst'];

 // Instantiation and passing `true` enables exceptions
 $mail = new PHPMailer(true);
 
 try {
     //Server settings
     $mail->SMTPOptions = array(
      'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
      )
  );
     $mail->SMTPDebug = 1;                                       // Enable verbose debug output
     $mail->isSMTP();                                            // Set mailer to use SMTP
     $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
     $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
     $mail->Username   = 'moviestore056@gmail.com';                     // SMTP username
     $mail->Password   = 'moviestore123';                               // SMTP password
     $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
     $mail->Port       = 587;                                    // TCP port to connect to
 
     //Recipients
     $mail->setFrom($email,'');
     $mail->addAddress('moviestore056@gmail.com', 'Movie Store');     // Add a recipient
                   // Name is optional
     $mail->addReplyTo('info@example.com', 'Information');
     $mail->addCC('cc@example.com');
     $mail->addBCC('bcc@example.com');
 
     // Attachments
    //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
 
    // $body="<strong>Hello</strong>";
     // Content
     $mail->isHTML(true);                                  // Set email format to HTML
     $mail->Subject = $subject;
     $mail->Body    = $tekstt;
    // $mail->AltBody =strip_tags($body);
    
     $mail->send();
     echo 'Message has been sent';
   
 } catch (Exception $e) {
     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
     $greska=$e->getMessage();
    $podaciOGreskama=fopen(GRESKE_FAJL,"a+");
       fwrite($podaciOGreskama,$greska);
       fclose($podaciOGreskama);
 }
}
?>
