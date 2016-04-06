      $(document).ready(function() {
          $('#submit').click(function() {
              var finish = true;
              for (var j = 1; j < 4 && finish; j++) {
                  var name = $("#choose" + j).attr('name');
                  if ($("#choose" + j).val() == '-1') {
                      event.preventDefault();
                      $('#error' + j).addClass('is-visible');
                      finish = false;
                  } else {
                      $('#error' + j).removeClass('is-visible');
                  }
              }
              for (var j = 4; j < 7 && finish; j++) {
                  var vra = $('input:radio[name="choose' + j + '"]:checked').val();
                  if (vra == null) {
                      event.preventDefault();
                      $('#error' + j).addClass('is-visible');
                      finish = false;
                  }else{
                      $('#error' + j).removeClass('is-visible');
                  }
              }

              if (!finish) return;
              // alert($('#text1').val());
              var data=new Array();

                            
              for (var j = 1; j < 4 && finish; j++) {
                  if ($('#choose'+j).val() == '')
                  data[j] = $('#choose'+j).val();
                   else
                  data[j]= $('#choose'+j).val();
              }

              for (var j = 4; j < 7 && finish; j++) {
                  data[j] = $('input:radio[name="choose'+j+'"]:checked').val();
              }



              $.ajax({
                  type: 'post',
                  url: 'saveInfotest.php',
                  data: {

                      answer1: data[1],

                      answer2: data[2],

                      answer3: data[3],

                      answer4: data[4],

                      answer5: data[5],

                      answer6: data[6],

                      answer7: data[8],

                      answer8: data[8],

                  },
                  dataType: 'json',
                  success: function(json) {
                      alert(json.insert);
                  },
                  error: function(XMLHttpRequest, textStatus, errorThrown) {
                      alert('提交失败，请重试');
                  }
              });
          });
      });
