const productId = document.getElementById("input_productId")            // view_stockmanager_addproduct
const productName = document.getElementById("input_productName")
const description = document.getElementById("input_description")
const price = document.getElementById("input_price")
const form = document.getElementById("productForm")

form.addEventListener ('submit', (e) => {
    let message = []
    if (productId.value === '' || productId.value == null) {
        message.push ("Enter a product ID")

    }
    if (productName.value === '' || productName.value == null) {
        message.push ("Name is essential")

    }
    if (description.value === '' || description.value == null) {
        message.push ("Enter a description")

    }
    if (price.value == null) {
        message.push ("Enter the price")

    }
    if (message.length > 0) {
        e.preventDefault ()
        errorElement.innerText = message.join (', ')

    }
}
)