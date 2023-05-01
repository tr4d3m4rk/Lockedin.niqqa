<?php
// Получаем данные из формы
$event_id = $_POST['event_id'];
$num_tickets = $_POST['num_tickets'];

// Создаем соединение с базой данных
$host = 'localhost'; // адрес сервера базы данных
$user = 'root'; // имя пользователя базы данных
$password = 'password'; // пароль для доступа к базе данных
$database = 'theatre'; // имя базы данных

$link = mysqli_connect($host, $user, $password, $database);

// Проверяем успешность соединения
if (!$link) {
    die('Ошибка подключения к базе данных: ' . mysqli_connect_error());
}

// Получаем информацию о мероприятии из базы данных
$query = "SELECT * FROM events WHERE id = $event_id";
$result = mysqli_query($link, $query);

// Обрабатываем результаты запроса
if ($result) {
    $event = mysqli_fetch_assoc($result);
    $total_price = $event['price'] * $num_tickets;
    
    // Добавляем информацию о заказе в базу данных
    $query = "INSERT INTO orders (event_id, num_tickets, total_price) VALUES ($event_id, $num_tickets, $total_price)";
    mysqli_query($link, $query);
    
    // Выводим сообщение о успешном заказе
    echo "Ваш заказ принят. Стоимость: $total_price руб.";
} else {
    echo "Ошибка выполнения запроса: " . mysqli_error($link);
}

// Закрываем соединение с базой данных
mysqli_close($link);
?>