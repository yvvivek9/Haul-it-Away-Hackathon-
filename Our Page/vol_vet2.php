<?php
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('sqlite.db');
      }
   }
   
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }

   $sql =<<<EOF
      SELECT * from volunteer_veterans;
EOF;

   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      echo "ID = ". $row['name'] . "\n";
      echo "NAME = ". $row['age'] ."\n";
      echo "ADDRESS = ". $row['gender'] ."\n";
      echo "SALARY = ".$row['qualifi'] ."\n\n";
   }
   echo "Operation done successfully\n";
   $db->close();
?>