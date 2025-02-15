document.addEventListener("DOMContentLoaded", () => {
    const slides = document.querySelectorAll(".stock_slide");
    const slidesContainer = document.querySelector(".slides");
    const pagination = document.querySelector(".pagination");

    let currentIndex = 0;
    let interval;

    // Создаем индикаторы
    slides.forEach((_, index) => {
        const dot = document.createElement("span");
        dot.addEventListener("click", () => goToSlide(index));
        pagination.appendChild(dot);
    });

    function updateSlider() {
        slidesContainer.style.transform = `translateX(-${currentIndex * 100}%)`;
        document.querySelectorAll(".pagination span").forEach((dot, index) => {
            dot.classList.toggle("active", index === currentIndex);
        });
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % slides.length;
        updateSlider();
    }

    function goToSlide(index) {
        currentIndex = index;
        updateSlider();
        restartAutoSlide();
    }

    function restartAutoSlide() {
        clearInterval(interval);
        interval = setInterval(nextSlide, 5000);
    }

    // Запуск авто-слайдера
    restartAutoSlide();

    // Свайп (мобильные устройства)
    let startX = 0;
    let isSwiping = false;

    slidesContainer.addEventListener("touchstart", (e) => {
        startX = e.touches[0].clientX;
        isSwiping = true;
    });

    slidesContainer.addEventListener("touchmove", (e) => {
        if (!isSwiping) return;
        let diffX = e.touches[0].clientX - startX;

        if (diffX > 50) {
            currentIndex = currentIndex > 0 ? currentIndex - 1 : slides.length - 1;
            updateSlider();
            restartAutoSlide();
            isSwiping = false;
        } else if (diffX < -50) {
            nextSlide();
            restartAutoSlide();
            isSwiping = false;
        }
    });

    slidesContainer.addEventListener("touchend", () => {
        isSwiping = false;
    });
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

document.addEventListener("DOMContentLoaded", function() {
    document.querySelector(".header-container").style.animationDelay = "0.1s";
    document.querySelector(".header-studio").style.animationDelay = "0.2s";
    document.querySelector(".services-section").style.animationDelay = "0.3s";
    document.querySelector(".stock_info").style.animationDelay = "0.3s";
    document.querySelector(".Masters-lisa").style.animationDelay = "0.3s";
    document.querySelector(".questions").style.animationDelay = "0.3s";
});

/*Плавный скролл мышкой*/
let scrollSpeed = 0.05; // Скорость прокрутки (0.05 - плавно, 0.1 - быстрее)
let currentScroll = 0;
let targetScroll = 0;

window.addEventListener("wheel", function (e) {
    targetScroll += e.deltaY; // Учитывает движение колесика мыши
});

function smoothScroll() {
    currentScroll += (targetScroll - currentScroll) * scrollSpeed;
    window.scrollTo(0, currentScroll);
    requestAnimationFrame(smoothScroll);
}

smoothScroll(); // Запуск анимации
