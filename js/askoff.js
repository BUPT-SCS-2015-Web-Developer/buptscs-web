  $.fn.datetimepicker.dates['zh-CN'] = {
			days: ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六", "星期日"],
			daysShort: ["周日", "周一", "周二", "周三", "周四", "周五", "周六", "周日"],
			daysMin:  ["日", "一", "二", "三", "四", "五", "六", "日"],
			months: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
			monthsShort: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"],
			today: "今天",
			suffix: [],
			meridiem: ["上午", "下午"]
	};
  $('.form_date').datetimepicker({
      language: 'zh-CN',
      weekStart: 1,
      todayBtn: 1,
      autoclose: 1,
      startDate: '+0d',
      todayHighlight: 1,
      startView: 2,
      minView: 1,
      forceParse: 0,
      pickerPosition: "bottom-left"
  });



  $(document).ready(function() {
      $('#submit').click(function() {
          var finish = true;
          if ($("#time").val() == '') {
              event.preventDefault();
              $('#time').addClass('has-error');
              $('#errort').addClass('is-visible');
              finish = false;
          } else {
             $('#time').removeClass('has-error');
             $('#errort').removeClass('is-visible');
        }
          if ($("#reason").val() == '') {
              event.preventDefault();
              $('#reason').addClass('has-error');
              $('#reason-absent').addClass('is-visible');
              finish = false;
          }
           else {
              $('#reason').removeClass('has-error');
             $('#reason-absent').removeClass('is-visible');
        }
          if (!finish) return;
          //alert($('#time').val());
          $.ajax({
              type: 'post',
              url: 'leave.php',
              data: {
                  time: $('#time').val(),
                  reason: $('#reason').val(),
              },
              dataType: 'json',
              success: function(json) {
                  alert(json.insert);
              },
              error: function(XMLHttpRequest, textStatus, errorThrown) {
                  alert("人生好失败！请假也失败0.0");
              }
          });
      });
  });
