<?php
$existingUsers = [
    ['id' => 1, 'name' => 'Пользователь 1', 'email' => 'first@example.com'],
    ['id' => 2, 'name' => 'Пользователь 2', 'email' => 'second@example.com']
];

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

$logFile = 'registration.log';
$logData = "";

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $response = ['success' => false, 'message' => 'Неверный адрес электронной почты!'];
    echo json_encode($response);
    exit;
}

if ($password !== $confirmPassword) {
    $response = ['success' => false, 'message' => 'Пароли не совпадают!'];
    echo json_encode($response);
    exit;
}

foreach ($existingUsers as $user) {
    if ($user['email'] == $email) {
        $logData = "Попытка регистрации с существующим адресом: $email\n";
        file_put_contents($logFile, $logData, FILE_APPEND);

        $response = ['success' => false, 'message' => 'Пользователь с такой почтой уже зарегистрирован!'];
        echo json_encode($response);
        exit;
    }
}

$logData = "Пользователь успешно зарегистрирован: $email\n";
file_put_contents($logFile, $logData, FILE_APPEND);
$response = ['success' => true, 'message' => 'Вы успешно зарегистрированы!'];
echo json_encode($response);