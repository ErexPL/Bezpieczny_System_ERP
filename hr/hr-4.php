<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Moduł HR - Usuń pracownika</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h2>Moduł HR - Usuń pracownika</h2>
    <div>
    <form action="./hr-handler.php" method="post">
            <label for="id">ID:</label><br>
            <input type="text" id="id" name="id"><br><br>
            <input type="hidden" name="option" value="4">
            <input type="submit" value="Prześlij">
        </form>
        <a href="./hr.php">Wróć</a>
    </div>
</body>
</html>