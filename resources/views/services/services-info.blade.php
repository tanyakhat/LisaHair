<section class="services-section">
    <div class="services-wrapper">
        <div class="services-content">
            <h2 style="text-align: center" data-lang="ru" data-text="lisa">
            Лиса - место, где мечты <br> становятся реальностью
            </h2>
            <h3 data-lang="ru" data-text="lisaInfo" > Поможем вам обрести густые и красивые <br> волосы</h3>
            <p data-lang="ru" data-text="lisaInfoMaterials">
            Работаем только с качественными материалами, <br> через руки наших мастеров прошло
            >5.000 девушек. <br> В нашей студии прошли обучение более 100 учеников.
            </p>
            <hr>

        <div class="button-container-vertical">
            <input class="custom-button-vertical" type="button"  data-lang="ru" data-text="PriceServices" value="Прайс на услуги"
                  onclick="showPrices()" />

            <div class="img-container" >
            <img id="build-up" src="{{ asset('img/price/price_yslugi.jpg') }}" style="display: none;"
                 alt="Прайс на наращивание"/>
            <img id="reconstruction" src="{{ asset('img/price/keratin.jpg') }}" style="display: none"
                 alt="Прайс на кератиновое выпрямление"/>
            <img id="botox" src="{{ asset('img/price/botox.jpg') }}" style="display: none"
                 alt="Прайс на ботокс"/>
            </div>
            <input class="custom-button-vertical" type="button" data-lang="ru" data-text="Turbo Solarium" value="Turbo солярий"
                   onclick="TurboPrices()"/>

            <img id="turbo-sol" src="{{ asset('img/price/price_turbo_so.jpg') }}" style="display: none; max-width: 320px;
             " alt="Turbo солярий"/>

            <button class="custom-button-vertical" data-lang="ru" data-text="Training">Обучения</button>
        </div> <hr>
            </div>
        </div>
    </section>

{{--Скрипт для картинок прайса--}}
<script>
    function TurboPrices() {
        const images = document.querySelectorAll('#turbo-sol');
        images.forEach(img => {
            img.style.display = img.style.display === 'none' ? 'block' : 'none';
        });
    }

    function showPrices() {
        const images = document.querySelectorAll('#build-up, #reconstruction, #botox');
        images.forEach(img => {
            img.style.display = img.style.display === 'none' ? 'block' : 'none';
        });
    }

</script>

