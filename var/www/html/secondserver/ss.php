<?php

$html_file = '/var/www/html/secondserver/secondserver.html';

// Проверка существования файла
if (file_exists($html_file)) {
  // Установка заголовка Content-Type для HTML
  header('Content-Type: text/html; charset=utf-8');

  // Вывод содержимого файла
  readfile($html_file);
  // Или:
  // echo file_get_contents($html_file);

} else {
  echo "Файл '$html_file' не найден.";
}

?>
