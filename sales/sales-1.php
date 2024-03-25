<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Moduł Sprzedaż - Dodaj transakcję</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h2>Moduł Sprzedaż - Dodaj transakcję</h2>
    <div>
        <form action="./sales-handler.php" method="post">
            <label for="name">Produkt:</label><br>
            <input type="text" id="name" name="name"><br><br>
            <label for="price">Cena:</label><br>
            <input type="number" id="price" name="price"><br><br>
            <label for="date">Data:</label><br>
            <input type="date" id="date" name="date"><br><br>
            <input type="hidden" name="option" value="1">
            <input type="submit" value="Prześlij">
        </form>
        <a href="./sales.php">Wróć</a>
    </div>
</body>
</html>