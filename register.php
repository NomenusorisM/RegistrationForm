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

$log = function($message) use ($logFile, $email){
    $sender = !empty($email) ? " || $email" : "";
    $logData = date('Y-m-d H:i:s') . "$sender || $message\n";
    file_put_contents($logFile, $logData, FILE_APPEND);
    return;
};

$answer = function(bool $success, string $message){
    $response = ['success' => $success, 'message' => $message];
    echo json_encode($response);
    exit;
};

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $log("Попытка регистрации с некорректным адресом");
    $answer(false, "Неверный адрес электронной почты!");
}

if(empty($firstName) || empty($lastName)){
    $log("Попытка регистрации с пустыми полями");
    $answer(false, "Необходимо заполнить все поля!");
}

if (strlen($password) < 8){
    $log("Попытка регистрации с некорректным паролем");
    $answer(false, "Длина пароля должна быть больше 8!");
}

if ($password !== $confirmPassword) {
    $log("Попытка регистрации с неверным подтверждением пароля");
    $answer(false, "Пароли не совпадают!");
}

foreach ($existingUsers as $user) {
    if ($user['email'] == $email) {
        $log("Попытка повторной регистрации по одной почте");
        $answer(false, "Пользователь с такой почтой уже зарегистрирован!");
    }
}

$log("Пользователь успешно зарегистрирован");
$answer(true, "Вы успешно зарегистрированы!");