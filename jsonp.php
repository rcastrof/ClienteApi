<!--Sube uf a las tablas de la bd -->
<?php
$connect = mysqli_connect("localhost","root","","clienteapi");
$filename="response.json";
$data = file_get_contents($filename);
$array = json_decode($data, true);
foreach($array as $row)
{
    $sql = "INSERT INTO uf(id,nombreIndicador,codigoIndicador,unidadMedidaIndicador,valorIndicador,fechaIndicador)
    VALUES('".$row["id"]."',
    '".$row["nombreIndicador"]."',
    '".$row["codigoIndicador"]."',
    '".$row["unidadMedidaIndicador"]."',
    '".$row["valorIndicador"]."',
    '".$row["fechaIndicador"]."')";

    mysqli_query($connect,$sql);

}

echo "Data Inserted";
?>
