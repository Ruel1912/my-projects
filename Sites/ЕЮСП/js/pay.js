function pay(form) {
    const formName = form.querySelector("input[name='fio']");
    const formTel = form.querySelector("input[name='phone']");
    const formAmount = form.querySelector("input[name='amount']");
    const modalName = document.querySelector(".payment-modal input[name='fio']");
    const modalTel = document.querySelector(".payment-modal input[name='phone']");
    const modalAmount = document.querySelector(".payment-modal input[name='message[Сумма платежа]']");

    modalName.value = formName.value
    modalTel.value = formTel.value
    modalAmount.value = formAmount.value
    openModal(document.querySelector(".payment-modal"));
}