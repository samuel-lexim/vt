function svgInit() {
    $('img[src$=".svg"]').each(function () {
        let $img = $(this);
        let imgID = $img.attr('id');
        let imgClass = $img.attr('class');
        let imgURL = $img.attr('src');
        $.get(imgURL, function (data) {
            // Get the SVG tag, ignore the rest
            let $svg = $(data).find('svg');
            // Get Class name
            let $svgClass = $svg.attr('class') ? $svg.attr('class') : '';
            // Add replaced image's ID to the new SVG
            if (typeof imgID !== 'undefined') {
                $svg = $svg.attr('id', imgID);
            }
            // Add replaced image's classes to the new SVG
            if (typeof imgClass !== 'undefined') {
                $svg = $svg.attr('class', imgClass + ' ' + $svgClass + ' replaced-svg');
            }
            // Remove any invalid XML tags as per http://validator.w3.org
            $svg.removeAttr('xmlns:a');
            // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
            if (!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'));
            }
            // Replace image with new SVG
            $img.replaceWith($svg);
        }, 'xml');
    });
}

svgInit(); // Convert img to svg

// Start - 404 page
function reSizeFunction() {
    let headerHeight = $('#masthead').height();
    let footerHeight = $('#footerId').height();
    let windowHeight = $(window).height();
    let bodyHeight = windowHeight - headerHeight - footerHeight;
    if (bodyHeight > 0) {
        $('.site-main').css('min-height', bodyHeight + 'px');
        $('.error-404.not-found').css('min-height', bodyHeight + 'px');
    }
}

$(window).resize(function () {
    reSizeFunction();
});
reSizeFunction();
// End - 404 page


$(document).ready(function () {
    // Start - Header
    $('#NavMenuButton').click(function (e, i) {
        let parent = $(this).parent();

        if (parent.hasClass('open')) {
            $('.site-header').removeClass('open');
            parent.removeClass('open');
        } else {
            $('.site-header').addClass('open');
            parent.addClass('open');
        }
    });

    $(document).keyup(function (e) {
        // press esc
        if (e.keyCode === 27) {
            $('.nav-button-wrap').removeClass('open');
            $('.site-header').removeClass('open');
        }
    });
    // End - Header


});