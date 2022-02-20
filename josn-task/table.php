<?php

$jsondata = file_get_contents("data.json");
$data = json_decode($jsondata,true);
echo "<pre>";
// print_r($data['web-app']['servlet']);
$servlet = $data['web-app']['servlet'];

echo "<table border='1'>";
echo "<tr>";
echo "<th> Servlet Name </th>";
echo "<th> Servlet Class </th>";
echo "<th> Init Param </th>";
echo "</tr>";

foreach($servlet as $servlet_key => $servlet_value)
{
    foreach($servlet_value as $servlet_data)
    {       

       echo "<tr>";
       echo "<td>{$servlet_value['servlet-name']}</td>";
       echo "<td>{$servlet_value['servlet-class']}</td>";
       if(@is_array($servlet_value['init-param']) and array_key_exists('init-param',$servlet_value)){
        echo "<td>";
                echo "<table>";
                foreach($servlet_value['init-param'] as $init_keys => $init_values){
                 echo "<tr>";
                echo "<th>{$init_keys}</th>";
                echo "<td>{$init_values}</td>";
                echo "</tr>";
        }
    echo "</table>";
        echo "</td>";

        }else{
            echo "<td>NA</td>";
        
     }
        echo "</tr>";
       
       
        
    }
}


echo "</table>";

?>