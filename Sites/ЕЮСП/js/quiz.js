function checkInputs(inputs, courseBlock, next) {
    let areAllTextFieldsFilled = Array.from(inputs).filter(
        (input) => input.type !== "radio"
    ).length
        ? false
        : true;
    let areAllRadioGroupsChecked = Array.from(inputs).filter(
        (input) => input.type === "radio"
    ).length
        ? false
        : true;

    const textFields = Array.from(inputs).filter(
        (input) => input.type != "radio"
    );
    const radioGroups = Array.from(courseBlock.querySelectorAll(".radio"));
    areAllRadioGroupsChecked = radioGroups.every((group) => {
        const radios = group.querySelectorAll('input[type="radio"]');
        return Array.from(radios).some((radio) => radio.checked);
    });
    areAllTextFieldsFilled = textFields.every(
        (field) => field.value.trim() !== ""
    );
    if (areAllRadioGroupsChecked && areAllTextFieldsFilled) {
        next.disabled = false;
    } else {
        next.disabled = true;
    }
}

document.addEventListener("DOMContentLoaded", () => {
    const courseBlocks = document.querySelectorAll(".quiz__item");
    // const quizSlogan = document.querySelector(".quiz-slogan");
    courseBlocks.forEach((courseBlock, index) => {
        const inputs = courseBlock.querySelectorAll("input");
        const next = courseBlock.querySelector(".next").parentNode;
        courseBlock.addEventListener("click", (e) => {
            if (e.target.classList.contains("next") && e.target.parentNode.disabled == false) {
                // index === 0 && quizSlogan.classList.add("hide");
                if (index !== courseBlocks.length - 1) {
                    courseBlocks[index + 1].classList.add("quiz__active");
                    courseBlock.classList.remove("quiz__active");
                } else {
                    courseBlocks[0].classList.add("quiz__active");
                    courseBlock.classList.remove("quiz__active");
                }
            }

            if (e.target.classList.contains("back") && e.target.parentNode.disabled == false) {
                // index === 1 && quizSlogan.classList.remove("hide");
                courseBlock.classList.remove("quiz__active");
                courseBlocks[index - 1].classList.add("quiz__active");
            }
        });

        if (inputs.length) {
            inputs.forEach((input) => {
                input.addEventListener("input", () => {
                    checkInputs(inputs, courseBlock, next);
                });
                input.addEventListener("change", () => {
                    checkInputs(inputs, courseBlock, next);
                });
            });
        }
    });
});
