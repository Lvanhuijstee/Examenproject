/*

const userData = {
    bsn: '12345523834329',
    voornaam: 'John',
    tussenvoegsels: '23',
    achternaam: 'Doe',
    geboortedatum: '20220212',
    mobielenummer: " 12345663345",
    huisnummer: '1',
    postcode: '123fd',  
    stad: 'df',
    provincie: 'df',
    land: 'df',
    gebruikersnaam: 'johndoe',
    wachtwoord: 'secretpassword'
  };

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
        console.log(data)
        throw new Error('Network response was not ok');
      }

      const responseData = await response.json();
      console.log('Success:', responseData);
      return responseData;
    } catch (error) {
      console.error('Error:', error);
      throw error;
    }
  };

  // Usage:
  postData('http://85.214.56.174:8000/user/registratie', userData)
    .then(data => {
      // Handle success response here if needed
    })
    .catch(error => {
      // Handle error response here if needed
    });

*/

function getData() {
  const bsn = 1234; // Replace with the actual BSN you want to retrieve
  fetch(`http://85.214.56.174:8000/user/${bsn}`)
  .then(response => {
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return response.json();
  })
  .then(data => {
    console.log('User data:', data);
    // Handle the retrieved user data here
  })
  .catch(error => {
    console.error('Error:', error);
    // Handle errors here
  });
}
getData()
