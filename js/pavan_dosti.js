var pavan_dosti =
{
	process :
	{
		init: function()
		{
			this.clickBinding();
		},
		clickBinding: function()
		{
			$('.process span').live('mouseover',function()
			{
				$(this).siblings().removeClass('active');
				$(this).addClass('active');
			}).live('mouseout',function()
			{
				
				$('.process span').siblings().removeClass('active');
				$('.process').each(function()
				{
					$(this).children().eq(3).addClass('active');
				});
			});
		}
	},
	login : 
	{
		init : function()
		{
			this.clickBinding();
			var loginValidator=$("#login-form").validate({
				errorClass: "error",
				rules: {
					login_password: {
						required: true,
						minlength: 5
					},
					login_user: {
						required: true,
						email: true
					}
				},
				errorElement: "em",
				messages: {
					login_password: {
						required: "Please provide a password",
						minlength: jQuery.format("Your password must be at least {0} characters")
					},
					login_user: "Please enter a valid email address"
				},
				errorPlacement: function(error, element) 
				{
					error.appendTo($("#response"));
				},
				submitHandler: function() 
				{
					var login_user=$('#login_user').val();
					var login_password=$('#login_password').val();
					var login_rememberMe=true;
					var loginUser = $.manageAjax.create('loginUser'); 
					loginUser.add(
					{
						success: function(html) 
						{
							jQuery.ajax(
							{
								url: "controller/userController.php",
								data: "ref=userLogin&login_user="+login_user+"&login_password="+login_password+"&login_rememberMe="+login_rememberMe+"&jsoncallback=?",
								dataType: "json",
								type: "POST",
								cache: true,
								beforeSend: function() {},
								success:function(data)
								{
									if(data.status)
									{
										$('#response').html('<em class="error">'+data.message+'</em>');
										window.location = window.location.href
									}
									else
									{
										$('#response').html('<em class="error">'+data.message+'</em>');
									}
								}
							});
						}
					});
				}
			});
		},
		clickBinding : function()
		{
			$('#logout').live('click',function()
			{
				var logoutUser = $.manageAjax.create('logoutUser'); 
				logoutUser.add(
				{
					success: function(html) 
					{
						jQuery.ajax(
						{
							url: "controller/userController.php",
							data: "ref=userLogout&jsoncallback=?",
							dataType: "json",
							type: "GET",
							cache: true,
							beforeSend: function() {},
							success:function(data)
							{
								if(data.status)
								{
									window.location = "index.php";
								}
								else
								{
					
								}
								console.log(data.message);
							}
						});
					}
				});
			});
		}
	}
}