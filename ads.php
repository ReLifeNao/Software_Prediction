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
    <h1>DATOS OBTENIDOS</h1>

    <div class="contenedor" style="width:750px">
        <table class="table table-hover table-dark table-fixed">
            <thead>
                <tr style="width: 680px">
                <th style="width: 50px" scope="col">#</th>
                <th style="width: 100px" scope="col">Notas</th>
                <th style="width: 250px" scope="col">Dependencia Economica</th>
                <th style="width: 150px" scope="col">Regresi&oacute;n</th>
                <th style="width: 150px" scope="col">&Aacute;rbol Decisi&oacute;n</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $LinealB='';
                $ArbolesB='';
                $ProbB='';
                
                $Data = array(11.2857,2,
                1.55,1,
                11.9048,2,
                11.1765,2,
                11.5294,2,
                9.5,2,
                4.2941,2,
                6.85,2,
                11.4762,2,
                9.0588,2,
                2.1,2,
                12.0476,2,
                9.05,1,
                13.1905,2,
                5.7647,2,
                9.7059,2,
                4.619,1,
                7,2,
                11.4286,2,
                11.8571,1,
                13.3333,2,
                2.5,2,
                7.7059,2,
                11.4286,1,
                11.5238,2,
                9.7143,2,
                9.6923,1,
                11.9524,2,
                5.6,2,
                8.9375,2,
                8.95,2,
                11,2,
                14.381,2,
                11.4286,2,
                2.3,2,
                4.4211,2,
                12.3333,2,
                9.8182,2,
                5.1304,2,
                4.4545,2,
                1.0435,1,
                8.7273,2,
                9.8421,1,
                11.1364,2,
                5.9474,2,
                0.4348,2,
                2.6,2,
                9.125,2,
                6.0909,2,
                14.4545,2,
                11.5455,2,
                7.375,2,
                14.0909,2,
                9.7083,2,
                14.75,2,
                2.8333,2,
                14.625,2,
                13.9583,2,
                3.5,2);

                $c=1;
                for ($x = 0; $x <= 117; $x=$x+2) {
                    
                    #REGRESION MULTIPLE
                    $i=0.909601938;
                    $De=-0.061221954;
                    $Re=-0.06409738;
                    $Resultado=$i+$Re*$Data[$x]+$De*$Data[$x+1];
                    if ($Resultado>0.5){
                    
                        $Lineal='Deserta';
                        
                    }
                    else{
                        
                        $Lineal='No Deserta';
                    }
                    
                    #ARBOLES
                    $Promedio=$Data[$x];
                    $Dependencia=$Data[$x+1];
                    
                    if ($Promedio<6){
                            if($Dependencia==1){
                                    if($Promedio<4){
                                        
                                        $Arboles='Deserta';
                                        
                                    }
                                    else{
                                    
                                        $Arboles='No Deserta';
                                    }
                            }
                            else{
                                
                                $Arboles='Deserta';
                            }
                    }
                    else{
                        
                        $Arboles='No Deserta';
                    }
                    #Evaluar dependencia xd
                    if ($Data[$x+1]==2){
                        $dep="Dependiente";
                    }
                    else{
                        $dep="Independiente";
                    }
                    ?>
                    
                    <tr style="width: 680px">
                        <td style="width: 50px"><?php echo $c;?></td>
                        <td style="width: 100px"><?php echo round($Data[$x],0);?></td>
                        <td style="width: 250px"><?php echo $dep;?></td>
                        <td style="width: 150px"><?php echo $Lineal; ?></td>
                        <td style="width: 150px"><?php echo $Arboles;?></td>
                    </tr>
                    
                    <?php
                    $c=$c+1;
                }

                ?>
            </tbody>
    </table>
    </div>
  
    <form class="input" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        Rendimiento_Nota: <br> <input class="caja" type="number" name="fname" min="0" max="20" placeholder="Nota Final" required><br>
        Dependencia Economica:<br>
        <select class="caja" name="dname" required size="1">
            <option value="2">Dependiente</option>
            <option value="1">Independiente</option>
        </select>
        <input class="btn" type="submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $Promedio = $_POST['fname'];
        $Dependencia = $_POST['dname'];
        $i=0.909601938;
        $De=-0.061221954;
        $Re=-0.06409738;
        $Resultado=$i+$Re*$Promedio+$De*$Dependencia;
        if ($Resultado>0.5){
                
                
            $ProbB=$Resultado*100;
            if ($ProbB<0)
            {
                $ProbB=$ProbB*-1;
            }
            $LinealB='Deserta';
            
        }
        else{
            $ProbB=$Resultado*100;
            $LinealB='No Deserta';
            if ($ProbB<0)
            {
                $ProbB=$ProbB*-1;
            }
        }

        
        #Arboles
        if ($Promedio<6){
            if($Dependencia==1){
                    if($Promedio<4){
                        
                        $ArbolesB='Deserta';
                        
                    }
                    else{
                    
                        $ArbolesB='No Deserta';
                    }
            }
            else{
                
                $ArbolesB='Deserta';
            }
    }
    else{
        
        $ArbolesB='No Deserta';
    }
    #ARBOLES???????_________________________________________________
        
    }
    ?>


    <form class= "result" action="">
        <div class='Resul1'>Por Regresion Multiple :  <?php echo $LinealB ; ?></div>
        <div class='Resul2'>Por Arboles de Decision : <?php echo $ArbolesB ; ?></div>
        <div class='Prob'>Probabilidad de Desercion : <?php echo round($ProbB,2) ; ?> %</div>
    </form>
    <form class="Charge" action="">
        <input type="file" name="Cargar Archivo">
        <input class="cargar" type="submit" value="Cargar">
    </form>

</body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</html>