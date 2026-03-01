document.addEventListener("DOMContentLoaded", function () {
  const galleryEl = document.querySelector(".school-lightgallery");

  if (galleryEl) {
    lightGallery(galleryEl, {
      selector: "a",
      speed: 500,
      download: false,
      counter: true,
      loop: true,
    });
  }
});
