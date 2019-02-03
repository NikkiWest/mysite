UsersCtrl = {
    actionIndex: function () {


        $(document).on("click", ".btnPay", function (e) {
            e.preventDefault();
            var user_id = $(this).data("user_id");
            $("#formPay input[name=user_id]").val(user_id);
            $("#modalPay").modal("show");
        }),

        $(document).on("submit", "#formPay", function (e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                data: data,
                url: "/admin/users/set-oplata",
                success: function (data) {
                    if (response_msg(data) === false) return;
                    $.pjax.reload('#grid-container', {url: window.location.href});
                    $("#modalPay").modal("hide");
                }
            });
            return false;
        })
    }
}