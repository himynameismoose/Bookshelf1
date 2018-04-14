<?php
/**
 * This is a web file of a form to insert a book to the book shelf.
 *
 * @author Mershelle Rivera
 * @version GIT: https://github.com/himynameismoose/Bookshelf1
 */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require '../database/db.php';
    $title = $_POST['title'];
    $fiction = $_POST['fiction'];
    $publisher = $_POST['publisher'];
    $summary = $_POST['summary'];
    $pages = $_POST['pages'];

    // Enter the record
    insertBook($title, $fiction, $publisher, $summary, $pages);

    // Redirect
    header('location: viewBooks.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <title>Mershelle's Book Shelf</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.css">

    <!-- jquery -->
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

<div class="container">
    <form action="insertBook.php" method="post">
        <!-- book title -->
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="title">
            </div>
        </div>

        <!-- fiction or not? -->
        <div class="form-group row">
            <label class="col-xs-12 col-sm-2 col-form-label" for="fiction">Fiction: </label>
            <div class="col-xs-12 col-sm-10 ">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="fiction" value="1" checked>
                    <label class="form-check-label">Yes</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="fiction" value="0">
                    <label class="form-check-label">No</label>
                </div>
            </div>
        </div>

        <!-- publisher -->
        <div class="form-group row">
            <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
            <div class="col-sm-10">
                <select class="form-control" name="publisher">
                    <option></option>
                    <option>Harper Collins</option>
                    <option>Pearson</option>
                    <option>Scholastic Press</option>
                    <option>Penguin Classics</option>
                    <option>Bantam</option>
                    <option>Delacorte Press</option>
                    <option>Mutual Publishing</option>
                </select>
            </div>
        </div>

        <!-- summary -->
        <div class="form-group row">
            <label for="summary" class="col-sm-2 col-form-label">Summary</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="7" name="summary"></textarea>
            </div>
        </div>

        <!-- # of pages -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="pages">Pages</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="pages" placeholder="365">
            </div>
        </div>

        <!-- submit the form -->
        <div class="form-group row justify-content-center">
            <div class="col-sm-3">
                <input type="submit" class="btn btn-info btn-block form-control" value="Add!">
            </div>
        </div>
    </form>
</div>

</body>
</html>


