  $(document).ready(function() {
      $('#submit').click(function() {
          var finish = true;
          if ($("#problem").val() == '') {
              event.preventDefault();
              $('#problem').addClass('has-error');
              $('#problem-absent').addClass('is-visible');
              finish = false;
          }
           else {
              $('#problem').removeClass('has-error');
             $('#problem-absent').removeClass('is-visible');
        }
          if (!finish) return;
          //alert($('#time').val());
          $.ajax({
              type: 'post',
              url: 'leave.php',
              data: {
                  time: $('#time').val(),
                  problem: $('#problem').val(),
              },
              dataType: 'json',
              success: function(json) {
                  alert(json.insert);
              },
              error: function(XMLHttpRequest, textStatus, errorThrown) {
                  alert("OMG，问题反馈失败了0.0");
              }
          });
      });
  });