var PortfolioCtrl = {
    actionView: function () {
        $(document).on("click", "#btnOrder", function (e) {
            e.preventDefault();
            $("#modalOrder").modal("show");
        });
    }
}