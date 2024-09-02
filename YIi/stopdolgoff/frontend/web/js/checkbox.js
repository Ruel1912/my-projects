const checkboxes = document.querySelectorAll('.custom-checkbox input[type="checkbox"]');

checkboxes.forEach((checkbox) => {
    const icon = checkbox.nextElementSibling;
    const label = icon.nextElementSibling;

    checkbox.addEventListener('change', () => {
        icon.classList.toggle('checked');
        label.classList.toggle('checked');
    });
});