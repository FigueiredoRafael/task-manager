// SPECIAL UPLOAD-PHOTO BTN
const realFileBtn = document.getElementById("real-file");
const customBtn = document.getElementById("upload-photo");
const customTxt = document.getElementById("custom-upload-text");
const previewContainer = document.getElementById("imagePreview");
const previewImage = document.querySelector(".image-preview__image");
const previewDefaultText = document.querySelector(
  ".image-preview__default-text"
);
const removeImgBtn = document.querySelector(".image-preview__remove-Image");

customBtn.addEventListener("click", function () {
  realFileBtn.click();
});

realFileBtn.addEventListener("change", function () {
  const file = this.files[0];

  if (file != null) {
    this.setAttribute("data-toggle", "modal");
    this.setAttribute("data-target", "#changePasswordModal");
    
    const reader = new FileReader();

    previewDefaultText.style.display = "none";
    previewImage.style.display = "block";

    reader.addEventListener("load", function () {
      
      previewImage.setAttribute("src", this.result);
    
    });

    reader.readAsDataURL(file);
  }
  if (file != undefined) {
    removeImgBtn.addEventListener("click", function () {
      previewDefaultText.style.display = null;
      previewImage.style.display = null;
      customTxt.innerHTML = "Nenhuma foto selecionada";
    });
  }
  if (realFileBtn.value) {
    customTxt.innerHTML = realFileBtn.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    previewDefaultText.style.display = null;
    previewImage.style.display = null;
    customTxt.innerHTML = "Nenhuma foto selecionada";
  }
});
