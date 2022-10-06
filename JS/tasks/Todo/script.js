let descriptions = document.querySelectorAll('.description');
let newDescriptions = document.querySelectorAll('.new_description');
let newTitles = document.querySelectorAll('.new_title');
let headers = document.querySelectorAll('.header');
let updates = document.querySelectorAll('.update');
let checks = document.querySelectorAll('.check');


for (let i=0; i < document.querySelector('.list').children.length; i++){
    headers[i].onclick = function () {
        newTitles[i].classList.toggle('hidden');
        updates[i].classList.toggle('hidden');
    }

    descriptions[i].onclick = function () {
        newDescriptions[i].classList.toggle('hidden');
        updates[i].classList.toggle('hidden');
    }

    checks[i].onclick = function () {
        updates[i].classList.toggle('hidden');
    }
}





