<?php
// This is our data layer!

function getConnection()
{
    $user = 'mriverag_dbuser';
    $pass = 'b#]-t*hs^Y4X';
    $host = 'localhost';
    $database = 'mriverag_it328';

    $connection = mysqli_connect($host, $user, $pass, $database);

    // If we get a false value, something went wrong
    if (!$connection) {
        echo 'Error connection to DB: ' . mysqli_connect_error();
        exit;
    }

    return $connection;
}

function getBooks()
{
    $connection = getConnection();

    // Query for book records
    $query = 'SELECT title, fiction, publisher, summary, pages FROM books';

    $results = mysqli_query($connection, $query);

    if (!$results) {
        echo 'Error retrieving records.';
    }

    $records = array();
    while ($row = mysqli_fetch_assoc($results)) {
        $records[] = $row;
    }

    // free up server resources
    mysqli_free_result($results);

    return $records;
}

function insertBook($title, $fiction, $publisher, $summary, $pages)
{
    $connection = getConnection();

    $title = mysqli_real_escape_string($connection, $title);
    $publisher = mysqli_real_escape_string($connection, $publisher);
    $summary = mysqli_real_escape_string($connection, $summary);

    $query = "INSERT INTO books (title, fiction, publisher, summary, pages) 
                  VALUES ('$title', '$fiction', '$publisher', '$summary', '$pages');";

    return mysqli_query($connection, $query);
}