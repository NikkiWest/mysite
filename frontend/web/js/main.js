var MainCtrl = {
    actionIndex: function () {

        $(document).on("submit", "#formOrderMain, #formOrder", function (e) {
            e.preventDefault();
            var data = $(this).serialize();
            var t = $(this).data("t");
            $.ajax({
                data: data,
                url: 'site/save',
                success: function (data) {
                    if (response_msg(data) === false) return;
                if(t == 'block'){
                    $("#formOrder-block").hide();
                    $("#FormOk").show();
                }else{
                    $("#modalOrder").modal("hide");
                }

                }
            });
            return false;
        });

        $(document).on("click", ".openModalOrder", function (e) {
            e.preventDefault();
            $(".txt_color").removeClass("text-white");
            $(".txt_color").addClass("txt_black");
            $("#modalOrder").modal("show");
        });

        $('#modalOrder').on('hidden.bs.modal', function (e) {
            $(".txt_color").addClass("text-white");
            $(".txt_color").removeClass("txt_black");
        })


        $(document).on("click", ".selectType", function (e) {
            var t = $(this).data('t');
            if (t == '0') {
                $(".selectType").removeClass('active');
                $(".selectType[data-t=0]").addClass('active');
                $(".lstSite").show(300);
            } else {
                $(".lstSite").hide(500);
                $(".selectType").removeClass('active');
                $(".lstSite[data-t = " + t + "]").show(300);
                $(".selectType[data-t=" + t + "]").addClass('active');
            }

        });

        $("#tabs").tabs({
            active: 0
        });
        $('[data-toggle="popover"]').popover({
            //Установление направления отображения popover
            placement: 'bottom'
        });



        $(document).on("click", "#menu a.btnHeader, #modalMainMenu a.btnHeader", function (e) {
            event.preventDefault();//отменяет действие браузера по дефолту
            var id = $(this).attr('href'); //attr получить значение атрибута указанного в href
            console.log(id);
            var top = $(id).offset().top;// offset  координаты выбранного элемента
            $("#modalMainMenu").modal("hide");


            $('body,html').animate({scrollTop: top}, 1500); // ??
        });
        $(window).on('load', function () {
            $(".owl-carousel.logo_img").owlCarousel({
                loop: true,
                margin: 20,
                autoplay: true,
                responsive: { //Адаптивность. Кол-во выводимых элементов при определенной ширине.
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            })

        });

    }
}

