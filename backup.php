<?php
include 'protected.php';

$backup_file = "backup_" . date('Y-m-d_H-i-s') . ".sql";
$handle = fopen($backup_file, "w");

$tables = array();
$result = $conn->query("SHOW TABLES");
while($row = $result->fetch_row()) {
    $tables[] = $row[0];
}

foreach($tables as $table) {
    $result = $conn->query("SELECT * FROM $table");
    $num_fields = $result->field_count;
    
    $return = "";
    $return .= "DROP TABLE IF EXISTS $table;\n";
    $return .= "CREATE TABLE $table (\n";
    
    for($i = 0; $i < $num_fields; $i++) {
        $field = $result->fetch_field();
        $return .= "  $field->name $field->type";
        if($field->primary_key) {
            $return .= " PRIMARY KEY";
        }
        if($i < $num_fields - 1) {
            $return .= ",\n";
        }
    }
    $return .= ");\n\n";
    
    while($row = $result->fetch_row()) {
        $values = array();
        for($i = 0; $i < $num_fields; $i++) {
            $values[] = "'" . $conn->real_escape_string($row[$i]) . "'";
        }
        $return .= "INSERT INTO $table VALUES (" . implode(",", $values) . ");\n";
    }
    $return .= "\n\n";
    
    fwrite($handle, $return);
}

fclose($handle);

header("Content-Type: application/sql");
header("Content-Disposition: attachment; filename=\"$backup_file\"");
readfile($backup_file);
unlink($backup_file);
exit();
?>