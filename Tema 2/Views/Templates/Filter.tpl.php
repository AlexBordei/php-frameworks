<form>
	Search: <input type="text" name="search">
	<br>
	Pret: <input type="text" name="price">
	<br>
	<input type="submit" value="Filtrare">
</form>

<hr>

<?php foreach ($this->results as $value) { ?>
	
	<p>
	* <?php echo $value; ?>
	</p>
	
	<hr>

<?php } ?>
