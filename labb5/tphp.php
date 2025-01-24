<?php
error_reporting(E_ALL);

$dbservername = "localhost";
$dbname = "userdb";
$dbusername = "userdb";
$dbpassword = "letusin2022";

if (isset($_POST['answer'])) { // Check if button is clicked
    $_s = $_POST['svar6'];
    $list1 = [$_POST['svar1'], $_POST['svar2'], $_POST['svar3'], $_POST['svar4'], $_POST['svar5'], $_POST['svar6']];
    $list2 = ['ሰ', 'በቡቢባቤብቦ', 'ቦ', 'ቢ', 'ኣነ' . $_s . 'ሽመይ', 'በለስ']; // Correct answers

    $i = 0;
    $point = 0;
    $len = count($list1) - 1;
    $mylist = [];

    while ($i <= $len) {
        if ($list1[$i] == $list2[$i]) { // Check if answers match
            $point++;
            $mylist[] = "✅";
        } else {
            $mylist[] = "❌";
        }
        $i++;
    }

    $feedback = '';
    if ($point <= 3) {
        $feedback = '('.$point.'/6) Gå genom kursen igen för att få bättre resultat.';
    } elseif ($point >= 5) {
        $feedback = '('.$point.'/6) Mycket bra!';
    } else {
        $feedback = '('.$point.'/6) Lagom bra, bra att försöka igen.';
    }

    try {
        $conn = new PDO("mysql:host=$dbservername;dbname=$dbname", $dbusername, $dbpassword);
        // Set PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare SQL and bind parameters
        $stmt = $conn->prepare('INSERT INTO results (kurskode, username, datetime, score) VALUES (:kurskode, :username, :datetime, :score)');
        $stmt->bindParam(':username', $new_user);
        $stmt->bindParam(':kurskode', $kursk);
        $stmt->bindParam(':datetime', $datetime);
        $stmt->bindParam(':score', $score);

        // Insert row
        $new_user = $_REQUEST['name'] . ' ' . $_REQUEST['efternamn'];
        $kursk = $_REQUEST['kod'];
        $datetime = date("Y-m-d H:i:s");
        $score = $feedback;
        $stmt->execute();

        // Close DB connection
        $conn = NULL;
        unset($_REQUEST['answer']);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
