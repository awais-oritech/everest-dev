<?php
class Gateway
{

    static function Process($parameters = NULL)
    {
        if (! isset($parameters[0]) || $parameters[0] == '')
            $parameters[0] = 'Home';
        $objPresenter = new Presenter();
        $objPresenter->AddParameter('parameters', $parameters);

        if (Session::isUserOnline()) {
            $user=Content::get_user(Session::GetUser()->id);
            $objPresenter->AddParameter('user',$user);
            $sideBaritems=Content::sideBaritems();
            usort($sideBaritems,function($first,$second){
                return $first->level > $second->level;
            });
            $objPresenter->AddParameter('sideBaritems',$sideBaritems);


            $objPresenter->AddTemplate('default/header');
            $objPresenter->AddTemplate('default/sidebar');

        }
        switch ($parameters[0]) {
                // ======================================= ASYN Ajax  ================================
                case 'ajax':
                    switch ($parameters[1]) {
                        case 'login':
                            if (!Session::isUserOnline()) {
                                $objData = Request::getPostVariables();
                                if (Request::hasPostVariables()) {
                                    $objData = Request::getPostVariables();
                                    if (User::Validate($objData)) {
                                        $redirect=Session::GetUser()->default_link;
                                        echo json_encode(array("status"=>"success","message"=>"Successfully Login","callback"=>Request::$BASE_PATH.$redirect));
                                    }else{
                                        echo json_encode(array("status"=>"error","message"=>"Invalid Email OR Password"));
                                    }

                                }else {
                                    echo json_encode(array("status"=>"error","message"=>"Please! Try agin Later"));
                                }
                            } else {
                                header("Location: " . Request::$BASE_PATH);
                            }
                            exit;
                            break;
                            case 'sort-update':
                                if (Session::isUserOnline()) {
                                    if (Request::hasPostVariables()) {
                                        $objData = Request::getPostVariables();
                                        global $DB;

                                        foreach($objData->items as $ind=>$items){
                                            $ind=($ind+1);
                                            $sql="UPDATE admin_sections SET level='".$ind."' WHERE id='".$items."'";
                                            $DB->Update($sql);
                                        }

                                        exit;
                                            echo json_encode(array("status"=>"1","message"=>"success"));

                                    }else {
                                        echo json_encode(array("status"=>"error","message"=>"Please! Try agin Later"));
                                    }
                                } else {
                                    header("Location: " . Request::$BASE_PATH);
                                }
                                exit;
                                break;
                    }
                    exit;
                 break;
                // ======================================= GLOBAL DELETE ================================
                case 'delete':
                    if (Session::isUserOnline()) {
                        if (Request::hasPostVariables()) {
                            $objData = Request::getPostVariables();
                            if (Content::validate($objData->table,'delete')) {
                                if ($d=Content::delete_by_id($objData->id, $objData->table)) {

                                    echo 'Success';
                                } else {
                                    echo 'Fail';
                                }
                            } else {
                                echo 'Fail';
                            }
                            exit();
                        }
                    } else {
                        header("Location: " . Request::$BASE_PATH);
                    }

                    exit();
                    break;
                // ======================================= Custom DELETE ================================
                case 'customdelete':
                    if (Session::isUserOnline()) {
                        if (Request::hasPostVariables()) {
                            $objData = Request::getPostVariables();
                            if (Content::validate($objData->con,'delete')) {
                                if ($d=Content::delete_by_id($objData->id, $objData->table)) {

                                    echo 'Success';
                                } else {
                                    echo 'Fail';
                                }
                            } else {
                                echo 'Fail';
                            }
                            exit();
                        }
                    } else {
                        header("Location: " . Request::$BASE_PATH);
                    }

                    exit();
                    break;
                // ======================================= PDF ================================
                case 'pdf':
                    if (Session::isUserOnline()) {
                        $md['table']=$parameters[0];
                        $md['con']=$parameters[0];
                        $md['text']='PDF';
                        $md['stext']='PDF';
                        $objPresenter->AddParameter('md',$md);
                        if(!isset($parameters[1]) || empty($parameters[1])){
                            if(Content::validate($md['con'],'view')){
                                $Data=Content::PDF();
                                $objPresenter->AddParameter('Data',$Data);
                                $objPresenter->AddTemplate($md['con'].'/all');
                               }else{
                                header("Location: " . Request::$BASE_PATH);
                               }
                        }else{
                            switch ($parameters[1]) {
                                case 'new':
                                    if (Content::validate($md['con'],'add')){
                                        if (Request::hasPostVariables()){
                                            $objData = Request::getPostVariables();

                                            $objData->created = date('Y-m-d H:i:s');
                                            if(isset($objData->active) && $objData->active == 'on') {
                                                $objData->is_active = '1';
                                            } else {
                                                $objData->is_active = '0';
                                            }

                                            if(isset($_FILES ['file']['name']) && $_FILES ['file']['name']!=''){

                                                $file='pdf-'.uniqid();
                                                $file_ext = pathinfo ( $_FILES ['file'] ['name'], PATHINFO_EXTENSION );
                                                if($file_ext=='pdf'){
                                                    $target_path = 'uploads/'.$md['con'].'/';
                                                    $target_path = $target_path.$file.'.'.$file_ext;

                                                    if (move_uploaded_file ( $_FILES ['file'] ['tmp_name'], $target_path )) {
                                                        $objData->file=$target_path;
                                                    }
                                                }
                                            }
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH.$md['con']);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    $objPresenter->AddTemplate($md['con'].'/new');
                                    break;
                                case 'edit':
                                    if (Content::validate($md['con'],'edit')){
                                        if ($parameters[2] != '' && isset($parameters[2])) {
                                            if (Request::hasPostVariables()) {
                                                $objData = Request::getPostVariables();
                                                if (isset($objData->active) && $objData->active == 'on') {
                                                    $objData->is_active = '1';
                                                } else {
                                                    $objData->is_active = '0';
                                                }
                                                if(isset($_FILES ['file']['name']) && $_FILES ['file']['name']!=''){
                                                    $file='pdf-'.uniqid();
                                                    $file_ext = pathinfo ( $_FILES ['file'] ['name'], PATHINFO_EXTENSION );
                                                    if($file_ext=='pdf'){
                                                        $target_path = 'uploads/'.$md['con'].'/';
                                                        $target_path = $target_path.$file.'.'.$file_ext;
                                                        if (move_uploaded_file ( $_FILES ['file'] ['tmp_name'], $target_path )) {
                                                            if(!empty($objData->file_name)){
                                                                @unlink($objData->file_name);
                                                            }
                                                            $objData->file_name=$target_path;
                                                        }
                                                    }
                                                }
                                                $objData->file=$objData->file_name;
                                                global $DB;
                                                $DB->Save($md['table'], $objData);
                                                header("Location: " . Request::$BASE_PATH.$md['con']);
                                            } else {
                                                $id = intval($parameters[2]);
                                                $Data = Content::find_by_id($id,$md['table']);
                                                $objPresenter->AddParameter('Data', $Data);
                                                }
                                            $objPresenter->AddTemplate($md['con'].'/edit');
                                        }else{
                                            header("Location: " . Request::$BASE_PATH.$md['con']);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    break;
                            }
                        }

                    } else {
                        header("Location: " . Request::$BASE_PATH);
                    }
                    break;

                    // ======================================= AUDIOS ================================
                case 'audios':
                    if (Session::isUserOnline()) {
                        $md['table']=$parameters[0];
                        $md['con']=$parameters[0];
                        $md['text']='Audios';
                        $md['stext']='Audio';
                        $objPresenter->AddParameter('md',$md);
                        if(!isset($parameters[1]) || empty($parameters[1])){
                            if(Content::validate($md['con'],'view')){
                                $Data=Content::All($md['table']);
                                $objPresenter->AddParameter('Data',$Data);
                                $objPresenter->AddTemplate($md['con'].'/all');
                               }else{
                                header("Location: " . Request::$BASE_PATH);
                               }
                        }else{
                            switch ($parameters[1]) {
                                case 'new':
                                    if (Content::validate($md['con'],'add')){
                                        if (Request::hasPostVariables()){
                                            $objData = Request::getPostVariables();

                                            $objData->created = date('Y-m-d H:i:s');
                                            if(isset($objData->active) && $objData->active == 'on') {
                                                $objData->is_active = '1';
                                            } else {
                                                $objData->is_active = '0';
                                            }

                                            if(isset($_FILES ['file']['name']) && $_FILES ['file']['name']!=''){

                                                $file='audio-'.uniqid();
                                                $file_ext = pathinfo ( $_FILES ['file'] ['name'], PATHINFO_EXTENSION );
                                                if($file_ext=='mp3' || $file_ext=='ogg' || $file_ext=='mpeg3'){
                                                    $target_path = 'uploads/'.$md['con'].'/';
                                                    $target_path = $target_path.$file.'.'.$file_ext;

                                                    if (move_uploaded_file ( $_FILES ['file'] ['tmp_name'], $target_path )) {
                                                        $objData->file=$target_path;
                                                    }
                                                }
                                            }
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH.$md['con']);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    $objPresenter->AddTemplate($md['con'].'/new');
                                    break;
                                case 'edit':
                                    if (Content::validate($md['con'],'edit')){
                                        if ($parameters[2] != '' && isset($parameters[2])) {
                                            if (Request::hasPostVariables()) {
                                                $objData = Request::getPostVariables();
                                                if (isset($objData->active) && $objData->active == 'on') {
                                                    $objData->is_active = '1';
                                                } else {
                                                    $objData->is_active = '0';
                                                }
                                                if(isset($_FILES ['file']['name']) && $_FILES ['file']['name']!=''){
                                                    $file='audio-'.uniqid();
                                                    $file_ext = pathinfo ( $_FILES ['file'] ['name'], PATHINFO_EXTENSION );
                                                    if($file_ext=='mp3' || $file_ext=='ogg' || $file_ext=='mpeg3'){
                                                        $target_path = 'uploads/'.$md['con'].'/';
                                                        $target_path = $target_path.$file.'.'.$file_ext;
                                                        if (move_uploaded_file ( $_FILES ['file'] ['tmp_name'], $target_path )) {
                                                            if(!empty($objData->file_name)){
                                                                @unlink($objData->file_name);
                                                            }
                                                            $objData->file_name=$target_path;
                                                        }
                                                    }
                                                }
                                                $objData->file=$objData->file_name;
                                                global $DB;
                                                $DB->Save($md['table'], $objData);
                                                header("Location: " . Request::$BASE_PATH.$md['con']);
                                            } else {
                                                $id = intval($parameters[2]);
                                                $Data = Content::find_by_id($id,$md['table']);
                                                $objPresenter->AddParameter('Data', $Data);
                                                }
                                            $objPresenter->AddTemplate($md['con'].'/edit');
                                        }else{
                                            header("Location: " . Request::$BASE_PATH.$md['con']);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    break;
                            }
                        }

                    } else {
                        header("Location: " . Request::$BASE_PATH);
                    }
                    break;
                // ======================================= BLOGS ================================
                case 'blogs':
                    if (Session::isUserOnline()) {
                        $md['table']=$parameters[0];
                        $md['con']=$parameters[0];
                        $md['text']='Blogs';
                        $md['stext']='Blog';
                        $objPresenter->AddParameter('md',$md);
                        if(!isset($parameters[1]) || empty($parameters[1])){
                            if(Content::validate($md['con'],'view')){
                                $Data=Content::blogs();
                                $objPresenter->AddParameter('Data',$Data);
                                $objPresenter->AddTemplate($md['con'].'/all');
                               }else{
                                header("Location: " . Request::$BASE_PATH);
                               }
                        }else{
                            switch ($parameters[1]) {
                                case 'new':
                                    if (Content::validate($md['con'],'add')){
                                        if (Request::hasPostVariables()){
                                            $objData = Request::getPostVariables();

                                            $objData->created = date('Y-m-d H:i:s');
                                            if(isset($objData->active) && $objData->active == 'on') {
                                                $objData->is_active = '1';
                                            } else {
                                                $objData->is_active = '0';
                                            }
                                            if(isset($_FILES ['file']['name']) && $_FILES ['file']['name']!=''){

                                                $file='post-'.uniqid();
                                                $file_ext = pathinfo ( $_FILES ['file'] ['name'], PATHINFO_EXTENSION );
                                                if($file_ext=='png' || $file_ext=='jpg' || $file_ext=='gif' || $file_ext=='jpeg'){
                                                    $target_path = 'uploads/'.$md['con'].'/';
                                                    $target_path = $target_path.$file.'.'.$file_ext;

                                                    if (move_uploaded_file ( $_FILES ['file'] ['tmp_name'], $target_path )) {
                                                        $objData->image=$target_path;


                                                    }
                                                }
                                            }
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH.$md['con']);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    $categories=Content::AllActive('blogcategories');
                                                $objPresenter->AddParameter('categories',$categories);
                                    $objPresenter->AddTemplate($md['con'].'/new');
                                    break;
                                case 'edit':
                                    if (Content::validate($md['con'],'edit')){
                                        if ($parameters[2] != '' && isset($parameters[2])) {
                                            if (Request::hasPostVariables()) {
                                                $objData = Request::getPostVariables();
                                                if (isset($objData->active) && $objData->active == 'on') {
                                                    $objData->is_active = '1';
                                                } else {
                                                    $objData->is_active = '0';
                                                }

                                                if(isset($_FILES ['file']['name']) && $_FILES ['file']['name']!=''){
                                                    $file='post-'.uniqid();
                                                    $file_ext = pathinfo ( $_FILES ['file'] ['name'], PATHINFO_EXTENSION );
                                                    if($file_ext=='png' || $file_ext=='jpg' || $file_ext=='gif' || $file_ext=='jpeg'){
                                                        $target_path = 'uploads/'.$md['con'].'/';
                                                        $target_path = $target_path.$file.'.'.$file_ext;
                                                        if (move_uploaded_file ( $_FILES ['file'] ['tmp_name'], $target_path )) {
                                                            if(!empty($objData->file_name)){
                                                                @unlink($objData->file_name);
                                                            }
                                                            $objData->file_name=$target_path;

                                                        }
                                                    }
                                                }
                                                $objData->image=$objData->file_name;
                                                global $DB;
                                                $DB->Save($md['table'], $objData);
                                                header("Location: " . Request::$BASE_PATH.$md['con']);
                                            } else {
                                                $id = intval($parameters[2]);
                                                $Data = Content::find_by_id($id,$md['table']);
                                                $objPresenter->AddParameter('Data', $Data);
                                                $categories=Content::AllActive('blogcategories');
                                                $objPresenter->AddParameter('categories',$categories);
                                                }
                                            $objPresenter->AddTemplate($md['con'].'/edit');
                                        }else{
                                            header("Location: " . Request::$BASE_PATH.$md['con']);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    break;
                            }
                        }

                    } else {
                        header("Location: " . Request::$BASE_PATH);
                    }
                    break;


                // ======================================= SPONSERS ================================
                case 'sponsors':
                    if (Session::isUserOnline()) {
                        $md['table']=$parameters[0];
                        $md['con']=$parameters[0];
                        $md['text']='Sponsors';
                        $md['stext']='Sponsor';
                        $objPresenter->AddParameter('md',$md);
                        if(!isset($parameters[1]) || empty($parameters[1])){
                            if(Content::validate($md['con'],'view')){
                                $Data=Content::sponsors();
                                $objPresenter->AddParameter('Data',$Data);
                                $objPresenter->AddTemplate($md['con'].'/all');
                               }else{
                                header("Location: " . Request::$BASE_PATH);
                               }
                        }else{
                            switch ($parameters[1]) {
                                case 'new':
                                    if (Content::validate($md['con'],'add')){
                                        if (Request::hasPostVariables()){
                                            $objData = Request::getPostVariables();

                                            $objData->created = date('Y-m-d H:i:s');
                                            if(isset($objData->active) && $objData->active == 'on') {
                                                $objData->is_active = '1';
                                            } else {
                                                $objData->is_active = '0';
                                            }
                                            if(isset($_FILES ['file']['name']) && $_FILES ['file']['name']!=''){

                                                $file='post-'.uniqid();
                                                $file_ext = pathinfo ( $_FILES ['file'] ['name'], PATHINFO_EXTENSION );
                                                if($file_ext=='png' || $file_ext=='jpg' || $file_ext=='gif' || $file_ext=='jpeg'){
                                                    $target_path = 'uploads/'.$md['con'].'/';
                                                    $target_path = $target_path.$file.'.'.$file_ext;

                                                    if (move_uploaded_file ( $_FILES ['file'] ['tmp_name'], $target_path )) {
                                                        $objData->image=$target_path;


                                                    }
                                                }
                                            }
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH.$md['con']);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    $categories=Content::AllActive('sponsorcategories');
                                                $objPresenter->AddParameter('categories',$categories);
                                    $objPresenter->AddTemplate($md['con'].'/new');
                                    break;
                                case 'edit':
                                    if (Content::validate($md['con'],'edit')){
                                        if ($parameters[2] != '' && isset($parameters[2])) {
                                            if (Request::hasPostVariables()) {
                                                $objData = Request::getPostVariables();
                                                if (isset($objData->active) && $objData->active == 'on') {
                                                    $objData->is_active = '1';
                                                } else {
                                                    $objData->is_active = '0';
                                                }

                                                if(isset($_FILES ['file']['name']) && $_FILES ['file']['name']!=''){
                                                    $file='post-'.uniqid();
                                                    $file_ext = pathinfo ( $_FILES ['file'] ['name'], PATHINFO_EXTENSION );
                                                    if($file_ext=='png' || $file_ext=='jpg' || $file_ext=='gif' || $file_ext=='jpeg'){
                                                        $target_path = 'uploads/'.$md['con'].'/';
                                                        $target_path = $target_path.$file.'.'.$file_ext;
                                                        if (move_uploaded_file ( $_FILES ['file'] ['tmp_name'], $target_path )) {
                                                            if(!empty($objData->file_name)){
                                                                @unlink($objData->file_name);
                                                            }
                                                            $objData->file_name=$target_path;

                                                        }
                                                    }
                                                }
                                                $objData->image=$objData->file_name;
                                                global $DB;
                                                $DB->Save($md['table'], $objData);
                                                header("Location: " . Request::$BASE_PATH.$md['con']);
                                            } else {
                                                $id = intval($parameters[2]);
                                                $Data = Content::find_by_id($id,$md['table']);
                                                $objPresenter->AddParameter('Data', $Data);
                                                $categories=Content::AllActive('sponsorcategories');
                                                $objPresenter->AddParameter('categories',$categories);
                                                }
                                            $objPresenter->AddTemplate($md['con'].'/edit');
                                        }else{
                                            header("Location: " . Request::$BASE_PATH.$md['con']);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    break;
                            }
                        }

                    } else {
                        header("Location: " . Request::$BASE_PATH);
                    }
                    break;

                // ======================================= EVENTS ================================
                case 'events':
                    if (Session::isUserOnline()) {
                        $md['table']=$parameters[0];
                        $md['con']=$parameters[0];
                        $md['text']='Events';
                        $md['stext']='Event';
                        $objPresenter->AddParameter('md',$md);
                        if(!isset($parameters[1]) || empty($parameters[1])){
                            if(Content::validate($md['con'],'view')){
                                $Data=Content::all('events');
                                $objPresenter->AddParameter('Data',$Data);
                                $objPresenter->AddTemplate($md['con'].'/all');
                               }else{
                                header("Location: " . Request::$BASE_PATH);
                               }
                        }else{
                            switch ($parameters[1]) {
                                case 'new':
                                    if (Content::validate($md['con'],'add')){
                                        if (Request::hasPostVariables()){
                                            $objData = Request::getPostVariables();

                                            $objData->created = date('Y-m-d H:i:s');
                                            if(isset($objData->active) && $objData->active == 'on') {
                                                $objData->is_active = '1';
                                            } else {
                                                $objData->is_active = '0';
                                            }
                                            if(isset($_FILES ['file']['name']) && $_FILES ['file']['name']!=''){

                                                $file='post-'.uniqid();
                                                $file_ext = pathinfo ( $_FILES ['file'] ['name'], PATHINFO_EXTENSION );
                                                if($file_ext=='png' || $file_ext=='jpg' || $file_ext=='gif' || $file_ext=='jpeg'){
                                                    $target_path = 'uploads/'.$md['con'].'/';
                                                    $target_path = $target_path.$file.'.'.$file_ext;

                                                    if (move_uploaded_file ( $_FILES ['file'] ['tmp_name'], $target_path )) {
                                                        $objData->image=$target_path;


                                                    }
                                                }
                                            }
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH.$md['con']);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }

                                    $objPresenter->AddTemplate($md['con'].'/new');
                                    break;
                                case 'edit':
                                    if (Content::validate($md['con'],'edit')){
                                        if ($parameters[2] != '' && isset($parameters[2])) {
                                            if (Request::hasPostVariables()) {
                                                $objData = Request::getPostVariables();
                                                if (isset($objData->active) && $objData->active == 'on') {
                                                    $objData->is_active = '1';
                                                } else {
                                                    $objData->is_active = '0';
                                                }

                                                if(isset($_FILES ['file']['name']) && $_FILES ['file']['name']!=''){
                                                    $file='post-'.uniqid();
                                                    $file_ext = pathinfo ( $_FILES ['file'] ['name'], PATHINFO_EXTENSION );
                                                    if($file_ext=='png' || $file_ext=='jpg' || $file_ext=='gif' || $file_ext=='jpeg'){
                                                        $target_path = 'uploads/'.$md['con'].'/';
                                                        $target_path = $target_path.$file.'.'.$file_ext;
                                                        if (move_uploaded_file ( $_FILES ['file'] ['tmp_name'], $target_path )) {
                                                            if(!empty($objData->file_name)){
                                                                @unlink($objData->file_name);
                                                            }
                                                            $objData->file_name=$target_path;

                                                        }
                                                    }
                                                }
                                                $objData->image=$objData->file_name;
                                                global $DB;
                                                $DB->Save($md['table'], $objData);
                                                header("Location: " . Request::$BASE_PATH.$md['con']);
                                            } else {
                                                $id = intval($parameters[2]);
                                                $Data = Content::find_by_id($id,$md['table']);
                                                $objPresenter->AddParameter('Data', $Data);

                                                }
                                            $objPresenter->AddTemplate($md['con'].'/edit');
                                        }else{
                                            header("Location: " . Request::$BASE_PATH.$md['con']);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    break;
                            }
                        }

                    } else {
                        header("Location: " . Request::$BASE_PATH);
                    }
                    break;
                                   // ======================================= SLIDERS ================================
                case 'banners':
                    if (Session::isUserOnline()) {
                        $md['table']=$parameters[0];
                        $md['con']=$parameters[0];
                        $md['text']='Banners';
                        $md['stext']='Banner';
                        $objPresenter->AddParameter('md',$md);
                        if(!isset($parameters[1]) || empty($parameters[1])){
                            if(Content::validate($md['con'],'view')){
                                $Data=Content::All($md['table']);
                                $objPresenter->AddParameter('Data',$Data);
                                $objPresenter->AddTemplate($md['con'].'/all');
                               }else{
                                header("Location: " . Request::$BASE_PATH);
                               }
                        }else{
                            switch ($parameters[1]) {
                                case 'new':
                                    if (Content::validate($md['con'],'add')){
                                        if (Request::hasPostVariables()){
                                            $objData = Request::getPostVariables();

                                            $objData->created = date('Y-m-d H:i:s');
                                            if(isset($objData->active) && $objData->active == 'on') {
                                                $objData->is_active = '1';
                                            } else {
                                                $objData->is_active = '0';
                                            }
                                            if(isset($objData->featured) && $objData->featured == 'on') {
                                                $objData->is_featured = '1';
                                            } else {
                                                $objData->is_featured = '0';
                                            }

                                            if(isset($_FILES ['file']['name']) && $_FILES ['file']['name']!=''){

                                                $file='filapp-'.uniqid();
                                                $file_ext = pathinfo ( $_FILES ['file'] ['name'], PATHINFO_EXTENSION );
                                                if($file_ext=='png' || $file_ext=='jpg' || $file_ext=='jpeg'){
                                                    $target_path = 'uploads/'.$md['con'].'/';
                                                    $target_path = $target_path.$file.'.'.$file_ext;

                                                    if (move_uploaded_file ( $_FILES ['file'] ['tmp_name'], $target_path )) {
                                                        $objData->image=$target_path;
                                                    }
                                                }
                                            }
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH.$md['con']);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    $objPresenter->AddTemplate($md['con'].'/new');
                                    break;
                                case 'edit':
                                    if (Content::validate($md['con'],'edit')){
                                        if ($parameters[2] != '' && isset($parameters[2])) {
                                            if (Request::hasPostVariables()) {
                                                $objData = Request::getPostVariables();
                                                if (isset($objData->active) && $objData->active == 'on') {
                                                    $objData->is_active = '1';
                                                } else {
                                                    $objData->is_active = '0';
                                                }

                                                if(isset($_FILES ['file']['name']) && $_FILES ['file']['name']!=''){
                                                    $file='filapp-'.uniqid();
                                                    $file_ext = pathinfo ( $_FILES ['file'] ['name'], PATHINFO_EXTENSION );
                                                    if($file_ext=='png' || $file_ext=='jpg' || $file_ext=='jpeg'){
                                                        $target_path = 'uploads/'.$md['con'].'/';
                                                        $target_path = $target_path.$file.'.'.$file_ext;
                                                        if (move_uploaded_file ( $_FILES ['file'] ['tmp_name'], $target_path )) {
                                                            if(!empty($objData->file_name)){
                                                                @unlink($objData->file_name);
                                                            }
                                                            $objData->file_name=$target_path;
                                                        }
                                                    }
                                                }

                                                $objData->image=$objData->file_name;
                                                global $DB;
                                                $DB->Save($md['table'], $objData);
                                                header("Location: " . Request::$BASE_PATH.$md['con']);
                                            } else {
                                                $id = intval($parameters[2]);
                                                $Data = Content::find_by_id($id,$md['table']);
                                                $objPresenter->AddParameter('Data', $Data);
                                                }
                                            $objPresenter->AddTemplate($md['con'].'/edit');
                                        }else{
                                            header("Location: " . Request::$BASE_PATH.$md['con']);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    break;
                            }
                        }

                    } else {
                        header("Location: " . Request::$BASE_PATH);
                    }
                    break;
                // ======================================= VIDEOS ================================
                case 'videos':
                    if (Session::isUserOnline()) {
                        $md['table']=$parameters[0];
                        $md['con']=$parameters[0];
                        $md['text']='Videos';
                        $md['stext']='Video';
                        $objPresenter->AddParameter('md',$md);
                        if(!isset($parameters[1]) || empty($parameters[1])){
                            if(Content::validate($md['con'],'view')){
                                $Data=Content::All($md['table']);
                                $objPresenter->AddParameter('Data',$Data);
                                $objPresenter->AddTemplate($md['con'].'/all');
                               }else{
                                header("Location: " . Request::$BASE_PATH);
                               }
                        }else{
                            switch ($parameters[1]) {
                                case 'new':
                                    if (Content::validate($md['con'],'add')){
                                        if (Request::hasPostVariables()){
                                            $objData = Request::getPostVariables();

                                            $objData->created = date('Y-m-d H:i:s');
                                            if(isset($objData->active) && $objData->active == 'on') {
                                                $objData->is_active = '1';
                                            } else {
                                                $objData->is_active = '0';
                                            }
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH.$md['con']);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    $objPresenter->AddTemplate($md['con'].'/new');
                                    break;
                                case 'edit':
                                    if (Content::validate($md['con'],'edit')){
                                        if ($parameters[2] != '' && isset($parameters[2])) {
                                            if (Request::hasPostVariables()) {
                                                $objData = Request::getPostVariables();
                                                if (isset($objData->active) && $objData->active == 'on') {
                                                    $objData->is_active = '1';
                                                } else {
                                                    $objData->is_active = '0';
                                                }
                                                global $DB;
                                                $DB->Save($md['table'], $objData);
                                                header("Location: " . Request::$BASE_PATH.$md['con']);
                                            } else {
                                                $id = intval($parameters[2]);
                                                $Data = Content::find_by_id($id,$md['table']);
                                                $objPresenter->AddParameter('Data', $Data);
                                                }
                                            $objPresenter->AddTemplate($md['con'].'/edit');
                                        }else{
                                            header("Location: " . Request::$BASE_PATH.$md['con']);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    break;
                            }
                        }

                    } else {
                        header("Location: " . Request::$BASE_PATH);
                    }
                    break;

                    // ======================================= Categories ================================
                case 'categories':
                    if (Session::isUserOnline()) {
                        $md['table']=$parameters[0];
                        $md['con']=$parameters[0];
                        $md['text']='Categories';
                        $md['stext']='Category';
                        $objPresenter->AddParameter('md',$md);
                        if(!isset($parameters[1]) || empty($parameters[1])){
                            if(Content::validate($md['con'],'view')){
                                $Data=Content::All($md['table']);
                                $objPresenter->AddParameter('Data',$Data);
                                $objPresenter->AddTemplate($md['con'].'/all');
                               }else{
                                header("Location: " . Request::$BASE_PATH);
                               }
                        }else{
                            switch ($parameters[1]) {
                                case 'new':
                                    if (Content::validate($md['con'],'add')){
                                        if (Request::hasPostVariables()){
                                            $objData = Request::getPostVariables();

                                            $objData->created = date('Y-m-d H:i:s');
                                            if(isset($objData->active) && $objData->active == 'on') {
                                                $objData->is_active = '1';
                                            } else {
                                                $objData->is_active = '0';
                                            }
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH.$md['con']);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    $objPresenter->AddTemplate($md['con'].'/new');
                                    break;
                                case 'edit':
                                    if (Content::validate($md['con'],'edit')){
                                        if ($parameters[2] != '' && isset($parameters[2])) {
                                            if (Request::hasPostVariables()) {
                                                $objData = Request::getPostVariables();
                                                if (isset($objData->active) && $objData->active == 'on') {
                                                    $objData->is_active = '1';
                                                } else {
                                                    $objData->is_active = '0';
                                                }
                                                global $DB;
                                                $DB->Save($md['table'], $objData);
                                                header("Location: " . Request::$BASE_PATH.$md['con']);
                                            } else {
                                                $id = intval($parameters[2]);
                                                $Data = Content::find_by_id($id,$md['table']);
                                                $objPresenter->AddParameter('Data', $Data);
                                                }
                                            $objPresenter->AddTemplate($md['con'].'/edit');
                                        }else{
                                            header("Location: " . Request::$BASE_PATH.$md['con']);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    break;
                            }
                        }

                    } else {
                        header("Location: " . Request::$BASE_PATH);
                    }
                    break;

                // ======================================= VIDEOS ================================
                case 'quranaudiocat':
                    if (Session::isUserOnline()) {


                        if(isset($_GET['catID']) && !empty($_GET['catID'])){
                            $cat_id=intval($_GET['catID']);
                            $cat=Content::find_by_id($cat_id,'categories');
                            $objPresenter->AddParameter('cat',$cat);
                            $md['table']='quranaudios';
                            $md['con']='quranaudiocat';
                            $md['text']=' Category Audios';
                            $md['stext']='Category Audio';
                            $objPresenter->AddParameter('md',$md);
                            if(!isset($parameters[1]) || empty($parameters[1]) ){
                                    if(Content::validate($md['con'],'single')){
                                        $Data=Content::quranaudiosByCat($cat_id);
                                        $objPresenter->AddParameter('Data',$Data);
                                        $objPresenter->AddTemplate($md['con'].'/all');
                                    }else{
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                            }else{
                                switch ($parameters[1]) {

                                    case 'new':
                                        if (Content::validate($md['con'],'add')){
                                            if (Request::hasPostVariables()){
                                                $objData = Request::getPostVariables();
                                                $objData->category_id = $cat->id;
                                                $objData->created = date('Y-m-d H:i:s');
                                                if(isset($objData->active) && $objData->active == 'on') {
                                                    $objData->is_active = '1';
                                                } else {
                                                    $objData->is_active = '0';
                                                }

                                                if(isset($_FILES ['file']['name']) && $_FILES ['file']['name']!=''){

                                                    $file='audio-'.uniqid();
                                                    $file_ext = pathinfo ( $_FILES ['file'] ['name'], PATHINFO_EXTENSION );
                                                    if($file_ext=='mp3' || $file_ext=='ogg' || $file_ext=='mpeg3'){
                                                        $target_path = 'uploads/quranaudios/';
                                                        $target_path = $target_path.$file.'.'.$file_ext;

                                                        if (move_uploaded_file ( $_FILES ['file'] ['tmp_name'], $target_path )) {
                                                            $objData->file=$target_path;
                                                        }
                                                    }
                                                }
                                                global $DB;
                                                $DB->Save($md['table'], $objData);
                                                header("Location: " . Request::$BASE_PATH.$md['con'].'?catID='.$cat->id);
                                            }
                                        } else {
                                            header("Location: " . Request::$BASE_PATH);
                                        }
                                        $categories=Content::AllActive('categories');
                                        $objPresenter->AddParameter('categories',$categories);
                                        $objPresenter->AddTemplate($md['con'].'/new');
                                        break;
                                    case 'edit':
                                        if (Content::validate($md['con'],'edit')){
                                            if ($parameters[2] != '' && isset($parameters[2])) {
                                                if (Request::hasPostVariables()) {
                                                    $objData = Request::getPostVariables();
                                                    $objData->category_id = $cat->id;
                                                    if (isset($objData->active) && $objData->active == 'on') {
                                                        $objData->is_active = '1';
                                                    } else {
                                                        $objData->is_active = '0';
                                                    }
                                                    if(isset($_FILES ['file']['name']) && $_FILES ['file']['name']!=''){
                                                        $file='audio-'.uniqid();
                                                        $file_ext = pathinfo ( $_FILES ['file'] ['name'], PATHINFO_EXTENSION );
                                                        if($file_ext=='mp3' || $file_ext=='ogg' || $file_ext=='mpeg3'){
                                                            $target_path = 'uploads/quranaudios/';
                                                            $target_path = $target_path.$file.'.'.$file_ext;
                                                            if (move_uploaded_file ( $_FILES ['file'] ['tmp_name'], $target_path )) {
                                                                if(!empty($objData->file_name)){
                                                                    @unlink($objData->file_name);
                                                                }
                                                                $objData->file_name=$target_path;
                                                            }
                                                        }
                                                    }
                                                    $objData->file=$objData->file_name;
                                                    global $DB;
                                                    $DB->Save($md['table'], $objData);
                                                header("Location: " . Request::$BASE_PATH.$md['con'].'?catID='.$cat->id);
                                                } else {
                                                    $id = intval($parameters[2]);
                                                    $Data = Content::find_by_id($id,$md['table']);
                                                    $categories=Content::AllActive('categories');
                                                    $objPresenter->AddParameter('categories',$categories);
                                                    $objPresenter->AddParameter('Data', $Data);
                                                    }
                                                $objPresenter->AddTemplate($md['con'].'/edit');

                                            }else{
                                                header("Location: " . Request::$BASE_PATH.$md['con'].'?catID='.$cat->id);
                                            }
                                        } else {
                                            header("Location: " . Request::$BASE_PATH);
                                        }
                                        break;
                                }
                            }
                        }else{
                            header("Location: " . Request::$BASE_PATH.'categories');
                        }


                    } else {
                        header("Location: " . Request::$BASE_PATH);
                    }
                    break;
                // ======================================= Post Categories ================================
                case 'blogcategories':
                    if (Session::isUserOnline()) {
                        $md['table']=$parameters[0];
                        $md['con']=$parameters[0];
                        $md['text']="Blog's Categories";
                        $md['stext']="Blog's Category";
                        $objPresenter->AddParameter('md',$md);
                        if(!isset($parameters[1]) || empty($parameters[1])){
                            if(Content::validate($md['con'],'view')){
                                $Data=Content::All($md['table']);
                                $objPresenter->AddParameter('Data',$Data);
                                $objPresenter->AddTemplate($md['con'].'/all');
                               }else{
                                header("Location: " . Request::$BASE_PATH);
                               }
                        }else{
                            switch ($parameters[1]) {
                                case 'new':
                                    if (Content::validate($md['con'],'add')){
                                        if (Request::hasPostVariables()){
                                            $objData = Request::getPostVariables();

                                            $objData->created = date('Y-m-d H:i:s');
                                            if(isset($objData->active) && $objData->active == 'on') {
                                                $objData->is_active = '1';
                                            } else {
                                                $objData->is_active = '0';
                                            }
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH.$md['con']);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    $objPresenter->AddTemplate($md['con'].'/new');
                                    break;
                                case 'edit':
                                    if (Content::validate($md['con'],'edit')){
                                        if ($parameters[2] != '' && isset($parameters[2])) {
                                            if (Request::hasPostVariables()) {
                                                $objData = Request::getPostVariables();
                                                if (isset($objData->active) && $objData->active == 'on') {
                                                    $objData->is_active = '1';
                                                } else {
                                                    $objData->is_active = '0';
                                                }
                                                global $DB;
                                                $DB->Save($md['table'], $objData);
                                                header("Location: " . Request::$BASE_PATH.$md['con']);
                                            } else {
                                                $id = intval($parameters[2]);
                                                $Data = Content::find_by_id($id,$md['table']);
                                                $objPresenter->AddParameter('Data', $Data);
                                                }
                                            $objPresenter->AddTemplate($md['con'].'/edit');
                                        }else{
                                            header("Location: " . Request::$BASE_PATH.$md['con']);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    break;
                            }
                        }

                    } else {
                        header("Location: " . Request::$BASE_PATH);
                    }
                    break;
                // ======================================= Services ================================
                case 'services':
                    if (Session::isUserOnline()) {
                        $md['table']=$parameters[0];
                        $md['con']=$parameters[0];
                        $md['text']='Services';
                        $md['stext']='Service';
                        $objPresenter->AddParameter('md',$md);
                        if(!isset($parameters[1]) || empty($parameters[1])){
                            if(Content::validate($md['con'],'view')){
                                $Data=Content::services();
                                $objPresenter->AddParameter('Data',$Data);
                                $objPresenter->AddTemplate($md['con'].'/all');
                               }else{
                                header("Location: " . Request::$BASE_PATH);
                               }
                        }else{
                            switch ($parameters[1]) {
                                case 'new':
                                    if (Content::validate($md['con'],'add')){
                                        if (Request::hasPostVariables()){
                                            $objData = Request::getPostVariables();
                                            $objData->category_id=implode(',',$objData->category_id);
                                            $objData->created = date('Y-m-d H:i:s');
                                            if(isset($objData->active) && $objData->active == 'on') {
                                                $objData->is_active = '1';
                                            } else {
                                                $objData->is_active = '0';
                                            }

                                            if(isset($_FILES ['file']['name']) && $_FILES ['file']['name']!=''){

                                                $file='img-'.uniqid();
                                                $file_ext = pathinfo ( $_FILES ['file'] ['name'], PATHINFO_EXTENSION );
                                                if($file_ext=='png' || $file_ext=='jpg' || $file_ext=='jpeg' || $file_ext=='gif'){
                                                    $target_path = 'uploads/'.$md['con'].'/';
                                                    $target_path = $target_path.$file.'.'.$file_ext;

                                                    if (move_uploaded_file ( $_FILES ['file'] ['tmp_name'], $target_path )) {
                                                        $objData->file=$target_path;
                                                    }
                                                }
                                            }
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH.$md['con']);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    $categories=Content::AllActive('categories');
                                    $objPresenter->AddParameter('categories',$categories);
                                    $objPresenter->AddTemplate($md['con'].'/new');
                                    break;
                                case 'edit':
                                    if (Content::validate($md['con'],'edit')){
                                        if ($parameters[2] != '' && isset($parameters[2])) {
                                            if (Request::hasPostVariables()) {
                                                $objData = Request::getPostVariables();
                                                $objData->category_id=implode(',',$objData->category_id);

                                                if (isset($objData->active) && $objData->active == 'on') {
                                                    $objData->is_active = '1';
                                                } else {
                                                    $objData->is_active = '0';
                                                }
                                                if(isset($_FILES ['file']['name']) && $_FILES ['file']['name']!=''){
                                                    $file='img-'.uniqid();
                                                    $file_ext = pathinfo ( $_FILES ['file'] ['name'], PATHINFO_EXTENSION );
                                                    if($file_ext=='mp3' || $file_ext=='ogg' || $file_ext=='mpeg3'){
                                                        $target_path = 'uploads/'.$md['con'].'/';
                                                        $target_path = $target_path.$file.'.'.$file_ext;
                                                        if (move_uploaded_file ( $_FILES ['file'] ['tmp_name'], $target_path )) {
                                                            if(!empty($objData->file_name)){
                                                                @unlink($objData->file_name);
                                                            }
                                                            $objData->file_name=$target_path;
                                                        }
                                                    }
                                                }
                                                $objData->file=$objData->file_name;
                                                global $DB;
                                                $DB->Save($md['table'], $objData);
                                                header("Location: " . Request::$BASE_PATH.$md['con']);
                                            } else {
                                                $id = intval($parameters[2]);
                                                $Data = Content::find_by_id($id,$md['table']);
                                                $categories=Content::AllActive('categories');
                                                $objPresenter->AddParameter('categories',$categories);
                                                $objPresenter->AddParameter('Data', $Data);
                                                }
                                            $objPresenter->AddTemplate($md['con'].'/edit');
                                        }else{
                                            header("Location: " . Request::$BASE_PATH.$md['con']);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    break;
                            }
                        }

                    } else {
                        header("Location: " . Request::$BASE_PATH);
                    }
                    break;
                    // ======================================= SORTING ================================

                    case 'section_sorting':
                    if (Session::isUserOnline()) {
                        if(Content::validate('section_sorting','view')){

                            $objPresenter->AddTemplate('default/sorting');
                        }else{
                            header("Location: " . Request::$BASE_PATH);
                        }

                    } else {
                        header("Location: " . Request::$BASE_PATH);
                    }
                    break;
                   // ======================================= CATEGORIES ================================


                    // ======================================= Admin Sections ================================

                    case 'admin_sections':
                    if (Session::isUserOnline()) {
                        $md['table']=$parameters[0];
                        $md['con']=$parameters[0];
                        $md['text']='Admin Sections';
                        $md['stext']='Admin Section';
                        $objPresenter->AddParameter('md',$md);
                        if(!isset($parameters[1]) || empty($parameters[1])){
                            if(Content::validate($md['con'],'view')){
                                $Data=Content::All($md['table']);
                                $objPresenter->AddParameter('Data',$Data);
                                $objPresenter->AddTemplate($md['con'].'/all');
                               }else{
                                header("Location: " . Request::$BASE_PATH);
                               }
                        }else{
                            switch ($parameters[1]) {
                                case 'new':
                                    if (Content::validate($md['con'],'add')){
                                        if (Request::hasPostVariables()){
                                            $objData = Request::getPostVariables();
                                            $objData->created = date('Y-m-d H:i:s');
                                            if(isset($objData->active) && $objData->active == 'on') {
                                                $objData->is_active = '1';
                                            } else {
                                                $objData->is_active = '0';
                                            }
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH.$md['con']);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    $objPresenter->AddTemplate($md['con'].'/new');
                                    break;
                                case 'edit':
                                    if (Content::validate($md['con'],'edit')){
                                        if ($parameters[2] != '' && isset($parameters[2])) {
                                            if (Request::hasPostVariables()) {
                                                $objData = Request::getPostVariables();
                                                if (isset($objData->active) && $objData->active == 'on') {
                                                    $objData->is_active = '1';
                                                } else {
                                                    $objData->is_active = '0';
                                                }
                                                global $DB;
                                                $DB->Save($md['table'], $objData);
                                                header("Location: " . Request::$BASE_PATH.$md['con']);
                                            } else {
                                                $id = intval($parameters[2]);
                                                $Data = Content::find_by_id($id,$md['table']);
                                                $objPresenter->AddParameter('Data', $Data);
                                                }
                                            $objPresenter->AddTemplate($md['con'].'/edit');
                                        }else{
                                            header("Location: " . Request::$BASE_PATH.$md['con']);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    break;
                            }
                        }

                    } else {
                        header("Location: " . Request::$BASE_PATH);
                    }
                    break;
                // ======================================= Admin ROLES ================================
                case 'admin_roles':
                    if (Session::isUserOnline()) {
                        $md['table']=$parameters[0];
                        $md['con']=$parameters[0];
                        $md['text']='Admin Roles';
                        $md['stext']='Admin Role';
                        $objPresenter->AddParameter('md',$md);
                        if(!isset($parameters[1]) || empty($parameters[1])){
                            if(Content::validate($md['con'],'view')){
                                $Data=Content::All($md['table']);
                                $objPresenter->AddParameter('Data',$Data);
                                $objPresenter->AddTemplate($md['con'].'/all');
                               }else{
                                header("Location: " . Request::$BASE_PATH);
                               }
                        }else{
                            switch ($parameters[1]) {
                                case 'new':
                                    if (Content::validate($md['con'],'add')){
                                        if (Request::hasPostVariables()){
                                            $objData = Request::getPostVariables();
                                            $objData->created = date('Y-m-d H:i:s');
                                            if(isset($objData->active) && $objData->active == 'on') {
                                                $objData->is_active = '1';
                                            } else {
                                                $objData->is_active = '0';
                                            }
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH.$md['con']);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    $objPresenter->AddTemplate($md['con'].'/new');
                                    break;
                                case 'edit':
                                    if (Content::validate($md['con'],'edit')){
                                        if ($parameters[2] != '' && isset($parameters[2])) {
                                            if (Request::hasPostVariables()) {
                                                $objData = Request::getPostVariables();
                                                if (isset($objData->active) && $objData->active == 'on') {
                                                    $objData->is_active = '1';
                                                } else {
                                                    $objData->is_active = '0';
                                                }
                                                global $DB;
                                                $DB->Save($md['table'], $objData);
                                                header("Location: " . Request::$BASE_PATH.$md['con']);
                                            } else {
                                                $id = intval($parameters[2]);
                                                $Data = Content::find_by_id($id,$md['table']);
                                                $objPresenter->AddParameter('Data', $Data);
                                                $sections=Content::select('id,name,actions','admin_sections');
                                                $objPresenter->AddParameter('sections',$sections);
                                            }
                                            $objPresenter->AddTemplate($md['con'].'/edit');
                                        }else{
                                            header("Location: " . Request::$BASE_PATH.$md['con']);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    break;
                            }
                        }

                    } else {
                        header("Location: " . Request::$BASE_PATH);
                    }
                    break;
                    // ======================================= Admin ROLES  Permessions ================================
                case 'admin_role_permissions':
                    if (Session::isUserOnline()) {
                        $md['table']=$parameters[0];
                        $md['con']=$parameters[0];
                        $md['text']='Admin Role Permisssions';
                        $md['stext']='Admin Role Permisssion';
                        $objPresenter->AddParameter('md',$md);
                        if(!isset($parameters[1]) || empty($parameters[1])){
                            if(Content::validate($md['con'],'view')){
                                $Data=Content::admin_role_permissions();
                                $objPresenter->AddParameter('Data',$Data);
                                $objPresenter->AddTemplate($md['con'].'/all');
                               }else{
                                header("Location: " . Request::$BASE_PATH);
                               }
                        }else{
                            switch ($parameters[1]) {
                                case 'new':
                                    if (Content::validate($md['con'],'add')){
                                        if (Request::hasPostVariables()){
                                            $objData = Request::getPostVariables();
                                            $objData->created = date('Y-m-d H:i:s');
                                            if(isset($objData->active) && $objData->active == 'on') {
                                                $objData->is_active = '1';
                                            } else {
                                                $objData->is_active = '0';
                                            }
                                            $objData->actions=implode(',', array_keys($objData->actions));
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH.$md['con']);
                                        }
                                        $roles=Content::select('id,name','admin_roles');
                                        $objPresenter->AddParameter('roles',$roles);
                                        $sections=Content::select('id,name,actions','admin_sections');
                                        $objPresenter->AddParameter('sections',$sections);
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    $objPresenter->AddTemplate($md['con'].'/new');
                                    break;
                                case 'edit':
                                    if (Content::validate($md['con'],'edit')){
                                        if ($parameters[2] != '' && isset($parameters[2])) {
                                            if (Request::hasPostVariables()) {
                                                $objData = Request::getPostVariables();
                                                if (isset($objData->active) && $objData->active == 'on') {
                                                    $objData->is_active = '1';
                                                } else {
                                                    $objData->is_active = '0';
                                                }
                                                $objData->actions=implode(',', array_keys($objData->actions));
                                                global $DB;
                                                $DB->Save($md['table'], $objData);
                                                header("Location: " . Request::$BASE_PATH.$md['con']);
                                            } else {
                                                $id = intval($parameters[2]);
                                                $Data = Content::find_by_id($id,$md['table']);
                                                $objPresenter->AddParameter('Data', $Data);
                                                $roles=Content::select('id,name','admin_roles');
                                                $objPresenter->AddParameter('roles',$roles);
                                                $actions=Content::get_actions_name($Data->section);
                                                $actions=explode(',', $actions);
                                                $objPresenter->AddParameter('actions',$actions);
                                                $sections=Content::select('id,name,actions','admin_sections');
                                                $objPresenter->AddParameter('sections',$sections);
                                            }
                                            $objPresenter->AddTemplate($md['con'].'/edit');
                                        }else{
                                            header("Location: " . Request::$BASE_PATH.$md['con']);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    break;
                                case 'get_actions':
                                    if (1){
                                        if (Request::hasPostVariables()){
                                            $objData = Request::getPostVariables();
                                            echo Content::get_actions($objData->id);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    exit;
                                    break;
                            }
                        }

                    } else {
                        header("Location: " . Request::$BASE_PATH);
                    }
                    break;
                    // ======================================= Admin Users ================================
                case 'admin_users':
                    if (Session::isUserOnline()) {
                        $md['table']=$parameters[0];
                        $md['con']=$parameters[0];
                        $md['text']='Admin Users';
                        $md['stext']='Admin User';
                        $objPresenter->AddParameter('md',$md);
                        if(!isset($parameters[1]) || empty($parameters[1])){
                            if(Content::validate($md['con'],'view')){
                                $Data=Content::get_users();
                                $objPresenter->AddParameter('Data',$Data);
                                $objPresenter->AddTemplate($md['con'].'/all');
                               }else{
                                header("Location: " . Request::$BASE_PATH);
                               }
                        }else{
                            switch ($parameters[1]) {
                                case 'new':
                                    if (Content::validate($md['con'],'add')){
                                        if (Request::hasPostVariables()){
                                            $objData = Request::getPostVariables();
                                            $objData->created = date('Y-m-d H:i:s');
                                            if(isset($objData->active) && $objData->active == 'on') {
                                                $objData->is_active = '1';
                                            } else {
                                                $objData->is_active = '0';
                                            }
                                            $objData->image='';
                                            $objData->password=md5($objData->password);

                                            if(isset($_FILES['file']['name']) && $_FILES ['file']['name']!=''){
                                                $file='ori-'.uniqid();
                                                $file_ext = pathinfo ( $_FILES ['file'] ['name'], PATHINFO_EXTENSION );
                                                if($file_ext=='png' || $file_ext=='jpg' || $file_ext=='jpeg'){
                                                    $target_path = 'uploads/users/';
                                                    $target_path = $target_path.$file.'.'.$file_ext;
                                                    if (move_uploaded_file ( $_FILES['file'] ['tmp_name'], $target_path )) {
                                                        $objData->image=$target_path;
                                                    }
                                                }
                                            }
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH.$md['con']);
                                        }
                                        $roles=Content::select('id,name','admin_roles');
                                        $objPresenter->AddParameter('roles',$roles);

                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    $objPresenter->AddTemplate($md['con'].'/new');
                                    break;
                                case 'edit':
                                    if (Content::validate($md['con'],'edit')){
                                        if ($parameters[2] != '' && isset($parameters[2])) {
                                            if (Request::hasPostVariables()) {
                                                $objData = Request::getPostVariables();
                                                if (isset($objData->active) && $objData->active == 'on') {
                                                    $objData->is_active = '1';
                                                } else {
                                                    $objData->is_active = '0';
                                                }
                                                if(isset($_FILES ['file']['name']) && $_FILES ['file']['name']!=''){
                                                    $file='mydoc-'.uniqid();
                                                    $file_ext = pathinfo ( $_FILES ['file'] ['name'], PATHINFO_EXTENSION );
                                                    if($file_ext=='png' || $file_ext=='jpg' || $file_ext=='jpeg'){
                                                        $target_path = 'uploads/users/';
                                                        $target_path = $target_path.$file.'.'.$file_ext;
                                                        if (move_uploaded_file ( $_FILES ['file'] ['tmp_name'], $target_path )) {
                                                            if(!empty($objData->file_name)){
                                                                @unlink($objData->file_name);
                                                            }
                                                            $objData->file_name=$target_path;
                                                        }
                                                    }
                                                }
                                                if(!empty($objData->new_password)){
                                                    $objData->password=md5($objData->new_password);
                                                }
                                                $objData->image=$objData->file_name;
                                                $objData->actions=implode(',', array_keys($objData->actions));
                                                global $DB;
                                                $DB->Save($md['table'], $objData);
                                                header("Location: " . Request::$BASE_PATH.$md['con']);
                                            } else {
                                                $id = intval($parameters[2]);
                                                $Data = Content::find_by_id($id,$md['table']);
                                                $objPresenter->AddParameter('Data', $Data);
                                                $roles=Content::select('id,name','admin_roles');
                                                $objPresenter->AddParameter('roles',$roles);

                                            }
                                            $objPresenter->AddTemplate($md['con'].'/edit');
                                        }else{
                                            header("Location: " . Request::$BASE_PATH.$md['con']);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    break;

                            }
                        }

                    } else {
                        header("Location: " . Request::$BASE_PATH);
                    }
                    break;

                    // ======================================= Admin User Profile ================================
                case 'admin_user_profile':
                    if (Session::isUserOnline()) {
                        $md['table']='admin_users';
                        $md['con']=$parameters[0];
                        $md['text']='Profle';
                        $md['stext']='Profle';
                        $objPresenter->AddParameter('md',$md);
                        if(!isset($parameters[1]) || empty($parameters[1])){
                            $Data=Content::get_user(Session::GetUser()->id);
                            $objPresenter->AddParameter('Data',$Data);
                            $objPresenter->AddTemplate($md['con'].'/all');
                        }else{
                            switch ($parameters[1]) {

                                case 'edit':
                                    if (1){
                                        if (Request::hasPostVariables()) {
                                            $objData = Request::getPostVariables();
                                            if(isset($_FILES ['file']['name']) && $_FILES ['file']['name']!=''){
                                                $file='mydoc-'.uniqid();
                                                $file_ext = pathinfo ( $_FILES ['file'] ['name'], PATHINFO_EXTENSION );
                                                if($file_ext=='png' || $file_ext=='jpg' || $file_ext=='jpeg'){
                                                    $target_path = 'uploads/users/';
                                                    $target_path = $target_path.$file.'.'.$file_ext;
                                                    if (move_uploaded_file ( $_FILES ['file'] ['tmp_name'], $target_path )) {
                                                        if(!empty($objData->file_name)){
                                                            //@unlink($objData->file_name);
                                                        }
                                                        $objData->file_name=$target_path;
                                                    }
                                                }
                                            }
                                            $objData->id=Session::GetUser()->id;
                                            $objData->image=$objData->file_name;
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH.$md['con']);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    break;

                            }
                        }

                    } else {
                        header("Location: " . Request::$BASE_PATH);
                    }
                    break;


                // ======================================= LOGIN ================================
                case 'login':
                    if (!Session::isUserOnline()) {
                        if (Request::hasPostVariables()){
                            $objData = Request::getPostVariables();
                            if (User::Validate($objData)){
                                $redirect=Session::GetUser()->default_link;
                                header("Location: " . Request::$BASE_PATH.$redirect);
                            }else{
                               $objPresenter->AddParameter('message','<div class="alert alert-danger">Invalid Password Or Email <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>' );
                            }
                        }
                       $objPresenter->AddTemplate('default/login');
                    } else {
                        header("Location: " . Request::$BASE_PATH);
                    }
                    break;
                    // ======================================= FORGOT ================================
                case 'forgot':
                    if (!Session::isUserOnline()) {
                        if (Request::hasPostVariables()){
                            $objData = Request::getPostVariables();
                            if(!User::CheckEmail($objData->email)){
                                User::updateToken($objData->email);
                                $objPresenter->AddParameter('message','<div class="alert alert-danger">Verification Code has been sent Verify <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>' );
                            }

                        }
                        header("Location: " . Request::$BASE_PATH);
                    } else {
                        header("Location: " . Request::$BASE_PATH);
                    }
                    break;
                    // ======================================= NEW PASSWORD ================================
                case 'new-password':
                    if (!Session::isUserOnline()) {
                        if(isset($parameters[1]) && !empty($parameters[1])){

                        }else {
                            header("Location: " . Request::$BASE_PATH);
                        }
                    } else {
                        header("Location: " . Request::$BASE_PATH);
                    }
                    break;
                    // ======================================= LOGOUT ================================
                case 'logout':
                    if (Session::isUserOnline()) {
                        Session::Destroy();
                        header("Location: " . Request::$BASE_PATH);
                    } else {
                        header("Location: " . Request::$BASE_PATH);
                    }
                    break;

            default:
                if (Session::isUserOnline()) {
                   // header("Location: " . Request::$BASE_PATH.$user->link);
                    $objPresenter->AddTemplate('default/dashboard');
                } else {
                    header("Location: " . Request::$BASE_PATH.'login');
                }
               //
                break;
        }

        if (Session::isUserOnline() && $parameters[0] !== "contactus") {
           // $objPresenter->AddTemplate('default/right_sidebar');
            $objPresenter->AddTemplate('default/footer');
         } else {
             $objPresenter->AddTemplate('default/login');
         }
        $objPresenter->Publish();
    }
}
