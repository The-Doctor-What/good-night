<?php
$table = $_GET['table'];
$row = $_GET['row'];

if (file_exists('database/' . $table . '.json')) {
    $data = file_get_contents('database/' . $table . '.json');
    if (isset($row)) {
        $data = json_decode($data, true);
        if (array_key_exists($row, $data)) {
            echo json_encode($data[$row]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Строка не найдена'
            ]);
        }
    } else {
        echo $data;
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Таблица ' . $table . ' не найдена',
    ]);
}