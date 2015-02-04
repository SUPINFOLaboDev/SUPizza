var clock;

$(document).ready(function() {
    var clock;

    clock = $('.clock').FlipClock({
        clockFace: 'HourlyCounter',
        autoStart: false,
        callbacks: {
            stop: function() {
                $('.message').html('Fin de la prise de commande')
            }
        }
    });

    clock.setTime(14400);
    clock.setCountdown(true);
    clock.start();

});
