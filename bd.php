<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <title>Prediccion</title>
  </head>
  <body>
      
  <h1>HOUSE PRICES - GOLOD GROUP</h1>

  
<?php
    include('Conexion.php');
    $conn=conectar();?>

<?php
    function Contenedor() {
        
        $conn=conectar();?>
        

    <div class="contenedor" style="width:1200px">
        <table class="table table-hover table-dark table-fixed">
            <thead>
                <tr style="width: 1100px">
                <th style="width: 50px" scope="col">#</th>
                <th style="width: 100px" scope="col">Bedrooms</th>
                <th style="width: 100px" scope="col">Bathrooms</th>
                <th style="width: 70px" scope="col">Floors</th>
                <th style="width: 100px" scope="col">WaterFront</th>
                <th style="width: 50px" scope="col">Vista</th>
                <th style="width: 100px" scope="col">Condicion</th>
                <th style="width: 60px" scope="col">Grade</th>
                <th style="width: 100px" scope="col">Sqft_Living</th>
                <th style="width: 100px" scope="col">Sqft_lot</th>
                <th style="width: 100px" scope="col">Yr_built</th>
                <th style="width: 150px" scope="col">Yr_renovated</th>
                <th style="width: 100px" scope="col">Predicted</th>
                
                
                </tr>
            </thead>
            <tbody>
            <?php
                
                
                
                $sql="SELECT * FROM house";
                $Data = $conn->query($sql);

                $c=1;

                if (is_array($Data) || is_object($Data))
                {
                    foreach ($Data as $dato)
                    {
                        
                    
                            #REGRESION MULTIPLE
                            $coef=6485910;
                            $bathrooms=$dato['bathrooms'];
                            $bedrooms=$dato['bedrooms'];
                            $sqft_living=$dato['sqft_living'];
                            $sqft_lot=$dato['sqft_lot'];
                            $floors=$dato['floors'];
                            $waterfront=$dato['waterfront'];
                            $vista=$dato['vista'];
                            $condicion=$dato['condicion'];
                            $grade=$dato['grade'];
                            $yr_build=$dato['yr_built'];
                            $yr_renovated=$dato['yr_renovated'];
                            $Resultado=$dato['price'];

                            if ($Resultado>0.5){
                            
                                $Lineal='Deserta';
                                
                            }
                            else{
                                
                                $Lineal='No Deserta';
                            }
                            
                            
                            
                            ?>
                            
                            <tr style="width: 1100px">
                                <td style="width: 50px"><?php echo $c;?></td>
                                <td style="width: 100px" ><?php echo $bedrooms;?></td>
                                <td style="width: 100px" ><?php echo $bathrooms;?></td>
                                <td style="width: 70px" ><?php echo $floors;?></td>
                                <td style="width: 100px" ><?php echo $waterfront;?></td>
                                <td style="width: 50px" ><?php echo $vista;?></td>
                                <td style="width: 100px" ><?php echo $condicion;?></td>
                                <td style="width: 60px" ><?php echo $grade;?></td>
                                <td style="width: 100px" ><?php echo $sqft_living;?></td>
                                <td style="width: 100px" ><?php echo$sqft_lot;?></td>
                                <td style="width: 100px" ><?php echo$yr_build;?></td>
                                <td style="width: 150px" ><?php echo $yr_renovated;?></td>
                                <td style="width: 100px" ><?php echo $Resultado;?></td>
                            </tr>
                            
                            <?php
                            $c=$c+1;
                        
                    }
                }
                

                ?>
            </tbody>
    </table>
    </div>
    <?php
}
?>

  



<form class="input"  action="" method="post">

<div class="center3">
  <input class="caja5" type="number" name="bathrooms"  placeholder="Bathrooms" step=".01" required><br>
  <input class="caja6" type="number" name="bedrooms"  placeholder="Bedrooms" required><br>
  <input class="caja7" type="number" name="sqft_living"  placeholder="Sqft_living" required><br>
</div>
<div class="center3">
<input class="caja8" type="number" name="sqft_lot"  placeholder="Sqft_lot" required><br>
 <input class="caja9" type="number" name="floors"  placeholder="Floors" step=".01" required><br>
 <input class="caja10" type="number" name="yr_built"  placeholder="yr_built" required><br>
</div>
<div class="center3">
 <input class="caja11" type="number" name="yr_renovated"  placeholder="yr_renovated" required><br>
 </div>


 <div class="center2">
Condicion:<br>
<select class="caja1" name="condicion" required size="1">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
</select>


Waterfront:<br>
<select class="caja4" name="waterfront" required size="1">
    <option value="0">0</option>
    <option value="1">1</option>
</select>

</div>

<div class="center2">
Grade:<br>
<select class="caja3" name="grade" required size="1">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
</select>

Vista:<br>
<select class="caja2" name="vista" required size="1">
    <option value="0">0</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
</select>

</div>

<input class="btn" type="submit"  name="Predecir">
</form>











    <?php
    if (isset($_POST["Predecir"])) {
        // collect value of input field
        $bathrooms=$_POST['bathrooms'];
        $bedrooms=$_POST['bedrooms'];
        $sqft_living=$_POST['sqft_living'];
        $sqft_lot=$_POST['sqft_lot'];
        $floors=$_POST['floors'];
        $waterfront=$_POST['waterfront'];
        $vista=$_POST['vista'];
        $condicion=$_POST['condicion'];
        $grade=$_POST['grade'];
        $yr_build=$_POST['yr_built'];
        $yr_renovated=$_POST['yr_renovated'];
        $coef=6485910;             
        $Resultado=$coef+(45925.2*$bathrooms)-($bedrooms*38793)+($sqft_living*170.511)-($sqft_lot*0.257118)+($floors*23823.3)-($waterfront*286904)+($vista*45335)+($condicion*18866.8)+($grade*124262)-($yr_build*3573.35)+($yr_renovated*8.58039);
        
        $ResultadoX=$Resultado;
        
    }
    ?>


    <form class= "result" action="">
<?php
    if (isset($_POST["Predecir"])){?>
        <div class='Resul1'>Segun Regresion Multiple, el precio de la casa seria :  <?php echo $ResultadoX ; ?></div>
        <?php
    }?>
    
    </form>



    
    <form class= "botone" action="bd.php" method="post">
    <input type="submit" name="someAction" value="Ver Tabla" class="go"/>
    </form>
    
    <?php
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction']))
    {
        
        Contenedor2();
    }
    
    ?>



    <div class="Charge" >
    <div id="response"
        class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>">
        <?php if(!empty($message)) { echo $message; }?>
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
                        class="btn-submit1">Import</button>
                    <br />

                </div>

            </form>
            </div>

            <form class="form-horizontal" action="" method="post">
            <button type="submit" id="submit" name="export"
                        class="btn-submit2">Export</button>
                </form>

<?php
if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    $count=1;
    $sqldelete = "DELETE FROM house";
    $conn->query($sqldelete);
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        
        while (($column = fgetcsv($file, 10000, ";")) !== FALSE) {
            
            $bedrooms = "";
            if (isset($column[0])) {
                $bedrooms = mysqli_real_escape_string($conn, $column[0]);
                
            }
            $bathrooms = "";
            if (isset($column[1])) {
                $bathrooms = mysqli_real_escape_string($conn, $column[1]);
                
            }
            $floors = "";
            if (isset($column[2])) {
                $floors = mysqli_real_escape_string($conn, $column[2]);
            }
            $waterfront = "";
            if (isset($column[3])) {
                $waterfront = mysqli_real_escape_string($conn, $column[3]);
            }
            $vista = "";
            if (isset($column[4])) {
                $vista = mysqli_real_escape_string($conn, $column[4]);
            }
            $condicion = "";
            if (isset($column[5])) {
                $condicion = mysqli_real_escape_string($conn, $column[5]);
            }
            $grade = "";
            if (isset($column[6])) {
                $grade = mysqli_real_escape_string($conn, $column[6]);
            }
            $sqft_living = "";
            if (isset($column[7])) {
                $sqft_living = mysqli_real_escape_string($conn, $column[7]);
            }$sqft_lot = "";
            if (isset($column[8])) {
                $sqft_lot = mysqli_real_escape_string($conn, $column[8]);
            }$yr_built= "";
            if (isset($column[9])) {
                $yr_built = mysqli_real_escape_string($conn, $column[9]);
            }
            $yr_renovated= "";
            if (isset($column[10])) {
                $yr_renovated = mysqli_real_escape_string($conn, $column[10]);
            }
            
            $coef=6485910;
            
            if($count==1){

            }
            else{
                $Resultado=$coef+(45925.2*$bathrooms)-($bedrooms*38793)+($sqft_living*170.511)-($sqft_lot*0.257118)+($floors*23823.3)-($waterfront*286904)+($vista*45335)+($condicion*18866.8)+($grade*124262)-($yr_built*3573.35)+($yr_renovated*8.58039);
                
                
                $sqlInsert = "INSERT into house (bedrooms,bathrooms,floors,waterfront,vista,condicion,grade,sqft_living,sqft_lot,yr_built,yr_renovated,price)
                   values ($bedrooms,$bathrooms,$floors,$waterfront,$vista,$condicion,$grade,$sqft_living,$sqft_lot,$yr_built,$yr_renovated,$Resultado)";
                if ($conn->query($sqlInsert) === TRUE) {
                       
                  } else {
                    echo "Error: " . $sqlInsert . "<br>" . $conn->error;
                  }
            }
            
            
            $count=$count+1;
            
            
            
        }
        Contenedor();
    }
}


if (isset($_POST["export"])) {
// Fetch records from database 
$query = $conn->query("SELECT * FROM house"); 
 
if($query->num_rows > 0){ 
    $delimiter = ";"; 
    $filename = "Data_" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('bathrooms','bathrooms','sqft_living','sqft_lot','floors','waterfront','vista','condicion','grade','yr_built','yr_renovated','Price_Predicted'); 
    fputcsv($f, $fields, $delimiter); 
   
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){ 

        $lineData = array($row['bathrooms'], $row['bedrooms'], $row['sqft_living'], $row['sqft_lot'], $row['floors'], $row['waterfront'], $row['vista'], $row['condicion'], $row['grade'], $row['yr_built'], $row['yr_renovated'], $row['price']); 
        
        $fp = fopen('file.csv', 'w');
        
        fputcsv($f, $lineData, $delimiter);
        
}
    ob_end_clean();
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
   
} 
exit;
}


function Contenedor2() {
    
        $conn=conectar();?>
        

    <div class="contenedor2" style="width:1200px">
        <table class="table table-hover table-dark table-fixed">
            <thead>
                <tr style="width: 1100px">
                <th style="width: 50px" scope="col">#</th>
                <th style="width: 100px" scope="col">Bedrooms</th>
                <th style="width: 100px" scope="col">Bathrooms</th>
                <th style="width: 70px" scope="col">Floors</th>
                <th style="width: 100px" scope="col">WaterFront</th>
                <th style="width: 50px" scope="col">Vista</th>
                <th style="width: 100px" scope="col">Condicion</th>
                <th style="width: 60px" scope="col">Grade</th>
                <th style="width: 100px" scope="col">Sqft_Living</th>
                <th style="width: 100px" scope="col">Sqft_lot</th>
                <th style="width: 100px" scope="col">Yr_built</th>
                <th style="width: 150px" scope="col">Yr_renovated</th>
                <th style="width: 100px" scope="col">Predicted</th>
                
                
                </tr>
            </thead>
            <tbody>
            <?php
                
                
                
                $sql="SELECT * FROM house";
                $Data = $conn->query($sql);

                $c=1;

                if (is_array($Data) || is_object($Data))
                {
                    foreach ($Data as $dato)
                    {
                        
                    
                            #REGRESION MULTIPLE
                            $coef=6485910;
                            $bathrooms=$dato['bathrooms'];
                            $bedrooms=$dato['bedrooms'];
                            $sqft_living=$dato['sqft_living'];
                            $sqft_lot=$dato['sqft_lot'];
                            $floors=$dato['floors'];
                            $waterfront=$dato['waterfront'];
                            $vista=$dato['vista'];
                            $condicion=$dato['condicion'];
                            $grade=$dato['grade'];
                            $yr_build=$dato['yr_built'];
                            $yr_renovated=$dato['yr_renovated'];
                            $Resultado=$dato['price'];

                            if ($Resultado>0.5){
                            
                                $Lineal='Deserta';
                                
                            }
                            else{
                                
                                $Lineal='No Deserta';
                            }
                            
                            
                            
                            ?>
                            
                            <tr style="width: 1100px">
                                <td style="width: 50px"><?php echo $c;?></td>
                                <td style="width: 100px" ><?php echo $bedrooms;?></td>
                                <td style="width: 100px" ><?php echo $bathrooms;?></td>
                                <td style="width: 70px" ><?php echo $floors;?></td>
                                <td style="width: 100px" ><?php echo $waterfront;?></td>
                                <td style="width: 50px" ><?php echo $vista;?></td>
                                <td style="width: 100px" ><?php echo $condicion;?></td>
                                <td style="width: 60px" ><?php echo $grade;?></td>
                                <td style="width: 100px" ><?php echo $sqft_living;?></td>
                                <td style="width: 100px" ><?php echo$sqft_lot;?></td>
                                <td style="width: 100px" ><?php echo$yr_build;?></td>
                                <td style="width: 150px" ><?php echo $yr_renovated;?></td>
                                <td style="width: 100px" ><?php echo $Resultado;?></td>
                            </tr>
                            
                            <?php
                            $c=$c+1;
                        
                    }
                }
                

                ?>
            </tbody>
    </table>
    </div>
    <?php
}
?>


</body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</html>

