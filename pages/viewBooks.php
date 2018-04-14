<?php
/**
 * This file will be able to view all books in database and will be displayed in a
 * list-group
 *
 * @author Mershelle Rivera
 * @version GIT: https://github.com/himynameismoose/Bookshelf1
 */

require('../database/db.php');

getConnection();

$records = getBooks();
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <title>View Book Shelf</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.css">

    <!-- jQuery -->
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>

    <!-- bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">

    <link rel="stylesheet" href="../styles/styles.css">
</head>

<body>
<!-- nav bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <h1 class="navbar-brand">Book Shelf</h1>
</nav>

<!-- display books -->
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <!-- Book List -->
            <h2>Books Added</h2>
            <ul class="list-group">
                <?php
                foreach ($records as $record) {
                    echo "<li class='list-group-item'>
                          <h4>{$record['title']}</h4>
                          Publisher: {$record['publisher']},
                          Pages: {$record['pages']}, ";
                    if ($record['fiction'] == 1) {
                        echo "(fiction)";
                    } else {
                        echo "(non fiction)";
                    }
                    echo "<br><br><p>{$record['summary']}</p</li>";
                }
                ?>
            </ul>
        </div>
    </div>
</div>

</body>
</html>