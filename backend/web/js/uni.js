/**
 * Created by vova on 08.08.16.
 */
if (!App) var App = {};

$(document).ready(function () {
    // настройка Даты
    if ($('.dt').length) {
        $(".dt").datepicker({
            changeMonth: true,
            changeYear: true,
            maxDate: "+2y",
            minDate: "-20y",
            format: 'dd.mm.yyyy',
            language: 'ru-RU'
        });

        $('.dt').on('changeDate', function(e) {
            $(this).datepicker('hide');
        });


        // $(document).on("click", "#setPeriod .setDt", function () {
        //     var dt_from = $(this).attr("dt_from");
        //     var dt_to = $(this).attr("dt_to");
        //     $("#SumDt #dt_from_sel").val(dt_from);
        //     $("#SumDt #dt_to_sel").val(dt_to);
        //     $("#formSearch").submit();
        // });
    }



    if ($('.popoverDiv').length) {
        $('.popoverDiv').popover();
    }

    if ($('.phone').length) {
        $(".phone").inputmask("+7 (999) 999-9999", {
            "oncomplete": function () {

            }
        }).inputmask({
            "onincomplete": function () {
                confirmBtn.addClass('hidden')
            }
        });
    }



    $(document).on("keyup", ".digit", function (event) {
        var val = $(this).val();
        val = val.replace(",", ".");
        $(this).val(val);
    });
    $(document).on("keydown", ".digit", function (event) {
        var val = $(this).val();

        switch (event.keyCode) {
            case 110:
            case 189:
            case 109:
            case 173:
            case 48:
            case 49:
            case 50:
            case 51:
            case 52:
            case 53:
            case 54:
            case 55:
            case 56:
            case 57:

            case 96:
            case 97:
            case 98:
            case 99:
            case 100:
            case 101:
            case 102:
            case 103:
            case 104:
            case 105:

            case 8:
            case 9: // tab
            case 13: // enter
            case 17: // ctrl
            case 40: // down
            case 38: // up
            case 39:
            case 37:
                return true;
                break;
        };

        if ((event.keyCode == 190) || (event.keyCode == 191) || (event.keyCode == 188) || (event.keyCode == 110)) {

            var pos = val.indexOf('.');
            if (pos > 0)
                return false;

            var pos = val.indexOf(',');
            if (pos > 0)
                return false;

            return true;
        }

        return false;

    });


});


$.ajaxSetup({
    timeout: 100000,
    beforeSend: function (xhr) {
        var csrf = $("meta[name=csrf-token]").attr("content");
        xhr.setRequestHeader('X-CSRF-Token', csrf);
        loading('загр');
    },
    complete: function () {
        unloading();
    },
    error: function () {
        unloading();
        showError("ошибка приложения", 2000);
    },
    success: function () {
        unloading();
    },
    dataType: 'json',
    type: "POST"
});


if ($('.txtTinyMCE').length) {
    tinymce.init({
        selector:'textarea.txtTinyMCE',
        plugins: [
            "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons template textcolor paste textcolor colorpicker textpattern",
            "filemanager"
        ],
        external_plugins: { "filemanager" : "/lib/tinymce/plugins/filemanager/filemanager/plugin.min.js"},
        external_filemanager_path:"/lib/tinymce/plugins/filemanager/filemanager/",
//  external_filemanager_path:"/admin/storage/web/other/",
        filemanager_title:"Файловый менеджер" ,
        image_advtab: true,
        relative_urls: false,

        toolbar1: "newdocument | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
        toolbar2: "undo redo hr removeformat code | searchreplace | table | subscript superscript | bullist numlist | outdent indent blockquote | link unlink anchor image | forecolor backcolor",
        themes: "modern"
    });
}

/**
 * Работа с AJAX формой, запросами
 */

function showError(str, delay) {
    if (delay) {
        $('#alertMessage').removeClass('success info warning').addClass('error').html(str).stop(true, true).show().animate({
            opacity: 1,
            right: '10'
        }, 500, function () {
            $(this).delay(delay).animate({
                opacity: 0,
                right: '-20'
            }, 500, function () {
                $(this).hide();
            });
        });
        return false;
    }
    $('#alertMessage').addClass('error').html(str).stop(true, true).show().animate({
        opacity: 1,
        right: '10'
    }, 500);
}
function showSuccess(str, delay) {
    if (delay) {
        $('#alertMessage').removeClass('error info warning').addClass('success').html(str).stop(true, true).show().animate({
            opacity: 1,
            right: '10'
        }, 500, function () {
            $(this).delay(delay).animate({
                opacity: 0,
                right: '-20'
            }, 500, function () {
                $(this).hide();
            });
        });
        return false;
    }
    $('#alertMessage').addClass('success').html(str).stop(true, true).show().animate({
        opacity: 1,
        right: '10'
    }, 500);
}
function showWarning(str, delay) {
    if (delay) {
        $('#alertMessage').removeClass('error success  info').addClass('warning').html(str).stop(true, true).show().animate({
            opacity: 1,
            right: '10'
        }, 500, function () {
            $(this).delay(delay).animate({
                opacity: 0,
                right: '-20'
            }, 500, function () {
                $(this).hide();
            });
        });
        return false;
    }
    $('#alertMessage').addClass('warning').html(str).stop(true, true).show().animate({
        opacity: 1,
        right: '10'
    }, 500);
}
function showInfo(str, delay) {
    if (delay) {
        $('#alertMessage').removeClass('error success  warning').addClass('info').html(str).stop(true, true).show().animate({
            opacity: 1,
            right: '10'
        }, 500, function () {
            $(this).delay(delay).animate({
                opacity: 0,
                right: '-20'
            }, 500, function () {
                $(this).hide();
            });
        });
        return false;
    }
    $('#alertMessage').addClass('info').html(str).stop(true, true).show().animate({
        opacity: 1,
        right: '10'
    }, 500);
}

function loading(name) {
    $('body').append('<div id="preloader">' + name + '..</div>');
    $('#preloader').fadeIn();
}

function unloading() {
    $(".btnSubmit").removeAttr("disabled");
    $('#preloader').fadeOut(400).remove();
}

function showErrorModal(str) {
    $("#modalAlertMessage #content").html(str);
    $("#modalAlertMessage").removeClass("success info warning").addClass("error");
    $("#modalAlertMessage #ico").html($("#modalAlertMessage #icoError").html());
    $("#modalAlertMessage").modal("show");
}
function showInfoModal(str) {
    $("#modalAlertMessage #content").html(str);
    $("#modalAlertMessage").removeClass("success error warning").addClass("info");
    $("#modalAlertMessage #ico").html($("#modalAlertMessage #icoInfo").html());
    $("#modalAlertMessage").modal("show");
}
function showSuccessModal(str) {
    $("#modalAlertMessage #content").html(str);
    $("#modalAlertMessage").removeClass("info error warning").addClass("success");
    $("#modalAlertMessage #ico").html($("#modalAlertMessage #icoSuccess").html());
    $("#modalAlertMessage").modal("show");
}




function response_msg(data) {

    if (!data) {
        showError('нет данных от сервера', 5000);
        return false;
    }
    if (data.debug) {
        $("#test").html(data.debug + "<br /><br /><br />");
    }
    if (data.error) {
        if (data.win) showErrorModal(data.error);
        else showError(data.error, 5000);

        if (data.errorFld) {
            var var_form = '';
            if (data.form) var_form = data.form + ' ';
            $.each(data.errorFld, function (index, value) {

                if (value == '') return;
                $(var_form+"#div_" + value).addClass("error");
                $(var_form+"textarea#" + value).addClass("has-error").parent().parent().addClass("has-error");
                $(var_form+"input#" + value).addClass("has-error").parent().parent().addClass("has-error");
                $(var_form+"select#" + value).addClass("has-error").parent().parent().addClass("has-error");

                $(var_form+"input[name=" + value +"]").addClass("has-error").parent().parent().addClass("has-error");
            });
        }


        return false;
    }
    if (data.warning) {
        showWarning(data.warning, 5000);
    }
    if (data.info) {
        if (data.win) showInfoModal(data.info);
        else showInfo(data.info, 5000);
    }
    if (data.success_txt) {
        if (data.win) showSuccessModal(data.success_txt);
        else showSuccess(data.success_txt, 5000);
    }
    return true;
}


/** при ишобочном заполнении когда снова начинаем ввод убираем крачные рамки */
$(document).on("focus", ".error input", function () {
    $(this).parent().removeClass("error");
});
$(document).on("focus", "input.has-error, select.has-error, textarea.has-error", function () {
    $(this).removeClass("has-error").parent().parent().removeClass("has-error");
});


/*
Фуннкция обратная serialize
 */
$.unserialize = function(serializedString){
    var str = decodeURIComponent(serializedString);
    var pairs = str.split('&');
    var obj = {}, p, idx, val, match, key, val;
    for (var i=0, n=pairs.length; i < n; i++) {
        p = pairs[i].split('=');
        idx = p[0];
        if (idx.indexOf("[]") == (idx.length - 2)) {
            var ind = idx.substring(0, idx.length-2)
            if (obj[ind] === undefined) {
                obj[ind] = [];
            }
            obj[ind].push(p[1]);
        }else if (match = idx.match(/([^[]+)[([^]]+)]$/)) {
            key = match[1];
            val = match[2];
            if (!obj[key]) {
                obj[key] = {}
            }
            obj[key][val] = parseValue(p[1])
        }else {
            obj[idx] = parseValue(p[1])
        }
    }
    return obj;
};


/**
 * Аналоги PHP
 */
function in_array(value, array)
{
    for (var i = 0; i < array.length; i++)
    {
        if (array[i] == value)
            return true;
    }
    return false;
}


function explode(delimiter, string) {
    var emptyArray = {0: ''};

    if (arguments.length != 2
        || typeof arguments[0] == 'undefined'
        || typeof arguments[1] == 'undefined')
    {
        return null;
    }

    if (delimiter === ''
        || delimiter === false
        || delimiter === null)
    {
        return false;
    }

    if (typeof delimiter == 'function'
        || typeof delimiter == 'object'
        || typeof string == 'function'
        || typeof string == 'object')
    {
        return emptyArray;
    }

    if (delimiter === true) {
        delimiter = '1';
    }

    return string.toString().split(delimiter.toString());
}

function number_format(number, decimals, dec_point, thousands_sep) {

    var i, j, kw, kd, km;

    // input sanitation & defaults
    if (isNaN(decimals = Math.abs(decimals))) {
        decimals = 2;
    }
    if (dec_point == undefined) {
        dec_point = ",";
    }
    if (thousands_sep == undefined) {
        thousands_sep = ".";
    }

    i = parseInt(number = (+number || 0).toFixed(decimals)) + "";

    if ((j = i.length) > 3) {
        j = j % 3;
    } else {
        j = 0;
    }

    km = (j ? i.substr(0, j) + thousands_sep : "");
    kw = i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands_sep);
    kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).replace(/-/, 0).slice(2) : "");

    return km + kw + kd;
}



if (!Util)
    var Util = {
        resetForm: function (id) {
            //    $(id).each(function(i){
            //       this.reset();
            //    });
            var obj = $(id);
            var act = $("#act", obj).val();
            var YII_CSRF_TOKEN = $("input[name=_csrf]", obj).val();

            $("input[type=text]", obj).val("");
            $("input[type=email]", obj).val("");
            $("input[type=hidden]", obj).val("");
            $("textarea", obj).val("");
            $("select", obj).val(0);
            $("input[type=checkbox]", obj).prop("checked", false);
            $("input[type=radio]", obj).prop("checked", false);

            $("#act", obj).val(act);
            $("input[name=_csrf]", obj).val(YII_CSRF_TOKEN);
        },
        loadForm: function (idForm, arr) {
            var self = this;
            self.resetForm(idForm);
            var obj = $(idForm);
            jQuery.each(arr, function (i, val) {
                $("select[name=" + i + "]", obj).val(val);
                $("textarea[name=" + i + "]", obj).val(val);
                if ($("input[name=" + i + "]", obj).attr("type") == "radio") {
                    $("input[name=" + i + "][value=" + val + "]", obj).prop("checked", "checked");
                } else if ($("input[name=" + i + "]", obj).attr("type") == "checkbox") {
                    if (val > 0) {
                        $("input[name=" + i + "]", obj).prop("checked", true);
                    }
                } else {
                    $("input[name=" + i + "]", obj).val(val);
                }
            });
        },
        in_array: function (value, array)
        {
            for (var i = 0; i < array.length; i++)
            {
                if (array[i] == value)
                    return true;
            }
            return false;
        }
    };













(function( $ ){
    var methods = {
        init : function( options ) {
            var settings = $.extend( {
                'callBack' : 'test'
            }, options);
            $.fn.tbl.settings = settings;

            return this.each(function() {
                var self = $(this);
            });

        },
        index : function( ) {
            return this.each(function() {
                var self = $(this);
                self.nameTbl = self.attr("id");
                self.nameTbl = "#"+self.nameTbl;


                $(document).on("click", self.nameTbl + " #pager > ul > li > a", function() {
                    var href = $(this).attr("href");
                    var page = $(this).html();
                    $(self.nameTbl + " #formSearch").attr("action", href);
                    $(self.nameTbl + " #formSearch").attr("page", page);
                    lst(self);
                    return false;
                });

                jQuery(document).on("submit", self.nameTbl + " #formSearch", function () {
                    var href = $(this).attr("url");
                    $(self.nameTbl + " #formSearch").attr("action", href);
                    lst(self);
                    return false;
                });

                jQuery(document).on("click", self.nameTbl + " .sort", function () {
                    var isAsc = $(this).hasClass("sorting_asc");
                    var fld = $(this).data("fld");
                    var form = $(self.nameTbl + " #formSearch");

                    $(self.nameTbl + " .sort").removeClass("sorting_asc");
                    $(self.nameTbl + " .sort").removeClass("sorting_desc");


                    if (isAsc) {
                        $(this).addClass("sorting_desc");
                        $("#asc", form).val("desc");
                    } else {
                        $(this).addClass("sorting_asc");
                        $("#asc", form).val("asc");
                    }
                    $("#ord", form).val(fld);
                    lst(self);
                });

            });
        },
        lst : function( ) {
            return this.each(function() {
                var self = $(this);
                lst(self);
            });
        }
    };


    var lst = function(self)
    {
        self.nameTbl = self.attr("id");
        var x = self.nameTbl.length;
        if (!x) return;
        self.nameTbl = "#"+self.nameTbl;

        $(self.nameTbl+" .tblData").hide();
        var data_in = $(self.nameTbl + " #formSearch").serialize();
        var url = $(self.nameTbl + " #formSearch").attr("action");


        $.ajax({
            data: data_in, // данные
            url: url, // url
            success: function (data) {
                if (response_msg(data) == false) return;
                self.data = data;

                var upd_url = $(self.nameTbl + " #formSearch").data("upd_url");
                if (upd_url) {
                    var upd_url = upd_url + "?" + data_in;
                    if (upd_url) window.history.pushState(null, null, upd_url);
                }

                if (data.tbl == null) {
                    $(self.nameTbl + " #tblLst").empty();
                    $(self.nameTbl).hide();
                    return;
                }
                if (data.tbl.cnt == 0) {
                    $(self.nameTbl + " #tblLst").empty();
                    $(self.nameTbl + " #pager").empty();
                    $(self.nameTbl + " #cnt").html("0");
                    $(self.nameTbl+" .tblData").hide();
                    if ($.isFunction($.fn.tbl.settings.callBack)) {
                        $.fn.tbl.settings.callBack.call(self);
                    }
                    return;
                } else {
                    $(self.nameTbl+" .tblData").show();
                }

                $(self.nameTbl + " #tblLst").empty();
                $(self.nameTbl + " #tmp_tblLst").tmpl(data.tbl).appendTo(self.nameTbl + " #tblLst");


                $(self.nameTbl + " #cnt").html(data.tbl.cnt);
                $(self.nameTbl + " #pager").html(data.tbl.pager);

                if (data.tbl.pager == "") {
                    $(self.nameTbl + " #pager").hide();
                } else {
                    $(self.nameTbl + " #pager").show();
                }

                $( ".tblLst tr" ).mouseenter( function(){
                    $(self.nameTbl + " .tblLst tr").removeClass("tblCell-top-green");
                    $(self.nameTbl + " .tblLst tr").removeClass("tblCell-bot-green");
                    $(self.nameTbl + " .tblLst tr").removeClass("tblCell-td-green");

                    var id = $(this).data("id");
                    $(self.nameTbl + " .tblLst .tblCell-top[data-id="+id+"]").addClass("tblCell-top-green");
                    $(self.nameTbl + " .tblLst .tblCell-bot[data-id="+id+"]").addClass("tblCell-bot-green");
                    $(".tblLst .tblCell-td[data-id="+id+"]").addClass("tblCell-td-green");
                } ).mouseleave( function() {
                    $(self.nameTbl + " .tblLst tr").removeClass("tblCell-top-green");
                    $(self.nameTbl + " .tblLst tr").removeClass("tblCell-bot-green");
                    $(self.nameTbl + " .tblLst tr").removeClass("tblCell-td-green");
                } );

                if ($.isFunction($.fn.tbl.settings.callBack)) {
                    $.fn.tbl.settings.callBack.call(self);
                }
            }
        });
    }

    $.fn.tbl = function( method ) {

        // логика вызова метода
        if ( methods[method] ) {
            return methods[ method ].apply( this, Array.prototype.slice.call( arguments, 1 ));
        } else if ( typeof method === 'object' || ! method ) {
            return methods.init.apply( this, arguments );
        } else {
            $.error( 'Метод с именем ' +  method + ' не существует для jQuery.tbl' );
        }
    };

})( jQuery );






(function ($) {
    jQuery.expr[':'].Contains = function(a,i,m){
        return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase())>=0;
    };

    function filterList(header, list) {
        var form = $("<form>").attr({"class":"filterform","action":"#"}),
            div = $("<div>").attr({"class":"has-feedback"}),
            span = $("<span>").attr({"class":"glyphicon glyphicon-search form-control-feedback"}),
            input = $("<input>").attr({"class":"filterinput form-control","type":"text"});
        div.append(input).append(span);
        $(form).append(div).appendTo(header);

        $(input)
            .change( function () {
                var filter = $(this).val();
                if(filter) {

                    $matches = $(list).find('span:Contains(' + filter + ')').parent();
                    $('li', list).not($matches).slideUp();
                    $matches.slideDown();

                } else {
                    $(list).find("li").slideDown();
                }
                return false;
            })
            .keyup( function () {
                $(this).change();
            });
    }

    $.fn.filterList = function( method ) {
        filterList($("#form", this), $("#lst", this));
    };

}(jQuery));






