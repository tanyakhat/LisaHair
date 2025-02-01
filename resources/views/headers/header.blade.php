<header>
    <img src="{{asset('img/logo/logo.png')}}" alt="Логотип Lisa">
    <p>Студия наращивания <br> и ухода за волосами</p>
    <div class="arrow-container">
        <svg style="margin: 10px" class="arrow-svg" xmlns="http://www.w3.org/2000/svg" width="50" height="50"
             viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="2 2 12 10 22 2"></polyline>
        </svg>
    </div>
    <section class="button">
        <div class="button-container">
            <button class="custom-button" type="button" onclick="openSideModal()">Онлайн-запись</button>
            <a class="custom-button" href="https://wa.me/+79244039330" target="_blank" style="text-decoration: none">
                Написать в WhatsApp
            </a>
        </div>
    </section>
</header>
<script>
    function openSideModal() {
        var modal = document.getElementById('appointmentModal');
        modal.classList.add('show');  // Показать модальное окно
        modal.style.display = 'block';  // Обеспечить отображение окна
    }

    function closeSideModal() {
        var modal = document.getElementById('appointmentModal');
        modal.classList.remove('show');  // Скрыть модальное окно
        modal.style.display = 'none';  // Скрыть окно
    }

    // Закрыть модальное окно при клике вне его
    document.addEventListener('click', function (event) {
        var modal = document.getElementById('appointmentModal');
        if (event.target.matches('.custom-side-modal') || event.target.matches('.btn-close')) {
            closeSideModal();
        }
    });


</script>
