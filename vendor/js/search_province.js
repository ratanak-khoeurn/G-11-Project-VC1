function search_province(event) {
    let searchList = event.target.value.toLowerCase();
    let provinces = document.getElementsByClassName('custom-control-label');
    for (let province of provinces) {
        let title = province.textContent.toLowerCase();
        if (title.includes(searchList)) {
            province.parentElement.style.display = 'block';
        } else {
            province.parentElement.style.display = 'none';
        }
    }
}
let search_provinces = document.querySelector('.shadow-none');
search_provinces.addEventListener('keyup', search_province)


let all_provinces = document.querySelectorAll(".custom-control-input");

for (const province of all_provinces) {
    province.addEventListener("change", function () {
        let title = this.nextElementSibling.textContent.trim();
        let showed = document.querySelector(".feather-navigation");
        showed.textContent = " " + title;
        let province_choose = document.querySelector('.regoin');
        province_choose.textContent = showed.textContent;
    });

}
