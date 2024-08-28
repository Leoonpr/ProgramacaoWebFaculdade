let products = [];

const productForm = document.getElementById('productForm');
const productList = document.getElementById('productList');

function addProduct(event) {
    event.preventDefault();

    const productName = document.getElementById('productName').value;
    const productDescription = document.getElementById('productDescription').value;
    const productValue = parseFloat(document.getElementById('productValue').value);
    const availableForSale = document.getElementById('availableForSale').value;

    const product = {
        name: productName,
        description: productDescription,
        value: productValue,
        available: availableForSale === 'sim' ? true : false
    };
    products.push(product);
    products.sort((a, b) => a.value - b.value);
    productForm.reset();
    displayProducts();
}

function displayProducts() {
    productList.innerHTML = '';
    products.forEach(product => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${product.name}</td>
            <td>R$ ${product.value}</td>
        `;
        productList.appendChild(row);
    });
}

productForm.addEventListener('submit', addProduct);
displayProducts();