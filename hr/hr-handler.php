<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>HR Handler</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h2>HR Handler</h2>
    <div>
    <?php
    $option = $_POST["option"] ?? $_GET["option"];
    switch ($option) {
        case 1:
            if (!empty($_POST["name"]) && !empty($_POST["date"]) && !empty($_POST["department"]) && !empty($_POST["position"])) {
                $handle = fopen('./hr.csv', 'a');
                fputcsv($handle, [uniqid(), $_POST["name"], $_POST["date"], $_POST["department"], $_POST["position"], $_POST["permissions"]]);
                fclose($handle);
                echo '<h3>Pracownik został dodany.</h3>';
            } else echo '<h3>Błąd: Wszystkie pola formularza są wymagane.</h3>';
            break;
        case 2:
            echo '<style>div{height: auto;padding: 3vw;}</style>';
            $handle = fopen('./hr.csv', 'r');
            fgetcsv($handle);
            echo "<table>";
            echo "<tr><th>ID</th><th>Imię i nazwisko</th><th>Data urodzenia</th><th>Oddział</th><th>Pozycja</th><th>Uprawnienia</th></tr>";
            while (($data = fgetcsv($handle)) !== false) {
                echo "<tr><td>$data[0]</td><td>$data[1]</td><td>$data[2]</td><td>$data[3]</td><td>$data[4]</td><td>$data[5]</td></tr>";
            }
            echo "</table>";
            fclose($handle);
            break;
        case 3:
            if (!empty($_POST["id"]) && !empty($_POST["name"]) && !empty($_POST["date"]) && !empty($_POST["department"]) && !empty($_POST["position"])) {
                $id = $_POST["id"];
                $name = $_POST["name"];
                $date = $_POST["date"];
                $department = $_POST["department"];
                $position = $_POST["position"];
                $permissions = $_POST["permissions"];
                $handle = fopen('./hr.csv', 'r+');
                $found = false;
                $updatedData = [];
                while (($data = fgetcsv($handle)) !== false) {
                    if ($data[0] == $id) {
                        $data[1] = $name;
                        $data[2] = $date;
                        $data[3] = $department;
                        $data[4] = $position;
                        $data[5] = $permissions;
                        $found = true;
                    }
                    $updatedData[] = $data;
                }
                if ($found) {
                    ftruncate($handle, 0);
                    rewind($handle);
                    foreach ($updatedData as $data) fwrite($handle, implode(',', $data) . PHP_EOL);
                    echo '<h3>Pracownik został zaktualizowany.</h3>';
                } else echo '<h3>Pracownik o podanym ID nie istnieje.</h3>';
                fclose($handle);
            } else echo '<h3>Błąd: Wszystkie pola formularza są wymagane.</h3>';
            break;
        case 4:
            if (!empty($_POST["id"])) {
                $id = $_POST["id"];
                $handle = fopen('./hr.csv', 'r+');
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
                    echo '<h3>Pracownik został usunięty.</h3>';
                } else echo '<h3>Pracownik o podanym ID nie istnieje.</h3>';
                fclose($handle);
            } else echo '<h3>Błąd: Wszystkie pola formularza są wymagane.</h3>';
            break;
        default:
            echo '<h3>Błąd: Nieprawidłowy sposób dostępu do tego skryptu.</h3>';
            break;
    }
    if (in_array($option, [1, 3, 4])) echo '<a href="./hr-' . $option . '.php">Wróć</a>';
    else echo '<a href="./hr.php">Wróć</a>';
    ?>
    </div>
</body>
</html>