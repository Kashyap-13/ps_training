function comfirm_delete()
{
    return confirm("Are you sure you want to delete");
} 
function validate_file()
{
  var pic_file = document.getElementById("fileToUpload");
  if(pic_file.value == "")
  {
    alert("Please select file first");
    return false;
  }
}
function validate_login_form()
{
  var uname = document.getElementById("user_name");
  var password = document.getElementById("password");

  if(uname.value == "")
  {
    alert('Please enter user name');
    uname.focus();
    return false;
  }
  if(password.value == "")
  {
    alert("Please enter password");
    password.focus();
    return false;
  }
}
function validate_form()
{
  var fname = document.getElementById("first_name");
  var lname = document.getElementById("last_name");
  var email = document.getElementById("email_id");
  var uname = document.getElementById("user_name");
  var password = document.getElementById("password");
  var confirmp = document.getElementById("confirm_password");
  var address1 = document.getElementById("address_line1");
  var address2 = document.getElementById("address_line2");
  var city = document.getElementById("city");
  var zipcode = document.getElementById("zipcode");
  var state = document.getElementById("state");

  var letters = /^[A-Za-z]+$/;
  var alphaExp = /^[0-9a-zA-Z]+$/;
  var numbers = /^\d{6}$/;

  if(!fname.value.match(letters))
  {
    alert('First name must have alphabet characters only');  
    fname.focus();  
    return false; 
  }
  if(!lname.value.match(letters))
  {
    alert('Last name must have alphabet characters only');  
    lname.focus();  
    return false; 
  }
  if(!uname.value.match(alphaExp))
  {
    alert('Enter valid user name');
    uname.focus();
    return false;
  }
  if(email.value == "")
  {
    alert('Enter Email');
    email.focus();
    return false;
  }
  if(password.value.length < 6)
  {
    alert("Password must be of 6 digit");
    password.focus();
    return false;
  }
  if(password.value != confirmp.value)
  {
    alert("Password doesn't match");
    confirmp.focus();
    return false;
  }
  if(address1.value == "")
  {
    alert('Enter address line1');  
    address1.focus();  
    return false; 
  }
  if(address2.value == "")
  {
    alert('Enter address line2');  
    address2.focus();  
    return false; 
  }
  if(!city.value.match(letters))
  {
    alert('Invalid city name');  
    city.focus();  
    return false; 
  }
  if(!zipcode.value.match(numbers))  
  {  
    alert('ZIP code must have numeric characters only');  
    zipcode.focus();  
    return false;   
  }
  if(!state.value.match(letters))
  {
    alert('Invalid state name');  
    state.focus();  
    return false; 
  }
}
function validate_user_form()
{
  var fname = document.getElementById("first_name");
  var lname = document.getElementById("last_name");
  var uname = document.getElementById("user_name");
  var password = document.getElementById("password");
  var address1 = document.getElementById("address_line1");
  var address2 = document.getElementById("address_line2");
  var city = document.getElementById("city");
  var zipcode = document.getElementById("zipcode");
  var state = document.getElementById("state");

  var letters = /^[A-Za-z]+$/;
  var alphaExp = /^[0-9a-zA-Z]+$/;
  var numbers = /^\d{6}$/;

  if(!fname.value.match(letters))
  {
    alert('First name must have alphabet characters only');  
    fname.focus();  
    return false; 
  }
  if(!lname.value.match(letters))
  {
    alert('Last name must have alphabet characters only');  
    lname.focus();  
    return false; 
  }
  if(!uname.value.match(alphaExp))
  {
    alert('Enter valid user name');
    uname.focus();
    return false;
  }
  if(password.value != "")
  {
    if(password.value.length < 6)
    {
      alert("Password must be of 6 digit");
      password.focus();
      return false;
    }
  }
  if(password.value != confirmp.value)
  {
    alert("Password doesn't match");
    confirmp.focus();
    return false;
  }
  if(address1.value == "")
  {
    alert('Enter address line1');  
    address1.focus();  
    return false; 
  }
  if(address2.value == "")
  {
    alert('Enter address line2');  
    address2.focus();  
    return false; 
  }
  if(!city.value.match(letters))
  {
    alert('Invalid city name');  
    city.focus();  
    return false; 
  }
  if(!zipcode.value.match(numbers))  
  {  
    alert('ZIP code must have 6 numeric characters');  
    zipcode.focus();  
    return false;   
  }
  if(!state.value.match(letters))
  {
    alert('Invalid state name');  
    state.focus();  
    return false; 
  }
}