<?php include('ManagerServer.php');?>
<!DOCTYPE html>
<head>
    <title>Edit Cars</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <h1 style="margin-top:2em; text-align:center">Cars Uploaded by You</h1>
        <div class="container">
            <?php if(isset($_SESSION['msg'])): ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    ?>
                </div>
            <?php endif ?>
        </div>
        <div style="background-color:white; padding:1em" class="container-fluid row">
            <div class="col-sm-3">
                <div style="width:90%">
                    <h4 style="text-align:center">Account</h4>
                    <a href="ManagerHome.php" style="margin-top: 1em;width:100%" class="btn btn-outline-success">Home</a><hr>
                    <a href="ManagerEditCars.php" style="width:100%" class="btn btn-outline-success active">Update Cars</a><hr>
                    <a href="index.php" style="width:100%" class="btn btn-outline-success">Logout</a>
                </div>
            </div>
            <div class="col"><hr>
                <?php 
                    $id = $_SESSION['id'];
                    while($arr = mysqli_fetch_array($result)){
                ?>
                <div style="background-color:white; padding:1em; box-shadow: 10px 10px 5px #aaaaaa;" class="container row">
                    <div class="col-sm-4">
                        <p><?php echo "<img width=300 src='dbimages/".$arr['IMAGE']."'>"; ?></p>
                    </div>
                    <div style="margin-top:1em" class="col">
                        <div class="float-left">
                            <a class="float-left h5" href="salesPersonHome.php?showid=<?php echo $arr['CAR_ID']; ?>"><?php echo $arr['TRIM_NAME']; ?></a>
                        </div>
                        <div class="float-right">
                            <h5 class="float-right"><?php echo $arr['CAR_PRICE']; ?> $</h5><br>
                            <a href="ManagerServer.php?del=<?php echo $arr['CAR_ID']; ?>" style="width: 10em" class="float-right btn btn-danger">Delete</a><br><hr>
                            <a href="UpdateCarManager.php?edit=<?php echo $arr['CAR_ID']; ?>" style="width: 10em" class="float-right btn btn-info">Edit</a>
                        </div>
                    </div>
                </div><br><hr><br>
                <?php } ?>
            </div>
        </div>
    </div>
</body>