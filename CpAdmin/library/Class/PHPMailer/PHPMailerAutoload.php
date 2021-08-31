<?php
/**
 * PHPMailer SPL autoloader.
 * PHP Version 5
 * @package PHPMailer
 * @link https://github.com/PHPMailer/PHPMailer/ The PHPMailer GitHub project
 * @author Marcus Bointon (Synchro/coolbru) <phpmailer@synchromedia.co.uk>
 * @author Jim Jagielski (jimjag) <jimjag@gmail.com>
 * @author Andy Prevost (codeworxtech) <codeworxtech@users.sourceforge.net>
 * @author Brent R. Matzelle (original founder)
 * @copyright 2012 - 2014 Marcus Bointon
 * @copyright 2010 - 2012 Jim Jagielski
 * @copyright 2004 - 2009 Andy Prevost
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * @note This program is distributed in the hope that it will be useful - WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * PHPMailer SPL autoloader.
 * @param string $classname The name of the class to load
 */
 

function PHPMailerAutoload($classname)
{
    //Can't use __DIR__ as it's only in PHP 5.3+
    $filename = dirname(__FILE__).DIRECTORY_SEPARATOR.'class.'.strtolower($classname).'.php';
    if (is_readable($filename)) {
        require $filename;
    }
}

if (version_compare(PHP_VERSION, '5.1.2', '>=')) {
    //SPL autoloading was introduced in PHP 5.1.2
    if (version_compare(PHP_VERSION, '5.3.0', '>=')) {
        spl_autoload_register('PHPMailerAutoload', true, true);
    } else {
        spl_autoload_register('PHPMailerAutoload');
    }
} else {

    function __autoload($classname)
    {
        PHPMailerAutoload($classname);
    }
}



function GetEmailConfig($AccountID,$ArrSend=array()){
    global $db ;
    $TableName = ArrIsset($ArrSend,"TableName","config_email");
    $PassWordDecrypt = ArrIsset($ArrSend,"Decrypt","1");
    
    $row = $db->H_SelectOneRow("select * from $TableName where id = '$AccountID' ");
    if($PassWordDecrypt == '1'){
     $row['pass'] = Letter_Decrypt($row['pass']);    
    }
 
    #print_r3($row);
    
    $EmailConfig =array(
    'Host'=> $row['server'],
    'Port'=> $row['port'],
    'Username'=> $row['user'],
    'Password'=> $row['pass'],
    'ssl_type'=> $row['ssl_type'],
    'SMTPSecure'=> $row['ssl_val'],
    'setFrom_Email'=> $row['sitemail'],
    'setFrom_Name'=> $row['sitename'],
    );
    
    return $EmailConfig ;
}


function Send_STMP_Email($EmailConfig,$EmailData,$ArrSend=array()){
    global $db ;
    $Debug_Print = ArrIsset($ArrSend,"Debug","0");
    
    $mail = new PHPMailer ;
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();
    $mail->SMTPDebug = $Debug_Print;
   
    $mail->Debugoutput = 'html';    
   
   
   $mail->Host =  $EmailConfig['Host'];
   $mail->Port =  $EmailConfig['Port'];
   $mail->Username = $EmailConfig['Username'];
   $mail->Password = $EmailConfig['Password']; 

   $mail->SMTPAuth = true;
   
   if($EmailConfig['ssl_type'] == '1'){
   $mail->SMTPSecure =  $EmailConfig['SMTPSecure'];
   }
   
   
 
    
    
   $mail->setFrom($EmailConfig['setFrom_Email'], $EmailConfig['setFrom_Name']);
   
   
   $mail->addReplyTo($EmailData['ReplyTo_Email'],$EmailData['ReplyTo_Name']);
   $mail->addAddress($EmailData['SendTo_Email'], $EmailData['SendTo_Name']);
   $mail->Subject = $EmailData['Subject'] ; 
   $mail->msgHTML($EmailData['Message']);
   
   $mail->send();
  

}



/*
function Send_STMP_Email($FunArr=array()){

    $mail = new PHPMailer;
    $mail->CharSet = 'UTF-8';

    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Debugoutput = 'html';

    //Set the hostname of the mail server
    $mail->Host =  $FunArr['Host'] ;

    //Set the SMTP port number - likely to be 25, 465 or 587
    $mail-> Port = $FunArr['Port'];

    $mail->SMTPSecure =  $FunArr['SMTPSecure'];

    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;

    //Username to use for SMTP authentication
    $mail->Username = $FunArr['Username'];

    //Password to use for SMTP authentication
    $mail->Password = $FunArr['Password'];


    //Set who the message is to be sent from
    $mail->setFrom($FunArr['setFrom_Email'], $FunArr['setFrom_Name']);

    //Set an alternative reply-to address
    $mail->addReplyTo($FunArr['ReplyTo_Email'],$FunArr['ReplyTo_Name']);


    //Set who the message is to be sent to
    $mail->addAddress($FunArr['SendTo_Email'], $FunArr['SendTo_Name']);

    //Set the subject line
    $mail->Subject = $FunArr['Subject'] ;

    //Read an HTML message body from an external file, convert referenced images to embedded,
   //convert HTML into a basic plain-text alternative body

   //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
   //Replace the plain text body with one created manually

     //$mail->AltBody =  $FunArr['Body'];
    //Attach an image file

    //$mail->Body = "";
    $mail->msgHTML($FunArr['Body']);
 
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }
 

}
*/


?>