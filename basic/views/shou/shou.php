<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>留言列表</title>
</head>
<body>
	 <textarea name="content" id="content" cols="30" rows="6"></textarea><br/>
	 <input type="submit" value="提交" onclick="dian();" />
	 <div id='list'></div>
</body>
</html>
<script src="../js/jquery.1.8.min.js"></script>
<script>
	 function dian(){
	 	 var content = document.getElementById('content').value;

	 	 $.ajax({
	 	 	 url:'index.php?r=shou/se',
	 	 	 type:'post',
	 	 	 data:'content='+content,
	 	 	 success:function(date){
	 	 	 	  $('#list').html(date);
	 	 	 }
	 	 })
	 }

	 
</script>
