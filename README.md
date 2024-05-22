# RegisterForm

Этот проект представляет собой простую страницу с формой регистрации, отправляющую данные через AJAX и обрабатывающую их на сервере с помощью PHP.

## Установка и запуск

1. Склонируйте репозиторий:
    ```bash
    git clone https://github.com/NomenusorisM/RegistrationForm.git
    ```
2. Перейдите в директорию проекта:
    ```bash
    cd RegistrationForm
    ```
3. Убедитесь, что у вас установлен веб-сервер (например, Apache или Nginx) с поддержкой PHP.
4. Разместите файлы проекта в корневую директорию веб-сервера (например, `/var/www/html/`).

## Важное замечание о правах доступа

Файл `registration.log`, используемый для логирования регистрации, должен иметь права на запись. Если логирование не работает, вероятно, проблема связана с правами доступа. Для устранения этой проблемы выполните следующие шаги:

1. Перейдите в директорию проекта:
    ```bash
    cd /path/to/RegistrationForm
    ```

2. Установите права на запись для файла `registration.log`:
    ```bash
    chmod 666 registration.log
    ```

3. Если файла `registration.log` не существует, создайте его и установите нужные права:
    ```bash
    touch registration.log
    chmod 666 registration.log
    ```

## Объяснение прав доступа

Права `666` означают, что файл будет доступен для чтения и записи всем пользователям. Это удобно для разработки, но потенциально небезопасно для продакшн-среды. В продуктивной среде рекомендуется установить минимально необходимые права доступа и убедиться, что веб-сервер имеет достаточно прав для записи логов.

## Использование

Откройте браузер и перейдите по адресу вашего веб-сервера (например, `http://localhost/`). Вы увидите форму регистрации. Заполните все поля и нажмите "Register". 

## Пример AJAX-запроса и обработки на сервере

### AJAX (JavaScript)
Файл `scripts.js` содержит код, отвечающий за отправку данных формы на сервер.

### Обработка на сервере (PHP)
Файл `register.php` обрабатывает данные формы, выполняет валидацию и логирует результат.

Если регистрация прошла успешно, форма скрывается и выводится сообщение об успешной регистрации. Если произошла ошибка (например, пользователь уже существует), выводится соответствующее сообщение об ошибке.

## Лицензия

Этот проект распространяется под лицензией MIT. Подробнее см. файл [LICENSE](LICENSE).
