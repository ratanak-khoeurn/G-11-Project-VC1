document.addEventListener('DOMContentLoaded', function () {
    const search_product = document.querySelector('.search_btn');
    const products = document.querySelectorAll('tbody tr');

    search_product.addEventListener('input', function () {
        const search_item = search_product.value.trim().toLowerCase();

        products.forEach(function (product) {
            const product_name = product.querySelector('td:nth-child(2)').textContent.toLowerCase();

            if (product_name.includes(search_item)) {
                product.style.display = 'table-row';
            } else {
                product.style.display = 'none';
            }
        });
    });
});
