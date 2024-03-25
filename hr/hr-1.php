<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Moduł HR - Dodaj pracownika</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h2>Moduł HR - Dodaj pracownika</h2>
    <div>
    <form action="./hr-handler.php" method="post">
            <label for="name">Imię i nazwisko:</label><br>
            <input type="text" id="name" name="name"><br><br>
            <label for="date">Data urodzenia:</label><br>
            <input type="date" id="date" name="date"><br><br>
            <label for="department">Oddział:</label><br>
            <input type="text" id="department" name="department"><br><br>
            <label for="position">Pozycja:</label><br>
            <input type="text" id="position" name="position"><br><br>
            <label for="permissions">Uprawnienia:</label><br>
            <select id="permissions" name="permissions">
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select><br><br>
            <input type="hidden" name="option" value="1">
            <input type="submit" value="Prześlij">
        </form>
        <a href="./hr.php">Wróć</a>
    </div>
</body>
</html>