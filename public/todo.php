<?php
require_once 'app/config.php';
require_once 'app/core/db.php';
require_once 'app/core/App.php';

$app = new App;

if (isset($_POST['add'])) {
    $note = filter_var($_POST['note'], FILTER_SANITIZE_STRING);
    $app->add($note);
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $app->delete($id);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <title>Todo list</title>
</head>

<body>
    <div class="container min-vh-100 d-flex justify-content-center align-items-center">
        <form method="post">
            <div class="row mb-3">

                <label for="note">Enter note:</label>
                <div class="col-sm-10">
                    <input type="text" name="note" id="" class="form-control" required>
                </div>
                <div class="col-sm-2">
                    <button type="submit" name="add" class="btn btn-success">add</button>

                </div>
            </div>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>
                            Todo
                        </th>
                        <th>
                            #
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($app->read() as $note): ?>
                        <tr>
                            <td>
                                <?php echo $note['note']; ?>
                            </td>
                            <td>
                                <a href="index.php?delete=<?php echo $note['id']; ?>" class="btn btn-danger">delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </form>
    </div>

    </div>
</body>

</html>