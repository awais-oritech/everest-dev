<?php
	class Content {
		//======================================================== All Data ============================================
		static function All($table){
			global $DB;
			
			$sql="SELECT *
					FROM ".$table."
                    
                    ORDER BY id DESC";
			
			$objData=$DB->Select($sql);
			if($objData){
			
				return $objData;
			}else{
				return false;
			}
		}
        //======================================================== All Data ============================================
		static function AllActive($table){
			global $DB;
			
			$sql="SELECT *
					FROM ".$table."
                    WHERE is_active = 1
                    ORDER BY id DESC";
			
			$objData=$DB->Select($sql);
			if($objData){
			
				return $objData;
			}else{
				return false;
			}
		}
		//======================================================== All Data  Group By============================================
		static function AllUnique($table,$group){
		    global $DB;
		    
		    $sql="SELECT *
					FROM ".$table."
                    GROUP BY ".$group."
					ORDER BY id DESC";
		    
		    $objData=$DB->Select($sql);
		    if($objData){
		        
		        return $objData;
		    }else{
		        return false;
		    }
		}
		//======================================================== Find BY ID ============================================
		static function find_by_id($id,$table){
			global $DB;
			
			$sql="SELECT *
					FROM ".$table."
					WHERE id = '".$id."'
					ORDER BY id DESC";
			
			$objData=$DB->Select($sql);
			if($objData){
			
				return $objData[0];
			}else{
				return false;
			}
		}
		//======================================================== DELETE BY ID ============================================
		static function delete_by_id($id,$table){
		    global $DB;
		    
		    $sql="DELETE 
					FROM ".$table."
					WHERE id = '".$id."'
					";
		    
		    //$objData=$DB->Delete($sql);
		    if($DB->Delete($sql)){
		        
		        return true;
		    }else{
		        return false;
		    }
        }
    //======================================================== SELECT WHERE  ============================================    
        static function SelectWhere($table,$where){
			global $DB;
			
			$sql="SELECT *
					FROM ".$table."
					WHERE  ".$where."
					ORDER BY id DESC";
			
			$objData=$DB->Select($sql);
			if($objData){
			
				return $objData;
			}else{
				return false;
			}
        }
        //======================================================== SELECT WHERE  ============================================    
        static function getallWhere($select,$table,$where){
			global $DB;
			
			$sql="SELECT ".$select."
					FROM ".$table."
					WHERE  ".$where."
					ORDER BY id DESC";
			
			$objData=$DB->Select($sql);
			if($objData){
			
				return $objData;
			}else{
				return false;
			}
		}
        //======================================================== SELECT WHERE  ============================================    
        static function getWhere($select,$table,$where){
			global $DB;
			
			$sql="SELECT ".$select."
					FROM ".$table."
					WHERE  ".$where."
					ORDER BY id DESC";
			
			$objData=$DB->Select($sql);
			if($objData){
			
				return $objData[0];
			}else{
				return false;
			}
		}
        //======================================================== SELECT AND Count ============================================
        static function selectCount($table,$where,$id,$date,$name){
            global $DB;

            $sql="SELECT count(*) as ".$name."
					FROM ".$table."
					WHERE ".$where." = '".$id."'
					AND created='".$date."'";

            $objData=$DB->Select($sql);
            if($objData){

                return $objData[0];
            }else{
                return false;
            }
        }

        
        //======================================================== Select ============================================
        static function select($field,$table){
            global $DB;

            $sql="SELECT ".$field."
					FROM ".$table."
					WHERE is_active = 1
					ORDER BY id DESC";

            $objData=$DB->Select($sql);
            if($objData){

                return $objData;
            }else{
                return false;
            }
        }
        //======================================================== Select ============================================
        static function selectParent($field,$table){
            global $DB;

            $sql="SELECT ".$field."
					FROM ".$table."
					WHERE parent_id = 0
					ORDER BY id DESC";

            $objData=$DB->Select($sql);
            if($objData){

                return $objData;
            }else{
                return false;
            }
        }
        //======================================================== validate User BY Section ============================================
        static function validate($section,$action){
            if (Session::isUserOnline()){
                $role= Session::GetUser()->role_id;
                global $DB;

                $sql="SELECT *
					FROM admin_role_permissions
					WHERE role_id= '".$role."' 
					And section ='".$section."'
					AND is_active = 1";

                $objData=$DB->Select($sql);
                if($objData){
                    $actions=explode(',', $objData[0]->actions);
                    if(in_array($action, $actions)){
                        return '1';
                    }else{
                        return '0';
                    }

                }else{
                    return false;
                }
            }

        }

        //======================================================== validate User BY Section ============================================
        static function sideBaritems(){
            if (Session::isUserOnline()){
                $role= Session::GetUser()->role_id;
                global $DB;

                $sql="SELECT *
					FROM admin_role_permissions
					WHERE role_id= '".$role."' 
					AND is_active = 1";

                $objData=$DB->Select($sql);
                if($objData){
                    $dd=array();
                    foreach($objData as $data){
                        $sql="SELECT *
                        FROM admin_sections
                        WHERE name= '".$data->section."' 
                        AND is_active = 1
                        ORDER BY level Asc";

                    
                        if($d=$DB->Select($sql)){
                            $dd[]=$d[0]; 
                        }
                    }
                    return $dd;
                  

                }else{
                    return false;
                }
            }

        }

        

		//========================================================GLOBAL_SETTING============================================
		static function Global_Settings(){
			global $DB;
			$sql="SELECT *
					FROM global_settings
					WHERE id='1'";
			$objData=$DB->Select($sql);
			if($objData){
				return $objData[0];
			}
			else{
				return false;
			}
		}
    //======================================================== user ============================================
    static function user($id){
            global $DB;

            $sql="SELECT *
                    FROM users
                    WHERE id='".$id."'
                    AND is_active = 1
                    ORDER BY id DESC";

            $objData=$DB->Select($sql);
            if($objData){
                return $objData[0];
            }else{
                return false;
            }
        }
        
        //======================================================== Section ============================================
        static function Sections(){
            global $DB;
            
            $sql="SELECT  
                    	sections.id,
                    	sections.name,
                    	sections.link,
                        modules.name AS module,
                        sections.actions,
                        sections.module_id,
                        sections.is_active
                    FROM `sections` 
                    LEFT JOIN modules ON sections.module_id=modules.id 
                    ORDER BY sections.id DESC";
            
            $objData=$DB->Select($sql);
            if($objData){
                return $objData;
            }else{
                return false;
            }
        }
        
        //======================================================== Action Name BY ID ============================================
        static function get_actions($id){
            global $DB;
            
            $sql="SELECT
                    	actions
                    FROM `admin_sections`
                    WHERE id='".$id."'
                    ORDER BY id DESC";
            
            $objData=$DB->Select($sql);
            if($objData){
                return $objData[0]->actions;
            }else{
                return false;
            }
        }
        
        //======================================================== Action Name BY Name ============================================
        static function get_actions_name($name){
            global $DB;
            
            $sql="SELECT
                    	actions
                    FROM `admin_sections`
                    WHERE name='".$name."'
                    ORDER BY id DESC";
            
            $objData=$DB->Select($sql);
            if($objData){
                return $objData[0]->actions;
            }else{
                return false;
            }
        }
       
        //======================================================== Permissions ============================================
        static function get_role_permissions(){
            global $DB;
            
            $sql="SELECT
                        admin_role_permissions.*,
                        admin_roles.name As role
                    FROM
                        `admin_role_permissions`
                        LEFT JOIN admin_roles ON admin_role_permissions.role_id=admin_roles.id
                    ORDER BY admin_role_permissions.id DESC";
            
            $objData=$DB->Select($sql);
            if($objData){
                return $objData;
            }else{
                return false;
            }
        }
        //======================================================== SLA ============================================
        static function get_sla($objData){
            $sla=array();
            foreach($objData as $key=>$data){
                $sla[$key]=implode(',',array_keys($data));
                
            }
            return json_encode($sla);
        }
       
        //======================================================== Permissions ============================================
        static function get_roles(){
            global $DB;
            
            $sql="SELECT
                        roles.*,
                        modules.name As module_name,
                        modules.table_name
                        FROM
                        `roles`
                        LEFT JOIN modules ON roles.node_type=modules.id
                    ORDER BY roles.id DESC";
            
            $objData=$DB->Select($sql);
            if($objData){
                foreach ($objData as $d){
                    if($d->is_global){
                        $d->ref_name= 'Global For '.ucfirst($d->module_name);
                    }elseif(!empty($d->table_name) && $d->node_id==0){
                        $sql="SELECT
                            name 
                        FROM
                        ".$d->table_name." WHERE id=".$d->node_id;
                        $dd=$DB->Select($sql);
                        if($dd){
                            $d->ref_name=$dd[0]->name;
                        }
                        
                    }
                }
                return $objData;
            }else{
                return false;
            }
        }
        //======================================================== Admin Role Permissions ============================================
		static function admin_role_permissions(){
			global $DB;
			
			$sql="SELECT admin_role_permissions.*,
                        admin_roles.name as role
					FROM admin_role_permissions
                    LEFT JOIN admin_roles ON admin_roles.id=admin_role_permissions.role_id
                    ORDER BY id DESC";
			
			$objData=$DB->Select($sql);
			if($objData){
			
				return $objData;
			}else{
				return false;
			}
		}
        //======================================================== Action Name BY ID ============================================
        static function get_edit_section_actions($id){
            global $DB;
            
            $sql="SELECT *
                
                    FROM `sections`
                    WHERE module_id='".$id."'
                    ORDER BY id DESC";
            
            $objData=$DB->Select($sql);
            if($objData){
                return $objData;
            }else{
                return false;
            }
        }
        //======================================================== Action Name BY ID ============================================
        static function get_section_action($id){
            global $DB;
            
            $sql="SELECT *
                    	
                    FROM `sections`
                    WHERE module_id='".$id."'
                    ORDER BY id DESC";
            
            $objData=$DB->Select($sql);
            if($objData){
                
            $html=" ";
                foreach($objData as $dd){
                    $div='<div class="form-group row mt-5">
    							<label for="example-text-input" class="col-2 col-form-label">'.$dd->name.'</label>
                                <div class="col-sm-10 act">';
                    $actions=explode(',', $dd->actions);
                    foreach ($actions as $key=>$d){
                        $div.='<div class="custom-control custom-checkbox"><input type="checkbox" name="sla['.$dd->name.']['.$d.']" class="custom-control-input" id="'.$d.'-'.$dd->id.'"><label class="custom-control-label" for="'.$d.'-'.$dd->id.'">'.$d.'</label></div>'; 
                    }
                    $div.=' </div></div>';
                    $html.=$div;
            }
                    
                
                                    
                              
            return $html;
            }else{
                return false;
            }
        }
        //======================================================== USers ============================================
        static function get_users(){
            global $DB;
            
            $sql="SELECT
                        admin_users.*,
                        admin_roles.name As role
                    FROM
                        `admin_users`
                        LEFT JOIN admin_roles ON admin_users.role_id=admin_roles.id
                    ORDER BY admin_users.id DESC";
            
            $objData=$DB->Select($sql);
            if($objData){
                return $objData;
            }else{
                return false;
            }
        }
        
        //======================================================== USers ============================================
        static function get_user($id){
            global $DB;
            
            $sql="SELECT
                        admin_users.*,
                        admin_roles.name As role
                    FROM
                        `admin_users`
                        LEFT JOIN admin_roles ON admin_users.role_id=admin_roles.id
                        WHERE admin_users.id='".$id."'
                    ORDER BY admin_users.id DESC";
            
            $objData=$DB->Select($sql);
            if($objData){
                return $objData[0];
            }else{
                return false;
            }
        }
        
        
        
    //======================================================== clean ============================================
    static function clean($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
        
        $string=preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
        return $string=str_replace('-', ' ', $string);
    }

    //======================================================== getId ============================================
    static function getId($name,$table){
        global $DB;
        
        $sql="SELECT id
                    FROM $table
                    WHERE name = '".$name."'
                    AND is_active = 1
                    ORDER BY id DESC";
        
        $objData=$DB->Select($sql);
        if($objData){
            return $objData[0]->id;
            
            
        }else{
            return false;
        }
    }
    //======================================================== getWhere ============================================
    static function getallactivewhere($get,$Where,$table){
        global $DB;
        
        $sql="SELECT ".$get."
                    FROM $table
                    WHERE '".$Where."'
                    AND is_active = 1
                    ORDER BY id DESC";
        
        $objData=$DB->Select($sql);
        if($objData){
            return $objData;
            
            
        }else{
            return false;
        }
    }
    //======================================================== getWhere ============================================
    static function getActiveWhere($get,$Where,$table){
        global $DB;
        
        $sql="SELECT ".$get."
                    FROM $table
                    WHERE '".$Where."'
                    AND is_active = 1
                    ORDER BY id DESC";
        
        $objData=$DB->Select($sql);
        if($objData){
            return $objData[0]->id;
            
            
        }else{
            return false;
        }
    }
    
 //======================================================== CUSTOMS ============================================

    //======================================================== Services ============================================
        static function services(){
            global $DB;
            
            $sql="SELECT
            services.*,
            GROUP_CONCAT(category.name) AS category
                FROM
                    `services`
                LEFT JOIN categories AS category
                ON find_in_set(category.id,services.category_id)
                GROUP BY services.id
                ORDER BY
                    services.id
                DESC";
            $objData=$DB->Select($sql);
            if($objData){
                return $objData;
            }else{
                return false;
            }
        }
        //======================================================== Sponsors ============================================
        static function sponsors(){
            global $DB;
            
            $sql="SELECT  
                    	sponsors.*,
                    	category.name AS category
                    	
                    FROM `sponsors` 
                    LEFT JOIN sponsorcategories AS category ON sponsors.category_id=category.id 
                    ORDER BY sponsors.id DESC";
            
            $objData=$DB->Select($sql);
            if($objData){
                return $objData;
            }else{
                return false;
            }
        }
//======================================================== Companies ============================================
static function companies(){
    global $DB;
    
    $sql="SELECT
    companies.*,
    package.package_name As package_name
        FROM
            `companies`
        LEFT JOIN packages AS package
        ON companies.package_id=package.id
        ORDER BY
        companies.id
        DESC";
    $objData=$DB->Select($sql);
    if($objData){
        return $objData;
    }else{
        return false;
    }
}
    //======================================================== Section ============================================
        static function quranaudiosByCat($cat_id){
            global $DB;
            
            $sql="SELECT  
                    	quranaudios.*,
                    	category.name AS category
                    	
                    FROM `quranaudios` 
                    LEFT JOIN categories AS category ON quranaudios.category_id=category.id 
                    WHERE category_id='".$cat_id."'
                    ORDER BY quranaudios.id DESC";
            
            $objData=$DB->Select($sql);
            if($objData){
                return $objData;
            }else{
                return false;
            }
        }   
    //======================================================== Section ============================================
        static function blogs(){
            global $DB;
            
            $sql="SELECT  
                    	blogs.*,
                    	blogcategories.name AS category
                    	
                    FROM `blogs` 
                    LEFT JOIN blogcategories ON blogs.category_id=blogcategories.id 
                    ORDER BY blogs.level DESC";
            
            $objData=$DB->Select($sql);
            if($objData){
                return $objData;
            }else{
                return false;
            }
        }     
    //======================================================== Section ============================================
        static function totalUsers(){
            global $DB;
            
            $sql="SELECT  
                    	count(companies.id) AS total
                    FROM `companies`
                    ";
            
            $objData=$DB->Select($sql);
            if($objData){
                return $objData[0]->total;
            }else{
                return false;
            }
        }   
    //======================================================== Section ============================================

        static function totalNewUsers($start,$end){
            global $DB;
            
            $sql="SELECT  
                    	count(companies.id) AS total
                    FROM `companies`
                    where created_at Between '".$start."' AND '".$end."'
                 
                    ";
            
            $objData=$DB->Select($sql);
            if($objData){
                return $objData[0]->total;
            }else{
                return false;
            }
        }   
        //======================================================== Section ============================================
        static function totalUsersBystatus($start,$end,$status){
            global $DB;
            
            $sql="SELECT  
                    	count(companies.id) AS total
                    FROM `companies`
                    where created_at Between '".$start."' AND '".$end."'
                    And status='".$status."'
                    ";
            
            $objData=$DB->Select($sql);
            if($objData){
                return $objData[0]->total;
            }else{
                return false;
            }
        }         
}
