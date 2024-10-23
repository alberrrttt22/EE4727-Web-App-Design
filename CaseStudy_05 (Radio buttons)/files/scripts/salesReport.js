function toggleVisibility(id) {
    const element = document.getElementById(id);
    element.style.display = element.style.display === 'none' ? 'block' : 'none';
}

document.getElementById("products").onclick = function() {
    toggleVisibility("product-report");
};

document.getElementById("categories").onclick = function() {
    toggleVisibility("categories-report");
};