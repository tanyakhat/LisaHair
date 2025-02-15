<header>
    <div class="header-container">
        <div class="language-switcher">
            <button class="language-btn" id="switchToRu">RU</button>
            <button class="language-btn" id="switchToEn">EN</button>
        </div>
        <div class="header-icons">
            <a href="https://t.me/+re-vXHMWZhk3NDhi" target="_blank">
                <img src="{{ asset('img/logo/telegram.png') }}" alt="Telegram" data-lang="ru" data-text="telegram">
            </a>
            <a href="https://www.instagram.com/lisa___hair?igsh=aHR6MmR2YzcyM2pv" target="_blank">
                <img src="{{ asset('img/logo/instagram.png') }}" alt="Instagram" data-lang="ru" data-text="instagram">
            </a>
            <a href="https://wa.me/+79244039330" target="_blank">
                <img src="{{ asset('img/logo/whatsapp.png') }}" alt="WhatsApp" data-lang="ru" data-text="whatsapp">
            </a>
        </div>

        <div class="header-logo-container">
            <img src="{{ asset('img/logo/logo.png') }}" alt="Logo" class="logo-img">
        </div>

        <div class="header-info">
            <a class="header-number" href="tel:+79244039330" data-lang="ru" data-text="phone">+7(924)403-93-30</a>
            <p class="header-operating-mode" data-lang="ru" data-text="schedule">Режим работы студии с 9:00 до 21:00</p>
        </div>
    </div>

    <div class="header-studio">
        <p data-lang="ru" data-text="studio">Студия наращивания <br> и ухода за волосами</p>
        <div class="arrow-container">
            <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                 viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="2 2 12 10 22 2"></polyline>
            </svg>
        </div>
        <section class="button">
            <div class="button-container">
                <button class="custom-button" type="button" onclick="openSideModal()" data-lang="ru" data-text="appointment">Онлайн-запись</button>
                <a class="custom-button" href="https://wa.me/+79244039330" target="_blank" style="text-decoration: none" data-lang="ru" data-text="whatsappButton">
                    Написать в WhatsApp
                </a>
            </div>
        </section>
    </div>
</header>


<script>
    function openSideModal() {
        let modal = document.getElementById('appointmentModal');
        modal.classList.add('show');  // Показать модальное окно
        modal.style.display = 'block';  // Обеспечить отображение окна
    }

    function closeSideModal() {
        let modal = document.getElementById('appointmentModal');
        modal.classList.remove('show');  // Скрыть модальное окно
        modal.style.display = 'none';  // Скрыть окно
    }

    // Закрыть модальное окно при клике вне его
    document.addEventListener('click', function (event) {
        document.getElementById('appointmentModal');
        if (event.target.matches('.custom-side-modal') || event.target.matches('.btn-close')) {
            closeSideModal();
        }
    });


</script>
