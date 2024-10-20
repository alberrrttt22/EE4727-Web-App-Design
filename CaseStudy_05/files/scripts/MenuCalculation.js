function calculateJava() {
    var javaSingle = document.getElementById("java-single").value;
    const javaPrice = 2;

    javaSingle = javaSingle ? parseFloat(javaSingle): 0;
    var javaSubtotal = javaSingle*javaPrice;
    var javaText = document.getElementById("java-price")
    javaText.textContent = `$${javaSubtotal.toFixed(2)}`; // Format to 2dp

    calculateTotal();
}

function calculateLait(){
    var laitSingle = document.getElementById("lait-single").value;
    var laitDouble = document.getElementById("lait-double").value;

    const laitSinglePrice = 2
    const laitDoublePrice = 3

    // Make sure empty fields default to 0
    laitSingle = laitSingle ? parseFloat(laitSingle): 0 // This is shorthand for an if-else statement
    laitDouble = laitDouble ? parseFloat(laitDouble) : 0 // condition ? trueValue : falseValue

    var laitText = document.getElementById("lait-price")
    var laitSubtotal = laitSinglePrice*laitSingle + laitDoublePrice*laitDouble;
    laitText.textContent = `$${laitSubtotal.toFixed(2)}`;

    calculateTotal();
}

function calculateCap(){
    var capSingle = document.getElementById("cap-single").value;
    var capDouble = document.getElementById("cap-double").value;

    const capSinglePrice = 4.75;
    const capDoublePrice = 5.75;

    capSingle = capSingle ? parseFloat(capSingle): 0;
    capDouble = capDouble ? parseFloat(capDouble) : 0;

    var capText = document.getElementById("cap-price")
    var capSubtotal = capSinglePrice*capSingle + capDoublePrice*capDouble;
    capText.textContent = `$${capSubtotal.toFixed(2)}`;

    calculateTotal();
}

function calculateTotal(){

    // Retrieve subtotal values
    var javaSubtotal = document.getElementById("java-price").textContent.replace('$', '');
    var laitSubtotal = document.getElementById("lait-price").textContent.replace('$', '');
    var capSubtotal = document.getElementById("cap-price").textContent.replace('$', '');

    // Parse the subtotal values as floats
    javaSubtotal = parseFloat(javaSubtotal) || 0; // Parse as float or default to 0
    laitSubtotal = parseFloat(laitSubtotal) || 0;
    capSubtotal = parseFloat(capSubtotal) || 0;

    var total = javaSubtotal + laitSubtotal + capSubtotal;

    var totalText = document.getElementById("total-price");
    totalText.textContent = `$${total.toFixed(2)}`;
}


document.querySelectorAll('.prices').forEach(function(input) {
    input.addEventListener('input', function(){
        // If the value is less than 0, reset it to 0
        if (this.value < 0){
            this.value = 0;
        }
    });
});
document.getElementById("java-single").addEventListener("input", calculateJava);
document.getElementById("lait-single").addEventListener("input", calculateLait);
document.getElementById("lait-double").addEventListener("input", calculateLait);
document.getElementById("cap-single").addEventListener("input", calculateCap);
document.getElementById("cap-double").addEventListener("input", calculateCap);

