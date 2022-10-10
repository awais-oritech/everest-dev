<?php
	class ApiRes {
		//======================================================== All Data ============================================
		static function post_categories($offset=0,$limit=20){
			global $DB;
			
			$sql="SELECT
                        *
                    FROM
                        `blogcategories`
                    ORDER BY
                        `blogcategories`.`level` ASC LIMIT ".$offset.",".$limit;
			
			$objData=$DB->Select($sql);
			if($objData){
			
				return $objData;
			}else{
				return false;
			}
		}

	//======================================================== All Data ============================================
		static function banners($limit=3){
			global $DB;
			$path=Request::$BASE_PATH;
			$bastpath=Request::$BASE_PATH;
			$sql='SELECT
                       `banners`.`id`,
					   CONCAT("'.$path.'",banners.image) AS image


                    FROM
                        `banners`
                    WHERE     `banners`.`is_active`="1"
                    ORDER BY
                       `id` ASC LIMIT '.$limit;
			
			$objData=$DB->Select($sql);
			if($objData){
			
				return $objData;
			}else{
				return false;
			}
		} 	
    //======================================================== All Data ============================================
		static function post_by_categories($cat_id,$offset=0,$limit=20){
			global $DB;
			$bastpath=Request::$BASE_PATH;
			$sql="SELECT
                       `blogs`.*,
                       CONCAT('".$bastpath."',blogs.image)  As image
                    FROM
                        `blogs`
                    WHERE     `blogs`.category_id='".$cat_id."'
                    ORDER BY
                        `blogs`.`level` ASC LIMIT ".$offset.",".$limit;
			
			$objData=$DB->Select($sql);
			if($objData){
			
				return $objData;
			}else{
				return false;
			}
		}    
       //======================================================== All Data ============================================
		static function pdfs($offset=0,$limit=20){
			global $DB;
			$bastpath=Request::$BASE_PATH;
			$sql="SELECT
                        pdf.*,
                        CONCAT('".$bastpath."',pdf.file)  As file
                    FROM
                        pdf
                    ORDER BY
                        pdf.level ASC LIMIT ".$offset.",".$limit;
			// echo "<pre>";
			// print_r($sql);
			// exit;
			
			$objData=$DB->Select($sql);
			if($objData){
			
				return $objData;
			}else{
				return false;
			}
		}
		//======================================================== All Data ============================================
		static function pdfbase64($url){
			return $b64Doc = chunk_split(base64_encode(file_get_contents($url)));
		}   
        //======================================================== All Data ============================================
		static function videos($offset=0,$limit=20){
			global $DB;
			$sql="SELECT
                        *
                    FROM
                        videos
                    ORDER BY
                        videos.id DESC LIMIT ".$offset.",".$limit;
			
			$objData=$DB->Select($sql);
			if($objData){
			
				return $objData;
			}else{
				return false;
			}
		}  
            
}
