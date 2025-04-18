radioButton = document.querySelectorAll('input[type=radio]');
form = document.querySelector('form');

function fetchFilter(data) {
    fetch('/vehicules/filter', {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Erreur réseau');
            }
            return response.json();
        })
        .then(data => {
            let container = document.querySelector('#containerVehicules');
            container.innerHTML = '';

            data.forEach(vehicule => {
                container.innerHTML += `
            <div class="w-3/10 p-4 m-4 bg-[#FAFAFA] rounded-2xl flex flex-col capitalize">
                <img src="${vehicule.photo}" alt="${vehicule.model}">
                <div>
                    <div class="flex justify-between">
                        <div>
                            <h4 class="text-2xl font-bold">${vehicule.brand}</h4>
                            <p>${vehicule.vehicule_type}</p>
                        </div>
                        <div>
                            <p class="text-[#5937E0] font-bold text-2xl">$ ${vehicule.price_per_day}</p>
                            <p>per day</p>
                        </div>
                    </div>
                    <div class="mt-5 flex justify-between">
                        <p>${vehicule.transmission}</p>
                        <p>${vehicule.fuel_type}</p>
                        <p>${vehicule.air_conditionne}</p>
                    </div>
                </div>
                <a href="/vehicules/${vehicule.id}" class="bg-[#5937E0] text-white text-center rounded-xl py-2 mt-5">view details</a>
            </div>
        `;
            })
        })
        .catch(error => {
            console.error('Erreur:', error);
        });

}

radioButton.forEach((radioButton) => {
    radioButton.addEventListener('change', e => {
        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());
        fetchFilter(data);
    });
});
