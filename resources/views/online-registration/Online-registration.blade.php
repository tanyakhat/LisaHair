<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Онлайн-запись</title>
    <link rel="stylesheet" href="{{ asset('css/modal-online.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="modal custom-side-modal" id="appointmentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog custom-side-modal-dialog">
        <div class="modal-content custom-side-modal-content">
            <div class="modal-header custom-side-modal-header">
                <button type="button" class="btn-close" onclick="closeSideModal()" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <h5 class="modal-title">Онлайн-запись в студию Лиса</h5>
            </div>
            <div class="modal-body custom-side-modal-body">
                <div class="selection-group">
                    <button class="btn btn-primary custom-btn" onclick="toggleList('servicesList')">
                        Выбрать услугу <i class="fa-solid fa-chevron-down"></i>
                    </button>

                    <div class="filter-buttons" style="margin-left: 12px;">
                        <button class="btn btn-secondary" style="font-size: 12px" onclick="filterServices('all')">Все</button>
                        <button class="btn btn-secondary" style="font-size: 12px" onclick="filterServices('Наращивание')">Наращивание</button>
                        <button class="btn btn-secondary" style="font-size: 12px" onclick="filterServices('Реконструкция')">Реконструкция</button>
                    </div>

                    <!-- Поле для поиска услуг -->
                    <input type="text" id="searchInput" placeholder="Поиск услуги..."
                           onkeyup="searchServices()" style="margin-top: 10px; width: 50%; padding: 5px;
                            margin-left: 10px; border-radius: 10px">

                    <ul id="servicesList" class="selection-list" style="display: none;">
                        @foreach($services as $service)
                            <li class="service-item" data-category="{{ $service->category->name ?? 'unknown' }}"
                                onclick="selectOption({{ $service->name }}, {{ $service->id }})">
                                {{ $service->name }}
                                <input type="radio" class="form-check-input" name="service-name" value="{{ $service->id }}">
                                <p style="font-size: 10px; color: #8c8c8c">{{ $service->description }}</p>
                            </li>
                        @endforeach
                    </ul>

                </div>

                <div class="selection-group" style="margin-top: 20px;">
                    <button class="btn btn-primary custom-btn" onclick="toggleList('employeesList')">
                        Выбрать сотрудника <i class="fa-solid fa-chevron-down"></i>
                    </button>

                    <!-- Поле для поиска сотрудников -->
                    <input type="text" id="employeeSearchInput" placeholder="Поиск сотрудника..."
                           onkeyup="searchEmployees()" style="margin-top: 10px; width: 50%;
                           padding: 5px; margin-left: 10px; border-radius: 10px">

                    <ul id="employeesList" class="selection-list" style="display: none;">
                        @foreach($employees as $employee)
                            <li class="employee-item" onclick="selectOption({{ $employee->name }}, {{ $employee->id }})">
                                {{ $employee->name }}
                                <input type="radio" class="form-check-input" name="employee-name" value="{{ $employee->id }}">
                                <p style="font-size: 10px; color: #8c8c8c">{{ $employee->employee_position }}</p>
                            </li>
                        @endforeach
                    </ul>

                    <p id="selectedEmployee" class="selected-option">Не выбрано</p>
                </div>

                <input type="hidden" id="selectedServiceId" name="service_id">
                <input type="hidden" id="selectedEmployeeId" name="employee_id">


            </div>
        </div>

    </div>
</div>

<script>
    function toggleList(listId) {
        let list = document.getElementById(listId);
        list.style.display = list.style.display === 'none' ? 'block' : 'none';
    }

    function selectOption(displayId, value, hiddenId, hiddenValue) {
        document.getElementById(displayId).textContent = value;
        document.getElementById(hiddenId).value = hiddenValue;
        console.log(`Выбрано: ${value} (ID: ${hiddenValue})`); // Для отладки
    }

    // / Фильтр /
    function filterServices(category) {
        console.log("Фильтр категории:", category); // Для отладки
        let services = document.querySelectorAll('.service-item');

        services.forEach(service => {
            let serviceCategory = service.getAttribute('data-category')?.toLowerCase(); // Привести к нижнему регистру
            if (category === 'all' || serviceCategory === category.toLowerCase()) {
                service.style.display = 'block';
            } else {
                service.style.display = 'none';
            }
        });
    }

    // / Поиск услуг /
    function searchServices() {
        const input = document.getElementById('searchInput');
        const filter = input.value.toLowerCase();
        const services = document.querySelectorAll('.service-item');

        services.forEach(service => {
            const text = service.textContent.toLowerCase();
            if (text.includes(filter)) {
                service.style.display = 'block';
            } else {
                service.style.display = 'none';
            }
        });
    }

    // / Поиск сотрудников /
    function searchEmployees() {
        const input = document.getElementById('employeeSearchInput');
        const filter = input.value.toLowerCase();
        const employees = document.querySelectorAll('.employee-item');

        employees.forEach(employee => {
            const text = employee.textContent.toLowerCase();
            if (text.includes(filter)) {
                employee.style.display = 'block';
            } else {
                employee.style.display = 'none';
            }
        });
    }

</script>
</body>
</html>
