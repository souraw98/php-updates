<?php

$jsondata = file_get_contents('datas.json');
$medicineData = json_decode($jsondata,true);
$Problems = $medicineData['problems'];

echo "<table border='1' width='100%' cellspacing='0' rules='all'>";
echo "<thead style='background-color:black;color:white;'>";
echo "<tr>";
	echo "<th>#</th>";
	echo "<th>Medical Problem (Diesease)</th>";
	echo "<th>Medications Type</th>";
	echo "<th>Medications Class</th>";
	echo "<th>Lab Class</th>";
	echo "<th>Lab Value</th>";
	echo "<th>Drug Name</th>";
	echo "<th>Medicine Name</th>";
	echo "<th>Dose</th>";
	echo "<th>Quantity</th>";
echo "</tr>";
echo '<thead>';

$i=0;
foreach ($Problems as $index => $medicine_arr) {
	foreach ($medicine_arr as $medicine_index => $medicine_type) {
		foreach($medicine_type as $type_keys){
			foreach ($type_keys['medications'] as $medicationsClasses) {
					foreach($medicationsClasses['medicationsClasses'] as $classname){
						foreach ($classname as $classname_key => $classname_value) {
							$classname = $classname_key;
							foreach ($classname_value as $classname_index => $associated_drug) {
								foreach ($associated_drug as $Drugname => $DrugMedicine) {
									foreach ($DrugMedicine as $drug_index => $drug_name) {
										foreach ($drug_name as $drug) {
											echo "<tr>";
											echo "<td style='background-color:black;color:white;'>".($i+1)."</td>";
											echo "<td>".$medicine_index."</td>";
											echo "<td>Medications</td>";
											echo "<td>".$classname_key."</td>";
											
											echo "<td></td>";
											echo "<td></td>";
											echo "<td>".$Drugname."</td>";
											echo "<td>".$drug_name['name']."</td>";
											echo "<td>".$drug_name['dose']."</td>";
											echo "<td>".$drug_name['strength']."</td>";
											echo "</tr>";
											$i++;
										}
									}
								}
							}
						}
					}
			}
			foreach ($type_keys['labs'] as $labs) {
				foreach ($labs as $labs_key => $lab_value) {
						echo "<tr style='background-color:yellow;'>";
						echo "<td>".($i+1)."</td>";
						echo "<td>".$medicine_index."</td>";
						echo "<td>LAB</td>";
						echo "<td>NA</td>";
						echo "<td>".$labs_key."</td>";
						echo "<td>".$lab_value."</td>";
						echo "<td colspan='4'></td>";
						$i++;
				}


			}

		}//End of Block

	}
	
}



echo "</thead>";
echo "<table>";