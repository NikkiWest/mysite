var PortfolioCtrl = {
    actionView: function () {
        $(document).on("click", "#btnOrder", function (e) {
            e.preventDefault();
            $("#modalOrder").modal("show");
        });

        $(document).on("submit", "#formOrder", function (e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                data: data,
                url: '/portfolio/order',
                success: function (data) {
                    if (response_msg(data) === false) return;
                    Util.resetForm("#formOrder");
                    $("#modalOrder").modal("hide");
                }
            });
            return false;
        });
    },
    actionIndex : function () {

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
    }
}