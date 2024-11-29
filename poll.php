<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Adatbázis kapcsolat beállítása
$servername = "localhost";
$username = "alacordh_szavazas";
$password = "fckgwrhqq2yxrkt8tg6w2b7q8";
$dbname = "alacordh_dietmaker";

// Kapcsolódás az adatbázishoz
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    header('Content-Type: application/json');
    die(json_encode(["error" => "Kapcsolódási hiba: " . $conn->connect_error]));
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['newVote'])) {
        $newVote = $_POST['newVote'];
        $oldVote = isset($_POST['oldVote']) ? $_POST['oldVote'] : null;

        // Ha van régi szavazat, először csökkentjük annak számát
        if (!empty($oldVote)) {
            if ($oldVote === 'option_1') {
                $sql = "UPDATE votes SET option_1 = GREATEST(option_1 - 1, 0) WHERE id = 1";
            } elseif ($oldVote === 'option_2') {
                $sql = "UPDATE votes SET option_2 = GREATEST(option_2 - 1, 0) WHERE id = 1";
            } elseif ($oldVote === 'option_3') {
                $sql = "UPDATE votes SET option_3 = GREATEST(option_3 - 1, 0) WHERE id = 1";
            } elseif ($oldVote === 'option_4') {
                $sql = "UPDATE votes SET option_4 = GREATEST(option_4 - 1, 0) WHERE id = 1";
            } elseif ($oldVote === 'option_5') {
                $sql = "UPDATE votes SET option_5 = GREATEST(option_5 - 1, 0) WHERE id = 1";
            } elseif ($oldVote === 'option_6') {
                $sql = "UPDATE votes SET option_6 = GREATEST(option_6 - 1, 0) WHERE id = 1";
            }

            if (isset($sql) && $conn->query($sql) !== TRUE) {
                die(json_encode(["error" => "Nem sikerült frissíteni a régi szavazatot: " . $conn->error]));
            }
        }

        // Új szavazat hozzáadása
        $sql = ""; // Reseteljük az $sql változót
        if ($newVote === 'option_1') {
            $sql = "UPDATE votes SET option_1 = option_1 + 1 WHERE id = 1";
        } elseif ($newVote === 'option_2') {
            $sql = "UPDATE votes SET option_2 = option_2 + 1 WHERE id = 1";
        } elseif ($newVote === 'option_3') {
            $sql = "UPDATE votes SET option_3 = option_3 + 1 WHERE id = 1";
        } elseif ($newVote === 'option_4') {
            $sql = "UPDATE votes SET option_4 = option_4 + 1 WHERE id = 1";
        } elseif ($newVote === 'option_5') {
            $sql = "UPDATE votes SET option_5 = option_5 + 1 WHERE id = 1";
        } elseif ($newVote === 'option_6') {
            $sql = "UPDATE votes SET option_6 = option_6 + 1 WHERE id = 1";
        }

        if (!empty($sql) && $conn->query($sql) === TRUE) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["error" => "Nem sikerült frissíteni: " . $conn->error]);
        }
    } else {
        die(json_encode(["error" => "Hibás szavazati adatok érkeztek."]));
    }
    exit;
}

// Szavazatok lekérdezése (GET kérés)
$sql = "SELECT option_1, option_2, option_3, option_4, option_5, option_6 FROM votes WHERE id = 1";
$result = $conn->query($sql);
header('Content-Type: application/json');
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(["error" => "Nincsenek szavazatok"]);
}



$conn->close();
?>
