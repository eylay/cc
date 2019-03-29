$(document).ready(function () {

    // inits
    $('.pdp').persianDatepicker();
    $('[data-toggle=popover]').popover();

    // clone transaction rows
    $('#add-row').click(function () {
        $('.transaction-row').clone().appendTo('#transaction-rows');
    });

    //transactions
    $('.first-amount, .cash-discount, .count').keyup(function () {
        updateRow();
    });


});

function updateRow() {
    var discountPercent = $('#new-transaction').attr('data-discount-percent');
    var giftPercent = $('#new-transaction').attr('data-gift-percent');

    var firstAmount = $('.first-amount').val();
    var count = $('.count').val() ? $('.count').val() : 0;
    var cashDiscountAmount = $('.cash-discount').val() ? $('.cash-discount').val() : 0;

    var clubDiscountAmount = (firstAmount*discountPercent) / 100;
    var payableAmount = firstAmount - clubDiscountAmount - cashDiscountAmount;
    var giftAmount = (payableAmount*giftPercent) / 100;

    $('.final-club-discount').html(addCommas(count * clubDiscountAmount));
    $('.final-cash-discount').html(addCommas(count * cashDiscountAmount));
    $('.final-count').html(addCommas(count));
    $('.final-payable').html(addCommas(count * payableAmount));
    $('.final-gift').html(addCommas(count * giftAmount));
}

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
