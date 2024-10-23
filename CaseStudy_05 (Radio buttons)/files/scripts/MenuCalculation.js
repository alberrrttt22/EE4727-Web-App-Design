function calculateJava() {
    var javaSingle = document.getElementById("java-quantity").value;
    javaSingle = javaSingle ? parseFloat(javaSingle): 0;
    var javaSubtotal = javaSingle*javaPrice;
    var javaText = document.getElementById("java-price")
    javaText.textContent = `$${javaSubtotal.toFixed(2)}`; // Format to 2dp

    calculateTotal();
}

function calculateLait(){
    var laitQuantity = document.getElementById("lait-quantity").value;

    // Make sure empty fields default to 0
    laitQuantity = laitQuantity ? parseFloat(laitQuantity): 0 // This is shorthand for an if-else statement, condition ? trueValue : falseValue

    var laitText = document.getElementById("lait-price");
    const laitSingle = document.getElementById('lait-single');
    // const laitDouble = document.getElementById('lait-double');
    if(laitSingle.checked){
        var laitPrice = laitSinglePrice;
    } else{
        var laitPrice = laitDoublePrice;
    }
    var laitSubtotal = laitQuantity*laitPrice
    laitText.textContent = `$${laitSubtotal.toFixed(2)}`;

    calculateTotal();
}

function calculateCap(){
    var capQuantity = document.getElementById("cap-quantity").value;

    capQuantity = capQuantity ? parseFloat(capQuantity): 0;

    var capText = document.getElementById("cap-price");
    var capSingle = document.getElementById('cap-single');
    // var capDouble = document.getElementById('cap-double');

    if (capSingle.checked){
        var capPrice = capSinglePrice;
    } else{
        var capPrice = capDoublePrice;
    }

    var capSubtotal = capQuantity*capPrice;
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
document.getElementById("java-quantity").addEventListener("input", calculateJava);

document.getElementById("lait-quantity").addEventListener("input", calculateLait);
document.getElementById('lait-single').addEventListener('change', calculateLait);
document.getElementById('lait-double').addEventListener('change', calculateLait);

document.getElementById("cap-quantity").addEventListener("input", calculateCap);
document.getElementById('cap-single').addEventListener('change', calculateCap);
document.getElementById('cap-double').addEventListener('change', calculateCap);

