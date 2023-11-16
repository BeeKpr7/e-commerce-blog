$(document).ready(function () {
    /*FONCTION NAVBAR*/
    $(".cross").hide();
    $(".menuBurger").hide();

    $(".hamburger").click(function () {
        $(".menuBurger").slideToggle("slow", function () {
            $(".hamburger").hide();
            $(".cross").show();
        });
    });

    $(".cross").click(function () {
        $(".menuBurger").slideToggle("slow", function () {
            $(".cross").hide();
            $(".hamburger").show();
        });
    });
    //END FONCTION NAV BAR

    //FUNCTION DESCRIPTION MIEL

    //close the class description miel open
    $(".cross-desc").click(function () {
        $(".description-miel").hide();
    });
    // hide the confirm message
    $("#confirmMessage").hide();

    // hide the sending message
    $("#sendingMessage").hide();

    //VALIDATION FORMULAIRE
    var validate = function (e) {
        var fields = document.querySelectorAll(
            '.form-container div textarea, .form-container div input[type="text"]'
        );
        var regEx;
        var removeSpan;
        var par;
        var check = false;
        var val;
        var errArr = [];

        for (var i = 0; i < fields.length; i++) {
            if (fields[i].value === "") {
                if (fields[i].nextElementSibling.classList.contains("error")) {
                    removeSpan = fields[i].nextElementSibling;
                    par = fields[i].parentNode;
                    par.removeChild(removeSpan);
                    fields[i].nextElementSibling.innerHTML =
                        "Hmmm! Vérifiez votre " +
                        fields[i].placeholder +
                        " il y a peut être une erreur?";
                    fields[i].style.boxShadow = "0 0 2px 1px #cc0001";
                    check = false;
                    errArr.push(fields[i]);
                }
                fields[i].nextElementSibling.innerHTML =
                    "Hmmm! Vérifiez votre " + fields[i].placeholder;
                fields[i].style.boxShadow = "0 0 2px 1px #cc0001";
                check = false;
                errArr.push(fields[i]);
            } else {
                // check if message and name values contain valid characters.
                if (
                    fields[i].id !== "email" &&
                    fields[i].id !== "phone" &&
                    fields[i].id !== "message"
                ) {
                    val = isValidChar(fields[i]);
                    if (val === false) {
                        fields[i].nextElementSibling.innerHTML =
                            "Hmm! Il me semble que certains caractères ne sont pas compatible";
                        fields[i].style.boxShadow = "0 0 2px 1px #cc0001";
                        check = false;
                        errArr.push(fields[i]);
                    } else {
                        fields[i].nextElementSibling.innerHTML = "";
                        fields[i].style.boxShadow = "none";
                        check = true;
                    }
                }

                if (fields[i].id === "phone") {
                    val = isValidPhone(fields[i]);
                    if (val === false) {
                        fields[i].nextElementSibling.innerHTML =
                            "Mince! Ce n'est pas le bon format?";
                        fields[i].style.boxShadow = "0 0 2px 1px #cc0001";
                        check = false;
                        errArr.push(fields[i]);
                    } else {
                        fields[i].nextElementSibling.innerHTML = "";
                        fields[i].style.boxShadow = "none";
                        check = true;
                    }
                }

                if (fields[i].id === "email") {
                    val = isValidEmail(fields[i]);
                    if (val === false) {
                        fields[i].nextElementSibling.innerHTML =
                            "Ouupss! Votre email semble invalide?";
                        fields[i].style.boxShadow = "0 0 2px 1px #cc0001";
                        check = false;
                        errArr.push(fields[i]);
                    } else {
                        fields[i].nextElementSibling.innerHTML = "";
                        fields[i].style.boxShadow = "none";
                        check = true;
                    }
                }
                if (fields[i].id === "message") {
                    val = isValidMessage(fields[i]);
                    if (val === false) {
                        fields[i].nextElementSibling.innerHTML =
                            "Ouupss! Votre Message semble invalide !";
                        fields[i].style.boxShadow = "0 0 2px 1px #cc0001";
                        check = false;
                        errArr.push(fields[i]);
                    } else {
                        fields[i].nextElementSibling.innerHTML = "";
                        fields[i].style.boxShadow = "none";
                        check = true;
                    }
                }
            }
        }

        if (check === false) {
            var count = 0;
            var toErr = setInterval(function () {
                var e = errArr[0].offsetTop + -25;
                var pos = Math.abs(e);
                if (count < pos) {
                    count++;
                    /*  window.scrollTo(0, count); */
                } else {
                    clearInterval(toErr);
                }
            }, 1);
        }

        return check;

        // Helper functions.
        function isValidEmail(e) {
            regEx = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var email = e.value;
            if (!regEx.test(email)) {
                return false;
            }
        }

        function isValidMessage(e) {
            regEx = /^[0-9a-zA-Z\n\s-àâäãçéèêëìîïòôöõùûüñ',!?-]{15,400}$/;
            var message = e.value;
            if (!regEx.test(message)) {
                return false;
            }
        }

        function isValidChar(e) {
            regEx = /^[a-zA-Z@#$%!?^&*()_+\-=\[\]{};':"\\|,.\/? ]*$/;
            var value = e.value;
            if (!regEx.test(value)) {
                return false;
            }
        }

        function isValidPhone(e) {
            regEx = /^[+]?[(]?[+]?\d{2,4}[)]?[-\s]?\d{2,8}[-\s]?\d{2,8}$/;
            var value = e.value;
            if (!regEx.test(value)) {
                return false;
            }
        }
    };
    //GOOGLE RECAPTCHA

    // AJAX FORMULAIRE
    $("#submit").click(function (e) {
        e.preventDefault();

        if (validate(e)) {
            //Affichage message en cours d'envoie pour stoper les double commentaire
            $("#formMessage").hide("slow");
            $("#sendingMessage").show("slow");

            var userInfos = new Array();
            userInfos["name"] = $('input[name="name"]').val();
            userInfos["firstName"] = $('input[name="firstName"]').val();
            userInfos["email"] = $('input[name="email"]').val();
            userInfos["phone"] = $('input[name="phone"]').val();
            userInfos["message"] = $('textarea[name="message"]').val();
            userInfos["g-recaptcha-response"] = $(
                'input[name="g-recaptcha-response"]'
            ).val();

            console.log(userInfos);
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            var data = JSON.stringify(Object.assign({}, userInfos));
            $.ajax({
                type: "POST",
                url: "/Nouveaux-messages",
                data: { data },
                success: function (data) {
                    $("#nomPrenom").html(data.msg);
                    $("#sendingMessage").hide("slow");
                    $("#confirmMessage").show("slow");
                },

                error: function (data) {
                    $("#formMessage").show("slow");
                    $("#sendingMessage").hide("slow");
                    console.log(data);
                    var errors = data.responseJSON;
                    var html = "<ul>";

                    for (var i = 0; i < errors[0].length; i++) {
                        html += "<li>" + errors[0][i] + "</li>";
                    }
                    html += "</ul>";

                    $("#errorsAjax").html(html);
                },
            });
        }
    });
});
