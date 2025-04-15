let form = document.querySelector('form');

function sendDatabase(data) {
    fetch('/reservation', {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    })
        .then(response => {
            if (response.status === 422) {
                return response.json();
            }
            if (!response.ok) {
                return response.json().then(json => {
                    throw new Error(json.message || 'Erreur réseau');
                });
            }
            return response.json();
        })
        .then(json => {
            let containerResponse = document.querySelector('#info');
            containerResponse.innerHTML = "";
            if (json.success) {
                let pSuccess = document.createElement('p');
                pSuccess.textContent = json.success;
                pSuccess.classList.add('bg-green-200', 'border', 'border-green-500', 'rounded-2xl', 'p-3');
                containerResponse.append(pSuccess);
            }
            if (json.errors) {
                for (const field in json.errors) {
                    json.errors[field].forEach((errorMessage) => {
                        const errorElement = document.createElement('div');
                        errorElement.textContent = errorMessage;
                        errorElement.classList.add('bg-red-200', 'border', 'border-red-500', 'rounded-2xl', 'p-3', 'mb-2');
                        containerResponse.appendChild(errorElement);
                    });
                }
            }
        })
        .catch(error => {
            console.error('Erreur :', error);
        });
}

form.addEventListener('submit', (e) => {
    e.preventDefault();
    let formData = new FormData(form);
    let data = {};
    formData.forEach((value, key) => {
        data[key] = value;
    });
    sendDatabase(data);
});
