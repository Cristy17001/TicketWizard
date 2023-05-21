<?php
    declare(strict_types = 1);

    require_once('../session.php');
    $session = new Session();

    require_once('../database/connection.db.php');
    require_once('../database/User.class.php');
    

    $db = getDatabaseConnection();
    $user = User::getUser($db, $session->getId());
    
    // Check if the request has a file and it was uploaded without errors
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Retrieve the file information
        $tempFilePath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        
        // Perform any necessary validation and security checks on the uploaded file
        
        // Determine the destination directory and file path for storing the uploaded image
        $destinationDirectory = '../source';
        $destinationFilePath = $destinationDirectory . '/' . $fileName;

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($tempFilePath, $destinationFilePath)) {
            // Debugging information
            print_r('Uploaded file moved to: ' . $destinationFilePath);
            
            // Update the user's image
            $user->image = $destinationFilePath;

            // Save the updated user object
            $user->save($db);
            http_response_code(200);
            echo 'Image uploaded and database updated successfully';
        } else {
            // Debugging information
            error_log('Failed to move the uploaded file');
            
            // Failed to move the uploaded file
            http_response_code(500);
            echo 'Failed to move the uploaded file';
        }
    } else {
            
        // No file uploaded or there was an error during upload
        http_response_code(400);
        echo 'No file uploaded or there was an error during upload';
    }
?>
