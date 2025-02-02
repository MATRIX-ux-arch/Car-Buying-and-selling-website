<?php include('server.php');?>
<!DOCTYPE html>
<head>
    <title>Add</title>
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
        <h1 style="margin-top: 1em; text-align:center">Car Details</h1>
        <div style="background-color:white; margin-top: 1em" class="container-fluid">
            <?php 
                $id = $_SESSION['showid'];
                $que = mysqli_query($db, "select * from car where CAR_ID = '$id'");
                while($arr = mysqli_fetch_array($que)){
            ?>
            <div class="row">
                <div style="margin-top: 5em" class="col">
                    <p><?php echo "<img width=900 src='dbimages/".$arr['IMAGE']."'>"; ?></p>
                </div>
                <div class="col">
                <div style="margin-top:3em; padding: 1em" class="border border-dark shadow-lg row">
                    <div class="col">
                        <h3> $ <?php echo " ".number_format($arr['CAR_PRICE'], 2); ?></h3><hr>
                        <?php 
                            $sid = $arr['SALES_PERSON_ID'];
                            $query = mysqli_query($db, "select * from SALES_PERSON where SALES_PERSON_ID = '$sid'");
                            $arrr = mysqli_fetch_array($query);
                            $name = $arrr['SALES_PERSON_NAME'];
                            $phone = $arrr['SALES_PERSON_EMAIL'];
                            $address = $arrr['SALES_PERSON_COUNTRY'];
                        ?>
                        <p>Name  : <?php echo $arr['TRIM_NAME'] ?></p><hr>
                        <p>Model : <?php echo $arr['CAR_MODEL'] ?></p><hr>
                        <p>VIN   : <?php echo $arr['VIN_NUMBER'] ?></p><hr>
                        <p>Year  : <?php echo $arr['YEAR_OF_MANUFACTURE'] ?></p><hr>
                        <p>Color : <?php echo $arr['CAR_COLOR'] ?></p><hr>
                        <p>Brand : <?php echo $arr['CAR_BRAND'] ?></p><hr>
                    </div>
                    
                </div>
                <div style="margin-top:3em; padding: 1em" class="border border-dark shadow-lg">
                    <div>
                        <h3>Seller Description</h3>
                        <p>Name: <?php echo $name ?></p>
                        <p>Contact: <?php echo $phone ?></p><hr>
                        <p>Address: <?php echo $address ?></p>
                    </div>
                    
                </div>
            
                    </div>
            </div>
            <div style="margin-top:3em; padding: 1em" class="border border-dark shadow-lg">
                <h3>Description:</h3><hr>
                <p><?php echo $arr['DESCRIPTION']?></p>
            </div>
        </div>
        <?php } ?>
    </div>
</body>