var currentTab = 0;
var tabs = document.getElementsByClassName("tab");
var prevBtn = document.getElementById("prevBtn");
var nextBtn = document.getElementById("nextBtn");

document.addEventListener('DOMContentLoaded', function () {
    showTab(currentTab);
});

function showTab(n) {
    if (tabs[n]) {
        tabs[n].style.display = "block";

        if (prevBtn) {
            prevBtn.style.display = n === 0 ? "none" : "inline";
        }

        if (nextBtn) {
            nextBtn.innerHTML = n === (tabs.length) ? "Registreer" : "Volgende";

            fixStepIndicator(n);
        } else {
            console.error(`Tab index ${n} does not exist.`);
        }
    }
}

function nextPrev(n) {
    if (currentTab < tabs.length) {
        tabs[currentTab].style.display = "none";
    }

    currentTab = currentTab + n;

    if (currentTab >= tabs.length) {
        var successMessage = document.getElementById("Gelukt");
        if (successMessage) {
            successMessage.innerHTML = "Gelukt!";
        }
        if (nextBtn) {
            nextBtn.innerHTML = "Registreer";
            nextBtn.addEventListener('click', function (event) {
                if (this.innerHTML === "Registreer") {
                    event.preventDefault();
                    var form = document.getElementById('regForm');
                    setTimeout(function () {
                        form.submit();
                    }, 3000);
                }
            });
        }
        if (prevBtn) {
            prevBtn.style.display = "none";
        }
        var stepDiv = document.getElementById("jsStep");
        if (stepDiv) {
            stepDiv.style.display = "none";
        }
        return false;
    }

    showTab(currentTab);
}

function fixStepIndicator(n) {
    var steps = document.getElementsByClassName("step");
    for (let i = 0; i < steps.length; i++) {
        steps[i].className = steps[i].className.replace(" active", " finish");
    }
    if (steps[n].className = "step finish") {
        steps[n].className = steps[n].className.replace(" finish", " active");
    }
    if (steps[n] && steps[n].className != "step active") {
        steps[n].className += " active";
    }
}