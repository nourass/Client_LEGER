document.addEventListener("DOMContentLoaded", function () {
    // Animation d'apparition de la page
    const articlePage = document.querySelector(".article-page");
    if (articlePage) {
        articlePage.style.opacity = "1";
        articlePage.style.transform = "translateY(0)";
    }

    // Effet dynamique sur le bouton retour (animation de clic)
    const backButton = document.querySelector(".back-btn");
    if (backButton) {
        backButton.addEventListener("mousedown", () => {
            backButton.style.transform = "scale(0.9)";
        });

        backButton.addEventListener("mouseup", () => {
            backButton.style.transform = "scale(1)";
        });

        backButton.addEventListener("mouseleave", () => {
            backButton.style.transform = "scale(1)";
        });
    }
});