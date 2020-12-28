<?php
if(isset($_POST['networkingsubmit']))
{
	
	$name=trim($_POST['name']);
    $email=trim($_POST['email']);	
	$subject=trim($_POST['subject']);
	$message=trim($_POST['txtmsg']);
	$error='';
	if($name=="")
	{
		$name_err="Please enter name";
		$error='yes';
	}
	else if($name!="" && (!preg_match('/^(?=.*?[A-Za-z])[a-zA-Z]+$/',$name)))
	{
		$name_err="Please enter valid name";
		$error='yes';
	}
	if($email=="")
	{
		$email_err="Please enter email";
		$error='yes';
	}
	else if($email!="" && (!preg_match("/^[a-zA-Z0-9.]+@[a-zA-Z0-9_-]+\.[a-zA-Z0-9_-]/", $email)) )
	{
		$email_err="Please enter valid email";
		$error='yes';
	}
	if($subject=="")
	{
		$subject="Please enter mobile";
		$error='yes';
	}
	else if($subject!="" && (!preg_match('/^[0-9]{10}+$/', $subject)))
	{
		$subject_err="Please enter valid mobile";
		$error='yes';
	}
	if($message=="")
	{
		$msg_err="Please enter message";
		$error='yes';
	}
	else if($message!="" && (!preg_match('/^(?=.*?[A-Za-z])[a-zA-Z0-9+#,-. ]+$/',$message)))
	{
		$msg_err="Please enter valid message";
		$error='yes';
	}
	if($error!='yes')
	{
		$body="<table width='600' align='center' cellpadding='0' cellspacing='0' style='border:10px solid  #8e8a8a'>
			  <tr>
				<td height='350' valign='top' class='boxbg'><br />
					<table width='95%' align='center' cellpadding='0' cellspacing='0'>						
					</table>
				  <br />
					<table width='85%' align='center' cellpadding='5' cellspacing='1' style='font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#333333'>
					<tr><td>
					<img src='https://".$_SERVER['HTTP_HOST']."/images/DAMAGATLA-LOGO-jpeg-1.jpg' width='100' height='100' />
					</td></tr>
					  <tr>
						<td colspan='2' bgcolor='#045103' style='font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#FFFFFF;padding: 6px 7px;''><strong>It Damagatlas Contact Details</strong></td>
					  </tr>
					  <tr>
						<td colspan='2'>&nbsp;</td>
					  </tr>
					  
					  <tr>
                        <td><strong>Name :</strong></td>
					    <td><strong>$name</strong></td>
				      </tr>
					   <tr>
                        <td><strong>Email :</strong></td>
					    <td><strong>$email</strong></td>
				      </tr>
					   <tr>
                        <td><strong>Subject :</strong></td>
					    <td><strong>$subject</strong></td>
				      </tr>
					  <tr>
                        <td><strong>Message:</strong></td>
					    <td><strong>$message</strong></td>
				      </tr>
					</table>
				  <br /></td>
			  </tr>
			</table>";
			
			 	        $to="jhansi.sai456@gmail.com";
						$msg= "Mail Sent successfully, We will get back to you soon.";
						require 'PHPMailer-master/PHPMailerAutoload.php';
						$mail = new PHPMailer;
						//$mail->isSMTP();                                      // Set mailer to use SMTP
                        $mail -> SMTPDebug = 2;    
						$mail->Port =465;//25
						$mail -> Host =  'mail.itsdamagatlas.com';                // Specify main and backup SMTP servers
						$mail->SMTPAuth = true;                               // Enable SMTP `
						$mail->Username = 'noreply@itsdamagatlas.com';                 // SMTP username
                        $mail->Password = 'noreply123#@!';                           // SMTP password
						$mail->SMTPSecure =  'tls';   // TCP port to connect to
						$mail->From =  'noreply@itsdamagatlas.com';
						$mail->FromName = 'It Damagatlas';
						$mail->addAddress($to);//noreply@pitforest.com
						$mail->WordWrap = 50;     // Set word wrap to 50 characters
						$mail->isHTML(true);                                  // Set email format to HTML
						$mail->Subject ='It Damagatlas Contact Details';
						$mail->Body = $body;
						if (!$mail->send()) 	
						{   
                           // echo $mail->ErrorInfo;
						?>
						<script>alert('error occured while send email');
						</script>
						<?php
						}
						else
						{
						?>
						<script>alert('Mail Sent successfully, We will get back to you soon.');
					//	location.href="thanks.html";
						</script>
					?>