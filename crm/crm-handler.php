<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>CRM Handler</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h2>CRM Handler</h2>
    <div>
    <?php
    $option = $_POST["option"] ?? $_GET["option"];
    switch ($option) {
        case 1:
            if (!empty($_POST["name"]) && !empty($_POST["email"])) {
                $handle = fopen('./crm.csv', 'a');
                fputcsv($handle, [uniqid(), $_POST["name"], $_POST["email"], $_POST["subscription"]]);
                fclose($handle);
                echo '<h3>Klient został dodany.</h3>';
            } else echo '<h3>Błąd: Wszystkie pola formularza są wymagane.</h3>';
            break;
        case 2:
        case 5:
            echo '<style>div{height: auto;padding: 3vw;}</style>';
            $handle = fopen('./crm.csv', 'r');
            fgetcsv($handle);
            echo "<table>";
            if ($option == 2) echo "<tr><th>ID</th><th>Imię i nazwisko</th><th>Adres e-mail</th><th>Subskrypcja</th></tr>";
            else echo "<tr><th>Adres e-mail</th></tr>";
            while (($data = fgetcsv($handle)) !== false) {
                if ($option == 2) echo "<tr><td>$data[0]</td><td>$data[1]</td><td>$data[2]</td><td>$data[3]</td></tr>";
                else echo "<tr><td>$data[2]</td></tr>";
            }
            echo "</table>";
            fclose($handle);
            break;
        case 3:
            if (!empty($_POST["id"]) && !empty($_POST["name"]) && !empty($_POST["email"])) {
                $id = $_POST["id"];
                $name = $_POST["name"];
                $email = $_POST["email"];
                $subscription = $_POST["subscription"];
                $handle = fopen('./crm.csv', 'r+');
                $found = false;
                $updatedData = [];
                while (($data = fgetcsv($handle)) !== false) {
                    if ($data[0] == $id) {
                        $data[1] = $name;
                        $data[2] = $email;
                        $data[3] = $subscription;
                        $found = true;
                    }
                    $updatedData[] = $data;
                }
                if ($found) {
                    ftruncate($handle, 0);
                    rewind($handle);
                    foreach ($updatedData as $data) fwrite($handle, implode(',', $data) . PHP_EOL);
                    echo '<h3>Klient został zaktualizowany.</h3>';
                } else echo '<h3>Klient o podanym ID nie istnieje.</h3>';
                fclose($handle);
            } else echo '<h3>Błąd: Wszystkie pola formularza są wymagane.</h3>';
            break;
        case 4:
            if (!empty($_POST["id"])) {
                $id = $_POST["id"];
                $handle = fopen('./crm.csv', 'r+');
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
                    echo '<h3>Klient został usunięty.</h3>';
                } else echo '<h3>Klient o podanym ID nie istnieje.</h3>';
                fclose($handle);
            } else echo '<h3>Błąd: Wszystkie pola formularza są wymagane.</h3>';
            break;
        default:
            echo '<h3>Błąd: Nieprawidłowy sposób dostępu do tego skryptu.</h3>';
            break;
    }
    if (in_array($option, [1, 3, 4])) echo '<a href="./crm-' . $option . '.php">Wróć</a>';
    else echo '<a href="./crm.php">Wróć</a>';
    ?>
    </div>
</body>
</html>