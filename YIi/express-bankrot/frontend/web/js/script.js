const regions = {
  "Воронеж": ["г. Воронеж, ул. Фридриха Энгельса д.25Б, офис 102, БЦ БиК.", "+7 (473) 280-01-01"],
  "Краснодар": ["г. Краснодар, ул. Красная, 65, 2 этаж, офис 5", "+7 (861) 205-64-64"],
  "Ростов-на-Дону": ["Ростов-на-Дону, пер. Братский, 55", "+7 (863) 333-52-02"],
  "Барнаул": ["г. Барнаул ул. Деповская д.18", "+7 (3852) 29-92-02"],
}

$(document).ready(function () {
  $.mask.definitions["9"] = false;
  $.mask.definitions["5"] = "[0-9]";
  $("input[type=tel]")
    .mask("+7(955) 555-5555")
    .on("click", function () {
      $(this).trigger("focus");
    });

  let region;
  ymaps.ready(init);

  function init() {
    ymaps.geolocation.get({
      provider: "yandex"
    })
      .then(function (res) {
        var g = res.geoObjects.get(0);
        $("input[name=city]").val(g.getLocalities()[0]);
        region = g.getLocalities()[0];
        $("input[name=new_region]").val(g.getAdministrativeAreas()[0]);
        if (region in regions) {
          const [address, phone] = regions[region];
          document.querySelectorAll(".js-footer_phone").forEach(item => {
            item.textContent = phone;
            item.href = `tel:${phone}`;
          })
          document.querySelector(".js-address").textContent = address;
        }
      })
      .catch(function (err) {
        console.log('Не удалось установить местоположение', err);
      });
  }
});



// $('button, a').on('click', function () {
//   $(this).css('border','none');
// });

//-----HEADER-----//
var BurgerTrigger = 0;
$('.BurgerBTN').on('click', function () {
  if (BurgerTrigger == 0) {
    $(this).addClass('active');
    $('.BurgerMenu').addClass('active');
    $('.BurgerBack').fadeIn(300);
    BurgerTrigger = 1;
  } else if (BurgerTrigger == 1) {
    $(this).removeClass('active');
    $('.BurgerMenu').removeClass('active');
    $('.BurgerBack').fadeOut(300);
    BurgerTrigger = 0;
  }
});
$('.BurgerBack, .BurgerMenuClose').on('click', function () {
  $('.BurgerMenu, .BurgerBTN').removeClass('active');
  $('.BurgerBack').fadeOut(300);
  BurgerTrigger = 0;
});

const openPopups = document.querySelectorAll(".open-popup");
openPopups.forEach(openPopup => {
  openPopup.addEventListener("click", (e) => {
    e.preventDefault();
    const popup = $(`.Popup_Staps_content_${openPopup.dataset.call}`);
    if (popup.hasClass("popC_Stap-content")) {
      $('.popCWrap, .popCBack').fadeIn(300);
    } else {
      $('.PopupBack, .PopupWrap',).fadeIn(300);
    }
    $('body').css({
      'overflow': 'hidden',
    });
    document.querySelectorAll(".Popup_Staps_content").forEach(p => p.classList.remove("shown"));
    popup.addClass("shown");
  })
})
// $('.header_bottom_right-text').on('click', function(){
//   $('.PopupBack, .PopupWrap').fadeIn(300);
//   $('body').css({
//     'overflow': 'hidden',
//   });
// });
$('.PopupClose, .PopupBack').on('click', function () {
  $('.PopupBack, .PopupWrap').fadeOut(300);
  $('body').css({
    'overflow': 'auto',
  });
});

$('.PopupForm').on('submit', function (e) {
  $.ajax({
    url: "site/send-form",
    method: "POST",
    data: $(this).serialize(),
    beforeSend: function () {
      $('.Popup_Stap1').fadeOut(300);
      setTimeout(function () {
        $('.Popup_Stap2').fadeIn(300);
      }, 300);
    },
  });
  e.preventDefault();
});
//-----HEADER-----//

/*------ORDER-PAGES------*/
$('.MainOrderForm').on('submit', function (e) {
  $.ajax({
    url: "site/send-form",
    method: "POST",
    data: $(this).serialize(),
    beforeSend: function () {
      // window.location.replace('thanks');
    },
  });
  e.preventDefault();
});

$('.FirstOrderForm').on('submit', function (e) {
  $.ajax({
    url: "site/send-form",
    method: "POST",
    data: $(this).serialize(),
    beforeSend: function () {
      // window.location.replace('thanks');
    },
  });
  e.preventDefault();
});

$('.SecondOrderForm').on('submit', function (e) {
  $.ajax({
    url: "site/send-form",
    method: "POST",
    data: $(this).serialize(),
    beforeSend: function () {
      // window.location.replace('thanks');
    },
  });
  e.preventDefault();
});

$('.TherdOrderForm').on('submit', function (e) {
  $.ajax({
    url: "site/send-form",
    method: "POST",
    data: $(this).serialize(),
    beforeSend: function () {
      // window.location.replace('thanks');
    },
  });
  e.preventDefault();
});

$('.ConsultationForm').on('submit', function (e) {
  $.ajax({
    url: "site/send-form",
    method: "POST",
    data: $(this).serialize(),
    beforeSend: function () {
      // window.location.replace('thanks');
    },
  });
  e.preventDefault();
});
/*------ORDER-PAGES------*/

/*------QUIZ-PAGE------*/
var now = 1;
var counts = ".Stap" + now + " .rad";
var Stap = ".Stap" + now;
var StapNext = ".Stap" + (now + 1);
$('.nextBTN').on('click', function () {
  var k = 0;
  $(counts).each(function () {
    if ($(this).prop('checked')) {
      k++;
    }
  });
  if (k > 0) {
    $(Stap).fadeOut(300, function () {
      $(StapNext).fadeIn(300, function () {
        now++;
        StapNext = ".Stap" + (now + 1);
        counts = ".Stap" + now + " .rad";
        Stap = ".Stap" + now;
      });
    });
  }
});


$('.QuizForm').on('submit', function (e) {
  $.ajax({
    url: "site/send-form",
    method: "POST",
    data: $(this).serialize(),
    beforeSend: function () {
      window.location.replace('thanks');
    },
  });
  e.preventDefault();
});
/*------QUIZ-PAGE------*/

/*------Services select------*/
$(".news__search-select").styler();
/*------Services select------*/

/*------MAIN-PAGE------*/
var tabsoff = 0;
$('.mainpage_tabs_btn').on('click', function () {
  tabsoff = 1;
});

var tab = 1,
  nowtab = ".tab" + tab,
  tc = 0,
  ts = 100 / 14,
  percent = 0,
  fill = percent + "%";

$('.btn-tab1').addClass('active');
$('.btn-tab1 .mainpage_tabs_btn-string-fill').addClass('active');
$('.mainpage_tabs_info-wrapper').each(function () {
  tc++;
});
setInterval(function () {
  if (tabsoff == 0) {
    tab++;
    nowtab = ".tab" + tab;
    if (tab <= tc) {
      $('.mainpage_tabs_info-wrapper').fadeOut(300);
      setTimeout(function () {
        $(nowtab).fadeIn(300);
        percent = 0;
      }, 300);
      $('.mainpage_tabs_btn').each(function (i) {
        if (i == (tab - 1)) {
          $('.mainpage_tabs_btn-string-fill').css({
            'width': '0%'
          });
          $('.mainpage_tabs_btn, .mainpage_tabs_btn-string-fill').removeClass('active');
          $(this).addClass('active');
          $(this).find('.mainpage_tabs_btn-string-fill').addClass('active');
        }
      });
    } else {
      tab = 1;
      nowtab = ".tab" + tab;
      $('.mainpage_tabs_info-wrapper').fadeOut(300);
      setTimeout(function () {
        $(nowtab).fadeIn(300);
        percent = 0;
      }, 300);
      $('.mainpage_tabs_btn-string-fill').css({
        'width': '0%'
      });
      $('.mainpage_tabs_btn, .mainpage_tabs_btn-string-fill').removeClass('active');
      $('.btn-tab1').addClass('active');
      $('.btn-tab1 .mainpage_tabs_btn-string-fill').addClass('active');
    }
  }
}, 15000);

setInterval(function () {
  if (tabsoff == 0) {
    percent = percent + ts;
    fill = percent + "%";
    if (percent < 100) {
      $('.mainpage_tabs_btn-string-fill.active').css({
        'width': fill
      });
    }
  }
}, 1000);

$('.mainpage_tabs_btn').on('click', function () {
  $('.mainpage_tabs_btn, .mainpage_tabs_btn-string-fill').removeClass('click-active');
  $('.mainpage_tabs_btn, .mainpage_tabs_btn-string-fill').removeClass('active');
  $(this).addClass('active');
  $(this).find('.mainpage_tabs_btn-string-fill').addClass('click-active');
  if ($(this).attr('id') == "btn-tab1" && $('.tab1').is(":hidden")) {
    $('.mainpage_tabs_info-wrapper').fadeOut(300);
    setTimeout(function () {
      $('.tab1').fadeIn(300);
    }, 300);
  } else if ($(this).attr('id') == "btn-tab2" && $('.tab2').is(":hidden")) {
    $('.mainpage_tabs_info-wrapper').fadeOut(300);
    setTimeout(function () {
      $('.tab2').fadeIn(300);
    }, 300);
  } else if ($(this).attr('id') == "btn-tab3" && $('.tab3').is(":hidden")) {
    $('.mainpage_tabs_info-wrapper').fadeOut(300);
    setTimeout(function () {
      $('.tab3').fadeIn(300);
    }, 300);
  } else if ($(this).attr('id') == "btn-tab4" && $('.tab4').is(":hidden")) {
    $('.mainpage_tabs_info-wrapper').fadeOut(300);
    setTimeout(function () {
      $('.tab4').fadeIn(300);
    }, 300);
  }
});

$('.OpenCaseImage').on('click', function () {
  $('.CaseBack, .CaseWrap').fadeIn(300);
  // $(this).next().clone().appendTo('.Case');
  $('body').css({
    'overflow': 'hidden',
  });
  $(".Case_close").focus();
});
$('.Case_close, .CaseBack').on('click', function () {
  $('.CaseBack, .CaseWrap').fadeOut(300);
  // $('.Case > img').remove();
  $('body').css({
    'overflow': 'auto',
  });
});
/*------MAIN-PAGE------*/

/*------ARTICLE------*/
$('.articlepage_stats-btn').on('click', function () {
  $('.articlepage_stats-btn').removeClass('active');
  $(this).addClass('active');
});

var c = 0,
  b = 0,
  d = 0,
  v = 0,
  title_id = 'qwe' + c
  ;

$('.article h2, .article h3').addClass('art-title');
$('.article h4, .article h5, .article h6').addClass('art-subtitle');

if ($(".art-title").length) {
  $(".articlepage_nav-wrap").fadeIn();
}

$('.art-title').each(function (title_i) {
  c++;
  title_id = 'title' + c;
  $(this).attr('id', title_id);
  if (title_i <= c) {
    var title = '<li><button>' + $(this).text() + '</button></li>';
    $('.articlepage_nav-titles').append(title);
    $(this).nextUntil('.art-title').filter(".art-subtitle").each(function () {
      b++;
      title_id = 'subtitle' + b;
      $(this).attr('id', title_id);
      var subtitle = '<ul><li><button>' + $(this).text() + '</button></li></ul>';
      $('.articlepage_nav-titles>li').each(function (subtitle_i) {
        if (subtitle_i == title_i) {
          $(this).append(subtitle);
        }
      });
    });
  }
});

$('.articlepage_nav-titles > li > button').each(function () {
  d++;
  var title_id_to = 'title' + d;
  $(this).addClass(title_id_to);
});

$('.articlepage_nav-titles > li > ul > li > button').each(function () {
  v++;
  var title_id_to = 'subtitle' + v;
  $(this).addClass(title_id_to);
});

$('.articlepage_nav-titles button').on('click', function () {
  var scroll = "#" + $(this).attr('class');
  slowScroll(scroll);
});

function slowScroll(id) {
  var offset = 40;
  $('html, body').animate({
    scrollTop: $(id).offset().top - offset
  }, 600);
  return false;
}
/*------ARTICLE------*/

/*------LOGON------*/

$('.forgot-password').on('click', function () {
  $('.Logon_Stap0').fadeOut(300);
  setTimeout(function () {
    $('.Logon_Stap1').fadeIn(300);
  }, 300);
});

/*------cabinet_header------*/
(function ($) {
  $.fn.myToggle = function () {
    var toggle = 1;
    $(this).on('click', function () {
      if (toggle == 1) {
        $(this).addClass('active');
        $('.cabinet_header-usename_spoiler').slideDown(300);
        toggle = 0;
      } else if (toggle == 0) {
        $(this).removeClass('active');
        $('.cabinet_header-usename_spoiler').slideUp(300);
        toggle = 1;
      }
    });
    $('body').on('click', function (e) {
      if (!$('.cabinet_header-usename-wrappper').is(e.target) && $('.cabinet_header-usename-wrappper').has(e.target).length === 0) {
        $('.cabinet_header-usename, .cabinet_header-usename_spoiler-item').removeClass('active');
        $('.cabinet_header-usename_spoiler').slideUp(300);
        toggle = 1;
      }
    });
  };
})(jQuery);

$('.cabinet_header-usename').myToggle();

// function hov() {
//   $(this).parent().css({
//     'background': '#c2defd',
//   })
// };
// function unhov() {
//   $(this).parent().css({
//     'background': '#ECF5FF',
//   })
// };

$('.cabinet_header-usename_spoiler-item a').focus(function () {
  $('.cabinet_header-usename_spoiler-item a').parent().removeClass('active');
  $(this).parent().addClass('active');
});
// $('.cabinet_header-usename_spoiler-item a').mouseenter(hov);
// $('.cabinet_header-usename_spoiler-item a').mouseleave(unhov);

if ($('.cabinet_header-date').hasClass('red')) {
  $('.cabinet_header-date').find('p').remove();
  $('.cabinet_header-date').text('ПРОЦЕДУРА ПРИОСТАНОВЛЕНА');
}

var cabinet_burger = 0;
$('.cabinet_burger-btn').on('click', function () {
  if (cabinet_burger == 0) {
    $('.cabinet_main_nav, .cabinet_burger-btn').addClass('active');
    setTimeout(function () {
      cabinet_burger = 1;
    }, 300);
  }
});

$('.BurgerMenuClose2').on('click', function (e) {
  if (cabinet_burger == 1) {
    $('.cabinet_main_nav, .cabinet_burger-btn').removeClass('active');
    setTimeout(function () {
      cabinet_burger = 0;
    }, 300);
  }
});

$('.cabinet_burger-btn, .cabinet_main_container').on('click', function (e) {
  if (cabinet_burger == 1 && !$('.cabinet_main_nav').is(e.target) && $('.cabinet_main_nav').has(e.target).length === 0) {
    $('.cabinet_main_nav, .cabinet_burger-btn').removeClass('active');
    setTimeout(function () {
      cabinet_burger = 0;
    }, 300);
  }
});
/*------cabinet_header------*/

/*------cabinet_main------*/
function height() {
  if ($(window).width() > 900 && $('.cabinet_info').height() <= 1035 && $('.cabinet_main').height() <= 1035) {
    $('.cabinet_main_container').css({
      'min-height': '1035px',
    });
  } else if ($(window).width() > 900 && $('.cabinet_main').height() > 1035) {
    $('.cabinet_main_container').css({
      'min-height': 'calc(100vh - 160px)',
    });
  }
};

$(document).ready(height);
$(window).resize(height);
$('.cabinet_info').resize(height);
/*------cabinet_main------*/

/*------cabinet------*/
var timer_c3 = 59,
  timer_a3 = 59,
  timer3 = '1:' + timer_c3,
  trig3 = 1,
  change_tgigger = 0;
;

$('.cabinet_settings-personal_row-phone').change(function () {
  change_tgigger = 1;
});

$('.signin_main-subtitle-btn').on('click', function () {
  timer_c3 = 59;
  timer_a3 = 59;
  timer3 = '1:' + timer_c3;
});

$('.signin_main_sendcode-again').on('click', function () {
  $('.signin_main_sendcode-again').fadeOut(0);
  $('.signin_main_sendcode-text').fadeIn(0);
  timer_c3 = 59;
  timer_a3 = 59;
  timer3 = '1:' + timer_c3;
});

$('.save-phone-popup .signin_main-subtitle-btn, .PopupClose, .save-popup-back').on('click', function () {
  $('.save-popup-back, .save-phone-popup-wrap, .save-popup-wrap').fadeOut(300);
});

// $('.popup-phone-settings').on('submit', function (e) {
//   $.ajax({
//       url: "scripts/",
//       method: "POST",
//       data: $(this).serialize(),
//       beforeSend: function (){
//         $('.save-phone-popup-wrap').fadeOut(300);
//         change_tgigger = 0;
//         setTimeout(function(){
//           $('.save-popup-wrap').fadeIn(300);
//         }, 300);
//       },
//   });
//   e.preventDefault();
// });



$('.cabinet_settings-btn').on('click', function () {
  var id = $(this).attr('data-id');
  $('.cabinet_settings-btn').css('color', '#7181AA');
  $(this).css('color', '#0940C8');
  $(".cabinet_settings-tabs").fadeOut(1);
  $('.' + id).fadeIn(300);
  location.hash = id;
});
var hash = location.hash.substring(1),
  btn = $('.cabinet_settings-tabs'),
  butt = $('.cabinet_settings-btn');
if (hash.length === 0) {
  $('.set1').fadeIn(1);
  $('button[data-id="set1"]').css('color', '#0940C8');
} else {
  btn.fadeOut(1);
  btn.each(function () {
    if ($(this).hasClass(hash)) {
      $(this).fadeIn(300);
    }
  });
  butt.each(function () {
    if ($(this).attr('data-id') === hash) {
      $(this).css('color', '#0940C8');
    }
  })
}




$('.jq-file__browse, .jq-file__name').text('');

$('.cabinet_stages-passed-item-btn').on('click', function () {
  if (!$(this).hasClass('active')) {
    $(this).addClass('active');
    $(this).next().slideDown(300, function () {
      height();
    });
  } else if ($(this).hasClass('active')) {
    $(this).removeClass('active');
    $(this).next().slideUp(300, function () {
      height();
    });
  }
});

$('.cabinet-docs-filter-btn .jq-radio.checked').parent().addClass('active');
$('.cabinet-docs-filter-btn .jq-radio').on('click', function () {
  if ($(this).hasClass('checked')) {
    $('.cabinet-docs-filter-btn .jq-radio').parent().removeClass('active');
    $(this).parent().addClass('active');
  }
});

$('.cabinet-docs-filter-btn input').focus(function () {
  if ($('.cabinet-docs-filter-btn .jq-radio').hasClass('focused')) {
    $('.cabinet-docs-filter-btn .jq-radio').parent().removeClass('focus');
    $('.cabinet-docs-filter-btn .jq-radio.focused').parent().addClass('focus');
  }
});

function focusReset() {
  if (!$('.cabinet-docs-filter-btn .jq-radio').hasClass('focused')) {
    $('.cabinet-docs-filter-btn .jq-radio').parent().removeClass('focus');
  }
}
$('body').on('click', focusReset);
$('body').on('keydown', focusReset);

$('.cabinet-docs-item_row .jq-file__name').text('Загрузить');

$('.cabinet-docs-item_column').find($('input, file')).each(function () {
  $(this).parent().parent().addClass('pad');
});

$('.cabinet-docs-item_row').find($('.jq-file')).each(function () {
  $(this).parent().addClass('adaptive');
});
/*------cabinet------*/

/*---popC---*/

$('.popCBack, .PopCClose').on('click', function () {
  $('.popCWrap, .popCBack').fadeOut(300);
});
/*---popC---*/

const accordions = document.querySelectorAll(".accordion");
accordions.forEach((accordion) => {
  accordion.addEventListener('click', () => {
    // Закрываем все блоки, кроме текущего
    if (accordion.classList.contains("active")) {
      accordions.forEach(a => a.classList.remove("active"));
    } else {
      accordions.forEach(a => a.classList.remove("active"));
      accordion.classList.add('active');
    }
  });
});
