	<div id="list1">
	<table>
	<tr>
		<td>ID</td>
		<td>留言内容</td>
		<td>留言时间</td>
		<td>操作</td>
	</tr>
    <?php foreach ($users as $k=>$v): ?>
    	<tr>
       		 <td><?php echo $v['id'];?></td>
			 <td><?php echo  $v['content'];?></td>
			 <div id="list2"></div>
			 <td><?php echo  $v['time'];?></td>
			 <td><a href="#" onclick="del(<?= $v['id']?>)">删除</a>|<a href="#" onclick="upd(<?= $v['id']?>)">修改</a></td>
		</tr>
    <?php endforeach; ?>
    </table>   
    <?php echo $users->render(); ?>
    <script src="../js/jquery-1.8.3.min.js"></script>
<script>
	function upd(id){
		$.ajax({
	 	 	 url:'../update',
	 	 	 type:'get',
	 	 	 data:'id='+id,
	 	 	 success:function(date){
	 	 	 	  $('#list2').html(date);
	 	 	 }
	 	 })
	}
	</script>