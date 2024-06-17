const postData = async (url = '', data = {}) => {
  try {
    const response = await fetch(url, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data)
    });

    if (!response.ok) {
      console.log(data);
      throw new Error('Network response was not ok');
    }

    const responseData = await response.json();
    console.log('Success:', responseData);

    if (responseData == true) {
      window.location.href = 'homepage.html'; // Redirect to the homepage upon successful login
    } else if (responseData == false) {
      alert("Foutieve gebruikersnaam of wachtwoord"); // Alert for incorrect username or password
    } else {
      alert("Gebruiker bestaat niet"); // Alert if user does not exist
    }

    return responseData;
  } catch (error) {
    console.error('Error:', error);
    throw error;
  }
};

function validateLogin() {
  const enteredUsername = document.getElementById("username").value;
  const enteredPassword = document.getElementById("password").value;

  const userData = {
    gebruikersnaam: enteredUsername,
    wachtwoord: enteredPassword
  };

  postData('http://85.214.56.174:8000/login', userData)
    .then(data => {
      // Redirection and alert logic handled in postData function
      // Handle other response data if needed
    })
    .catch(error => {
      // Handle error response here if needed
      alert("Foutieve gebruikersnaam of wachtwoord");
    });
}

document.querySelector(".signin").addEventListener("submit", function (event) {
  event.preventDefault();
  validateLogin();
});