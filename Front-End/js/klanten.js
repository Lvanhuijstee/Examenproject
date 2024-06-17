var Open_Closed = 1

function Open(){
    var overzicht = document.getElementById('KlantOverzicht')
   if (Open_Closed == 1){
    overzicht.style.display = 'block'
    Open_Closed = 2
   }else if(Open_Closed == 2){
    overzicht.style.display = 'none'
    Open_Closed = 1
   }
}

let infoGather = []
let count = 1
function Select(x){

    let klant = document.getElementsByClassName('klant')[0]
    let parent = document.getElementsByClassName('KlantInfo')[x];
    let Children = parent.children;

    let klanten = document.getElementById('klanten')
    let DetailBar = document.createElement('div')
    DetailBar.className = 'insertDetailsBar'
    klanten.appendChild(DetailBar)

    if(count == 1){
        for(let i = 0; i < 4; i++){

        infoGather.push(Children[i].textContent)

        const newDiv = document.createElement("div")
        newDiv.className = 'insertDetails'
        DetailBar.appendChild(newDiv)

        const newP = document.createElement("p")
        newDiv.appendChild(newP)
        newP.innerHTML = infoGather[i]
        }
        count = 2
    }else if(count == 2){
        for(let i = 0; i < Children.length; i++){
            infoGather.push(Children[i].textContent)
            const newDiv = document.createElement("div")
            newDiv.className = 'insertDetails2'
            DetailBar.appendChild(newDiv)
    
            const newP = document.createElement("p")
            newDiv.appendChild(newP)
            newP.innerHTML = infoGather[i]
            }
        count = 1    
    }

    

    infoGather = []
    console.log(infoGather.length)
}