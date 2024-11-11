
const form1 = document.getElementById("form1");
const form2 = document.getElementById("form2");

form1.style.display = "block";
form2.style.display = "none";
form1.style.opacity = 1;
form2.style.opacity = 0;

function Transition() {
    const inputs = form1.querySelectorAll("input, select");
    let isValid = true;

    // Check each field's validity
    inputs.forEach((input) => {
        if (!input.checkValidity()) {
            isValid = false;
            input.reportValidity(); // Shows validation message for the first invalid input
            return; // Stop loop on first invalid input
        }
    });

    if (!isValid) return; // Stop the function if any input is invalid

    let opacity = 1;
    const fadeOutForm1 = setInterval(() => {
        if (opacity <= 0) {
            clearInterval(fadeOutForm1); //specifies last run but executes the rest fo the code
            form1.style.display = "none";
            form2.style.display = "block";
            
            opacity = 0;
            const fadeInForm2 = setInterval(() => {
                if (opacity >= 1) {
                    clearInterval(fadeInForm2);
                }
                form2.style.opacity = opacity;
                opacity += 0.05; 
            }, 30); 
        }
        form1.style.opacity = opacity;
        opacity -= 0.05;
    }, 30)
}

function reverseTransition() {
    let opacity = 1;

    const fadeoutForm2 = setInterval(() => {
        if(opacity <= 0) {
            clearInterval(fadeoutForm2);
            form2.style.display = "none";
            form1.style.display = "block";

            opacity = 0;

            const fadeInForm1 = setInterval(() => {
                if(opacity >= 1) {
                    clearInterval(fadeInForm1);
                }
                form1.style.opacity = opacity;
                opacity += 0.05;
            },30);
        }
        form2.style.opacity = opacity;
        opacity -= 0.05;
    },30)
}
