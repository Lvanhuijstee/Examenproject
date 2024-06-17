var tabs = 0
currentTab(tabs)

function currentTab(n){
  var tab = document.getElementsByClassName("tab");
  tab[n].style.display = "block";
  if(n == 0){
    document.getElementById("prvbutton").style.display = "none"
  }else{
    document.getElementById("prvbutton").style.display = "inline-block"
  }
}


function tabChangeN(n){
  var tab = document.getElementsByClassName("tab");
  
  if(!validateForm()) {return false;}

  if(tabs == tab.length -2){
    var subButton = document.getElementById("nxtbutton")
    subButton.innerHTML = "Submit";
    tab[tabs].style.display = "none";
    tabs = tabs + n;
    currentTab(tabs)
    
  }else if(tabs == tab.length -1){
    var subButton = document.getElementById("nxtbutton")
    subButton.type = 'submit'
  }else{
      tab[tabs].style.display = "none";
      tabs = tabs + n;
      document.getElementById("nxtbutton").innerHTML = "Volgende"
      currentTab(tabs);
  }
}


function validateForm() {
  
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[tabs].getElementsByTagName("input");

  for (i = 0; i < y.length; i++) {
    if (y[i].value == "") {
      y[i].className += " invalid";
      valid = false;
    }
  }
  return valid;
}

function tabChangeP(n){
  if(tabs == 7){
    tabs = 6
  }

  var tab = document.getElementsByClassName("tab");
  tab[tabs].style.display = "none";

  tabs = tabs + n;
  document.getElementById("nxtbutton").innerHTML = "Volgende"
  currentTab(tabs);
}

// const formEl = document.querySelector('.signup')

// formEl.addEventListener('submit', Event => {
//   Event.preventDefault();

//   const formData = new FormData(formEl);
//   const data = Object.fromEntries(formData);
//   console.log(data)

//   fetch('http://85.214.56.174:8000/user/registratie/',{
//     method: 'POST',
//     headers: {
//       'Content-Type': 'application/json'
//     },
//     body: JSON.stringify(data)
//   })
// })
