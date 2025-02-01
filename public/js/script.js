/*Слайдер акции*/
document.addEventListener("DOMContentLoaded", () => {
    const slides = document.querySelectorAll(".stock_slide");
    const slidesContainer = document.querySelector(".slides");
    let currentIndex = 0;

    function updateSlider(index) {
        // Сдвигаем слайды
        slidesContainer.style.transform = `translateX(-${index * 100}%)`;
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % slides.length;
        updateSlider(currentIndex);
    }

    // Автопереключение каждые 5 секунд
    setInterval(nextSlide, 5000);
});


/*Раскрытие деталей*/
document.addEventListener("DOMContentLoaded", () => {
    const buttons = document.querySelectorAll(".details-btn");

    buttons.forEach((button) => {
        button.addEventListener("click", (e) => {
            const info = e.target.closest(".master").querySelector(".info");
            info.classList.toggle("expanded");

            // Меняем текст кнопки
            e.target.textContent = info.classList.contains("expanded") ? "▲" : "▼";
        });
    });
});

/*Для вопросов и ответов*/
document.addEventListener("DOMContentLoaded", () => {
    const faqItems = document.querySelectorAll(".faq-items");

    faqItems.forEach((item) => {
        const question = item.querySelector(".faq-questions");
        question.addEventListener("click", () => {
            item.classList.toggle("expanded"); // Добавляем/убираем класс
        });
    });
});
