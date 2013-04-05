<div class="search">
    <form action="<?php echo base_url() ?>search/" method="get" id="yahoo">
        <input type="text" name="keyword">&nbsp;<input type="submit" id="search" value="Search">
    </form>
</div>
<div class="search_result">
	<?php
		if($result) {
			echo $result;
		}
	?>
</div>	