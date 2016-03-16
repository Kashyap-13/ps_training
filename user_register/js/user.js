function comfirm_delete()
{
    return confirm("Are you sure you want to delete");
} 
function validate_fname()
{
  var fname = document.getElementById("first_name");
  var letters = /^[A-Za-z]+$/;
  if(!fname.value.match(letters))
  {
    alert('First name must have alphabet characters only');  
    fname.focus();  
    return false; 
  }
}
function validate_lname()
{
  var lname = document.getElementById("last_name");
  var letters = /^[A-Za-z]+$/;
  if(!lname.value.match(letters))
  {
    alert('Last name must have alphabet characters only');  
    lname.focus();  
    return false; 
  }
}
function validate_uname()
{
  var uname = document.getElementById("user_name");
  var alphaExp = /^[0-9a-zA-Z]+$/; 
  if(!uname.value.match(alphaExp))
  {
    alert('Enter valid user name');
    uname.focus();
    return false;
  }
}
function validate_password()
{
  var password = document.getElementById("password");
  if(password.value == "")
  {
    alert('Enter pasword');
    password.focus();
    return false; 
  }
}
function validate_confirmp()
{
  var password = document.getElementById("password").value;
  var confirmp= document.getElementById("confirm_password").value;
  if(password != confirmp)
  {
    alert("Password doesn't match");
    password.focus();
    return false;
  }
}
function validate_address1()
{
  var address1 = document.getElementById("address_line1");
  var letters = /^[0-9a-zA-Z]+$/; 
  if(!address1.value.match(letters))
  {
    alert('User address must have alphanumeric characters only');  
    address1.focus();  
    return false; 
  }
}
function validate_address2()
{
  var address2 = document.getElementById("address_line2");
  var letters = /^[0-9a-zA-Z]+$/; 
  if(!address1.value.match(letters))
  {
    alert('User address must have alphanumeric characters only');  
    address2.focus();  
    return false; 
  }
}
function validate_city()
{
  var city = document.getElementById("city");
  var letters = /^[A-Za-z]+$/;
  if(!city.value.match(letters))
  {
    alert('Invalid city name');  
    city.focus();  
    return false; 
  }
}
function validate_zipcode()
{
  var zipcode = document.getElementById("zipcode");  
  var numbers = /^[0-9]+$/;  
  if(!zipcode.value.match(numbers))  
  {  
    alert('ZIP code must have numeric characters only');  
    zipcode.focus();  
    return false;   
  }        
}  
function validate_state()
{
  var state = document.getElementById("state");
  var letters = /^[A-Za-z]+$/;
  if(!state.value.match(letters))
  {
    alert('Invalid state name');  
    state.focus();  
    return false; 
  }
}

