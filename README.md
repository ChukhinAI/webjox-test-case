1) Устанавливаем зависимости
2) Восстаналиваем базу данных из дампа database_dump/webjox_case_db.sql (login: root; pass:)
3) зпускаем сервер для базы данных c поддержкой MySql версии ^8.0.15
4) запускаем приложение через npm run prod и php artisan serve
5) идем по адресу приложения, на странице /login вводим любую из указанных пару логин-пароль:
    1. admin1@mail.com admin1pas
    2. admin2@mail.com admin2pas
    3. moder1@mail.com moder1pas
    4. moder2@mail.com moder2pas
6)  по адресу /admin_panel можно посмотреть, отредактировать и создать/удалить посты(в зависимости от прав учетной записи admin/moder)
7) profit
