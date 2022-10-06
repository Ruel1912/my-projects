const pages = document.querySelectorAll('.page');
const radioButtons = document.querySelectorAll('.radio');
const fakeRadios = document.querySelectorAll('.fake-radio');
const fakeCircles = document.querySelectorAll('.fake-circle');
const inputs = document.querySelectorAll('.input input');

const galleryRadios = document.querySelectorAll('.gallery-radio');
const galleryCircles = document.querySelectorAll('.gallery-circle');
const galleryItems = document.querySelectorAll('.gallery-item');
const galleryInfo = document.querySelectorAll('.gallery__info');
const galleryInputs = document.querySelectorAll('.gallery-input');
const galleryTitles = document.querySelectorAll('.info__title');

const vw = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);

const clearActiveClasses = () => {
    for(let i = 0; i < radioButtons.length; i++) {
		radioButtons[i].classList.remove('border');
		fakeRadios[i].classList.remove('border');
		fakeCircles[i].classList.remove('circle');
	}
}

const clearActiveClassesInGallery = () => {
    for(let i = 0; i < galleryItems.length; i++) {
			galleryItems[i].classList.remove('border');
			galleryRadios[i].classList.remove('border');
			galleryCircles[i].classList.remove('circle');
			galleryTitles[i].classList.remove('yellow');
	}
}

const clearPage = () => {
	for (let i = 0; i < pages.length; i++) {
		pages[i].classList.remove('page-active');
	}
}

for (let i = 0; i < pages.length; i++) {
	pages[i].addEventListener('click', event => {
		if (i !== pages.length - 1) {
			if (event.target.classList.contains('border-next') || event.target.classList.contains('button-next')) {
				event.preventDefault();
				pages[i].classList.add('next-page');
				if (vw < 600) {
					clearPage();
					pages[i + 1].classList.add('page-active');
					pages[i].style.marginTop = `-${pages[i].clientHeight}px`;
				}	
			}
		}

		if (event.target.classList.contains('arrow-back')) {
				event.preventDefault();
				pages[i - 1].classList.remove('next-page');	
				if (vw < 480) {
					clearPage();
					pages[i - 1].classList.add('page-active');
					pages[i - 1].style.marginTop = 0;
				}
		}
	})
}

for (let i = 0; i < pages.length; i++) {
	pages[i].addEventListener('click', event => {
		if (i !== pages.length - 1) {
			if (event.target.classList.contains('border-next') || event.target.classList.contains('button-next')) {
				event.preventDefault();
				pages[i].classList.add('next-page');		
			}
		}

		if (event.target.classList.contains('arrow-back')) {
				event.preventDefault();
				pages[i - 1].classList.remove('next-page');	
		}
	})

	
}

document.querySelector('#email1').addEventListener('change', () => {
		document.querySelector('#email2').value = document.querySelector('#email1').value
	}
)

for(let i = 0; i < radioButtons.length; i++) {
	radioButtons[i].addEventListener('click', () => {
			clearActiveClasses();
			inputs[i].checked = true;
			radioButtons[i].classList.add('border');
			fakeRadios[i].classList.add('border');
			fakeCircles[i].classList.add('circle');
	})
}


for(let i = 0; i < galleryItems.length; i++) {
	galleryItems[i].addEventListener('click', () => {
			clearActiveClassesInGallery();
			galleryInputs[i].checked = true;
			galleryItems[i].classList.add('border');
			galleryRadios[i].classList.add('border');
			galleryCircles[i].classList.add('circle');
			galleryTitles[i].classList.add('yellow');
	})
}
