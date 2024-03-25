<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Sprzedaż Handler</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h2>Sprzedaż Handler</h2>
    <div>
    <?php
    $option = $_POST["option"] ?? $_GET["option"];
    switch ($option) {
        case 1:
            if (!empty($_POST["name"]) && !empty($_POST["price"]) && !empty($_POST["date"])) {
                $handle = fopen('./sales.csv', 'a');
                fputcsv($handle, [uniqid(), $_POST["name"], $_POST["price"], $_POST["date"]]);
                fclose($handle);
                echo '<h3>Transakcja została dodana.</h3>';
            } else echo '<h3>Błąd: Wszystkie pola formularza są wymagane.</h3>';
            break;
        case 2:
            echo '<style>div{height: auto;padding: 3vw;}</style>';
            $handle = fopen('./sales.csv', 'r');
            fgetcsv($handle);
            echo "<table>";
            echo "<tr><th>ID</th><th>Produkt</th><th>Cena</th><th>Data</th></tr>";
            while (($data = fgetcsv($handle)) !== false) {
                echo "<tr><td>$data[0]</td><td>$data[1]</td><td>$data[2]</td><td>$data[3]</td></tr>";
            }
            echo "</table>";
            fclose($handle);
            break;
        case 3:
            if (!empty($_POST["id"]) && !empty($_POST["name"]) && !empty($_POST["price"]) && !empty($_POST["date"])) {
                $id = $_POST["id"];
                $name = $_POST["name"];
                $price = $_POST["price"];
                $date = $_POST["date"];
                $handle = fopen('./sales.csv', 'r+');
                $found = false;
                $updatedData = [];
                while (($data = fgetcsv($handle)) !== false) {
                    if ($data[0] == $id) {
                        $data[1] = $name;
                        $data[2] = $price;
                        $data[3] = $date;
                        $found = true;
                    }
                    $updatedData[] = $data;
                }
                if ($found) {
                    ftruncate($handle, 0);
                    rewind($handle);
                    foreach ($updatedData as $data) fwrite($handle, implode(',', $data) . PHP_EOL);
                    echo '<h3>Transakcja została zaktualizowana.</h3>';
                } else echo '<h3>Transakcja o podanym ID nie istnieje.</h3>';
                fclose($handle);
            } else echo '<h3>Błąd: Wszystkie pola formularza są wymagane.</h3>';
            break;
        case 4:
            if (!empty($_POST["id"])) {
                $id = $_POST["id"];
                $handle = fopen('./sales.csv', 'r+');
                $found = false;
                $updatedData = [];
                while (($data = fgetcsv($handle)) !== false) {
                    if ($data[0] == $id) {
                        $found = true;
                    } else {
                        $updatedData[] = $data;
                    }
                }
                if ($found) {
                    ftruncate($handle, 0);
                    rewind($handle);
                    foreach ($updatedData as $data) fwrite($handle, implode(',', $data) . PHP_EOL);
                    echo '<h3>Transakcja została usunięta.</h3>';
                } else echo '<h3>Transakcja o podanym ID nie istnieje.</h3>';
                fclose($handle);
            } else echo '<h3>Błąd: Wszystkie pola formularza są wymagane.</h3>';
            break;
        default:
            echo '<h3>Błąd: Nieprawidłowy sposób dostępu do tego skryptu.</h3>';
            break;
    }
    if (in_array($option, [1, 3, 4])) echo '<a href="./sales-' . $option . '.php">Wróć</a>';
    else echo '<a href="./sales.php">Wróć</a>';
    ?>
    </div>
</body>
</html>