document.addEventListener('DOMContentLoaded', function () {
    var currentTab = 0;
    showTab(currentTab);

    function showTab(n) {
        var tabs = document.getElementsByClassName("tab");
        var prevBtn = document.getElementById("prevBtn");
        var nextBtn = document.getElementById("nextBtn");

        // Check if the tab exists before trying to display it
        if (tabs[n]) {
            tabs[n].style.display = "block";

            // Safely toggle the display of the previous button
            if (prevBtn) {
                prevBtn.style.display = n === 0 ? "none" : "inline";
            }

            // Safely update the next button's text
            if (nextBtn) {
                nextBtn.innerHTML = n === (tabs.length - 1) ? "Registreer" : "Volgende";
            }

            fixStepIndicator(n);
        } else {
            console.error(`Tab index ${n} does not exist.`);
        }
    }

    function nextPrev(n) {
        var tabs = document.getElementsByClassName("tab");
        // Safely hide the current tab if it exists
        if (currentTab < tabs.length) {
            tabs[currentTab].style.display = "none";
        }

        currentTab = currentTab + n;

        // Check if we've reached the end of the tabs
        if (currentTab >= tabs.length) {
            var successMessage = document.getElementById("Gelukt");
            if (successMessage) {
                successMessage.innerHTML = "Gelukt!";
            }
            if (nextBtn) {
                nextBtn.style.display = "none";
            }
            if (prevBtn) {
                prevBtn.style.display = "none";
            }
            var stepDiv = document.getElementById("stepDiv");
            if (stepDiv) {
                stepDiv.style.display = "none";
            }
            return false;
        }

        // Show the new current tab
        showTab(currentTab);
    }

    function fixStepIndicator(n) {
        var steps = document.getElementsByClassName("step");
        for (let i = 0; i < steps.length; i++) {
            steps[i].className = steps[i].className.replace(" active", "");
        }
        if (steps[n]) {
            steps[n].className += " active";
        }
    }
});