<?php
echo "<b>Der ausgewählte Kompetenzbereich mit dem ausgewählten Handlungsaspekt umfasst folgende Kompetenzen:</b></br>";
if($goals)
{
	echo "Die Schülerinnen und Schüler...";
	echo "<ul>";
	foreach($goals as $id => $goal)
	{
		echo "<li>...$goal</li>";
	}
}
else
{
	echo "Kompetenzbereich und/oder Handlungsaspekt wurde noch nicht ausgewählt.";
}

echo "</ul>";
?>