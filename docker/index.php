<?php
$dbh = new PDO('mysql:host=dbhost;dbname=mysql', 'root', 'passe');
foreach($dbh->query('SHOW my_data') as $row) {
echo $row[0]. '<br/>';
}

