document.querySelectorAll('.addToCart').forEach(function (button) {
    button.addEventListener('click', function (event) {
        // Prevent the default action
        event.preventDefault();

        var productId = button.getAttribute('data-product-id')
        var productName = button.previousElementSibling.innerHTML

        var Product

        const productData = new URLSearchParams({
            id: productId,
            Name: productName
        });
        postJSON(productData,productName);
    });
});

async function postJSON(Productdata,Productname) {
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

        const elements = document.getElementsByClassName('cart');

        if (elements.length == 0) {
            console.log("The class 'yourClassName' does not have any elements inside.");
        } else {
            console.log("The class 'yourClassName' has elements inside.");
        }

        [...document.getElementsByClassName('updateCartAmount')].forEach(amount => {
            var productN = meow.previousElementSibling.innerHTML
            console.log('meow meow meow')
          if(productN == Productname){
            var currentAmount = amount.innerHTML
            let newAmount = parseInt(currentAmount) + 1
            amount.innerHTML = newAmount
          }
        });

    } catch (error) {
        console.error('Error adding to cart:', error);
        alert('Error adding to cart');
    }
}

