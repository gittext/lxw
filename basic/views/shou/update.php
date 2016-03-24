<div id="list2">
  <form action="index.php?r=shou/upd" method="post" >
    <input type="hidden" name='id' id="id" value="<?php echo $arr[0]['id']?>">
	<input type="text" id="content" name='content' value="<?php echo $arr[0]['content']?>">
	<input type="submit" value="修改">
	</form>
</div>
