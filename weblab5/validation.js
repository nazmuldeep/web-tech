function Validation() 
{
    var fname = document.getElementById("firstname").value;
    var email = document.getElementById("email").value;
    if (fname == "" || email == "") 
    
    {
      alert("Name must be filled out")
      return false;
    }
    
  }