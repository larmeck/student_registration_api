<?php

header('Content-Type: application/json');
header('Access-Control_Allow-Origin: *');
header('Access-Control_Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content_Type, Access-Control-Allow_Headers, Authorization, X-Requested-With');



require 'db.php';


if ($_SERVER['REQUEST_METHOD']== 'POST'){
    $data =  json_decode(file_get_contents("php://input"));


    if (!empty($data->name) && !empty($data->email) && !empty($data->course)) {
        $name = htmlspecialchars(strip_tags($data->name));
        $email = htmlspecialchars(strip_tags($data->email));
        $phone = htmlspecialchars(strip_tags($data->phone));
        $course = htmlspecialchars(strip_tags($data->course));



        $query = "INSERT INTO students (name, email, phone, course) VALUES (:name, :email, :phone, :course)";
        $stmt = $pdo->prepare($query);

        if ($stmt->execute([':name' => $name, ':email' => $email, ':phone' => $phone, ':course' => $course])) {
            http_response_code(201);
            echo json_encode(['message' => 'Student registered successfully']);
        } else {
            http_response_code(503);
            echo json_encode(['message' => 'Failed to register student']);
        }
    }  else {
        http_response_code(400);
        echo json_encode(['message' => 'Incomplete data']);
    } 
} else {
        http_response_code(405);
        echo json_encode(['message' => 'Method not allowed']);
    }















?>