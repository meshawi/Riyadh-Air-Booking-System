<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../incloudes/dbh.inc.php'; 




function getAllBookings($pdo) {
    try {
        $sql = "SELECT 
                    b.bookingID, b.flightID, b.nationalID, b.firstName, b.lastName, b.age, b.birthDate, b.title, b.status, b.classType, b.bookedBy, 
                    f.DepartureTime, f.ArrivalTime, 
                    c1.cityName AS originCity, c2.cityName AS destinationCity,
                    s.seatNumber 
                FROM bookings b
                JOIN flights f ON b.flightID = f.FlightID
                JOIN cities c1 ON f.originCityID = c1.cityID
                JOIN cities c2 ON f.destinationCityID = c2.cityID
                LEFT JOIN seatpositions s ON b.flightID = s.flightID AND b.bookingID = s.bookingID";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

?>
