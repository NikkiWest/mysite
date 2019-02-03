var MainCtrl = {
    actionIndex : function () {

        $("#tabs").tabs({
            active: 0
        });
        $('[data-toggle="popover"]').popover({
            //Установление направления отображения popover
            placement: 'bottom'
        });

        $(document).on("click", "#regBanner", function (e) {
            e.preventDefault();
            $("#modalRegForm").modal("show");
        });

        $(document).on("click", "#menu a.btnHeader, #modalMainMenu a.btnHeader", function (e) {
            event.preventDefault();//отменяет действие браузера по дефолту
            var id  = $(this).attr('href'); //attr получить значение атрибута указанного в href
            console.log(id);
            var top = $(id).offset().top;// offset  координаты выбранного элемента
            $("#modalMainMenu").modal("hide");


            $('body,html').animate({scrollTop: top}, 1500); // ??
        });


        $(document).on("submit", "#formRegistration, #formRegistration-modal", function (e) {
            e.preventDefault();
            var data = $(this).serialize();
            var form = $(this);
            $.ajax({
                data: data,
                url: "/site/registration",
                success: function (data) {
                    if (response_msg(data) == false) return;
                    form.trigger('reset');
                    $("#modalRegistration").modal('hide');
                    if (typeof yaCounter50206495 !== "undefined") {
                        yaCounter50206495.reachGoal('reg_conf');
                    }
                    location.href="/?act=openPay";

                }
            });
            return false;
        });

        $(document).on("submit", "#formLogin", function (e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                data: data,
                url: "/auth/login",
                success: function (data) {
                    if (response_msg(data) == false) return;
                    location.href = "/";
                }
            });
            return false;
        });


        $(document).on("click", ".btnOpenPay", function (e) {
            e.preventDefault();
            $("#modalPay").modal("show");
        });


        $(document).on("submit", "#formPay", function (e) {
            var code = $("#promo-code").val();
            $("#formPay input[name=code]").val(code);

            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                data: data,
                url: "/cabinet/invoice-save",
                success: function (data) {
                    if (response_msg(data) === false) return;

                    var url = "/cabinet/invoice-d-load?id="+data.invoice_id;
                    location.href = url;

                }
            });
            return false;
        });

        $(document).on("keyup", "#promo-code", function (e) {
            e.preventDefault();
            var data = {};
            data.code = $(this).val();
            $.ajax({
                data: data,
                url: "/site/get-cost",
                success: function (data) {
                    if (response_msg(data) === false) return;
                    var str = "Билет бесплатно";
                    if (data.cost > 0) {
                        str = "К оплате "+data.cost+" р.";
                        $("#divPayAll").show();
                    } else {
                        location.href = "/?act=openPayOk";
                        $("#divPayAll").hide();
                    }
                    $("#divCost").html(str);

                }
            });
            return false;
        });

        $(document).on("click", ".btnSelectTypeOplata", function (e) {
            e.preventDefault();
            var t = $(this).data("t");
            $(".btnSelectTypeOplata").removeClass("active");
            $(this).addClass("active");

            $(".divPaySection").addClass("d-none");
            $("#div-"+t).removeClass("d-none");
        });

        $(document).on("submit", "#formPayCard", function (e) {
            var code = $("#promo-code").val();
            $("#formPayCard input[name=code]").val(code);

            e.preventDefault();
            var data = {};
            data.code = code;
            $.ajax({
                data: data,
                url: "/cabinet/pay",
                success: function (data) {
                    if (response_msg(data) === false) return;
                    $("#formPayCardGoPay input[name=sum]").val(data.sum);
                    $("#formPayCardGoPay input[name=name]").val(data.name);
                    $("#formPayCardGoPay").submit();
                }
            });
            return false;
        });
    }
}

