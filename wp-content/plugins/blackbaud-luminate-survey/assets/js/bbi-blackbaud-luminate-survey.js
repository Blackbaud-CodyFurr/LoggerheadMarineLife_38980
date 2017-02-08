/*! (c) Blackbaud, Inc. */
(function (bbi) {
    "use strict";

    var appOptions = {
        alias: "BlackbaudLuminateSurvey",
        author: "Blackbaud Interactive"
    };



    function luminate(req) {
        var deferred = $.Deferred();
        if (!req.callback) {
            req.callback = function (res) {
                console.log(res);
                deferred.resolve(res);
            };
        }
        luminateExtend.api(req);
        return deferred.promise();
    }



    function buildSurvey(app, bbi, $) {

        var _settings, _defaults = {
            consId: 0
        };

        var _$element;

        return {
            init: function (options, element) {

                var data = BBWP.plugins.blackbaud_luminate_survey.api;
                var opts = {
                    apiKey: data.key,
                    path: {
                        nonsecure: data.nonsecure,
                        secure: data.secure
                    }
                };

                if (bbi.isPageEditor()) {
                    return;
                }

                _settings = $.extend(true, {}, _defaults, options);
                _$element = $(element);

                // Initialize luminateExtend.
                luminateExtend.init(opts);

                // Add Handlebars template.
                luminateExtend.global.update('handlebarsTemplate', data.handlebarsTemplate);

                // Trigger ready event.
                $(document).trigger("luminate-ready");
                luminateExtend.global.update('ready', true);


                // Get Handlebars.js
                var handlebarsDeferred = $.Deferred();
                bbi.require(['handlebars-helpers'], function () {
                    handlebarsDeferred.resolve();
                });

                // Login test...
                luminate({
                    api: 'cons',
                    data: 'method=loginTest'
                }).then(function (res) {

                    // Get the survey...
                    luminate({
                        api: 'survey',
                        requiresAuth: true,
                        data: 'method=getSurvey&survey_id=' + _settings.surveyId
                    }).then(function (res) {

                        var data;
                        if (res.getSurveyResponse) {

                            data = res.getSurveyResponse.survey;

                            // When the API returns only one field, it removes the array.
                            // Add it back!
                            if (data.surveyQuestions.categoryId) {
                                data.surveyQuestions = [data.surveyQuestions];
                            }

                            var luminateExtendReady = function () {
                                var template = Handlebars.compile(luminateExtend.global.handlebarsTemplate);

                                data.settings = {
                                    consId: _settings.consId,
                                    path: luminateExtend.global.path
                                };

                                _$element.html(template(data));

                                window.submitSurveyCallback = {
                                    error: function (res) {
                                        console.log("Error:", res);
                                    },
                                    success: function (res) {
                                        if (res.submitSurveyResponse.success === "true") {
                                            data.confirmation = res.submitSurveyResponse.thankYouPageContent;

                                        } else {
                                            if (res.submitSurveyResponse.errors.errorCode) {
                                                res.submitSurveyResponse.errors = [res.submitSurveyResponse.errors];
                                            }

                                            var questions = data.surveyQuestions;
                                            var errors = res.submitSurveyResponse.errors;

                                            // Does the question have any errors?
                                            for (var q in questions) {

                                                if (questions[q].questionType === "MultiSingleRadio") {
                                                    questions[q].value = _$element.find('#question_' + questions[q].questionId).find('input:checked').val();
                                                } else {
                                                    questions[q].value = _$element.find('#question_' + questions[q].questionId).val();
                                                }

                                                for (var e in errors) {
                                                    if (questions[q].questionId === errors[e].questionInError) {
                                                        questions[q].error = errors[e].errorMessage;
                                                        break;
                                                    }
                                                }
                                            }

                                            data.hasErrors = true;
                                        }

                                        _$element.html(template(data));
                                        luminateExtend.api.bind();
                                    }
                                };
                                luminateExtend.api.bind();
                            };

                            handlebarsDeferred.promise().then(function () {
                                if (luminateExtend.global.ready) {
                                    luminateExtendReady();
                                } else {
                                    bbi.jQuery('window')(document).on('luminate-ready', luminateExtendReady);
                                }
                            });
                        }
                    });
                }).fail(function (res) {
                    console.log("[FAILED] Luminate extend: ", res);
                });
            }
        };
    }

    bbi
        .register(appOptions)
        .action("BuildSurvey", buildSurvey)
        .build();
}(window.bbiGetInstance()));
