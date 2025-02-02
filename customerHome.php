<?php include('server.php');?>
<!DOCTYPE html>
<head>
    <title>Sales Person Home</title>
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
        <h1 style="margin-top:2em; text-align:center">All Cars</h1>
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
        <div style="background-color:white; padding:1em;" class="container-fluid">
            <form class="form-inline pad-right">
                <label>Max Price : </label>
                <input class="form-control" name="price"/>
                <label>Brand : </label>
                <input style="margin-right: 2em" class="form-control" name="brand"/>
                <button type="submit" name="search" class="btn btn-primary">Search</button>
                <a style="margin-left: 2em" href="customerLogin.php" class="btn btn-warning">Logout</a>    
                <a style="margin-left: 2em" href="index.php" class="btn btn-danger">Home</a>    
            </form>
            <div class="col" style="margin-top: 3em"><hr>
                <?php 
                    while($arr = mysqli_fetch_array($result)){
                ?>
                <div style="background-color:white; padding:1em; box-shadow: 10px 10px 5px #aaaaaa;" class="container-fluid row">
                    <div class="col-sm-4">
                        <p><?php echo "<img width=300 src='dbimages/".$arr['IMAGE']."'>"; ?></p>
                    </div>
                    <div style="margin-top:1em;" class="col">
                        <a class="float-left h5" href="salesPersonHome.php?showid=<?php echo $arr['CAR_ID']; ?>"><?php echo $arr['TRIM_NAME']; ?></a>
                        <h5 class="float-right"><?php echo $arr['CAR_PRICE']; ?> $</h5>
                    </div>
                </div><br><hr><br>
                <?php } ?>
            </div>
        </div>
    </div>
</body>