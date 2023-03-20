<?php 
include('functions.php');
?>  
<!DOCTYPE html>
<html lang="en">

<head>
    <title>MULTIPLE REGISTION
    </title>
    <link rel="stylesheet" href="subb.css" crossorigin="anonymous">
    

</head>
<?php

session_start();
include "configer.php";



if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    header('Location: login.php');
    exit;
}
?>
<body>
    <div id="wrap">
        <div class="container">
            <div class="row">
          <section>
          <div class='division'>
                <form class="form-horizontal" action="importData.php" method="post" name="upload_excel" enctype="multipart/form-data">
                    <fieldset>

                        <!-- Form Name -->
                        <legend class="reg" >CHOOSE CSV FILE  </legend>

                        <!-- File Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File</label>
                            <div class="col-md-4">
                                <input class='file' type="file" name="file" id="file" class="input-large" required>
                            </div>
                        </div>
            
                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                            <div class="col-md-4">
                                <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
                            </div>
                        </div>
                        <div class="sub">
            <a href='dashboard.php'>BACK</a>
        </div> 
            
                    </fieldset>
                </form>
</div>
</section>
        
            </div>
<?php
 records();
?>
        </div>
          <div>
            <form class="form-horizontal" action="import.php" method="post" name="upload_excel" enctype="multipart/form-data">
                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                <input type="submit" name="Export" class="btn btn-success" value="export to excel"/>
                            </div>
                        </div>                    
            </form>           
        </div>
    </div>
</body>

</html>