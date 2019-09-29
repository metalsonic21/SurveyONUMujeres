<?php
$servername = "localhost";
$username = "FrankHesse";
$password = "metalsonic21";
$dbname = "surveyonumujeres";

$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "DELETE FROM encuesta
WHERE id NOT IN (
  SELECT id FROM (
    SELECT id FROM encuesta WHERE pregunta = '1' AND respuesta = '1'
  ) t
)";

if ($conn->query($sql) === TRUE) {
    $filler = 2;
    //echo "Record deleted successfully";
} else {
    $filler = 3;
    //echo "Error deleting record: " . $conn->error;
}

/* vars for export */
// database record to be exported
$db_record = 'encuesta';
// optional where query
$where = 'order by id';
// filename for export
$csv_filename = "Survey_ONU_Procomer.csv";
// database variables

// create empty variable to be filled with export data
$csv_export = '';
// query to get data from database
$query = mysqli_query($conn, "SELECT * FROM ".$db_record." ".$where);
$field = mysqli_field_count($conn);
// create line with field names
for($i = 0; $i < $field; $i++) {
    $csv_export.= mysqli_fetch_field_direct($query, $i)->name.';';
}
// newline (seems to work both on Linux & Windows servers)
$csv_export.= '
';
// loop through database query and fill export variable
while($row = mysqli_fetch_array($query)) {
    // create line with field values
    for($i = 0; $i < $field; $i++) {
        $csv_export.= '"'.$row[mysqli_fetch_field_direct($query, $i)->name].'";';
    }
    $csv_export.= '
';
}
// Export the data and prompt a csv file for download

// Export the data and prompt a csv file for download
header('Content-Encoding: UTF-8');
header('Content-type: text/txt; charset=UTF-8');
header("Content-Disposition: attachment; filename=".$csv_filename."");
echo "\xEF\xBB\xBF"; // UTF-8 BOM
echo($csv_export);


mysqli_close($conn);

?>

