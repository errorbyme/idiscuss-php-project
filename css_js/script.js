let loader = document.getElementById("loader");
window.addEventListener("load", () => {
  loader.style.opacity = "0";
  loader.style.visibility = "hidden";
});

let backtotop = document.getElementById("backtotop");
if (backtotop) {
  window.addEventListener("scroll", () => {
    if (window.scrollY > 350) {
      backtotop.style.opacity = "1";
      backtotop.style.visibility = "visible";
    } else {
      backtotop.style.opacity = "0";
      backtotop.style.visibility = "hidden";
    }
  });
}
$(document).ready(function () {
  $(".modal").on("shown.bs.modal", function () {
    document.getElementById("signinemail").focus();
    document.getElementById("signupusername").focus();
  });
  $(".offcanvas").on("shown.bs.offcanvas", function () {
    document.getElementById("commento").focus();
  });
});

const username = document.getElementById("signupusername");
const email = document.getElementById("signupemail");
const pswd = document.getElementById("signuppassword");
const cpswd = document.getElementById("signupcpassword");
const pfp = document.getElementById("pfp");
const submit = document.getElementById("submit");

$(document).ready(function () {
  $("#signupmodal").keyup(function () {
    inputValidation();
  });
});

const inputValidation = () => {
  var pwd_expression =
    /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/;
  var letters = /^[A-Za-z]+$/;
  var filter =
    /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  var email_expression =
    /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;

  let usernameValue = username.value.trim();
  let emailValue = email.value.trim();
  let passwordValue = pswd.value.trim();
  let cpasswordValue = cpswd.value.trim();

  setErrorMessage = (element, messageText) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector(".message");

    errorDisplay.style.color = "red";
    errorDisplay.innerHTML = messageText;
  };

  setSuccessMessage = (element, messageText) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector(".message");

    errorDisplay.style.color = "green";
    errorDisplay.innerHTML = messageText;
  };

  if (usernameValue === "") {
    setErrorMessage(username, "username is required*");
    return false;
  } else {
    setSuccessMessage(username, "username ok!!");
    if (emailValue === "") {
      setErrorMessage(email, "email is required*");
      return false;
    } else if (!email_expression.test(emailValue)) {
      setErrorMessage(email, "pls check yr email");
      return false;
    } else {
      setSuccessMessage(email, "email ok!!");
      if (passwordValue === "") {
        setErrorMessage(pswd, "password is required*");
        return false;
      } else if (!pwd_expression.test(passwordValue)) {
        setErrorMessage(
          pswd,
          "Make sure password contains a letter, a sign and a no.*"
        );
        return false;
      } else if (passwordValue.length < 8) {
        setErrorMessage(pswd, "password is too short*");
        return false;
      } else {
        setSuccessMessage(pswd, "valid password!!");
        if (passwordValue != cpasswordValue) {
          setErrorMessage(cpswd, "password not matched*");
          return false;
        } else {
          setSuccessMessage(cpswd, "password matched!!");
          setSuccessMessage(pfp, "optional*");
          setSuccessMessage(submit, "Now u r set to Register!!");
          return true;
        }
      }
    }
  }
};
$(document).ready(function () {
  $("#notf-btn").on("click", function () {
    $("#list").toggle();
  });
});

function loadNotifNo() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function (data) {
    if (this.readyState == 4 && this.status == 200) {
      var no = this.responseText;
      if (no == 0) {
        document
          .getElementById("notification-no")
          .parentElement.classList.add("invisible");
        document
          .getElementById("notification-no")
          .parentElement.classList.remove("visible");
      } else {
        document
          .getElementById("notification-no")
          .parentElement.classList.remove("invisible");
        document
          .getElementById("notification-no")
          .parentElement.classList.add("visible");
        document.getElementById("notification-no").innerHTML = no;
      }
    }
  };
  xhttp.open("GET", "notification_no.php", true);
  xhttp.send();
}

function loadNotifData() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("list").innerHTML = this.responseText;
    }
  };

  xhttp.open("GET", "data.php", true);
  xhttp.send();
}
setInterval(() => {
  loadNotifData();
  loadNotifNo();
}, 600);
