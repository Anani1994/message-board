<?php
session_start();
$user_name = isset($_SESSION['user_name'])?$_SESSION['user_name']:"";
$user_email = isset($_SESSION['user_email'])?$_SESSION['user_email']:"";
$user_status = isset($_SESSION['user_status'])?$_SESSION['user_status']:"";
?>
<!DOCTYPE html>
<html lang="zh-CN">
    <head>
    	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
		<meta name="keywords" content="个人简历，博客园，作品，IT，行者，七夕">
		<meta name="author" content="Anani">
		<link rel="icon" href="photo-blog/logo-blog.jpg" sizes="32x32" />
		<!-- 引入 font-awesome -->
		<link type="text/css" rel="stylesheet" href="css-blog/font-css/css/font-awesome.min.css"/>
		<!-- 引入 Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css-blog/bootstrap.min.css"/>
		<!-- HTML5 Shim 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
		<!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
		<!--[if lt IE 9]>
		   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		   <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
		<title>留言板</title>
		<style type="text/css">
			/*全局样式*/
			* {
			    margin: 0;
			    padding: 0;
			}

			body {
			    margin: 0 1%;
			    overflow-x: hidden;
			    font-size: 16px;
			    font-family: 'PingFang SC','Helvetica Neue','Helvetica','Arial',sans-serif;
			    color: #000;
			}

			ul,ul li {
				list-style-type: none;
			}
			/*home和头部元素开始*/
			#header {
			    padding-bottom: 5px;
			    margin-top: 30px;
			}

			#blogTitle {
			    height: 60px;
			    clear: both;
			}

			    #blogTitle h1 {
			        padding-left: 1em;
			        font-size: 2.25em;
			        font-weight: bold;
			        line-height: 0;
			    }

			        #blogTitle h1 a {
			            color: #515151;
			        }

			            #blogTitle h1 a:hover {
			                color: #FF0000;
			            }

			    #blogTitle h2 {
			        float: left;
			        padding-left: 6em;
			        font-weight: normal;
			        font-size: 1em;
			        line-height: 1.875;
			        color: #757575;
			    }

				#nav {
					background-color: #000;
				}
					#nav ul li a {
						color: #FFF;
					}
					#nav ul li a:hover {
						color: #f00;
					}

			/*新消息提示框*/
			.message-hints {
				z-index: 555;
				display: none;
				position: fixed;
				right: 0px;
				top: 200px;
				width: 150px;
				height: 100px;
				text-align: center;
				background-color: #FFF;
				border: 1px solid #000;
			}

			.message-hints-text {
				margin-top: 13px;
				margin-bottom: 15px;
				width: 100%;
				color: red;
				text-align: center;

			}
			.show-message {
				display: none;
				overflow: scroll;
				z-index: 444;
				position: fixed;
				right: 0;
				top: 0;
				width: 300px;
				height: 600px;
				text-align: center;
				background-color: #D3D3D3;
				border: 1px solid #000;
			}
			/*操作提示框*/
			.prompt-box-success {
				display: none;
				z-index: 666;
				position: fixed;
				top: 50%;
				left: 50%;
				transform: translate(-50%,-50%);
				background-color: #FFF;
				border: 1px solid #000;
			}
			.prompt-box-failed {
				display: none;
				z-index: 666;
				position: fixed;
				top: 50%;
				left: 50%;
				transform: translate(-50%,-50%);
				background-color: #FFF;
				border: 1px solid #000;
			}
			.prompt-body {
				margin-top: 3%;
				margin-bottom: 3%;
				font-size: 16px;
				text-align: center;
			}
				.prompt-icon {
					width: 10%;
					height: 10;
					margin-right: 5%;
				}

			/*确认框样式*/
			.confirm-content-container-delete {
				display: none;
				position: fixed;
				top: 0;
				left: 0;
				z-index: 777;
				height: 100%;
				width: 100%;
				background-color: rgba(144,144,144,0.8);
			}
			.confirm-content-container-login {
				display: none;
				position: fixed;
				top: 0;
				left: 0;
				z-index: 777;
				height: 100%;
				width: 100%;
				background-color: rgba(144,144,144,0.8);
			}
			.confirm-content {
				z-index: 888;
				position: fixed;
				top: 50%;
				left: 50%;
				transform: translate(-50%,-50%);
				width: 40%;
				background-color: #FFF;
			}

			.confirm-content-head {
				padding: 2% 4% 2%;
				font-size: 18px;
				background-color: #D0D0D0;
			}

			.confirm-content-body {
				margin-top: 8%;
				margin-bottom: 8%;
				text-align: center;
			}

			.confirm-content-footer {
				position: relative;
				bottom: 0;
				padding: 2% 4%;
				font-size: 18px;
				text-align: right;
				background-color: #D0D0D0;
			}

			/*右上角用户显示样式*/
			.user-info {
				position: absolute;
				right: 1%;
				top: 20px;
			}

			/*留言板*/
			.message-board-head {
				margin:auto;
				width: 60%;
				border-bottom: 2px solid #FBCFE0;
				color: #FBCFE0;
			}

			.message-board-body {
				margin: auto;
				width: 58%;
			}
			.message-board-title {
				padding: 10px 0;
				border-bottom: 1px solid #FBCFE0;
				font-size: 14px;
				font-weight: bold;
			}

			.message-author-text {
				width: 100%;
				text-align: center;
			}
				.message-author-text p {
					font-family: 隶书;
					font-style: italic;
					font-weight: bold;
					font-size: 38px;
					color: #F00;
				}

			.message-user-text {
				margin: 15px 0;
			}

			.input-textarea {
				height: 150px;
				width: 100%;
			}

			.button-text {
				margin-left: 4%;
			}

			.comments-content {
				width: 100%;
				padding-bottom: 10px;
				margin-bottom: 10px;
				border-bottom: 1px solid #F5C2CE;
				overflow: hidden;
			}

			.comments-content-left {
				float: left;
				width: 12%;
				min-height: 150px;
			}

			.comments-content-right {
				position: relative;
				padding-top: 5px;
				float: left;
				width: 88%;
				min-height: 150px;
			}

			.show-name {
				margin: 0 0 3px 5px;
				color: #EC5CA4;
			}

			.show-number {
				margin: 0 0 3px 10px;
				font-size: 12px;
				color: #C0C0C0;
			}

			.delete-comment {
				position: absolute;
				right: 20px;
			}
				.delete-comment a {
					color: #F00;
				}

			.show-text {
				min-height: 90px;
				margin:5px 0;
				padding: 5px 0 0 5px;
			}
			.show-time {
				margin-left: 10px;
				font-size: 12px;
				color: #9B9B9B;
			}

			.reply-comment {
				margin-left: 10px;
				font-size: 14px;
				color: #EC5CA4;
			}

			/*回复框样式*/
			.reply-box-container {
				display: none;
				width: 100%;
			}

			.reply-text {
				width: 100%;
			}

			/*回复内容显示样式*/
			.replies-container {
				width: 100;
			}

			/*底部浮标*/
			.footer-page {
				float: left;
            	padding-top: 20px;
           		padding-bottom: 20px;
           		width: 100%;
           	 	text-align: center;
				background-color: #494949;
				color: #fff;
	        }

	        .list-inline a {
	        	color: #fff;
	        }
	        	.list-inline a:hover {
	        		text-decoration:none;
	      		}

	      	.vertical-line {
	      		border-style: solid;
	      		border-width: 0 0 0 1px;
	      		border-color: #fff;
	      	}

	        #buoy {
	            position: fixed;
	            right: 0;
	            bottom: 20px;
	            z-index: 999;
	            width:40px; 
	            height:80px;
	            background-color: rgba(181, 164, 164, 0.53);
	        }

	        .u-icon-arr {
	            position: absolute;
	            right: 14px;
	            width: 25px;
	            height: 25px;
	            border-style: solid;
	            border-width: 10px 10px 0 0;
	            border-color: #fff;
	            -webkit-transform-origin: 75% 25%;
	            -webkit-transform: rotateZ(45deg);
	            -webkit-transition: 100ms ease-in .1s;
	            transition: 100ms ease-in .1s;
	        }

	        .u-icon-up {
	            top: 10px;
	            cursor: pointer;
	            -webkit-transform: rotateZ(-45deg);
	            -ms-transform: rotateZ(-45deg);
	            transform: rotateZ(-45deg);
	        }

	        .u-icon-down {
	            bottom: 0;
	            cursor: pointer;
	            -webkit-transform: rotateZ(135deg);
	            -ms-transform: rotateZ(135deg);
	            transform: rotateZ(135deg);
	        }
	         /*当使用手机设备时改变部分板块的显示样式*/
	         @media screen and (max-width: 768px) {
	         	#blogTitle h1 {
              		padding-left: 0.4em;
           		}
            	#blogTitle h2 {
              		padding-left: 3.4em;
           		}
           		.confirm-content {
           			width: 90%;
           		}
           		.message-board-head {
           			width: 100%;
           		}
           		.message-board-body {
           			width: 98%;
           		}
           		.prompt-box-success {
           			width: 50%;
           		}
	        }
		</style>
    </head>
	<body>
	<header>
		<div id="header">
			<div id="blogTitle">
				<h1><a id="Header1_HeaderTitle" href="index.html">Anani</a></h1>
				<h2>代码改变世界，坚持铸就未来。</h2>
			</div>
			<nav id="nav" class="navbar navbar-default" role="navigation">
		        <div class="container-fluid">
		            <div class="navbar-header">
		               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary-navbar-collapse">
		                  <span class="sr-only">切换导航</span>
		                  <span class="icon-bar"></span>
		                  <span class="icon-bar"></span>
		                  <span class="icon-bar"></span>
		               </button>
		            </div>
		            <div id="primary-navbar-collapse" class="collapse navbar-collapse">
		               <ul class="nav navbar-nav navbar-right">
		                   <li><a href="index.html">首页</a></li>
		                   <li><a href="https://github.com/Anani1994">Github</a></li>
		                   <li><a href="http://www.cnblogs.com/anani/">博客园</a></li>
		                   <li class="disabled"><a href="">留言板</a></li>
		                </ul>
		            </div>
		        </div>
		    </nav>
		</div>
	</header>
	<section>
		<!-- 新消息提示框 -->
		<div class="message-hints">
			<div class="message-hints-text">您有新回复消息</div>
			<a href="replies.php" target="iframe_replies"><button type="button" class="btn btn-success button-text" id="show-replies">查看</button></a><button type="button" class="btn btn-danger button-text" id="cancel-show">忽略</button>
		</div>
		<!-- 新消息显示框 -->
		<div class="show-message">
			<iframe name="iframe_replies" width="100%" height="92%"></iframe>
			<div><button type="button" class="btn btn-danger button-text" id="close-show">关闭</button></div>
		</div>
		<!-- 错误或操作成功提示框 -->
		<div class="prompt-box-success">
	    		<div class="prompt-body"><img src="photo-blog/success.png" class="prompt-icon"><span id="success-tip">删除成功！</span></div>
	    </div>
	    <div class="prompt-box-failed">
	    		<div class="prompt-body"><img src="photo-blog/alert.png" class="prompt-icon"><span id="failed-tip">删除成功！</span></div>
	    </div>
		<!-- 确认删除弹出框 -->
		<div class="confirm-content-container-delete">
	    	<div class="confirm-content">
	    		<div class="confirm-content-head">删除警告</div>
	    		<div class="confirm-content-body"><h3>删除后无法恢复，确认删除吗？</h3></div>
	    		<div class="confirm-content-footer">
	    			<button type="button" class="btn btn-success button-text delete-confirm" id="confirm-delete">确认</button><button type="button" class="btn btn-danger button-text delete-confirm" id="cancel-delete">取消</button>
	    		</div>
	    	</div>
   		</div>
		<!-- 确认登录弹出框 -->
		<div class="confirm-content-container-login">
	    	<div class="confirm-content">
	    		<div class="confirm-content-head">尚未登录</div>
	    		<div class="confirm-content-body"><h3>现在就去登录?</h3></div>
	    		<div class="confirm-content-footer">
	    			<a href="login.php"><button type="button" class="btn btn-success button-text" id="login">确认</button></a><button type="button" class="btn btn-danger button-text" id="cancel">取消</button>
	    		</div>
	    	</div>
   		</div>
   		<!-- 网页右上角显示内容 -->
		<div class="user-info">
			<span class="user-exit">
				<?php
				$html_login = "游客您好，现在就去<a href='login.php'> 登录</a>";
				$html_loginout = "您好".$user_name."<a href='loginout.php'> 退出</a>";
				if (empty($user_name)) {
					echo $html_login;
				}
				else {
					echo $html_loginout;
				}
				?>
			</span>
		</div>
	</section>
	<section>
		<div class="message-board-head"><h4>留言板</h4></div>
		<div class="message-board-body">
			<div class="message-board-title">主人寄语</div>
			<div class="message-author-text">
				<p>代码改变世界，坚持铸就未来。</p>
			</div>
			<div class="message-board-title">发表您的留言<span id="prompt" class="text-danger button-text"></span></div>
			<div class="message-user-text">
		    <form>
		        <p>评论内容：</p>
		        <p><textarea class="input-textarea" id="content"></textarea></p>
		        <p><input type="button" class="btn btn-success button-text" id="submit" value="发表" /><button type="reset" class="btn btn-danger button-text" id="reset">重设</button></p>
			</form>
			</div>
			<div class="message-board-title">留言</div>
			<ul id='comments' class='comments'>
			<?php
			include 'connection.php';

			mysqli_select_db( $conn, 'comments' );

			$select_comments_sql = "SELECT number,username,content,submission_time
			        FROM contents WHERE toggle='show' ORDER BY submission_time DESC";

			$ret_comments = mysqli_query( $conn, $select_comments_sql );
			if(! $ret_comments )
			{
			    die('无法读取数据: ' . mysqli_error($conn));
			}

			$all_comments = mysqli_fetch_all($ret_comments, MYSQL_ASSOC);

			$serial_number = count($all_comments)+1;
			if ($serial_number!==1) {
				foreach ($all_comments as $new_row) {
					$serial_number--;
					$num = $new_row['number'];

					$select_replies_sql = "SELECT sub_username,to_username,reply_content,reply_time FROM replies WHERE parent_id='$num' ORDER BY reply_time DESC";
					$ret_replies = mysqli_query( $conn, $select_replies_sql );
					$all_replies = mysqli_fetch_all($ret_replies, MYSQL_ASSOC);

				    if (empty($all_replies)) {
				    	echo	"<li class='comments-content'>".
				    			"<div class='comments-content-left'>".
				    				"<div class='head-portrait'>"."</div>".
				    			"</div>".
				    			"<div class='comments-content-right'>".
				    				"<span class='show-name'>".htmlentities($new_row['username'],ENT_QUOTES)."</span>".
				    				"<span class='show-number'>".'第 '.$serial_number.' 楼'."</span>".
				    				"<span class='delete-comment'>"."<a href='javascrip:void(0);' title='删除后不可恢复'>".'删除'."</a>"."</span>".
				    				
				    				"<div class='show-text'>".htmlentities($new_row['content'],ENT_QUOTES)."</div>".
				    				"<span class='show-time'>".htmlentities($new_row['submission_time'],ENT_QUOTES)."</span>".
				    				"<span class='reply-comment'>".'回复'."</span>".
				    				"<div class='reply-box-container'>".
				    					"<textarea class='reply-text'>"."</textarea>".
				    					"<button class='btn btn-success button-text confirm-reply'>".'发表'."</button>".
				    					"<button class='btn btn-danger button-text'>".'取消'."</button>".
				    				"</div>".
				    				"<ul>"."</ul>".
				    			"</div>".
				    		"</li>";
					}
					else {
							global $all_replies;
							$ret = '';
							foreach($all_replies as $new_all_replies) {
								$ret = $ret . "<li>".htmlentities($new_all_replies['sub_username'],ENT_QUOTES).' 回复： '.htmlentities($new_all_replies['reply_content'],ENT_QUOTES)."<span class='show-time'>".htmlentities($new_all_replies['reply_time'],ENT_QUOTES)."</span>"."</li>";
							};
						echo "<li class='comments-content'>".
				    			"<div class='comments-content-left'>".
				    				"<div class='head-portrait'>"."</div>".
				    			"</div>".
				    			"<div class='comments-content-right'>".
				    				"<span class='show-name'>".htmlentities($new_row['username'],ENT_QUOTES)."</span>".
				    				"<span class='show-number'>".'第 '.$serial_number.' 楼'."</span>".
				    				"<span class='delete-comment'>"."<a href='javascrip:void(0);' title='删除后不可恢复'>".'删除'."</a>"."</span>".
				    				
				    				"<div class='show-text'>".htmlentities($new_row['content'],ENT_QUOTES)."</div>".
				    				"<span class='show-time'>".htmlentities($new_row['submission_time'],ENT_QUOTES)."</span>".
				    				"<span class='reply-comment'>".'回复'."</span>".
				    				"<div class='reply-box-container'>".
				    					"<textarea class='reply-text'>"."</textarea>".
				    					"<button class='btn btn-success button-text confirm-reply'>".'发表'."</button>".
				    					"<button class='btn btn-danger button-text'>".'取消'."</button>".
				    				"</div>".
				    				"<ul>".
			    		    		$ret.
				    				"</ul>".
				    			"</div>".
				    		"</li>";
					}
		    	}
			}
			mysqli_free_result($ret_comments);
			
			mysqli_close($conn);
			?>
			</ul>
		</div>
	</section>
	<footer>
   	<div class="footer-page">
      <ul class="list-inline">
      	<li><a href="index.html">网站开发者：Anani</a></li>
      	<li><span class="vertical-line"></span></li>
      	<li><a target="_blank" href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=zqqhoKm5pq2moI6oobajr6ei4K2how" style="text-decoration:none;">联系我</a></li>
      </ul>
   	</div>
   	<div id="buoy">
      <a onclick="toTop()" title="回到顶部"><span class="u-icon-arr u-icon-up"></span></a>
      <a onclick="toBottom()" title="移到底部"><span class="u-icon-arr u-icon-down"></span></a>
  	</div>
	</footer>
    </body>
    <!-- jQuery -->
    <script type="text/javascript" src="js-blog/jquery-3.2.0.min.js"></script>
    <!-- 包括所有已编译的 bootstrap 插件 -->
    <script type="text/javascript" src="js-blog/bootstrap.min.js"></script>
    <script type="text/javascript">
    	// 设置点击底部浮标到顶、底部的函数
        function toTop() {
           $('body,html').animate({scrollTop:0},1000);
        }
        function toBottom() {
           var bottom = $("body,html").height();
           $('body,html').animate({scrollTop:bottom},1000);
        }

        // 新消息检测与提示框显示和隐藏
    	function updeReplies() {
    		var userName = "<?php echo $user_name; ?>";
    		//发送ajax请求，更新#message-content内容
    		$.ajax({
        			url:'message_hints.php',
        			type:'POST',
        			data:{ user_name:userName },
        			dataType:'json',
        			async: false,
        			timeout:1000,
        			error:function(xhr,status,error){
        				alert(error);
        			},
        			success:function(result,status,xhr){
        				if (result.error==='noerror'&& result.status=='1') {
        					$('.message-hints').slideDown('slow');
        				}
        			}
        		});
    	}
    	setInterval("updeReplies()",5000);

    	$('#cancel-show').click(function(){
    		var userName = "<?php echo $user_name; ?>";
    		//发送ajax请求修改status
			$.post('delete_hints.php',{ delete_name_status:userName },function(data,status) {
    			if (status=="success") {
    				if (!data.error==='noerror') {
    					alert('操作失败，请稍后重试！');
    				}
    			}
    			else {
    				alert('操作失败，请稍后重试！');
    			}
    		},"json");
    		$('.message-hints').slideUp();
    	});

    	$('#show-replies').click(function() {
    		var userName = "<?php echo $user_name; ?>";
    		//发送ajax请求修改status
			$.post('delete_hints.php',{ delete_name_status:userName },function(data,status) {
    			if (status=="success") {
    				if (!data.error==='noerror') {
    					alert('操作失败，请稍后重试！');
    				}
    			}
    			else {
    				alert('操作失败，请稍后重试！');
    			}
    		},"json");
    		$('.message-hints').slideUp();
    		$('.show-message').slideDown();
    	});

    	$('#close-show').click(function() {
    		$('.show-message').slideUp();
    	});

        $(function() {
	    	//html语句转为实体
	    	 function  HmtlInCode(str) {
	    	 	var  ret  =  ""; 
			    if  (str.length  ==  0)  return  ""; 
			    ret = str.replace(/&/g, "&amp;");
			    ret = ret.replace(/</g, "&lt;");
			    ret = ret.replace(/>/g, "&gt;");
			    ret = ret.replace(/ /g, "&nbretp;");
			    ret = ret.replace(/\'/g, "&#39;");
			    ret = ret.replace(/\"/g, "&quot;");
			    ret = ret.replace(/\n/g, "<br>");
			    return ret;
	    	 }

        	//创建checkValue函数检测表单的值以及用户登录状态
        	function checkValue() {
        		var user_name = "<?php echo $user_name; ?>";
        		var user_email = "<?php echo $user_email; ?>";
        		if (user_name===''||user_email==='') {
        			$('.confirm-content-container-login').show();
        			return false;
        		}
        		else if ($('#content').val()==='') {
					$('#prompt').text('留言内容不能为空，请重新输入！');
					$('#content').focus();
					return false;
				}
				else {
					return true;
				}
			}

			//为 #cancel 添加点击事件使确认框隐藏
        	$('#cancel').click(function(){
        		$('#content').val('');
        		$('#prompt').empty();
        		$('.confirm-content-container-login').hide();
        	});

        	//为#content添加点击事件清空#prompt的值
        	$('#content,#reset').click(function(){
        		$('#prompt').text('');
        	});

			//创建reset函数清空表单的值
        	function reset() {
        		$('#content').val('');
        		$('#prompt').empty();
        	}
        	//向#submit添加点击事件实现留言功能
        	$('#submit').click(function() {
        		var userName = "<?php echo $user_name; ?>";
        		var userEmail = "<?php echo $user_email; ?>";
        		var number = $('#comments').children().last().index()+2;
        		//执行checkValue函数
        		if (!checkValue()) {
        			return false;
        		}
        		//发送ajax请求
        		$.post('update_comments.php',{ content:$('#content').val(),user_name:userName,user_email:userEmail },function(data,status) {
        			if (status=="success") {
        				if (data.error==='noerror') {
        					var str = "<li class='comments-content'><div class='comments-content-left'><div class='head-portrait'></div></div><div class='comments-content-right'><span class='show-name'>" + HmtlInCode(data.name) + "</span><span class='show-number'>" + "第 " + number + " 楼" + "</span><span class='delete-comment'>" + "<a href='javascrip:void(0);' title='删除后不可恢复'>" + "删除" + "</a></span><div class='show-text'>" + HmtlInCode(data.content) + "</div><span class='show-time'>" + HmtlInCode(data.time) + "</span><span class='reply-comment'>" + "回复" + "</span><div class='reply-box-container'><textarea class='reply-text'></textarea><button class='btn btn-success button-text'>"+'发表'+"</button><button class='btn btn-danger button-text'>"+'取消'+"</button></div></div></li>";
	        				$('#comments').prepend(str);
	        				//执行reset函数
	        				reset();
	        				$('#prompt').text('留言成功！');
        				}
        				else {
        					$('#prompt').text(data.error);
        				}
        			}
        			else {
        				$('#prompt').text('留言失败，请稍后重新输入！');
        			}
        		},"json");
        	});

        	//向#delete_comment添加点击事件，实现删除功能
        	$('#comments').on('click','.delete-comment',function() {
        		var userName = "<?php echo $user_name; ?>";
        		var username = $($(this)).prev().prev().text();
        		var administrator = 'Anani';
        		var deleteTime = $($(this)).next().next().text();
        		var deleteDom = $(this).parent().parent();

        		if (userName==='') {
        			$('.confirm-content-container-login').show();
        		}
        		else if(userName!==username&&userName!==administrator){
        			$('#failed-tip').text('对不起，您没有该权限！');
					$('.prompt-box-failed').show();
					setTimeout(function(){ $('.prompt-box-failed').hide(); }, 1500);
        		}

        		else {
        			$('.confirm-content-container-delete').show();
        			$(".delete-confirm").on("click",function(){
	        			var deleteConfirm = $(this).attr("id");
	        			if (deleteConfirm=="confirm-delete") {
	        				//发送ajax请求
			        		$.post('delete_comment.php',{ delete_time:deleteTime },function(data,status) {
			        			if (status=="success") {
			        				if (data.error==='noerror') {
			        					$(deleteDom).remove();
			        					$('.comments-content').each(function(){
			        						var totalNumber = $('.comments-content').length;
			        						var number = $(this).index();
			        						var resultNumber = totalNumber - number;
			        						$(this).children().eq(1).children().eq(1).text('第 '+ resultNumber +' 楼');
			        					});
			        					$('.confirm-content-container-delete').hide();
			        					$('.prompt-box-success').show();
										setTimeout(function(){ $('.prompt-box-success').hide(); }, 1500);
			        				}
			        				else {
			        					$('#failed-tip').text(data.error);
										$('.prompt-box-failed').show();
										setTimeout(function(){ $('.prompt-box-failed').hide(); }, 1500);
			        				}
			        			}
			        			else {
			        				$('#failed-tip').text('删除留言失败，请稍后重试！');
									$('.prompt-box-failed').show();
									setTimeout(function(){ $('.prompt-box-failed').hide(); }, 1500);
			        			}
			        		},"json");
	        			}
	        			else {
	        				$('.confirm-content-container-delete').hide();
	        			}
				    });
        		}
        	});

        	//向.reply-comment添加点击事件实现恢复功能
        	$('#comments').on('click','.reply-comment',function(){
        		var subUserName = "<?php echo $user_name; ?>";
        		var toUserName = $(this).prevAll().eq(4).text();
        		var replyCommentTime = $(this).prevAll().eq(0).text();
        		var replyBoxContainer = $(this).next();
        		var replyBox = $(this).next().children();
        		var replyRet = $(this).next().next();
        		if (subUserName=='') {
	        			$('.confirm-content-container-login').show();
	        			return false;
	        		}
        		replyBoxContainer.show();

        		// 取消点击事件。。。。避免重复绑定事件
        		$('.confirm-reply').off('click');

        		$('.confirm-reply').on('click',function() {
	        	    if ($(replyBox).eq(0).val()=='') {
	        				$('#failed-tip').text('回复内容不能为空！');
							$('.prompt-box-failed').show();
							setTimeout(function(){ $('.prompt-box-failed').hide(); }, 1500);
							return false;
	        			}
	        		else {
	        			//发送ajax请求
	        			$.post('add_reply.php',{ sub_username:subUserName,to_username:toUserName,reply_content:$(replyBox).eq(0).val(),reply_comment_time:replyCommentTime },function(data,status) {
		        			if (status=="success") {
		        				if (data.error==='noerror') {
		        					//成功后的显示回复内容
		        					$(replyBox).eq(0).val('');
		        					var str = "<li>" + HmtlInCode(data.subName) + ' 回复： ' + HmtlInCode(data.content) + "<span class='show-time'>" + data.time + "</span></li>" ;
		        					replyRet.prepend(str);
		        					$('#success-tip').text('回复成功！');
			        				$('.prompt-box-success').show();
			        				$(replyBoxContainer).hide();
									setTimeout(function(){ $('.prompt-box-success').hide(); }, 1500);
									return false;
		        				}
		        				else {
		        					$('#failed-tip').text(data.error);
									$('.prompt-box-failed').show();
									setTimeout(function(){ $('.prompt-box-failed').hide(); }, 1500);
		        				}
		        			}
		        			else {
		        				$('#failed-tip').text('回复失败，请稍后重试！');
								$('.prompt-box-failed').show();
								setTimeout(function(){ $('.prompt-box-failed').hide(); }, 1500);
		        			}
		        		},"json");
	        		}
        		});

        		replyBox.eq(2).click(function(){
        			$(replyBoxContainer).hide();
        		});
        	});
        });
   </script>
</html>