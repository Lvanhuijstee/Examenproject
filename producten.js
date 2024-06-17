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
        postJSON(productData, productName);
    });
});

async function postJSON(Productdata, Productname) {
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

        var cart = document.querySelector('#cart');
        var childElements = cart.querySelectorAll('.updateCartName');
        var childElementsArray = Array.from(childElements);
        
        var childnames = Array()

        for(var i = 0; i < childElementsArray.length; i++){
            childnames.push(childElementsArray[i].innerHTML);
        }
        
        

        if (!childnames.includes(Productname) ) {
            const parent = document.getElementById('cart');
            const newP = document.createElement("p");
            var br = document.createElement("br");
            var br2 = document.createElement("br");
            newP.className = 'updateCartName';
            newP.innerHTML = Productname;
            const newP2 = document.createElement("p");
            newP2.className = 'updateCartAmount';
            newP2.innerHTML = " "+'1';

            parent.appendChild(newP)
            parent.appendChild(newP2)
            newP2.appendChild(br);
            newP2.appendChild(br2);
        } else {
            [...document.getElementsByClassName('updateCartAmount')].forEach(amount => {
                var productN = amount.previousElementSibling.innerHTML
                if (productN == Productname) {
                    var currentAmount = amount.innerHTML
                    let newAmount = parseInt(currentAmount) + 1
                    amount.innerHTML = " " + newAmount
                    var br = document.createElement("br");
                    var br2 = document.createElement("br");
                    amount.appendChild(br);
                    amount.appendChild(br2);

                }
            });
        }

    } catch (error) {
        console.error('Error adding to cart:', error);
        alert('Error adding to cart');
    }
}

