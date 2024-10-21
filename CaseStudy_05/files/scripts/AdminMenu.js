document.addEventListener("DOMContentLoaded", function () {
    // Get all checkboxes
    const checkboxes = document.querySelectorAll('.checkbox');

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            // Get the item name from the checkbox name
            let itemName = this.name.split('-')[0]; // e.g., "java-checkbox" -> "java"

            // Find the pricing element based on the checkbox state
            let pricingElements = document.querySelectorAll(`span[name="${itemName}-pricing"]`);

            // Toggle between input and span
            pricingElements.forEach(element => {
                if (this.checked && element.tagName === 'SPAN') {
                    // Replace span with an input field when checked
                    let price = element.innerText;

                    let input = document.createElement('input');
                    input.type = 'text';
                    if (element.classList.contains("single")){
                        input.name = `${itemName}-price-single`;
                    } else {
                        input.name = `${itemName}-price-double`;
                    }
                    
                    input.value = price;
                    input.size = 4; // Adjust input field size

                    // Replace span with input
                    element.replaceWith(input);
                } 

                // Disable the checkbox 
                this.disabled = true
            });
        });
    });

     // Validate input before form submission
     const form = document.querySelector('form');
     form.addEventListener('submit', function (event) {
         let valid = true;
 
         // Check each input for valid price
         checkboxes.forEach(checkbox => {
             if (checkbox.checked) {
                 let itemName = checkbox.name.split('-')[0];
                 let input = document.querySelector(`input[name="${itemName}-price-single"], input[name="${itemName}-price-double"] `);
                 if (input) {
                     let price = parseFloat(input.value);
                     // Validate that price is a non-zero positive number
                     if (isNaN(price) || price <= 0) {
                         valid = false;
                         alert(`Please enter a valid positive number for ${itemName}.`);
                     }
                 }
             }
         });
 
         // If not valid, prevent form submission
         if (!valid) {
             event.preventDefault();
         }
     });
});


// Function to show alert based on URL parameter
function showAlert() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('success')) {
        const success = urlParams.get('success');
        if (success === '1') {
            alert('Prices updated successfully!');
        } else {
            alert('No prices were updated.');
        }
    }
}
// Call the function when the page loads
window.onload = showAlert;