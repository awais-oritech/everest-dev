<?php
	class User {
		
		static function CheckEmail($email){
			global $DB;
			
			$sql = "SELECT id 
						FROM admin_users
						WHERE email = '".$email."' ";

			$objData = $DB->Select($sql);
			if($objData){
				return false;
			}
			else{
				return true;
			}
		}

		static function code($email){
		    $time= Utility::microseconds();
		    $code=md5($email.$time);
		    return $code;
		    
		}
		
		static function updateToken($email){
		    global $DB;
		    $token=self::code($email);
		    $sql = "UPDATE admin_users SET token='".$token."' WHERE email = '".$email."' ";
		    $objData = $DB->Select($sql);
		    if($objData){
		        return true;
		    }
		    else{
		        return false;
		    }
		}
		static function Validate($objData){
			global $DB;
			
			$sql = "SELECT id 
						FROM admin_users 
						WHERE email = '".$objData->email."' 
						AND password = '".md5($objData->password)."' 
						AND is_active = '1' ";
			$objData = $DB->Select($sql);
			if($objData){
				$objUser = User::Load($objData[0]->id);
				Session::AddUser($objUser);
				return true;
			}
			else{
				return false;
			}
		}
		
		static function Logout(){
			Session::Destroy();
			return true;
		}
		
		static function LoadByCode($code,$type=''){
			global $DB;
			
			if($code != ''){
				$sql = "SELECT id 
							FROM admin_users
							WHERE MD5(CONCAT(id,email)) = '".$code."' ";
				if($type == 'Login'){
					$sql .= "AND last_login IS NOT NULL ";
				}
				$objData = $DB->Select($sql);
				if($objData){
					return $objData[0];
				}
				else{
					return false;
				}
			}
			else{
				return false;
			}
		}
		
		static function Load($ID){
			global $DB;
			

			$sql = "SELECT admin_users.*,
                            admin_roles.name As role,
							admin_roles.link As default_link
						FROM admin_users
                        Left JOIN admin_roles ON admin_roles.id=admin_users.role_id
						WHERE admin_users.is_active = '1' 
						AND admin_users.id = '".$ID."' ";
			$objData = $DB->Select($sql);
			if($objData){
                 return $objUser = $objData[0];
            }
			else{
				return false;
			}
		}

		
	static function GetUserData($id) {
			global $DB;
			
			$sql = "SELECT * 
						FROM admin_users
						WHERE id = '".$id."' ";
			$objData = $DB->Select($sql);

			if($objData){
				return $objData[0];
			}
			else{
				return false;
			}
		}

	static function get_user_access(){
			if($key=self::get_header_key()){
				
				if(self::user_by_api_key($key)){
					return true;
				}else {
					return false;
				}
			}else {
				return false;
			}
		}
		static function get_header_key(){
			$headers=apache_request_headers();
			
			if(isset($headers['api_key']) && !empty($headers['api_key'])){
				return $headers['api_key'];
				
			}else {
				return '';
			}
		}
		public static function validateApi(){
			if($key=self::get_header_key()){	
				$secret=md5(123456);
				if($secret==$key){
					return true;
				}else{
					return false;
				}
			}
		}
		//======================================================== All Data ============================================
		static function user_by_api_key($key){
			
			global $DB;
			
			$sql="SELECT api_sessions.user_id,users.* 
			FROM api_sessions
			LEFT join users As users ON api_sessions.user_id=users.id
			WHERE api_key='".$key."'
			";
			
			$objData=$DB->Select($sql);
			if($objData){
			
				return $objData[0];
			}else{
				return false;
			}
	}
	//======================================================== All Data ============================================
	static function api_user(){
		if($key=self::get_header_key()){	
			global $DB;
			
			$sql="SELECT api_sessions.user_id,users.* 
			FROM api_sessions
			LEFT join users As users ON api_sessions.user_id=users.id
			WHERE api_key='".$key."'
			";
			
			$objData=$DB->Select($sql);
			if($objData){
				return $objData[0];
			}else{
				return false;
			}
		}else {
			return false;
		}
	}	

	}
