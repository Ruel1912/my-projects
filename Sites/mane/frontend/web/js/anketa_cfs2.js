$(document).ready(function () {
    /*initial conditions*/
    var _Object = {
            client_param: 'der_custom'
        },
        currentStep = 0, // текущий шаг, меняем при отладке
        error = false,
        prg = 10 * (currentStep + 1),
        quizStep = 1,
        qzErr = false,
        propertyType = 'mine',
        propUpdate = null,
        dealUpdate = null,
        quizFullComplete = false;
    var params1 = window
        .location
        .search
        .replace('?','')
        .split('&')
        .reduce(
            function(p,e){
                var a = e.split('=');
                p[ decodeURIComponent(a[0])] = decodeURIComponent(a[1]);
                return p;
            },
            {}
        );
    $('.progress-bar-anketa').css('width', prg + "%");
    /*initial conditions*/

    /*render function*/
    function renderPageByStep(step, object) {
        switch (step) {
            case 0:
                try {
                    $('.frender' + step).each(function () {
                        var prop = $(this).attr('name');
                        if (prop !== 'phone') {
                            if (prop !== "p") {
                                if (object.system_info !== undefined && object.system_info !== null) {
                                    if (object.system_info[prop] !== undefined && object.system_info[prop] !== null) {
                                        $(this).val(object.system_info[prop]);
                                    }
                                }
                            } else {
                                if (object.system_info !== undefined && object.system_info !== null) {
                                    if (object.system_info.email !== undefined && object.system_info.email !== null) {
                                        $(this).val(object.system_info.email);
                                    }
                                }
                            }
                        }
                    });
                } catch (e) {
                    console.log(e);
                    if($(window).width() > 900 && $('.cabinet_info').height() <= 1035 && $('.cabinet_main').height() <= 1035){
                        $('.cabinet_main_container').css({
                          'min-height': '1035px',
                        });
                      }else if($(window).width() > 900 && $('.cabinet_main').height() > 1035){
                        $('.cabinet_main_container').css({
                          'min-height': 'calc(100vh - 160px)',
                        });
                      }
                }
                break;
            case 1:
                try {
                    if (object.status_soc !== undefined && object.status_soc !== null) {
                        if (object.status_soc.length > 0) {
                            for (var i = 0; i < object.status_soc.length; i++) {
                                $('.soc[data-value="' + object.status_soc[i] + '"]').prop('checked', true);
                                if (object.status_soc[i] === 'Работающий') {
                                    $('input[name="work_place_additional"]').prop('disabled', false);
                                    $('input[name="work_place_main"]').prop('disabled', false);
                                }
                                if (object.status_soc[i] === 'Безработный' || object.status_soc[i] === 'В декретном отпуске' || object.status_soc[i] === 'Нетрудоспособный') {
                                    $('.socinp').fadeOut(1);
                                    $('.soc3').each(function () {
                                        $(this).css('color', 'rgb(151, 151, 151)');
                                    });
                                } else {
                                    $('.socinp').fadeIn(1);
                                    $('.soc4').each(function () {
                                        $(this).css('color', 'rgb(151, 151, 151)');
                                    });
                                }
                            }
                        }
                    }
                    if (object.work_place !== undefined && object.work_place !== null) {
                        if (object.work_place.main !== undefined)
                            $('input[name="work_place_main"]').val(object.work_place.main);
                        if (object.work_place.additional !== undefined)
                            $('input[name="work_place_additional"]').val(object.work_place.additional);
                    }
                    if (object.marital_status !== undefined && object.marital_status !== null) {
                        if (object.marital_status.main !== undefined && object.marital_status.main !== null) {
                            $('select[name="marital_status_main"]').val(object.marital_status.main);
                            switch (object.marital_status.main) {
                                case 'Женат (замужем)':
                                    $('#marital_block_div').fadeOut(1, function () {
                                        $('#marital_block_tog').fadeIn(1);
                                    });
                                    if (object.marital_status.additional !== undefined && object.marital_status.additional !== null) {
                                        $('select[name="marital_status_additional_tog"]').val(object.marital_status.additional);
                                    }
                                    break;
                                case 'Разведен (разведена)':
                                    $('#marital_block_tog').fadeOut(1, function () {
                                        $('#marital_block_div').fadeIn(1);
                                    });
                                    if (object.marital_status.additional !== undefined && object.marital_status.additional !== null) {
                                        $('select[name="marital_status_additional_div"]').val(object.marital_status.additional);
                                    }
                                    if (object.marital_status.division !== undefined && object.marital_status.division !== null) {
                                        $('select[name="marital_status_additional_division"]').val(object.marital_status.division);
                                    }
                                    break;
                                default:
                                    $('#marital_block_tog').fadeOut(1);
                                    $('#marital_block_div').fadeOut(1);
                                    break;
                            }
                        }
                    }
                    if (object.dependents !== undefined && object.dependents !== null) {
                        if (object.dependents.main !== undefined && object.dependents.main !== null) {
                            if (object.dependents.main === 'Есть') {
                                $('#deps-hidden-block').fadeIn(1);
                                if (object.dependents.additional !== undefined && object.dependents.additional !== null)
                                    $('select[name="dependents_additional"]').val(object.dependents.additional);
                            } else {
                                $('#deps-hidden-block').fadeOut(1);
                            }
                            $('select[name="dependents_main"]').val(object.dependents.main);
                        }
                    }
                    if (object.disability !== undefined && object.disability !== null) {
                        if (object.disability.main !== undefined && object.disability.main !== null) {
                            if (object.disability.main === 'Есть') {
                                $('#disab_hidden').fadeIn(1);
                                if (object.disability.additional !== undefined && object.disability.additional !== null)
                                    $('input[name="disability_additional"]').val(object.disability.additional);
                            } else {
                                $('#disab_hidden').fadeOut(1);
                            }
                            $('select[name="disability_main"]').val(object.disability.main);
                        }
                    }
                    if (object.criminal_record !== undefined && object.criminal_record !== null) {
                        if (object.criminal_record.main !== undefined && object.criminal_record.main !== null) {
                            if (object.criminal_record.main === 'Да') {
                                $('#criminal_record_hidden_block').fadeIn(1);
                                if (object.criminal_record.additional !== undefined && object.criminal_record.additional !== null) {
                                    if (object.criminal_record.additional.length > 0) {
                                        $('.not_del_criminal').val(object.criminal_record.additional[0]);
                                        if (object.criminal_record.additional.length > 1) {
                                            for (var k = 1; k < object.criminal_record.additional.length; k++) {
                                                var block = '<input type="text" class="aninpt2 criminal_a to_remove_criminal" value="' + object.criminal_record.additional[k] + '" name="criminal_record_additional[]" placeholder="Укажите статью УК РФ" style="margin-top: 10px;">';
                                                $(".criminal_record_add").append(block);
                                            }
                                        }
                                    }
                                }
                            }
                            $('select[name="criminal_record_main"]').val(object.criminal_record.main);
                        }
                    }
                } catch (e) {
                    console.log(e);
                    if($(window).width() > 900 && $('.cabinet_info').height() <= 1035 && $('.cabinet_main').height() <= 1035){
                        $('.cabinet_main_container').css({
                          'min-height': '1035px',
                        });
                      }else if($(window).width() > 900 && $('.cabinet_main').height() > 1035){
                        $('.cabinet_main_container').css({
                          'min-height': 'calc(100vh - 160px)',
                        });
                      }
                }
                break;
            case 2:
                if (object.credit_debt !== null && object.credit_debt !== undefined && object.credit_debt.length > 0) {
                    try {
                        var html = '';
                        html = renderCreditDebt(html);
                        $('.credit_debt_append_block').html(html);
                        $('.credit_debt_hide1').fadeOut(1);
                    } catch (e) {
                        console.log(e);
                        if($(window).width() > 900 && $('.cabinet_info').height() <= 1035 && $('.cabinet_main').height() <= 1035){
                            $('.cabinet_main_container').css({
                              'min-height': '1035px',
                            });
                          }else if($(window).width() > 900 && $('.cabinet_main').height() > 1035){
                            $('.cabinet_main_container').css({
                              'min-height': 'calc(100vh - 160px)',
                            });
                          }
                    }
                }
                break;
            case 3:
                if (object.other_debt !== null && object.other_debt !== undefined && object.other_debt.length > 0) {
                    try {
                        var html1 = '';
                        html1 = renderOtherDebt(html1);
                        $('.other_debt_append_block').html(html1);
                        $('.other_debt_hide1').fadeOut(1);
                        $(".dropdown2").chosen(
                            {disable_search_threshold: 5}
                        );
                    } catch (e) {
                        console.log(e);
                        if($(window).width() > 900 && $('.cabinet_info').height() <= 1035 && $('.cabinet_main').height() <= 1035){
                            $('.cabinet_main_container').css({
                              'min-height': '1035px',
                            });
                          }else if($(window).width() > 900 && $('.cabinet_main').height() > 1035){
                            $('.cabinet_main_container').css({
                              'min-height': 'calc(100vh - 160px)',
                            });
                          }
                    }
                }
                break;
            case 4:
                if (object.additional_audit_info !== null && object.additional_audit_info !== undefined) {
                    try {
                        $('.step4').toggleClass('step4').fadeOut(1, function () {
                            quizStep = 9;
                            quizFullComplete = true;
                            rebuildCompleteAdditionalInfoBlock();
                            $('.step4-1').toggleClass('step4');
                            $('.next-go').fadeIn();
                        });
                        for (var key in _Object.additional_audit_info) {
                            var html2 = '',
                                len = 0;
                            $('.quiz-del-section[data-restore-type="' + key + '"]').html(appendAdditional(html2, key));
                            switch (key) {
                                case 'court_decision':
                                    if (_Object.additional_audit_info.court_decision.main === 'ДА' && _Object.additional_audit_info[key].additional !== undefined && _Object.additional_audit_info[key].additional !== null) {
                                        len = _Object.additional_audit_info[key].additional.length;
                                        $('.court_decision_summ').val(_Object.additional_audit_info.court_decision.additional[len - 1].court_decision_summ);
                                        $('.court_decision_date').val(_Object.additional_audit_info.court_decision.additional[len - 1].court_decision_date);
                                        $('.court_decision_number').val(_Object.additional_audit_info.court_decision.additional[len - 1].court_decision_number);
                                    }
                                    break;
                                case 'executive_proceedings':
                                    if (_Object.additional_audit_info.executive_proceedings.main === 'ДА' && _Object.additional_audit_info[key].additional !== undefined && _Object.additional_audit_info[key].additional !== null) {
                                        len = _Object.additional_audit_info[key].additional.length;
                                        $('.executive_proceedings_number').val(_Object.additional_audit_info.executive_proceedings.additional[len - 1].executive_proceedings_number);
                                        $('.executive_proceedings_date').val(_Object.additional_audit_info.executive_proceedings.additional[len - 1].executive_proceedings_date);
                                        $('.executive_proceedings_summ').val(_Object.additional_audit_info.executive_proceedings.additional[len - 1].executive_proceedings_summ);
                                    }
                                    break;
                                case 'debits':
                                    if (_Object.additional_audit_info.debits.main === 'ДА' && _Object.additional_audit_info[key].additional !== undefined && _Object.additional_audit_info[key].additional !== null) {
                                        len = _Object.additional_audit_info[key].additional.length;
                                        $('.debits_organisation').val(_Object.additional_audit_info.debits.additional[len - 1].debits_organisation);
                                        $('.debits_summ').val(_Object.additional_audit_info.debits.additional[len - 1].debits_summ);
                                    }
                                    break;
                                case 'arests':
                                    if (_Object.additional_audit_info.arests.main === 'ДА' && _Object.additional_audit_info[key].additional !== undefined && _Object.additional_audit_info[key].additional !== null) {
                                        len = _Object.additional_audit_info[key].additional.length;
                                        $('.arests_reason').val(_Object.additional_audit_info.arests.additional[len - 1].arests_reason);
                                        $('.arests_type').val(_Object.additional_audit_info.arests.additional[len - 1].arests_type);
                                    }
                                    break;
                                case 'LLC_capital':
                                    if (_Object.additional_audit_info.LLC_capital.main === 'ДА' && _Object.additional_audit_info[key].additional !== undefined && _Object.additional_audit_info[key].additional !== null) {
                                        len = _Object.additional_audit_info[key].additional.length;
                                        $('.LLC_capital_type').val(_Object.additional_audit_info.LLC_capital.additional[len - 1].LLC_capital_type);
                                        $('.LLC_capital_percent').val(_Object.additional_audit_info.LLC_capital.additional[len - 1].LLC_capital_percent);
                                    }
                                    break;
                                case 'official_income':
                                    if (_Object.additional_audit_info.official_income.main === 'НЕТ' && _Object.additional_audit_info[key].additional !== undefined && _Object.additional_audit_info[key].additional !== null) {
                                        $('.official_income_additional').val(_Object.additional_audit_info.official_income.additional);
                                    }
                                    break;
                                case 'receivables':
                                    if (_Object.additional_audit_info.receivables.main === 'ДА' && _Object.additional_audit_info[key].additional !== undefined && _Object.additional_audit_info[key].additional !== null) {
                                        len = _Object.additional_audit_info[key].additional.length;
                                        $('.receivables_debtor').val(_Object.additional_audit_info.receivables.additional[len - 1].receivables_debtor);
                                        $('.receivables_summ').val(_Object.additional_audit_info.receivables.additional[len - 1].receivables_summ);
                                    }
                                    break;
                                case 'housing':
                                    if (_Object.additional_audit_info.housing !== undefined && _Object.additional_audit_info.housing !== null) {
                                        if (_Object.additional_audit_info.housing.additional !== null && _Object.additional_audit_info.housing.additional !== undefined) {
                                            if (_Object.additional_audit_info.housing.main === 'АРЕНДОВАННОЕ') {
                                                $('.rent_aren').val(_Object.additional_audit_info.housing.additional.rent);
                                            } else {
                                                $('.year_sob').val(_Object.additional_audit_info.housing.additional.year);
                                                $('.price_sob').val(_Object.additional_audit_info.housing.additional.price);
                                                $('.registered_sob').prop('checked', _Object.additional_audit_info.housing.additional.registered);
                                            }
                                        }
                                    }
                                    break;
                            }
                        }
                    } catch (e) {
                        console.log(e);
                        if($(window).width() > 900 && $('.cabinet_info').height() <= 1035 && $('.cabinet_main').height() <= 1035){
                            $('.cabinet_main_container').css({
                              'min-height': '1035px',
                            });
                          }else if($(window).width() > 900 && $('.cabinet_main').height() > 1035){
                            $('.cabinet_main_container').css({
                              'min-height': 'calc(100vh - 160px)',
                            });
                          }
                    }
                }
                break;
            case 5:
                try {
                    if (object.incoming_money !== null && object.incoming_money !== undefined && object.incoming_money.chosen !== null && object.incoming_money.chosen !== undefined && object.incoming_money.chosen.length > 0) {
                        var html3 = '';
                        html3 = renderIncomingMoney(html3);
                        $('.append5stepblock').html(html3);
                        $('.hide5stepblock').fadeOut(1);
                        $(".dropdown2").chosen(
                            {disable_search_threshold: 5}
                        );
                    }
                    if (object.marital_status !== undefined && object.marital_status !== null) {
                        if (object.marital_status.main !== undefined && object.marital_status.main !== 'Не женат (не замужем) / Вдовец (вдова)') {
                            if (object.marital_status.main === 'Разведен (разведена)') {
                                $('.ifsoc2').show();
                                $('.ifsoc1').hide();
                            } else {
                                $('.ifsoc1').show();
                                $('.ifsoc2').hide();
                            }
                        } else {
                            $('.ifsoc1').hide();
                            $('.ifsoc2').hide();
                        }
                    }
                } catch (e) {
                    console.log(e);
                    if($(window).width() > 900 && $('.cabinet_info').height() <= 1035 && $('.cabinet_main').height() <= 1035){
                        $('.cabinet_main_container').css({
                          'min-height': '1035px',
                        });
                      }else if($(window).width() > 900 && $('.cabinet_main').height() > 1035){
                        $('.cabinet_main_container').css({
                          'min-height': 'calc(100vh - 160px)',
                        });
                      }
                }
                break;

            case 6:
                if (object.property !== undefined && object.property !== null) {
                    try {
                        renderPropertyByType('mine');
                        renderPropertyByType('partner');
                        renderPropertyByType('ex_partner');
                    } catch (e) {
                        console.log(e);
                        if($(window).width() > 900 && $('.cabinet_info').height() <= 1035 && $('.cabinet_main').height() <= 1035){
                            $('.cabinet_main_container').css({
                              'min-height': '1035px',
                            });
                          }else if($(window).width() > 900 && $('.cabinet_main').height() > 1035){
                            $('.cabinet_main_container').css({
                              'min-height': 'calc(100vh - 160px)',
                            });
                          }
                    }
                }
                break;

            case 7:
                if (object.deals !== undefined && object.deals !== null)
                    try {
                        renderDeals();
                    } catch(e) {
                        console.log(e);
                        if($(window).width() > 900 && $('.cabinet_info').height() <= 1035 && $('.cabinet_main').height() <= 1035){
                            $('.cabinet_main_container').css({
                              'min-height': '1035px',
                            });
                          }else if($(window).width() > 900 && $('.cabinet_main').height() > 1035){
                            $('.cabinet_main_container').css({
                              'min-height': 'calc(100vh - 160px)',
                            });
                          }
                    }
                break;

            case 8:
                if (object.rationale !== undefined && object.rationale !== null) {
                    try {
                        $('#rationale-text').val(object.rationale);
                    } catch (e) {
                        console.log(e);
                        if($(window).width() > 900 && $('.cabinet_info').height() <= 1035 && $('.cabinet_main').height() <= 1035){
                            $('.cabinet_main_container').css({
                              'min-height': '1035px',
                            });
                          }else if($(window).width() > 900 && $('.cabinet_main').height() > 1035){
                            $('.cabinet_main_container').css({
                              'min-height': 'calc(100vh - 160px)',
                            });
                          }
                    }
                }
                break;

        }
    }

    /*render function*/

    /*check if object exist*/
    if ($('#obj-div').text().length > 0 && $('#obj-div').text() !== 'null') {
        _Object = JSON.parse($('#obj-div').text());
        for (var j = 0; j < 9; j++)
            renderPageByStep(j, _Object);
    } else
        _Object = {
            client_param: 'der_custom'
        };
    /*check if object exist*/

    /*popup*/
    $('.show-popup').on('click', function () {
        var stp = $(this).attr('data-step'),
            obj = $(this);
        if (stp !== null && stp !== undefined && stp.length > 0) {
            stp = parseInt(stp);
            switch (stp) {
                case 2:
                    $('#an-pop-over-3').fadeIn();
                    break;
                case 3:
                    $('#an-pop-over-4-1').fadeIn(1, function () {
                        $('select#choose-type-other-debt').val('');
                        $("select#choose-type-other-debt").trigger('chosen:updated');
                    });
                    break;
                case 5:
                    $('#an-pop-over-6-1').fadeIn(1, function () {
                        $('select#choose-type-dohod').val('');
                        $("select#choose-type-dohod").trigger('chosen:updated');
                    });
                    break;
                case 6:
                    $('#an-pop-over-7-1').fadeIn(1, function () {
                        propUpdate = null;
                        $('select#choose-type-property').val('');
                        $("select#choose-type-property").trigger('chosen:updated');
                        propertyType = obj.attr('data-type');
                    });
                    break;
                case 7:
                    $('#an-pop-over-8-1').fadeIn(1, function () {
                        dealUpdate = null;
                        $('.one-more-deal').parent().show();
                        $('.add-deals-btn').text('ДОБАВИТЬ');
                        $('select#choose-deal-type').val('');
                        $("select#choose-deal-type").trigger('chosen:updated');
                    });
                    break;
            }
        }
        //$('#an-pop-over-5').fadeIn(400);
    });

    $('.an-pop-over, .closing-tag, .str-back').on('click', function (e) {
        if (e.target.className === 'an-flexpop'
            || e.target.className === 'closing-tag'
            || e.target.className === 'an-pop-over'
            || e.target.className === 'str-back') {
            $('.an-pop-over').fadeOut(1);
        }
    });
    /*popup*/

    /*misc*/
    $(".dropdown1").chosen(
        {disable_search_threshold: 5}
    );

    $(function () {
        $("#datepicker").datepicker({
            showOtherMonths: true,
            selectOtherMonths: true,
            dateFormat: "yy-mm-dd",
            monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
            dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
        });
        $("#datepicker2").datepicker({
            showOtherMonths: true,
            selectOtherMonths: true,
            dateFormat: "yy-mm-dd",
            monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
            dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
        });
    });
    $(document).keypress(function (e) {
        if (e.which === 13) {
            e.preventDefault();
            $(e.target).blur();
            return false;
        }
    });
    /*misc*/

    /*global*/
    $('.next-step-anketa').on('click', function () {
        var message = '';
        console.log(currentStep);
        if($(window).width() > 900 && $('.cabinet_info').height() <= 1035 && $('.cabinet_main').height() <= 1035){
                          $('.cabinet_main_container').css({
                            'min-height': '1035px',
                          });
                        }else if($(window).width() > 900 && $('.cabinet_main').height() > 1035){
                          $('.cabinet_main_container').css({
                            'min-height': 'calc(100vh - 160px)',
                          });
                        }
        switch (currentStep) {
            case 0:
                var countEmpty = 0;
                _Object.system_info = {};
                $('.validate-first').each(function () {
                    var type = $(this).attr('name');
                    if ($(this).val().length <= 0)
                        countEmpty++;
                    _Object.system_info[type] = $(this).val();
                });
                if (countEmpty) {
                    error = true;
                    message = "Необходимо заполнить все обязательные поля";
                } else {
                    error = false;
                    var eml = $('input[name="p"]');
                    if (eml.val().length <= 0 || eml.val().indexOf("@") === -1) {
                    } else
                        _Object.system_info.email = eml.val();
                }
                break;
            case 1:
                var countStatus = 0,
                    worker = false,
                    wpmain = $('input[name="work_place_main"]'),
                    wpadd = $('input[name="work_place_additional"]');
                $('.soc').each(function () {
                    if ($(this).prop('checked')) {
                        if ($(this).attr('data-value') === 'Работающий')
                            worker = true;
                        countStatus++;
                    }
                });
                if (!countStatus) {
                    error = true;
                    message = 'Необходимо выбрать минимум 1 социальный статус';
                } else {
                    if (worker && (wpadd.val().length <= 0 || wpmain.val().length <= 0)) {
                        error = true;
                        message = "Необходимо указать место работы и должность";
                    } else {
                        error = false;
                        if (_Object.status_soc !== null && _Object.status_soc !== undefined) {
                            if (!_Object.status_soc.includes('Работающий')) {
                                if (_Object.work_place !== null && _Object.work_place !== undefined) {
                                    _Object.work_place.main = null;
                                    _Object.work_place.additional = null;
                                }
                            }
                        }
                    }
                }
                //error = false;
                break;
            case 2:
                if (_Object.credit_debt === null || _Object.credit_debt === undefined || _Object.credit_debt === []) {
                    error = true;
                    message = 'Необходимо добавить данные о кредиторах.';
                } else {
                    if ($('#totSummInp').val() == 0 || $('#totSummInp').val() === undefined || $('#totSummInp').val() === '') {
                        error = true;
                        message = 'Сумма долга не может быть равна 0.';
                    } else {
                        error = false;
                    }
                }
                //error = false;
                break;
            case 3:
                error = false;
                if (_Object.additional_audit_info === null || _Object.additional_audit_info === undefined || _Object.additional_audit_info === {})
                    $('.next-go').fadeOut(1);
                break;

            case 4:
                error = false;
                renderPageByStep(5, _Object);
                break;

            case 8:
                var txt = $('#rationale-text').val();
                _Object.rationale = txt;
                error = false;
                $('.step4').toggleClass('step4').fadeOut(1, function () {
                    quizStep = 9;
                    rebuildCompleteAdditionalInfoBlock();
                    $('.step4-1').toggleClass('step4');
                });
                break;


        }
        if (!error) {
            $.ajax({
                url: "anketa-function?client_param=der_custom",
                method: "POST",
                data: {data: JSON.stringify(_Object)},
                dataType: "JSON",
                beforeSend: function () {
                    $('#over-overlay').fadeIn(300);
                }
            }).done(function (e) {
                $('#over-overlay').fadeOut(100);
                if (e.status === 'success') {
                    if (currentStep === 0) {
                        $('#first-form-anketa').fadeOut(100, function () {
                            currentStep++;
                            $('#second-big-section-anketa').fadeIn(100);
                        });
                    } else if (currentStep === 4) {
                        $(".step4").fadeOut(1, function () {
                            $('.step4-1').fadeOut(1, function () {
                                $('.step' + ++currentStep).fadeIn();
                            });
                        });
                    } else {
                        $('.step' + currentStep).fadeOut(100, function () {
                            currentStep++;
                            $('.step' + currentStep).fadeIn();
                        });
                    }
                    if (currentStep === 8) {
                        $('.last-step-inps').each(function () {
                            var t = $(this).attr('data-type');
                            if (_Object.system_info[t] !== null && _Object.system_info[t] !== undefined)
                                $(this).val(_Object.system_info[t]);
                        });
                        $('.HIDE_IN_THE_END').fadeOut(1, function () {
                            for (var QQ = 1; QQ < 9; QQ++) {
                                $('.step' + QQ).fadeIn(1);
                                $('.SHOW_IN_THE_END').show();
                            }
                        });
                    }
                    var progress = 10 * (currentStep + 2);
                    $('.progress-bar-anketa').css('width', progress + "%");
                    $('.stp-progress').each(function () {
                        var att = parseInt($(this).attr('data-stp'));
                        if (currentStep + 2 > att)
                            $(this).addClass('active-progress').removeClass('current-progress');
                        else if (currentStep + 2 === att)
                            $(this).addClass('current-progress');
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ошибка',
                        text: e.reason
                    });
                }
                var top = $('.step').offset().top;
                $('body,html').animate({
                    scrollTop: top
                }, 1000);
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Ошибка',
                text: message
            });
        }
        if (!quizFullComplete) {
            quizStep = 1;
            $('.quiz-block').fadeOut(1, function () {
                $('.quiz-' + quizStep).fadeIn();
            });
        }
    });
    $('.back-go').on('click', function () {
        if (currentStep === 1) {
            $('#second-big-section-anketa').fadeOut(100, function () {
                currentStep--;
                $('#first-form-anketa').fadeIn(100);
            });
        } else {
            $('.step' + currentStep).fadeOut(100, function () {
                currentStep--;
                $('.step' + currentStep).fadeIn();
                var progress = 10 * (currentStep + 1);
                $('.progress-bar-anketa').css('width', progress + "%");
                $('.stp-progress').each(function () {
                    var att = parseInt($(this).attr('data-stp'));
                    if (currentStep + 1 > att)
                        $(this).addClass('active-progress').removeClass('current-progress');
                    else if (currentStep + 1 === att)
                        $(this).addClass('current-progress');
                    else
                        $(this).removeClass('current-progress').removeClass('active-progress');
                });
                $('.next-go').fadeIn(1);
            });
        }
        if (!quizFullComplete) {
            _Object.additional_audit_info = null;
        }
    });
    $('.add-some-block').on('click', function () {
        var type = $(this).attr('data-add'),
            block = '';
        switch (type) {
            case 'criminal_record':
                block += '<input type="text" class="aninpt2 criminal_a to_remove_criminal" name="criminal_record_additional[]" placeholder="Укажите статью УК РФ" style="margin-top: 10px;">';
                $("." + type + "_add").append(block);
                break;
        }
    });
    $('.click-inp-add').on('click', function () {
        if (!$(this).hasClass('click-inp-add-gen')) {
            var step = parseInt($(this).attr('data-stp'));
            if ($(this).hasClass('plus')) {
                var elem1 = $(this).prev().children().eq(0),
                    val1 = parseInt(elem1.val());
                if ($.isNumeric(val1))
                    elem1.val(val1 + step);
                else
                    elem1.val(step);
            } else {
                var elem2 = $(this).next().children().eq(0),
                    val2 = elem2.val();
                if ($.isNumeric(val2))
                    elem2.val(val2 - step < 0 ? 0 : val2 - step);
                else
                    elem2.val(0);
            }
        }
    });
    $('.credit_debt_append_block').on('click', '.click-inp-add-gen', function () {
        var step = parseInt($(this).attr('data-stp')),
            elem, val;
        if ($(this).hasClass('plus')) {
            elem = $(this).prev().children().eq(0);
            val = parseInt(elem.val());
            if ($.isNumeric(val))
                elem.val(val + step);
            else
                elem.val(step);
        } else {
            elem = $(this).next().children().eq(0);
            val = elem.val();
            if ($.isNumeric(val))
                elem.val(val - step < 0 ? 0 : val - step);
            else
                elem.val(0);
        }
        if ($(this).hasClass('credit-debt-gen')) {
            var upd = elem.attr('data-update');
            if ($(this).hasClass('plus')) {
                if ($.isNumeric(val))
                    _Object.credit_debt[upd].summ = val + step;
                else
                    _Object.credit_debt[upd].summ = step;
            } else
                _Object.credit_debt[upd].summ = val - step < 0 ? 0 : val - step;
            $.ajax({
                url: "anketa-function?client_param=der_custom",
                method: "POST",
                data: {data: JSON.stringify(_Object)},
                dataType: "JSON"
            }).done(function (e) {
                if (e.status !== 'success') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ошибка',
                        text: e.reason
                    });
                } else {
                    renderPageByStep(2, _Object);
                }
            });
        }
    });
    $('.credit_debt_append_block').on('click', '.status-credit-debt-gen', function () {
        if ($(this).hasClass('remove-creditor')) {
            var idRemove = $(this).attr('data-remove'),
                html = '';
            _Object.credit_debt.splice(idRemove, 1);
            _Object.credit_debt.sort();
            html = renderCreditDebt(html);
            $('.credit_debt_append_block').html(html);
            $.ajax({
                url: "anketa-function?client_param=der_custom",
                method: "POST",
                data: {data: JSON.stringify(_Object)},
                dataType: "JSON"
            }).done(function (e) {
                if (e.status !== 'success') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ошибка',
                        text: e.reason
                    });
                }
            });
        } else {
            var idUpdate = $(this).attr('data-view');
            $('input[name="credit_debt_id_update"]').val(idUpdate);
            $('input[name="credit_debt_creditor_update"]').val(_Object.credit_debt[idUpdate].creditor);
            $('select[name="credit_debt_latePayment_update"]').val(_Object.credit_debt[idUpdate].latePayment);
            $('select[name="credit_debt_type_update"]').val(_Object.credit_debt[idUpdate].type);
            $('select[name="credit_debt_year_update"]').val(_Object.credit_debt[idUpdate].year);
            $('input[name="credit_debt_summ_update"]').val(_Object.credit_debt[idUpdate].summ);
            $('input[name="credit_debt_monthly_update"]').val(_Object.credit_debt[idUpdate].monthly);
            $('input[name="credit_debt_ostatok_update"]').val(_Object.credit_debt[idUpdate].ostatok);
            $('input[name="credit_debt_poruch_update"]').prop('checked', _Object.credit_debt[idUpdate].poruch);
            $('.upd1chosen').trigger('chosen:updated');
            $('#an-pop-over-3-1').fadeIn(1);
        }
    });
    $('.other_debt_append_block').on('click', '.remove-debt', function () {
        var idRemove = $(this).attr('data-remove'),
            html = '';
        _Object.other_debt.splice(idRemove, 1);
        _Object.other_debt.sort();
        html = renderOtherDebt(html);
        $('.other_debt_append_block').html(html);
        $.ajax({
            url: "anketa-function?client_param=der_custom",
            method: "POST",
            data: {data: JSON.stringify(_Object)},
            dataType: "JSON"
        }).done(function (e) {
            if (e.status !== 'success') {
                Swal.fire({
                    icon: 'error',
                    title: 'Ошибка',
                    text: e.reason
                });
            }
        });
    });
    $('.other_debt_append_block').on('click', '.click-inp-add-gen', function () {
        var step = parseInt($(this).attr('data-stp')),
            elem, val;
        if ($(this).hasClass('plus')) {
            elem = $(this).prev().children().eq(0);
            val = parseInt(elem.val());
            if ($.isNumeric(val))
                elem.val(val + step);
            else
                elem.val(step);
        } else {
            elem = $(this).next().children().eq(0);
            val = elem.val();
            if ($.isNumeric(val))
                elem.val(val - step < 0 ? 0 : val - step);
            else
                elem.val(0);
        }
        if ($(this).hasClass('other-debt-gen')) {
            var upd = elem.attr('data-update');
            if ($(this).hasClass('plus')) {
                if ($.isNumeric(val))
                    _Object.other_debt[upd].summ = val + step;
                else
                    _Object.other_debt[upd].summ = step;
            } else
                _Object.other_debt[upd].summ = val - step < 0 ? 0 : val - step;
            $.ajax({
                url: "anketa-function?client_param=der_custom",
                method: "POST",
                data: {data: JSON.stringify(_Object)},
                dataType: "JSON"
            }).done(function (e) {
                if (e.status !== 'success') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ошибка',
                        text: e.reason
                    });
                } else {
                    renderPageByStep(3, _Object);
                }
            });
        }
    });
    $('.append5stepblock').on('click', '.remove-dohod', function () {
        var idRemove = $(this).attr('data-remove'),
            html = '';
        _Object.incoming_money.chosen.splice(idRemove, 1);
        _Object.incoming_money.chosen.sort();
        html = renderIncomingMoney(html);
        $('.append5stepblock').html(html);
        $.ajax({
            url: "anketa-function?client_param=der_custom",
            method: "POST",
            data: {data: JSON.stringify(_Object)},
            dataType: "JSON"
        }).done(function (e) {
            if (e.status !== 'success') {
                Swal.fire({
                    icon: 'error',
                    title: 'Ошибка',
                    text: e.reason
                });
            }
        });
    });
    $('.append5stepblock').on('click', '.click-inp-add-gen', function () {
        var step = parseInt($(this).attr('data-stp')),
            elem, val;
        if ($(this).hasClass('plus')) {
            elem = $(this).prev().children().eq(0);
            val = parseInt(elem.val());
            if ($.isNumeric(val))
                elem.val(val + step);
            else
                elem.val(step);
        } else {
            elem = $(this).next().children().eq(0);
            val = elem.val();
            if ($.isNumeric(val))
                elem.val(val - step < 0 ? 0 : val - step);
            else
                elem.val(0);
        }
        if ($(this).hasClass('dohod-gen')) {
            var upd = elem.attr('data-update');
            if ($(this).hasClass('plus')) {
                if ($.isNumeric(val))
                    _Object.incoming_money.chosen[upd].additional.summ = val + step;
                else
                    _Object.incoming_money.chosen[upd].additional.summ = step;
            } else
                _Object.incoming_money.chosen[upd].additional.summ = val - step < 0 ? 0 : val - step;
            $.ajax({
                url: "anketa-function?client_param=der_custom",
                method: "POST",
                data: {data: JSON.stringify(_Object)},
                dataType: "JSON"
            }).done(function (e) {
                if (e.status !== 'success') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ошибка',
                        text: e.reason
                    });
                } else {
                    renderPageByStep(5, _Object);
                }
            });
        }
    });
    /*global*/

    /*status_soc*/
    $('.soc').on('click', function () {
        var k = 0;
        _Object.status_soc = [];
        if ($(this).hasClass('soc1')) {
            $('.soc2').each(function () {
                $(this).prop('checked', false).next().css({'color': '#979797'});
            });
            $('.soc1').each(function () {
                $(this).next().css({'color': '#000'});
            });
            if ($(".special_checked").prop('checked')) {
                $('input[name="work_place_main"], input[name="work_place_additional"]').prop('disabled', false);
                $('.socinp').fadeIn(100);
            } else {
                $('input[name="work_place_main"], input[name="work_place_additional"]').prop('disabled', true).val('');
                $('.socinp').fadeIn(100);
            }
        } else {
            $('.soc1').each(function () {
                $(this).prop('checked', false).next().css({'color': '#979797'});
            });
            $('.soc2').each(function () {
                $(this).next().css({'color': '#000'});
            });
            $('input[name="work_place_main"], input[name="work_place_additional"]').prop('disabled', true).val('');
            $('.socinp').fadeOut(100);
        }
        $('.soc').each(function () {
            if ($(this).prop('checked')) {
                ++k;
                _Object.status_soc.push($(this).next().text());
            }
        });
        if (!k) {
            $('.soc').each(function () {
                $(this).next().css({'color': '#000'});
            });
            $('input[name="work_place_main"], input[name="work_place_additional"]').prop('disabled', true).val('');
            $('.socinp').fadeIn(100);
        }
    });
    /*status_soc*/


    /*work_place & position*/
    $('input[name="work_place_main"]').on('input', function () {
        if (_Object.work_place === undefined || _Object.work_place === null)
            _Object.work_place = {};
        _Object.work_place.main = $(this).val();
    });
    $('input[name="work_place_additional"]').on('input', function () {
        if (_Object.work_place === undefined || _Object.work_place === null)
            _Object.work_place = {};
        _Object.work_place.additional = $(this).val();
    });
    /*work_place & position*/

    /*marital_status*/
    $('select[name="marital_status_main"]').on('input', function () {
        if (_Object.marital_status === undefined || _Object.marital_status === null)
            _Object.marital_status = {};
        var val = $(":selected", this).val();
        switch (val) {
            case 'Женат (замужем)':
                $('#marital_block_div').fadeOut(1, function () {
                    $('#marital_block_tog').fadeIn(1);
                });
                _Object.marital_status.additional = $('select[name="marital_status_additional_tog"] :selected').val() !== 'Введите год заключения брака' ? parseInt($('select[name="marital_status_additional_tog"] :selected').val()) : null;
                _Object.marital_status.division = null;
                $('.ifsoc1').fadeIn(1);
                $('.ifsoc2').fadeOut(1);
                break;
            case 'Разведен (разведена)':
                $('#marital_block_tog').fadeOut(1, function () {
                    $('#marital_block_div').fadeIn(1);
                });
                _Object.marital_status.additional = $('select[name="marital_status_additional_div"] :selected').val() !== 'Введите год расторжения брака' ? parseInt($('select[name="marital_status_additional_div"] :selected').val()) : null;
                _Object.marital_status.division = $('select[name="marital_status_additional_division"] :selected').val();
                $('.ifsoc2').fadeIn(1);
                $('.ifsoc1').fadeOut(1);
                break;
            default:
                $('#marital_block_tog').fadeOut(1);
                $('#marital_block_div').fadeOut(1);
                _Object.marital_status.additional = null;
                _Object.marital_status.division = null;
                $('.ifsoc1').fadeOut(1);
                $('.ifsoc2').fadeOut(1);
                break;
        }
        _Object.marital_status.main = val;
    });
    $('select[name="marital_status_additional_tog"], select[name="marital_status_additional_div"]').on('input', function () {
        if (_Object.marital_status.main === 'Женат (замужем)' || _Object.marital_status.main === 'Разведен (разведена)')
            _Object.marital_status.additional = parseInt($(":selected", this).val());
    });
    $('select[name="marital_status_additional_division"]').on('input', function () {
        if (_Object.marital_status.main === 'Разведен (разведена)')
            _Object.marital_status.division = $(":selected", this).val();
    });
    /*marital_status*/

    /*criminal_record*/
    $('select[name="criminal_record_main"]').on('input', function () {
        var val = $(':selected', this).val();
        if (_Object.criminal_record === null || _Object.criminal_record === undefined)
            _Object.criminal_record = {};
        _Object.criminal_record.main = val;
        _Object.criminal_record.additional = [];
        if (val === 'Да') {
            $('#criminal_record_hidden_block').fadeIn(1);
            $('input[name="criminal_record_additional[]"]').each(function () {
                if ($(this).val().length > 0)
                    _Object.criminal_record.additional.push($(this).val());
            });
        } else {
            $('#criminal_record_hidden_block').fadeOut(1);
            $('.to_remove_criminal').each(function () {
                if ($(this).val().length <= 0)
                    $(this).remove();
            });
        }
    });
    $('.criminal_record_add').on('blur', '.to_remove_criminal', function () {
        if ($(this).val().length <= 0)
            $(this).remove();
    });
    $('.criminal_record_add').on('input', '.criminal_a', function () {
        if (_Object.criminal_record === null || _Object.criminal_record === undefined)
            _Object.criminal_record = {};
        _Object.criminal_record.additional = [];
        $('input[name="criminal_record_additional[]"]').each(function () {
            if ($(this).val().length > 0)
                _Object.criminal_record.additional.push($(this).val());
        });
    });
    /*criminal_record*/

    /*dependents*/
    $('select[name="dependents_main"]').on('input', function () {
        var val = $(":selected", this).val();
        if (_Object.dependents === null || _Object.dependents === undefined)
            _Object.dependents = {};
        _Object.dependents.main = val;
        if (val === 'Есть') {
            $('#deps-hidden-block').fadeIn(1);
            _Object.dependents.additional = $('select[name="dependents_additional"] :selected').val().length > 0 ? $('select[name="dependents_additional"] :selected').val() : null;
        } else {
            $('#deps-hidden-block').fadeOut(1);
            _Object.dependents.additional = null;
        }
    });
    $('select[name="dependents_additional"]').on('input', function () {
        if (_Object.dependents === null || _Object.dependents === undefined)
            _Object.dependents = {};
        if (_Object.dependents.main !== undefined)
            _Object.dependents.additional = $(":selected", this).val();
    });
    /*dependents*/

    /*disability*/
    $('select[name="disability_main"]').on('input', function () {
        var val = $(":selected", this).val();
        if (_Object.disability === null || _Object.disability === undefined)
            _Object.disability = {};
        _Object.disability.main = val;
        if (val === 'Есть') {
            $('#disab_hidden').fadeIn(1);
            _Object.disability.additional = $('input[name="disability_additional"]').val().length > 0 ? $('input[name="disability_additional"]').val() : null;
        } else {
            $('#disab_hidden').fadeOut(1);
            _Object.disability.additional = null;
        }
    });
    $('input[name="disability_additional"]').on('input', function () {
        if (_Object.disability === null || _Object.disability === undefined)
            _Object.disability = {};
        if (_Object.disability.main !== undefined)
            _Object.disability.additional = $(this).val();
    });
    /*disability*/

    /*credit_debt*/
    function renderCreditDebt(html) {
        var tot_summ = 0;
        for (var j = 0; j < _Object.credit_debt.length; j++) {
            html += '<div style="display: flex; flex-wrap: wrap; align-items: flex-end; margin-top: 20px">';
            html += '<div style="margin: 0 20px 10px 0; max-width: 390px; width: 100%;">';
            html += '<p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0;">Кредитор</p><input data-update="' + j + '" type="text" value="' + _Object.credit_debt[j].creditor + '" class="aninpt2 creditor_rename update_crd_debt" name="creditor_' + j + '" placeholder="ПАО Банк">';
            html += '</div>';
            html += '<div style="margin: 0 20px 10px 0; max-width: 390px; width: 100%;">';
            html += '<p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; padding-bottom: 5px">Сумма</p><div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">\n' +
                '                                    <div style="position: relative; z-index: 2;" class="minus click-inp-add click-inp-add-gen credit-debt-gen" data-stp="50000">\n' +
                '                                        –\n' +
                '                                    </div>\n' +
                '                                    <div style="position: relative; z-index: 1; width: 100%;">\n' +
                '                                        <input type="text" class="aninpt4 creditor_summ_rename update_crd_debt" data-update="' + j + '" name="summ_' + j + '" placeholder="500 000" value="' + _Object.credit_debt[j].summ + '" style="position: relative; z-index: 1;">\n' +
                '                                    </div>\n' +
                '                                    <div style="position: relative; z-index: 2; " class="plus click-inp-add click-inp-add-gen credit-debt-gen" data-stp="50000">\n' +
                '                                        +\n' +
                '                                    </div>\n' +
                '                                </div>';
            html += '</div>';
            html += '<div style="margin: 0 20px 20px 0"><div class="view-more-creditor hov-gen status-credit-debt-gen" data-view="' + j + '" style="min-height: 26px; font-size: 16px; color: #D63E1C; cursor: pointer"><div class="gr1"></div></div></div>';
            html += '<div style="margin: 0 20px 20px 0"><div class="remove-creditor hov-gen status-credit-debt-gen" data-remove="' + j + '" style="min-height: 26px; font-size: 16px; color: #D63E1C; cursor: pointer"><div class="gr2"></div></div></div>';
            html += '</div>';
            tot_summ += parseInt(_Object.credit_debt[j].summ);
        }
        if (tot_summ > 0) {
            html += '<div style="display: flex; flex-wrap: wrap; align-items: flex-end; margin-top: 20px">';
            html += '<div style="margin: 0 20px 10px 0; max-width: 390px; width: 100%;">';
            html += '</div>';
            html += '<div style="margin: 0 20px 10px 0; max-width: 390px; width: 100%;">';
            html += '<p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0;">Общая сумма</p><input readonly type="text" id="totSummInp" value="' + tot_summ + '" class="aninpt2" name="" placeholder="">';
            html += '</div>';
            html += '</div>';
        }
        return html;
    }

    $('.add-some-pos').on('click', function () {
        var cd_type = $(this).attr('data-type'),
            emptyRequired = false,
            message = '',
            html = '';
        switch (cd_type) {
            case 'credit_debt':
                var creditor = $('input[name="credit_debt_creditor"]').val(),
                    latePayment = $('select[name="credit_debt_latePayment"] :selected').val(),
                    type = $('select[name="credit_debt_type"] :selected').val(),
                    year = $('select[name="credit_debt_year"] :selected').val(),
                    summ = $('input[name="credit_debt_summ"]').val(),
                    monthly = $('input[name="credit_debt_monthly"]').val(),
                    ostatok = $('input[name="credit_debt_ostatok"]').val(),
                    poruch = $('input[name="credit_debt_poruch"]').prop('checked');
                if (creditor.length > 0 && latePayment.length > 0 &&
                    type.length > 0 && year.length > 0 &&
                    summ.length > 0 && monthly.length > 0) {
                    if (_Object.credit_debt === null || _Object.credit_debt === undefined)
                        _Object.credit_debt = [];
                    var __buff = {
                        creditor: creditor,
                        summ: summ,
                        monthly: monthly,
                        latePayment: latePayment,
                        type: type,
                        year: year,
                        ostatok: ostatok,
                        poruch: poruch,
                    };
                    _Object.credit_debt.push(__buff);
                    __buff = {};
                    html = renderCreditDebt(html);
                    $('.credit_debt_append_block').html(html);
                    $('.credit_debt_hide1').fadeOut(1, function () {
                        $('.an-pop-over').fadeOut(1);
                    });
                } else {
                    emptyRequired = true;
                    message = "Необходимо заполнить все указанные поля.";
                }
                break;
        }
        if (emptyRequired) {
            Swal.fire({
                icon: 'error',
                title: 'Ошибка',
                text: message
            });
        } else {
            $.ajax({
                url: "anketa-function?client_param=der_custom",
                method: "POST",
                data: {data: JSON.stringify(_Object)},
                dataType: "JSON"
            }).done(function (e) {
                if (e.status !== 'success') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ошибка',
                        text: e.reason
                    });
                }
            });
        }
    });
    $('.update-some-pos').on('click', function () {
        var cd_type = $(this).attr('data-type'),
            emptyRequired = false,
            message = '',
            html = '';
        switch (cd_type) {
            case 'credit_debt':
                var creditor = $('input[name="credit_debt_creditor_update"]').val(),
                    latePayment = $('select[name="credit_debt_latePayment_update"] :selected').val(),
                    type = $('select[name="credit_debt_type_update"] :selected').val(),
                    year = $('select[name="credit_debt_year_update"] :selected').val(),
                    summ = $('input[name="credit_debt_summ_update"]').val(),
                    monthly = $('input[name="credit_debt_monthly_update"]').val(),
                    ostatok = $('input[name="credit_debt_ostatok_update"]').val(),
                    poruch = $('input[name="credit_debt_poruch_update"]').prop('checked'),
                    obj_id = $('input[name="credit_debt_id_update"]').val();
                if (creditor.length > 0 && latePayment.length > 0 &&
                    type.length > 0 && year.length > 0 &&
                    summ.length > 0 && monthly.length > 0 && obj_id !== '') {
                    obj_id = parseInt(obj_id);
                    var __buff = {
                        creditor: creditor,
                        summ: summ,
                        monthly: monthly,
                        latePayment: latePayment,
                        type: type,
                        year: year,
                        ostatok: ostatok,
                        poruch: poruch,
                    };
                    _Object.credit_debt[obj_id] = __buff;
                    __buff = {};
                    html = renderCreditDebt(html);
                    $('.credit_debt_append_block').html(html);
                    $('.credit_debt_hide1').fadeOut(1, function () {
                        $('.an-pop-over').fadeOut(1);
                    });
                } else {
                    emptyRequired = true;
                    message = "Необходимо заполнить все указанные поля.";
                }
                break;
        }
        if (emptyRequired) {
            Swal.fire({
                icon: 'error',
                title: 'Ошибка',
                text: message
            });
        } else {
            $.ajax({
                url: "anketa-function?client_param=der_custom",
                method: "POST",
                data: {data: JSON.stringify(_Object)},
                dataType: "JSON"
            }).done(function (e) {
                if (e.status !== 'success') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ошибка',
                        text: e.reason
                    });
                }
            });
        }
    });
    $('.credit_debt_append_block').on('blur', '.update_crd_debt', function () {
        var id = parseInt($(this).attr('data-update')),
            html = '',
            obj = $(this);
        if ($(this).hasClass('creditor_rename')) {
            _Object.credit_debt[id].creditor = $(this).val();
        } else {
            _Object.credit_debt[id].summ = $(this).val();
        }
        html = renderCreditDebt(html);
        $('.credit_debt_append_block').html(html);
        $.ajax({
            url: "anketa-function?client_param=der_custom",
            method: "POST",
            data: {data: JSON.stringify(_Object)},
            dataType: "JSON"
        }).done(function (e) {
            if (e.status !== 'success') {
                Swal.fire({
                    icon: 'error',
                    title: 'Ошибка',
                    text: e.reason
                });
            }
        });
    });
    /*credit_debt*/

    /*other_debt*/
    $('#choose-type-other-debt').on('input', function () {
        var type = $(':selected', this).val();
        $('.an-pop-over').fadeOut(1);
        switch (type) {
            case 'ЖКХ':
                $('#an-pop-over-4-3').fadeIn(1);
                break;
            case 'Налоги':
                $('#an-pop-over-4-2').fadeIn(1);
                break;
            case 'Задолженность по причинению вреда здоровью, материального ущерба, морального вреда':
                $('#an-pop-over-4-4').fadeIn(1);
                break;
            case 'Субсидиарная ответственность по долгам юр.лица':
                $('#an-pop-over-4-5').fadeIn(1);
                break;
            case 'Алименты':
                $('#an-pop-over-4-6').fadeIn(1);
                break;
            case 'Штрафы ГИБДД':
                $('#an-pop-over-4-7').fadeIn(1);
                break;
            case 'Долг по расписке частному лицу':
                $('#an-pop-over-4-8').fadeIn(1);
                break;
            case 'Иные виды задолженности':
                $('#an-pop-over-4-9').fadeIn(1);
                break;
        }
    });
    $('.add-other-debt-btn').on('click', function () {
        var type = $(this).attr('data-type'),
            summ = $('.summ_other_add[data-type="' + type + '"]').val(),
            comm = $('.comm_other_add[data-type="' + type + '"]').val();
        if (summ.length > 0) {
            if (_Object.other_debt === null || _Object.other_debt === undefined)
                _Object.other_debt = [];
            var tmp = {
                type: type,
                summ: summ,
                commentary: comm
            };
            _Object.other_debt.push(tmp);
            tmp = {};
            $('.an-pop-over').fadeOut(1);
            var html = '';
            html = renderOtherDebt(html);
            $('.other_debt_hide1').fadeOut(1);
            $('.other_debt_append_block').html(html);
            $(".dropdown2").chosen(
                {disable_search_threshold: 5}
            );
            $.ajax({
                url: "anketa-function?client_param=der_custom",
                method: "POST",
                data: {data: JSON.stringify(_Object)},
                dataType: "JSON"
            }).done(function (e) {
                if (e.status !== 'success') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ошибка',
                        text: e.reason
                    });
                }
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Ошибка',
                text: "Необходимо указать сумму долга"
            });
        }
    });

    function renderOtherDebt(html) {
        var tot_summ = 0;
        for (var j = 0; j < _Object.other_debt.length; j++) {
            var values = ['Выберите вид задолженности', 'ЖКХ', 'Налоги', 'Задолженность по причинению вреда здоровью, материального ущерба, морального вреда',
                'Субсидиарная ответственность по долгам юр.лица', 'Алименты', 'Штрафы ГИБДД', 'Долг по расписке частному лицу', 'Иные виды задолженности'];
            html += '<div style="display: flex; flex-wrap: wrap; align-items: flex-end; margin-top: 20px">';
            html += '<div style="margin: 0 20px 10px 0; max-width: 390px; width: 100%;">';
            html += '<p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0;">Вид задолженности</p>' +
                '<select data-update="' + j + '" class="aninpt3 dropdown2 type_rename update_other_debt" name="type_' + j + '">';
            for (var z = 0; z < values.length; z++) {
                html += '<option ';
                if (_Object.other_debt[j].type === values[z])
                    html += ' selected ';
                if (values[z] === 'Выберите вид задолженности')
                    html += ' disabled value="" >';
                else
                    html += ' value="' + values[z] + '" >';
                html += values[z] + '</option>';
            }
            html += '</select>';
            html += '</div>';
            html += '<div style="margin: 0 20px 10px 0; max-width: 390px; width: 100%;">';
            html += '<p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; padding-bottom: 5px">Сумма</p><div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">\n' +
                '                                    <div style="position: relative; z-index: 2;" class="minus click-inp-add click-inp-add-gen other-debt-gen" data-stp="50000">\n' +
                '                                        –\n' +
                '                                    </div>\n' +
                '                                    <div style="position: relative; z-index: 1; width: 100%;">\n' +
                '                                        <input type="text" class="aninpt4 other_summ_rename update_other_debt" data-update="' + j + '" name="summ_' + j + '" placeholder="500 000" value="' + _Object.other_debt[j].summ + '" style="position: relative; z-index: 1;">\n' +
                '                                    </div>\n' +
                '                                    <div style="position: relative; z-index: 2; " class="plus click-inp-add click-inp-add-gen other-debt-gen" data-stp="50000">\n' +
                '                                        +\n' +
                '                                    </div>\n' +
                '                                </div>';
            html += '</div>';
            html += '<div style="margin: 0 20px 20px 0"><div class="remove-debt hov-gen" data-remove="' + j + '" style="min-height: 26px; font-size: 16px; color: #D63E1C; cursor: pointer"><div class="gr2"></div></div></div>';
            html += '</div>';
            tot_summ += parseInt(_Object.other_debt[j].summ);
        }
        if (tot_summ > 0) {
            html += '<div style="display: flex; flex-wrap: wrap; align-items: flex-end; margin-top: 20px">';
            html += '<div style="margin: 0 20px 10px 0; max-width: 390px; width: 100%;">';
            html += '</div>';
            html += '<div style="margin: 0 20px 10px 0; max-width: 390px; width: 100%;">';
            html += '<p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0;">Общая сумма</p><input readonly type="text" id="totSummInpOther" value="' + tot_summ + '" class="aninpt2" name="" placeholder="">';
            html += '</div>';
            html += '</div>';
        }
        return html;
    }

    $('.other_debt_append_block').on('blur', '.update_other_debt', function () {
        var id = parseInt($(this).attr('data-update')),
            html = '',
            obj = $(this);
        if ($(this).hasClass('type_rename')) {
            _Object.other_debt[id].type = $(this).val();
        } else {
            _Object.other_debt[id].summ = $(this).val();
        }
        html = renderOtherDebt(html);
        $('.other_debt_append_block').html(html);
        $(".dropdown2").chosen(
            {disable_search_threshold: 5}
        );
        $.ajax({
            url: "anketa-function?client_param=der_custom",
            method: "POST",
            data: {data: JSON.stringify(_Object)},
            dataType: "JSON"
        }).done(function (e) {
            if (e.status !== 'success') {
                Swal.fire({
                    icon: 'error',
                    title: 'Ошибка',
                    text: e.reason
                });
            }
        });
    });
    $('.other_debt_append_block').on('change', 'select', function () {
        var id = parseInt($(this).attr('data-update')),
            html = '',
            obj = $(this);
        if ($(this).hasClass('type_rename')) {
            _Object.other_debt[id].type = $(this).val();
        } else {
            _Object.other_debt[id].summ = $(this).val();
        }
        html = renderOtherDebt(html);
        $('.other_debt_append_block').html(html);
        $(".dropdown2").chosen(
            {disable_search_threshold: 5}
        );
        $.ajax({
            url: "anketa-function?client_param=der_custom",
            method: "POST",
            data: {data: JSON.stringify(_Object)},
            dataType: "JSON"
        }).done(function (e) {
            if (e.status !== 'success') {
                Swal.fire({
                    icon: 'error',
                    title: 'Ошибка',
                    text: e.reason
                });
            }
        });
    });
    /*other_debt*/

    /*additional info*/
    function additionalData(step) {
        var countEmpty = 0,
            tmp = null,
            len = 0;
        switch (step) {
            case 1:
                $('.required-quiz-1').each(function () {
                    if ($(this).val().length <= 0)
                        countEmpty++;
                });
                countEmpty = 0;
                if (countEmpty) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ошибка',
                        text: 'Необходимо заполнить все указанные поля'
                    });
                    qzErr = true;
                } else {
                    qzErr = false;
                    if (_Object.additional_audit_info.court_decision.additional === undefined || _Object.additional_audit_info.court_decision.additional === null) {
                        _Object.additional_audit_info.court_decision.additional = [];
                    }
                    tmp = {
                        court_decision_number: $('.court_decision_number').val(),
                        court_decision_date: $('.court_decision_date').val(),
                        court_decision_summ: $('.court_decision_summ').val(),
                    };
                    len = _Object.additional_audit_info.court_decision.additional.length;
                    if (len > 0) {
                        if (JSON.stringify(_Object.additional_audit_info.court_decision.additional[len - 1]) !== JSON.stringify(tmp))
                            _Object.additional_audit_info.court_decision.additional.push(tmp);
                    } else
                        _Object.additional_audit_info.court_decision.additional.push(tmp);
                    tmp = {};
                }
                break;

            case 2:
                $('.required-quiz-2').each(function () {
                    if ($(this).val().length <= 0)
                        countEmpty++;
                });
                countEmpty = 0;
                if (countEmpty) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ошибка',
                        text: 'Необходимо заполнить все указанные поля'
                    });
                    qzErr = true;
                } else {
                    qzErr = false;
                    if (_Object.additional_audit_info.executive_proceedings.additional === undefined || _Object.additional_audit_info.executive_proceedings.additional === null) {
                        _Object.additional_audit_info.executive_proceedings.additional = [];
                    }
                    tmp = {
                        executive_proceedings_number: $('.executive_proceedings_number').val(),
                        executive_proceedings_date: $('.executive_proceedings_date').val(),
                        executive_proceedings_summ: $('.executive_proceedings_summ').val(),
                    };
                    len = _Object.additional_audit_info.executive_proceedings.additional.length;
                    if (len > 0) {
                        if (JSON.stringify(_Object.additional_audit_info.executive_proceedings.additional[len - 1]) !== JSON.stringify(tmp))
                            _Object.additional_audit_info.executive_proceedings.additional.push(tmp);
                    } else
                        _Object.additional_audit_info.executive_proceedings.additional.push(tmp);
                    tmp = {};
                }
                break;

            case 3:
                $('.required-quiz-3').each(function () {
                    if ($(this).val().length <= 0)
                        countEmpty++;
                });
                countEmpty = 0;
                if (countEmpty) {
                    qzErr = true;
                    Swal.fire({
                        icon: 'error',
                        title: 'Ошибка',
                        text: 'Необходимо заполнить все указанные поля'
                    });
                } else {
                    qzErr = false;
                    if (_Object.additional_audit_info.debits.additional === undefined || _Object.additional_audit_info.debits.additional === null) {
                        _Object.additional_audit_info.debits.additional = [];
                    }
                    tmp = {
                        debits_organisation: $('.debits_organisation').val(),
                        debits_summ: $('.debits_summ').val(),
                    };
                    len = _Object.additional_audit_info.debits.additional.length;
                    if (len > 0) {
                        if (JSON.stringify(_Object.additional_audit_info.debits.additional[len - 1]) !== JSON.stringify(tmp))
                            _Object.additional_audit_info.debits.additional.push(tmp);
                    } else
                        _Object.additional_audit_info.debits.additional.push(tmp);
                    tmp = {};
                }
                break;
            case 4:
                $('.required-quiz-4').each(function () {
                    if ($(this).val().length <= 0)
                        countEmpty++;
                });
                countEmpty = 0;
                if (countEmpty) {
                    qzErr = true;
                    Swal.fire({
                        icon: 'error',
                        title: 'Ошибка',
                        text: 'Необходимо заполнить все указанные поля'
                    });
                } else {
                    qzErr = false;
                    if (_Object.additional_audit_info.arests.additional === undefined || _Object.additional_audit_info.arests.additional === null) {
                        _Object.additional_audit_info.arests.additional = [];
                    }
                    tmp = {
                        arests_reason: $('.arests_reason').val(),
                        arests_type: $('.arests_type').val(),
                    };
                    len = _Object.additional_audit_info.arests.additional.length;
                    if (len > 0) {
                        if (JSON.stringify(_Object.additional_audit_info.arests.additional[len - 1]) !== JSON.stringify(tmp))
                            _Object.additional_audit_info.arests.additional.push(tmp);
                    } else
                        _Object.additional_audit_info.arests.additional.push(tmp);
                    tmp = {};
                }
                break;
            case 5:
                $('.required-quiz-5').each(function () {
                    if ($(this).val().length <= 0)
                        countEmpty++;
                });
                countEmpty = 0;
                if (countEmpty) {
                    qzErr = true;
                    Swal.fire({
                        icon: 'error',
                        title: 'Ошибка',
                        text: 'Необходимо заполнить все указанные поля'
                    });
                } else {
                    qzErr = false;
                    if (_Object.additional_audit_info.LLC_capital.additional === undefined || _Object.additional_audit_info.LLC_capital.additional === null) {
                        _Object.additional_audit_info.LLC_capital.additional = [];
                    }
                    tmp = {
                        LLC_capital_type: $('.LLC_capital_type').val(),
                        LLC_capital_percent: $('.LLC_capital_percent').val(),
                    };
                    len = _Object.additional_audit_info.LLC_capital.additional.length;
                    if (len > 0) {
                        if (JSON.stringify(_Object.additional_audit_info.LLC_capital.additional[len - 1]) !== JSON.stringify(tmp))
                            _Object.additional_audit_info.LLC_capital.additional.push(tmp);
                    } else
                        _Object.additional_audit_info.LLC_capital.additional.push(tmp);
                    tmp = {};
                }
                break;
            case 7:
                $('.required-quiz-7').each(function () {
                    if ($(this).val().length <= 0)
                        countEmpty++;
                });
                countEmpty = 0;
                if (countEmpty) {
                    qzErr = true;
                    Swal.fire({
                        icon: 'error',
                        title: 'Ошибка',
                        text: 'Необходимо заполнить все указанные поля'
                    });
                } else {
                    qzErr = false;
                    _Object.additional_audit_info.official_income.additional = $('.official_income_additional').val();
                }
                break;

            case 8:
                $('.required-quiz-8').each(function () {
                    if ($(this).val().length <= 0)
                        countEmpty++;
                });
                countEmpty = 0;
                if (countEmpty) {
                    qzErr = true;
                    Swal.fire({
                        icon: 'error',
                        title: 'Ошибка',
                        text: 'Необходимо заполнить все указанные поля'
                    });
                } else {
                    qzErr = false;
                    if (_Object.additional_audit_info.receivables.additional === undefined || _Object.additional_audit_info.receivables.additional === null) {
                        _Object.additional_audit_info.receivables.additional = [];
                    }
                    tmp = {
                        receivables_debtor: $('.receivables_debtor').val(),
                        receivables_summ: $('.receivables_summ').val(),
                    };
                    len = _Object.additional_audit_info.receivables.additional.length;
                    if (len > 0) {
                        if (JSON.stringify(_Object.additional_audit_info.receivables.additional[len - 1]) !== JSON.stringify(tmp))
                            _Object.additional_audit_info.receivables.additional.push(tmp);
                    } else
                        _Object.additional_audit_info.receivables.additional.push(tmp);
                    tmp = {};
                }
                break;

            case 9:
                if (_Object.additional_audit_info.housing.type === 'СОБСТВЕННОЕ') {
                    if ($('.year_sob').val().length <= 0 || $('.price_sob').val().length <= 0) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Ошибка',
                            text: 'Необходимо заполнить все указанные поля'
                        });
                        qzErr = true;
                    } else {
                        qzErr = false;
                        tmp = {
                            rent: null,
                            year: $('.year_sob').val(),
                            price: $('.price_sob').val(),
                        };
                        tmp.registered = $('.registered_sob').prop('checked');
                        _Object.additional_audit_info.housing.additional = tmp;
                        tmp = {};
                    }
                } else {
                    if ($('.rent_aren').val().length <= 0) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Ошибка',
                            text: 'Необходимо заполнить все указанные поля'
                        });
                        qzErr = true;
                    } else {
                        qzErr = false;
                        tmp = {
                            rent: $('.rent_aren').val(),
                            year: null,
                            price: null,
                            registered: null
                        };
                        _Object.additional_audit_info.housing.additional = tmp;
                        tmp = {};
                    }
                }
                break;
        }
    }

    function appendAdditional(html, type) {
        if (_Object.additional_audit_info[type] !== undefined && _Object.additional_audit_info[type] !== null && _Object.additional_audit_info[type].additional !== undefined && _Object.additional_audit_info[type].additional !== null) {
            for (var j = 0; j < _Object.additional_audit_info[type].additional.length; j++) {
                var keys = Object.keys(_Object.additional_audit_info[type].additional[j]);
                var teta = _Object.additional_audit_info[type].additional[j][keys[0]];
                for (var ppq = 0; ppq < keys.length; ppq++) {
                    if (_Object.additional_audit_info[type].additional[j][keys[ppq]] !== null && _Object.additional_audit_info[type].additional[j][keys[ppq]] !== undefined && _Object.additional_audit_info[type].additional[j][keys[ppq]].length > 0) {
                        teta = _Object.additional_audit_info[type].additional[j][keys[ppq]];
                        break;
                    }
                }
                html += '<div style="margin-top: 10px;">';
                if(teta.length > 0)
                    html += teta + " - <span class='del-additional hov-gen' style='color: #d94d4f; cursor: pointer' data-type='" + type + "' data-id='" + j + "'>удалить</span>";
                else
                    html += "<span class='del-additional hov-gen' style='color: #d94d4f; cursor: pointer' data-type='" + type + "' data-id='" + j + "'>удалить пустые значения</span>";
                html += '</div>';
            }
            if (type === 'receivables') {
                var tots = 0;
                for (var p = 0; p < _Object.additional_audit_info.receivables.additional.length; p++)
                    tots += parseInt(_Object.additional_audit_info.receivables.additional[p].receivables_summ);
                $('.total_receivables').val(tots);
            }
        }
        return html;
    }

    function rebuildCompleteAdditionalInfoBlock() {
        if (_Object.additional_audit_info !== null && _Object.additional_audit_info !== undefined) {
            for (var key in _Object.additional_audit_info) {
                var ht = '';
                var val = '';
                if (_Object.additional_audit_info[key].main !== null && _Object.additional_audit_info[key].main !== undefined)
                    val = _Object.additional_audit_info[key].main;
                else
                    val = _Object.additional_audit_info[key].type;
                $('.group-' + key).each(function () {
                    $(this).prop('checked', false);
                });
                $('.group-' + key + '[value="' + val + '"]').prop('checked', true);
                switch (key) {
                    case 'court_decision':
                    case 'executive_proceedings':
                    case 'debits':
                    case 'arests':
                    case 'LLC_capital':
                    case 'receivables':
                        if (val === 'ДА') {
                            ht += "<div style='margin-top: 10px'><span class='hov-gen view-more-audit' style='color: #d94d4f; cursor: pointer' data-view='" + key + "'>Подробнее</span></div>";
                            $('.append-block-' + key).html(ht);
                        } else $('.append-block-' + key).html('');
                        break;
                    case 'official_income':
                        if (val === 'НЕТ' || val === 'НЕ УВЕРЕН') {
                            ht += "<div style='margin-top: 10px'><span class='hov-gen view-more-audit' style='color: #d94d4f; cursor: pointer' data-view='" + key + "'>Подробнее</span></div>";
                            $('.append-block-' + key).html(ht);
                        } else $('.append-block-' + key).html('');
                        break;
                    case 'housing':
                        ht += "<div style='margin-top: 10px'><span class='hov-gen view-more-audit' style='color: #d94d4f; cursor: pointer' data-view='" + key + "'>Подробнее</span></div>";
                        $('.append-block-' + key).html(ht);
                        break;
                }
            }
        }
    }

    $('.yes-go').on('click', function () {
        if (_Object.additional_audit_info === undefined || _Object.additional_audit_info === null)
            _Object.additional_audit_info = {};
        var step = parseInt($(this).attr('data-qs')),
            param = $(this).attr('data-param');
        if (step !== 6 && step !== 7) {
            $('.pop-quiz').fadeOut(1, function () {
                $('.pop5-quiz-' + step).fadeIn(1, function () {
                    $('#an-pop-over-5').fadeIn(200);
                });
            });
        } else {
            $('.quiz-' + step).fadeOut(1, function () {
                $('.quiz-' + ++quizStep).fadeIn(1);
            });
        }
        if (_Object.additional_audit_info[param] === undefined || _Object.additional_audit_info[param] === null)
            _Object.additional_audit_info[param] = {};
        _Object.additional_audit_info[param].main = "ДА";
    });
    $('.none-go, .skip-quiz').on('click', function () {
        if (_Object.additional_audit_info === undefined || _Object.additional_audit_info === null)
            _Object.additional_audit_info = {};
        var step = parseInt($(this).attr('data-qs')),
            param = $(this).attr('data-param');
        if (step === 7) {
            $('.pop-quiz').fadeOut(1, function () {
                $('.pop5-quiz-' + step).fadeIn(1, function () {
                    $('#an-pop-over-5').fadeIn(200);
                });
            });
        } else {
            $('.quiz-' + step).fadeOut(1, function () {
                $('.quiz-' + ++quizStep).fadeIn(1);
            });
        }
        if (_Object.additional_audit_info[param] === undefined || _Object.additional_audit_info[param] === null)
            _Object.additional_audit_info[param] = {};
        if ($(this).hasClass('none-go'))
            _Object.additional_audit_info[param].main = "НЕТ";
        else
            _Object.additional_audit_info[param].main = "НЕ УВЕРЕН";
    });
    $('.next-go-popup, .append-additional-popup').on('click', function () {
        var stp = parseInt($(this).attr('data-curr')),
            type = $(this).attr('data-type');
        additionalData(stp);
        var html = '';
        $('.quiz-append-block-' + stp).html(appendAdditional(html, type));
        if ($(this).hasClass('next-go-popup')) {
            if (qzErr === false) {
                $('.quiz-' + stp).fadeOut(1, function () {
                    if (quizStep === 9) {
                        rebuildCompleteAdditionalInfoBlock();
                        $('#an-pop-over-5').fadeOut(1);
                        $('.step4').fadeOut(1, function () {
                            $('.step4-1').fadeIn(1, function () {
                                $('.next-go').fadeIn();
                                quizFullComplete = true;
                            });
                            $.ajax({
                                url: "anketa-function?client_param=der_custom",
                                method: "POST",
                                data: {data: JSON.stringify(_Object)},
                                dataType: "JSON"
                            }).done(function (e) {
                                if (e.status !== 'success') {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Ошибка',
                                        text: e.reason
                                    });
                                }
                            });
                        });
                    } else {
                        $('.quiz-' + ++quizStep).fadeIn(1, function () {
                            $('#an-pop-over-5').fadeOut(1);
                        });
                    }
                });
            }
        }
    });
    $('.quiz-del-section').on('click', '.del-additional', function () {
        var type = $(this).attr('data-type'),
            id = parseInt($(this).attr('data-id')),
            html = '',
            stp = $(this).attr('data-step');
        _Object.additional_audit_info[type].additional.splice(id, 1);
        _Object.additional_audit_info[type].additional.sort();
        html = appendAdditional(html, type);
        $('.quiz-del-section[data-restore-type="' + type + '"]').html(html);
    });
    $('.sobs-go, .arenda-go').on('click', function () {
        if (_Object.additional_audit_info === undefined || _Object.additional_audit_info === null)
            _Object.additional_audit_info = {};
        var step = parseInt($(this).attr('data-qs')),
            param = $(this).attr('data-param');
        if (_Object.additional_audit_info[param] === undefined || _Object.additional_audit_info[param] === null)
            _Object.additional_audit_info[param] = {};
        if ($(this).hasClass('sobs-go')) {
            _Object.additional_audit_info[param].type = "СОБСТВЕННОЕ";
            $('.pop-quiz').fadeOut(1, function () {
                $('.pop5-quiz-9-sob').fadeIn(1, function () {
                    $('#an-pop-over-5').fadeIn(200);
                });
            });
        } else {
            _Object.additional_audit_info[param].type = "АРЕНДОВАННОЕ";
            $('.pop-quiz').fadeOut(1, function () {
                $('.pop5-quiz-9-aren').fadeIn(1, function () {
                    $('#an-pop-over-5').fadeIn(200);
                });
            });
        }
    });
    $('.audit-checkbox').on('input', function () {
        var type = $(this).attr('data-type'),
            val = $(this).val();
        if (type !== 'housing')
            _Object.additional_audit_info[type].main = val;
        else
            _Object.additional_audit_info[type].type = val;
        rebuildCompleteAdditionalInfoBlock();
        switch (type) {
            case 'court_decision':
            case 'executive_proceedings':
            case 'debits':
            case 'arests':
            case 'LLC_capital':
            case 'receivables':
                if (val === 'ДА') {
                    $('.pop-quiz').fadeOut(1, function () {
                        $('.pop-quiz[data-type-audit="' + type + '"]').fadeIn(1, function () {
                            $('#an-pop-over-5').fadeIn(200);
                        });
                    });
                } else {
                    _Object.additional_audit_info[type].additional = [];
                    $.ajax({
                        url: "anketa-function?client_param=der_custom",
                        method: "POST",
                        data: {data: JSON.stringify(_Object)},
                        dataType: "JSON"
                    }).done(function (e) {
                        if (e.status !== 'success') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Ошибка',
                                text: e.reason
                            });
                        }
                    });
                }
                break;
            case 'official_income':
                if (val === 'НЕТ' || val === 'НЕ УВЕРЕН') {
                    $('.pop-quiz').fadeOut(1, function () {
                        $('.pop-quiz[data-type-audit="' + type + '"]').fadeIn(1, function () {
                            $('#an-pop-over-5').fadeIn(200);
                        });
                    });
                } else {
                    _Object.additional_audit_info[type].additional = [];
                    $.ajax({
                        url: "anketa-function?client_param=der_custom",
                        method: "POST",
                        data: {data: JSON.stringify(_Object)},
                        dataType: "JSON"
                    }).done(function (e) {
                        if (e.status !== 'success') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Ошибка',
                                text: e.reason
                            });
                        }
                    });
                }
                break;
            case 'housing':
                if (val === 'СОБСТВЕННОЕ') {
                    $('.pop-quiz').fadeOut(1, function () {
                        $('.pop5-quiz-9-sob').fadeIn(1, function () {
                            $('#an-pop-over-5').fadeIn(200);
                        });
                    });
                } else {
                    $('.pop-quiz').fadeOut(1, function () {
                        $('.pop5-quiz-9-aren').fadeIn(1, function () {
                            $('#an-pop-over-5').fadeIn(200);
                        });
                    });
                }
                break;
            default:
                $.ajax({
                    url: "anketa-function?client_param=der_custom",
                    method: "POST",
                    data: {data: JSON.stringify(_Object)},
                    dataType: "JSON"
                }).done(function (e) {
                    if (e.status !== 'success') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Ошибка',
                            text: e.reason
                        });
                    }
                });
                break;

        }
    });
    $('.append-summary-block').on('click', '.view-more-audit', function () {
        var type = $(this).attr('data-view');
        switch (type) {
            case 'court_decision':
            case 'executive_proceedings':
            case 'debits':
            case 'arests':
            case 'LLC_capital':
            case 'receivables':
                $('.pop-quiz').fadeOut(1, function () {
                    $('.pop-quiz[data-type-audit="' + type + '"]').fadeIn(1, function () {
                        $('#an-pop-over-5').fadeIn(200);
                    });
                });
                break;
            case 'official_income':
                $('.pop-quiz').fadeOut(1, function () {
                    $('.pop-quiz[data-type-audit="' + type + '"]').fadeIn(1, function () {
                        $('#an-pop-over-5').fadeIn(200);
                    });
                });
                break;
            case 'housing':
                if (_Object.additional_audit_info.housing.type === 'СОБСТВЕННОЕ') {
                    $('.pop-quiz').fadeOut(1, function () {
                        $('.pop5-quiz-9-sob').fadeIn(1, function () {
                            $('#an-pop-over-5').fadeIn(200);
                        });
                    });
                } else {
                    $('.pop-quiz').fadeOut(1, function () {
                        $('.pop5-quiz-9-aren').fadeIn(1, function () {
                            $('#an-pop-over-5').fadeIn(200);
                        });
                    });
                }
                break;
        }
    });
    /*additional info*/

    /*incoming_money*/
    $('#choose-type-dohod').on('input', function () {
        var type = $(':selected', this).val();
        $('.an-pop-over').fadeOut(1);
        switch (type) {
            case 'Пенсия':
                $('#an-pop-over-6-2').fadeIn(1);
                break;
            case 'Заработная плата (доход от ИП)':
                $('#an-pop-over-6-3').fadeIn(1);
                break;
            case 'Получение алиментов':
                $('#an-pop-over-6-4').fadeIn(1);
                break;
            case 'Проценты по вкладам и ценным бумагам':
                $('#an-pop-over-6-9').fadeIn(1);
                break;
            case 'Иные выплаты':
                $('#an-pop-over-6-8').fadeIn(1);
                break;
            case 'Пособия на ребенка':
                $('#an-pop-over-6-5').fadeIn(1);
                break;
            case 'Пособия по инвалидности':
                $('#an-pop-over-6-6').fadeIn(1);
                break;
            case 'Пособия по потере кормильца':
                $('#an-pop-over-6-7').fadeIn(1);
                break;
        }
    });
    $('.incoming_money_onCard').on('input', function () {
        var status = $(this).prop('checked'),
            type = $(this).attr('data-type');
        if (status) {
            $('.hidden-block-in-popup[data-type="' + type + '"]').show(1);
            if (_Object.incoming_money === null || _Object.incoming_money === undefined)
                _Object.incoming_money = {
                    chosen: [],
                    totalSumm: 0
                };
        } else {
            $('.hidden-block-in-popup[data-type="' + type + '"]').hide(1);
        }
    });
    $('.add-dohod').on('click', function () {
        var type = $(this).attr('data-type'),
            summ = $('.incoming_money_summ[data-type="' + type + '"]').val(),
            desc = null,
            bank = $('.incoming_money_bank[data-type="' + type + '"]').val(),
            card = $('.incoming_money_onCard[data-type="' + type + '"]').val();
        switch (type) {
            case 'Проценты по вкладам и ценным бумагам':
            case 'Иные выплаты':
                desc = $('.incoming_money_description[data-type="' + type + '"]').val();
                break;
            default:
                break;
        }
        if (summ.length > 0) {
            if ($.isNumeric(summ))
                summ = parseInt(summ);
            else
                summ = 0;
            if (_Object.incoming_money === null || _Object.incoming_money === undefined)
                _Object.incoming_money = {
                    chosen: [],
                    totalSumm: 0
                };
            var tmp = {
                type: type,
                additional: {
                    summ: summ,
                    onCard: card,
                    bank: card ? bank : null,
                    description: desc ? desc : null
                }
            };
            _Object.incoming_money.chosen.push(tmp);
            tmp = {};
            $('.an-pop-over').fadeOut(1);
            var html = '';
            html = renderIncomingMoney(html);
            $('.hide5stepblock').fadeOut(1);
            $('.append5stepblock').html(html);
            $(".dropdown2").chosen(
                {disable_search_threshold: 5}
            );
            $.ajax({
                url: "anketa-function?client_param=der_custom",
                method: "POST",
                data: {data: JSON.stringify(_Object)},
                dataType: "JSON"
            }).done(function (e) {
                if (e.status !== 'success') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ошибка',
                        text: e.reason
                    });
                }
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Ошибка',
                text: "Необходимо указать сумму долга"
            });
        }
    });

    function renderIncomingMoney(html) {
        $('.appended-destroy').fadeOut(1, function () {
            $('.appended-fix-5').removeClass('col-lg-7').addClass('col-lg-12');
        });
        var tot_summ = 0,
            totalMonthly = 0;
        for (var j = 0; j < _Object.incoming_money.chosen.length; j++) {
            var values = ['Выберите тип дохода', 'Пенсия', 'Заработная плата (доход от ИП)', 'Получение алиментов',
                    'Проценты по вкладам и ценным бумагам', 'Иные выплаты', 'Пособия на ребенка', 'Пособия по инвалидности', 'Пособия по потере кормильца'],
                monthlySumm = _Object.incoming_money.chosen[j].additional.summ;
            html += '<div style="display: flex; flex-wrap: wrap; align-items: flex-end; margin-top: 20px">';
            html += '<div style="margin: 0 20px 10px 0; max-width: 390px; width: 100%;">';
            html += '<p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0;">Вид дохода</p>' +
                '<select data-update="' + j + '" class="aninpt3 dropdown2 type_dohod update_dohod" name="dohod_type_' + j + '">';
            for (var z = 0; z < values.length; z++) {
                html += '<option ';
                if (_Object.incoming_money.chosen[j].type === values[z])
                    html += ' selected ';
                if (values[z] === 'Выберите тип дохода')
                    html += ' disabled value="" >';
                else
                    html += ' value="' + values[z] + '" >';
                html += values[z] + '</option>';
            }
            html += '</select>';
            html += '</div>';
            html += '<div style="margin: 0 20px 10px 0; max-width: 277px; width: 100%;">';
            html += '<p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; padding-bottom: 5px">Сумма дохода в месяц</p><div class="flex aninpt4-1" style="align-items: center; max-width: 390px; width: 100%; position: relative;border: 1px solid #979797; border-radius: 3px;">\n' +
                '                                    <div style="position: relative; z-index: 2;" class="minus click-inp-add click-inp-add-gen dohod-gen" data-stp="50000">\n' +
                '                                        –\n' +
                '                                    </div>\n' +
                '                                    <div style="position: relative; z-index: 1; width: 100%;">\n' +
                '                                        <input type="text" class="aninpt4 summ_dohod update_dohod" data-update="' + j + '" name="dohod_summ_' + j + '" placeholder="500 000" value="' + monthlySumm + '" style="position: relative; z-index: 1;">\n' +
                '                                    </div>\n' +
                '                                    <div style="position: relative; z-index: 2; " class="plus click-inp-add click-inp-add-gen dohod-gen" data-stp="50000">\n' +
                '                                        +\n' +
                '                                    </div>\n' +
                '                                </div>';
            html += '</div>';
            html += '<div style="margin: 0 20px 10px 0; max-width: 277px; width: 100%;">';
            html += '<p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0;">Сумма за 3 года</p><input type="text" value="' + (_Object.incoming_money.chosen[j].incomingSelf === undefined ? (monthlySumm * 36) : _Object.incoming_money.chosen[j].incomingSelf) + '" class="aninpt2 dohodza3update" name="dohod_za3_' + j + '" data-tot-update="' + j + '" placeholder="">';
            html += '</div>';
            html += '<div style="margin: 0 20px 20px 0"><div class="remove-dohod hov-gen" data-remove="' + j + '" style="min-height: 26px; font-size: 16px; color: #D63E1C; cursor: pointer"><div class="gr2"></div></div></div>';
            html += '</div>';
            totalMonthly += monthlySumm;
            tot_summ += _Object.incoming_money.chosen[j].incomingSelf === undefined ? (monthlySumm * 36) : _Object.incoming_money.chosen[j].incomingSelf;
        }
        if (tot_summ > 0) {
            html += '<div style="display: flex; flex-wrap: wrap; align-items: flex-end; margin-top: 20px">';
            html += '<div class="hide-when-small" style="margin: 0 20px 10px 0; max-width: 390px; width: 100%;">';
            html += '</div>';
            html += '<div style="margin: 0 20px 10px 0; max-width: 277px; width: 100%;">';
            html += '<p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0;">Общая сумма</p><input readonly type="text" id="totSummInpDohod" value="' + totalMonthly + '" class="aninpt2" name="" placeholder="">';
            html += '</div>';
            html += '<div style="margin: 0 20px 10px 0; max-width: 277px; width: 100%;">';
            html += '<p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0;">Общая сумма за 3 года</p><input type="text" id="totSummInpDohodZa3" value="' + (_Object.incoming_money.totalSummSelf !== undefined ? _Object.incoming_money.totalSummSelf : tot_summ) + '" class="aninpt2" name="" placeholder="">';
            html += '</div>';
            html += '</div>';
            html += '<div class="HIDE_IN_THE_END" style="display: flex; flex-wrap: wrap; align-items: flex-start; margin-top: 20px">';
            html += '<div class="hide-when-small" style="margin: 0 20px 10px 0; max-width: 300px; width: 100%;">';
            html += '</div>';
            html += '<div class="hide-when-small" style="margin: 0 20px 10px 0; max-width: 277px; width: 100%;">';
            html += '</div>';
            html += '<div class="hide-when-small" style="margin: 0 20px 10px 0; max-width: 175px; width: 100%;">';
            html += '<div style="text-align: right"><img src="/img/anketa/zzr3.png"></div>';
            html += '</div>';
            html += '<div class="" style="margin: 0 20px 10px 0; max-width: 250px; width: 100%;">';
            html += '<div style="background-color: #F2F2F2; padding: 15px">Здесь посчитается Ваш <b>примерный</b> доход за последние три года, если он менялся, то введите верную сумму самостоятельно</div>';
            html += '</div>';
            html += '</div>';
        }
        _Object.incoming_money.totalSumm = tot_summ;
        return html;
    }

    $('.append5stepblock').on('blur', '.dohodza3update', function () {
        var index = parseInt($(this).attr('data-tot-update')),
            val = $(this).val();
        if ($.isNumeric(val)) {
            val = parseInt(val);
            _Object.incoming_money.chosen[index].incomingSelf = val;
            $.ajax({
                url: "anketa-function?client_param=der_custom",
                method: "POST",
                data: {data: JSON.stringify(_Object)},
                dataType: "JSON"
            }).done(function (e) {
                if (e.status !== 'success') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ошибка',
                        text: e.reason
                    });
                } else {
                    renderPageByStep(5, _Object);
                }
            });
        }
    });
    $('.append5stepblock').on('blur', '.update_dohod', function () {
        var id = parseInt($(this).attr('data-update')),
            html = '',
            obj = $(this);
        if ($(this).hasClass('type_dohod')) {
            _Object.incoming_money.chosen[id].type = $(this).val();
        } else {
            _Object.incoming_money.chosen[id].additional.summ = parseInt($(this).val());
        }
        html = renderIncomingMoney(html);
        $('.append5stepblock').html(html);
        $(".dropdown2").chosen(
            {disable_search_threshold: 5}
        );
        $.ajax({
            url: "anketa-function?client_param=der_custom",
            method: "POST",
            data: {data: JSON.stringify(_Object)},
            dataType: "JSON"
        }).done(function (e) {
            if (e.status !== 'success') {
                Swal.fire({
                    icon: 'error',
                    title: 'Ошибка',
                    text: e.reason
                });
            }
        });
    });
    $('.append5stepblock').on('change', 'select', function () {
        var id = parseInt($(this).attr('data-update')),
            html = '',
            obj = $(this);
        if ($(this).hasClass('type_dohod')) {
            _Object.incoming_money.chosen[id].type = $(this).val();
        } else {
            _Object.incoming_money.chosen[id].additional.summ = parseInt($(this).val());
        }
        html = renderIncomingMoney(html);
        $('.append5stepblock').html(html);
        $(".dropdown2").chosen(
            {disable_search_threshold: 5}
        );
        $.ajax({
            url: "anketa-function?client_param=der_custom",
            method: "POST",
            data: {data: JSON.stringify(_Object)},
            dataType: "JSON"
        }).done(function (e) {
            if (e.status !== 'success') {
                Swal.fire({
                    icon: 'error',
                    title: 'Ошибка',
                    text: e.reason
                });
            }
        });
    });
    $('.append5stepblock').on('blur', '#totSummInpDohodZa3', function () {
        var html = '',
            obj = $(this);
        _Object.incoming_money.totalSummSelf = parseInt(obj.val());
        html = renderIncomingMoney(html);
        $('.append5stepblock').html(html);
        $(".dropdown2").chosen(
            {disable_search_threshold: 5}
        );
        $.ajax({
            url: "anketa-function?client_param=der_custom",
            method: "POST",
            data: {data: JSON.stringify(_Object)},
            dataType: "JSON"
        }).done(function (e) {
            if (e.status !== 'success') {
                Swal.fire({
                    icon: 'error',
                    title: 'Ошибка',
                    text: e.reason
                });
            }
        });
    });
    /*incoming_money*/

    /*property*/
    $('#choose-type-property').on('input', function () {
        $('.one-more-property').parent().show();
        propUpdate = null;
        $('.add-property-btn').text('ДОБАВИТЬ');
        var type = $(':selected', this).val();
        $('.an-pop-over').fadeOut(1);
        switch (type) {
            case 'Квартира':
                $('#an-pop-over-7-2').fadeIn(1);
                $('.property_registered[data-type="' + type + '"]').prop('checked', false);
                break;
            case 'Частный дом':
                $('#an-pop-over-7-3').fadeIn(1);
                $('.property_registered[data-type="' + type + '"]').prop('checked', false);
                break;
            case 'Земельный участок':
                $('#an-pop-over-7-4').fadeIn(1);
                break;
            case 'Транспортное средство':
                $('#an-pop-over-7-5').fadeIn(1);
                $('.property_type_auto[data-type="' + type + '"]').val('Автомобиль').trigger('chosen:updated');
                break;
            case 'Ценные бумаги':
                $('#an-pop-over-7-6').fadeIn(1);
                $('.property_type_document[data-type="' + type + '"]').val('').trigger('chosen:updated');
                break;
            case 'Иное имущество':
                $('#an-pop-over-7-7').fadeIn(1);
                $('.property_commentary[data-type="' + type + '"]').val('');
                break;
        }
        $('.property_year[data-type="' + type + '"]').val(2020).trigger('chosen:updated');
        $('.property_price[data-type="' + type + '"]').val('');
    });

    function renderPropertyByType(type) {
        if (_Object.property[type] !== undefined && _Object.property[type] !== null) {
            var html = '';
            $('div.col-lg-4.hidestep6').fadeOut(1);
            $('.step6fixblock').addClass('col-lg-12').removeClass('col-lg-8');
            for (var j = 0; j < _Object.property[type].length; j++) {
                if(_Object.property[type][j].price === null || _Object.property[type][j].price.length <= 0)
                    _Object.property[type][j].price = 0;
                html += '<div style="display: flex; flex-wrap: wrap; align-items: flex-end; margin-top: 20px">';
                html += '<div style="margin: 0 20px 10px 0; max-width: 390px; width: 100%;">';
                html += '<p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0;">Вид имущества</p><input data-update="' + j + '" type="text" value="' + _Object.property[type][j].type + '" readonly class="aninpt2 property_type_' + type + '" name="' + type + '_property_type_' + j + '" placeholder="Квартира">';
                html += '</div>';
                html += '<div style="margin: 0 20px 10px 0; max-width: 390px; width: 100%;">';
                html += '<p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; padding-bottom: 5px">Текущая рыночная стоимость</p>' + '<input type="text" class="aninpt2 property_price_' + type + '" data-update="' + j + '" name="' + type + '_property_price_' + j + '" placeholder="500 000" value="' + _Object.property[type][j].price + '" readonly style="position: relative; z-index: 1;">';
                html += '</div>';
                html += '<div style="margin: 0 20px 20px 0"><div class="view-more-property hov-gen status-property" data-type="' + type + '" data-view="' + j + '" style="min-height: 26px; font-size: 16px; color: #D63E1C; cursor: pointer"><div class="gr1"></div></div></div>';
                html += '<div style="margin: 0 20px 20px 0"><div class="remove-property hov-gen status-property" data-type="' + type + '" data-remove="' + j + '" style="min-height: 26px; font-size: 16px; color: #D63E1C; cursor: pointer"><div class="gr2"></div></div></div>';
                html += '</div>';
            }
            $('div.step6appendblock.' + type).html(html);
        }
    }

    $('.add-property-btn, .one-more-property').on('click', function () {
        var type = $(this).attr('data-type'),
            err = false,
            msg = '',
            object_click = $(this);
        if (_Object.property === undefined || _Object.property === null)
            _Object.property = {};
        if (_Object.property[propertyType] === undefined || _Object.property[propertyType] === null)
            _Object.property[propertyType] = [];
        var __tmp = {
            type: type,
            year: $.isNumeric($('.property_year[data-type="' + type + '"]').val()) ? parseInt($('.property_year[data-type="' + type + '"]').val()) : null,
            price: $.isNumeric($('.property_price[data-type="' + type + '"]').val()) ? parseInt($('.property_price[data-type="' + type + '"]').val()) : null,
            registered: null,
            type_auto: null,
            type_document: null,
            commentary: null
        };
        switch (type) {
            case 'Квартира':
            case 'Частный дом':
                __tmp.registered = $('.property_registered[data-type="' + type + '"]').prop('checked');
                break;
            case 'Транспортное средство':
                __tmp.type_auto = $('.property_type_auto[data-type="' + type + '"]').val();
                break;
            case 'Ценные бумаги':
                __tmp.type_document = $('.property_type_document[data-type="' + type + '"]').val();
                break;
            case 'Иное имущество':
                __tmp.commentary = $('.property_commentary[data-type="' + type + '"]').val();
                break;
        }
        if (__tmp.year === null || __tmp.price === null) {
            err = true;
            msg = 'Необходимо заполнить все обязательные поля';
        } else if (type === 'Транспортное средство' && __tmp.type_auto === null) {
            err = true;
            msg = 'Необходимо указать тип транспортного средства';
        } else if (type === 'Ценные бумаги' && __tmp.type_document === null) {
            err = true;
            msg = 'Необходимо указать тип ценной бумаги';
        } else if (type === 'Иное имущество' && __tmp.commentary === null) {
            err = true;
            msg = 'Опишите вид имущества';
        } else {
            err = false;
        }
        err = false; // THIS
        if (err) {
            Swal.fire({
                icon: 'error',
                title: 'Ошибка',
                text: msg
            });
        } else {
            if (propUpdate === null) {
                var len = _Object.property[propertyType].length,
                    show_block = true;
                if (len > 0) {
                    if (JSON.stringify(_Object.property[propertyType][len - 1]) !== JSON.stringify(__tmp))
                        _Object.property[propertyType].push(__tmp);
                    else
                        show_block = false;
                } else
                    _Object.property[propertyType].push(__tmp);
            } else {
                _Object.property[propertyType][propUpdate] = __tmp;
                propUpdate = null;
            }
            __tmp = {};
            renderPropertyByType(propertyType);
            $.ajax({
                url: "anketa-function?client_param=der_custom",
                method: "POST",
                data: {data: JSON.stringify(_Object)},
                dataType: "JSON"
            }).done(function (e) {
                if (e.status !== 'success') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ошибка',
                        text: e.reason
                    });
                } else {
                    if (object_click.hasClass('one-more-property')) {
                        if (show_block) {
                            var html = '';
                            html += '<div class="floating-block-1" style="">Имущество добавлено!</div>';
                            object_click.parent().append(html);
                            var obj = $('.floating-block-1');
                            $(obj).fadeOut(3000, function () {
                                $(this).remove();
                            });
                        }
                    } else {
                        $('.an-pop-over').fadeOut();
                    }
                }
            });
        }
    });
    $('.step6appendblock ').on('click', '.status-property', function () {
        var type = $(this).attr('data-type');
        if ($(this).hasClass('remove-property')) {
            var idRemove = $(this).attr('data-remove'),
                html = '';
            _Object.property[type].splice(idRemove, 1);
            _Object.property[type].sort();
            renderPropertyByType(type);
            $.ajax({
                url: "anketa-function?client_param=der_custom",
                method: "POST",
                data: {data: JSON.stringify(_Object)},
                dataType: "JSON"
            }).done(function (e) {
                if (e.status !== 'success') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ошибка',
                        text: e.reason
                    });
                }
            });
        } else {
            var idUpdate = $(this).attr('data-view');
            propertyType = type;
            propUpdate = parseInt(idUpdate);
            $('.one-more-property').parent().hide();
            $('.add-property-btn').text('ОБНОВИТЬ');
            var typeToUpdate = _Object.property[type][idUpdate].type;
            switch (typeToUpdate) {
                case 'Квартира':
                    $('#an-pop-over-7-2').fadeIn(1);
                    $('.property_registered[data-type="' + typeToUpdate + '"]').prop('checked', _Object.property[type][idUpdate].registered);
                    break;
                case 'Частный дом':
                    $('#an-pop-over-7-3').fadeIn(1);
                    $('.property_registered[data-type="' + typeToUpdate + '"]').prop('checked', _Object.property[type][idUpdate].registered);
                    break;
                case 'Земельный участок':
                    $('#an-pop-over-7-4').fadeIn(1);
                    break;
                case 'Транспортное средство':
                    $('#an-pop-over-7-5').fadeIn(1);
                    $('.property_type_auto[data-type="' + typeToUpdate + '"]').val(_Object.property[type][idUpdate].type_auto).trigger('chosen:updated');
                    break;
                case 'Ценные бумаги':
                    $('#an-pop-over-7-6').fadeIn(1);
                    $('.property_type_document[data-type="' + typeToUpdate + '"]').val(_Object.property[type][idUpdate].type_document).trigger('chosen:updated');
                    break;
                case 'Иное имущество':
                    $('#an-pop-over-7-7').fadeIn(1);
                    $('.property_commentary[data-type="' + typeToUpdate + '"]').val(_Object.property[type][idUpdate].commentary);
                    break;
            }
            $('.property_year[data-type="' + typeToUpdate + '"]').val(_Object.property[type][idUpdate].year).trigger('chosen:updated');
            $('.property_price[data-type="' + typeToUpdate + '"]').val(_Object.property[type][idUpdate].price);
        }
    });
    /*property*/

    /*deals*/
    function renderDeals() {
        if (_Object.deals !== undefined && _Object.deals !== null) {
            var html = '';
            $('div.col-lg-5.hidestep7').fadeOut(1);
            $('.fix7step').addClass('col-lg-12').removeClass('col-lg-7');
            for (var j = 0; j < _Object.deals.length; j++) {
                html += '<div style="display: flex; flex-wrap: wrap; align-items: flex-end; margin-top: 20px">';
                html += '<div style="margin: 0 20px 10px 0; max-width: 390px; width: 100%;">';
                html += '<p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0;">Вид сделки</p><input data-update="' + j + '" type="text" value="' + _Object.deals[j].type + '" readonly class="aninpt2" name="deal_type_' + j + '" placeholder="Продажа">';
                html += '</div>';
                html += '<div style="margin: 0 20px 10px 0; max-width: 390px; width: 100%;">';
                html += '<p style="font-weight: normal;font-size: 16px;line-height: 140%; margin-bottom: 0; padding-bottom: 5px">Сумма сделки</p>' + '<input type="text" class="aninpt2" data-update="' + j + '" name="deal_summ_' + j + '" placeholder="500 000" value="' + _Object.deals[j].summ + '" readonly style="position: relative; z-index: 1;">';
                html += '</div>';
                html += '<div style="margin: 0 20px 20px 0"><div class="view-more-deals hov-gen status-deal"  data-view="' + j + '" style="min-height: 26px; font-size: 16px; color: #D63E1C; cursor: pointer"><div class="gr1"></div></div></div>';
                html += '<div style="margin: 0 20px 20px 0"><div class="remove-deals hov-gen status-deal"  data-remove="' + j + '" style="min-height: 26px; font-size: 16px; color: #D63E1C; cursor: pointer"><div class="gr2"></div></div></div>';
                html += '</div>';
            }
            $('.append-block-s7').html(html);
        }
    }

    $('#choose-deal-type').on('input', function () {
        var type = $(':selected', this).val();
        $('.an-pop-over').fadeOut(1);
        switch (type) {
            case 'Дарение':
                $('#an-pop-over-8-3').fadeIn(1);
                break;
            case 'Продажа':
                $('#an-pop-over-8-2').fadeIn(1);
                break;
            case 'Покупка':
                $('#an-pop-over-8-4').fadeIn(1);
                break;
        }
    });
    $('.add-deals-btn, .one-more-deal').on('click', function () {
        var type = $(this).attr('data-type'),
            _tmp = {},
            error = 0,
            object_click = $(this),
            show_block = true;
        _tmp.type = type;
        _tmp.propertyType = $('.deals_propertyType[data-type="' + type + '"]').val();
        _tmp.summ = $('.deals_summ[data-type="' + type + '"]').val();
        _tmp.year = $('.deals_year[data-type="' + type + '"]').val();
        for (var key in _tmp) {
            if (_tmp[key].length <= 0) {
                error++;
                break;
            }
        }
        error = false;
        if (error) {
            Swal.fire({
                icon: 'error',
                title: 'Ошибка',
                text: 'Необходимо заполнить все поля'
            });
        } else {
            if (dealUpdate === null) {
                if ($.isNumeric(_tmp.summ))
                    _tmp.summ = parseInt(_tmp.summ);
                if ($.isNumeric(_tmp.year))
                    _tmp.year = parseInt(_tmp.year);
                if (_Object.deals === undefined || _Object.deals === null)
                    _Object.deals = [];
                _Object.deals.push(_tmp);
            } else {
                _Object.deals[dealUpdate] = _tmp;
                dealUpdate = null;
            }
            _tmp = {};
            renderDeals();
            $.ajax({
                url: "anketa-function?client_param=der_custom",
                method: "POST",
                data: {data: JSON.stringify(_Object)},
                dataType: "JSON"
            }).done(function (e) {
                if (e.status !== 'success') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ошибка',
                        text: e.reason
                    });
                } else {
                    if (object_click.hasClass('one-more-deal')) {
                        if (show_block) {
                            var html = '';
                            html += '<div class="floating-block-1" style="">Сделка добавлена!</div>';
                            object_click.parent().append(html);
                            var obj = $('.floating-block-1');
                            $(obj).fadeOut(3000, function () {
                                $(this).remove();
                            });
                        }
                    } else {
                        $('.an-pop-over').fadeOut();
                    }
                }
            });
        }
    });
    $('.append-block-s7 ').on('click', '.status-deal', function () {
        if ($(this).hasClass('remove-deals')) {
            var idRemove = $(this).attr('data-remove'),
                html = '';
            _Object.deals.splice(idRemove, 1);
            _Object.deals.sort();
            renderDeals();
            $.ajax({
                url: "anketa-function?client_param=der_custom",
                method: "POST",
                data: {data: JSON.stringify(_Object)},
                dataType: "JSON"
            }).done(function (e) {
                if (e.status !== 'success') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ошибка',
                        text: e.reason
                    });
                }
            });
        } else {
            var idUpdate = $(this).attr('data-view');
            dealUpdate = parseInt(idUpdate);
            $('.one-more-deal').parent().hide();
            $('.add-deals-btn').text('ОБНОВИТЬ');
            var typeToUpdate = _Object.deals[idUpdate].type;
            $('.deals_propertyType[data-type="' + typeToUpdate + '"]').val(_Object.deals[idUpdate].propertyType).trigger('chosen:updated');
            $('.deals_summ[data-type="' + typeToUpdate + '"]').val(_Object.deals[idUpdate].summ);
            $('.deals_year[data-type="' + typeToUpdate + '"]').val(_Object.deals[idUpdate].year).trigger('chosen:updated');
            switch (typeToUpdate) {
                case 'Дарение':
                    $('#an-pop-over-8-3').fadeIn(1);
                    break;
                case 'Продажа':
                    $('#an-pop-over-8-2').fadeIn(1);
                    break;
                case 'Покупка':
                    $('#an-pop-over-8-4').fadeIn(1);
                    break;
            }
        }
    });
    /*deals*/

    /*audit_btn*/
    $('.audit_button').on('click', function () {
        _Object.rationale = $('#rationale-text').val();
        $.ajax({
            url: "anketa-function?client_param=der_custom",
            method: "POST",
            data: {data: JSON.stringify(_Object)},
            dataType: "JSON",
            beforeSend: function () {
                $('#over-overlay').fadeIn(300);
            }
        }).done(function (e) {
            $('#over-overlay').fadeOut(300);
            if (e.status !== 'success') {
                Swal.fire({
                    icon: 'error',
                    title: 'Ошибка',
                    text: e.reason
                });
            } else {
                $('.step').fadeOut(1, function () {
                    $('.SHOW_IN_THE_END').hide();
                    $('.progress-bar-anketa').parent().hide();
                    $('.ending-block').fadeIn(1);
                    $('.cabinet_main_container').css({
                        'min-height': '1035px',
                      });
                });
            }
        });
        /*var pass = false;
        $('.last-step-inps').each(function () {
            var t = $(this).attr('data-type');
            _Object.system_info[t] = $(this).val();
        });
        if (_Object.system_info.city.length <= 0 || _Object.system_info.fio.length <= 0 || _Object.system_info.phone.length <= 0) {
            Swal.fire({
                icon: 'error',
                title: 'Ошибка',
                text: 'Необходимо заполнить контактные данные'
            });
        } else {
            _Object.status_soc = [];
            $('.soc').each(function () {
                if ($(this).prop('checked')) {
                    _Object.status_soc.push($(this).next().text());
                }
            });
            if (_Object.status_soc.length <= 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Ошибка',
                    text: 'Необходимо выбрать социальный статус'
                });
            } else {
                if (_Object.status_soc.includes('Работающий')) {
                    _Object.work_place = {};
                    _Object.work_place.main = $('input[name="work_place_main"]').val();
                    _Object.work_place.additional = $('input[name="work_place_additional"]').val();
                    if (_Object.work_place.main <= 0 || _Object.work_place.additional <= 0) {
                        pass = false;
                        Swal.fire({
                            icon: 'error',
                            title: 'Ошибка',
                            text: 'Необходимо заполнить информацию о месте работы'
                        });
                    } else {
                        pass = true;
                    }
                } else {
                    pass = true;
                }
                if (pass) {
                    pass = false;
                    var val_marital = $('select[name="marital_status_main"]').val();
                    _Object.marital_status = {
                        main: val_marital,
                        additional: null,
                        division: val_marital === 'Разведен (разведена)' ? $('select[name="marital_status_additional_division"]').val() : null,
                    };
                    if (val_marital === 'Женат (замужем)') {
                        _Object.marital_status.additional = $('select[name="marital_status_additional_tog"]').val();
                        if (_Object.marital_status.additional === null || _Object.marital_status.additional.length <= 0) {
                            pass = false;
                            Swal.fire({
                                icon: 'error',
                                title: 'Ошибка',
                                text: 'Необходимо указать год заключения брака'
                            });
                        } else {
                            pass = true;
                            _Object.marital_status.additional = parseInt(_Object.marital_status.additional);
                        }
                    } else if (val_marital === 'Разведен (разведена)') {
                        _Object.marital_status.additional = $('select[name="marital_status_additional_div"]').val();
                        if (_Object.marital_status.additional === null || _Object.marital_status.additional.length <= 0) {
                            pass = false;
                            Swal.fire({
                                icon: 'error',
                                title: 'Ошибка',
                                text: 'Необходимо указать год расторжения брака'
                            });
                        } else {
                            pass = true;
                            _Object.marital_status.additional = parseInt(_Object.marital_status.additional);
                        }
                    } else {
                        pass = true;
                        _Object.marital_status.additional = null;
                    }
                    if (pass) {

                    }
                }
            }
        }*/
    });
    /*audit_btn*/

    /*final button*/
    $('.final-button').on('click', function () {
        $.ajax({
            url: "object-analysis",
            method: "POST",
            data: {object: JSON.stringify(_Object)},
            dataType: "JSON",
            beforeSend: function () {
                $('#over-overlay').fadeIn(300);
            }
        }).done(function (e) {
            $('#over-overlay').fadeOut(300);
            if (e.status !== 'success') {
                Swal.fire({
                    icon: 'error',
                    title: 'Ошибка',
                    text: e.reason
                });
            } else {

                /*доходы*/
                var var1 = $('.var1-1'),
                    var2 = $('.var1-2'),
                    var3 = $('.var1-3');
                if (e.data.incoming_money.message === 'Ваши доходы не превышают платеж реструктуризации.') {
                    var2.show();
                    var1.hide();
                    var3.hide();
                } else if (e.data.incoming_money.message === 'У Вас нет официальных источников дохода.') {
                    var2.hide();
                    var1.show();
                    var3.hide();
                } else {
                    var2.hide();
                    var1.hide();
                    var3.show();
                }
                /*доходы*/

                /*имущество*/
                var var21 = $('.var2-1'),
                    var22 = $('.var2-2'),
                    var23 = $('.var2-3');
                if (e.data.property.message === 'У Вас нет недвижимости и другого имущества, которое может быть реализовано при банкротстве! Это замечательно.') {
                    var21.hide();
                    var22.hide();
                    var23.show();
                } else if (e.data.property.message === 'У Вас есть имущество, которое может быть продано на торгах по банкротству. Необходимо получить консультацию, как избежать продажи и защитить имущество!') {
                    var21.hide();
                    var22.show();
                    var23.hide();
                } else {
                    var21.show();
                    var22.hide();
                    var23.hide();
                }
                /*имущество*/

                /*сделки*/
                var var31 = $('.var3-1'),
                    var32 = $('.var3-2');
                if (e.data.deals.message === "Вы совершали сделки за последние три года! Нужно получить консультацию у юриста о том, как защитить их от оспаривания!") {
                    var31.show();
                    var32.hide();
                } else {
                    var31.hide();
                    var32.show();
                }
                /*сделки*/

                /*брак*/
                var var41 = $('.var4-1'),
                    var42 = $('.var4-2'),
                    var43 = $('.var4-3'),
                    var44 = $('.var4-4'),
                    var45 = $('.var4-5');
                if (e.data.marital_status.message === 'У Вас нет семейного имущества, купленного в браке! Это очень хорошо!') {
                    var41.show();
                    var42.hide();
                    var43.hide();
                    var44.hide();
                    var45.hide();
                } else if (e.data.marital_status.message === 'Вы никогда не состояли в браке, а значит и нет совместного имущества! Это облегчит процедуру!') {
                    var41.hide();
                    var42.show();
                    var43.hide();
                    var44.hide();
                    var45.hide();
                } else if (e.data.marital_status.message === 'У Вас есть семейное имущество, купленное в браке за последние 3 года! Его могут продать на торгах. Срочно обсудите с юристом, как защитить это имущество от реализации!') {
                    var41.hide();
                    var42.hide();
                    var43.show();
                    var44.hide();
                    var45.hide();
                } else if (e.data.marital_status.message === 'У Вас нет семейного имущества, купленного в браке! Это очень хорошо!') {
                    var41.hide();
                    var42.hide();
                    var43.hide();
                    var44.show();
                    var45.hide();
                } else {
                    var41.hide();
                    var42.hide();
                    var43.hide();
                    var44.hide();
                    var45.show();
                }
                /*брак*/

                /*долги*/
                var var51 = $('.var5-1-1'),
                    var52 = $('.var5-1-2'),
                    var53 = $('.var5-1-3'),
                    var54 = $('.var5-2-1'),
                    var55 = $('.var5-2-2'),
                    var56 = $('.var5-2-3'),
                    var57 = $('.var5-3-1'),
                    var58 = $('.var5-3-2');
                if (e.data.debts.notAllowed !== null && e.data.debts.notAllowed !== undefined && e.data.debts.notAllowed.length > 0) {
                    if (e.data.debts.notAllowed.includes("Долги по алиментам не списываются при банкротстве!"))
                        var51.show();
                    else
                        var51.hide();
                    if (e.data.debts.notAllowed.includes("Субсидиарная ответственность не списывается при банкротстве!"))
                        var52.show();
                    else
                        var52.hide();
                    if (e.data.debts.notAllowed.includes("Долги по алиментам не списываются при банкротстве!"))
                        var53.show();
                    else
                        var53.hide();
                }
                if (e.data.debts.addtext === 'Вам не подходит упрощенная (внесудебная) процедура банкротства. Вы можете подать в на общих условиях через Арбитражный Суд!') {
                    var54.show();
                    var55.hide();
                    var56.hide();
                } else if (e.data.debts.addtext === 'Вам подходит упрощенное (внесудебное) банкротство! Это замечательно! Но нужно уточнить у юриста!') {
                    var54.hide();
                    var55.show();
                    var56.hide();
                } else {
                    var54.hide();
                    var55.hide();
                    var56.show();
                }
                if (e.data.debts.lasttext === 'Вашей суммы долга может не хватить для подачи заявления на банкротство! Нужна консультация с юристом!') {
                    var57.show();
                    var58.hide();
                } else {
                    var57.hide();
                    var58.show();
                }
                /*долги*/

                /*ип*/
                var var61 = $('.var6-1'),
                    var62 = $('.var6-2');
                if (e.data.individual_enterpreneur.message === "Вы индивидуальный предприниматель, а значит процедура будет для Вас сложнее") {
                    var62.show();
                    var61.hide();
                } else {
                    var61.show();
                    var62.hide();
                }
                /*ип*/

                /*статус*/
                var var71 = $('.var7-1'),
                    var72 = $('.var7-2');
                if (e.data.status_soc.message === 'Вы военный – это группа риска при банкротстве. Нужна консультация с юристом') {
                    var71.hide();
                    var72.show();
                } else {
                    $('.var-status').html(e.data.status_soc.message);
                    var71.show();
                    var72.hide();
                }
                /*статус*/

                /*просрочки*/
                var var81 = $('.var8-1'),
                    var82 = $('.var8-2');
                if (e.data.credit_debt.message === 'У Вас большие просрочки – это позволяет подать на банкротство с высоким шансом!') {
                    var81.show();
                    var82.hide();
                } else {
                    var82.show();
                    var81.hide();
                }
                /*просрочки*/

                /*ооо*/
                var var91 = $('.var9-1'),
                    var92 = $('.var9-2');
                if (e.data.LLC_capital.message === 'Вы не являетесь участником АО или ООО – это хорошо!') {
                    var91.show();
                    var92.hide();
                } else {
                    var92.show();
                    var91.hide();
                }
                /*ооо*/

                /*дебиторка*/
                var var101 = $('.var10-1'),
                    var102 = $('.var10-2');
                if (e.data.receivables.message === 'У Вас нет текущих прав требования долга к третьим лицам. Это упрощает процедуру!') {
                    var101.show();
                    var102.hide();
                } else {
                    var102.show();
                    var101.hide();
                }
                /*дебиторка*/

                /*баллы*/
                var
                    rez1 = $('.rez1'),
                    rez2 = $('.rez2'),
                    rez3 = $('.rez3'),
                    rez4 = $('.rez4'),
                    my_block = $('.my-rating'),
                    parentblock = $('.parent-block-my');
                if (e.data.points <= 35) {
                    rez1.show();
                    rez2.hide();
                    rez3.hide();
                    rez4.hide();
                    my_block.removeClass('yellow-block');
                    my_block.addClass('red-block');
                    parentblock.removeClass('yellow-block');
                    parentblock.addClass('red-block');
                    $('.anketa-points').css('font-size', '30px');
                } else if (e.data.points >= 36 && e.data.points <= 50) {
                    rez1.hide();
                    rez2.show();
                    rez3.hide();
                    rez4.hide();
                    my_block.removeClass('yellow-block');
                    my_block.addClass('red-block');
                    parentblock.removeClass('yellow-block');
                    parentblock.addClass('red-block');
                } else if (e.data.points >= 51 && e.data.points <= 65) {
                    rez1.hide();
                    rez2.hide();
                    rez3.show();
                    rez4.hide();
                    my_block.addClass('yellow-block');
                    my_block.removeClass('red-block');
                    parentblock.addClass('yellow-block');
                    parentblock.removeClass('red-block');
                } else {
                    rez1.hide();
                    rez2.hide();
                    rez3.hide();
                    rez4.show();
                    my_block.addClass('yellow-block');
                    my_block.removeClass('red-block');
                    parentblock.addClass('yellow-block');
                    parentblock.removeClass('red-block');
                }
                var expPoints = Math.trunc(100 - Math.random() * 15);
                $('.expert-rating').css('height', expPoints + '%');
                my_block.css('height', e.data.points + '%');
                $('.anketa-points').text(e.data.points);
                $('.expert-points').text(expPoints);
                /*баллы*/

                $('#second-big-section-anketa').fadeOut(1, function () {
                    $('#final-block').fadeIn(1);
                });
                var txtParam = params1['id'] === undefined ? '' : params1['id'];
                _Object.ready_to_pay = $('#checkbox_1777322').prop('checked');
                $.ajax({
                    type: "POST",
                    url: 'compose-data?id=' + txtParam,
                    data: {data: JSON.stringify(_Object), rating: e.data.points},
                    dataType: 'json'
                }).done(function (e) {
                    console.log(e);
                    if($(window).width() > 900 && $('.cabinet_info').height() <= 1035 && $('.cabinet_main').height() <= 1035){
                        $('.cabinet_main_container').css({
                          'min-height': '1035px',
                        });
                      }else if($(window).width() > 900 && $('.cabinet_main').height() > 1035){
                        $('.cabinet_main_container').css({
                          'min-height': 'calc(100vh - 160px)',
                        });
                      }
                });

            }
        });
    });
    /*final button*/

    $('.aninpt').on('change input blur', function(){
        var j = $(this);
        if(j.val().length > 0) j.css('border-color', 'green').css('background-color', '#e7ffe7');
        else j.css('border-color', 'red').css('background-color', '#ffdbdc');
    });

});