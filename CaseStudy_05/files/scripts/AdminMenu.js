document.addEventListener('DOMContentLoaded', function () {
    // Get all checkboxes
    var checkboxes = document.querySelectorAll('.checkbox');

    // Loop through each checkbox
    checkboxes.forEach((checkbox, index) =>{
        checkbox.addEventListener('change', function(){
            const priceSpans = document.querySelectorAll('span[name="pricing"]'); // Get all spans with name = "pricing" as an array
            const priceSpan = priceSpans[index];

            if (checkbox.checked){
                // Convert the price span into an input field
                const currentPrice = priceSpan.textContent;
                const inputField = document.createElement('input');
                // Input field specifications
                inputField.type = 'text';
                inputField.value = currentPrice;
                inputField.classList.add('price-input');

                priceSpan.replaceWith(inputField);

                // Focus on the input field for easier editing
                inputField.focus();

                // Handle what happens when the input loses focus when user is done editing
                inputField.addEventListener('blur', function(){
                    const newPrice = inputField.value;

                    // Validation (input is a positive number and not empty)
                    if (!isNaN(newPrice) && newPrice.trim() !== "" && newPrice > 0){
                        priceSpan.textContent = newPrice; // !!!!!!!!!!!!!!!!!!
                    } else {
                        alert("Please enter a valid number.");
                    }
                })

            }
        })
    })
})