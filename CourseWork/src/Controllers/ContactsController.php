<?php

class ContactsController {
    public function index() {
        require_once __DIR__ . '/../../views/contacts/index.php';
    }

    public function send() {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';
    $errors = [];
    $old = ['name' => $name, 'email' => $email, 'message' => $message];
    // валидация имени — только буквы и пробелы
    if (!preg_match('/^[а-яёА-ЯЁa-zA-Z\s]+$/u', $name)) {
        $errors[] = 'Имя должно содержать только буквы';
    }
    // валидация email
    if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
        $errors[] = 'Некорректный email';
    }
    // валидация сообщения
    if (empty(trim($message))) {
        $errors[] = 'Сообщение не может быть пустым';
    }
    if (!empty($errors)) {
        require_once __DIR__ . '/../../views/contacts/index.php';
        return;
    }
    $success = true;
    require_once __DIR__ . '/../../views/contacts/index.php';
}
}