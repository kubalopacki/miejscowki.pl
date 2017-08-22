<?php

function redirect($url, $code)
{
    http_response_code($code);
    header('Location: ' . $url);

    exit(0);
}

function checkUploadedImage()
{
    if ($_FILES['image']['error'] > 0) {
        echo 'problem: ';
        switch ($_FILES['image']['error']) {
            // jest większy niż domyślny maksymalny rozmiar,
            // podany w pliku konfiguracyjnym
            case 1: {
                echo 'Filesize is too big.';
                break;
            }

            // jest większy niż wartość pola formularza 
            // MAX_FILE_SIZE
            case 2: {
                echo 'Filesize is too big.';
                break;
            }

            // plik nie został wysłany w całości
            case 3: {
                echo 'The uploaded file was only partially uploaded.';
                break;
            }

            // plik nie został wysłany
            case 4: {
                echo 'No file was uploaded.';
                break;
            }

            // pozostałe błędy
            default: {
                echo 'Error. Please try with another image or try again later.';
                break;
            }
        }
        return false;
    }
    return true;
}

function checkTypeOfUploadedImage()
{
    if ($_FILES['image']['type'] != 'image/jpeg' || $_FILES['image']['type'] != 'image/png')
        return false;
    return true;
}

function saveUploadedImage()
{
    $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

    $basename = md5(uniqid()) . "." . $extension;

    $url = "/images/$basename";

    $filename = __DIR__ . $url;


    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $filename)) {
            echo 'problem: Nie udało się skopiować pliku do katalogu.';
            return false;
        }
    } else {
        echo 'problem: Możliwy atak podczas przesyłania pliku.';
        echo 'Plik nie został zapisany.';
        return false;
    }

    return $url;
}
