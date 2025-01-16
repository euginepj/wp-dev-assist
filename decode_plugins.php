<?php

$return = [];

if (isset($_POST) and isset($_POST['q']) and ($_POST['q'] != '')) {

    $q = $_POST['q'];

    $primary_array = explode('{', $q);
    $plugin_info = $primary_array[0];
    
    $plugin_data = trim($primary_array[1], '}');
    
    $plugin_array = explode(';i:', $plugin_data);
    $plugin_list = [];
    
    foreach ($plugin_array as $k => $plugin) {
        $plugin_split = explode(':', $plugin);
        $plugin_name = trim(end($plugin_split), '"');
    
        $plugin_list[] = $plugin_name;
    }
    
    $return = ['status' => 'Success', 'message' => 'Able to process', 'plugins' => $plugin_list];
} else {
    
    $return = ['status' => 'Error', 'message' => 'Unable to process'];
}

echo json_encode($return);