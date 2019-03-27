var ServiceCtrl = {
    actionIndex: function () {

        $(document).on("click", ".btnOpenOrder", function (e) {
            e.preventDefault();
            var t = $(this).data("t");
            var service = $(this).data("service");
            $("#formOrderService input[name=type]").val(t);
            $("#formOrderService input[name=service_id]").val(service);
            $("#modalOrderService").modal("show");
        });
        $(document).on("submit", "#formOrderService", function (e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                data: data,
                url: "/service/default/save-order",
                success: function (data) {
                    if (response_msg(data) === false) return;
                    Util.resetForm("#formOrderService");
                    $("#modalOrderService").modal("hide");

                }
            });
            return false;
        });

        $(document).on("change", "#range_programming", function (e) {
            e.preventDefault();
            $('#input_programming').val($('#range_programming').val());
        });

        $(document).on("keyup", "#input_programming", function (e) {
            e.preventDefault();
            $('#range_programming').val($('#input_programming').val());
        });

        $(document).on("mousemove", "#range_programming", function (e) {
            e.preventDefault();
            $('#range_programming').val($('#input_programming').val());
        });
        $('#input_programming').val($('#range_programming').val());


    },
}