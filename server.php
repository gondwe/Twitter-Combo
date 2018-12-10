<?php 

    header('Content-Type: application/json');

    if( !isset($_GET['q']))
    { 
    
        echo json_encode([]); 
        
        exit(); 
    
    }

    $q = "%{$_GET['q']}%";
    $r = "{$_GET['q']}%";

    $db = new mysqli("localhost","root",'','medicare');
    
    $data = $db->query("
        select 
                patientid AS id,
                patient_code, 
                patient_names, 
                postaladdress 
        from 
                patient_master 
        where 
                patient_names like '$q'
        or 
                patient_code like '$r'
        
        ");
    
    while($dy = $data->fetch_assoc()){ 
        
        $dx[] = $dy; 
    
    }
    
    echo json_encode($dx);

    ?>