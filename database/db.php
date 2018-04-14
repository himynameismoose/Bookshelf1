<?php
/**
 * This is the data layer to connect to database to get data and to insert data
 *
 * @author Mershelle Rivera
 * @version GIT: https://github.com/himynameismoose/Bookshelf
 */

// This is our data layer!

/**
 * This function will connect to the database
 *
 * @return mysqli returns the mysqli connection
 */
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

/**
 * This function will extract the books table data to be used to be displayed
 *
 * @return array returns all records of the books table data
 */
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

/**
 * This function is able to insert data into the books table
 *
 * @param $title the title of the book
 * @param $fiction inserts 1 if the book is fiction, 0 for non-fiction
 * @param $publisher the name of the publishing company
 * @param $summary A summary of the book
 * @param $pages the number of pages of the book
 * @return bool|mysqli_result returns a connection to the database and insets the
 *                              query statement
 */
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