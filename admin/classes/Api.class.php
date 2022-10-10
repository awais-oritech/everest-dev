<?php
class Api
{

    static function Process($parameters = NULL)
    {

        
        if (! isset($parameters[0]) || $parameters[0] == '')
            $parameters[0] = 'Home';

       
            if (isset($_SERVER['HTTP_ORIGIN']) && $_SERVER['HTTP_ORIGIN'] != '') {
		    header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
		  header("Access-Control-Allow-Origin: *");
		    header('Access-Control-Allow-Methods: GET, PUT, POST, OPTIONS');
		    header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With,api_key,Content-Length');
		    }
        //User::validateApi()
            if(1){
           
          
   
        switch ($parameters[0]) {
             case 'banners':
                $data =ApiRes::banners(3);
                if($data){
                    $res=array('status'=>"200","message"=>"success","data"=>$data);
                }else{
                    $res=array('status'=>"404","message"=>"Data not found","data"=>'');
                }
                
            break;
            case 'base64':
                if(Request::hasGetVariables()){
                    $objData=Request::getGetVariables();
                    if(isset($objData->filepath) && !empty($objData->filepath)){
                       $data =ApiRes::pdfbase64($objData->filepath);
                        header("Content-length: " . strlen($data));
                        if($data){
                            $res=array('status'=>"200","message"=>"success","data"=>$data);
                        }else{
                            $res=array('status'=>"404","message"=>"Data not found","data"=>'');
                        }
                    }
                   
                }
                
            break;
            case 'get_base64':
                $objData = file_get_contents("php://input");
                if(isset($objData)){
                    $objData = json_decode($objData);
                    if(isset($objData->filepath) && !empty($objData->filepath)){
                        $data=ApiRes::pdfbase64($objData->filepath);

                    }
                    
                }
                
                if($data){
                    $res=array('status'=>"200","message"=>"success","data"=>$data);
                }else{
                    $res=array('status'=>"404","message"=>"Data not found","data"=>'');
                }
               
            break;
            case 'post_categories':
                $offset=0;
                $objData = file_get_contents("php://input");
                if(isset($objData)){
                    $objData = json_decode($objData);
                    if(isset($objData->offset) && $objData->offset>0)
                    $offset=$objData->offset;
                }
                $data=ApiRes::post_categories($offset);
                if($data){
                    $res=array('status'=>"200","message"=>"success","data"=>$data);
                }else{
                    $res=array('status'=>"404","message"=>"Data not found","data"=>'');
                }
               
            break;
            case 'blogs_by_category':
                 $offset=0;
                $objData = file_get_contents("php://input");
                if(isset($objData)){
                    $objData = json_decode($objData);
                    if(isset($objData->offset) && $objData->offset>0){
                     $offset=$objData->offset;
                    }
                    $data=ApiRes::post_by_categories($objData->id,$offset);
                    if($data){
                        $res=array('status'=>"200","message"=>"success","data"=>$data);
                    }else{
                        $res=array('status'=>"404","message"=>"Data not found","data"=>'');
                    }
                }else{
                    $res=array('status'=>"404","message"=>"Data not posted","data"=>'');
                }
            break;
            case 'pdfs':
                $offset=0;
                $objData = file_get_contents("php://input");
                if(isset($objData)){
                    $objData = json_decode($objData);
                    if(isset($objData->offset) && $objData->offset>0)
                    $offset=$objData->offset;
                }
                $data=ApiRes::pdfs($offset);
                    if($data){
                        $res=array('status'=>"200","message"=>"success","data"=>$data);
                    }else{
                        $res=array('status'=>"404","message"=>"Data not found","data"=>'');
                    }
            break;

             case 'videos':
                $offset=0;
                $objData = file_get_contents("php://input");
                if(isset($objData)){
                    $objData = json_decode($objData);
                    if(isset($objData->offset) && $objData->offset>0)
                    $offset=$objData->offset;
                }
                $data=ApiRes::videos($offset);
                    if($data){
                        $res=array('status'=>"200","message"=>"success","data"=>$data);
                    }else{
                        $res=array('status'=>"404","message"=>"Data not found","data"=>'');
                    }
            break;
                
            default:
            $res=array('status'=>"404","message"=>"Route not found","data"=>'');
                break;
        }
       }else{
           $res=array('status'=>"404","message"=>"Bad Auth","data"=>'');
       }  
          $res=json_encode($res,JSON_PRETTY_PRINT);      
          header("Content-Length: " . strlen($res));
        //  $headers=apache_request_headers();
        //  print_r($headers);
        echo $res;
          exit;
      
    }
}
