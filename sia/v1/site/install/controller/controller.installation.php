<?php 

if(!isset($_POST['step'])):
    $_POST['step'] = '';
else:
    $_POST['step'] = $_POST['step'];
endif;

//instantiating the Install class
$install = new Install();

//setting the $data array
if(isset($_POST['step']) && $_POST['step'] == "dbConfigs") :
    
    $install->setData($_POST);
    $install->createConfigFile();

    elseif(isset($_POST['step']) && $_POST['step'] == "admConfigs"):

    $install->setData($_POST);
    $install->addConfigs();

endif;

//checks if the creation of the configuration file is over and makes the
//of the options settings
if(file_exists('../system/defines/config.conf')):

    //starts the $configs object from the file and sets the
    //dsn stats for the PDO class
    $configs = (object) $install->getConfigs();

    $configs->dsn = 'mysql:host=' . $configs->host . ';dbname=' . $configs->db;
    
    //starts the PDO class
    $db = $install->setPDO($configs->dsn, $configs->dbUser, $configs->dbPwd);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
    
endif;

//starts the configuration
if(file_exists('../system/defines/config.conf') && isset($db)):

    //if the step is for the DB configuration, starts the dbConfigs
    if(isset($_POST['step']) && $_POST['step'] == "dbConfigs"):
    
        //apply the table prefix for the DB
        $queries = $install->applyTablePrefix($configs->tablePrefix);
        
        //install the DB
        foreach ($queries as $query):
            if (!empty($query) && $query != "" && $query != " "):
                if ($db->query($query)) :
                    $error = null;
                else:
                    $error  = "<pre>A problem occurred with the installation!</pre>";
                    $error .= "<pre>" . $db->errorCode() . "</pre>";
                    $error .= "<pre>";
                    $error .= var_dump($db->errorInfo());
                    $error .= "</pre>";
                    die($error);
                
                endif;
            
             endif;
        
        endforeach;

        elseif(isset($_POST['step']) && $_POST['step'] == "admConfigs"):
    
        //make the array for the insertion of the configs
        //array for the superadmin insertion
        $admin = array(
                        ':user_name'         =>  $configs->admin,
                        ':user_mail'         =>  $configs->email,
                        ':password'          =>  md5(sha1($configs->password)),
                        ':user_level'        =>  'superadmin',
                        ':created_on'        =>  date('Y-m-d H:i:s'),
                        ':created_by'        =>  0,
                        ':updated_on'        =>  date('Y-m-d H:i:s'),
                        ':updated_by'        =>  0,
                        ':last_login'        =>  date('0000-00-00 00:00:00'),
                        ':last_logged_IP'    =>  '000.000.000'
                      );
        
        $fieldsA = str_replace(':','', implode('`,`', array_keys($admin)));
        $placeholdersA = implode(',', array_keys($admin));
        
        //preparing the statement
        $user = $db->prepare('INSERT INTO `'.$configs->tablePrefix.'login` (`'.$fieldsA.'`) VALUES ('.$placeholdersA.');');
        
        //execute the statement and return die if something went wrong
        try{
            $user->execute($admin);
        }catch(PDOException $e){
             echo 'Error: Code: '.$e->getCode().' - Line '.$e->getLine().' - '.$e->getMessage().'.<br />';
        }
        
        //array for the adminLevels option insertion
        $admLevels = array(
                'superadmin' => array(
                    ':option_name'           =>  'Superadministrator',
                    ':option_value'          =>  'superadmin',
                    ':option_for'            =>  'administration',
                    ':option_type'           =>  'admin_level',
                    ':created_on'            =>  date('Y-m-d H:i:s'),
                    ':created_by'            =>  0,
                    ':updated_on'            =>  date('Y-m-d H:i:s'),
                    ':updated_by'            =>  0,
                    ':last_user_IP'          =>  '000.000.000'
                ),
                'admin' => array(
                    ':option_name'           =>  'Administrator',
                    ':option_value'          =>  'admin',
                    ':option_for'            =>  'administration',
                    ':option_type'           =>  'admin_level',
                    ':created_on'            =>  date('Y-m-d H:i:s'),
                    ':created_by'            =>  0,
                    ':updated_on'            =>  date('Y-m-d H:i:s'),
                    ':updated_by'            =>  0,
                    ':last_user_IP'          =>  '000.000.000'
                ),
                'editor' => array(
                    ':option_name'           =>  'Editor',
                    ':option_value'          =>  'editor',
                    ':option_for'            =>  'administration',
                    ':option_type'           =>  'admin_level',
                    ':created_on'            =>  date('Y-m-d H:i:s'),
                    ':created_by'            =>  0,
                    ':updated_on'            =>  date('Y-m-d H:i:s'),
                    ':updated_by'            =>  0,
                    ':last_user_IP'          =>  '000.000.000'
                ),
                'author' => array(
                    ':option_name'           =>  'Author',
                    ':option_value'          =>  'author',
                    ':option_for'            =>  'administration',
                    ':option_type'           =>  'admin_level',
                    ':created_on'            =>  date('Y-m-d H:i:s'),
                    ':created_by'            =>  0,
                    ':updated_on'            =>  date('Y-m-d H:i:s'),
                    ':updated_by'            =>  0,
                    ':last_user_IP'          =>  '000.000.000'
                )
            );
       
        //setting the admin levels on the option table
        foreach($admLevels as $admLevel):
            
            $fieldsL = str_replace(':','', implode('`,`', array_keys($admLevel)));
            $placeholdersL = implode(',', array_keys($admLevel));
            
            //preparing the statement
            $level = $db->prepare('INSERT INTO `'.$configs->tablePrefix.'options` (`'.$fieldsL.'`) VALUES ('.$placeholdersL.');');
            
            //execute the statement and return die if something went wrong
            try{
                $level->execute($admLevel);
            }catch(PDOException $e){
                echo 'Error: Code: '.$e->getCode().' - Line '.$e->getLine().' - '.$e->getMessage().'.<br />';
            }
        endforeach;
        
        //array for the other configs insertion
        //logo upload and insertion on the configs/media table
        
        $imgLogo = (object) $install->uploadLogo($_FILES['logo']);
        
        if($imgLogo->return == true):
        
            $logoPath = $imgLogo->filepath;
            
                $media = array(
                    ':media_name'            => $_FILES['logo']['name'],
                    ':media_title'           => $_FILES['logo']['name'],
                    ':attached_to'           => 0,
                    ':media_url'             => $logoPath,
                    ':uploaded_on'           =>  date('Y-m-d H:i:s'),
                    ':uploaded_by'           =>  0,
                    ':updated_on'            =>  date('Y-m-d H:i:s'),
                    ':updated_by'            =>  0,
                    ':last_user_IP'          =>  '000.000.000'
                    
                );
                
                $fieldsM = str_replace(':','', implode('`,`', array_keys($media)));
                $placeholdersM = implode(',', array_keys($media));
                
                //preparing the statement to the media insertion
                $mediaInsert = $db->prepare('INSERT INTO `'.$configs->tablePrefix.'media` (`'.$fieldsM.'`) VALUES ('.$placeholdersM.');');
            
                //execute the statement and return die if something went wrong
                try{
                    $mediaInsert->execute($media);
                }catch(PDOException $e){
                    echo 'Error: Code: '.$e->getCode().' - Line '.$e->getLine().' - '.$e->getMessage().'.<br />';
                }
                
                $logo = array(
                    ':config_name'           =>  'logo',
                    ':config_value'          =>  $logoPath,
                    ':created_on'            =>  date('Y-m-d H:i:s'),
                    ':created_by'            =>  0,
                    ':updated_on'            =>  date('Y-m-d H:i:s'),
                    ':updated_by'            =>  0,
                    ':last_user_IP'          =>  '000.000.000'
                );
                
                $fieldsOpLo = str_replace(':','', implode('`,`', array_keys($logo)));
                $placeholdersOpLo = implode(',', array_keys($logo));
                
                //preparing the statement to the logo insertion
                $logoInsert = $db->prepare('INSERT INTO `'.$configs->tablePrefix.'configs` (`'.$fieldsOpLo.'`) VALUES ('.$placeholdersOpLo.');');
                
                //execute the statement and return die if something went wrong
                try{
                    $logoInsert->execute($logo);
                }catch(PDOException $e){
                    echo 'Error: Code: '.$e->getCode().' - Line '.$e->getLine().' - '.$e->getMessage().'.<br />';
                }
                
        endif;
        
        //the palete collors of the backend theme
        //the primary color
        $primaryColor = array(
            ':config_name'           =>  'primary-color',
            ':config_value'          =>  $configs->primaryColor,
            ':created_on'            =>  date('Y-m-d H:i:s'),
            ':created_by'            =>  0,
            ':updated_on'            =>  date('Y-m-d H:i:s'),
            ':updated_by'            =>  0,
            ':last_user_IP'          =>  '000.000.000'
        );
        
        $fieldsPC = str_replace(':','', implode('`,`', array_keys($primaryColor)));
        $placeholdersPC = implode(',', array_keys($primaryColor));
        
        //preparing the statement to the logo insertion
        $pColor = $db->prepare('INSERT INTO `'.$configs->tablePrefix.'configs` (`'.$fieldsPC.'`) VALUES ('.$placeholdersPC.');');
        
        //execute the statement and return die if something went wrong
        try{
            $pColor->execute($primaryColor);
        }catch(PDOException $e){
            echo 'Error: Code: '.$e->getCode().' - Line '.$e->getLine().' - '.$e->getMessage().'.<br />';
        }
        
        //the secondary color
        $secondaryColor = array(
            ':config_name'           =>  'secondary-color',
            ':config_value'          =>  $configs->secondaryColor,
            ':created_on'            =>  date('Y-m-d H:i:s'),
            ':created_by'            =>  0,
            ':updated_on'            =>  date('Y-m-d H:i:s'),
            ':updated_by'            =>  0,
            ':last_user_IP'          =>  '000.000.000'
        );
        
        $fieldsSC = str_replace(':','', implode('`,`', array_keys($secondaryColor)));
        $placeholdersSC = implode(',', array_keys($secondaryColor));
        
        //preparing the statement to the logo insertion
        $sColor = $db->prepare('INSERT INTO `'.$configs->tablePrefix.'configs` (`'.$fieldsSC.'`) VALUES ('.$placeholdersSC.');');
        
        //execute the statement and return die if something went wrong
        try{
            $sColor->execute($secondaryColor);
        }catch(PDOException $e){
            echo 'Error: Code: '.$e->getCode().' - Line '.$e->getLine().' - '.$e->getMessage().'.<br />';
        }
        
        //the color of the fonts
        $fontColor = array(
            ':config_name'           =>  'font-color',
            ':config_value'          =>  $configs->fontColor,
            ':created_on'            =>  date('Y-m-d H:i:s'),
            ':created_by'            =>  0,
            ':updated_on'            =>  date('Y-m-d H:i:s'),
            ':updated_by'            =>  0,
            ':last_user_IP'          =>  '000.000.000'
        );
        
        $fieldsFC = str_replace(':','', implode('`,`', array_keys($fontColor)));
        $placeholdersFC = implode(',', array_keys($fontColor));
        
        //preparing the statement to the logo insertion
        $fColor = $db->prepare('INSERT INTO `'.$configs->tablePrefix.'configs` (`'.$fieldsFC.'`) VALUES ('.$placeholdersFC.');');
        
        //execute the statement and return die if something went wrong
        try{
            $fColor->execute($fontColor);
        }catch(PDOException $e){
            echo 'Error: Code: '.$e->getCode().' - Line '.$e->getLine().' - '.$e->getMessage().'.<br />';
        }
    
        //the meta-description of the site
        $meta = array(
            ':config_name'           =>  'meta-description',
            ':config_value'          =>  $configs->metaDescription,
            ':created_on'            =>  date('Y-m-d H:i:s'),
            ':created_by'            =>  0,
            ':updated_on'            =>  date('Y-m-d H:i:s'),
            ':updated_by'            =>  0,
            ':last_user_IP'          =>  '000.000.000'
        );
        
        $fieldsMeta = str_replace(':','', implode('`,`', array_keys($meta)));
        $placeholdersMeta = implode(',', array_keys($meta));
        
        //preparing the statement to the logo insertion
        $metaDescription = $db->prepare('INSERT INTO `'.$configs->tablePrefix.'configs` (`'.$fieldsMeta.'`) VALUES ('.$placeholdersMeta.');');
        
        //execute the statement and return die if something went wrong
        try{
            $metaDescription->execute($meta);
        }catch(PDOException $e){
            echo 'Error: Code: '.$e->getCode().' - Line '.$e->getLine().' - '.$e->getMessage().'.<br />';
        }
        
        //the meta-description of the site
        $siteTitle = array(
            ':config_name'           =>  'site-title',
            ':config_value'          =>  $configs->siteName,
            ':created_on'            =>  date('Y-m-d H:i:s'),
            ':created_by'            =>  0,
            ':updated_on'            =>  date('Y-m-d H:i:s'),
            ':updated_by'            =>  0,
            ':last_user_IP'          =>  '000.000.000'
        );
        
        $fieldsSiteTitle = str_replace(':','', implode('`,`', array_keys($siteTitle)));
        $placeholdersSiteTitle = implode(',', array_keys($siteTitle));
        
        //preparing the statement to the logo insertion
        $theSiteTitle = $db->prepare('INSERT INTO `'.$configs->tablePrefix.'configs` (`'.$fieldsSiteTitle.'`) VALUES ('.$placeholdersSiteTitle.');');
        
        //execute the statement and return die if something went wrong
        try{
            $theSiteTitle->execute($siteTitle);
        }catch(PDOException $e){
            echo 'Error: Code: '.$e->getCode().' - Line '.$e->getLine().' - '.$e->getMessage().'.<br />';
        }
        
    endif;
    
    //finish the installation and deletes the config.init and db.sql files
    //$install->finishInstall();

endif;