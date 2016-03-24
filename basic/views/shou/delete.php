	<?php
 	 	 use yii\widgets\LinkPager;
 	?>
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
			 <div id="list2"></div>
			 <td><?php echo  $v['time'];?></td>
			 <td><a href="#" onclick="del(<?= $v['id']?>)">删除</a>|<a href="#" onclick="upd(<?= $v['id']?>)">修改</a></td>
		</tr>
    <?php } ?>
</table> 
<?php 
   echo LinkPager::widget([
    	'pagination' => $pages,
	]);
?>