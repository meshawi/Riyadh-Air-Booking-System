<?php
function getAccountsCount($pdo)
{
    try {
        $stmt = $pdo->prepare("SELECT COUNT(*) as account_count FROM users");
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return ($result !== false) ? $result['account_count'] : 0;

    } catch (PDOException $e) {
        echo 'Error retrieving account count: ' . $e->getMessage();
        return 0;
    }
}
function getRatingsCount($pdo)
{
    try {
        $stmt = $pdo->prepare("SELECT COUNT(*) as ratings_count FROM ratings");
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return ($result !== false) ? $result['ratings_count'] : 0;

    } catch (PDOException $e) {
        echo 'Error retrieving ratings count: ' . $e->getMessage();
        return 0;
    }
}
function getVisitsCount($pdo)
{
    try {
        $stmt = $pdo->prepare("SELECT count FROM visits WHERE id = 1");
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return ($result !== false) ? $result['count'] : 0;

    } catch (PDOException $e) {
        echo 'Error retrieving visit count: ' . $e->getMessage();
        return 0;
    }
}
function getBookingsCount($pdo)
{
    try {
        $stmt = $pdo->prepare("SELECT COUNT(*) as booking_count FROM bookings");
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return ($result !== false) ? $result['booking_count'] : 0;

    } catch (PDOException $e) {
        echo 'Error retrieving booking count: ' . $e->getMessage();
        return 0;
    }
}
function incrementVisitCount($pdo)
{
    try {
        $stmt = $pdo->prepare("UPDATE visits SET count = count + 1 WHERE id = 1");
        $stmt->execute();

    } catch (PDOException $e) {
        echo 'Error incrementing visit count: ' . $e->getMessage();
    }
}

// Call trackVisit with $pdo as a parameter
function trackVisit($pdo)
{
    if (!isset($_SESSION['visited'])) {
        incrementVisitCount($pdo);
        $_SESSION['visited'] = true;
    }
}

trackVisit($pdo);
?>