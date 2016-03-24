 	<?php
 	 	 use yii\widgets\LinkPager;
 	?>
 	<html>
 	<h3>留言内容：</h3>
	<div id="list1">
	<table>
	<tr>
		<td>ID</td>
		<td>留言内容</td>
		<td>留言时间</td>
		<td>操作</td>
	</tr>
    <?php foreach ($models as $k=>$v) { ?>
    	<tr>
       		 <td><?php echo $v['id'];?></td>
			 <td><?php echo  $v['content'];?></td>
			 <td><?php echo  $v['time'];?></td>
			 <td><a href="#" onclick="del(<?= $v['id']?>)">删除</a>|<a href="#" onclick="upd(<?= $v['id']?>)">修改</a></td>
		</tr>
    <?php } ?>
    </table>  
    <div id="list2"></div>
    </html>
<?php 
   echo LinkPager::widget([
    	'pagination' => $pages,
	]);
?>
<script src="../js/jquery.1.8.min.js"></script>
<script>
	function del(id){
		$.ajax({
	 	 	 url:'index.php?r=shou/delete',
	 	 	 type:'post',
	 	 	 data:'id='+id,
	 	 	 success:function(date){
	 	 	 	  $('#list1').html(date);
	 	 	 }
	 	 })
	}

	function upd(id){
		$.ajax({
	 	 	 url:'index.php?r=shou/update',
	 	 	 type:'post',
	 	 	 data:'id='+id,
	 	 	 success:function(date){
	 	 	 	  $('#list2').html(date);
	 	 	 }
	 	 })
	}

</script>