document.getElementById("signupbutton").addEventListener("click", function(e){
if (document.getElementById("tandc").checked === false){
  	alert("Please read and accept the Terms and Conditions.");
    e.preventDefault();
    }
else {
		alert("Successfully submitted!");
}
});