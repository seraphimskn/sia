<?php 

$the_path = '';
$ajax_configs = array();

$paths = explode('/', getcwd());

for($j = 0; $j < (count($paths) - 2); $j++){
    $the_path .= $paths[$j].'/';
}

if(file_exists($the_path.'/system/defines/config.conf')){
    $the_handler = fopen($the_path.'/system/defines/config.conf', 'r');
    $elements = fread($the_handler, filesize($the_path.'/system/defines/config.conf'));
    fclose($the_handler);
    $the_lines = explode(PHP_EOL, $elements);
    foreach($the_lines as $line => $string){
        if(strstr($string, '=')){
            $elements = explode('=', $string);
            $ajax_configs[$elements[0]] = $elements[1];
        }
    }    
}else{
    echo 'Arquivo não encontrado.';
}

$ajax_configs = (object)$ajax_configs;

$ajax_configs->dsn = 'mysql:host=' . $ajax_configs->host . ';dbname=' . $ajax_configs->db;
