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
		<meta name="author" content="Anani">
		<link rel="icon" href="photo-blog/logo-blog.jpg" sizes="32x32" />
		<!-- 引入 Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css-blog/bootstrap.min.css"/>
		<!-- HTML5 Shim 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
		<!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
		<!--[if lt IE 9]>
		   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		   <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
		<title>回复内容</title>
		<style type="text/css">
			/*全局样式*/
			* {
			    margin: 0;
			    padding: 0;
			}

			body {
			    display: block;
			    margin: 0 1%;
			    min-height: 101%;
			    font-size: 16px;
			    font-family: 'PingFang SC','Helvetica Neue','Helvetica','Arial',sans-serif;
			    color: #000;
			}

			ul,ul li {
				list-style-type: none;
			}

			/*博文的显示框样式*/
			.bowen-content {
				margin: 0;
				width: 100%;
				min-height: 450px;
			}

	        .bowen {
	            float: left;
	            padding-top: 20px;
	            padding-bottom: 20px;
	            margin: 0;
	            width: 100%;
	            text-align: center;
	            font-weight: bold;
	            background-color: #ccc;
	        }

	        .bowen-body {
	        	float: left;
	        	margin-left: 10%;
	            width: 100%;
	        }
	        .bowen-body ul li {
	        	margin-top: 10px;
	        }

	        .margin-btn {
	        	text-align: center;
	        	margin-top: 20px;
	        	margin-bottom: 20px;
	        }

	        .show-time {
				margin-left: 10px;
				font-size: 12px;
				color: #9B9B9B;
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
	         /*当使用手机设备时改变部分板块的显示样式*/
	         @media screen and (max-width: 768px) {
           		.bowen-body {
           			width: 100%;
           			margin-left: 0;
           		}
	        }
		</style>
    </head>
	<body>
	<section>
	    <div class="bowen-content">
	    	<div><h3 class="bowen">与我相关</h3></div>
            <div class="bowen-body">
            	<ul>
				<?php 
				include 'connection.php';

				mysqli_select_db($conn,'comments');

				$select_private_replies_sql = "SELECT sub_username,reply_content,reply_time FROM replies WHERE to_username = '$user_name'";
				$select_private_replies = mysqli_query($conn,$select_private_replies_sql);
				if (!$select_private_replies) {
					echo "读取回复失败，请稍后重试！";
					exit();
				}
				
				while ( $select_private_row = mysqli_fetch_array($select_private_replies, MYSQLI_ASSOC) ) {
					echo "<li>".htmlentities($select_private_row ['sub_username'],ENT_QUOTES).' 回复了您： '.htmlentities($select_private_row ['reply_content'],ENT_QUOTES)."<span class='show-time'>".htmlentities($select_private_row['reply_time'],ENT_QUOTES)."</span>"."</li>";
				}

				mysqli_free_result($select_private_replies);

				mysqli_close($conn);
				 ?>
			</ul>
            </div>
	    </div>
	</section>
	<footer id="footer">
   	<div class="footer-page">
      <ul class="list-inline">
      	<li><a href="index.html">网站开发者：Anani</a></li>
      	<li><span class="vertical-line"></span></li>
      	<li><a target="_blank" href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=zqqhoKm5pq2moI6oobajr6ei4K2how" style="text-decoration:none;">联系我</a></li>
      </ul>
   	</div>
	</footer>
    </body>
    <!-- jQuery -->
    <script type="text/javascript" src="js-blog/jquery-3.2.0.min.js"></script>
    <!-- 包括所有已编译的 bootstrap 插件 -->
    <script type="text/javascript" src="js-blog/bootstrap.min.js"></script>
</html>