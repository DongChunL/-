
function checkname(){

 	var username = document.getElementById("username").value;	
 	var tipUserName = document.getElementById("tipUserName").innerHTML;

 	if(username == "" ){
 		document.getElementById("tipUserName").innerHTML = "*请输入用户名";
 	}else{
 		document.getElementById("tipUserName").innerHTML = "";
 	}

 }
function checkpasswd(){
	var passwd = document.getElementById("passwd").value;
	 	if(passwd == ""){
	 		document.getElementById("tipPassWord").innerHTML = "*请输入密码";
 	}else{
 		document.getElementById("tipPassWord").innerHTML = "";
 	}
}

function checkUserId(){
	var userId = document.getElementById("userId").value;
	 	if(userId ==""){
	 		document.getElementById("tipUserId").innerHTML = "*请输入有效证件";
 	}else{
 		document.getElementById("tipUserId").innerHTML = "";
 	}
}
function checkPhone(){
	var phone = document.getElementById("phone").value;
	 	if(phone ==""){
	 		document.getElementById("tipPhone").innerHTML = "*请输入11位数字的联系方式";
 	}else{
 		document.getElementById("tipPhone").innerHTML = "";
 	}
}
function checkEmail(){
	var email = document.getElementById("email").value;
	if(email ==""){
		document.getElementById("tipEmail").innerHTML = "*请输入正确的电子邮箱";
	}else{
		document.getElementById("tipEmail").innerHTML = "";
	}
}

function checkLogin(){
	var username = document.getElementById("username").value;
	var passwd  = document.getElementById("passwd").value;

	if(username==""||passwd==""){
/*		alert("信息填写不完整");*/
		return false;
	}
}

function checkRegister(){
	var username = document.getElementById("username").value;
	var passwd  = document.getElementById("passwd").value;
	var userId = document.getElementById("userId").value;
	var phone = document.getElementById("phone").value;
	var email = document.getElementById("email").value;
	if(username==""||passwd==""||userId==""||phone==""||email==""){
		document.getElementById('tipInfo').innerHTML = "*信息填写不完整*";
		document.getElementsByTagName('form')[0].action="register.html";
	}else{
		document.getElementsByTagName('form')[0].action="Success.php";
		var checkInfo = "register";
		window.location.href="Success.php?username="+username+"&&passwd="+passwd+"&&userId="+userId+"&&phone="+phone+"&&email="+email+"&&checkInfo="+checkInfo;
	}
}