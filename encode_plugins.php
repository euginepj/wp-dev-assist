<?php 

$return = []; 

if(isset($_POST) AND isset($_POST['q']) and ($_POST['q'] != '')) { 

    $plugins = $_POST['q']; 
    
    $plugin_list = ''; 
    foreach($plugins as $k => $plugin) { 
        $char = strlen($plugin); 
        $plugin_list .= 'i:' . $k . ';s:' . $char . ':"'. $plugin .'";';
    }

    $plugin_str = 'a:' . $k . ':{' . $plugin_list . '}';

    $return = ['status' => 'Success', 'message' => 'Able to process', 'plugin_str' => $plugin_str];
} else { 

    $return = ['status' => 'Error', 'message' => 'Not able to process']; 
}

echo json_encode($return);