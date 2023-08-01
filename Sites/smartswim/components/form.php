<form class="form">
    <input type="text" id="name" name="name" class="form-input" placeholder="Ваше имя" required="" minlength="2"
        maxlength="50" pattern="[A-Za-zА-Яа-яЁё\s]+">
    <input type="tel" name="phone" class="form-input phone" placeholder="Ваш номер телефона" required="">
    <input type="email" id="email" name="email" class="form-input" placeholder="Ваша почта" required="">
    <textarea name="message" class="form-input"
        placeholder="Ваш вопрос, предложение, замечание, комментарий"></textarea>
    <label class="custom-checkbox">
        <input type="checkbox" name="agree" class="form-agree" required="">
        <span class="checkbox-icon">

        </span>
        <span class="checkbox-label">Оставляя заявку на сайте, Вы соглашаетесь на
            <a href="/main/documents?name=Обработка конфиденциальности">обработку персональных данных</a>
        </span>
    </label>
    <button type="submit" class="send-button" disabled="">Отправить</button>
</form>