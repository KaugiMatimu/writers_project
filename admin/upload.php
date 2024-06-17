<?php
$target_dir = "admin_upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($fileType != "pdf" && $fileType != "docx" && $fileType != "txt") {
    echo "Sorry, only PDF, DOCX & TXT files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). " has been uploaded.";
        // Notify users of the new file
        notifyUsers($target_file);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

function notifyUsers($filePath) {
    // Here you would implement the logic to send notifications to users.
    // For example, you could store notification data in a database.
    $notificationMessage = "You have a new notification from Wise Writers Admin. A new file is available for download.";
    $fileURL = "http://yourdomain.com/" . $filePath;
    
    // Example code to insert notification into a database
    // Assuming a database connection is already established
    $sql = "INSERT INTO notifications (message, file_url, timestamp) VALUES (?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $notificationMessage, $fileURL);
    $stmt->execute();
    
    $stmt->close();
    $conn->close();
}
?>
