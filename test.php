<?php
echo'
<form action="#" method="post">
<input name="person[0][first_name]" value="john" />
<input name="person[0][last_name]" value="smith" />
<input name="person[1][first_name]" value="jane" />
<input name="person[1][last_name]" value="jones" />
</form>';


var_dump($_POST['person']);
?>


