document.querySelectorAll('.addToCart').forEach(function (button) {
    button.addEventListener('click', function (event) {
        // Prevent the default action
        event.preventDefault();

        var productId = button.getAttribute('data-product-id')
        var productName = button.previousElementSibling.innerHTML;

        const productData = new URLSearchParams({
            id: productId,
            Name: productName,
            price: '99.99'
        });
        postJSON(productData);
    });
});

async function postJSON(Productdata) {
    try {
        const response = await fetch('producthandling.php', { // Use await to wait for the fetch to complete
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: Productdata.toString(),
        });

        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.text();
        console.log(data); // For debugging, you can log the response from the server
        // Update the cart display

    } catch (error) {
        console.error('Error adding to cart:', error);
        alert('Error adding to cart');
    }
}

