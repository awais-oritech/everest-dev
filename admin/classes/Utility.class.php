<?php
	class Utility {
	   	const VARIABLERANDOMLIST = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	   	const DANISHLIST = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789 ";

		static function dateDifferencestatus($startDate ){
		    $dateDifference = '';
		    $today = date("Y-m-d");
		    $startDate = strtotime($startDate);
		    $today = strtotime($today);
		    echo $startDate.'<br>'.$endDate;
		    if($today > $startDate){
		      return 'yes';
		    }elseif($startDate>$today){
		        echo 'no';
		    }
		    
		    return $dateDifference;
		}
	
/* ------------------------------- */
/* Email */
/* ------------------------------- */

/**
 * _email
 * 
 * @param string $email
 * @param string $subject
 * @param string $body
 * @param boolean $is_html
 * @param boolean $only_smtp
 * @return boolean
 */
static function  email($email, $subject, $body, $is_html = false, $only_smtp = false) {
			$system;
			$system['system_title']="My Doctionary";
			$system['system_email']="info@mydoctionary.com";
			$system['email_smtp_server']="smtp.hostinger.com";
			$system['email_smtp_enabled']="1";
			$system['email_smtp_authentication']="1";
			$system['email_smtp_ssl']="1";
			$system['email_smtp_port']="587";
			$system['email_smtp_setfrom']="info@mydoctionary.com";
			$system['email_smtp_username']="info@mydoctionary.com";
			$system['email_smtp_password']="MyDoctionary@786";
			/* set header */
			$header  = "MIME-Version: 1.0\r\n";
			$header .= "Mailer: ".$system['system_title']."\r\n";
			if($system['system_email']) {
				$headers = "From: ".$system['system_email']."\r\n";
				$headers .= "Reply-To: ".$system['system_email']."\r\n";
			}
			if($is_html) {
				$header .= "Content-Type: text/html; charset=\"utf-8\"\r\n";
			} else {
				$header .= "Content-Type: text/plain; charset=\"utf-8\"\r\n";
			}
			/* send email */
			if($system['email_smtp_enabled']) {
				/* SMTP */
				require_once(Request::$ABSOLUTE_PATH.'includes/libs/PHPMailer/PHPMailer.php');
				require_once(Request::$ABSOLUTE_PATH.'includes/libs/PHPMailer/SMTP.php');
				require_once(Request::$ABSOLUTE_PATH.'includes/libs/PHPMailer/Exception.php');
				$mail = new PHPMailer\PHPMailer\PHPMailer;
				$mail->CharSet = "UTF-8";
				$mail->isSMTP();
				$mail->Host = $system['email_smtp_server'];
				$mail->SMTPAuth = ($system['email_smtp_authentication'])? true : false;
				$mail->Username = $system['email_smtp_username'];
				$mail->Password = $system['email_smtp_password'];
				$mail->SMTPSecure = ($system['email_smtp_ssl'])? 'ssl': 'tls';
				$mail->Port = $system['email_smtp_port'];
				$setfrom = (empty($system['email_smtp_setfrom']))? $system['email_smtp_username']: $system['email_smtp_setfrom'];
				$mail->setFrom($setfrom, $system['system_title']);
				$mail->addAddress($email);
				$mail->Subject = $subject;
				if($is_html) {
					$mail->isHTML(true);
					$mail->AltBody = strip_tags($body);
				}
				$mail->Body = $body;
				if(!$mail->send()) {
					if($only_smtp) {
						return false;
					}
					/* send using mail() */
					if(!mail($email, $subject, $body, $header)) {
						return false;
					}
				}
			} else {
				if($only_smtp) {
					return false;
				}
				/* send using mail() */
				if(!mail($email, $subject, $body, $header)) {
					return false;
				}
			}
			return true;
		}
		static function emailer($objContact,$is_html=false){
			$phpmail = new PHPMailer();
			$phpmail->Mailer = 'mail';
			$phpmail->ClearAddresses();
			$phpmail->ContentType = 'text/html';
			$phpmail->Host = "relay-hosting.secureserver.net";
			$phpmail->CharSet = 'UTF-8';
			$phpmail->From = 'info@mydoctionary.com';
			$phpmail->FromName = 'My Doctionary';
			$phpmail->Sender = 'info@mydoctionary.com';
			$phpmail->AddAddress($objContact->email,'');
			$phpmail->AddReplyTo('info@mydoctionary.com','My Doctionary');
			$phpmail->Subject = $objContact->subject ;
			$phpmail->Body =$objContact->message;
			if($is_html) {
				$phpmail->isHTML(true);
				$phpmail->AltBody = strip_tags($objContact->message);
			}
			if($phpmail->Send()){
				self::queryemail($objContact,$is_html);
				return true;
			}else{
				return false;
			}
		}
		
		static function queryemail($objContact,$is_html=false){
			$phpmail = new PHPMailer();
			$phpmail->Mailer = 'mail';
			$phpmail->ClearAddresses();
			$phpmail->ContentType = 'text/html';
			$phpmail->Host = "relay-hosting.secureserver.net";
			$phpmail->CharSet = 'UTF-8';
			$phpmail->From = $objContact->email;
			$phpmail->FromName = $objContact->name;
			$phpmail->Sender = $objContact->email;
			$phpmail->AddAddress('desk@mydoctionary.com','My Doctionary');
			$phpmail->AddReplyTo($objContact->email,$objContact->name);
			$phpmail->Subject = $objContact->subject ;
			$phpmail->Body =$objContact->message;
			if($is_html) {
				$phpmail->isHTML(true);
				$phpmail->AltBody = strip_tags($objContact->message);
			}
			if($phpmail->Send()){
				return true;
			}else{
				return false;
			}
		}
		static function Contactmailer($objContact){
			$phpmail = new PHPMailer();
			$phpmail->Mailer = 'mail';
			$phpmail->ClearAddresses();
			$phpmail->ContentType = 'text/html';
			$phpmail->Host = "relay-hosting.secureserver.net";
			$phpmail->CharSet = 'UTF-8';
			$phpmail->From = $objContact->email;
			$phpmail->FromName = $objContact->name;
			$phpmail->Sender = $objContact->email;
			$phpmail->AddAddress('info@mydoctionary.com','My Doctionary');
			$phpmail->AddReplyTo($objContact->email,$objContact->name);
			$phpmail->Subject = $objContact->subject ;
			$phpmail->Body =$objContact->message;
			if($phpmail->Send()){
				return true;
			}else{
				return false;
			}
		}
		static function orderEmail($scope,$id){
			global $DB;
			$sql="SELECT 
					name,email
					FROM ".$scope."
					WHERE id='".$id."'";
			
			$objData=$DB->Select($sql);
			if($objData){
				$link=Request::$BASE_PATH.'login';
				$message='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html xmlns="http://www.w3.org/1999/xhtml">
					<head>
						<meta name="viewport" content="width=device-width" />
						<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
						<title>Order Request</title>
					</head>
					<body style="margin:0px; background: #f8f8f8;">
						<div style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
							<div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">
								<table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
									<tbody>
										<tr>
											<td style="vertical-align: top; padding-bottom:30px;" align="center">
												<img src="'.Request::$BASE_PATH.'assets/images/logo.png" alt="logo" style="border:none; width:150px;" /><br/>
											</td>
										</tr>
									</tbody>
								</table>
								<div style="padding: 40px; background: #fff;">
									<table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
										<tbody>
											<tr>
												<td><b> Dear '.$objData[0]->name.'</b>
													<p>You got a order Please login to see detail</p>
													<a href="'.$link.'" style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #00c0c8; border-radius: 60px; text-decoration:none;"> Login to MyDoctionary </a>
				
													<br/><br/><b>- Thank You</b> <br/><b>(MyDoctionary team)</b></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div style="text-align: center; font-size: 12px; color: #b2b2b5; margin-top: 20px">
									<p> Powered by codeglocal.com <br />
										<a href="javascript: void(0);" style="color: #b2b2b5; text-decoration: underline;">Unsubscribe</a> </p>
								</div>
							</div>
						</div>
					</body>
				</html>
				';
				$data=new stdClass();
				$data->email=$objData[0]->email;
				$data->subject='Order Notification';
				$data->message=$message;
				
				if(self::emailer($data,true)){
					return true;	
				}	
			}else{
				return false;
			}
		}

		static function smser($objContact){

			$mobileno = $objContact->mobileno;
			$message = $objContact->message;

			//$url = 'http://115.186.182.30/CBSCustomerAPI/CorporateSMS.svc?wsdl';
			$url = 'https://cbs.zong.com.pk/reachcwsv2/corporatesms.svc?wsdl';
			$client = new SoapClient($url,array("trace" => 1, "execption" => 1));
			//$result = $client->GetAccountSummary(array("obj_GetAccountSummary"=> array('loginId'=>'923145842694','loginPassword'=>'Zong@123')));

			$resultQuick = $client->QuickSMS(
				array(
					'obj_QuickSMS' => array(
						'loginId'=>'923145842694',
						'loginPassword'=>'Zong@123',
						'Destination'=> $mobileno, 
						'Mask' => 'DOCtionary',
						'Message'=> $message,
						'UniCode'=>'0',
						'ShortCodePrefered'=>'n')));

			var_dump($resultQuick);
			die();

			if($resultQuick){
				return true;
			}else{
				return false;
			}
		}
		static function microseconds() {
		    $mt = explode(' ', microtime());
		    return ((int)$mt[1]) * 1000000 + ((int)round($mt[0] * 1000000));
		}
		static function ordermsg(){
		    $config=self::mailconfig();
		    $msg="<strong>Dear ".$config->teamname." Team<br><br>
            		       		You Got a Order Please Login to Review<br><br><br>
            		       		Regards<br>
                                ".$config->webname . "
                                <br>
                                </strong>";
		    return $msg;
		}
		
		static function mailconfig(){
		    $settings=new stdClass();
		    $settings->email='info@tradechrono.co.uk';
		    $settings->name='Trade Chrono';
		    $settings->webname='Trade Chrono';
		    $settings->teamname='Trade Chrono';
		    return $settings;
		}
		static function mailcontact(){
		    $settings=new stdClass();
		    $settings->email='contact@tradechrono.co.uk';
		    $settings->name='Trade Crono';
		    $settings->webname='Trade Crono';
		    $settings->teamname='Trade Crono';
		    return $settings;
		}
		static function orderToteam(){
		    $config=self::mailconfig();
		    $msg=self::ordermsg();
		    if(self::Mailer($config,$config,'Order Notification',$msg)){
		        return TRUE;
		    }else {
		        return false;
		    }
		}
		static function TraderBuyReq(){
			$config=self::mailconfig();
			 $msg="<strong>Dear ".$config->teamname." Team<br><br>
            		       		You Got a Trader Buy Request Please Login to Review<br><br><br>
            		       		Regards<br>
                                ".$config->webname . "
                                <br>
                                </strong>";
		    if(self::Mailer($config,$config,'Trader Buy Request',$msg)){
		        return TRUE;
		    }else {
		        return false;
		    }
		}
	}
