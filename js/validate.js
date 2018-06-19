function admin_form()
{
	var fname = document.getElementById('fname');
	var lname = document.getElementById('lname');
	var email = document.getElementById('email');
	var pass = document.getElementById('pass');
	var cpass = document.getElementById('cpass');
	var mobile = document.getElementById('mobile');
	
	if(fname.value=='')
	{
		document.getElementById('req_fname').style.display='';
		document.getElementById('valid_fname').style.display='none';
		return false;
	}
	else if(fname.value!='' && fname.value.search(/^[a-zA-Z]+$/)==-1)
	{
		document.getElementById('req_fname').style.display='none';
		document.getElementById('valid_fname').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_fname').style.display='none';
		document.getElementById('valid_fname').style.display='none';		
	}
	
	if(lname.value=='')
	{
		document.getElementById('req_lname').style.display='';
		return false;
	}
	else if(lname.value!='' && lname.value.search(/^[a-zA-Z]+$/)==-1)
	{
		document.getElementById('req_lname').style.display='none';
		document.getElementById('valid_lname').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_lname').style.display='none';
		document.getElementById('valid_lname').style.display='none';		
	}
	
	if(email.value=='')
	{
		document.getElementById('req_email').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_email').style.display='none';
	}
	
	if(pass.value=='')
	{
		document.getElementById('req_pass').style.display='';
		document.getElementById('valid_pass').style.display='none';
		return false;
	}
	else if(pass.value.length<6)
	{
		document.getElementById('req_pass').style.display='none';
		document.getElementById('valid_pass').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_pass').style.display='none';
		document.getElementById('valid_pass').style.display='none';		
	}
	
	if(cpass.value=='')
	{
		document.getElementById('req_cpass').style.display='';
		document.getElementById('valid_cpass').style.display='none';
		return false;
	}
	else if(cpass.value!=pass.value)
	{
		document.getElementById('req_cpass').style.display='none';
		document.getElementById('valid_cpass').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_cpass').style.display='none';
		document.getElementById('valid_cpass').style.display='none';		
	}
	
	if(mobile.value=='')
	{
		document.getElementById('req_mobile').style.display='';
		document.getElementById('valid_mobile').style.display='none';
		return false;
	}
	else if(mobile.value.length<=9)
	{
		document.getElementById('req_mobile').style.display='none';
		document.getElementById('valid_mobile').style.display='';
		return false;
	}
	else if(mobile.value.length>=11)
	{
		document.getElementById('req_mobile').style.display='none';
		document.getElementById('valid_mobile').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_mobile').style.display='none';
		document.getElementById('valid_mobile').style.display='none';		
	}
	
	return true;	
}

function user_form()
{
	var fname = document.getElementById('fname');
	var lname = document.getElementById('lname');
	var mobile = document.getElementById('mobile');
	var email = document.getElementById('email');
	var pass = document.getElementById('pass');
	var cpass = document.getElementById('cpass');
	
	
	if(fname.value=='')
	{
		document.getElementById('req_fname').style.display='';
		document.getElementById('valid_fname').style.display='none';
		return false;
	}
	else if(fname.value!='' && fname.value.search(/^[a-zA-Z]+$/)==-1)
	{
		document.getElementById('req_fname').style.display='none';
		document.getElementById('valid_fname').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_fname').style.display='none';
		document.getElementById('valid_fname').style.display='none';		
	}
	
	if(lname.value=='')
	{
		document.getElementById('req_lname').style.display='';
		return false;
	}
	else if(lname.value!='' && lname.value.search(/^[a-zA-Z]+$/)==-1)
	{
		document.getElementById('req_lname').style.display='none';
		document.getElementById('valid_lname').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_lname').style.display='none';
		document.getElementById('valid_lname').style.display='none';		
	}
	
	if(mobile.value=='')
	{
		document.getElementById('req_mobile').style.display='';
		document.getElementById('valid_mobile').style.display='none';
		return false;
	}
	else if(mobile.value.length<=9)
	{
		document.getElementById('req_mobile').style.display='none';
		document.getElementById('valid_mobile').style.display='';
		return false;
	}
	else if(mobile.value.length>=11)
	{
		document.getElementById('req_mobile').style.display='none';
		document.getElementById('valid_mobile').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_mobile').style.display='none';
		document.getElementById('valid_mobile').style.display='none';		
	}
	
	if(email.value=='')
	{
		document.getElementById('req_email').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_email').style.display='none';
	}
	
	if(pass.value=='')
	{
		document.getElementById('req_pass').style.display='';
		document.getElementById('valid_pass').style.display='none';
		return false;
	}
	else if(pass.value.length<6)
	{
		document.getElementById('req_pass').style.display='none';
		document.getElementById('valid_pass').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_pass').style.display='none';
		document.getElementById('valid_pass').style.display='none';		
	}
	
	if(cpass.value=='')
	{
		document.getElementById('req_cpass').style.display='';
		document.getElementById('valid_cpass').style.display='none';
		return false;
	}
	else if(cpass.value!=pass.value)
	{
		document.getElementById('req_cpass').style.display='none';
		document.getElementById('valid_cpass').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_cpass').style.display='none';
		document.getElementById('valid_cpass').style.display='none';		
	}
	
	return true;	
}

function seller_form()
{
	var fname = document.getElementById('fname');
	var lname = document.getElementById('lname');
	var email = document.getElementById('email');
	var pass = document.getElementById('pass');
	var cpass = document.getElementById('cpass');
	var mobile = document.getElementById('mobile');
	
	if(fname.value=='')
	{
		document.getElementById('req_fname').style.display='';
		document.getElementById('valid_fname').style.display='none';
		return false;
	}
	else if(fname.value!='' && fname.value.search(/^[a-zA-Z]+$/)==-1)
	{
		document.getElementById('req_fname').style.display='none';
		document.getElementById('valid_fname').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_fname').style.display='none';
		document.getElementById('valid_fname').style.display='none';		
	}
	
	if(lname.value=='')
	{
		document.getElementById('req_lname').style.display='';
		return false;
	}
	else if(lname.value!='' && lname.value.search(/^[a-zA-Z]+$/)==-1)
	{
		document.getElementById('req_lname').style.display='none';
		document.getElementById('valid_lname').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_lname').style.display='none';
		document.getElementById('valid_lname').style.display='none';		
	}
	
	if(email.value=='')
	{
		document.getElementById('req_email').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_email').style.display='none';
	}
	
	if(pass.value=='')
	{
		document.getElementById('req_pass').style.display='';
		document.getElementById('valid_pass').style.display='none';
		return false;
	}
	else if(pass.value.length<6)
	{
		document.getElementById('req_pass').style.display='none';
		document.getElementById('valid_pass').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_pass').style.display='none';
		document.getElementById('valid_pass').style.display='none';		
	}
	
	if(cpass.value=='')
	{
		document.getElementById('req_cpass').style.display='';
		document.getElementById('valid_cpass').style.display='none';
		return false;
	}
	else if(cpass.value!=pass.value)
	{
		document.getElementById('req_cpass').style.display='none';
		document.getElementById('valid_cpass').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_cpass').style.display='none';
		document.getElementById('valid_cpass').style.display='none';		
	}
	
	if(mobile.value=='')
	{
		document.getElementById('req_mobile').style.display='';
		document.getElementById('valid_mobile').style.display='none';
		return false;
	}
	else if(mobile.value.length<=9)
	{
		document.getElementById('req_mobile').style.display='none';
		document.getElementById('valid_mobile').style.display='';
		return false;
	}
	else if(mobile.value.length>=11)
	{
		document.getElementById('req_mobile').style.display='none';
		document.getElementById('valid_mobile').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_mobile').style.display='none';
		document.getElementById('valid_mobile').style.display='none';		
	}
	
	return true;	
}

function product_form()
{
	var pname = document.getElementById('pname');
	var pdes = document.getElementById('pdes');
	var stock = document.getElementById('stock');
	var price = document.getElementById('price');
	
	if(pname.value=='')
	{
		document.getElementById('req_pname').style.display='';
		document.getElementById('valid_pname').style.display='none';
		return false;
	}
	else if(pname.value!='' && pname.value.search(/^[a-zA-Z]+$/)==-1)
	{
		document.getElementById('req_pname').style.display='none';
		document.getElementById('valid_pname').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_pname').style.display='none';
		document.getElementById('valid_pname').style.display='none';		
	}
	
	if(pdes.value=='')
	{
		document.getElementById('req_pdes').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_pdes').style.display='none';
	}
	
	if(stock.value=='')
	{
		document.getElementById('req_stock').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_stock').style.display='none';
	}
	
	if(price.value=='')
	{
		document.getElementById('req_price').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_price').style.display='none';
	}
	
	return true;	
}

function feedback_form()
{
	var name = document.getElementById('name');
	var email = document.getElementById('email');
	var message = document.getElementById('message');
	
	if(name.value=='')
	{
		document.getElementById('req_name').style.display='';
		document.getElementById('valid_name').style.display='none';
		return false;
	}
	else if(name.value!='' && name.value.search(/^[a-zA-Z]+$/)==-1)
	{
		document.getElementById('req_name').style.display='none';
		document.getElementById('valid_name').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_name').style.display='none';
		document.getElementById('valid_name').style.display='none';		
	}
	
	if(email.value=='')
	{
		document.getElementById('req_email').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_email').style.display='none';
	}
	
	if(message.value=='')
	{
		document.getElementById('req_message').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_message').style.display='none';
	}
	
	return true;	
}

function payment_form()
{
	var amount = document.getElementById('amount');
	var number = document.getElementById('number');
	var date = document.getElementById('date');
	var name = document.getElementById('name');
	var cvv = document.getElementById('cvv');
	
	if(amount.value=='')
	{
		document.getElementById('req_amount').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_amount').style.display='none';
	}
	
	if(number.value=='')
	{
		document.getElementById('req_number').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_number').style.display='none';
	}
	
	if(date.value=='')
	{
		document.getElementById('req_date').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_date').style.display='none';
	}
	
	if(name.value=='')
	{
		document.getElementById('req_name').style.display='';
		document.getElementById('valid_name').style.display='none';
		return false;
	}
	else if(name.value!='' && name.value.search(/^[a-zA-Z]+$/)==-1)
	{
		document.getElementById('req_name').style.display='none';
		document.getElementById('valid_name').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_name').style.display='none';
		document.getElementById('valid_name').style.display='none';		
	}
	
	if(cvv.value=='')
	{
		document.getElementById('req_cvv').style.display='';
		document.getElementById('valid_cvv').style.display='none';
		return false;
	}
	else if(cvv.value.length<=2)
	{
		document.getElementById('req_cvv').style.display='none';
		document.getElementById('valid_cvv').style.display='';
		return false;
	}
	else if(cvv.value.length>=4)
	{
		document.getElementById('req_cvv').style.display='none';
		document.getElementById('valid_cvv').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_cvv').style.display='none';
		document.getElementById('valid_cvv').style.display='none';		
	}
	
	return true;	
}

function password_form()
{
	var pass = document.getElementById('pass');
	var cpass = document.getElementById('cpass');
	
	if(pass.value=='')
	{
		document.getElementById('req_pass').style.display='';
		document.getElementById('valid_pass').style.display='none';
		return false;
	}
	else if(pass.value.length<6)
	{
		document.getElementById('req_pass').style.display='none';
		document.getElementById('valid_pass').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_pass').style.display='none';
		document.getElementById('valid_pass').style.display='none';		
	}
	
	if(cpass.value=='')
	{
		document.getElementById('req_cpass').style.display='';
		document.getElementById('valid_cpass').style.display='none';
		return false;
	}
	else if(cpass.value!=pass.value)
	{
		document.getElementById('req_cpass').style.display='none';
		document.getElementById('valid_cpass').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_cpass').style.display='none';
		document.getElementById('valid_cpass').style.display='none';		
	}
	
	return true;	
}

function login_form()
{
	var login_email = document.getElementById('username');
	var login_password = document.getElementById('password');
	
	if(login_email.value=='')
	{
		document.getElementById('req_login_email').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_login_email').style.display='none';
	}
	
	if(login_password.value=='')
	{
		document.getElementById('req_login_pass').style.display='';
		document.getElementById('valid_login_pass').style.display='none';
		return false;
	}
	else if(login_password.value.length<6)
	{
		document.getElementById('req_login_pass').style.display='none';
		document.getElementById('valid_login_pass').style.display='';
		return false
	}
	else
	{
		document.getElementById('req_login_pass').style.display='none';
		document.getElementById('valid_login_pass').style.display='none';
	}
	return true;
}

function forgot_form()
{
	var login_email = document.getElementById('username');
	var mobile = document.getElementById('mobile');
	var pass = document.getElementById('pass');
	var cpass = document.getElementById('cpass');
	
	if(login_email.value=='')
	{
		document.getElementById('req_login_email').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_login_email').style.display='none';
	}
	
	if(mobile.value=='')
	{
		document.getElementById('req_mobile').style.display='';
		document.getElementById('valid_mobile').style.display='none';
		return false;
	}
	else if(mobile.value.length<=9)
	{
		document.getElementById('req_mobile').style.display='none';
		document.getElementById('valid_mobile').style.display='';
		return false;
	}
	else if(mobile.value.length>=11)
	{
		document.getElementById('req_mobile').style.display='none';
		document.getElementById('valid_mobile').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_mobile').style.display='none';
		document.getElementById('valid_mobile').style.display='none';		
	}
	
	if(pass.value=='')
	{
		document.getElementById('req_pass').style.display='';
		document.getElementById('valid_pass').style.display='none';
		return false;
	}
	else if(pass.value.length<6)
	{
		document.getElementById('req_pass').style.display='none';
		document.getElementById('valid_pass').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_pass').style.display='none';
		document.getElementById('valid_pass').style.display='none';		
	}
	
	if(cpass.value=='')
	{
		document.getElementById('req_cpass').style.display='';
		document.getElementById('valid_cpass').style.display='none';
		return false;
	}
	else if(cpass.value!=pass.value)
	{
		document.getElementById('req_cpass').style.display='none';
		document.getElementById('valid_cpass').style.display='';
		return false;
	}
	else
	{
		document.getElementById('req_cpass').style.display='none';
		document.getElementById('valid_cpass').style.display='none';		
	}
	return true;
}