const fruits = [
    {id: 1, title: 'Яблоки', price: 20, img: 'https://catherineasquithgallery.com/uploads/posts/2021-03/1614553974_18-p-kartinka-yabloka-na-belom-fone-24.jpg'},
    {id: 2, title: 'Апельсины', price: 30, img: 'https://www.bingocardcreator.com/uploads/cardimages/561964b0888121f49daa61d674acb25f.jpg'},
    {id: 3, title: 'Манго', price: 40, img: 'http://srilanka-island.ru/uploads/posts/2017-09/1504298256_mango.jpg'},
];

fruits.forEach(item => {
    document.querySelector('.row').insertAdjacentHTML('beforeend', `
    <div class="col">
        <div class="card" style="width: 20rem;">
            <img src="${item.img}" class="card-img-top" alt="Яблоки" height="250px">
            <div class="card-body" data-id=${item.id}>
                <h5 class="card-title">${item.title}</h5>
                <a href="#" class="btn btn-primary open-modal">Посмотреть цену</a>
                <a href="#" class="btn btn-danger remove-card">Удалить</a>
            </div>
        </div>
    </div>
    `);
});

const myModal = $.modal({
    title: '',
    closable: true,
    content: '',
    width: '300px',
    footerButtons: [
        {text: 'Ok', type: 'primary', handler() {
            myModal.close();
        }},
    ]
}
);


const remove = (id) => {
    cols[id - 1].remove();
}

const openModal = (id) => {
    const cardImage = document.querySelectorAll('.card-img-top')[id - 1];
    const html = `
        <img height="200" src="${fruits[id - 1].img}" class="card-img-top" alt="${fruits[id - 1].title}">
        <h5 class="card-price">${fruits[id - 1].price}</h5>
    `
    myModal.setContent(html);
    myModal.setTitle(fruits[id - 1].title);
    myModal.open(); 
}

const cols = document.querySelectorAll('.col');
cols.forEach(col => {
    col.addEventListener('click', event => {
        const ID = event.target.parentNode.dataset.id;
        if (event.target.classList.contains('open-modal')) {
            openModal(ID);
        }
        if(event.target.classList.contains('remove-card')) {
            remove(ID);
        }
    })
})

