document.addEventListener("DOMContentLoaded", function () {
    const stars = document.querySelectorAll("#star-rating .star");
    const ratingInput = document.getElementById("starrating");

    stars.forEach(star => {
        star.addEventListener("click", function () {
            let value = this.getAttribute("data-value"); // Get the star's rating value
            ratingInput.value = value; // Store value in the input field

            // Remove 'selected' class from all stars
            stars.forEach(s => s.classList.remove("selected"));

            // Add 'selected' class to all stars up to the clicked one
            for (let i = 0; i < value; i++) {
                stars[i].classList.add("selected");
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    document.querySelector("#productReview").addEventListener('click', function (event) {
        event.preventDefault();
        document.querySelector("#CtSpinner").style.display = "block";
        var form = $("#reviewForm")[0];
        var reviewData = new FormData(form);
        $.ajax({
            type: "POST",
            url: "/reviews",
            data: reviewData,
            contentType: false,
            processData: false,
            success: function (res) {
                $("#reviewForm")[0].reset();
                document.querySelector("#messagehere").style.display = "block";
                window.location.reload();
            }
        });

    });

});
