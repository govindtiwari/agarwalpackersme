<?php

$servername = "localhost";
$username = "nadho55m_packers";
$password = "hunny24moon";
$dbname = "nadho55m_packers";
$table = "dtcpackers";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Done";die;

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
$mail->Host = "dtcpackers.org";

$mail->SMTPAuth = true;
//$mail->SMTPSecure = "ssl";
$mail->Port = 587;
$mail->Username = "dtc@dtcpackers.org";
$mail->Password = "india$1234";

$mail->From = "dtc@dtcpackers.org";
$mail->FromName = "Test from Info";
$mail->AddAddress("helpdesk@dtcpackers.org");
//$mail->AddReplyTo("mail@mail.com");

$mail->IsHTML(true);

$mail->Subject = "Test message from server";
$mail->Body = '<table align="center" width="780" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td align="left">&nbsp;</td></tr>
  <tr>
    <td align="left" style="background:#3CC298; padding:10px 10px 10px 10px; border-radius: 12px 12px 0px 0px;"><a href="http://www.dtcpackers.org/" target="_blank"><img src="http://dtcpackers.org/dtcpackers.org/dtc_logo.png" width="250" height="100" border="0" /></a></td>
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
    <td align="center" style="background:#3CC298; padding:10px 10px 10px 10px; color:#FFF; border-radius: 0px 0px 12px 12px; text-decoration:none;"><a href="http://dtcpackers.org/" target="_blank" style="text-decoration:none;"><span style="color:#fff;">Home</span></a>  |  <a href="http://dtcpackers.org/service.html" target="_blank" style="text-decoration:none;"><span style="color:#fff;">Services</span></a>  |  <a href="http://dtcpackers.org/enquiry.html" target="_blank" style="text-decoration:none;"><span style="color:#fff;">Booking</span></a>  |  <a href="http://dtcpackers.org/contact.html" target="_blank" style="text-decoration:none;"><span style="color:#fff;">Contact</span></a> 
    <br />
    @2015 Diksha Transport Corporation Packers And Movers Private Limited</td>
  </tr>
</table>';
//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
echo "Message could not be sent. <p>";
echo "Mailer Error: " . $mail->ErrorInfo;
exit;
}

//echo "Message has been sent";
while (list($key,$val)=each($_POST))
        {
        $pstr .= "$key : $val \n ++";
        ++$pcount;
        

        }
        //echo "INSERT INTO dtcpackers (id, msg) VALUES ('', '".$pstr."')";//die;
        $sql = "INSERT INTO dtcpackers (id, msg) VALUES ('', '".$pstr."')";
        if ($conn->query($sql) === TRUE) {
    		include("$file");
		} else {
    		echo "Error: " . $sql . "<br>" . $conn->error;
		}
        //
        

           
                            







$conn->close();
?>
