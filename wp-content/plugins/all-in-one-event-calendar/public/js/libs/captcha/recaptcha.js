timely.define(["jquery_timely","//www.google.com/recaptcha/api/js/recaptcha_ajax.js"],function(e){var t=!1,n=function(){return"undefined"!=typeof Recaptcha},r=function(n){Recaptcha.create(n.key,n.object,{theme:"white",callback:function(){e(i(),n.captcha_object).attr("placeholder",n.placeholder),n.captcha_object.removeClass("ai1ec-initializing").addClass("ai1ec-initialized"),t=!0}}),n.captcha_object.addClass("ai1ec-initializing")},i=function(){return"#recaptcha_response_field"},s=function(t){e(i(),t).length&&n()&&Recaptcha.reload()},o=function(t){e(".ai1ec-recaptcha",t).removeClass("ai1ec-initializing ai1ec-initialized"),Recaptcha.destroy()},u=function(){if(!t)return!0;var n=e(i());return n.val().length>0};return{is_ready:n,init:r,get_field_name:i,reload:s,destroy:o,check_field:u}});