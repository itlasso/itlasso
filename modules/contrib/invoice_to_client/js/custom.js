(function ($, Drupal, drupalSettings) {
    Drupal.behaviors.invoiceBehavior = {
        attach: function (context, settings) {
            $(once('.price_per_hour', '.price_per_hour', context)).keyup(
                function (e) {
                    // console.log("hello");
                    // var index =   $(this).parent().parent().parent().index();
                    var $this = $(this);
                    var uid = $this.attr('id');
                    var uid_s = uid.split("_");
                    var cid = uid_s[1];
                    var sum = "amounts" + cid;
                    var price = "price_" + cid;
                    var hours = cid;
                    var am = 0;
                    ($('#' + sum).val($('#' + hours).val() * $('#' + price).val()));

                    for (var i = 0; i < $('.amounts').length; i++) {
                        var e = $('.amounts')[i];
                        am = +am + +$('#' + e.id).val();
                    }
                    $('#bas_amount').val(am);

                    if ($('#gst_check').is(':checked')) {
                        var gst_val = am * 18 / 100;
                        $('#gst').val(gst_val);
                    }
                    else {
                        var gst_val = 0;
                        $('#gst').val(gst_val);
                    }
                    var total_amount = +am + +gst_val;
                    $('#t_amount').val(total_amount);

                }
            );

            $(once('.hours', '.hours', context)).keyup(
                function (e) {
                    // console.log("hello");
                    // var index =   $(this).parent().parent().parent().index();
                    var $this = $(this);
                    var cid = $this.attr('id');
                    var sum = "amounts" + cid;
                    var rate = "price_" + cid;
                    var am = 0;
                    ($('#' + sum).val($('#' + cid).val() * $('#' + rate).val()));

                    for (var i = 0; i < $('.amounts').length; i++) {
                        var e = $('.amounts')[i];
                        am = +am + +$('#' + e.id).val();
                    }
                    $('#bas_amount').val(am);

                    if ($('#gst_check').is(':checked')) {
                        var gst_val = am * 18 / 100;
                        $('#gst').val(gst_val);
                    }
                    else {
                        var gst_val = 0;
                        $('#gst').val(gst_val);
                    }
                    var total_amount = +am + +gst_val;
                    $('#t_amount').val(total_amount);

                }
            );

            $(once('.price_per_month', '.price_per_month', context)).keyup(
                function (e) {
                    // var index =   $(this).parent().parent().parent().index();
                    var $this = $(this);
                    var uid = $this.attr('id');
                    console.log('id',uid);
                    var uid_s = uid.split("_");
                    var cid = uid_s[1];
                    var sum = "amounts" + cid;
                    var days = cid;
                    var price = "price_" + cid;
                    var working_days_id = "workingDays_" + cid;
                    var am = 0;
                    var working_days = $('#' + working_days_id).val();
                    if(working_days == 0) {
                        ($('#' + sum).val(''));
                    }
                    else{
                        var per_day_price = $('#' + price).val() / $('#' + working_days_id).val();
                        ($('#' + sum).val($('#' + days).val() * per_day_price));
                    }
                    for (var i = 0; i < $('.amounts').length; i++) {
                        var e = $('.amounts')[i];
                        am = +am + +$('#' + e.id).val();
                    }
                    $('#bas_amount').val(am);

                    if ($('#gst_check').is(':checked')) {
                        var gst_val = am * 18 / 100;
                        $('#gst').val(gst_val);
                    }
                    else {
                        var gst_val = 0;
                        $('#gst').val(gst_val);
                    }
                    var total_amount = +am + +gst_val;
                    $('#t_amount').val(total_amount);

                }
            );

            $(once('.days', '.days', context)).keyup(
                function (e) {
                    // var index =   $(this).parent().parent().parent().index();
                    var $this = $(this);
                    var cid = $this.attr('id');
                    var sum = "amounts" + cid;
                    var rate = "price_" + cid;
                    var working_days_id = "workingDays_" + cid;
                    var am = 0;
                    var working_days = $('#' + working_days_id).val();
                    if(working_days == 0) {
                        ($('#' + sum).val(''));
                    }
                    else{
                        var per_day_price = $('#' + rate).val() / $('#' + working_days_id).val();
                        ($('#' + sum).val($('#' + cid).val() * per_day_price));
                    }
                    for (var i = 0; i < $('.amounts').length; i++) {
                        var e = $('.amounts')[i];
                        am = +am + +$('#' + e.id).val();
                    }
                    $('#bas_amount').val(am);

                    if ($('#gst_check').is(':checked')) {
                        var gst_val = am * 18 / 100;
                        $('#gst').val(gst_val);
                    }
                    else {
                        var gst_val = 0;
                        $('#gst').val(gst_val);
                    }
                    var total_amount = +am + +gst_val;
                    $('#t_amount').val(total_amount);

                }
            );

            $(once('.workingDays', '.workingDays', context)).keyup(
                function (e) {
                    // var index =   $(this).parent().parent().parent().index();
                    var $this = $(this);
                    var uid = $this.attr('id');
                    var uid_s = uid.split("_");
                    var cid = uid_s[1];
                    var sum = "amounts" + cid;
                    var rate = "price_" + cid;
                    var working_days_id = "working_days" + cid;
                    var am = 0;
                    var working_days = $('#' + uid).val();
                    if(working_days == 0) {
                        ($('#' + sum).val(''));
                    }
                    else {
                        var per_day_price = $('#' + rate).val() / $('#' + uid).val();
                        ($('#' + sum).val($('#' + cid).val() * per_day_price));
                    }
                    for (var i = 0; i < $('.amounts').length; i++) {
                        var e = $('.amounts')[i];
                        am = +am + +$('#' + e.id).val();
                    }
                    $('#bas_amount').val(am);

                    if ($('#gst_check').is(':checked')) {
                        var gst_val = am * 18 / 100;
                        $('#gst').val(gst_val);
                    }
                    else {
                        var gst_val = 0;
                        $('#gst').val(gst_val);
                    }
                    var total_amount = +am + +gst_val;
                    $('#t_amount').val(total_amount);

                }
            );

            $(once('#gst_check', '#gst_check', context)).click(
                function (e) {
                    var bas_amount = $('#bas_amount').val();
                    if ($('#gst_check').is(':checked')) {
                        var gst_val = bas_amount * 18 / 100;
                        $('#gst').val(gst_val);
                    }
                    else {
                        var gst_val = 0;
                        $('#gst').val(gst_val);

                    }
                    var total_amount = +bas_amount + +gst_val;
                    $('#t_amount').val(total_amount);
                }
            );

            $(once('.delete-emp', '.delete-emp', context)).click(
                function (e) {
                    var $this = $(this);
                    var id = $this.data('id');
                    var message = "Do you want to delete";
                    var path = Drupal.url('delete/employee');
                    if (confirm(message)) {
                        $.ajax(
                            {
                                type: "GET",
                                data:{id:id},
                                url:path,
                                success: function (data) {
                                    $('#send').html(data);
                                }
                            }
                        )
                    }
                    location.reload();
                }
            );

            $(once('.delete-client', '.delete-client', context)).click(
                function (e) {
                    var $this = $(this);
                    var id = $this.data('id');
                    var message = "Do you want to delete";
                    var path = Drupal.url('delete/client');
                    if (confirm(message)) {
                            $.ajax(
                                {
                                    type: "GET",
                                    data:{id:id},
                                    url:path,
                                    success: function (data) {
                                        $('#send').html(data);
                                    }
                                }
                            )
                    }
                    location.reload();
                }
            );
        }
    };
})(jQuery, Drupal, drupalSettings);
