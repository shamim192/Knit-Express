
function filterSelection(length, key) {

    for (let index = 0; index < length; index++) {
        if (index == key) {
            document.getElementById('category_img' + key).style.display = "unset";
        } else {
            document.getElementById('category_img' + index).style.display = "none";
        }

    }
}

function filterSelectionCat(length, key) {

    for (let index = 0; index < length; index++) {
        if (index == key) {
            document.getElementById('category_img_cat' + key).style.display = "unset";
        } else {
            document.getElementById('category_img_cat' + index).style.display = "none";
        }

    }
}

function hideFirstOpen() {

    document.getElementById('first-open').style.display = "none";
}

function hideFirstOpenCategory() {

    document.getElementById('first-open-category').style.display = "none";
}

