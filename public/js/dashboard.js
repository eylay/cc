$(document).ready(function () {

    // inits
    $('.pdp').persianDatepicker();
    $('[data-toggle=popover]').popover();

    //transactions
    $('.first-amount').keyup(function () {

        var firstAmount = $(this).val();
        var discountPercent = $('#new-transaction').attr('data-discount-percent');
        var giftPercent = $('#new-transaction').attr('data-gift-percent');

        var discountAmount = (firstAmount*discountPercent) / 100;
        var payableAmount = firstAmount - discountAmount;
        var giftAmount = (payableAmount*giftPercent) / 100;

        $('.final-discount').html(addCommas(discountAmount));
        $('.final-payable').html(addCommas(payableAmount));
        $('.final-gift').html(addCommas(giftAmount));

    });


});

function addCommas(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1;
}
