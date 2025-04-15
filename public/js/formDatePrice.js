document.addEventListener('DOMContentLoaded', function () {
    function createError(message) {
        let containerError = document.querySelector('#contain_error')
        containerError.innerHTML = '';
        if (message) {
            let errorElement = document.createElement('div')
            errorElement.classList.add('bg-red-200', 'border', 'border-red-500', 'rounded-2xl', 'p-3')
            errorElement.innerHTML = `<p>${message}</p>`
            containerError.appendChild(errorElement)
        }
    }

    function spawnPrice(error = "") {
        let pPrice = document.querySelector('#price')
if (error) {
    return pPrice.innerText = ''
}
        let dif = new Date(document.querySelector('#endDate').value) - new Date(document.querySelector('#startDate').value);

        dif = Math.ceil(dif / 86400000) + 1
        pPrice.textContent = `${pricePerDay * dif} $ for ${dif} days`
    }

    let reservedDates = dates;
    let today = new Date().toISOString().split('T')[0];
    document.querySelector('#startDate').value = today;
    document.querySelector('#endDate').value = today;
    flatpickr("#startDate", {
        minDate: today,
        disable: reservedDates,
        onChange: function (selectedDates, dateStr, instance) {
            if (reservedDates.includes(dateStr)) {
                instance.clear();
                spawnPrice('error')
                createError("Cette date est déjà réservée. Veuillez choisir une autre date.");
            }
            validateDates();
        },
        dateFormat: "Y-m-d",
    });
    flatpickr("#endDate", {
        minDate: today,
        disable: reservedDates,
        onChange: function (selectedDates, dateStr, instance) {
            if (reservedDates.includes(dateStr)) {
                instance.clear();
                spawnPrice('error')
                createError("Cette date est déjà réservée. Veuillez choisir une autre date.");
            }
            validateDates();
        },
        dateFormat: "Y-m-d",
    });

    function validateDates() {
        let startDateValue = document.querySelector('#startDate').value;
        let endDateValue = document.querySelector('#endDate').value;
        if (startDateValue && endDateValue) {
            let startDate = new Date(startDateValue);
            let endDate = new Date(endDateValue);
            if (startDate >= endDate) {
                document.getElementById('endDate').value = '';
                spawnPrice('error')
                return createError("La date de fin doit être après la date de début.");
            } else {
                for (let i = 0; i < reservedDates.length; i++) {
                    let reservedDate = new Date(reservedDates[i]);
                    if ((startDate <= reservedDate && endDate >= reservedDate)) {
                        document.getElementById('startDate').value = '';
                        document.getElementById('endDate').value = '';
                        spawnPrice('error')
                        return createError("Le créneau que vous avez sélectionné chevauche une réservation existante. Veuillez choisir un autre créneau.");
                    }
                }
            }
        }
        createError('')
        spawnPrice('')
    }
});
