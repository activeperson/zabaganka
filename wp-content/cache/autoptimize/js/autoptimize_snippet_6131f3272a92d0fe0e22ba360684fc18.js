if("undefined"==typeof MailActions||"null"==typeof MailActions)var MailActions={};!function(s){s("body").on("submit",".wps_form_js",function(){var e=s(this),a=e.find("[type=submit]"),n=new FormData(e[0]);n.append("action","wps_form_send");var o=e.data("callback"),i=e.find("[name=form_redirect]").val();return s.ajax({url:theme_ajax.url,type:"POST",data:n,dataType:"json",cache:!1,processData:!1,contentType:!1,beforeSend:function(){e.addClass("sending"),a.addClass("sending"),a.prop("disabled",!0)},success:function(s){void 0!==i&&""!==i?window.location.replace(i+"/"):(e.trigger("reset"),a.prop("disabled",!1),e.removeClass("sending"),a.removeClass("sending"),e.addClass("success"),a.addClass("success"),setTimeout(function(){e.removeClass("success"),a.removeClass("success")},2500),console.log("WPS Mail success")),"undefined"!=typeof MailActions[o]&&MailActions[o]()},error:function(s){console.log("WPS Mail error"),a.prop("disabled",!1)}}),!1})}(jQuery);