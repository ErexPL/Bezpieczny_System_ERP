<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Moduł CRM - Dodaj klienta</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h2>Moduł CRM - Dodaj klienta</h2>
    <div>
        <form action="./crm-handler.php" method="post">
            <label for="name">Imię i nazwisko:</label><br>
            <input type="text" id="name" name="name"><br><br>
            <label for="email">Adres e-mail:</label><br>
            <input type="email" id="email" name="email"><br><br>
            <label for="subscription">Subskrypcja:</label><br>
            <select id="subscription" name="subscription">
                <option value="subscribed">Aktywna</option>
                <option value="unsubscribed">Nieaktywna</option>
            </select><br><br>
            <input type="hidden" name="option" value="1">
            <input type="submit" value="Prześlij">
        </form>
        <a href="./crm.php">Wróć</a>
    </div>
</body>
</html>