<?php
class Gateway
{

    static function Process($parameters = NULL)
    {
        if (!isset($parameters[0]) || $parameters[0] == '')
            $parameters[0] = 'Home';
        $objPresenter = new Presenter();
        $objPresenter->AddParameter('parameters', $parameters);
       
       // $d=Content::totalPaidUsers($start,$end,3);
    //     echo '<pre>';
    //     print_r($d);
        //exit;
        if (Session::isUserOnline()) {
            $user = Content::get_user(Session::GetUser()->id);
            $objPresenter->AddParameter('user', $user);
            $sideBaritems = Content::sideBaritems();
            usort($sideBaritems, function ($first, $second) {
                return $first->level > $second->level;
            });
            $objPresenter->AddParameter('sideBaritems', $sideBaritems);


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
                                    $redirect = Session::GetUser()->default_link;
                                    echo json_encode(array("status" => "success", "message" => "Successfully Login", "callback" => Request::$BASE_PATH . $redirect));
                                } else {
                                    echo json_encode(array("status" => "error", "message" => "Invalid Email OR Password"));
                                }
                            } else {
                                echo json_encode(array("status" => "error", "message" => "Please! Try agin Later"));
                            }
                        } else {
                            header("Location: " . Request::$BASE_PATH);
                        }
                        exit;
                        break;
                    case 'countries':
                        if (Session::isUserOnline()) {
                            $objData = Request::getPostVariables();
                            if (Request::hasPostVariables()) {
                                $objData = Request::getPostVariables();
                                    $where="continent_id='".$objData->id."'";
                                    $data=Content::getallWhere('id,name,code','world_countries',$where);
                                    echo json_encode(array("status" => 1, "data" => $data));

                                    //print_r();
                            } 
                        } else {
                            header("Location: " . Request::$BASE_PATH);
                        }
                        exit;
                        break; 
                    case 'cities':
                        if (Session::isUserOnline()) {
                            $objData = Request::getPostVariables();
                            if (Request::hasPostVariables()) {
                                $objData = Request::getPostVariables();
                                    $where="country_id='".$objData->id."'";
                                    $data=Content::getallWhere('code,name,id','world_cities',$where);
                                    echo json_encode(array("status" => 1, "data" => $data));
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

                                foreach ($objData->items as $ind => $items) {
                                    $ind = ($ind + 1);
                                    $sql = "UPDATE admin_sections SET level='" . $ind . "' WHERE id='" . $items . "'";
                                    $DB->Update($sql);
                                }

                                exit;
                                echo json_encode(array("status" => "1", "message" => "success"));
                            } else {
                                echo json_encode(array("status" => "error", "message" => "Please! Try agin Later"));
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
                        if (Content::validate($objData->table, 'delete')) {
                            if ($d = Content::delete_by_id($objData->id, $objData->table)) {

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
                        if (Content::validate($objData->con, 'delete')) {
                            if ($d = Content::delete_by_id($objData->id, $objData->table)) {

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
                case 'opendelete':
                    if (Session::isUserOnline()) {
                        if (Request::hasPostVariables()) {
                            $objData = Request::getPostVariables();
                            if (Content::validate($objData->con, 'delete')|| 1) {
                                if ($d = Content::delete_by_id($objData->id, $objData->table)) {
    
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
                    $md['table'] = $parameters[0];
                    $md['con'] = $parameters[0];
                    $md['text'] = 'PDF';
                    $md['stext'] = 'PDF';
                    $objPresenter->AddParameter('md', $md);
                    if (!isset($parameters[1]) || empty($parameters[1])) {
                        if (Content::validate($md['con'], 'view')) {
                            $Data = Content::All('pdf');
                            $objPresenter->AddParameter('Data', $Data);
                            $objPresenter->AddTemplate($md['con'] . '/all');
                        } else {
                            header("Location: " . Request::$BASE_PATH);
                        }
                    } else {
                        switch ($parameters[1]) {
                            case 'new':
                                if (Content::validate($md['con'], 'add')) {
                                    if (Request::hasPostVariables()) {
                                        $objData = Request::getPostVariables();

                                        $objData->created = date('Y-m-d H:i:s');
                                        if (isset($objData->active) && $objData->active == 'on') {
                                            $objData->is_active = '1';
                                        } else {
                                            $objData->is_active = '0';
                                        }

                                        if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {

                                            $file = 'pdf-' . uniqid();
                                            $file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                                            if ($file_ext == 'pdf') {
                                                $target_path = 'uploads/' . $md['con'] . '/';
                                                $target_path = $target_path . $file . '.' . $file_ext;

                                                if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                                                    $objData->file = $target_path;
                                                }
                                            }
                                        }
                                        global $DB;
                                        $DB->Save($md['table'], $objData);
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
                                    }
                                } else {
                                    header("Location: " . Request::$BASE_PATH);
                                }
                                $objPresenter->AddTemplate($md['con'] . '/new');
                                break;
                            case 'edit':
                                if (Content::validate($md['con'], 'edit')) {
                                    if ($parameters[2] != '' && isset($parameters[2])) {
                                        if (Request::hasPostVariables()) {
                                            $objData = Request::getPostVariables();
                                            if (isset($objData->active) && $objData->active == 'on') {
                                                $objData->is_active = '1';
                                            } else {
                                                $objData->is_active = '0';
                                            }
                                            if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {
                                                $file = 'pdf-' . uniqid();
                                                $file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                                                if ($file_ext == 'pdf') {
                                                    $target_path = 'uploads/' . $md['con'] . '/';
                                                    $target_path = $target_path . $file . '.' . $file_ext;
                                                    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                                                        if (!empty($objData->file_name)) {
                                                            @unlink($objData->file_name);
                                                        }
                                                        $objData->file_name = $target_path;
                                                    }
                                                }
                                            }
                                            $objData->file = $objData->file_name;
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH . $md['con']);
                                        } else {
                                            $id = intval($parameters[2]);
                                            $Data = Content::find_by_id($id, $md['table']);
                                            $objPresenter->AddParameter('Data', $Data);
                                        }
                                        $objPresenter->AddTemplate($md['con'] . '/edit');
                                    } else {
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
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
                    $md['table'] = $parameters[0];
                    $md['con'] = $parameters[0];
                    $md['text'] = 'Blogs';
                    $md['stext'] = 'Blog';
                    $objPresenter->AddParameter('md', $md);
                    if (!isset($parameters[1]) || empty($parameters[1])) {
                        if (Content::validate($md['con'], 'view')) {
                            $Data = Content::blogs();
                            $objPresenter->AddParameter('Data', $Data);
                            $objPresenter->AddTemplate($md['con'] . '/all');
                        } else {
                            header("Location: " . Request::$BASE_PATH);
                        }
                    } else {
                        switch ($parameters[1]) {
                            case 'new':
                                if (Content::validate($md['con'], 'add')) {
                                    if (Request::hasPostVariables()) {
                                        $objData = Request::getPostVariables();

                                        $objData->created = date('Y-m-d H:i:s');
                                        if (isset($objData->active) && $objData->active == 'on') {
                                            $objData->is_active = '1';
                                        } else {
                                            $objData->is_active = '0';
                                        }
                                        if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {

                                            $file = 'post-' . uniqid();
                                            $file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                                            if ($file_ext == 'png' || $file_ext == 'jpg' || $file_ext == 'gif' || $file_ext == 'jpeg') {
                                                $target_path = 'uploads/' . $md['con'] . '/';
                                                $target_path = $target_path . $file . '.' . $file_ext;

                                                if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                                                    $objData->image = $target_path;
                                                }
                                            }
                                        }
                                        global $DB;
                                        $DB->Save($md['table'], $objData);
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
                                    }
                                } else {
                                    header("Location: " . Request::$BASE_PATH);
                                }
                                $categories = Content::AllActive('blogcategories');
                                $objPresenter->AddParameter('categories', $categories);
                                $objPresenter->AddTemplate($md['con'] . '/new');
                                break;
                            case 'edit':
                                if (Content::validate($md['con'], 'edit')) {
                                    if ($parameters[2] != '' && isset($parameters[2])) {
                                        if (Request::hasPostVariables()) {
                                            $objData = Request::getPostVariables();
                                            if (isset($objData->active) && $objData->active == 'on') {
                                                $objData->is_active = '1';
                                            } else {
                                                $objData->is_active = '0';
                                            }

                                            if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {
                                                $file = 'post-' . uniqid();
                                                $file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                                                if ($file_ext == 'png' || $file_ext == 'jpg' || $file_ext == 'gif' || $file_ext == 'jpeg') {
                                                    $target_path = 'uploads/' . $md['con'] . '/';
                                                    $target_path = $target_path . $file . '.' . $file_ext;
                                                    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                                                        if (!empty($objData->file_name)) {
                                                            @unlink($objData->file_name);
                                                        }
                                                        $objData->file_name = $target_path;
                                                    }
                                                }
                                            }
                                            $objData->image = $objData->file_name;
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH . $md['con']);
                                        } else {
                                            $id = intval($parameters[2]);
                                            $Data = Content::find_by_id($id, $md['table']);
                                            $objPresenter->AddParameter('Data', $Data);
                                            $categories = Content::AllActive('blogcategories');
                                            $objPresenter->AddParameter('categories', $categories);
                                        }
                                        $objPresenter->AddTemplate($md['con'] . '/edit');
                                    } else {
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
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
                    $md['table'] = $parameters[0];
                    $md['con'] = $parameters[0];
                    $md['text'] = 'Sponsors';
                    $md['stext'] = 'Sponsor';
                    $objPresenter->AddParameter('md', $md);
                    if (!isset($parameters[1]) || empty($parameters[1])) {
                        if (Content::validate($md['con'], 'view')) {
                            $Data = Content::sponsors();
                            $objPresenter->AddParameter('Data', $Data);
                            $objPresenter->AddTemplate($md['con'] . '/all');
                        } else {
                            header("Location: " . Request::$BASE_PATH);
                        }
                    } else {
                        switch ($parameters[1]) {
                            case 'new':
                                if (Content::validate($md['con'], 'add')) {
                                    if (Request::hasPostVariables()) {
                                        $objData = Request::getPostVariables();

                                        $objData->created = date('Y-m-d H:i:s');
                                        if (isset($objData->active) && $objData->active == 'on') {
                                            $objData->is_active = '1';
                                        } else {
                                            $objData->is_active = '0';
                                        }
                                        if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {

                                            $file = 'post-' . uniqid();
                                            $file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                                            if ($file_ext == 'png' || $file_ext == 'jpg' || $file_ext == 'gif' || $file_ext == 'jpeg') {
                                                $target_path = 'uploads/' . $md['con'] . '/';
                                                $target_path = $target_path . $file . '.' . $file_ext;

                                                if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                                                    $objData->image = $target_path;
                                                }
                                            }
                                        }
                                        global $DB;
                                        $DB->Save($md['table'], $objData);
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
                                    }
                                } else {
                                    header("Location: " . Request::$BASE_PATH);
                                }
                                $categories = Content::AllActive('sponsorcategories');
                                $objPresenter->AddParameter('categories', $categories);
                                $objPresenter->AddTemplate($md['con'] . '/new');
                                break;
                            case 'edit':
                                if (Content::validate($md['con'], 'edit')) {
                                    if ($parameters[2] != '' && isset($parameters[2])) {
                                        if (Request::hasPostVariables()) {
                                            $objData = Request::getPostVariables();
                                            if (isset($objData->active) && $objData->active == 'on') {
                                                $objData->is_active = '1';
                                            } else {
                                                $objData->is_active = '0';
                                            }

                                            if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {
                                                $file = 'post-' . uniqid();
                                                $file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                                                if ($file_ext == 'png' || $file_ext == 'jpg' || $file_ext == 'gif' || $file_ext == 'jpeg') {
                                                    $target_path = 'uploads/' . $md['con'] . '/';
                                                    $target_path = $target_path . $file . '.' . $file_ext;
                                                    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                                                        if (!empty($objData->file_name)) {
                                                            @unlink($objData->file_name);
                                                        }
                                                        $objData->file_name = $target_path;
                                                    }
                                                }
                                            }
                                            $objData->image = $objData->file_name;
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH . $md['con']);
                                        } else {
                                            $id = intval($parameters[2]);
                                            $Data = Content::find_by_id($id, $md['table']);
                                            $objPresenter->AddParameter('Data', $Data);
                                            $categories = Content::AllActive('sponsorcategories');
                                            $objPresenter->AddParameter('categories', $categories);
                                        }
                                        $objPresenter->AddTemplate($md['con'] . '/edit');
                                    } else {
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
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
                    $md['table'] = $parameters[0];
                    $md['con'] = $parameters[0];
                    $md['text'] = 'Events';
                    $md['stext'] = 'Event';
                    $objPresenter->AddParameter('md', $md);
                    if (!isset($parameters[1]) || empty($parameters[1])) {
                        if (Content::validate($md['con'], 'view')) {
                            $Data = Content::all('events');
                            $objPresenter->AddParameter('Data', $Data);
                            $objPresenter->AddTemplate($md['con'] . '/all');
                        } else {
                            header("Location: " . Request::$BASE_PATH);
                        }
                    } else {
                        switch ($parameters[1]) {
                            case 'new':
                                if (Content::validate($md['con'], 'add')) {
                                    if (Request::hasPostVariables()) {
                                        $objData = Request::getPostVariables();

                                        $objData->created = date('Y-m-d H:i:s');
                                        if (isset($objData->active) && $objData->active == 'on') {
                                            $objData->is_active = '1';
                                        } else {
                                            $objData->is_active = '0';
                                        }
                                        if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {

                                            $file = 'post-' . uniqid();
                                            $file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                                            if ($file_ext == 'png' || $file_ext == 'jpg' || $file_ext == 'gif' || $file_ext == 'jpeg') {
                                                $target_path = 'uploads/' . $md['con'] . '/';
                                                $target_path = $target_path . $file . '.' . $file_ext;

                                                if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                                                    $objData->image = $target_path;
                                                }
                                            }
                                        }
                                        global $DB;
                                        $DB->Save($md['table'], $objData);
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
                                    }
                                } else {
                                    header("Location: " . Request::$BASE_PATH);
                                }

                                $objPresenter->AddTemplate($md['con'] . '/new');
                                break;
                            case 'edit':
                                if (Content::validate($md['con'], 'edit')) {
                                    if ($parameters[2] != '' && isset($parameters[2])) {
                                        if (Request::hasPostVariables()) {
                                            $objData = Request::getPostVariables();
                                            if (isset($objData->active) && $objData->active == 'on') {
                                                $objData->is_active = '1';
                                            } else {
                                                $objData->is_active = '0';
                                            }

                                            if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {
                                                $file = 'post-' . uniqid();
                                                $file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                                                if ($file_ext == 'png' || $file_ext == 'jpg' || $file_ext == 'gif' || $file_ext == 'jpeg') {
                                                    $target_path = 'uploads/' . $md['con'] . '/';
                                                    $target_path = $target_path . $file . '.' . $file_ext;
                                                    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                                                        if (!empty($objData->file_name)) {
                                                            @unlink($objData->file_name);
                                                        }
                                                        $objData->file_name = $target_path;
                                                    }
                                                }
                                            }
                                            $objData->image = $objData->file_name;
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH . $md['con']);
                                        } else {
                                            $id = intval($parameters[2]);
                                            $Data = Content::find_by_id($id, $md['table']);
                                            $objPresenter->AddParameter('Data', $Data);
                                        }
                                        $objPresenter->AddTemplate($md['con'] . '/edit');
                                    } else {
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
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
                    $md['table'] = $parameters[0];
                    $md['con'] = $parameters[0];
                    $md['text'] = 'Banners';
                    $md['stext'] = 'Banner';
                    $objPresenter->AddParameter('md', $md);
                    if (!isset($parameters[1]) || empty($parameters[1])) {
                        if (Content::validate($md['con'], 'view')) {
                            $Data = Content::All($md['table']);
                            $objPresenter->AddParameter('Data', $Data);
                            $objPresenter->AddTemplate($md['con'] . '/all');
                        } else {
                            header("Location: " . Request::$BASE_PATH);
                        }
                    } else {
                        switch ($parameters[1]) {
                            case 'new':
                                if (Content::validate($md['con'], 'add')) {
                                    if (Request::hasPostVariables()) {
                                        $objData = Request::getPostVariables();

                                        $objData->created = date('Y-m-d H:i:s');
                                        if (isset($objData->active) && $objData->active == 'on') {
                                            $objData->is_active = '1';
                                        } else {
                                            $objData->is_active = '0';
                                        }
                                        if (isset($objData->featured) && $objData->featured == 'on') {
                                            $objData->is_featured = '1';
                                        } else {
                                            $objData->is_featured = '0';
                                        }

                                        if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {

                                            $file = 'poineers-' . uniqid();
                                            $file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                                            if ($file_ext == 'png' || $file_ext == 'jpg' || $file_ext == 'jpeg') {
                                                $target_path = 'uploads/' . $md['con'] . '/';
                                                $target_path = $target_path . $file . '.' . $file_ext;

                                                if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                                                    $objData->image = $target_path;
                                                }
                                            }
                                        }
                                        global $DB;
                                        $DB->Save($md['table'], $objData);
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
                                    }
                                } else {
                                    header("Location: " . Request::$BASE_PATH);
                                }
                                $objPresenter->AddTemplate($md['con'] . '/new');
                                break;
                            case 'edit':
                                if (Content::validate($md['con'], 'edit')) {
                                    if ($parameters[2] != '' && isset($parameters[2])) {
                                        if (Request::hasPostVariables()) {
                                            $objData = Request::getPostVariables();
                                            if (isset($objData->active) && $objData->active == 'on') {
                                                $objData->is_active = '1';
                                            } else {
                                                $objData->is_active = '0';
                                            }

                                            if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {
                                                $file = 'poineers-' . uniqid();
                                                $file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                                                if ($file_ext == 'png' || $file_ext == 'jpg' || $file_ext == 'jpeg') {
                                                    $target_path = 'uploads/' . $md['con'] . '/';
                                                    $target_path = $target_path . $file . '.' . $file_ext;
                                                    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                                                        if (!empty($objData->file_name)) {
                                                            @unlink($objData->file_name);
                                                        }
                                                        $objData->file_name = $target_path;
                                                    }
                                                }
                                            }

                                            $objData->image = $objData->file_name;
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH . $md['con']);
                                        } else {
                                            $id = intval($parameters[2]);
                                            $Data = Content::find_by_id($id, $md['table']);
                                            $objPresenter->AddParameter('Data', $Data);
                                        }
                                        $objPresenter->AddTemplate($md['con'] . '/edit');
                                    } else {
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
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
            case 'abouts':
                if (Session::isUserOnline()) {
                    $md['table'] = $parameters[0];
                    $md['con'] = $parameters[0];
                    $md['text'] = 'About';
                    $md['stext'] = 'About';
                    $objPresenter->AddParameter('md', $md);
                    if (!isset($parameters[1]) || empty($parameters[1])) {
                        if (Content::validate($md['con'], 'view')) {
                            $Data = Content::all('abouts');
                            $objPresenter->AddParameter('Data', $Data);
                            $objPresenter->AddTemplate($md['con'] . '/all');
                        } else {
                            header("Location: " . Request::$BASE_PATH);
                        }
                    } else {
                        switch ($parameters[1]) {
                            case 'new':
                                if (Content::validate($md['con'], 'add')) {
                                    if (Request::hasPostVariables()) {
                                        $objData = Request::getPostVariables();

                                        $objData->created = date('Y-m-d H:i:s');
                                       
                                        if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {

                                            $file = 'about-' . uniqid();
                                            $file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                                            if ($file_ext == 'png' || $file_ext == 'jpg' || $file_ext == 'gif' || $file_ext == 'jpeg') {
                                                $target_path = 'uploads/';
                                                $target_path = $target_path . $file . '.' . $file_ext;

                                                if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                                                    $objData->image = $target_path;
                                                }
                                            }
                                        }
                                        global $DB;
                                        $DB->Save($md['table'], $objData);
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
                                    }
                                } else {
                                    header("Location: " . Request::$BASE_PATH);
                                }
                                $categories = Content::AllActive('blogcategories');
                                $objPresenter->AddParameter('categories', $categories);
                                $objPresenter->AddTemplate($md['con'] . '/new');
                                break;
                            case 'edit':
                                if (Content::validate($md['con'], 'edit')) {
                                    if ($parameters[2] != '' && isset($parameters[2])) {
                                        if (Request::hasPostVariables()) {
                                            $objData = Request::getPostVariables();
                                            if (isset($objData->active) && $objData->active == 'on') {
                                                $objData->is_active = '1';
                                            } else {
                                                $objData->is_active = '0';
                                            }

                                            if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {
                                                $file = 'about-' . uniqid();
                                                $file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                                                if ($file_ext == 'png' || $file_ext == 'jpg' || $file_ext == 'gif' || $file_ext == 'jpeg') {
                                                    $target_path = 'uploads/';
                                                    $target_path = $target_path . $file . '.' . $file_ext;
                                                    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                                                        if (!empty($objData->file_name)) {
                                                            @unlink($objData->file_name);
                                                        }
                                                        $objData->file_name = $target_path;
                                                    }
                                                }
                                            }
                                            $objData->image = $objData->file_name;
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH . $md['con']);
                                        } else {
                                            $id = intval($parameters[2]);
                                            $Data = Content::find_by_id($id, $md['table']);
                                            $objPresenter->AddParameter('Data', $Data);
                                            
                                        }
                                        $objPresenter->AddTemplate($md['con'] . '/edit');
                                    } else {
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
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
             case 'albums':
                if (Session::isUserOnline()) {
                    $md['table'] = $parameters[0];
                    $md['con'] = $parameters[0];
                    $md['text'] = 'Albums';
                    $md['stext'] = 'Album';
                    $objPresenter->AddParameter('md', $md);
                    if (!isset($parameters[1]) || empty($parameters[1])) {
                        if (Content::validate($md['con'], 'view')) {
                            $Data = Content::getallWhere("*","albums","parent_id=0");
                            $objPresenter->AddParameter('Data', $Data);
                            $objPresenter->AddTemplate($md['con'] . '/all');
                        } else {
                            header("Location: " . Request::$BASE_PATH);
                        }
                    } else {
                        switch ($parameters[1]) {
                            case 'new':
                                if (Content::validate($md['con'], 'add')) {
                                    if (Request::hasPostVariables()) {
                                        $objData = Request::getPostVariables();
                                       
                                        $objData->created_at= date('Y-m-d H:i:s');
                                        
                                        if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {
                                            $file = 'album-' . uniqid();
                                           
                                            $file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                                            if ($file_ext == 'png' || $file_ext == 'jpg' || $file_ext == 'gif' || $file_ext == 'jpeg') {
                                                $target_path = 'uploads/' . $md['con'] . '/';
                                                $target_path = $target_path . $file . '.' . $file_ext;
                                                $d=move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
                                               // print_r($d); exit;
                                                if ($d) {
                                                    $objData->image = $target_path;
                                                }
                                            }
                                        }
                                        global $DB;
                                        $DB->Save($md['table'], $objData);
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
                                    }
                                } else {
                                    header("Location: " . Request::$BASE_PATH);
                                }
                                $categories = Content::AllActive('sponsorcategories');
                                $objPresenter->AddParameter('categories', $categories);
                                $objPresenter->AddTemplate($md['con'] . '/new');
                                break;
                            case 'edit':
                                if (Content::validate($md['con'], 'edit')) {
                                    if ($parameters[2] != '' && isset($parameters[2])) {
                                        if (Request::hasPostVariables()) {
                                            $objData = Request::getPostVariables();
                                            if (isset($objData->active) && $objData->active == 'on') {
                                                $objData->is_active = '1';
                                            } else {
                                                $objData->is_active = '0';
                                            }

                                            if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {
                                                $file = 'post-' . uniqid();
                                                $file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                                                if ($file_ext == 'png' || $file_ext == 'jpg' || $file_ext == 'gif' || $file_ext == 'jpeg') {
                                                    $target_path = 'uploads/' . $md['con'] . '/';
                                                    $target_path = $target_path . $file . '.' . $file_ext;
                                                    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                                                        if (!empty($objData->file_name)) {
                                                            @unlink($objData->file_name);
                                                        }
                                                        $objData->file_name = $target_path;
                                                    }
                                                }
                                            }
                                            $objData->image = $objData->file_name;
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH . $md['con']);
                                        } else {
                                            $id = intval($parameters[2]);
                                            $Data = Content::find_by_id($id, $md['table']);
                                            $objPresenter->AddParameter('Data', $Data);
                                            $categories = Content::AllActive('sponsorcategories');
                                            $objPresenter->AddParameter('categories', $categories);
                                        }
                                        $objPresenter->AddTemplate($md['con'] . '/edit');
                                    } else {
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
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
             case 'pictures':
                if (Session::isUserOnline()) {
                    $md['table'] = $parameters[0];
                    $md['con'] = $parameters[0];
                    $md['text'] = 'Pictures';
                    $md['stext'] = 'Picture';
                    $objPresenter->AddParameter('md', $md);
                    if (!isset($parameters[1]) || empty($parameters[1])) {
                        if (Content::validate($md['con'], 'view')) {
                            $Data = Content::pictures();
                            $objPresenter->AddParameter('Data', $Data);
                            $objPresenter->AddTemplate($md['con'] . '/all');
                        } else {
                            header("Location: " . Request::$BASE_PATH);
                        }
                    } else {
                        switch ($parameters[1]) {
                            case 'new':
                                if (Content::validate($md['con'], 'add')) {
                                    if (Request::hasPostVariables()) {
                                        $objData = Request::getPostVariables();
                                       
                                        $objData->created_at= date('Y-m-d H:i:s');
                                        
                                        if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {
                                            $file = 'album-' . uniqid();
                                           
                                            $file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                                            if ($file_ext == 'png' || $file_ext == 'jpg' || $file_ext == 'gif' || $file_ext == 'jpeg') {
                                                $target_path = 'uploads/' . $md['con'] . '/';
                                                $target_path = $target_path . $file . '.' . $file_ext;
                                                $d=move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
                                               // print_r($d); exit;
                                                if ($d) {
                                                    $objData->image = $target_path;
                                                }
                                            }
                                        }
                                        global $DB;
                                        $DB->Save($md['table'], $objData);
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
                                    }
                                } else {
                                    header("Location: " . Request::$BASE_PATH);
                                }
                                $albums = Content::getallWhere("*","albums","type=1");
                                $objPresenter->AddParameter('albums', $albums);
                                $objPresenter->AddTemplate($md['con'] . '/new');
                                break;
                            case 'edit':
                                if (Content::validate($md['con'], 'edit')) {
                                    if ($parameters[2] != '' && isset($parameters[2])) {
                                        if (Request::hasPostVariables()) {
                                            $objData = Request::getPostVariables();
                                            if (isset($objData->active) && $objData->active == 'on') {
                                                $objData->is_active = '1';
                                            } else {
                                                $objData->is_active = '0';
                                            }

                                            if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {
                                                $file = 'post-' . uniqid();
                                                $file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                                                if ($file_ext == 'png' || $file_ext == 'jpg' || $file_ext == 'gif' || $file_ext == 'jpeg') {
                                                    $target_path = 'uploads/' . $md['con'] . '/';
                                                    $target_path = $target_path . $file . '.' . $file_ext;
                                                    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                                                        if (!empty($objData->file_name)) {
                                                            @unlink($objData->file_name);
                                                        }
                                                        $objData->file_name = $target_path;
                                                    }
                                                }
                                            }
                                            $objData->image = $objData->file_name;
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH . $md['con']);
                                        } else {
                                            $id = intval($parameters[2]);
                                            $Data = Content::find_by_id($id, $md['table']);
                                            $objPresenter->AddParameter('Data', $Data);
                                            $albums = Content::getallWhere("*","albums","type=1");
                                            $objPresenter->AddParameter('albums', $albums);
                                        }
                                        $objPresenter->AddTemplate($md['con'] . '/edit');
                                    } else {
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
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
                    $md['table'] = $parameters[0];
                    $md['con'] = $parameters[0];
                    $md['text'] = 'Videos';
                    $md['stext'] = 'Video';
                    $objPresenter->AddParameter('md', $md);
                    if (!isset($parameters[1]) || empty($parameters[1])) {
                        if (Content::validate($md['con'], 'view')) {
                            $Data = Content::videos();
                            $objPresenter->AddParameter('Data', $Data);
                            $objPresenter->AddTemplate($md['con'] . '/all');
                        } else {
                            header("Location: " . Request::$BASE_PATH);
                        }
                    } else {
                        switch ($parameters[1]) {
                            case 'new':
                                if (Content::validate($md['con'], 'add')) {
                                    if (Request::hasPostVariables()) {
                                        $objData = Request::getPostVariables();

                                        $objData->created = date('Y-m-d H:i:s');
                                        if (isset($objData->active) && $objData->active == 'on') {
                                            $objData->is_active = '1';
                                        } else {
                                            $objData->is_active = '0';
                                        }
                                        global $DB;
                                        $DB->Save($md['table'], $objData);
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
                                    }
                                    $albums = Content::getallWhere("*","albums","type=2");
                                            $objPresenter->AddParameter('albums', $albums);
                                } else {
                                    header("Location: " . Request::$BASE_PATH);
                                }
                                $objPresenter->AddTemplate($md['con'] . '/new');
                                break;
                            case 'edit':
                                if (Content::validate($md['con'], 'edit')) {
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
                                            header("Location: " . Request::$BASE_PATH . $md['con']);
                                        } else {
                                            $id = intval($parameters[2]);
                                            $Data = Content::find_by_id($id, $md['table']);
                                            $objPresenter->AddParameter('Data', $Data);
                                        }
                                        $albums = Content::getallWhere("*","albums","type=2");
                                            $objPresenter->AddParameter('albums', $albums);
                                        $objPresenter->AddTemplate($md['con'] . '/edit');
                                    } else {
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
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
                    $md['table'] = $parameters[0];
                    $md['con'] = $parameters[0];
                    $md['text'] = 'Categories';
                    $md['stext'] = 'Category';
                    $objPresenter->AddParameter('md', $md);
                    if (!isset($parameters[1]) || empty($parameters[1])) {
                        if (Content::validate($md['con'], 'view')) {
                            $Data = Content::All($md['table']);
                            $objPresenter->AddParameter('Data', $Data);
                            $objPresenter->AddTemplate($md['con'] . '/all');
                        } else {
                            header("Location: " . Request::$BASE_PATH);
                        }
                    } else {
                        switch ($parameters[1]) {
                            case 'new':
                                if (Content::validate($md['con'], 'add')) {
                                    if (Request::hasPostVariables()) {
                                        $objData = Request::getPostVariables();

                                        $objData->created = date('Y-m-d H:i:s');
                                        if (isset($objData->active) && $objData->active == 'on') {
                                            $objData->is_active = '1';
                                        } else {
                                            $objData->is_active = '0';
                                        }
                                        global $DB;
                                        $DB->Save($md['table'], $objData);
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
                                    }
                                } else {
                                    header("Location: " . Request::$BASE_PATH);
                                }
                                $objPresenter->AddTemplate($md['con'] . '/new');
                                break;
                            case 'edit':
                                if (Content::validate($md['con'], 'edit')) {
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
                                            header("Location: " . Request::$BASE_PATH . $md['con']);
                                        } else {
                                            $id = intval($parameters[2]);
                                            $Data = Content::find_by_id($id, $md['table']);
                                            $objPresenter->AddParameter('Data', $Data);
                                        }
                                        $objPresenter->AddTemplate($md['con'] . '/edit');
                                    } else {
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
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
             // ======================================= Faqs ================================
             case 'faqs':
                if (Session::isUserOnline()) {
                    $md['table'] = $parameters[0];
                    $md['con'] = $parameters[0];
                    $md['text'] = 'Faqs';
                    $md['stext'] = 'Faq';
                    $objPresenter->AddParameter('md', $md);
                    if (!isset($parameters[1]) || empty($parameters[1])) {
                        if (Content::validate($md['con'], 'view')) {
                            $Data = Content::All($md['table']);
                            $objPresenter->AddParameter('Data', $Data);
                            $objPresenter->AddTemplate($md['con'] . '/all');
                        } else {
                            header("Location: " . Request::$BASE_PATH);
                        }
                    } else {
                        switch ($parameters[1]) {
                            case 'new':
                                if (Content::validate($md['con'], 'add')) {
                                    if (Request::hasPostVariables()) {
                                        $objData = Request::getPostVariables();

                                        $objData->created_at = date('Y-m-d H:i:s');
                                        
                                        global $DB;
                                        $DB->Save($md['table'], $objData);
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
                                    }
                                } else {
                                    header("Location: " . Request::$BASE_PATH);
                                }
                                $objPresenter->AddTemplate($md['con'] . '/new');
                                break;
                            case 'edit':
                                if (Content::validate($md['con'], 'edit')) {
                                    if ($parameters[2] != '' && isset($parameters[2])) {
                                        if (Request::hasPostVariables()) {
                                            $objData = Request::getPostVariables();
                                            $objData->updated_at = date('Y-m-d H:i:s');
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH . $md['con']);
                                        } else {
                                            $id = intval($parameters[2]);
                                            $Data = Content::find_by_id($id, $md['table']);
                                            $objPresenter->AddParameter('Data', $Data);
                                        }
                                        $objPresenter->AddTemplate($md['con'] . '/edit');
                                    } else {
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
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
            // ======================================= Benefits ================================
            case 'benefits':
                if (Session::isUserOnline()) {
                    $md['table'] = $parameters[0];
                    $md['con'] = $parameters[0];
                    $md['text'] = 'Benefits';
                    $md['stext'] = 'Benefits';
                    $objPresenter->AddParameter('md', $md);
                    if (!isset($parameters[1]) || empty($parameters[1])) {
                        if (Content::validate($md['con'], 'view')) {
                            $Data = Content::All($md['table']);
                            $objPresenter->AddParameter('Data', $Data);
                            $objPresenter->AddTemplate($md['con'] . '/all');
                        } else {
                            header("Location: " . Request::$BASE_PATH);
                        }
                    } else {
                        switch ($parameters[1]) {
                            case 'new':
                                if (Content::validate($md['con'], 'add')) {
                                    if (Request::hasPostVariables()) {
                                        $objData = Request::getPostVariables();

                                        $objData->created_at = date('Y-m-d H:i:s');
                                        
                                        global $DB;
                                        $DB->Save($md['table'], $objData);
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
                                    }
                                } else {
                                    header("Location: " . Request::$BASE_PATH);
                                }
                                $objPresenter->AddTemplate($md['con'] . '/new');
                                break;
                            case 'edit':
                                if (Content::validate($md['con'], 'edit')) {
                                    if ($parameters[2] != '' && isset($parameters[2])) {
                                        if (Request::hasPostVariables()) {
                                            $objData = Request::getPostVariables();
                                            $objData->updated_at = date('Y-m-d H:i:s');
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH . $md['con']);
                                        } else {
                                            $id = intval($parameters[2]);
                                            $Data = Content::find_by_id($id, $md['table']);
                                            $objPresenter->AddParameter('Data', $Data);
                                        }
                                        $objPresenter->AddTemplate($md['con'] . '/edit');
                                    } else {
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
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
            // ======================================= Benefits ================================
            case 'settings':
                if (Session::isUserOnline()) {
                    $md['table'] = $parameters[0];
                    $md['con'] = $parameters[0];
                    $md['text'] = 'Settings';
                    $md['stext'] = 'Setting';
                    $objPresenter->AddParameter('md', $md);
                    if (!isset($parameters[1]) || empty($parameters[1])) {
                        if (Content::validate($md['con'], 'view')) {
                            $Data = Content::All($md['table']);
                            $objPresenter->AddParameter('Data', $Data);
                            $objPresenter->AddTemplate($md['con'] . '/all');
                        } else {
                            header("Location: " . Request::$BASE_PATH);
                        }
                    } else {
                        switch ($parameters[1]) {
                            case 'new':
                                if (Content::validate($md['con'], 'add')) {
                                    if (Request::hasPostVariables()) {
                                        $objData = Request::getPostVariables();

                                        $objData->created_at = date('Y-m-d H:i:s');
                                        $objData->created_by=1;
                                        global $DB;
                                        $DB->Save($md['table'], $objData);
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
                                    }
                                } else {
                                    header("Location: " . Request::$BASE_PATH);
                                }
                                $objPresenter->AddTemplate($md['con'] . '/new');
                                break;
                            case 'edit':
                                if (Content::validate($md['con'], 'edit')) {
                                    if ($parameters[2] != '' && isset($parameters[2])) {
                                        if (Request::hasPostVariables()) {
                                            $objData = Request::getPostVariables();
                                            $objData->updated_at = date('Y-m-d H:i:s');
                                            $objData->created_by=1;
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH . $md['con']);
                                        } else {
                                            $id = intval($parameters[2]);
                                            $Data = Content::find_by_id($id, $md['table']);
                                            $objPresenter->AddParameter('Data', $Data);
                                        }
                                        $objPresenter->AddTemplate($md['con'] . '/edit');
                                    } else {
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
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
            // ======================================= Pages ================================
            case 'pages':
                if (Session::isUserOnline()) {
                    $md['table'] = $parameters[0];
                    $md['con'] = $parameters[0];
                    $md['text'] = 'Pages';
                    $md['stext'] = 'Page';
                    $objPresenter->AddParameter('md', $md);
                    if (!isset($parameters[1]) || empty($parameters[1])) {
                        if (Content::validate($md['con'], 'view')) {
                            $Data = Content::All($md['table']);
                            $objPresenter->AddParameter('Data', $Data);
                            $objPresenter->AddTemplate($md['con'] . '/all');
                        } else {
                            header("Location: " . Request::$BASE_PATH);
                        }
                    } else {
                        switch ($parameters[1]) {
                            case 'new':
                                if (Content::validate($md['con'], 'add')) {
                                    if (Request::hasPostVariables()) {
                                        $objData = Request::getPostVariables();
                                        $objData->slug=Content::clean($objData->name);
                                        $objData->created_at = date('Y-m-d H:i:s');
                                        
                                        global $DB;
                                        $DB->Save($md['table'], $objData);
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
                                    }
                                } else {
                                    header("Location: " . Request::$BASE_PATH);
                                }
                                $objPresenter->AddTemplate($md['con'] . '/new');
                                break;
                            case 'edit':
                                if (Content::validate($md['con'], 'edit')) {
                                    if ($parameters[2] != '' && isset($parameters[2])) {
                                        if (Request::hasPostVariables()) {
                                            $objData = Request::getPostVariables();
                                            $objData->slug=Content::clean($objData->name);
                                            $objData->updated_at = date('Y-m-d H:i:s');
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH . $md['con']);
                                        } else {
                                            $id = intval($parameters[2]);
                                            $Data = Content::find_by_id($id, $md['table']);
                                            $objPresenter->AddParameter('Data', $Data);
                                        }
                                        $objPresenter->AddTemplate($md['con'] . '/edit');
                                    } else {
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
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
             // ======================================= Contacts ================================
             case 'contacts':
                if (Session::isUserOnline()) {
                    $md['table'] = $parameters[0];
                    $md['con'] = $parameters[0];
                    $md['text'] = 'Contacts';
                    $md['stext'] = 'Contact';
                    $objPresenter->AddParameter('md', $md);
                    if (!isset($parameters[1]) || empty($parameters[1])) {
                        if (Content::validate($md['con'], 'view')) {
                            $Data = Content::contacts();
                            $objPresenter->AddParameter('Data', $Data);
                            $objPresenter->AddTemplate($md['con'] . '/all');
                        } else {
                            header("Location: " . Request::$BASE_PATH);
                        }
                    } else {
                        switch ($parameters[1]) {
                            case 'new':
                                if (Content::validate($md['con'], 'add')) {
                                    if (Request::hasPostVariables()) {
                                        $objData = Request::getPostVariables();
                                        $objData->created_at = date('Y-m-d H:i:s');
                                        
                                        global $DB;
                                        $DB->Save($md['table'], $objData);
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
                                    }
                                } else {
                                    header("Location: " . Request::$BASE_PATH);
                                }
                                $objPresenter->AddTemplate($md['con'] . '/new');
                                break;
                            case 'edit':
                                if (Content::validate($md['con'], 'edit')) {
                                    if ($parameters[2] != '' && isset($parameters[2])) {
                                        if (Request::hasPostVariables()) {
                                            $objData = Request::getPostVariables();
                                            $objData->updated_at = date('Y-m-d H:i:s');
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH . $md['con']);
                                        } else {
                                            $id = intval($parameters[2]);
                                            $Data = Content::find_by_id($id, $md['table']);
                                            $objPresenter->AddParameter('Data', $Data);
                                        }
                                        $objPresenter->AddTemplate($md['con'] . '/edit');
                                    } else {
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
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


                    if (isset($_GET['catID']) && !empty($_GET['catID'])) {
                        $cat_id = intval($_GET['catID']);
                        $cat = Content::find_by_id($cat_id, 'categories');
                        $objPresenter->AddParameter('cat', $cat);
                        $md['table'] = 'quranaudios';
                        $md['con'] = 'quranaudiocat';
                        $md['text'] = ' Category Audios';
                        $md['stext'] = 'Category Audio';
                        $objPresenter->AddParameter('md', $md);
                        if (!isset($parameters[1]) || empty($parameters[1])) {
                            if (Content::validate($md['con'], 'single')) {
                                $Data = Content::quranaudiosByCat($cat_id);
                                $objPresenter->AddParameter('Data', $Data);
                                $objPresenter->AddTemplate($md['con'] . '/all');
                            } else {
                                header("Location: " . Request::$BASE_PATH);
                            }
                        } else {
                            switch ($parameters[1]) {

                                case 'new':
                                    if (Content::validate($md['con'], 'add')) {
                                        if (Request::hasPostVariables()) {
                                            $objData = Request::getPostVariables();
                                            $objData->category_id = $cat->id;
                                            $objData->created = date('Y-m-d H:i:s');
                                            if (isset($objData->active) && $objData->active == 'on') {
                                                $objData->is_active = '1';
                                            } else {
                                                $objData->is_active = '0';
                                            }

                                            if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {

                                                $file = 'audio-' . uniqid();
                                                $file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                                                if ($file_ext == 'mp3' || $file_ext == 'ogg' || $file_ext == 'mpeg3') {
                                                    $target_path = 'uploads/quranaudios/';
                                                    $target_path = $target_path . $file . '.' . $file_ext;

                                                    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                                                        $objData->file = $target_path;
                                                    }
                                                }
                                            }
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH . $md['con'] . '?catID=' . $cat->id);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    $categories = Content::AllActive('categories');
                                    $objPresenter->AddParameter('categories', $categories);
                                    $objPresenter->AddTemplate($md['con'] . '/new');
                                    break;
                                case 'edit':
                                    if (Content::validate($md['con'], 'edit')) {
                                        if ($parameters[2] != '' && isset($parameters[2])) {
                                            if (Request::hasPostVariables()) {
                                                $objData = Request::getPostVariables();
                                                $objData->category_id = $cat->id;
                                                if (isset($objData->active) && $objData->active == 'on') {
                                                    $objData->is_active = '1';
                                                } else {
                                                    $objData->is_active = '0';
                                                }
                                                if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {
                                                    $file = 'audio-' . uniqid();
                                                    $file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                                                    if ($file_ext == 'mp3' || $file_ext == 'ogg' || $file_ext == 'mpeg3') {
                                                        $target_path = 'uploads/quranaudios/';
                                                        $target_path = $target_path . $file . '.' . $file_ext;
                                                        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                                                            if (!empty($objData->file_name)) {
                                                                @unlink($objData->file_name);
                                                            }
                                                            $objData->file_name = $target_path;
                                                        }
                                                    }
                                                }
                                                $objData->file = $objData->file_name;
                                                global $DB;
                                                $DB->Save($md['table'], $objData);
                                                header("Location: " . Request::$BASE_PATH . $md['con'] . '?catID=' . $cat->id);
                                            } else {
                                                $id = intval($parameters[2]);
                                                $Data = Content::find_by_id($id, $md['table']);
                                                $categories = Content::AllActive('categories');
                                                $objPresenter->AddParameter('categories', $categories);
                                                $objPresenter->AddParameter('Data', $Data);
                                            }
                                            $objPresenter->AddTemplate($md['con'] . '/edit');
                                        } else {
                                            header("Location: " . Request::$BASE_PATH . $md['con'] . '?catID=' . $cat->id);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    break;
                            }
                        }
                    } else {
                        header("Location: " . Request::$BASE_PATH . 'categories');
                    }
                } else {
                    header("Location: " . Request::$BASE_PATH);
                }
                break;
                // ======================================= Post Categories ================================
            case 'blogcategories':
                if (Session::isUserOnline()) {
                    $md['table'] = $parameters[0];
                    $md['con'] = $parameters[0];
                    $md['text'] = "Blog's Categories";
                    $md['stext'] = "Blog's Category";
                    $objPresenter->AddParameter('md', $md);
                    if (!isset($parameters[1]) || empty($parameters[1])) {
                        if (Content::validate($md['con'], 'view')) {
                            $Data = Content::All($md['table']);
                            $objPresenter->AddParameter('Data', $Data);
                            $objPresenter->AddTemplate($md['con'] . '/all');
                        } else {
                            header("Location: " . Request::$BASE_PATH);
                        }
                    } else {
                        switch ($parameters[1]) {
                            case 'new':
                                if (Content::validate($md['con'], 'add')) {
                                    if (Request::hasPostVariables()) {
                                        $objData = Request::getPostVariables();

                                        $objData->created = date('Y-m-d H:i:s');
                                        if (isset($objData->active) && $objData->active == 'on') {
                                            $objData->is_active = '1';
                                        } else {
                                            $objData->is_active = '0';
                                        }
                                        global $DB;
                                        $DB->Save($md['table'], $objData);
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
                                    }
                                } else {
                                    header("Location: " . Request::$BASE_PATH);
                                }
                                $objPresenter->AddTemplate($md['con'] . '/new');
                                break;
                            case 'edit':
                                if (Content::validate($md['con'], 'edit')) {
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
                                            header("Location: " . Request::$BASE_PATH . $md['con']);
                                        } else {
                                            $id = intval($parameters[2]);
                                            $Data = Content::find_by_id($id, $md['table']);
                                            $objPresenter->AddParameter('Data', $Data);
                                        }
                                        $objPresenter->AddTemplate($md['con'] . '/edit');
                                    } else {
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
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
                case 'newsletters':
                    if (Session::isUserOnline()) {
                        $md['table'] = $parameters[0];
                        $md['con'] = $parameters[0];
                        $md['text'] = "News letters";
                        $md['stext'] = "news letter";
                        $objPresenter->AddParameter('md', $md);
                        if (!isset($parameters[1]) || empty($parameters[1])) {
                            if (Content::validate($md['con'], 'view')) {
                                $Data = Content::All($md['table']);
                                $objPresenter->AddParameter('Data', $Data);
                                $objPresenter->AddTemplate($md['con'] . '/all');
                            } else {
                                header("Location: " . Request::$BASE_PATH);
                            }
                        }
                    } else {
                        header("Location: " . Request::$BASE_PATH);
                    }
                    break;    
                // ======================================= Services ================================
            case 'services':
                if (Session::isUserOnline()) {
                    $md['table'] = $parameters[0];
                    $md['con'] = $parameters[0];
                    $md['text'] = 'Services';
                    $md['stext'] = 'Service';
                    $objPresenter->AddParameter('md', $md);
                    if (!isset($parameters[1]) || empty($parameters[1])) {
                        if (Content::validate($md['con'], 'view')) {
                            $Data = Content::services();
                            $objPresenter->AddParameter('Data', $Data);
                            $objPresenter->AddTemplate($md['con'] . '/all');
                        } else {
                            header("Location: " . Request::$BASE_PATH);
                        }
                    } else {
                        switch ($parameters[1]) {
                            case 'new':
                                if (Content::validate($md['con'], 'add')) {
                                    if (Request::hasPostVariables()) {
                                        $objData = Request::getPostVariables();
                                        $objData->category_id = implode(',', $objData->category_id);
                                        $objData->created = date('Y-m-d H:i:s');
                                        if (isset($objData->active) && $objData->active == 'on') {
                                            $objData->is_active = '1';
                                        } else {
                                            $objData->is_active = '0';
                                        }

                                        if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {

                                            $file = 'img-' . uniqid();
                                            $file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                                            if ($file_ext == 'png' || $file_ext == 'jpg' || $file_ext == 'jpeg' || $file_ext == 'gif') {
                                                $target_path = 'uploads/' . $md['con'] . '/';
                                                $target_path = $target_path . $file . '.' . $file_ext;

                                                if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                                                    $objData->file = $target_path;
                                                }
                                            }
                                        }
                                        global $DB;
                                        $DB->Save($md['table'], $objData);
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
                                    }
                                } else {
                                    header("Location: " . Request::$BASE_PATH);
                                }
                                $categories = Content::AllActive('categories');
                                $objPresenter->AddParameter('categories', $categories);
                                $objPresenter->AddTemplate($md['con'] . '/new');
                                break;
                            case 'edit':
                                if (Content::validate($md['con'], 'edit')) {
                                    if ($parameters[2] != '' && isset($parameters[2])) {
                                        if (Request::hasPostVariables()) {
                                            $objData = Request::getPostVariables();
                                            $objData->category_id = implode(',', $objData->category_id);

                                            if (isset($objData->active) && $objData->active == 'on') {
                                                $objData->is_active = '1';
                                            } else {
                                                $objData->is_active = '0';
                                            }
                                            if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {
                                                $file = 'img-' . uniqid();
                                                $file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                                                if ($file_ext == 'mp3' || $file_ext == 'ogg' || $file_ext == 'mpeg3') {
                                                    $target_path = 'uploads/' . $md['con'] . '/';
                                                    $target_path = $target_path . $file . '.' . $file_ext;
                                                    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                                                        if (!empty($objData->file_name)) {
                                                            @unlink($objData->file_name);
                                                        }
                                                        $objData->file_name = $target_path;
                                                    }
                                                }
                                            }
                                            $objData->file = $objData->file_name;
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH . $md['con']);
                                        } else {
                                            $id = intval($parameters[2]);
                                            $Data = Content::find_by_id($id, $md['table']);
                                            $categories = Content::AllActive('categories');
                                            $objPresenter->AddParameter('categories', $categories);
                                            $objPresenter->AddParameter('Data', $Data);
                                        }
                                        $objPresenter->AddTemplate($md['con'] . '/edit');
                                    } else {
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
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
                    if (Content::validate('section_sorting', 'view')) {

                        $objPresenter->AddTemplate('default/sorting');
                    } else {
                        header("Location: " . Request::$BASE_PATH);
                    }
                } else {
                    header("Location: " . Request::$BASE_PATH);
                }
                break;
                // ======================================= CATEGORIES ================================

                // ======================================= Companies ================================
            case 'companies':
                if (Session::isUserOnline()) {
                    $md['table'] = $parameters[0];
                    $md['con'] = $parameters[0];
                    $md['text'] = 'Companies';
                    $md['stext'] = 'Company';
                    $objPresenter->AddParameter('md', $md);
                    if (!isset($parameters[1]) || empty($parameters[1])) {
                        if (Content::validate($md['con'], 'view')) {
                            $Data = Content::companies();
                            $objPresenter->AddParameter('Data', $Data);
                            $objPresenter->AddTemplate($md['con'] . '/all');
                        } else {
                            header("Location: " . Request::$BASE_PATH);
                        }
                    } else {
                        switch ($parameters[1]) {
                            case 'new':
                                if (Content::validate($md['con'], 'add')) {
                                    if (Request::hasPostVariables()) {
                                        $objData = Request::getPostVariables();

                                        $objData->created_at = date('Y-m-d H:i:s');
                                        $objData->is_public = 1;
                                        $objData->status = 3;
                                        $objData->can_edit = 0;
                                        
                                        $where="id='".$objData->continent."'";
                                        $data=Content::getWhere('code','world_continents',$where);
                                       
                                        $objData->continent=$data->code;
                                        $where="id='".$objData->country."'";
                                        $data=Content::getWhere('code','world_countries',$where);
                                        $objData->country=$data->code;
                                        $where="id='".$objData->city."'";
                                        $data=Content::getWhere('code','world_cities',$where);
                                        if(isset($data->code) && !empty($data->code)){
                                            $objData->city=$data->code;
                                        }else{
                                            $where="id='".$objData->city."'";
                                        $data=Content::getWhere('name','world_cities',$where);
                                        $objData->city=$data->name;
                                        }
                                        
                                        $objData->user_id=0;
                                        // echo '<pre>';
                                        // print_r($objData);
                                        // exit;
                                        if (isset($_FILES['companylogo']['name']) && $_FILES['companylogo']['name'] != '') {

                                            $file = 'logo-' . uniqid();
                                            $file_ext = pathinfo($_FILES['companylogo']['name'], PATHINFO_EXTENSION);
                                            if ($file_ext == 'png' || $file_ext == 'jpg' || $file_ext == 'gif' || $file_ext == 'jpeg') {
                                                $target_path = '../public/uploads/';
                                                $logo=$file . '.' . $file_ext;
                                                $target_path = $target_path . $logo;

                                                if (move_uploaded_file($_FILES['companylogo']['tmp_name'], $target_path)) {
                                                    $objData->companylogo = $logo;
                                                }
                                            }
                                        }
                                        $objData->created = date('Y-m-d');
                                        
                                        global $DB;
                                       $id= $DB->Save($md['table'], $objData);
                                        
                                       if(isset($objData->certification_name) && is_array($objData->certification_name) && !empty($objData->certification_name)){
                                            foreach($objData->certification_name as $certificate){
                                                $obj=new StdClass();
                                                $obj->company_id=$id;
                                                $obj->certification_name=$certificate;
                                                $d= $DB->Save('company_certifications', $obj);
                                            }
                                        }
                                        if(isset($objData->service_name) && is_array($objData->service_name) && !empty($objData->service_name)){
                                            foreach($objData->service_name as $service){
                                                $obj=new StdClass();
                                                $obj->company_id=$id;
                                                $obj->service_id=$service;
                                                $d= $DB->Save('company_services', $obj);
                                            }
                                        }
                                       
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
                                    }
                                } else {
                                    header("Location: " . Request::$BASE_PATH);
                                }
                                $packages=Content::All('packages');
                                $continents=Content::All('world_continents');
                                $services=Content::All('services');
                                $objPresenter->AddParameter('packages', $packages);
                                $objPresenter->AddParameter('continents', $continents);
                                $objPresenter->AddParameter('services', $services);
                                $objPresenter->AddTemplate($md['con'] . '/new');
                                break;
                            case 'edit':
                                if (Content::validate($md['con'], 'edit')) {
                                    if ($parameters[2] != '' && isset($parameters[2])) {
                                        if (Request::hasPostVariables()) {
                                            $objData = Request::getPostVariables();
                                            $objData->updated_at = date('Y-m-d H:i:s');
                                            $objData->is_public = 1;
                                            $objData->can_edit = 0;
                                           

                                            if (isset($_FILES['newlogo']['name']) && $_FILES['newlogo']['name'] != '') {
                                                $file = 'logo-' . uniqid();
                                                $file_ext = pathinfo($_FILES['newlogo']['name'], PATHINFO_EXTENSION);
                                                if ($file_ext == 'png' || $file_ext == 'jpg' || $file_ext == 'gif' || $file_ext == 'jpeg') {
                                                    $target_path = '../public/uploads/';
                                                    $path=$target_path;
                                                    $logo=$file . '.' . $file_ext;
                                                    $target_path = $target_path . $logo;
                                                    if (move_uploaded_file($_FILES['newlogo']['tmp_name'], $target_path)) {
                                                        if (!empty($objData->companylogo)) {
                                                            @unlink($path.$objData->companylogo);
                                                        }
                                                        $objData->companylogo = $logo;
                                                    }
                                                }
                                            }
                                        //    echo '<pre>';
                                        //    print_r($objData);
                                        //    exit;
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH . $md['con']);
                                        } else {
                                            $id = intval($parameters[2]);
                                            $Data = Content::find_by_id($id, $md['table']);
                                            $packages=Content::All('packages');
                                            $continents=Content::All('world_continents');
                                            $services=Content::All('services');
                                            $where="continent_id='".$Data->continent."'";
                                            $countries=Content::getallWhere('code,name,id','world_countries',$where);
                                            $where="country_id='".$Data->country."'";
                                            $cities=Content::getallWhere('code,name,id','world_cities',$where);
                                            $where="company_id='".$id."'";
                                            $certs=Content::getallWhere('certification_name','company_certifications',$where);
                                            $certifications=[];
                                            if(!empty($certs) & is_array($certs)){
                                                foreach($certs as $cert){
                                                    array_push($certifications,$cert->certification_name);
                                                }
                                            }
                                            $where="company_id='".$id."'";
                                            $servs=Content::getallWhere('service_id','company_services',$where);
                                            $company_services=[];
                                            if(!empty($servs) & is_array($servs)){
                                                foreach($servs as $serv){
                                                    array_push($company_services,$serv->service_id);
                                                }
                                            }
                                           
                                            //$certifications
                                            $objPresenter->AddParameter('packages', $packages);
                                            $objPresenter->AddParameter('continents', $continents);
                                            $objPresenter->AddParameter('countries', $countries);
                                            $objPresenter->AddParameter('cities', $cities);
                                            $objPresenter->AddParameter('services', $services);
                                            $objPresenter->AddParameter('certifications', $certifications);
                                            $objPresenter->AddParameter('company_services', $company_services);
                                            $objPresenter->AddParameter('Data', $Data);
                                           
                                        }
                                        $objPresenter->AddTemplate($md['con'] . '/edit');
                                    } else {
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
                                    }
                                } else {
                                    header("Location: " . Request::$BASE_PATH);
                                }
                                break;
                            case 'action':
                                if (Content::validate($md['con'], 'edit')) {
                                    if ($parameters[2] != '' && isset($parameters[2])) {
                                        if (Request::hasPostVariables()) {
                                            $id = intval($parameters[2]);
                                            $objData = Request::getPostVariables();
                                            global $DB;
                                            if(isset($objData->status)){
                                                if($objData->status==3){
                                                    $Data = Content::find_by_id($objData->id, $md['table']);
                                                    $objData->expire_at = date('Y-m-d',strtotime('+1 years'));
                                                    if(is_null($Data->created)){
                                                        $objData->created = date('Y-m-d');
                                                        $objData->expire_at = date('Y-m-d',strtotime('+1 years'));

                                                    }
                                                    
                                                }
                                                
                                                 $DB->Save($md['table'], $objData);
                                            }else if(isset($objData->comment)){
                                                $objData->user_id=0;
                                                $objData->user_type='admin';
                                                $objData->company_id=$id;
                                                $objData->created_at = date('Y-m-d H:i:s');
                                                $d=$DB->Save('comments', $objData);
                                                

                                            }
                                            
                                            header("Location: " . Request::$BASE_PATH . $md['con'].'/action/'.$id);
                                        } else {
                                            $id = intval($parameters[2]);
                                            $Data = Content::find_by_id($id, $md['table']);
                                            $objPresenter->AddParameter('Data', $Data);
                                            $comments=Content::companyComments($id);
                                            $objPresenter->AddParameter('comments', $comments);
                                           
                                        }
                                        $objPresenter->AddTemplate($md['con'] . '/action');
                                    } else {
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
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
            // ======================================= Companies ================================
            case 'branches':
                if (Session::isUserOnline()) {
                    if (isset($parameters[1]) || !empty($parameters[1])) {
                        $md['table'] = $parameters[0];
                        $md['con'] = $parameters[0];
                        $md['text'] = 'Branches';
                        $md['stext'] = 'Branch';
                        $company_id=intval($parameters[1]);
                        $objPresenter->AddParameter('company_id', $company_id);
                        $objPresenter->AddParameter('md', $md);
                        if (!isset($parameters[2]) || empty($parameters[2])) {
                                if (Content::validate('companies', 'view')) {
                                    $id=intval($parameters[1]);
                                    $company=Content::company($id);
                                    $Data = Content::branches($id);
                                    $continents=Content::All('world_continents');
                                    $objPresenter->AddParameter('continents', $continents);
                                    $objPresenter->AddParameter('Data', $Data);
                                    $objPresenter->AddParameter('company', $company);
                                    //$company=Content::company($id);
                                    $objPresenter->AddTemplate($md['con'] . '/all');
                                } else {
                                    header("Location: " . Request::$BASE_PATH);
                                }
                        
                        } else {
                            switch ($parameters[2]) {
                                case 'new':
                                    if (Content::validate('companies', 'add')) {
                                        if (Request::hasPostVariables()) {
                                            $objData = Request::getPostVariables();
                                            
                                            
                                            $objData->company_id=$id=intval($parameters[1]);;
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            
                                        
                                            header("Location: " . Request::$BASE_PATH . $md['con'].'/'.$company_id);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    $packages=Content::All('packages');
                                    $objPresenter->AddParameter('packages', $packages);
                                    $continents=Content::All('world_continents');
                                    $objPresenter->AddParameter('continents', $continents);
                                    
                                    $objPresenter->AddTemplate($md['con'] . '/new');
                                    break;
                                case 'edit':
                                    if (Content::validate('companies', 'edit')) {
                                        if ($parameters[3] != '' && isset($parameters[3])) {
                                            if (Request::hasPostVariables()) {
                                                $objData = Request::getPostVariables();
                                                global $DB;
                                                $DB->Save($md['table'], $objData);
                                                header("Location: " . Request::$BASE_PATH .$md['con'].'/'.$company_id);
                                            } else {
                                                $id = intval($parameters[3]);
                                                $Data = Content::find_by_id($id, $md['table']);
                                                $continents=Content::All('world_continents');
                                                $where="continent_id='".$Data->continent."'";
                                                $countries=Content::getallWhere('code,name,id','world_countries',$where);
                                                $where="country_id='".$Data->country."'";
                                                $cities=Content::getallWhere('code,name,id','world_cities',$where);
                                                $objPresenter->AddParameter('continents', $continents);
                                                $objPresenter->AddParameter('countries', $countries);
                                                $objPresenter->AddParameter('cities', $cities);
                                            
                                                //$certifications
                                                $objPresenter->AddParameter('Data', $Data);
                                            
                                            }
                                            $objPresenter->AddTemplate($md['con'] . '/edit');
                                        } else {
                                            header("Location: " . Request::$BASE_PATH . $md['con']);
                                        }
                                    } else {
                                        header("Location: " . Request::$BASE_PATH);
                                    }
                                    break;
                            }
                        }

                }else {
                    header("Location: " . Request::$BASE_PATH.'companies');
                }
                } else {
                    header("Location: " . Request::$BASE_PATH);
                }
                break;

                // ======================================= Admin Sections ================================

            case 'admin_sections':
                if (Session::isUserOnline()) {
                    $md['table'] = $parameters[0];
                    $md['con'] = $parameters[0];
                    $md['text'] = 'Admin Sections';
                    $md['stext'] = 'Admin Section';
                    $objPresenter->AddParameter('md', $md);
                    if (!isset($parameters[1]) || empty($parameters[1])) {
                        if (Content::validate($md['con'], 'view')) {
                            $Data = Content::All($md['table']);
                            $objPresenter->AddParameter('Data', $Data);
                            $objPresenter->AddTemplate($md['con'] . '/all');
                        } else {
                            header("Location: " . Request::$BASE_PATH);
                        }
                    } else {
                        switch ($parameters[1]) {
                            case 'new':
                                if (Content::validate($md['con'], 'add')) {
                                    if (Request::hasPostVariables()) {
                                        $objData = Request::getPostVariables();
                                        $objData->created = date('Y-m-d H:i:s');
                                        if (isset($objData->active) && $objData->active == 'on') {
                                            $objData->is_active = '1';
                                        } else {
                                            $objData->is_active = '0';
                                        }
                                        global $DB;
                                        $DB->Save($md['table'], $objData);
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
                                    }
                                } else {
                                    header("Location: " . Request::$BASE_PATH);
                                }
                                $objPresenter->AddTemplate($md['con'] . '/new');
                                break;
                            case 'edit':
                                if (Content::validate($md['con'], 'edit')) {
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
                                            header("Location: " . Request::$BASE_PATH . $md['con']);
                                        } else {
                                            $id = intval($parameters[2]);
                                            $Data = Content::find_by_id($id, $md['table']);
                                            $objPresenter->AddParameter('Data', $Data);
                                        }
                                        $objPresenter->AddTemplate($md['con'] . '/edit');
                                    } else {
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
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
                    $md['table'] = $parameters[0];
                    $md['con'] = $parameters[0];
                    $md['text'] = 'Admin Roles';
                    $md['stext'] = 'Admin Role';
                    $objPresenter->AddParameter('md', $md);
                    if (!isset($parameters[1]) || empty($parameters[1])) {
                        if (Content::validate($md['con'], 'view')) {
                            $Data = Content::All($md['table']);
                            $objPresenter->AddParameter('Data', $Data);
                            $objPresenter->AddTemplate($md['con'] . '/all');
                        } else {
                            header("Location: " . Request::$BASE_PATH);
                        }
                    } else {
                        switch ($parameters[1]) {
                            case 'new':
                                if (Content::validate($md['con'], 'add')) {
                                    if (Request::hasPostVariables()) {
                                        $objData = Request::getPostVariables();
                                        $objData->created = date('Y-m-d H:i:s');
                                        if (isset($objData->active) && $objData->active == 'on') {
                                            $objData->is_active = '1';
                                        } else {
                                            $objData->is_active = '0';
                                        }
                                        global $DB;
                                        $DB->Save($md['table'], $objData);
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
                                    }
                                } else {
                                    header("Location: " . Request::$BASE_PATH);
                                }
                                $objPresenter->AddTemplate($md['con'] . '/new');
                                break;
                            case 'edit':
                                if (Content::validate($md['con'], 'edit')) {
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
                                            header("Location: " . Request::$BASE_PATH . $md['con']);
                                        } else {
                                            $id = intval($parameters[2]);
                                            $Data = Content::find_by_id($id, $md['table']);
                                            $objPresenter->AddParameter('Data', $Data);
                                            $sections = Content::select('id,name,actions', 'admin_sections');
                                            $objPresenter->AddParameter('sections', $sections);
                                        }
                                        $objPresenter->AddTemplate($md['con'] . '/edit');
                                    } else {
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
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
                    $md['table'] = $parameters[0];
                    $md['con'] = $parameters[0];
                    $md['text'] = 'Admin Role Permisssions';
                    $md['stext'] = 'Admin Role Permisssion';
                    $objPresenter->AddParameter('md', $md);
                    if (!isset($parameters[1]) || empty($parameters[1])) {
                        if (Content::validate($md['con'], 'view')) {
                            $Data = Content::admin_role_permissions();
                            $objPresenter->AddParameter('Data', $Data);
                            $objPresenter->AddTemplate($md['con'] . '/all');
                        } else {
                            header("Location: " . Request::$BASE_PATH);
                        }
                    } else {
                        switch ($parameters[1]) {
                            case 'new':
                                if (Content::validate($md['con'], 'add')) {
                                    if (Request::hasPostVariables()) {
                                        $objData = Request::getPostVariables();
                                        $objData->created = date('Y-m-d H:i:s');
                                        if (isset($objData->active) && $objData->active == 'on') {
                                            $objData->is_active = '1';
                                        } else {
                                            $objData->is_active = '0';
                                        }
                                        $objData->actions = implode(',', array_keys($objData->actions));
                                        global $DB;
                                        $DB->Save($md['table'], $objData);
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
                                    }
                                    $roles = Content::select('id,name', 'admin_roles');
                                    $objPresenter->AddParameter('roles', $roles);
                                    $sections = Content::select('id,name,actions', 'admin_sections');
                                    $objPresenter->AddParameter('sections', $sections);
                                } else {
                                    header("Location: " . Request::$BASE_PATH);
                                }
                                $objPresenter->AddTemplate($md['con'] . '/new');
                                break;
                            case 'edit':
                                if (Content::validate($md['con'], 'edit')) {
                                    if ($parameters[2] != '' && isset($parameters[2])) {
                                        if (Request::hasPostVariables()) {
                                            $objData = Request::getPostVariables();
                                            if (isset($objData->active) && $objData->active == 'on') {
                                                $objData->is_active = '1';
                                            } else {
                                                $objData->is_active = '0';
                                            }
                                            $objData->actions = implode(',', array_keys($objData->actions));
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH . $md['con']);
                                        } else {
                                            $id = intval($parameters[2]);
                                            $Data = Content::find_by_id($id, $md['table']);
                                            $objPresenter->AddParameter('Data', $Data);
                                            $roles = Content::select('id,name', 'admin_roles');
                                            $objPresenter->AddParameter('roles', $roles);
                                            $actions = Content::get_actions_name($Data->section);
                                            $actions = explode(',', $actions);
                                            $objPresenter->AddParameter('actions', $actions);
                                            $sections = Content::select('id,name,actions', 'admin_sections');
                                            $objPresenter->AddParameter('sections', $sections);
                                        }
                                        $objPresenter->AddTemplate($md['con'] . '/edit');
                                    } else {
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
                                    }
                                } else {
                                    header("Location: " . Request::$BASE_PATH);
                                }
                                break;
                            case 'get_actions':
                                if (1) {
                                    if (Request::hasPostVariables()) {
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
                    $md['table'] = $parameters[0];
                    $md['con'] = $parameters[0];
                    $md['text'] = 'Admin Users';
                    $md['stext'] = 'Admin User';
                    $objPresenter->AddParameter('md', $md);
                    if (!isset($parameters[1]) || empty($parameters[1])) {
                        if (Content::validate($md['con'], 'view')) {
                            $Data = Content::get_users();
                            $objPresenter->AddParameter('Data', $Data);
                            $objPresenter->AddTemplate($md['con'] . '/all');
                        } else {
                            header("Location: " . Request::$BASE_PATH);
                        }
                    } else {
                        switch ($parameters[1]) {
                            case 'new':
                                if (Content::validate($md['con'], 'add')) {
                                    if (Request::hasPostVariables()) {
                                        $objData = Request::getPostVariables();
                                        $objData->created = date('Y-m-d H:i:s');
                                        if (isset($objData->active) && $objData->active == 'on') {
                                            $objData->is_active = '1';
                                        } else {
                                            $objData->is_active = '0';
                                        }
                                        $objData->image = '';
                                        $objData->password = md5($objData->password);

                                        if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {
                                            $file = 'ori-' . uniqid();
                                            $file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                                            if ($file_ext == 'png' || $file_ext == 'jpg' || $file_ext == 'jpeg') {
                                                $target_path = 'uploads/users/';
                                                $target_path = $target_path . $file . '.' . $file_ext;
                                                if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                                                    $objData->image = $target_path;
                                                }
                                            }
                                        }
                                        global $DB;
                                        $DB->Save($md['table'], $objData);
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
                                    }
                                    $roles = Content::select('id,name', 'admin_roles');
                                    $objPresenter->AddParameter('roles', $roles);
                                } else {
                                    header("Location: " . Request::$BASE_PATH);
                                }
                                $objPresenter->AddTemplate($md['con'] . '/new');
                                break;
                            case 'edit':
                                if (Content::validate($md['con'], 'edit')) {
                                    if ($parameters[2] != '' && isset($parameters[2])) {
                                        if (Request::hasPostVariables()) {
                                            $objData = Request::getPostVariables();
                                            if (isset($objData->active) && $objData->active == 'on') {
                                                $objData->is_active = '1';
                                            } else {
                                                $objData->is_active = '0';
                                            }
                                            if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {
                                                $file = 'mydoc-' . uniqid();
                                                $file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                                                if ($file_ext == 'png' || $file_ext == 'jpg' || $file_ext == 'jpeg') {
                                                    $target_path = 'uploads/users/';
                                                    $target_path = $target_path . $file . '.' . $file_ext;
                                                    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                                                        if (!empty($objData->file_name)) {
                                                            @unlink($objData->file_name);
                                                        }
                                                        $objData->file_name = $target_path;
                                                    }
                                                }
                                            }
                                            if (!empty($objData->new_password)) {
                                                $objData->password = md5($objData->new_password);
                                            }
                                            $objData->image = $objData->file_name;
                                            $objData->actions = implode(',', array_keys($objData->actions));
                                            global $DB;
                                            $DB->Save($md['table'], $objData);
                                            header("Location: " . Request::$BASE_PATH . $md['con']);
                                        } else {
                                            $id = intval($parameters[2]);
                                            $Data = Content::find_by_id($id, $md['table']);
                                            $objPresenter->AddParameter('Data', $Data);
                                            $roles = Content::select('id,name', 'admin_roles');
                                            $objPresenter->AddParameter('roles', $roles);
                                        }
                                        $objPresenter->AddTemplate($md['con'] . '/edit');
                                    } else {
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
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
                    $md['table'] = 'admin_users';
                    $md['con'] = $parameters[0];
                    $md['text'] = 'Profle';
                    $md['stext'] = 'Profle';
                    $objPresenter->AddParameter('md', $md);
                    if (!isset($parameters[1]) || empty($parameters[1])) {
                        $Data = Content::get_user(Session::GetUser()->id);
                        $objPresenter->AddParameter('Data', $Data);
                        $objPresenter->AddTemplate($md['con'] . '/all');
                    } else {
                        switch ($parameters[1]) {

                            case 'edit':
                                if (1) {
                                    if (Request::hasPostVariables()) {
                                        $objData = Request::getPostVariables();
                                        if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {
                                            $file = 'mydoc-' . uniqid();
                                            $file_ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                                            if ($file_ext == 'png' || $file_ext == 'jpg' || $file_ext == 'jpeg') {
                                                $target_path = 'uploads/users/';
                                                $target_path = $target_path . $file . '.' . $file_ext;
                                                if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                                                    if (!empty($objData->file_name)) {
                                                        //@unlink($objData->file_name);
                                                    }
                                                    $objData->file_name = $target_path;
                                                }
                                            }
                                        }
                                        $objData->id = Session::GetUser()->id;
                                        $objData->image = $objData->file_name;
                                        global $DB;
                                        $DB->Save($md['table'], $objData);
                                        header("Location: " . Request::$BASE_PATH . $md['con']);
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
                    if (Request::hasPostVariables()) {
                        $objData = Request::getPostVariables();
                        if (User::Validate($objData)) {
                            $redirect = Session::GetUser()->default_link;
                            header("Location: " . Request::$BASE_PATH . $redirect);
                        } else {
                            $objPresenter->AddParameter('message', '<div class="alert alert-danger">Invalid Password Or Email <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
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
                    if (Request::hasPostVariables()) {
                        $objData = Request::getPostVariables();
                        if (!User::CheckEmail($objData->email)) {
                            User::updateToken($objData->email);
                            $objPresenter->AddParameter('message', '<div class="alert alert-danger">Verification Code has been sent Verify <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
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
                    if (isset($parameters[1]) && !empty($parameters[1])) {
                    } else {
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
                    $start=date('Y-m-01');
                    $end=date('Y-m-t');
                    $data=[];
                    $data['totalUsers']=Content::totalUsers();
                    //$data['totalPaidusers']=Content::totalUsersBystatus(3);
                    //$data['totalUnPaidusers']=Content::totalUsersBystatus(2);
                    $data['totalNewUsers']=Content::totalNewUsers($start,$end);
                    
                    $data['totalPaidusers']=Content::totalUsersBystatus(3,$start,$end);
                    $data['totalUnPaidusers']=Content::totalUsersBystatus(2,$start,$end);
                    $objPresenter->AddParameter('data', $data);
                    $objPresenter->AddTemplate('default/dashboard');
                } else {
                    header("Location: " . Request::$BASE_PATH . 'login');
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
