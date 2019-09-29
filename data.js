function hello() {
    jump = true;
}

function dec2hex(dec) {
    return ('0' + dec.toString(16)).substr(-2)
}

// generateId :: Integer -> String
function generateId(len) {
    var arr = new Uint8Array((len || 40) / 2)
    window.crypto.getRandomValues(arr)
    return Array.from(arr, dec2hex).join('')
}

function looksLikeMail(str) {
    var patt = new RegExp(/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i);
    return patt.test((String)(str));
}

var jump = false;
var countClicks = 0;
/*Verificar si en la pregunta 1 el usuario contestó "si"*/
var enter = 0;
var id = 0;

function upCount() {
    /*Verificar y enviar a PHP*/
    if (countClicks == 0) {
        id = generateId(20);
        var one, prox = false;

        if (document.getElementById('r1').checked) {
            one = document.getElementById('r1').value;
            prox = true;
        } else if (document.getElementById('r2').checked) {
            one = document.getElementById('r2').value;
            prox = true;
        } else {
            prox = false;
        }
        if (prox) {
            enter = 0;
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    one: one,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 2;
            $("#carouselExampleControls").carousel("next");
        } else {
            countClicks = 0;
            enter++;

            if (enter >= 1) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }

    } //Fin de 1


    if (countClicks == 2) {
        if (document.getElementById('r2').checked) {
            window.location.href = "terminate.html";
        }
        var r2 = "Nulo";
        var r3 = "Nulo";
        var prox = false;

        if (document.getElementById('r3').checked || document.getElementById('r4').checked) {
            if (document.getElementById('r5').checked || document.getElementById('r6').checked) {
                prox = true;
                if (document.getElementById('r3').checked) {
                    r2 = document.getElementById('r3').value;
                } else if (document.getElementById('r3').checked) {
                    r2 = document.getElementById('r4').value;
                }
                if (document.getElementById('r5').checked) {
                    r3 = document.getElementById('r5').value;
                } else if (document.getElementById('r6').checked) {
                    r3 = document.getElementById('r6').value;
                }
            }
        }

        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    r2: r2,
                    r3: r3,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 3;
        } else if (!prox) {
            countClicks = 2;
            enter++;
            if (enter >= 2) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }
    } //Fin de 2


    if (countClicks == 3) {
        if (document.getElementById('r6').checked) {
            window.location.href = "terminate.html";
        }

        var r4, prox = false;
        if (document.getElementById('r7').checked || document.getElementById('r8').checked ||
            document.getElementById('r9').checked) {
            prox = true;
            if (document.getElementById('r7').checked) {
                r4 = document.getElementById('r7').value;
            } else if (document.getElementById('r8').checked) {
                r4 = document.getElementById('r8').value;
            } else if (document.getElementById('r9').checked) {
                r4 = document.getElementById('r9').value;
            }
        }

        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    r4: r4,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 4;
        } else {
            enter++;
            countClicks = 3;
            if (enter >= 2) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }

    } //Fin de 3
    if (countClicks == 4) {
        var r5;
        var r6;
        var prox = false;
        if (document.getElementById('r10').checked || document.getElementById('r11').checked) {
            if (document.getElementById('r12').checked || document.getElementById('r13').checked) {
                prox = true;
                if (document.getElementById('r10').checked) {
                    r5 = document.getElementById('r10').value;
                } else if (document.getElementById('r11').checked) {
                    r5 = document.getElementById('r11').value;
                }

                if (document.getElementById('r12').checked) {
                    r6 = document.getElementById('r12').value;
                } else if (document.getElementById('r13').checked) {
                    r6 = document.getElementById('r13').value;
                }
            }
        }

        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    r5: r5,
                    r6: r6,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 5;
        } else {
            enter++;
            countClicks = 4;
            if (enter >= 2) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }

    } //Fin de 4
    if (countClicks == 5) {
        var error = false;
        if (document.getElementById('r10').checked && document.getElementById('r12').checked) {
            window.location.href = "terminate.html";
        }

        var r7;
        var r8;
        var prox = false;
        r7 = document.getElementById("t1").value;
        r8 = document.getElementById("t2").value;
        if (document.getElementById("t1").value != "" && document.getElementById("t2").value != "") {
            prox = true;
            if (r7.length > 400 || r8.length > 400) {
                prox = false;
                error = true;
                alert("En los campos de texto no deben ir más de 400 caracteres");
            }
            onlyNL = false;
            onlyNL = String(r8).match("^[A-z0-9]+$");
            if (!onlyNL) {
                prox = false;
                error = true;
                alert("En el campo de cédula no puede utilizar puntos, comas, guiones ni carácteres especiales, solo letras y números");
            }
        }
        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    r7: r7,
                    r8: r8,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 6;
        } else {
            enter++;
            countClicks = 5;
            if (enter >= 2 && !error) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }
    } //Fin de 5


    if (countClicks == 6) {
        var provincia;
        var canton;
        var distrito;
        var prox = false;
        var error = false;

        provincia = document.getElementById("t3").value;
        canton = document.getElementById("t4").value;
        distrito = document.getElementById("t5").value;

        if (document.getElementById("t3").value != "" && document.getElementById("t4").value &&
            document.getElementById("t5").value) {
            prox = true;
            if (provincia.length > 400 || canton.length > 400 || distrito.length > 400) {
                prox = false;
                error = true;
                alert("En los campos de texto no deben ir más de 400 caracteres");
            }
        }
        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    provincia: provincia,
                    canton: canton,
                    distrito: distrito,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 7;
        } else {
            enter++;
            countClicks = 6;
            if (enter >= 2 && !error) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }
    } //Fin de 6
    if (countClicks == 7) {
        var movil = "";
        var fijo = "";
        var prox = false;
        var error = false;
        movil = document.getElementById("t6").value;
        fijo = document.getElementById("t7").value;

        if (document.getElementById("t6").value != "" || document.getElementById("t7").value != "") {
            prox = true;
            if (movil.length > 400 || fijo.length > 400) {
                prox = false;
                error = true;
                alert("En los campos de texto no deben ir más de 400 caracteres");
            }
        }

        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    movil: movil,
                    fijo: fijo,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 8;
        } else {
            enter++;
            countClicks = 7;
            if (enter >= 2 && !error) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }
    } //Fin de 7


    if (countClicks == 8) {
        var correo1;
        var correo2;
        var prox = false;
        var error = false;
        correo1 = document.getElementById("t8").value;
        correo2 = document.getElementById("t9").value;
        if (document.getElementById("t8").value != "" || document.getElementById("t9").value != "") {
            prox = true;
            if (document.getElementById("t8").value != "") {
                var validE;
                validE = looksLikeMail(String(correo1));
                if (!validE) {
                    error = true;
                    prox = false;
                    alert("Por favor ingrese una dirección de correo electrónico válida: ejemplo@ejemplo.com");
                }
            }

            if (document.getElementById("t9").value != "") {
                var validE;
                validE = looksLikeMail(String(correo2));
                if (!validE) {
                    error = true;
                    prox = false;
                    alert("Por favor ingrese una dirección de correo electrónico válida: ejemplo@ejemplo.com");
                }
            }

            if (correo1.length > 400 || correo2.length > 400) {
                prox = false;
                error = true;
                alert("En los campos de texto no deben ir más de 400 caracteres");
            }
        }

        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    correo1: correo1,
                    correo2: correo2,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 9;
        } else {
            enter++;
            countClicks = 8;
            if (enter >= 2 && !error) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }


    } //Fin de 8
    if (countClicks == 9) {
        var r12;
        var r13, ex;
        var prox = false;
        var error = false;

        r12 = document.getElementById("t10").value;
        r13 = document.getElementById("t11").value;

        if (document.getElementById("t10").value != "" && document.getElementById("t11").value != "") {
            prox = true;
            if (r12.length > 400 || r13.length > 400) {
                prox = false;
                error = true;
                alert("En los campos de texto no deben ir más de 400 caracteres");
            }

            var placeholder = parseInt(r13, 10);
            if (isNaN(placeholder)) {
                prox = false;
                error = true;
                alert("En el campo de número de colaboradores debe ingresar un número entero");
            }
        }
        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    r12: r12,
                    r13: r13,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 10;
        } else {
            enter++;
            countClicks = 9;
            if (enter >= 2 && !error) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }
    } //Fin de 9
    if (countClicks == 10) {
        var r14, ex;
        var prox = false;
        r14 = document.getElementById("s1").value;

        if (document.getElementById('ex1').checked || document.getElementById('ex2').checked) {
            prox = true;

            if (document.getElementById('ex1').checked) {
                ex = document.getElementById('ex1').value;
            } else if (document.getElementById('ex2').checked) {
                ex = document.getElementById('ex2').value;
            }
        }
        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    r14: r14,
                    ex: ex,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 11;
        } else {
            enter++;
            countClicks = 10;
            if (enter >= 2) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }
    } //Fin de 10

    if (countClicks == 11) {
        var c1, c2, c3, c4, c5, c6, c7, c8, c9, c10, c11, c12, c13, c14, c15, c16, c17, c18, c19, c20, c21, c22, c23, c24;
        var prox = false;
        if (document.getElementById("c1").checked || document.getElementById("c2").checked ||
            document.getElementById("c3").checked || document.getElementById("c4").checked ||
            document.getElementById("c5").checked || document.getElementById("c6").checked ||
            document.getElementById("c7").checked || document.getElementById("c8").checked ||
            document.getElementById("c9").checked || document.getElementById("c10").checked ||
            document.getElementById("c11").checked || document.getElementById("c12").checked ||
            document.getElementById("c13").checked || document.getElementById("c14").checked ||
            document.getElementById("c15").checked || document.getElementById("c16").checked ||
            document.getElementById("c17").checked || document.getElementById("c18").checked ||
            document.getElementById("c19").checked || document.getElementById("c20").checked ||
            document.getElementById("c21").checked || document.getElementById("c22").checked ||
            document.getElementById("c23").checked || document.getElementById("c24").checked) {
            prox = true;
        }
        c1 = document.getElementById("c1").checked;
        c2 = document.getElementById("c2").checked;
        c3 = document.getElementById("c3").checked;
        c4 = document.getElementById("c4").checked;
        c5 = document.getElementById("c5").checked;
        c6 = document.getElementById("c6").checked;
        c7 = document.getElementById("c7").checked;
        c8 = document.getElementById("c8").checked;
        c9 = document.getElementById("c9").checked;
        c10 = document.getElementById("c10").checked;
        c11 = document.getElementById("c11").checked;
        c12 = document.getElementById("c12").checked;
        c13 = document.getElementById("c13").checked;
        c14 = document.getElementById("c14").checked;
        c15 = document.getElementById("c15").checked;
        c16 = document.getElementById("c16").checked;
        c17 = document.getElementById("c17").checked;
        c18 = document.getElementById("c18").checked;
        c19 = document.getElementById("c19").checked;
        c20 = document.getElementById("c20").checked;
        c21 = document.getElementById("c21").checked;
        c22 = document.getElementById("c22").checked;
        c23 = document.getElementById("c23").checked;
        c24 = document.getElementById("c24").checked;

        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    c1: c1,
                    c2: c2,
                    c3: c3,
                    c4: c4,
                    c5: c5,
                    c6: c6,
                    c7: c7,
                    c8: c8,
                    c9: c9,
                    c10: c10,
                    c11: c11,
                    c12: c12,
                    c13: c13,
                    c14: c14,
                    c15: c15,
                    c16: c16,
                    c17: c17,
                    c18: c18,
                    c19: c19,
                    c20: c20,
                    c21: c21,
                    c22: c22,
                    c23: c23,
                    c24: c24,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 12;
        } else {
            enter++;
            countClicks = 11;
            if (enter >= 2) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }
    } //Fin de 11

    if (countClicks == 12) {
        var r16, r17;
        var prox = false;
        var error = false;

        if (document.getElementById('r14').checked || document.getElementById('r15').checked)
            if (document.getElementById("tr12").value != "") {
                prox = true;

                if (document.getElementById("tr12").value.length > 400) {
                    prox = false;
                    error = true;
                    alert("En los campos de texto no deben ir más de 400 caracteres");
                }
            }

        if (document.getElementById('r14').checked) {
            r16 = document.getElementById('r14').value;
        } else if (document.getElementById('r15').checked) {
            r16 = document.getElementById('r15').value;
        }
        r17 = document.getElementById("tr12").value;

        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    r16: r16,
                    r17: r17,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 13;
        } else {
            enter++;
            countClicks = 12;
            if (enter >= 2 && !error) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }
    } //Fin de 12

    if (countClicks == 13) {
        var c25, c26, c27, c28, c29, c30, c31, otroex;
        otroex = "";
        var prox = false;
        var error = false;

        $('#c31').click(function () {
            $("#otroex").prop('disabled', false);
            if (!$(this).is(':checked')) {
                $("#otroex").prop('disabled', true);
            }
        });

        if (document.getElementById("c25").checked || document.getElementById("c26").checked ||
            document.getElementById("c27").checked || document.getElementById("c28").checked ||
            document.getElementById("c29").checked || document.getElementById("c30").checked ||
            document.getElementById("c31").checked) {
            prox = true;
            if (document.getElementById("c31").checked)
                if (document.getElementById("otroex").value != "") {
                    otroex = document.getElementById("otroex").value;
                    if (otroex > 400) {
                        prox = false;
                        error = true;
                        alert("En los campos de texto no deben ir más de 400 caracteres");
                    }
                }
            else prox = false;
        }
        c25 = document.getElementById("c25").checked;
        c26 = document.getElementById("c26").checked;
        c27 = document.getElementById("c27").checked;
        c28 = document.getElementById("c28").checked;
        c29 = document.getElementById("c29").checked;
        c30 = document.getElementById("c30").checked;
        c31 = document.getElementById("c31").checked;
        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    c25: c25,
                    c26: c26,
                    c27: c27,
                    c28: c28,
                    c29: c29,
                    c30: c30,
                    c31: c31,
                    otroex: otroex,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 14;
        } else {
            enter++;
            countClicks = 13;
            if (enter >= 2 && !error) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }

    } //Fin de 13

    if (countClicks == 14) {
        var r18, r19;
        var prox = false;

        if (document.getElementById('r16').checked || document.getElementById('r17').checked)
            if (document.getElementById('r18').checked || document.getElementById('r19').checked ||
                document.getElementById('r20').checked || document.getElementById('r21').checked ||
                document.getElementById('r22').checked || document.getElementById('r23').checked ||
                document.getElementById('r24').checked) {
                prox = true;
            }

        if (document.getElementById('r16').checked) {
            r18 = document.getElementById('r16').value;
        } else if (document.getElementById('r17').checked) {
            r18 = document.getElementById('r17').value;
        }


        if (document.getElementById('r18').checked) {
            r19 = document.getElementById('r18').value;
        } else if (document.getElementById('r19').checked) {
            r19 = document.getElementById('r19').value;
        } else if (document.getElementById('r20').checked) {
            r19 = document.getElementById('r20').value;
        } else if (document.getElementById('r21').checked) {
            r19 = document.getElementById('r21').value;
        } else if (document.getElementById('r22').checked) {
            r19 = document.getElementById('r22').value;
        } else if (document.getElementById('r23').checked) {
            r19 = document.getElementById('r23').value;
        } else if (document.getElementById('r24').checked) {
            r19 = document.getElementById('r24').value;
        }
        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    r18: r18,
                    r19: r19,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 15;
        } else {
            enter++;
            countClicks = 14;
            if (enter >= 2) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }
    } //Fin de 14


    if (countClicks == 15) {
        var fi1 = "",
            fi2 = "",
            fi3, temp, verify, verify2;
        var prox = false;

        if (document.getElementById('ex5').checked || (document.getElementById('ex3').value != "" ||
                document.getElementById('ex4').value != ""))
            if (document.getElementById('ex8').checked || (document.getElementById('ex6').value != "" ||
                    document.getElementById('ex7').value != ""))
                if (document.getElementById('ex9').checked || document.getElementById('ex10').checked ||
                    document.getElementById('ex11').checked) {
                    prox = true;
                }


        if (document.getElementById('ex5').checked) {
            fi1 = document.getElementById('ex5').value;
        } else if (document.getElementById('trigger').checked) {
            verify = document.getElementById('ex3').value;
            var placeholder = parseInt(verify, 10);
            if (isNaN(placeholder) && verify != "") {
                prox = false;
                alert("En el campo de Años/Meses debe ingresar un número entero");
            }
            verify2 = document.getElementById('ex4').value;
            var placeholder = parseInt(verify2, 10);
            if (isNaN(placeholder) && verify2 != "") {
                prox = false;
                alert("En el campo de Años/Meses debe ingresar un número entero");
            } else if (placeholder > 11) {
                prox = false;
                alert("Formato inválido, debería ser: [Años] [1-11]Meses");
            }
            if (verify != "" && verify2 != "")
                fi1 = document.getElementById('ex3').value + " Años " + document.getElementById('ex4').value + " Meses";
            else if (verify == "")
                fi1 = document.getElementById('ex4').value + " Meses";
            else if (verify2 == "")
                fi1 = document.getElementById('ex3').value + " Años ";
        }

        if (document.getElementById('ex8').checked) {
            fi2 = document.getElementById('ex8').value;
        } else if (document.getElementById('itrigger').checked) {
            verify = document.getElementById('ex6').value;
            var placeholder = parseInt(verify, 10);
            if (isNaN(placeholder) && verify != "") {
                prox = false;
                alert("En el campo de Años/Meses debe ingresar un número entero");
            }
            verify2 = document.getElementById('ex7').value;
            var placeholder = parseInt(verify2, 10);
            if (isNaN(placeholder) && verify2 != "") {
                prox = false;
                alert("En el campo de Años/Meses debe ingresar un número entero");
            } else if (placeholder > 11) {
                prox = false;
                alert("Formato inválido, debería ser: [Años] [1-11]Meses");
            }
            if (verify != "" && verify != "")
                fi2 = document.getElementById('ex6').value + " Años " + document.getElementById('ex7').value + " Meses";
            else if (verify == "")
                document.getElementById('ex7').value + " Meses";
            else if (verify2 == "")
                fi2 = document.getElementById('ex6').value + " Años ";
        }

        if (document.getElementById('ex9').checked) {
            fi3 = document.getElementById('ex9').value;
        } else if (document.getElementById('ex10').checked) {
            fi3 = document.getElementById('ex10').value;
        } else if (document.getElementById('ex11').checked) {
            fi3 = document.getElementById('ex11').value;
        }

        $('#ex5').click(function () {
            $("#ex3").prop('disabled', true);
            $("#ex4").prop('disabled', true);
        });

        $('#trigger').click(function () {
            $("#ex3").prop('disabled', false);
            $("#ex4").prop('disabled', false);
        });

        $('#ex8').click(function () {
            $("#ex6").prop('disabled', true);
            $("#ex7").prop('disabled', true);
        });

        $('#itrigger').click(function () {
            $("#ex6").prop('disabled', false);
            $("#ex7").prop('disabled', false);
        });

        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    fi1: fi1,
                    fi2: fi2,
                    fi3: fi3,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 16;
        } else {
            enter++;
            countClicks = 15;
            if (enter >= 2) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }
    } //Fin de 15

    if (countClicks == 16) {
        var bpa, bpm, manipulacion, haccp, co, ft, rfa, ecrc, iso9001, iso14001, detalle2, otra;
        var prox = false;
        var error = false;
        if (document.getElementById('r25').checked || document.getElementById('r26').checked ||
            document.getElementById('r27').checked)
            if (document.getElementById('r28').checked || document.getElementById('r29').checked ||
                document.getElementById('r30').checked)
                if (document.getElementById('r31').checked || document.getElementById('r32').checked ||
                    document.getElementById('r33').checked)
                    if (document.getElementById('r34').checked || document.getElementById('r35').checked ||
                        document.getElementById('r36').checked)
                        if (document.getElementById('r37').checked || document.getElementById('r38').checked ||
                            document.getElementById('r39').checked)
                            if (document.getElementById('ex12').checked || document.getElementById('ex13').checked ||
                                document.getElementById('ex14').checked)
                                if (document.getElementById('ex15').checked || document.getElementById('ex16').checked ||
                                    document.getElementById('ex17').checked)
                                    if (document.getElementById('ex18').checked || document.getElementById('ex19').checked ||
                                        document.getElementById('ex20').checked)
                                        if (document.getElementById('ex21').checked || document.getElementById('ex22').checked ||
                                            document.getElementById('ex23').checked)
                                            if (document.getElementById('ex24').checked || document.getElementById('ex25').checked ||
                                                document.getElementById('ex26').checked)
                                                if (document.getElementById('ex27').checked || document.getElementById('ex28').checked ||
                                                    document.getElementById('ex29').checked) {
                                                    prox = true;
                                                    if (document.getElementById('r37').checked)
                                                        if (document.getElementById('ex30').value == "")
                                                            prox = false;
                                                        else if (document.getElementById('ex30').value != "") {
                                                        if (document.getElementById("ex30").value.length > 400) {
                                                            prox = false;
                                                            error = true;
                                                            alert("En los campos de texto no deben ir más de 400 caracteres");
                                                        }

                                                    }
                                                }

        $('#r37').click(function () {
            $("#ex30").prop('disabled', false);
        });

        $('#r38').click(function () {
            $("#ex30").prop('disabled', true);
            otra = "";
        });


        $('#r39').click(function () {
            $("#ex30").prop('disabled', false);
        });

        if (document.getElementById('r25').checked) {
            bpa = document.getElementById('r25').value;
        } else if (document.getElementById('r26').checked) {
            bpa = document.getElementById('r26').value;
        } else if (document.getElementById('r27').checked) {
            bpa = document.getElementById('r27').value;
        }


        if (document.getElementById('r28').checked) {
            bpm = document.getElementById('r28').value;
        } else if (document.getElementById('r29').checked) {
            bpm = document.getElementById('r29').value;
        } else if (document.getElementById('r30').checked) {
            bpm = document.getElementById('r30').value;
        }


        if (document.getElementById('r31').checked) {
            manipulacion = document.getElementById('r31').value;
        } else if (document.getElementById('r32').checked) {
            manipulacion = document.getElementById('r32').value;
        } else if (document.getElementById('r33').checked) {
            manipulacion = document.getElementById('r33').value;
        }


        if (document.getElementById('r34').checked) {
            haccp = document.getElementById('r34').value;
        } else if (document.getElementById('r35').checked) {
            haccp = document.getElementById('r35').value;
        } else if (document.getElementById('r36').checked) {
            haccp = document.getElementById('r36').value;
        }

        if (document.getElementById('ex12').checked) {
            co = document.getElementById('ex12').value;
        } else if (document.getElementById('ex13').checked) {
            co = document.getElementById('ex13').value;
        } else if (document.getElementById('ex14').checked) {
            co = document.getElementById('ex14').value;
        }


        if (document.getElementById('ex15').checked) {
            ft = document.getElementById('ex15').value;
        } else if (document.getElementById('ex16').checked) {
            ft = document.getElementById('ex16').value;
        } else if (document.getElementById('ex17').checked) {
            ft = document.getElementById('ex17').value;
        }

        if (document.getElementById('ex18').checked) {
            rfa = document.getElementById('ex18').value;
        } else if (document.getElementById('ex19').checked) {
            rfa = document.getElementById('ex19').value;
        } else if (document.getElementById('ex20').checked) {
            rfa = document.getElementById('ex20').value;
        }

        if (document.getElementById('ex21').checked) {
            ecrc = document.getElementById('ex21').value;
        } else if (document.getElementById('ex22').checked) {
            ecrc = document.getElementById('ex22').value;
        } else if (document.getElementById('ex23').checked) {
            ecrc = document.getElementById('ex23').value;
        }

        if (document.getElementById('ex24').checked) {
            iso9001 = document.getElementById('ex24').value;
        } else if (document.getElementById('ex25').checked) {
            iso9001 = document.getElementById('ex25').value;
        } else if (document.getElementById('ex26').checked) {
            iso9001 = document.getElementById('ex26').value;
        }

        if (document.getElementById('ex27').checked) {
            iso14001 = document.getElementById('ex27').value;
        } else if (document.getElementById('ex28').checked) {
            iso14001 = document.getElementById('ex28').value;
        } else if (document.getElementById('ex29').checked) {
            iso14001 = document.getElementById('ex29').value;
        }

        if (document.getElementById('r37').checked) {
            otra = document.getElementById('r37').value;
        } else if (document.getElementById('r37').checked) {
            otra = document.getElementById('r37').value;
        } else if (document.getElementById('r38').checked) {
            otra = document.getElementById('r38').value;
        }

        detalle2 = document.getElementById('ex30').value;

        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    bpa: bpa,
                    bpm: bpm,
                    manipulacion: manipulacion,
                    haccp: haccp,
                    co: co,
                    ft: ft,
                    rfa: rfa,
                    ecrc: ecrc,
                    iso9001: iso9001,
                    iso14001: iso14001,
                    detalle2: detalle2,
                    otra: otra,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 17;
        } else {
            enter++;
            countClicks = 16;
            if (enter >= 2 && !error) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }
    } //Fin de 16
    if (countClicks == 17) {
        var t12, r26;
        var prox = false;
        var skip = true;
        var error = false;
        if (document.getElementById("t12").value != "")
            if (document.getElementById('rr37').checked || document.getElementById('rr38').checked) {
                prox = true;

                if (document.getElementById("t12").value.length > 400) {
                    prox = false;
                    error = true;
                    alert("En los campos de texto no deben ir más de 400 caracteres");
                }
                if (document.getElementById('rr37').checked) {
                    enter = 0;
                    prox = true;
                    skip = false;
                    r26 = document.getElementById('rr37').value;
                    t12 = document.getElementById("t12").value;
                    $("#carouselExampleControls").carousel("next");
                    $.ajax({
                        type: "POST",
                        url: "save.php",
                        data: {
                            cont: countClicks,
                            t12: t12,
                            r26: r26,
                            id: id
                        },
                        success: function (data) {}
                    });
                    countClicks = 40;
                }
            }

        t12 = document.getElementById("t12").value;

        if (document.getElementById('rr37').checked) {
            r26 = document.getElementById('rr37').value;
        } else if (document.getElementById('rr38').checked) {
            r26 = document.getElementById('rr38').value;
        }

        if (prox && skip) {
            enter = 0;
            $("#carouselExampleControls").carousel(18);
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    t12: t12,
                    r26: r26,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 41;
        } else if (!prox && !skip) {
            enter++;
            countClicks = 17;
            if (enter >= 2 && !error) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        } else if (!prox && skip) {
            enter++;
            countClicks = 17;
            if (enter >= 2 & !error) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }
    } //Fin de 17

    if (countClicks == 40) {
        var t13;
        var prox = false;
        var error = false;

        if (document.getElementById("t13").value != "") {
            prox = true;

            if (document.getElementById("t13").value.length > 400) {
                prox = false;
                error = true;
                alert("En los campos de texto no deben ir más de 400 caracteres");
            }
        }

        t13 = document.getElementById("t13").value;
        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    t13: t13,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 41;
        } else {
            enter++;
            countClicks = 40;
            if (enter >= 2 & !error) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }
    }

    if (countClicks == 41) {
        var r28;
        var prox = false;
        if (document.getElementById('rr39').checked || document.getElementById('rrr39').checked ||
            document.getElementById('r40').checked) {
            prox = true;
        }

        if (document.getElementById('rr39').checked) {
            r28 = document.getElementById('rr39').value;
        } else if (document.getElementById('rrr39').checked) {
            r28 = document.getElementById('rrr39').value;
        } else if (document.getElementById('r40').checked) {
            r28 = document.getElementById('r40').value;
        }

        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    r28: r28,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 18;
        } else {
            enter++;
            countClicks = 41;
            if (enter >= 2) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }
    }


    if (countClicks == 18) {
        var rn, mrn, mh, pm, ccss, rt;
        var prox = false;

        if (document.getElementById('r41').checked || document.getElementById('r42').checked)
            if (document.getElementById('r43').checked || document.getElementById('r44').checked)
                if (document.getElementById('r45').checked || document.getElementById('r46').checked)
                    if (document.getElementById('r47').checked || document.getElementById('r48').checked)
                        if (document.getElementById('r49').checked || document.getElementById('r50').checked)
                            if (document.getElementById('r51').checked || document.getElementById('r52').checked) {
                                prox = true;
                            }

        if (document.getElementById('r41').checked) {
            rn = document.getElementById('r41').value;
        } else if (document.getElementById('r42').checked) {
            rn = document.getElementById('r42').value;
        }

        if (document.getElementById('r43').checked) {
            mrn = document.getElementById('r43').value;
        } else if (document.getElementById('r44').checked) {
            mrn = document.getElementById('r44').value;
        }

        if (document.getElementById('r45').checked) {
            mh = document.getElementById('r45').value;
        } else if (document.getElementById('r46').checked) {
            mh = document.getElementById('r46').value;
        }

        if (document.getElementById('r47').checked) {
            pm = document.getElementById('r47').value;
        } else if (document.getElementById('r48').checked) {
            pm = document.getElementById('r48').value;
        }

        if (document.getElementById('r49').checked) {
            ccss = document.getElementById('r49').value;
        } else if (document.getElementById('r50').checked) {
            ccss = document.getElementById('r50').value;
        }

        if (document.getElementById('r51').checked) {
            rt = document.getElementById('r51').value;
        } else if (document.getElementById('r52').checked) {
            rt = document.getElementById('r52').value;
        }

        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    rn: rn,
                    mrn: mrn,
                    mh: mh,
                    pm: pm,
                    ccss: ccss,
                    rt: rt,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 19;
        } else {
            enter++;
            countClicks = 18;
            if (enter >= 2) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }
    } //Fin de 18

    if (countClicks == 19) {
        var r30, r31;
        var prox = false;
        var skip = true;

        if (document.getElementById('r53').checked || document.getElementById('r54').checked)
            if (document.getElementById('r55').checked || document.getElementById('r56').checked) {
                prox = true;

                if (document.getElementById('r55').checked) {
                    enter = 0;
                    prox = true;
                    skip = false;
                    if (document.getElementById('r53').checked) {
                        r30 = document.getElementById('r53').value;
                    } else if (document.getElementById('r54').checked) {
                        r30 = document.getElementById('r55').value;
                    }

                    r31 = document.getElementById('r55').value;
                    $("#carouselExampleControls").carousel("next");

                    $.ajax({
                        type: "POST",
                        url: "save.php",
                        data: {
                            cont: countClicks,
                            r30: r30,
                            r31: r31,
                            id: id
                        },
                        success: function (data) {}
                    });
                    countClicks = 42;
                }
            }

        if (document.getElementById('r53').checked) {
            r30 = document.getElementById('r53').value;
        } else if (document.getElementById('r54').checked) {
            r30 = document.getElementById('r54').value;
        }

        if (document.getElementById('r55').checked) {
            r31 = document.getElementById('r55').value;
        } else if (document.getElementById('r56').checked) {
            r31 = document.getElementById('r56').value;
        }

        if (prox && skip) {
            enter = 0;
            $("#carouselExampleControls").carousel(22);
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    r30: r30,
                    r31: r31,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 43;
        } else if (!prox && !skip) {
            enter++;
            countClicks = 19;
            if (enter >= 2) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        } else if (!prox && skip) {
            enter++;
            countClicks = 19;
            if (enter >= 2) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }

    } //Fin de 19


    if (countClicks == 42) {
        var tex;
        var prox = false;
        var error = false;

        if (document.getElementById("ex31").value != "") {
            prox = true;

            if (document.getElementById("ex31").value.length > 400) {
                prox = false;
                error = true;
                alert("En los campos de texto no deben ir más de 400 caracteres");
            }
        }

        tex = document.getElementById("ex31").value;

        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    tex: tex,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 43;
        } else if (!prox) {
            enter++;
            countClicks = 42;
            if (enter >= 2 && !error) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }

    } // Fin de 42
    else if (countClicks == 43) {
        var al;
        var prox = false;
        var skip = true;

        if (document.getElementById("ex32").checked || document.getElementById("ex33").checked) {
            prox = true;
            if (document.getElementById("ex32").checked) {
                prox = true;
                skip = false;
                al = document.getElementById('ex32').value;
                $("#carouselExampleControls").carousel("next");
                $.ajax({
                    type: "POST",
                    url: "save.php",
                    data: {
                        cont: countClicks,
                        al: al,
                        id: id
                    },
                    success: function (data) {}
                });
                countClicks = 44;
                enter = 0;
            }
        }

        if (document.getElementById('ex32').checked) {
            al = document.getElementById('ex32').value;
        } else if (document.getElementById('ex33').checked) {
            al = document.getElementById('ex33').value;
        }

        if (prox && skip) {
            enter = 0;
            $("#carouselExampleControls").carousel(25);
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    al: al,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 22;
        } else if (!prox && !skip) {
            enter++;
            countClicks = 43;
            if (enter >= 2) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        } else if (!prox && skip) {
            enter++;
            countClicks = 43;
            if (enter >= 2) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }

    } //Fin de 43

    if (countClicks == 44) {
        var es;
        var prox = false;
        var error = false;

        if (document.getElementById("ex34").value != "") {
            prox = true;

            if (document.getElementById("ex34").value.length > 400) {
                prox = false;
                error = true;
                alert("En los campos de texto no deben ir más de 400 caracteres");
            }
        }

        es = document.getElementById("ex34").value;

        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    es: es,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 21;
        } else {
            enter++;
            countClicks = 44;
            if (enter >= 2 && !error) {
                alert(enter);
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }

    } // Fin de 44

    if (countClicks == 21) {
        var c32, c33, c34, c35, c36, c37, c38, c39;
        var prox = false;

        if (document.getElementById("c32").checked || document.getElementById("c33").checked ||
            document.getElementById("c34").checked || document.getElementById("c35").checked ||
            document.getElementById("c36").checked || document.getElementById("c37").checked ||
            document.getElementById("c38").checked || document.getElementById("c39").checked) {
            prox = true;
        }

        c32 = document.getElementById("c32").checked;
        c33 = document.getElementById("c33").checked;
        c34 = document.getElementById("c34").checked;
        c35 = document.getElementById("c35").checked;
        c36 = document.getElementById("c36").checked;
        c37 = document.getElementById("c37").checked;
        c38 = document.getElementById("c38").checked;
        c39 = document.getElementById("c39").checked;

        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    c32: c32,
                    c33: c33,
                    c34: c34,
                    c35: c35,
                    c36: c36,
                    c37: c37,
                    c38: c38,
                    c39: c39,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 22;
        } else {
            enter++;
            countClicks = 21;
            if (enter >= 2) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }


    } //Fin de 21
    if (countClicks == 22) {
        var r35, r36;
        var prox = false;
        var skip = true;

        if (document.getElementById('r57').checked || document.getElementById('r58').checked)
            if (document.getElementById('r59').checked || document.getElementById('r60').checked ||
                document.getElementById('r61').checked || document.getElementById('r62').checked) {
                prox = true;

                if (document.getElementById('r57').checked) {
                    prox = true;
                    skip = false;
                    r35 = document.getElementById('r57').value;

                    if (document.getElementById('r59').checked) {
                        r36 = document.getElementById('r59').value;
                    } else if (document.getElementById('r60').checked) {
                        r36 = document.getElementById('r60').value;
                    } else if (document.getElementById('r61').checked) {
                        r36 = document.getElementById('r61').value;
                    } else if (document.getElementById('r62').checked) {
                        r36 = document.getElementById('r62').value;
                    }
                    enter = 0;
                    $("#carouselExampleControls").carousel("next");
                    $.ajax({
                        type: "POST",
                        url: "save.php",
                        data: {
                            cont: countClicks,
                            r35: r35,
                            r36: r36,
                            id: id
                        },
                        success: function (data) {}
                    });
                    countClicks = 23;
                }
            }

        if (document.getElementById('r57').checked) {
            r35 = document.getElementById('r57').value;
        } else if (document.getElementById('r58').checked) {
            r35 = document.getElementById('r58').value;
        }

        if (document.getElementById('r59').checked) {
            r36 = document.getElementById('r59').value;
        } else if (document.getElementById('r60').checked) {
            r36 = document.getElementById('r60').value;
        } else if (document.getElementById('r61').checked) {
            r36 = document.getElementById('r61').value;
        } else if (document.getElementById('r62').checked) {
            r36 = document.getElementById('r62').value;
        }


        if (prox && skip) {
            enter = 0;
            $("#carouselExampleControls").carousel(27);
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    r35: r35,
                    r36: r36,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 24;
        } else if (!prox && !skip) {
            enter++;
            countClicks = 22;
            if (enter >= 2) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        } else if (!prox && skip) {
            enter++;
            countClicks = 22;
            if (enter >= 2) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }

    } //Fin de 22

    if (countClicks == 23) {
        var r37, tr13;
        var prox = false;
        var error = false;

        if (document.getElementById("tr13").value != "") {
            prox = true;

            if (document.getElementById("tr13").value.length > 400) {
                prox = false;
                error = true;
                alert("En los campos de texto no deben ir más de 400 caracteres");
            }
        }

        tr13 = document.getElementById("tr13").value;

        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    tr13: tr13,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 24;
        } else {
            enter++;
            countClicks = 23;
            if (enter >= 2 && !error) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }
    } //Fin de 23
    else if (countClicks == 24) {
        var r38;
        var prox = false;
        var skip = true;

        if (document.getElementById('r65').checked || document.getElementById('r66').checked) {
            prox = true;
            if (document.getElementById('r65').checked) {
                prox = true;
                skip = false;
                r38 = document.getElementById('r65').value;
                enter = 0;
                $("#carouselExampleControls").carousel("next");
                $.ajax({
                    type: "POST",
                    url: "save.php",
                    data: {
                        cont: countClicks,
                        r38: r38,
                        id: id
                    },
                    success: function (data) {}
                });
                countClicks = 45;
            }
        }

        if (document.getElementById('r65').checked) {
            r38 = document.getElementById('r65').value;
        } else if (document.getElementById('r66').checked) {
            r38 = document.getElementById('r66').value;
        }

        if (prox && skip) {
            enter = 0;
            $("#carouselExampleControls").carousel(29);
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    r38: r38,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 25;
        } else if (!prox && !skip) {
            enter++;
            countClicks = 24;
            if (enter >= 2) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        } else if (!prox && skip) {
            enter++;
            countClicks = 24;
            if (enter >= 2) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }
    } //Fin de 24 */


    if (countClicks == 45) {
        var producto, mercado;
        var prox = false;
        var error = false;

        if (document.getElementById("trr13").value != "" && document.getElementById("t14").value != "") {
            prox = true;

            if (document.getElementById("trr13").value.length > 400) {
                prox = false;
                error = true;
                alert("En los campos de texto no deben ir más de 400 caracteres");
            }

            if (document.getElementById("t14").value.length > 400) {
                prox = false;
                error = true;
                alert("En los campos de texto no deben ir más de 400 caracteres");
            }
        }

        producto = document.getElementById("trr13").value;
        mercado = document.getElementById("t14").value;

        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    producto: producto,
                    mercado: mercado,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 25;
        } else {
            enter++;
            countClicks = 45;
            if (enter >= 2 && !error) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }
    }


    if (countClicks == 25) {
        var m1, m2, m3, m4, m5, m6, m7, m8, m9, m10, m11, m12, m13, m14, m15, m16, m17;
        var prox = false;
        var error = false;

        if (document.getElementById('rr41').checked || document.getElementById('rr42').checked)
            if (document.getElementById('rr43').checked || document.getElementById('rr44').checked)
                if (document.getElementById('rr45').checked || document.getElementById('rr46').checked)
                    if (document.getElementById('rr47').checked || document.getElementById('rr48').checked)
                        if (document.getElementById('rr49').checked || document.getElementById('rr50').checked)
                            if (document.getElementById('rr51').checked || document.getElementById('rr52').checked)
                                if (document.getElementById('rr53').checked || document.getElementById('rr54').checked)
                                    if (document.getElementById('rr55').checked || document.getElementById('rr56').checked)
                                        if (document.getElementById('rr57').checked || document.getElementById('rr58').checked)
                                            if (document.getElementById('rr59').checked || document.getElementById('rr60').checked)
                                                if (document.getElementById('rr61').checked || document.getElementById('rr62').checked)
                                                    if (document.getElementById('rr63').checked || document.getElementById('rr64').checked)
                                                        if (document.getElementById('rr65').checked || document.getElementById('rr66').checked)
                                                            if (document.getElementById('rr67').checked || document.getElementById('rr68').checked)
                                                                if (document.getElementById('rr69').checked || document.getElementById('rr70').checked)
                                                                    if (document.getElementById('rr71').checked || document.getElementById('rr72').checked)
                                                                        if (document.getElementById('rr73').checked || document.getElementById('rr74').checked) {
                                                                            prox = true;
                                                                            if (document.getElementById('rr73').checked)
                                                                                if (document.getElementById('otro').value == "") {
                                                                                    prox = false;
                                                                                }
                                                                            else if (document.getElementById('otro').value != "") {
                                                                                if (document.getElementById("otro").value.length > 400) {
                                                                                    prox = false;
                                                                                    error = true;
                                                                                    alert("En los campos de texto no deben ir más de 400 caracteres");
                                                                                }
                                                                            }
                                                                        }

        $('#rr73').click(function () {
            $("#otro").prop('disabled', false);
        });

        $('#rr74').click(function () {
            $("#otro").prop('disabled', true);
            o1 = "";
        });

        if (document.getElementById('rr41').checked) {
            m1 = document.getElementById('rr41').value;
        } else if (document.getElementById('rr42').checked) {
            m1 = document.getElementById('rr42').value;
        }

        if (document.getElementById('rr43').checked) {
            m2 = document.getElementById('rr43').value;
        } else if (document.getElementById('rr44').checked) {
            m2 = document.getElementById('rr44').value;
        }

        if (document.getElementById('rr45').checked) {
            m3 = document.getElementById('rr45').value;
        } else if (document.getElementById('rr46').checked) {
            m3 = document.getElementById('rr46').value;
        }

        if (document.getElementById('rr47').checked) {
            m4 = document.getElementById('rr47').value;
        } else if (document.getElementById('rr48').checked) {
            m4 = document.getElementById('rr48').value;
        }

        if (document.getElementById('rr49').checked) {
            m5 = document.getElementById('rr49').value;
        } else if (document.getElementById('rr50').checked) {
            m5 = document.getElementById('rr50').value;
        }
        if (document.getElementById('rr51').checked) {
            m6 = document.getElementById('rr51').value;
        } else if (document.getElementById('rr52').checked) {
            m6 = document.getElementById('rr52').value;
        }
        if (document.getElementById('rr53').checked) {
            m7 = document.getElementById('rr53').value;
        } else if (document.getElementById('rr54').checked) {
            m7 = document.getElementById('rr54').value;
        }
        if (document.getElementById('rr55').checked) {
            m8 = document.getElementById('rr55').value;
        } else if (document.getElementById('rr56').checked) {
            m8 = document.getElementById('rr56').value;
        }
        if (document.getElementById('rr57').checked) {
            m9 = document.getElementById('rr57').value;
        } else if (document.getElementById('rr58').checked) {
            m9 = document.getElementById('rr58').value;
        }
        if (document.getElementById('rr59').checked) {
            m10 = document.getElementById('rr59').value;
        } else if (document.getElementById('rr60').checked) {
            m10 = document.getElementById('rr60').value;
        }
        if (document.getElementById('rr61').checked) {
            m11 = document.getElementById('rr61').value;
        } else if (document.getElementById('rr62').checked) {
            m11 = document.getElementById('rr62').value;
        }
        if (document.getElementById('rr63').checked) {
            m12 = document.getElementById('rr63').value;
        } else if (document.getElementById('rr64').checked) {
            m12 = document.getElementById('rr64').value;
        }
        if (document.getElementById('rr65').checked) {
            m13 = document.getElementById('rr65').value;
        } else if (document.getElementById('rr66').checked) {
            m13 = document.getElementById('rr66').value;
        }
        if (document.getElementById('rr67').checked) {
            m14 = document.getElementById('rr67').value;
        } else if (document.getElementById('rr68').checked) {
            m14 = document.getElementById('rr68').value;
        }
        if (document.getElementById('rr69').checked) {
            m15 = document.getElementById('rr69').value;
        } else if (document.getElementById('rr70').checked) {
            m15 = document.getElementById('rr70').value;
        }
        if (document.getElementById('rr71').checked) {
            m16 = document.getElementById('rr71').value;
        } else if (document.getElementById('rr72').checked) {
            m16 = document.getElementById('rr72').value;
        }
        if (document.getElementById('rr73').checked) {
            m17 = document.getElementById('rr73').value;
        } else if (document.getElementById('rr74').checked) {
            m17 = document.getElementById('rr74').value;
        }
        var o1 = document.getElementById('otro').value;

        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    m1: m1,
                    m2: m2,
                    m3: m3,
                    m4: m4,
                    m5: m5,
                    m6: m6,
                    m7: m7,
                    m8: m8,
                    m9: m9,
                    m10: m10,
                    m11: m11,
                    m12: m12,
                    m13: m13,
                    m14: m14,
                    m15: m15,
                    m16: m16,
                    m17: m17,
                    o1: o1,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 26;
        } else {
            enter++;
            countClicks = 25;
            if (enter >= 2 && !error) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }

    } //Fin de 25
    if (countClicks == 26) {
        var prox = false;
        var skip = true;
        var trrr13, f;
        var error = false;

        if (document.getElementById('trrr13').value != "")
            if (document.getElementById('r75').checked || document.getElementById('r76').checked) {
                prox = true;
                if (document.getElementById("trrr13").value.length > 400) {
                    prox = false;
                    error = true;
                    alert("En los campos de texto no deben ir más de 400 caracteres");
                }
                if (document.getElementById('r75').checked) {
                    prox = true;
                    skip = false;
                    enter = 0;
                    trrr13 = document.getElementById('trrr13').value;
                    f = document.getElementById('r75').value;
                    $("#carouselExampleControls").carousel("next");
                    $.ajax({
                        type: "POST",
                        url: "save.php",
                        data: {
                            cont: countClicks,
                            trrr13: trrr13,
                            f: f,
                            id: id
                        },
                        success: function (data) {}
                    });
                    countClicks = 46;
                }
            }
        trrr13 = document.getElementById('trrr13').value;
        if (document.getElementById('r75').checked) {
            f = document.getElementById('r75').value;
        } else if (document.getElementById('r76').checked) {
            f = document.getElementById('r76').value;
        }

        if (prox && skip) {
            enter = 0;
            $("#carouselExampleControls").carousel(32);
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    trrr13: trrr13,
                    f: f,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 27;
        } else if (!prox && !skip) {
            enter++;
            countClicks = 26;
            if (enter >= 2) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        } else if (!prox && skip) {
            enter++;
            countClicks = 26;
            if (enter >= 2) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }

    } //Fin de 26

    if (countClicks == 46) {
        var s1, s2, s3, s4, s5, s6, s7, s8, s9, s10, s11, s12, s13, s14, s15, s16, s17;
        var prox = false;

        if (document.getElementById('r77').checked || document.getElementById('r78').checked)
            if (document.getElementById('r79').checked || document.getElementById('r80').checked)
                if (document.getElementById('r81').checked || document.getElementById('r82').checked)
                    if (document.getElementById('r83').checked || document.getElementById('r84').checked)
                        if (document.getElementById('r85').checked || document.getElementById('r86').checked)
                            if (document.getElementById('r87').checked || document.getElementById('r88').checked)
                                if (document.getElementById('r89').checked || document.getElementById('r90').checked)
                                    if (document.getElementById('r91').checked || document.getElementById('r92').checked)
                                        if (document.getElementById('r93').checked || document.getElementById('r94').checked)
                                            if (document.getElementById('r95').checked || document.getElementById('r96').checked)
                                                if (document.getElementById('r97').checked || document.getElementById('r98').checked)
                                                    if (document.getElementById('r99').checked || document.getElementById('r100').checked)
                                                        if (document.getElementById('r101').checked || document.getElementById('r102').checked)
                                                            if (document.getElementById('r103').checked || document.getElementById('r104').checked)
                                                                if (document.getElementById('r105').checked || document.getElementById('r106').checked)
                                                                    if (document.getElementById('r107').checked || document.getElementById('r108').checked)
                                                                        if (document.getElementById('rr109').checked || document.getElementById('r109').checked)
                                                                            if (document.getElementById('r109').checked) {
                                                                                if (document.getElementById('otro2').value != "") {
                                                                                    prox = true;

                                                                                    if (document.getElementById("otro2").value.length > 400) {
                                                                                        prox = false;
                                                                                        error = true;
                                                                                        alert("En los campos de texto no deben ir más de 400 caracteres");
                                                                                    }
                                                                                } else prox = false;
                                                                            }

        if (document.getElementById('r110').checked || document.getElementById('r111').checked)
            if (document.getElementById('r112').checked || document.getElementById('r113').checked)
                if (document.getElementById('r114').checked || document.getElementById('r115').checked)
                    if (document.getElementById('r116').checked || document.getElementById('r117').checked)
                        if (document.getElementById('r118').checked || document.getElementById('r119').checked)
                            if (document.getElementById('r120').checked || document.getElementById('r121').checked) {
                                prox = true;
                                if (document.getElementById('r120').checked)
                                    if (document.getElementById('t15').value != "") {
                                        prox = true;

                                        if (document.getElementById("t15").value.length > 400) {
                                            prox = false;
                                            error = true;
                                            alert("En los campos de texto no deben ir más de 400 caracteres");
                                        }
                                    }
                                else if (document.getElementById('t15').value == "") prox = false;
                            }

        $('#r109').click(function () {
            $("#otro2").prop('disabled', false);
        });

        $('#rr109').click(function () {
            $("#otro2").prop('disabled', true);
            otro2 = "";
        });

        $('#r120').click(function () {
            $("#t15").prop('disabled', false);
        });

        $('#r121').click(function () {
            $("#t15").prop('disabled', true);
            t15 = "";
        });

        if (document.getElementById('r77').checked) {
            s1 = document.getElementById('r77').value;
        } else if (document.getElementById('r78').checked) {
            s1 = document.getElementById('r78').value;
        }

        if (document.getElementById('r79').checked) {
            s2 = document.getElementById('r79').value;
        } else if (document.getElementById('r80').checked) {
            s2 = document.getElementById('r80').value;
        }

        if (document.getElementById('r81').checked) {
            s3 = document.getElementById('r81').value;
        } else if (document.getElementById('r82').checked) {
            s3 = document.getElementById('r82').value;
        }

        if (document.getElementById('r83').checked) {
            s4 = document.getElementById('r83').value;
        } else if (document.getElementById('r84').checked) {
            s4 = document.getElementById('r84').value;
        }

        if (document.getElementById('r85').checked) {
            s5 = document.getElementById('r85').value;
        } else if (document.getElementById('r86').checked) {
            s5 = document.getElementById('r86').value;
        }
        if (document.getElementById('r87').checked) {
            s6 = document.getElementById('r87').value;
        } else if (document.getElementById('r88').checked) {
            s6 = document.getElementById('r88').value;
        }
        if (document.getElementById('r89').checked) {
            s7 = document.getElementById('r89').value;
        } else if (document.getElementById('r90').checked) {
            s7 = document.getElementById('r90').value;
        }
        if (document.getElementById('r91').checked) {
            s8 = document.getElementById('r91').value;
        } else if (document.getElementById('r92').checked) {
            s8 = document.getElementById('r92').value;
        }
        if (document.getElementById('r93').checked) {
            s9 = document.getElementById('r93').value;
        } else if (document.getElementById('r94').checked) {
            s9 = document.getElementById('r94').value;
        }
        if (document.getElementById('r95').checked) {
            s10 = document.getElementById('r95').value;
        } else if (document.getElementById('r96').checked) {
            s10 = document.getElementById('r96').value;
        }
        if (document.getElementById('r97').checked) {
            s11 = document.getElementById('r97').value;
        } else if (document.getElementById('r98').checked) {
            s11 = document.getElementById('r98').value;
        }
        if (document.getElementById('r99').checked) {
            s12 = document.getElementById('r99').value;
        } else if (document.getElementById('r100').checked) {
            s12 = document.getElementById('r100').value;
        }
        if (document.getElementById('r101').checked) {
            s13 = document.getElementById('r101').value;
        } else if (document.getElementById('r102').checked) {
            s13 = document.getElementById('r102').value;
        }
        if (document.getElementById('r103').checked) {
            s14 = document.getElementById('r103').value;
        } else if (document.getElementById('r104').checked) {
            s14 = document.getElementById('r104').value;
        }
        if (document.getElementById('r105').checked) {
            s15 = document.getElementById('r105').value;
        } else if (document.getElementById('r106').checked) {
            s15 = document.getElementById('r106').value;
        }
        if (document.getElementById('r107').checked) {
            s16 = document.getElementById('r107').value;
        } else if (document.getElementById('r108').checked) {
            s16 = document.getElementById('r108').value;
        }
        if (document.getElementById('rr109').checked) {
            s17 = document.getElementById('rr109').value;
        } else if (document.getElementById('r109').checked) {
            s17 = document.getElementById('r109').value;
        }
        var otro2 = document.getElementById('otro2').value;
        var t15 = document.getElementById('t15').value;
        /*fines*/
        var f1, f2, f3, f4, f5, f6;
        if (document.getElementById('r110').checked) {
            f1 = document.getElementById('r110').value;
        } else if (document.getElementById('r111').checked) {
            f1 = document.getElementById('r111').value;
        }
        if (document.getElementById('r112').checked) {
            f2 = document.getElementById('r112').value;
        } else if (document.getElementById('r113').checked) {
            f2 = document.getElementById('r113').value;
        }
        if (document.getElementById('r114').checked) {
            f3 = document.getElementById('r114').value;
        } else if (document.getElementById('r115').checked) {
            f3 = document.getElementById('r115').value;
        }
        if (document.getElementById('r116').checked) {
            f4 = document.getElementById('r116').value;
        } else if (document.getElementById('r117').checked) {
            f4 = document.getElementById('r117').value;
        }
        if (document.getElementById('r118').checked) {
            f5 = document.getElementById('r118').value;
        } else if (document.getElementById('r119').checked) {
            f5 = document.getElementById('r119').value;
        }
        if (document.getElementById('r120').checked) {
            f6 = document.getElementById('r120').value;
        } else if (document.getElementById('r121').checked) {
            f6 = document.getElementById('r121').value;
        }

        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    otro2: otro2,
                    s1: s1,
                    s2: s2,
                    s3: s3,
                    s4: s4,
                    s5: s5,
                    s6: s6,
                    s7: s7,
                    s8: s8,
                    s9: s9,
                    s10: s10,
                    s11: s11,
                    s12: s12,
                    s13: s13,
                    s14: s14,
                    s15: s15,
                    s16: s16,
                    s17: s17,
                    f1: f1,
                    f2: f2,
                    f3: f3,
                    f4: f4,
                    f5: f5,
                    f6: f6,
                    t15: t15,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 27;
        } else {
            enter++;
            countClicks = 46;
            if (enter >= 2 && !error) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }

    } // Fin de 46



    if (countClicks == 27) {
        var r43;
        var prox = false;
        var skip = true;

        if (document.getElementById('rr121').checked || document.getElementById('rr122').checked) {
            prox = true;
            if (document.getElementById('rr121').checked) {
                prox = true;
                skip = false;
                r43 = document.getElementById('rr121').value;
                enter = 0;
                $("#carouselExampleControls").carousel("next");
                $.ajax({
                    type: "POST",
                    url: "save.php",
                    data: {
                        cont: countClicks,
                        t12: t12,
                        r43: r43,
                        id: id
                    },
                    success: function (data) {}
                });
                countClicks = 47;
            }
        }

        if (document.getElementById('rr121').checked) {
            r43 = document.getElementById('rr121').value;
        } else if (document.getElementById('rr122').checked) {
            r43 = document.getElementById('rr122').value;
        }

        if (prox && skip) {
            enter = 0;
            $("#carouselExampleControls").carousel(34);
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    r43: r43,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 28;
        } else if (!prox && !skip) {
            enter++;
            countClicks = 27;
            if (enter >= 2) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        } else if (!prox && skip) {
            enter++;
            countClicks = 27;
            if (enter >= 2) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }

    } //Fin de 27

    if (countClicks == 47) {
        var prox = false;
        var z1, z2, z3, z4, z5, z6, z7, z8;
        var error = false;

        if (document.getElementById('r122').checked || document.getElementById('r123').checked)
            if (document.getElementById('r124').checked || document.getElementById('r125').checked)
                if (document.getElementById('r126').checked || document.getElementById('r127').checked)
                    if (document.getElementById('r128').checked || document.getElementById('r129').checked)
                        if (document.getElementById('r130').checked || document.getElementById('r131').checked)
                            if (document.getElementById('r132').checked || document.getElementById('r133').checked)
                                if (document.getElementById('r134').checked || document.getElementById('r135').checked)
                                    if (document.getElementById('r136').checked || document.getElementById('r137').checked) {
                                        prox = true;
                                        if (document.getElementById('r136').checked)
                                            if (document.getElementById('tr15').value == "")
                                                prox = false;
                                            else if (document.getElementById('tr15').value != "") {
                                            if (document.getElementById("tr15").value.length > 400) {
                                                prox = false;
                                                error = true;
                                                alert("En los campos de texto no deben ir más de 400 caracteres");
                                            }
                                        }
                                    }
        $('#r136').click(function () {
            $("#tr15").prop('disabled', false);
        });

        $('#r137').click(function () {
            $("#tr15").prop('disabled', true);
            otro4 = "";
        });

        if (document.getElementById('r122').checked) {
            z1 = document.getElementById('r122').value;
        } else if (document.getElementById('r123').checked) {
            z1 = document.getElementById('r123').value;
        }

        if (document.getElementById('r124').checked) {
            z2 = document.getElementById('r124').value;
        } else if (document.getElementById('r125').checked) {
            z2 = document.getElementById('r125').value;
        }

        if (document.getElementById('r126').checked) {
            z3 = document.getElementById('r126').value;
        } else if (document.getElementById('r127').checked) {
            z3 = document.getElementById('r127').value;
        }

        if (document.getElementById('r128').checked) {
            z4 = document.getElementById('r128').value;
        } else if (document.getElementById('r129').checked) {
            z4 = document.getElementById('r129').value;
        }

        if (document.getElementById('r130').checked) {
            z5 = document.getElementById('r130').value;
        } else if (document.getElementById('r131').checked) {
            z5 = document.getElementById('r131').value;
        }
        if (document.getElementById('r132').checked) {
            z6 = document.getElementById('r132').value;
        } else if (document.getElementById('r133').checked) {
            z6 = document.getElementById('r133').value;
        }
        if (document.getElementById('r134').checked) {
            z7 = document.getElementById('r134').value;
        } else if (document.getElementById('r135').checked) {
            z7 = document.getElementById('r135').value;
        }
        if (document.getElementById('r136').checked) {
            z8 = document.getElementById('r136').value;
        } else if (document.getElementById('r137').checked) {
            z8 = document.getElementById('r137').value;
        }
        var otro4 = document.getElementById('tr15').value;

        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    z1: z1,
                    z2: z2,
                    z3: z3,
                    z4: z4,
                    z5: z5,
                    z6: z6,
                    z7: z7,
                    z8: z8,
                    otro4: otro4,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 28;
        } else {
            enter++;
            countClicks = 47;
            if (enter >= 2 && !error) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }
    } // Fin de 47

    if (countClicks == 28) {
        var sub1, sub2, sub3, sub4, sub5, sub6, sub7, sub8, sub9, sub10, r45;
        var t6;
        var prox = false;
        var skip = true;
        var error = false;

        if (document.getElementById('r138').checked || document.getElementById('r139').checked)
            if (document.getElementById('r140').checked || document.getElementById('r141').checked)
                if (document.getElementById('r142').checked || document.getElementById('r143').checked)
                    if (document.getElementById('r144').checked || document.getElementById('r145').checked)
                        if (document.getElementById('r146').checked || document.getElementById('r147').checked)
                            if (document.getElementById('r148').checked || document.getElementById('r149').checked)
                                if (document.getElementById('r150').checked || document.getElementById('r151').checked)
                                    if (document.getElementById('r152').checked || document.getElementById('r153').checked)
                                        if (document.getElementById('r154').checked || document.getElementById('r155').checked)
                                            if (document.getElementById('r156').checked || document.getElementById('r157').checked) {
                                                prox = true;
                                                if (document.getElementById('r156').checked) {
                                                    if (document.getElementById('t16').value == "") {
                                                        prox = false;
                                                    } else {
                                                        if (document.getElementById("t16").value.length > 400) {
                                                            prox = false;
                                                            error = true;
                                                            alert("En los campos de texto no deben ir más de 400 caracteres");
                                                        }
                                                    }
                                                }

                                                if (document.getElementById('r158').checked || document.getElementById('r159').checked)
                                                    if (document.getElementById('r158').checked) {
                                                        skip = false;
                                                        r45 = document.getElementById('r158').value;

                                                        if (document.getElementById('r138').checked) {
                                                            sub1 = document.getElementById('r138').value;
                                                        } else if (document.getElementById('r139').checked) {
                                                            sub1 = document.getElementById('r139').value;
                                                        }

                                                        if (document.getElementById('r140').checked) {
                                                            sub2 = document.getElementById('r140').value;
                                                        } else if (document.getElementById('r141').checked) {
                                                            sub2 = document.getElementById('r141').value;
                                                        }

                                                        if (document.getElementById('r142').checked) {
                                                            sub3 = document.getElementById('r142').value;
                                                        } else if (document.getElementById('r143').checked) {
                                                            sub3 = document.getElementById('r143').value;
                                                        }

                                                        if (document.getElementById('r144').checked) {
                                                            sub4 = document.getElementById('r144').value;
                                                        } else if (document.getElementById('r145').checked) {
                                                            sub4 = document.getElementById('r145').value;
                                                        }
                                                        if (document.getElementById('r146').checked) {
                                                            sub5 = document.getElementById('r146').value;
                                                        } else if (document.getElementById('r147').checked) {
                                                            sub5 = document.getElementById('r147').value;
                                                        }
                                                        if (document.getElementById('r148').checked) {
                                                            sub6 = document.getElementById('r148').value;
                                                        } else if (document.getElementById('r149').checked) {
                                                            sub6 = document.getElementById('r149').value;
                                                        }
                                                        if (document.getElementById('r150').checked) {
                                                            sub7 = document.getElementById('r150').value;
                                                        } else if (document.getElementById('r151').checked) {
                                                            sub7 = document.getElementById('r151').value;
                                                        }
                                                        if (document.getElementById('r152').checked) {
                                                            sub8 = document.getElementById('r152').value;
                                                        } else if (document.getElementById('r153').checked) {
                                                            sub8 = document.getElementById('r153').value;
                                                        }
                                                        if (document.getElementById('r154').checked) {
                                                            sub9 = document.getElementById('r154').value;
                                                        } else if (document.getElementById('r155').checked) {
                                                            sub9 = document.getElementById('r155').value;
                                                        }
                                                        if (document.getElementById('r156').checked) {
                                                            sub10 = document.getElementById('r156').value;
                                                        } else if (document.getElementById('r157').checked) {
                                                            sub10 = document.getElementById('r157').value;
                                                        }
                                                        var otro5 = document.getElementById('t16').value;
                                                        if (prox) {
                                                            enter = 0;
                                                            $("#carouselExampleControls").carousel("next");
                                                            $.ajax({
                                                                type: "POST",
                                                                url: "save.php",
                                                                data: {
                                                                    cont: countClicks,
                                                                    r45: r45,
                                                                    sub1: sub1,
                                                                    sub2: sub2,
                                                                    sub3: sub3,
                                                                    sub4: sub4,
                                                                    sub5: sub5,
                                                                    sub6: sub6,
                                                                    sub7: sub7,
                                                                    sub8: sub8,
                                                                    sub9: sub9,
                                                                    sub10: sub10,
                                                                    otro5: otro5,
                                                                    id: id
                                                                },
                                                                success: function (data) {}
                                                            });
                                                            countClicks = 29;
                                                        }
                                                    }
                                            }

        $('#r156').click(function () {
            $("#t16").prop('disabled', false);
        });

        $('#r157').click(function () {
            $("#t16").prop('disabled', true);
            otro5 = "";
        });
        if (document.getElementById('r158').checked) {
            r45 = document.getElementById('r158').value;

        } else if (document.getElementById('r159').checked) {
            r45 = document.getElementById('r159').value;
        }

        if (document.getElementById('r138').checked) {
            sub1 = document.getElementById('r138').value;
        } else if (document.getElementById('r139').checked) {
            sub1 = document.getElementById('r139').value;
        }

        if (document.getElementById('r140').checked) {
            sub2 = document.getElementById('r140').value;
        } else if (document.getElementById('r141').checked) {
            sub2 = document.getElementById('r141').value;
        }

        if (document.getElementById('r142').checked) {
            sub3 = document.getElementById('r142').value;
        } else if (document.getElementById('r143').checked) {
            sub3 = document.getElementById('r143').value;
        }

        if (document.getElementById('r144').checked) {
            sub4 = document.getElementById('r144').value;
        } else if (document.getElementById('r145').checked) {
            sub4 = document.getElementById('r145').value;
        }
        if (document.getElementById('r146').checked) {
            sub5 = document.getElementById('r146').value;
        } else if (document.getElementById('r147').checked) {
            sub5 = document.getElementById('r147').value;
        }
        if (document.getElementById('r148').checked) {
            sub6 = document.getElementById('r148').value;
        } else if (document.getElementById('r149').checked) {
            sub6 = document.getElementById('r149').value;
        }
        if (document.getElementById('r150').checked) {
            sub7 = document.getElementById('r150').value;
        } else if (document.getElementById('r151').checked) {
            sub7 = document.getElementById('r151').value;
        }
        if (document.getElementById('r152').checked) {
            sub8 = document.getElementById('r152').value;
        } else if (document.getElementById('r153').checked) {
            sub8 = document.getElementById('r153').value;
        }
        if (document.getElementById('r154').checked) {
            sub9 = document.getElementById('r154').value;
        } else if (document.getElementById('r155').checked) {
            sub9 = document.getElementById('r155').value;
        }
        if (document.getElementById('r156').checked) {
            sub10 = document.getElementById('r156').value;
        } else if (document.getElementById('r157').checked) {
            sub10 = document.getElementById('r157').value;
        }
        var otro5 = document.getElementById('t16').value;

        if (prox && skip) {
            enter = 0;
            $("#carouselExampleControls").carousel(36);
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    r45: r45,
                    sub1: sub1,
                    sub2: sub2,
                    sub3: sub3,
                    sub4: sub4,
                    sub5: sub5,
                    sub6: sub6,
                    sub7: sub7,
                    sub8: sub8,
                    sub9: sub9,
                    sub10: sub10,
                    otro5: otro5,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 30;
        } else if (!prox && !skip) {
            enter++;
            countClicks = 28;
            if (enter >= 2 && !error) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        } else if (!prox && skip) {
            enter++;
            countClicks = 28;
            if (enter >= 2 && !error) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }

    } //Fin de 28


    if (countClicks == 29) {
        var r46;
        var prox = false;
        var error = false;
        r46 = "N/A";

        if (document.getElementById("t17").value != "") {
            prox = true;
            if (document.getElementById("t17").value.length > 400) {
                prox = false;
                error = true;
                alert("En los campos de texto no deben ir más de 400 caracteres");
            }
        }

        r46 = document.getElementById("t17").value;

        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    r46: r46,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 30;
        } else {
            enter++;
            countClicks = 29;
            if (enter >= 2 && !error) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }

    } //Fin de 29


    if (countClicks == 30) {
        var sec1, sec2, sec3, sec4, p1;
        var otro6;
        var tr18;
        var prox = false;
        var skip = true;

        if (document.getElementById('r160').checked || document.getElementById('r161').checked)
            if (document.getElementById('r162').checked || document.getElementById('r163').checked)
                if (document.getElementById('r164').checked || document.getElementById('r165').checked)
                    if (document.getElementById('r166').checked || document.getElementById('r167').checked) {
                        if (document.getElementById('r166').checked) {
                            if (document.getElementById('tr18').value == "") {
                                prox = false;
                            } else {
                                if (document.getElementById("tr18").value.length > 400) {
                                    prox = false;
                                    error = true;
                                    alert("En los campos de texto no deben ir más de 400 caracteres");
                                }
                            }
                        }
                    }

        if (document.getElementById('rr168').checked || document.getElementById('rr169').checked) {
            prox = true;
            if (document.getElementById('rr168').checked) {
                prox = true;
                skip = false;
                if (document.getElementById('r160').checked) {
                    sec1 = document.getElementById('r160').value;
                } else if (document.getElementById('r161').checked) {
                    sec1 = document.getElementById('r161').value;
                }

                if (document.getElementById('r162').checked) {
                    sec2 = document.getElementById('r162').value;
                } else if (document.getElementById('r163').checked) {
                    sec2 = document.getElementById('r163').value;
                }

                if (document.getElementById('r164').checked) {
                    sec3 = document.getElementById('r164').value;
                } else if (document.getElementById('r165').checked) {
                    sec3 = document.getElementById('r165').value;
                }

                if (document.getElementById('r166').checked) {
                    sec4 = document.getElementById('r166').value;
                } else if (document.getElementById('r167').checked) {
                    sec4 = document.getElementById('r167').value;
                }

                otro6 = document.getElementById('tr18').value;
                p1 = document.getElementById('rr168').value;
                enter = 0;
                $("#carouselExampleControls").carousel("next");
                $.ajax({
                    type: "POST",
                    url: "save.php",
                    data: {
                        cont: countClicks,
                        p1: p1,
                        sec1: sec1,
                        sec2: sec2,
                        sec3: sec3,
                        sec4: sec4,
                        otro6: otro6,
                        id: id
                    },
                    success: function (data) {}
                });
                countClicks = 31;
            }
        }

        $('#r166').click(function () {
            $("#tr18").prop('disabled', false);
        });

        $('#r167').click(function () {
            $("#tr18").prop('disabled', true);
            otro6 = "";
        });

        if (document.getElementById('r160').checked) {
            sec1 = document.getElementById('r160').value;
        } else if (document.getElementById('r161').checked) {
            sec1 = document.getElementById('r161').value;
        }

        if (document.getElementById('r162').checked) {
            sec2 = document.getElementById('r162').value;
        } else if (document.getElementById('r163').checked) {
            sec2 = document.getElementById('r163').value;
        }

        if (document.getElementById('r164').checked) {
            sec3 = document.getElementById('r164').value;
        } else if (document.getElementById('r165').checked) {
            sec3 = document.getElementById('r165').value;
        }

        if (document.getElementById('r166').checked) {
            sec4 = document.getElementById('r166').value;
        } else if (document.getElementById('r167').checked) {
            sec4 = document.getElementById('r167').value;
        }

        var otro6 = document.getElementById('tr18').value;

        if (document.getElementById('rr168').checked) {
            p1 = document.getElementById('rr168').value;
        } else if (document.getElementById('rr169').checked) {
            p1 = document.getElementById('rr169').value;
        }

        if (prox && skip) {
            enter = 0;
            $("#carouselExampleControls").carousel(38);
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    p1: p1,
                    sec1: sec1,
                    sec2: sec2,
                    sec3: sec3,
                    sec4: sec4,
                    otro6: otro6,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 32;
        } else if (!prox && !skip) {
            enter++;
            countClicks = 30;
            if (enter >= 2 && !error) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        } else if (!prox && skip) {
            enter++;
            countClicks = 30;
            if (enter >= 2 && !error) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }

    } //Fin de 30


    if (countClicks == 31) {
        var p2, p3, p4, p5, p6, p7, p8, p9, p10, p11, p12, p13, p14, p15, p16, p17;
        var prox = false;
        var error = false;

        if (document.getElementById('r168').checked || document.getElementById('r169').checked)
            if (document.getElementById('r170').checked || document.getElementById('r171').checked)
                if (document.getElementById('r172').checked || document.getElementById('r173').checked)
                    if (document.getElementById('r174').checked || document.getElementById('r175').checked)
                        if (document.getElementById('r176').checked || document.getElementById('r177').checked)
                            if (document.getElementById('r178').checked || document.getElementById('r179').checked)
                                if (document.getElementById('r180').checked || document.getElementById('r181').checked)
                                    if (document.getElementById('r182').checked || document.getElementById('r183').checked)
                                        if (document.getElementById('r184').checked || document.getElementById('r185').checked)
                                            if (document.getElementById('r186').checked || document.getElementById('r187').checked)
                                                if (document.getElementById('r188').checked || document.getElementById('r189').checked)
                                                    if (document.getElementById('r190').checked || document.getElementById('r191').checked)
                                                        if (document.getElementById('r192').checked || document.getElementById('r193').checked)
                                                            if (document.getElementById('r194').checked || document.getElementById('r195').checked) {
                                                                prox = true;
                                                                if (document.getElementById('r194').checked)
                                                                    if (document.getElementById('tr19').value == "") {
                                                                        prox = false;
                                                                    }
                                                                else {
                                                                    if (document.getElementById("tr19").value.length > 400) {
                                                                        prox = false;
                                                                        error = true;
                                                                        alert("En los campos de texto no deben ir más de 400 caracteres");
                                                                    }
                                                                }
                                                            }

        $('#r194').click(function () {
            $("#tr19").prop('disabled', false);
        });

        $('#r195').click(function () {
            $("#tr19").prop('disabled', true);
            otro7 = "";
        });

        if (document.getElementById('r168').checked) {
            p2 = document.getElementById('r168').value;
        } else if (document.getElementById('r169').checked) {
            p2 = document.getElementById('r169').value;
        }

        if (document.getElementById('r170').checked) {
            p3 = document.getElementById('r170').value;
        } else if (document.getElementById('r171').checked) {
            p3 = document.getElementById('r171').value;
        }

        if (document.getElementById('r172').checked) {
            p4 = document.getElementById('r172').value;
        } else if (document.getElementById('r173').checked) {
            p4 = document.getElementById('r173').value;
        }

        if (document.getElementById('r174').checked) {
            p5 = document.getElementById('r174').value;
        } else if (document.getElementById('r175').checked) {
            p5 = document.getElementById('r175').value;
        }

        if (document.getElementById('r176').checked) {
            p6 = document.getElementById('r176').value;
        } else if (document.getElementById('r177').checked) {
            p6 = document.getElementById('r177').value;
        }
        if (document.getElementById('r178').checked) {
            p7 = document.getElementById('r178').value;
        } else if (document.getElementById('r179').checked) {
            p7 = document.getElementById('r179').value;
        }
        if (document.getElementById('r180').checked) {
            p8 = document.getElementById('r180').value;
        } else if (document.getElementById('r181').checked) {
            p8 = document.getElementById('r181').value;
        }
        if (document.getElementById('r182').checked) {
            p9 = document.getElementById('r182').value;
        } else if (document.getElementById('r183').checked) {
            p9 = document.getElementById('r183').value;
        }
        if (document.getElementById('r184').checked) {
            p10 = document.getElementById('r184').value;
        } else if (document.getElementById('r185').checked) {
            p10 = document.getElementById('r185').value;
        }
        if (document.getElementById('r186').checked) {
            p11 = document.getElementById('r186').value;
        } else if (document.getElementById('r187').checked) {
            p11 = document.getElementById('r187').value;
        }
        if (document.getElementById('r188').checked) {
            p12 = document.getElementById('r188').value;
        } else if (document.getElementById('r189').checked) {
            p12 = document.getElementById('r189').value;
        }
        if (document.getElementById('r190').checked) {
            p13 = document.getElementById('r190').value;
        } else if (document.getElementById('r191').checked) {
            p13 = document.getElementById('r191').value;
        }
        if (document.getElementById('r192').checked) {
            p14 = document.getElementById('r192').value;
        } else if (document.getElementById('r193').checked) {
            p14 = document.getElementById('r193').value;
        }
        if (document.getElementById('r194').checked) {
            p15 = document.getElementById('r194').value;
        } else if (document.getElementById('r195').checked) {
            p15 = document.getElementById('r195').value;
        }
        var otro7 = document.getElementById('tr19').value;

        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    r43: r43,
                    p1: p1,
                    p2: p2,
                    p3: p3,
                    p4: p4,
                    p5: p5,
                    p6: p6,
                    p7: p7,
                    p8: p8,
                    p9: p9,
                    p10: p10,
                    p11: p11,
                    p12: p12,
                    p13: p13,
                    p14: p14,
                    p15: p15,
                    otro7: otro7,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 32;
        } else {
            enter++;
            countClicks = 31;
            if (enter >= 2 && !error) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }

    } //Fin de 31


    if (countClicks == 32) {
        var re1, re2, re3, re4;
        var prox = false;

        if (document.getElementById('r196').checked || document.getElementById('r197').checked)
            if (document.getElementById('r198').checked || document.getElementById('r199').checked)
                if (document.getElementById('r200').checked || document.getElementById('r201').checked)
                    if (document.getElementById('r202').checked || document.getElementById('r203').checked)
                        if (document.getElementById('r204').checked || document.getElementById('r205').checked)
                            if (document.getElementById('r206').checked || document.getElementById('r207').checked)
                                if (document.getElementById('r208').checked || document.getElementById('r209').checked)
                                    if (document.getElementById('r210').checked || document.getElementById('r211').checked)
                                        if (document.getElementById('r212').checked || document.getElementById('r213').checked)
                                            if (document.getElementById('r214').checked || document.getElementById('r215').checked)
                                                if (document.getElementById('r216').checked || document.getElementById('r217').checked)
                                                    if (document.getElementById('r218').checked || document.getElementById('r219').checked)
                                                        if (document.getElementById('r220').checked || document.getElementById('r221').checked)
                                                            if (document.getElementById('r222').checked || document.getElementById('r223').checked)
                                                                if (document.getElementById('r224').checked || document.getElementById('r225').checked) {
                                                                    prox = true;
                                                                }

        if (document.getElementById('r196').checked) {
            re1 = document.getElementById('r196').value;
        } else if (document.getElementById('r197').checked) {
            re1 = document.getElementById('r197').value;
        }

        if (document.getElementById('r198').checked) {
            re2 = document.getElementById('r198').value;
        } else if (document.getElementById('r199').checked) {
            re2 = document.getElementById('r199').value;
        }

        if (document.getElementById('r200').checked) {
            re3 = document.getElementById('r200').value;
        } else if (document.getElementById('r201').checked) {
            re3 = document.getElementById('r201').value;
        }

        if (document.getElementById('r202').checked) {
            re4 = document.getElementById('r202').value;
        } else if (document.getElementById('r203').checked) {
            re4 = document.getElementById('r203').value;
        }
        /*estrategias*/
        var d1, d2, d3, d4
        if (document.getElementById('r204').checked) {
            d1 = document.getElementById('r204').value;
        } else if (document.getElementById('r205').checked) {
            d1 = document.getElementById('r205').value;
        }
        if (document.getElementById('r206').checked) {
            d2 = document.getElementById('r206').value;
        } else if (document.getElementById('r207').checked) {
            d2 = document.getElementById('r207').value;
        }
        if (document.getElementById('r208').checked) {
            d3 = document.getElementById('r208').value;
        } else if (document.getElementById('r209').checked) {
            d3 = document.getElementById('r209').value;
        }
        if (document.getElementById('r210').checked) {
            d4 = document.getElementById('r210').value;
        } else if (document.getElementById('r211').checked) {
            d4 = document.getElementById('r211').value;
        }
        var v1, v2, v3, v4
        if (document.getElementById('r212').checked) {
            v1 = document.getElementById('r212').value;
        } else if (document.getElementById('r213').checked) {
            v1 = document.getElementById('r213').value;
        }
        if (document.getElementById('r214').checked) {
            v2 = document.getElementById('r214').value;
        } else if (document.getElementById('r215').checked) {
            v2 = document.getElementById('r215').value;
        }
        if (document.getElementById('r216').checked) {
            v3 = document.getElementById('r216').value;
        } else if (document.getElementById('r217').checked) {
            v3 = document.getElementById('r217').value;
        }
        if (document.getElementById('r218').checked) {
            v4 = document.getElementById('r218').value;
        } else if (document.getElementById('r219').checked) {
            v4 = document.getElementById('r219').value;
        }
        var pe1, pe2, pe3;
        if (document.getElementById('r220').checked) {
            pe1 = document.getElementById('r220').value;
        } else if (document.getElementById('r221').checked) {
            pe1 = document.getElementById('r221').value;
        }
        if (document.getElementById('r222').checked) {
            pe2 = document.getElementById('r222').value;
        } else if (document.getElementById('r223').checked) {
            pe2 = document.getElementById('r223').value;
        }
        if (document.getElementById('r224').checked) {
            pe3 = document.getElementById('r224').value;
        } else if (document.getElementById('r225').checked) {
            pe3 = document.getElementById('r225').value;
        }

        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    re1: re1,
                    re2: re2,
                    re3: re3,
                    re4: re4,
                    d1: d1,
                    d2: d2,
                    d3: d3,
                    d4: d4,
                    v1: v1,
                    v2: v2,
                    v3: v3,
                    v4: v4,
                    pe1: pe1,
                    pe2: pe2,
                    pe3: pe3,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 33;
        } else {
            enter++;
            countClicks = 32;
            if (enter >= 2) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }
    } //Fin de 32


    if (countClicks == 33) {
        var nacional, internacional, rr59;
        var prox = false;
        var skip = true;

        if (document.getElementById('ag1').checked ||
            document.getElementById('r226').checked || document.getElementById('r228').checked ||
            document.getElementById('r231').checked || document.getElementById('r232').checked ||
            document.getElementById('r233').checked || document.getElementById('r235').checked ||
            document.getElementById('r238').checked)
            if (document.getElementById('ag2').checked ||
                document.getElementById('r240').checked || document.getElementById('r241').checked ||
                document.getElementById('r242').checked || document.getElementById('r243').checked ||
                document.getElementById('r246').checked || document.getElementById('r249').checked ||
                document.getElementById('r251').checked)
                if (document.getElementById('r254').checked || document.getElementById('r255').checked) {
                    prox = true;
                    if (document.getElementById('r254').checked) {
                        prox = true;
                        skip = false;
                        /*Nacional*/
                        if (document.getElementById('ag1').checked) {
                            nacional = document.getElementById('ag1').value;
                        }
                        if (document.getElementById('r226').checked) {
                            nacional = document.getElementById('r226').value;
                        } else if (document.getElementById('r228').checked) {
                            nacional = document.getElementById('r228').value;
                        } else if (document.getElementById('r231').checked) {
                            nacional = document.getElementById('r231').value;
                        } else if (document.getElementById('r232').checked) {
                            nacional = document.getElementById('r232').value;
                        } else if (document.getElementById('r233').checked) {
                            nacional = document.getElementById('r233').value;
                        } else if (document.getElementById('r235').checked) {
                            nacional = document.getElementById('r235').value;
                        } else if (document.getElementById('r238').checked) {
                            nacional = document.getElementById('r238').value;
                        }
                        /*Internacional*/
                        if (document.getElementById('ag2').checked) {
                            internacional = document.getElementById('ag2').value;
                        }
                        if (document.getElementById('r240').checked) {
                            internacional = document.getElementById('r240').value;
                        } else if (document.getElementById('r241').checked) {
                            internacional = document.getElementById('r241').value;
                        } else if (document.getElementById('r242').checked) {
                            internacional = document.getElementById('r242').value;
                        } else if (document.getElementById('r243').checked) {
                            internacional = document.getElementById('r243').value;
                        } else if (document.getElementById('r246').checked) {
                            internacional = document.getElementById('r246').value;
                        } else if (document.getElementById('r249').checked) {
                            internacional = document.getElementById('r249').value;
                        } else if (document.getElementById('r251').checked) {
                            internacional = document.getElementById('r251').value;
                        }

                        rr59 = document.getElementById('r254').value;
                        $("#carouselExampleControls").carousel("next");
                        enter = 0;
                        $.ajax({
                            type: "POST",
                            url: "save.php",
                            data: {
                                cont: countClicks,
                                nacional: nacional,
                                internacional: internacional,
                                rr59: rr59,
                                id: id
                            },
                            success: function (data) {}
                        });

                        countClicks = 48;
                    }
                }

        /*Nacional*/
        if (document.getElementById('ag1').checked) {
            nacional = document.getElementById('ag1').value;
        }
        if (document.getElementById('r226').checked) {
            nacional = document.getElementById('r226').value;
        } else if (document.getElementById('r228').checked) {
            nacional = document.getElementById('r228').value;
        } else if (document.getElementById('r231').checked) {
            nacional = document.getElementById('r231').value;
        } else if (document.getElementById('r232').checked) {
            nacional = document.getElementById('r232').value;
        } else if (document.getElementById('r233').checked) {
            nacional = document.getElementById('r233').value;
        } else if (document.getElementById('r235').checked) {
            nacional = document.getElementById('r235').value;
        } else if (document.getElementById('r238').checked) {
            nacional = document.getElementById('r238').value;
        }
        /*Internacional*/
        if (document.getElementById('ag2').checked) {
            internacional = document.getElementById('ag2').value;
        }
        if (document.getElementById('r240').checked) {
            internacional = document.getElementById('r240').value;
        } else if (document.getElementById('r241').checked) {
            internacional = document.getElementById('r241').value;
        } else if (document.getElementById('r242').checked) {
            internacional = document.getElementById('r242').value;
        } else if (document.getElementById('r243').checked) {
            internacional = document.getElementById('r243').value;
        } else if (document.getElementById('r246').checked) {
            internacional = document.getElementById('r246').value;
        } else if (document.getElementById('r249').checked) {
            internacional = document.getElementById('r249').value;
        } else if (document.getElementById('r251').checked) {
            internacional = document.getElementById('r251').value;
        }

        if (document.getElementById('r254').checked) {
            rr59 = document.getElementById('r254').value;
        } else if (document.getElementById('r255').checked) {
            rr59 = document.getElementById('r255').value;
        }

        if (prox && skip) {
            enter = 0;
            $("#carouselExampleControls").carousel(41);
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    nacional: nacional,
                    internacional: internacional,
                    rr59: rr59,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 34;
        } else if (!prox && !skip) {
            enter++;
            countClicks = 33;
            if (enter >= 2) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        } else if (!prox && skip) {
            enter++;
            countClicks = 33;
            if (enter >= 2) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }


    } //Fin de 33

    if (countClicks == 48) {
        var r59;
        if (document.getElementById("s2").value != "0") {
            r59 = document.getElementById("s2").value;
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    r59: r59,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 34;
        } else {
            enter++;
            countClicks = 48;
            if (enter >= 2) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }
    } //Fin de 48

    if (countClicks == 34) {
        var g1, g2, g3, g4;
        var prox = false;

        if (document.getElementById('rr255').checked || document.getElementById('r256').checked ||
            document.getElementById('r257').checked || document.getElementById('r258').checked)
            if (document.getElementById('r259').checked || document.getElementById('r260').checked ||
                document.getElementById('r261').checked || document.getElementById('r262').checked)
                if (document.getElementById('r263').checked || document.getElementById('r264').checked ||
                    document.getElementById('r265').checked || document.getElementById('r266').checked)
                    if (document.getElementById('r267').checked || document.getElementById('r268').checked ||
                        document.getElementById('r269').checked || document.getElementById('rr269').checked)
                        if (document.getElementById('r270').checked || document.getElementById('r271').checked ||
                            document.getElementById('r272').checked || document.getElementById('r273').checked)
                            if (document.getElementById('r274').checked || document.getElementById('r275').checked ||
                                document.getElementById('r276').checked || document.getElementById('r277').checked)
                                if (document.getElementById('r278').checked || document.getElementById('r279').checked ||
                                    document.getElementById('r280').checked || document.getElementById('r281').checked)
                                    if (document.getElementById('r282').checked || document.getElementById('r283').checked ||
                                        document.getElementById('r284').checked || document.getElementById('r285').checked) {
                                        prox = true;
                                    }

        /*Nadie puede velar por mis intereses, a excepción de mis familiares*/
        if (document.getElementById('rr255').checked) {
            g1 = document.getElementById('rr255').value;
        } else if (document.getElementById('r256').checked) {
            g1 = document.getElementById('r256').value;
        } else if (document.getElementById('r257').checked) {
            g1 = document.getElementById('r257').value;
        } else if (document.getElementById('r258').checked) {
            g1 = document.getElementById('r258').value;
        }
        /*Uno debe tener amistades en todas partes para resolver los problemas*/
        if (document.getElementById('r259').checked) {
            g2 = document.getElementById('r259').value;
        } else if (document.getElementById('r260').checked) {
            g2 = document.getElementById('r260').value;
        } else if (document.getElementById('r261').checked) {
            g2 = document.getElementById('r261').value;
        } else if (document.getElementById('r261').checked) {
            g2 = document.getElementById('r262').value;
        }
        /*Unirse con la gente lo que trae es problemas*/
        if (document.getElementById('r263').checked) {
            g3 = document.getElementById('r263').value;
        } else if (document.getElementById('r264').checked) {
            g3 = document.getElementById('r264').value;
        } else if (document.getElementById('r265').checked) {
            g3 = document.getElementById('r265').value;
        } else if (document.getElementById('r266').checked) {
            g3 = document.getElementById('r266').value;
        }
        /*Las leyes las hacen los poderosos para su beneficio*/
        if (document.getElementById('r267').checked) {
            g4 = document.getElementById('r267').value;
        } else if (document.getElementById('r268').checked) {
            g4 = document.getElementById('r268').value;
        } else if (document.getElementById('r269').checked) {
            g4 = document.getElementById('r269').value;
        } else if (document.getElementById('rr269').checked) {
            g4 = document.getElementById('rr269').value;
        }
        var q1, q2, q3, q4;
        /*El rumbo de la vida está escrito y uno no puede cambiarlo*/
        if (document.getElementById('r270').checked) {
            q1 = document.getElementById('r270').value;
        } else if (document.getElementById('r271').checked) {
            q1 = document.getElementById('r271').value;
        } else if (document.getElementById('r272').checked) {
            q1 = document.getElementById('r272').value;
        } else if (document.getElementById('r273').checked) {
            q1 = document.getElementById('r273').value;
        }

        /*La suerte es un factor muy importante para lograr el éxito*/
        if (document.getElementById('r274').checked) {
            q2 = document.getElementById('r274').value;
        } else if (document.getElementById('r275').checked) {
            q2 = document.getElementById('r275').value;
        } else if (document.getElementById('r276').checked) {
            q2 = document.getElementById('r276').value;
        } else if (document.getElementById('r277').checked) {
            q2 = document.getElementById('r277').value;
        }
        /*Hay gente con suerte y por eso se le dan las cosas.*/
        if (document.getElementById('r278').checked) {
            q3 = document.getElementById('r278').value;
        } else if (document.getElementById('r279').checked) {
            q3 = document.getElementById('r279').value;
        } else if (document.getElementById('r280').checked) {
            q3 = document.getElementById('r280').value;
        } else if (document.getElementById('r281').checked) {
            q3 = document.getElementById('r281').value;
        }
        /*Casi siempre el fracaso es por culpa de fuerzas que no controlamos*/
        if (document.getElementById('r282').checked) {
            q4 = document.getElementById('r282').value;
        } else if (document.getElementById('r283').checked) {
            q4 = document.getElementById('r283').value;
        } else if (document.getElementById('r284').checked) {
            q4 = document.getElementById('r284').value;
        } else if (document.getElementById('r285').checked) {
            q4 = document.getElementById('r285').value;
        }

        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    g1: g1,
                    g2: g2,
                    g3: g3,
                    g4: g4,
                    q1: q1,
                    q2: q2,
                    q3: q3,
                    q4: q4,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 35;
        } else {
            enter++;
            countClicks = 34;
            if (enter >= 2) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }
    } //Fin de 34


    if (countClicks == 35) {
        var k1, k2, k3, k4;
        var prox = false;

        if (document.getElementById('r286').checked || document.getElementById('r287').checked ||
            document.getElementById('r288').checked || document.getElementById('r289').checked)
            if (document.getElementById('r290').checked || document.getElementById('r291').checked ||
                document.getElementById('r292').checked || document.getElementById('r293').checked)
                if (document.getElementById('r294').checked || document.getElementById('r295').checked ||
                    document.getElementById('r296').checked || document.getElementById('r297').checked)
                    if (document.getElementById('r298').checked || document.getElementById('r299').checked ||
                        document.getElementById('r300').checked || document.getElementById('r301').checked) {
                        prox = true;
                    }
        /*Puedo superar momentos difíciles porque ya he pasado por dificultades anteriormente*/
        if (document.getElementById('r286').checked) {
            k1 = document.getElementById('r286').value;
        } else if (document.getElementById('r287').checked) {
            k1 = document.getElementById('r287').value;
        } else if (document.getElementById('r288').checked) {
            k1 = document.getElementById('r288').value;
        } else if (document.getElementById('r289').checked) {
            k1 = document.getElementById('r289').value;
        }
        /*Generalmente me las arreglo de una manera u otra*/
        if (document.getElementById('r290').checked) {
            k2 = document.getElementById('r290').value;
        } else if (document.getElementById('r291').checked) {
            k2 = document.getElementById('r291').value;
        } else if (document.getElementById('r292').checked) {
            k2 = document.getElementById('r292').value;
        } else if (document.getElementById('r293').checked) {
            k2 = document.getElementById('r293').value;
        }
        /*Me considero una persona muy optimista y persistente*/
        if (document.getElementById('r294').checked) {
            k3 = document.getElementById('r294').value;
        } else if (document.getElementById('r295').checked) {
            k3 = document.getElementById('r295').value;
        } else if (document.getElementById('r296').checked) {
            k3 = document.getElementById('r296').value;
        } else if (document.getElementById('r297').checked) {
            k3 = document.getElementById('r297').value;
        }
        /*Las situaciones estresantes me afectan física y emocionalmente*/
        if (document.getElementById('r298').checked) {
            k4 = document.getElementById('r298').value;
        } else if (document.getElementById('r299').checked) {
            k4 = document.getElementById('r299').value;
        } else if (document.getElementById('r300').checked) {
            k4 = document.getElementById('r300').value;
        } else if (document.getElementById('r301').checked) {
            k4 = document.getElementById('r301').value;
        }
        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    k1: k1,
                    k2: k2,
                    k3: k3,
                    k4: k4,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 36;
        } else {
            enter++;
            countClicks = 35;
            if (enter >= 2) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }

    } //Fin de 35


    if (countClicks == 36) {
        var t22, t23, t24, t25;
        var educacion;
        var propi;
        var prox = false;
        var error = false;

        if (document.getElementById("t18").value != "" && document.getElementById("t19").value != "" &&
            document.getElementById("t20").value != "" && document.getElementById("t21").value != "") {

            t18 = document.getElementById("t18").value;
            t19 = document.getElementById("t19").value;
            t20 = document.getElementById("t20").value;
            t21 = document.getElementById("t21").value;
            n18 = parseInt(t18, 10);
            n19 = parseInt(t19, 10);
            n20 = parseInt(t20, 10);
            n21 = parseInt(t21, 10);
            if (n18 > 0 && n18 < 5 && n18 != n19 && n18 != n20 && n18 != n21)
                if (n19 > 0 && n19 < 5 && n19 != n18 && n19 != n20 && n19 != n21)
                    if (n20 > 0 && n20 < 5 && n20 != n18 && n20 != n19 && n20 != n21)
                        if (n21 > 0 && n21 < 5 && n21 != n18 && n21 != n19 && n21 != n20)
                            prox = true;
                        else {
                            alert("Por favor revise su orden de prioridad: Del 1 al 4, no pueden repetirse números");
                            error = true;
                            prox = false;
                        }
            else {
                alert("Por favor revise su orden de prioridad: Del 1 al 4, no pueden repetirse números");
                error = true;
                prox = false;
            } else {
                alert("Por favor revise su orden de prioridad: Del 1 al 4, no pueden repetirse números");
                error = true;
                prox = false;
            } else {
                alert("Por favor revise su orden de prioridad: Del 1 al 4, no pueden repetirse números");
                error = true;
                prox = false;
            }

        }

        if (prox) {
            enter = 0;
            $("#carouselExampleControls").carousel("next");
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    t18: t18,
                    t19: t19,
                    t20: t20,
                    t21: t21,
                    id: id
                },
                success: function (data) {}
            });
            countClicks = 37;
        } else {
            enter++;
            countClicks = 36;
            if (enter >= 2 && !error) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }

    } //Fin de 36


    if (countClicks == 37) {
        var t22, t23, t24, t29, tr25, propi, etnia, educacion;
        var prox = false;
        var error = false;
        if (document.getElementById("t22").value != "" && document.getElementById("t23").value != "" &&
            document.getElementById("t24").value != "" && document.getElementById("t26").value != "" &&
            document.getElementById("t27").value != "" && document.getElementById("t28").value != "" &&
            document.getElementById("t29").value != "")

            if (document.getElementById('r302').checked || document.getElementById('r303').checked)
                if (document.getElementById('r304').checked || document.getElementById('r305').checked ||
                    document.getElementById('r307').checked || document.getElementById('r308').checked ||
                    document.getElementById('r309').checked || document.getElementById('r310').checked ||
                    document.getElementById('r311').checked || document.getElementById('r312').checked)

                    if (document.getElementById('ex35').checked || document.getElementById('ex36').checked ||
                        document.getElementById('ex37').checked || document.getElementById('ex38').checked ||
                        document.getElementById('ex39').checked || document.getElementById('ex40').checked ||
                        document.getElementById('ex41').checked) {
                        prox = true;

                        if (document.getElementById("t22").value.length > 400 || document.getElementById("t23").value.length > 400 ||
                            document.getElementById("t24").value.length > 400 || document.getElementById("t26").value.length > 400 ||
                            document.getElementById("t27").value.length > 400 || document.getElementById("t28").value.length > 400 ||
                            document.getElementById("t29").value.length > 400 || document.getElementById("tr25").value.length > 400) {
                            prox = false;
                            error = true;
                            alert("En los campos de texto no deben ir más de 400 caracteres");
                        }

                        tr25 = document.getElementById("tr25").value;
                        var validE;
                        validE = looksLikeMail(String(tr25));
                        if (!validE && tr25 != "") {
                            error = true;
                            prox = false;
                            alert("Por favor ingrese una dirección de correo electrónico válida: ejemplo@ejemplo.com");
                        }

                        t24 = document.getElementById("t24").value;
                        var placeholder = parseInt(t24, 10);
                        if (isNaN(placeholder)) {
                            prox = false;
                            error = true;
                            alert("En el campo de edad debe ingresar un número entero");
                        }
                    }

        t22 = document.getElementById("t22").value;
        t23 = document.getElementById("t23").value;
        t24 = document.getElementById("t24").value;
        t26 = document.getElementById("t26").value;
        t27 = document.getElementById("t27").value;
        t28 = document.getElementById("t28").value;
        t29 = document.getElementById("t29").value;
        tr25 = document.getElementById("tr25").value;
        if (document.getElementById('r302').checked) {
            propi = document.getElementById('r302').value;
        } else if (document.getElementById('r303').checked) {
            propi = document.getElementById('r303').value;
        }


        if (document.getElementById('r304').checked) {
            educacion = document.getElementById('r304').value;
        } else if (document.getElementById('r305').checked) {
            educacion = document.getElementById('r305').value;
        } else if (document.getElementById('r307').checked) {
            educacion = document.getElementById('r307').value;
        } else if (document.getElementById('r308').checked) {
            educacion = document.getElementById('r308').value;
        } else if (document.getElementById('r309').checked) {
            educacion = document.getElementById('r309').value;
        } else if (document.getElementById('r310').checked) {
            educacion = document.getElementById('r310').value;
        } else if (document.getElementById('r311').checked) {
            educacion = document.getElementById('r311').value;
        } else if (document.getElementById('r312').checked) {
            educacion = document.getElementById('r312').value;
        }

        if (document.getElementById('ex35').checked) {
            etnia = document.getElementById('ex35').value;
        } else if (document.getElementById('ex36').checked) {
            etnia = document.getElementById('ex36').value;
        } else if (document.getElementById('ex37').checked) {
            etnia = document.getElementById('ex37').value;
        } else if (document.getElementById('ex38').checked) {
            etnia = document.getElementById('ex38').value;
        } else if (document.getElementById('ex39').checked) {
            etnia = document.getElementById('ex39').value;
        } else if (document.getElementById('ex40').checked) {
            etnia = document.getElementById('ex40').value;
        } else if (document.getElementById('ex41').checked) {
            etnia = document.getElementById('ex41').value;
        }
        if (prox) {

            enter = 0;
            $.ajax({
                type: "POST",
                url: "save.php",
                data: {
                    cont: countClicks,
                    tr25: tr25,
                    t22: t22,
                    t23: t23,
                    t24: t24,
                    t26: t26,
                    t27: t27,
                    t28: t28,
                    t29: t29,
                    educacion: educacion,
                    propi: propi,
                    etnia: etnia,
                    id: id
                },
                success: function (data) {

                }

            });
            alert("Ha llegado al final de la encuesta");
            countClicks = 38;
        } else {
            enter++;
            countClicks = 37;
            if (enter >= 2 && !error) {
                alert("Por favor, rellene todos los campos antes de continuar");
            }
        }
    } //Fin de 37

    if (countClicks == 38) {
        $.ajax({
            type: "POST",
            url: "save.php",
            data: {
                cont: countClicks,
                id: id
            },
            success: function (data) {}
        });
        window.location.href = "terminate.html";
    } //Fin de 38
    //alert(countClicks);
    // 
}