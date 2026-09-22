<?php
require 'vendor/autoload.php';

// Database Connection
try {
    // Atlas Connection String
    $uri = "mongodb+srv://pgadmin:pg123@cluster0.bniwefa.mongodb.net/pg_management?retryWrites=true&w=majority";
    
    $options = [
        'tls' => true,
        'tlsCAFile' => "D:\\xampp_new\\php\\extras\\ssl\\cacert.pem",
        'typeMap' => ['root' => 'array', 'document' => 'array']
    ];
    
    $client = new MongoDB\Client($uri, $options);
    $db = $client->pg_management;

    // Collections
    $students = $db->students;
    $rooms = $db->rooms;
    $payments = $db->payments;
    $owners = $db->owners;
    
} catch (Exception $e) {
    echo "<div class='alert alert-warning m-4 shadow-sm border-0 rounded-4 p-4'>
            <h4 class='fw-bold text-dark'><i class='fas fa-exclamation-triangle me-2 text-warning'></i>Connection Error</h4>
            <p class='mb-0'>Error: " . $e->getMessage() . "</p>
          </div>";
}
?>
