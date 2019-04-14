<?php


        $file="index.html";
        $pcount=0;
        $gcount=0;
		$pstr = [];

        
	    while (list($key,$val)=each($_POST))
        {
        $pstr .= '<tr>
                    <td align="left">'.$key.' : </td>
                    <td align="left">&nbsp;</td>
                    <td align="left">'.$val.'</td>
                  </tr>';
        ++$pcount;
        

        }

        //print_r($pstr);die;

require("class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->Host = "agarwalpackers.me";

$mail->SMTPAuth = true;
//$mail->SMTPSecure = "ssl";
$mail->Port = 587;
$mail->Username = "helpdesk@agarwalpackers.me";
$mail->Password = "india$1234";

$mail->From = "helpdesk@agarwalpackers.me";
$mail->FromName = "Form Info";
$mail->AddAddress("helpdesk@agarwalpackers.me");
//$mail->AddReplyTo("mail@mail.com");

$mail->IsHTML(true);

$mail->Subject = "Enquiry ".date('d-m-Y');
$mail->Body = '<table align="center" width="780" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td align="left">&nbsp;</td></tr>
  <tr>
    <td align="left" style="background:#3CC298; padding:10px 10px 10px 10px; border-radius: 12px 12px 0px 0px;"><a href="http://agarwalpackers.me/" target="_blank"><img src="http://agarwalpackers.me/images/logo.jpg" width="250" height="100" border="0" /></a></td>
  </tr>
  <tr>
    <td align="justify" style="border-left:10px solid #3CC298;  border-right:10px solid #3CC298; padding:20px;"><table width="100%" border="0" cellspacing="10" cellpadding="10">
  <tr>
    

Booking details</td>
  </tr>

'.$pstr.'

<tr>
    <td colspan="3" align="left">

 Thanks for showing interest with our services.. <br>
We Get your Inquiry we will respond you soon..<br>
Feel free to call us - +918168708722

</td>
</tr>
 
</table>
</td>
  </tr>
 <tr>
    <td align="center" style="background:#3CC298; padding:10px 10px 10px 10px; color:#FFF; border-radius: 0px 0px 12px 12px; text-decoration:none;"><a href="http://agarwalpackers.me/" target="_blank" style="text-decoration:none;"><span style="color:#fff;">Home</span></a>  |  <a href="http://agarwalpackers.me/services.html" target="_blank" style="text-decoration:none;"><span style="color:#fff;">Services</span></a>  |  <a href="http://agarwalpackers.me/enquiry.html" target="_blank" style="text-decoration:none;"><span style="color:#fff;">Booking</span></a>  |  <a href="http://agarwalpackers.me/contactus.html" target="_blank" style="text-decoration:none;"><span style="color:#fff;">Contact</span></a> 
    <br />
    @2015 Agarwal Packers And Movers</td>
  </tr>
</table>';
//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
echo "Message could not be sent. <p>";
echo "Mailer Error: " . $mail->ErrorInfo;
exit;
}
include("$file");
//echo "Message has been sent";

?>
