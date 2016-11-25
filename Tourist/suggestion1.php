<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>个人推荐</title>
	   <link href="css/suggestions.css" rel="stylesheet" style="text/css" />
	    <script language="JavaScript" src="js/jquery.js"></script> 
	</head>
	
<body>
<div id="container">
	<div id="page1">
	 <div id="page1-banner">
	   <div id="banner-left">
	     <div id="logo"><h1>About TRAVEL</h1></div>
	     </div>
	     <div id="banner-right">
	     	<ul>
	         <li><a href="main.html">Home</a></li>
	         <li><a href="inside.html">国内美景</a></li>
	         <li><a href="outside.html">国外风光</a></li>
	         <li><a href="food.html">食物</a></li>
	         <li><a href="suggestion.html" style="color:#333">个人推荐</a></li>
	     	</ul>
	     </div>
	   </div>
	</div>
	
		
	<div id="page3-left">
		<h2>欢迎你 ，亲爱的用户:
		<?php
			session_start();
          	echo $_SESSION['id'];
          	?>
          	</h2>
	<form>
	 <table>
		<tr>
            <td class="left">标题:</td>
            <td><input type="text" class="txt" id="title"></td>
        </tr>
        <tr>
          <td class="left">内 容:</td>
          <td><textarea id="content"></textarea></td>
         </tr>
     </table>
         <div id="botton">
         <input type="button" class="btn" value="发布" onclick="issue()">
        </div>
  </form>
	</div>
	
	
	
	
	
	<div id="page3-right">
	<form>
		<!--<div id="botton">
		<input type="button"  class="btn" value="刷新" onclick="shows()" />
	    </div>-->
         <table id="table" border="1"  cellspacing="3" width="800px">
 	 	<thead>
 	 		<tr>
 	 			<td>用户</td>
 	 			<td>题目</td>
 	 			<td>内容</td>
 	 		</tr>
 	 		
 	 	</thead>
 	 	<tbody id="tbody">
 	 		
 	 	</tbody>
 	 	
 	 </table>
   </form>

	</div>
	


<script>
	  function issue(){
	  	    var title= $("#title").val();
    		var con = $("#content").val();
    		
    		$.ajax({
	    		type:"post",
	    		url:"php/sugg2.php",
	    		async:true,
	    		dataType:'json',
	    		data:{
	    			        'title':title,
	    					'con':con
	    		},
	    		success:function(data){
	                  console.log("9");
	    			if(data.statue == 1){
	    				alert("发布成功");
	    				window.location.href = "suggestion.html";
	    			}else{
	    				alert("发布失败");
	    			}
	    			
	    		}
	    	});
	    	}
	  
	   $(document).ready(function(){
	  	
	  	var tb = document.getElementById('table');
	  	var rowNum = tb.rows.length;
	  	for(i = 0;i<rowNum;i++){
	  		tb.deleteRow(i);
	  		rowNum = rowNum - 1;
	  		i = i-1;
	  	}
	    	$.ajax({
     	        type:"post",
	    		url:"php/s3.php",
	    		async:true,
	    		dataType:'json',
	    		data:{      
	    			     
	    		},
	    	success:function(data){
	    		console.log(data);
	    		if(data.length == undefined){
    				var str = "<tr><td>"+data['ID']+"</td><td>"+data['Title']+"</td><td>"+data['Content']+"</td></tr>";
    				$("#tbody").append(str);
    			}else{
    				for(var i=0;i<data.length;i++){
	    			var str = "<tr><td>"+data[i]['ID']+"</td><td>"+data[i]['Title']+"</td><td>"+data[i]['Content']+"</td></tr>";
	    			$("#tbody").append(str);
	    			}
    			}
    		 }
    		});
      });
	  
	  
</script>

</body>
</html>
