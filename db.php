<?php
header('Content-Type: application/json');

try {

    $data = json_decode(file_get_contents('php://input'), true);
    $email = $data["email"];
    $path = "uploads/{$data['audio']}";


    if (isset($email) && filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($path) !== 0) {
        
        $dsn = 'mysql:dbname=i9tr28y9cdja0h73;host=m7nj9dclezfq7ax1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;port=3306;';
        $user = 'olgt1sqflpfm3x91';
        $password = 'oz4t4ugj3vnl9ge2';

        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $sql = "INSERT INTO `uploadings` (`email`, `path`) VALUES (:email, :path)";

        $stmt = $dbh->prepare($sql);

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':path', $path, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $httpResponse = [
                'status' => 'ok',
                'message' => 'Record inserted successfully.'
            ];
        } else {
            $httpResponse = [
                'status' => 'error',
                'message' => 'Failed to insert record.'
            ];
        }
    } else {
        $httpResponse = [
            'status' => 'error',
            'message' => 'Invalid email or path.'
        ];
    }
} catch (PDOException $e) {
    $httpResponse = [
        'status' => 'error',
        'message' => 'Database error: ' . $e->getMessage()
    ];
} catch (Exception $e) {
    $httpResponse = [
        'status' => 'error',
        'message' => 'An error occurred: ' . $e->getMessage()
    ];
}

echo json_encode($httpResponse);
exit;
?>


   