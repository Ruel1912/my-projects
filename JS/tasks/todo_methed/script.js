const todoForm = document.querySelector('#form-todo');
const author = document.querySelector('#author');
const post = document.querySelector('#post');
const todoTitle = document.querySelector('.todo__title');
const todo__list = document.querySelector('.todo__list');


const base = {
    employee: 'Петров Сергей Иванович',
    todo: getTodo(),
    check(id) {
        for (const todoItem of base.todo) {
            if (todoItem.id === id) {
                todoItem.ready = true;
            }
        }
    },
    addTodo(author, post) {
        const todo = {
            id: `td${base.todo.length + 1}`,
            author,
            post,
            ready: false
        }
        base.todo.push(todo);

        return todo;
    }
}

const addTodo = (e) => {
    e.preventDefault();
    
    const authorText = author.value;
    const postText = post.value;
    const objTodo = base.addTodo(authorText, postText);
    const todoItem = createTodo(objTodo);
    todo__list.append(todoItem);
    setTodo();
    document.querySelector('.todo__count').textContent = todo__list.querySelectorAll('li').length;
    todoForm.reset();
}

const createTodo = (objTodo) => {
    const todoItem = `
            <article class="post ${objTodo.ready ? "post_complete" : ""}">
                <h3 class="post__author">${objTodo.author}</h3>
                <p class="post__todo">${objTodo.post}</p>
                ${!objTodo.ready ?
                `<button class="post__ready" type="button" data-id="${objTodo.id}">✔</button>` : ''
                }
            </article>
        `;
    
    const li = document.createElement('li');
    li.classList.add('todo__list-item');
    li.innerHTML = todoItem;
    
    return li;

}

const renderTodo = () => {
    for (let i = 0; i < base.todo.length; i++) {
        const todoItem = createTodo(base.todo[i]);
        todo__list.append(todoItem);
    }
}

const checkTodo = (e) => {
    const btn = e.target.closest('.post__ready');

    if (btn) {
        const post = btn.closest('.post');
        post.classList.add('post_complete');
        const id = btn.dataset.id;
        base.check(id);
        btn.remove();
        setTodo();
        
    }
}
const getTodo = () => {
    if (localStorage.getItem('todo')) {
        return JSON.parse(localStorage.getItem)
    }

    return [];
}
const setTodo = () => {
    localStorage.setItem('todo', JSON.stringify(base.todo));
}
renderTodo();

todoForm.addEventListener('submit', addTodo);
todo__list.addEventListener('click', checkTodo);