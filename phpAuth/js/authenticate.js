var url = "/phpAuthServer/index.php"


function authenticate(jsonData, url, callBack) {
	// invoke the PHP endpoint to validate the login and 
	// authenticate the Realtime token
	$.ajax({
	    url: url,
	    type: 'POST',
	    data:JSON.stringify(jsonData),
	    success: function(data) { 
	    	callBack(data);
	    },error: function(error) { 
	    	console.log(error);
	    }
	});
}

function doAuthenticate(){
	var userField = document.getElementById("user");
	var passField = document.getElementById("pass");

	// validate login and get the authenticated token
	authenticate({user:userField.value, pass:passField.value}, url, function(data){
		data = JSON.parse(data);
		if (data.status === "success") {
			// login was successful
			// save the authenticated token in the browser local storage
			localStorage.setItem("token", data.token);

			// redirect the user to the chat page
			window.location = "Realtime/index.html"
			
		}else if (data.status === "error") {
			// Oooops, something went wrong
			// Show an error message
			var errorLabel = document.getElementById("errorLabel");
			errorLabel.style.display = "block";
			localStorage.removeItem("token");
		};
	});
}