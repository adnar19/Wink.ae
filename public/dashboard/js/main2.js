/* show cookie policy */
"use strict";

document.addEventListener("DOMContentLoaded", function () {
  showCookiePolicy();
});

document
  .querySelector(".cookie-compliance__close")
  .addEventListener("click", function () {
    hideCookiePolicy();
  });

function showCookiePolicy() {
  if (!getCookie()) {
    var btn = document.querySelector(".cookie-compliance__submit");

    btn.addEventListener("click", function (e) {
      e.preventDefault();
      setCookie();
      hideCookiePolicy();
    });
    setTimeout(() => {
      document.documentElement.classList.add("js-show-cookie-banner");
    }, 3000);
  }
}

function hideCookiePolicy() {
  document.documentElement.classList.remove("js-show-cookie-banner");
}

function getCookie() {
  return /(^|;)\s*policy=/.test(document.cookie);
}

function setCookie() {
  var date = new Date();
  date.setTime(date.getTime() + 365 * 24 * 60 * 60 * 1000);
  document.cookie = `policy=1; expires=${date.toUTCString()}; path=/`;
}
