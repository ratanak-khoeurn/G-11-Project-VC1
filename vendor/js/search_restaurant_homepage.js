document.addEventListener('DOMContentLoaded', function () {
    const search_product = document.querySelector('.search_btn');
    console.log(search_product);
    const products = document.querySelectorAll('#card');

    search_product.addEventListener('input', function () {
        const search_item = search_product.value.trim().toLowerCase();

        products.forEach(function (product) {
            const product_name = product.querySelector('h6').textContent.toLowerCase();
            console.log(product);
            if (product_name.includes(search_item)) {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });
    });
});
