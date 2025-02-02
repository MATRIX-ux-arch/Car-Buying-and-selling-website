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
        <div style="background-color:white; padding:1em" class="container-fluid row">
            <div class="col-sm-3">
                <div style="width:90%; margin-top: 3em">
                <?php 
                        $id = $_SESSION['id'];
                        $resultUser = mysqli_query($db, "SELECT SALES_PERSON_NAME FROM sales_person WHERE SALES_PERSON_ID = '$id'");
                        $user = mysqli_fetch_array($resultUser);
                        $userName = $user['SALES_PERSON_NAME'];
                    ?>
                    <h4 style="text-align:center">Welcome <?php echo $userName; ?></h4>
                    <a href="#" style="margin-top: 1em;width:100%" class="btn btn-outline-success active">Home</a><hr>
                    <a href="post.php" style="width:100%" class="btn btn-outline-success">Add New Car</a><hr>
                    <a href="myAdds.php" style="width:100%" class="btn btn-outline-success">Show My Cars</a><hr>
                    <a href="index.php" style="width:100%" class="btn btn-outline-success">Logout</a>
                </div>
            </div>
            <div class="col">
                <form class="form-inline pad-right col">
                    <label>Max Price : </label>
                    <input class="form-control" name="price"/>
                    <label>Brand : </label>
                    <input style="margin-right: 2em" class="form-control" name="brand"/>
                    <button type="submit" name="search" class="btn btn-primary">Search</button>
                </form>
                <div class="container-fluid" style="margin-top: 3em">
                    <hr>
                    <?php 
                        while($arr = mysqli_fetch_array($result)){
                    ?>
                    <div style="background-color:white; padding:1em; box-shadow: 10px 10px 5px #aaaaaa;" class="container row">
                        <div class="col-sm-4">
                            <p><?php echo "<img width=300 src='dbimages/".$arr['IMAGE']."'>"; ?></p>
                        </div>
                        <div style="margin-top:1em" class="col">
                            <a class="float-left h5" href="salesPersonHome.php?showid=<?php echo $arr['CAR_ID']; ?>"><?php echo $arr['TRIM_NAME']; ?></a>
                            <h5 class="float-right"><?php echo $arr['CAR_PRICE']; ?> $</h5>
                        </div>
                    </div><br><hr><br>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>