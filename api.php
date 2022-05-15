<?php
    include("connection.php");
    session_start();
    if( !isset($_SESSION['id']) ) {
        sendErrorMessage("Unautorized request",403);
    }
    $actionType = $_POST['actionType'] ?? null;
    if(!$actionType) {
        sendInvalidRequestMessage();
    }
    switch($actionType) {
        case 'apply' : 
            $foodId = $_POST['foodId'] ?? null;
            $message = $_POST['message'] ?? null;
            if (!$foodId) {
                sendInvalidRequestMessage();
            } else {
                try {
                    $query = "INSERT INTO requests VALUES (NULL,".$foodId.",'".$message."',0,".$_SESSION['id'].");";
                    $result = $con->query($query);
                    http_response_code(201);
                    echo json_encode(
                        array("message" => "Request submitted successfully!")
                    );
                } catch(Exception $e) {
                    return sendErrorMessage($e->getMessage());
                }
            }
            break;
        case 'edit':
            $foodId = $_POST['foodId'] ?? null;
            $location = $_POST['location'] ?? 'NULL';
            $foodDetails = $_POST['foodDetails'] ?? 'NULL';
            $expiry = !isset($_POST['expiry']) ? strtotime($_POST['expiry']) : 'NULL';
            if (!$foodId) {
                sendInvalidRequestMessage();
            } else {
                try {
                    $query = "UPDATE food SET location='".$location."',foodDetails='".$foodDetails."',expiry = '".$expiry."' WHERE foodId=$foodId";
                    $result = $con->query($query);
                    http_response_code(200);
                    echo json_encode(
                        array("message" => "Request updated successfully!")
                    );
                } catch(Exception $e) {
                    return sendErrorMessage($e->getMessage());
                }
            }
            break;
        default:
            
    }
    function sendInvalidRequestMessage() {
        return sendErrorMessage('Invalid request');
    }
    function sendErrorMessage($message,$statusCode=500) {
        http_response_code($statusCode);
        echo json_encode(
            array("message" => $message)
        );
    }
?>