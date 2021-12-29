<link rel="stylesheet" type="text/css" href="estilos.css">

    <div class="Charge" >
    <div id="response"
        class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>">
        <?php if(!empty($message)) { echo $message; } ?>
        </div>
    <div class="outer-scontainer" >
        <div class="row">

            <form class="form-horizontal" action="" method="post"
                name="frmCSVImport" id="frmCSVImport"
                enctype="multipart/form-data">
                <div class="input-row">
                    <label class="col-md-4 control-label">Choose CSV
                        File</label> <input type="file" name="file"
                        id="file" accept=".csv">
                    <button type="submit" id="submit" name="import"
                        class="btn-submit">Import</button>
                    <br />

                </div>

            </form>
            </div>

            <?php


include('Conexion.php');
$conn=conectar();

if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    $count=1;
    $sqldelete = "DELETE FROM users";
    $conn->query($sqldelete);
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        
        while (($column = fgetcsv($file, 10000, ";")) !== FALSE) {
            
            $userId = "";
            if (isset($column[0])) {
                $userId = mysqli_real_escape_string($conn, $column[0]);
                
            }
            $userName = "";
            if (isset($column[1])) {
                $userName = mysqli_real_escape_string($conn, $column[1]);
                
            }
            $password = "";
            if (isset($column[2])) {
                $password = mysqli_real_escape_string($conn, $column[2]);
            }
            $firstName = "";
            if (isset($column[3])) {
                $firstName = mysqli_real_escape_string($conn, $column[3]);
            }
            $lastName = "";
            if (isset($column[4])) {
                $lastName = mysqli_real_escape_string($conn, $column[4]);
            }
            
            $sqlInsert = "INSERT into users (userId,userName,password,firstName,lastName)
                   values ($userId,'$userName','$password','$firstName','$lastName')";
            


            

            if($count==1){

            }
            else{
                if ($conn->query($sqlInsert) === TRUE) {
                    
                  } else {
                    echo "Error: " . $sqlInsert . "<br>" . $conn->error;
                  }
            }
            
            
            $count=$count+1;
            
            
            
        }
    }
}
?>

<form class="Charge" action="">
        <input type="file" name="Cargar Archivo">
        <input class="cargar" type="submit" value="Cargar">
    </form>