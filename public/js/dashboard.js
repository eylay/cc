$(document).ready(function () {

    // inits
    $('.pdp').persianDatepicker();
    $('[data-toggle=popover]').popover();

});

$(document).on('click', '#add-row', function () {
    var row = $('.transaction-row').first().clone().appendTo('#transaction-rows');
    $('.delete-row').removeClass('hidden');
    row.find('input').val(null);
    row.find('.cash-discount').val(0);
    row.find('.count').val(1);
    row.find('.final-club-discount').html(0);
    row.find('.final-cash-discount').html(0);
    row.find('.final-count').html(1);
    row.find('.final-payable').html(0);
    row.find('.final-gift').html(0);
});

$(document).on('keyup', '.first-amount, .cash-discount, .count', function () {
    var row = $(this).parents('.transaction-row');
    updateRow(row);
    $('.total-calcs').slideDown();
});

$(document).on('click', '.delete-row', function () {
    var row = $(this).parents('.transaction-row');
    row.remove();
    var count = $('.transaction-row').length;
    if (count == 1) {
        $('.delete-row').addClass('hidden');
    }
});

function updateRow(row) {
    var discountPercent = $('#new-transaction').attr('data-discount-percent');
    var giftPercent = $('#new-transaction').attr('data-gift-percent');

    var firstAmount = row.find('.first-amount').val();
    var count = row.find('.count').val();
    var cashDiscountAmount = row.find('.cash-discount').val();

    if(!firstAmount) firstAmount = 0;
    if(!count) count = 0;
    if(!cashDiscountAmount) cashDiscountAmount = 0;

    var clubDiscountAmount = (firstAmount*discountPercent) / 100;
    var payableAmount = firstAmount - clubDiscountAmount - cashDiscountAmount;
    var giftAmount = (payableAmount*giftPercent) / 100;

    row.find('.final-club-discount').html(addCommas(count * clubDiscountAmount));
    row.find('.final-cash-discount').html(addCommas(count * cashDiscountAmount));
    row.find('.final-count').html(addCommas(count));
    row.find('.final-payable').html(addCommas(count * payableAmount));
    row.find('.final-gift').html(addCommas(count * giftAmount));

    row.find('.hidden-inputs').html(null);
    row.find('.hidden-inputs').append( '<input type="hidden" class="club-discount" name="club_discount[]" value="'+ Math.floor(count * clubDiscountAmount) +'">' );
    row.find('.hidden-inputs').append( '<input type="hidden" class="cash-discount-with-count" name="cash_discount_with_count[]" value="'+ Math.floor(count * cashDiscountAmount) +'">' );
    row.find('.hidden-inputs').append( '<input type="hidden" class="payable-amount" name="payable_amount[]" value="'+ Math.floor(count * payableAmount) +'">' );
    row.find('.hidden-inputs').append( '<input type="hidden" class="gift-amount" name="gift_amount[]" value="'+ Math.floor(count * giftAmount) +'">' );



    totalCalcs();
}

function totalCalcs() {

    // total discount
    var totalDiscount = 0;
    $('.cash-discount-with-count').each(function () {
        var value = $(this).val() ? parseInt($(this).val()) : 0;
        totalDiscount += value;
    });
    $('.club-discount').each(function () {
        var value = $(this).val() ? parseInt($(this).val()) : 0;
        totalDiscount += value;
    });

    // total gift
    var totalGift = 0;
    $('.gift-amount').each(function () {
        var value = $(this).val() ? parseInt($(this).val()) : 0;
        totalGift += value;
    });

    // total payable amount
    var totalPayableAmount = 0;
    $('.payable-amount').each(function () {
        var value = $(this).val() ? parseInt($(this).val()) : 0;
        totalPayableAmount += value;
    });

    // update table
    $('#total-amount').html(addCommas(totalDiscount + totalPayableAmount));
    $('#total-discount').html(addCommas(totalDiscount));
    $('#total-payable').html(addCommas(totalPayableAmount));
    $('#total-gift').html(addCommas(totalGift));

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
