$(document).ready(function() {
    $({
        someValue: 0
    }).animate({
        someValue: Math.floor(Math.random() * 3000)
    }, {
        duration: 3000,
        easing: 'swing', // can be anything
        step: function() { // called on every step
            // Update the element's text with rounded-up value:
            $('.count').text(commaSeparateNumber(Math.round(this.someValue)));
        }
    });

    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
        }
        return val;
    }

    // social buttons

    $(function() {
        var all_classes = "";
        var timer = undefined;
        $.each($('li', '.social-class'), function(index, element) {
            all_classes += " btn-" + $(element).data("code");
        });
        $('li', '.social-class').mouseenter(function() {
            var icon_name = $(this).data("code");
            if ($(this).data("icon")) {
                icon_name = $(this).data("icon");
            }
            var icon = "<i class='fab fa-" + icon_name + "'></i>";
            $('.btn-social', '.social-sizes').html(icon + "Sign in with " + $(this).data("name"));
            $('.btn-social-icon', '.social-sizes').html(icon);
            $('.btn', '.social-sizes').removeClass(all_classes);
            $('.btn', '.social-sizes').addClass("btn-" + $(this).data('code'));
        });
        $($('li', '.social-class')[Math.floor($('li', '.social-class').length * Math.random())]).mouseenter();
    });
});
