var currentTab = 0;
showTab(currentTab);

    function showTab(n) {
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Registreer";
        } else {
            document.getElementById("nextBtn").innerHTML = "Volgende";
        }
        fixStepIndicator(n);
    }

    function nextPrev(n) {
        var x = document.getElementsByClassName("tab");
        if(currentTab < 5){
            x[currentTab].style.display = "none";
        }
        currentTab = currentTab + n;
        if (currentTab >= x.length) {
            document.getElementById("Gelukt").innerHTML = "Gelukt!"
            document.getElementById("nextBtn").style.display = "none";
            document.getElementById("prevBtn").style.display = "none";
            document.getElementById("stepDiv").style.display = "none";
            return false;
        }
        showTab(currentTab);
    }

    function fixStepIndicator(n) {
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        x[n].className += " active";
    }
