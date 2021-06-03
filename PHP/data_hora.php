<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data e Hora - PHP</title>
</head>
<script>
    var clockid = new Array()
    var clockidoutside = new Array()
    var i_clock = -1
    var thistime = new Date()
    var hours = thistime.getHours()
    var minutes = thistime.getMinutes()
    var seconds = thistime.getSeconds()
    if (eval(hours) < 10) {
        hours = "0" + hours
    }
    if (eval(minutes) < 10) {
        minutes = "0" + minutes
    }
    if (seconds < 10) {
        seconds = "0" + seconds
    }
    var thistime = hours + ":" + minutes + ":" + seconds

    function writeclock() {
        i_clock++
        if (document.all || document.getElementById || document.layers) {
            clockid[i_clock] = "clock" + i_clock
            document.write("<span id='" + clockid[i_clock] + "' style='position:relative'>" + thistime + "</span>")
        }
    }

    function clockon() {
        thistime = new Date()
        hours = thistime.getHours()
        minutes = thistime.getMinutes()
        seconds = thistime.getSeconds()
        if (eval(hours) < 10) {
            hours = "0" + hours
        }
        if (eval(minutes) < 10) {
            minutes = "0" + minutes
        }
        if (seconds < 10) {
            seconds = "0" + seconds
        }
        thistime = hours + ":" + minutes + ":" + seconds

        if (document.all) {
            for (i = 0; i <= clockid.length - 1; i++) {
                var thisclock = eval(clockid[i])
                thisclock.innerHTML = thistime
            }
        }

        if (document.getElementById) {
            for (i = 0; i <= clockid.length - 1; i++) {
                document.getElementById(clockid[i]).innerHTML = thistime
            }
        }
        var timer = setTimeout("clockon()", 1000)
    }
    window.onload = clockon
</SCRIPT>

<body>

    <?php
    //Definindo Idioma
    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    //Definindo local
    date_default_timezone_set('America/Sao_Paulo');

    //Imprimindo data e hora completa
    echo "Hoje é <strong>" . strftime('%A, %d de %B de %Y', strtotime('today')) . "</strong> e agora são <strong><script>writeclock()</SCRIPT></strong>. <BR />";
    //Imprimindo semana do ano
    echo "Essa é a semana <strong>" . strftime('%W', strtotime('now')) . "ª</strong> do ano de <strong>" . strftime('%Y', strtotime('now')) . "</strong>. <BR />";
    //Imprimindo dia do ano
    echo "Hoje é o dia <strong>" . strftime('%j', strtotime('now')) . "</strong> do ano de <strong>" . strftime('%Y', strtotime('now')) . "</strong>. <BR />";
    ?>

</body>

</html>