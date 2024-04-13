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
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bezpieczny_system_erp";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $option = $_POST["option"] ?? $_GET["option"];
    switch ($option) {
        case 1:
            if (!empty($_POST["name"]) && !empty($_POST["email"])) {
                $stmt = $conn->prepare("INSERT INTO crm (name, email, subscription) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $_POST["name"], $_POST["email"], $_POST["subscription"]);
                $stmt->execute();
                echo '<h3>Klient został dodany.</h3>';
                $stmt->close();
            } else echo '<h3>Błąd: Wszystkie pola formularza są wymagane.</h3>';
            break;
        case 2:
        case 5:
            echo '<style>div{height: auto;padding: 3vw;}</style>';
            $sql = $option == 2 ? "SELECT * FROM crm" : "SELECT email FROM crm";
            $result = $conn->query($sql);
            echo "<table>";
            if ($option == 2) echo "<tr><th>id</th><th>Imię i nazwisko</th><th>Adres e-mail</th><th>Subskrypcja</th></tr>";
            while ($row = $result->fetch_assoc()) {
                if ($option == 2) {
                    echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td><td>{$row['subscription']}</td></tr>";
                } else {
                    echo "<tr><td>{$row['email']}</td></tr>";
                }
            }
            echo "</table>";
            break;
        case 3:
            if (!empty($_POST["id"]) && !empty($_POST["name"]) && !empty($_POST["email"])) {
                $stmt = $conn->prepare("UPDATE crm SET name = ?, email = ?, subscription = ? WHERE id = ?");
                $stmt->bind_param("sssi", $_POST["name"], $_POST["email"], $_POST["subscription"], $_POST["id"]);
                $stmt->execute();
                if ($stmt->affected_rows > 0) echo '<h3>Klient został zaktualizowany.</h3>';
                else echo '<h3>Klient o podanym id nie istnieje.</h3>';
                $stmt->close();
            } else echo '<h3>Błąd: Wszystkie pola formularza są wymagane.</h3>';
            break;
        case 4:
            if (!empty($_POST["id"])) {
                $stmt = $conn->prepare("DELETE FROM crm WHERE id = ?");
                $stmt->bind_param("i", $_POST["id"]);
                $stmt->execute();
                if ($stmt->affected_rows > 0) echo '<h3>Klient został usunięty.</h3>';
                else echo '<h3>Klient o podanym id nie istnieje.</h3>';
                $stmt->close();
            } else echo '<h3>Błąd: Wszystkie pola formularza są wymagane.</h3>';
            break;
        default:
            echo '<h3>Błąd: Nieprawidłowy sposób dostępu do tego skryptu.</h3>';
            break;
    }
    $conn->close();
    if (in_array($option, [1, 3, 4])) echo '<a href="./crm-' . $option . '.php">Wróć</a>';
    else echo '<a href="./crm.php">Wróć</a>';
    ?>
    </div>
</body>
</html>