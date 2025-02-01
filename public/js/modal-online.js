document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("[data-bs-target='#servicesModal']").forEach(button => {
        button.addEventListener("click", function (event) {
            event.preventDefault(); // Предотвращаем стандартное действие
            let modal = new bootstrap.Modal(document.getElementById("servicesModal"));
            modal.show();
        });
    });
});
function openServicesModal() {
    var appointmentModal = new bootstrap.Modal(document.getElementById('appointmentModal'));
    var servicesModal = new bootstrap.Modal(document.getElementById('servicesModal'));

    appointmentModal.hide(); // Закрываем текущее окно
    setTimeout(() => {
        servicesModal.show(); // Открываем новое окно после закрытия старого
    }, 300);
}
