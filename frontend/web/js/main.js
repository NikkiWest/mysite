var MainCtrl = {
    actionIndex: function () {

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

        $(document).on("click", "#regBanner", function (e) {
            e.preventDefault();
            $("#modalRegForm").modal("show");
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

