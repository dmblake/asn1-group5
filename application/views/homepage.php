
<div style="display:block;overflow:auto;">


<?php echo form_open_multipart('upload/do_upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>


	<table style="float:left;">
	{stocklist}
	</table>


	<table style="float:left;">
	{playerlist}
	</table>
</div>