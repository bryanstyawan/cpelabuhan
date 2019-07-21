<option value=""> - - - - - </option>
<?php foreach($list->result() as $list){?>
	<option value="<?php echo $list->id;?>"><?php echo $list->name;?></option>
<?php }?>