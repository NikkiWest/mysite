var CodeCtrl = {
    actionEdit : function ()
    {
        $(document).on("submit", "#formSave", function (e) {
            e.preventDefault();

            var data = $(this).serialize();
            var options = {
                data: data,
                url: "/admin/codes/save",
                success: function (data) {
                    unloading();
                    if (response_msg(data) == false) return;
                    location.href = "/admin/codes/";

                },
                complete: function () {
                    unloading();
                },
                error: function () {
                    unloading();
                    showError("ошибка приложения", 2000);
                }
            };
            $(this).ajaxSubmit(options);
            return false;
        });
    }

}