document.addEventListener("DOMContentLoaded", function () {
    var contactusImg = document.querySelector('.contactus-img img');

    contactusImg.addEventListener('click', function () {
        // Toggle the 'zoomed' class to apply or remove zoom styles
        this.classList.toggle('zoomed');
    });
});
