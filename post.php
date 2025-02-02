<?php include('server.php'); ?>
<!DOCTYPE html>
<head>
    <title>New Car</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div style="margin-top: 5em" class="container">
            <h1 style="text-align: center">Add New Car</h1>
            <form method="post" action="server.php" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Trim Name:</label>
                  <input type="hidden" value="<?php echo $_SESSION['id']; ?>" name="id">
                  <input type="text" class="form-control" placeholder="Enter Trim Name here" name="trim" required>
                </div>
                <div class="form-group">
                  <label>Model:</label>
                  <input type="text" class="form-control" placeholder="Enter Model here" name="model" required>
                </div>
                <div class="form-group">
                  <label>VIN Number:</label>
                  <input type="text" class="form-control" placeholder="Enter VIN Number here" name="vin" required>
                </div>
                <div class="form-group">
                  <label>Year Of Manufacture:</label>
                  <input type="text" class="form-control" placeholder="Enter Year Of Manufacture here" name="year" required>
                </div>
                <div class="form-group">
                  <label>Color:</label>
                  <input type="text" class="form-control" placeholder="Enter Color here" name="color" required>
                </div>
                <div class="form-group">
                  <label>Price:</label>
                  <input type="text" class="form-control" placeholder="Enter Price here" name="price" required>
                </div>
                <div class="form-group">
                  <label>Brand:</label>
                  <input type="text" class="form-control" placeholder="Enter Brand here" name="brand" required>
                </div>
                <div class="form-group">
                  <label>Description:</label>
                  <input type="text" class="form-control" placeholder="Enter Description here" name="description" required>
                </div>
                <div class="form-group">
                  <label>Picture:</label>
                  <input type="file" class="form-control" name="image" required>
                </div>
                <?php if(isset($_SESSION['msg'])): ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    ?>
                </div>
            <?php endif ?>
                <button type="submit" name="upload" class="form-control btn btn-primary">Post</button><br><br>
            </form>
        </div>
</body>