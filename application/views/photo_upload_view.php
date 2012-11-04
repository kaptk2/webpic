	<div class="span9">
		<p>This is the photo upload view</p>
		<p>
			<?=$error?>
			<?=form_open_multipart('upload/do_upload')?>
			<input type="text" name="album" value="default" />
			<br /><br />
			<input type="file" name="userfile" size="20" />
			<br /><br />
			<input type="submit" value="upload" />
			</form>
		</p>
	</div><!--/span-->
</div><!--/row-->
