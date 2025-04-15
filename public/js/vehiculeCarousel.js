let images = document.querySelectorAll('.img-carousel')
let body = document.querySelector('body')

function popUpCreate(imgSrc) {
    return `
    <div class="flex w-1/2 items-center">
        <div class="text-4xl size-15 bg-[#00000099] text-white rounded-full flex items-center justify-center previous">←</div>
        <img src="${imgSrc}" alt="" class="w-full">
        <div class="text-4xl size-15 bg-[#00000099] text-white rounded-full flex items-center justify-center next">→</div>
    </div>
    <div class="size-10 bg-[#00000099] text-white rounded-full flex items-center justify-center mt-70 cross">X</div>
    `
}

function showPopup(index) {
    let popUp = document.createElement('div');
    popUp.classList.add('absolute', 'top-0', 'left-0', 'bg-[#00000050]', 'w-screen', 'h-screen', 'flex', 'justify-center');
    popUp.innerHTML = popUpCreate(images[index].src);
    body.appendChild(popUp);

    popUp.querySelector('.cross').addEventListener('click', () => popUp.remove());

    popUp.querySelector('.next').addEventListener('click', () => {
        popUp.remove();
        let nextIndex = (index + 1) % images.length;
        showPopup(nextIndex);
    });

    popUp.querySelector('.previous').addEventListener('click', () => {
        popUp.remove();
        let prevIndex = (index - 1 + images.length) % images.length;
        showPopup(prevIndex);
    });
}

images.forEach((image, i) => {
    image.addEventListener('click', () => {
        showPopup(i);
    });
});
