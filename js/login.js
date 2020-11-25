let btnShowSingUp = document.getElementById("showSingUp");
let btnHideSingUp = document.getElementById("hideSingUp");
let btnShowResetPwd = document.getElementById("showResetPwd");
let btnHideResetPwd = document.getElementById("hideResetPwd");

btnShowSingUp.addEventListener(
  "click",
  () => (
    document.querySelector(".login").classList.add("d-none"),
    document.querySelector(".singUp").classList.remove("d-none")
  )
);

btnHideSingUp.addEventListener(
  "click",
  () => (
    document.querySelector(".singUp").classList.add("d-none"),
    document.querySelector(".login").classList.remove("d-none")
  )
);

btnShowResetPwd.addEventListener(
  "click",
  () => (
    document.querySelector(".singUp").classList.add("d-none"),
    document.querySelector(".login").classList.add("d-none"),
    document.querySelector(".resetPwd").classList.remove("d-none")
  )
);

btnHideResetPwd.addEventListener(
  "click",
  () => (
    document.querySelector(".resetPwd").classList.add("d-none"),
    document.querySelector(".login").classList.remove("d-none")
  )
);


