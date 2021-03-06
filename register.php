<!DOCTYPE html>
<html lang="zh-CN">
    <head>
    	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
		<meta name="keywords" content="Anani，博客园，注册用户">
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
		<title>用户注册</title>
		<style type="text/css">
			/*全局样式*/
			* {
			    margin: 0;
			    padding: 0;
			}

			html {
				display: table;
				margin: auto;
				height: 100%;
				width: 90%;
			}

			body {
			    display: table-cell;
			    min-height: 100%;
			    font-size: 16px;
			    font-family: 'PingFang SC','Helvetica Neue','Helvetica','Arial',sans-serif;
			    color: #000;
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

			/*留言板*/
			.message-board-head {
				text-align: center;
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

			.caution {
				padding: 0 1%;
				color: #f00;
			}

			.input-margin {
				margin-top: 10px;
				margin-bottom: 20px;
			}

			.button-text {
				margin-left: 1%;
			}

			.prompt {
				height: 16px;
			}

			/*确认框样式*/
			.confirm-content-container {
				display: none;
				position: absolute;
				top: 0;
				left: 0;
				z-index: 888;
				height: 100%;
				width: 100%;
				background-color: rgba(144,144,144,0.8);
			}
			.confirm-content {
				z-index: 999;
				position: fixed;
				top: 50%;
				left: 50%;
				transform: translate(-50%,-50%);
				padding-top: 5%;
				width: 20%;
				height: 50%;
				background-color: #FFF;
			}

			.confirm-content-body {
				margin-top: 15%;
				margin-bottom: 15%;
				text-align: center;
			}

			/*底部浮标*/
			.footer-page {
				float: left;
           		padding-bottom: 20px;
           		width: 100%;
           	 	text-align: center;
				color: #000;
	        }

	        .list-inline a {
	        	color: #000;
	        }
	        	.list-inline a:hover {
	        		text-decoration:none;
	      		}

	      	.vertical-line {
	      		border-style: solid;
	      		border-width: 0 0 0 1px;
	      		border-color: #000;
	      	}

	         /*当使用手机设备时改变部分板块的显示样式*/
	         @media screen and (max-width: 768px) {
	         	#blogTitle h1 {
              		padding-left: 0.4em;
           		}
            	#blogTitle h2 {
              		padding-left: 3.4em;
           		}
           		.message-board-head {
           			width: 100%;
           		}
           		.message-board-body {
           			width: 98%;
           		}
           		.message-board-title,.message-author-text {
           			display: none;
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
	</div>
	</header>
	<section>
		<div class="message-board-head"><h4>用户注册</h4></div>
		<div class="message-board-body">
			<div class="message-board-title">主人寄语</div>
			<div class="message-author-text">
				<p>代码改变世界，坚持铸就未来。</p>
			</div>
			<div class="message-board-title">请输入您的账号信息</div>
			<div class="message-user-text">
		    <form>
		        <p class="text-center text-danger input-margin prompt" id="prompt"></p>
		        <p class="text-center"><span class="caution">*</span><label for="user_account">账号：</label> <input type="text" id="user_account" maxlength="20" /></p>
		        <p class="text-center"><span class="caution">*</span><label for="user_name">昵称：</label> <input type="text" id="user_name" maxlength="10" /></p>
		        <p class="text-center"><span class="caution">*</span><label for="password">密码：</label> <input type="password" id="password" /></p>
		        <p class="text-center"><label for="password">性别：</label> <input type="radio" name="sex" value="男">男<input type="radio" style="margin-left: 10px;" name="sex" value="女">女</p>
		        <p class="text-center"><span class="caution">*</span><label for="email">邮箱：</label> <input type="text" name="email" id="email" autocomplete="on" /></p>
		        <p class="text-center input-margin"><input type="button" class="btn btn-success button-text" id="submit" value="注册" /><button type="reset" class="btn btn-danger button-text" id="reset">重置</button></p>
		        <div class="text-center input-margin">已经有账号了？现在就去<a href="login.php"> 登录 </a>吧</div>
			</form>
			</div>
		</div>
	</section>
	<section>
		<div class="confirm-content-container">
	    	<div class="confirm-content">
	    		<div class="text-center"><h2>注册成功</h2></div>
	    		<div class="confirm-content-body">现在就去登录?</div>
	    		<div class="">
	    			<p class="text-center input-margin"><button type="button" class="btn btn-success button-text" id="login"><a href="login.php">确认</a></button><button type="button" class="btn btn-danger button-text" id="cancel">取消</button></p>
	    		</div>
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
    <script type="text/javascript">
        $(function() {

        	//为文档添加点击事件清空提示值
        	$('#user_name,#user_account,#password,#email,#reset').click(function() {
        		$('#prompt').empty();
        	});

        	//为 #cancel 添加点击事件使确认框隐藏
        	$('#cancel').click(function(){
        		$('input[name=sex]').prop("checked",false);
        		$('#user_name,#user_account,#password,#email').val('');
        		$('body').css("background-color","#FFF");
        		$('.confirm-content-container').hide();
        	});

        	//创建checkValue函数检测表单的值
        	function checkValue() {
				var regEmail = /^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$/;
				var regPassword = /^[a-zA-Z0-9_-]{4,16}$/;
				var regAccount = /^[a-zA-Z0-9]{6,20}$/;
				var regName = /^[a-zA-Z0-9\u4e00-\u9fa5]+$/;
				if ($('#user_account').val()==='') {
					$('#prompt').text('请输入您的账号！');
					$('#user_account').focus();
					return false;
				}
				else if (!regAccount.test($('#user_account').val())) {
					$('#prompt').text('账号只能输入 6 到 20 位由字母和数字的组合！');
					$('#user_account').focus();
					return false;
				}
				else if ($('#user_name').val()==='') {
					$('#prompt').text('请输入您的昵称！');
					$('#user_name').focus();
					return false;
				}
				else if (!regName.test($('#user_name').val())) {
					$('#prompt').text('昵称只能输入 2 到 11 位由汉子、数字、字母的组合！');
					$('#user_name').focus();
					return false;
				}
				else if($('#password').val()==='') {
					$('#prompt').text('请输入您的密码！');
					$('#password').focus();
					return false;
				}
				else if(!regPassword.test($('#password').val())) {
					$('#prompt').text('密码只能输入 4 到 16 位由字母、数字、下划线和减号组成的组合！');
					$('#password').focus();
					return false;
				}
				else if($('#email').val()==='') {
					$('#prompt').text('请输入您的邮箱！');
					$('#email').focus();
					return false;
				}
				else if (!regEmail.test($('#email').val())) {
					$('#prompt').text('请输入正确的邮箱格式！');
					$('#email').focus();
					return false;
				}
				else {
					return true;
				}
			}

        	//发送ajax请求
        	$('#submit').click(function(){
        		//执行checkValue函数
        		if (!checkValue()) {
        			return false;
        		}
        		$.ajax({
        			url:'register_action.php',
        			type:'POST',
        			data:{user_account:$('#user_account').val(),user_name:$('#user_name').val(), password:$('#password').val(),sex:$("input[name='sex']:checked").val(),email:$('#email').val()},
        			dataType:'json',
        			async: false,
        			timeout:1000,
        			error:function(xhr,status,error){
        				alert(error);
        			},
        			success:function(result,status,xhr){
        				if (result.error==='noerror') {
        					$('.confirm-content-container').show();
        				}
        				else {
        					$('#prompt').text(result.error);
        				}
        			}
        		});
        	});
        });
   </script>
</html>