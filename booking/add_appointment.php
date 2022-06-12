<?php

function getGroomerDetails($name)
{
    $groomersFile = "../db/groomers.txt";
    $groomers = explode("\n", file_get_contents($groomersFile));
    for ($i = 1; $i < count($groomers); $i++) {
        $infoElementArray = explode(";", $groomers[$i]);
        if ($infoElementArray[0] == $name) {
            return $infoElementArray;
        }
    }
}

function addAppointment(
    $email,
    $pet,
    $groomer,
    $hour,
    $date,
    $lavaggio,
    $taglio_pelo,
    $taglio_unghie,
    $spa,
    $anti_parassitari,
    $acconciatura_concorsi,
    $notes
) {
    $appointmentsFile = "../db/appointments.txt";
    $appointments = explode("\n", file_get_contents($appointmentsFile));
    $new_appointment = [];

    $groomerDetails = getGroomerDetails($groomer);
    array_push(
        $new_appointment,
        $email,
        $pet,
        $groomer,
        $groomerDetails[1],
        $hour,
        $date,
        0,  //confirmed
        $lavaggio,
        $taglio_pelo,
        $taglio_unghie,
        $spa,
        $anti_parassitari,
        $acconciatura_concorsi,
        $notes
    );
    $new_appointment = implode(";", $new_appointment);
    array_push($appointments, $new_appointment);
    $appointments = implode("\n", $appointments);
    file_put_contents($appointmentsFile, $appointments);
}

addAppointment(
    $_GET['email'],
    $_GET['pet'],
    $_GET['groomer'],
    $_GET['hour'],
    $_GET['date'],
    $_GET['lavaggio'],
    $_GET['taglio_pelo'],
    $_GET['taglio_unghie'],
    $_GET['spa'],
    $_GET['anti_parassitari'],
    $_GET['acconciatura_concorsi'],
    $_GET['notes']
);
