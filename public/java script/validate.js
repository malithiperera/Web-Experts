const productId = document.getElementById("input_productId")            // view_stockmanager_addproduct
const productName = document.getElementById("input_productName")
const description = document.getElementById("input_description")
const price = document.getElementById("input_price")
const form = document.getElementById("productForm")
const errorElement = document.getElementById("error")

form.addEventListener ('submit', (e) => {
    // let message = []
    // if (productId.value === '' || productId.value == null) {
    //     message.push ("Enter a product ID")

    // }
    // if (productName.value === '' || productName.value == null) {
    //     message.push ("Name is essential")

    // }
    // if (description.value === '' || description.value == null) {
    //     message.push ("Enter a description")

    // }
    // if (price.value == null) {
    //     message.push ("Enter the price")

    // }
    // if (message.length > 0) {
    //     e.preventDefault ()
    //     errorElement.innerText = message.join (', ')

    // }
    e.preventDefault()
    validateInputs ()

})

const setError = (element, message) => {
    const inputControl = element.parentElement
    const errorDisplay = inputControl.querySelector ('.error')

    errorDisplay.innerText = message
    inputControl.classList.add ('success')
    inputControl.classList.remove ('error')

}

const setSuccess = element => {
    const inputControl = element.parentElement
    const errorDisplay = inputControl.querySelector('.error')

    errorDisplay.innerText = ''
    inputControl.classList.add('success')
    inputControl.classList.remove('error')

}

const validateInputs = () => {
    const productIdValue = productId.value.trim ()
    const productNameValue = productName.value.trim ()
    const descriptionValue = description.value.trim ()
    const priceValue = price.value.trim ()

    if (productIdValue === '') {                                // validate product id
        setError(input_productId, 'Enter the product Id')

    } else {
        setSuccess (input_productId)

    }           
    if (productNameValue === '') {                              // validate the product name
        setError(input_productName, 'Enter the product name')

    } else {
        setSuccess (input_productName)

    }
    if (descriptionValue === '') {
        setError(input_description, 'Enter the description')    // validate the description

    } else {
        setSuccess (input_description)

    }
    if (priceValue === '') {                                    // validate the description
        setError (input_price, 'Enter the price')               

    } else {
        setSuccess (input_price)
        
    }
}