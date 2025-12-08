document.addEventListener("DOMContentLoaded", function () {
    const stars = document.querySelectorAll(".star");
    const ratingInput = document.getElementById("ratingValue");

    stars.forEach((star) => {
        star.addEventListener("click", function () {
            let rating = parseInt(this.dataset.value);
            
            ratingInput.value = rating;

            stars.forEach((s) => {
                if (parseInt(s.dataset.value) <= rating) {
                    s.classList.remove("fa-star-o");
                    s.classList.add("fa-star");
                } else {
                    s.classList.remove("fa-star");
                    s.classList.add("fa-star-o");
                }
            });
        });
    });
});