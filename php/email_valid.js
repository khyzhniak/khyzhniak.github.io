<script type="0e9dedc126dc350bc86b29c0-text/javascript">
            $('#subscribe-form').submit(function(e){
                var email = $('#email').val();
                var reg = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
                if (email=="") {
                    $('#email').css('border','1px solid red');
                    return false;
                }else if (reg.test(email) == false) {
                    $('#email').css('border','1px solid red');
                    $('#email').css('color', 'red');
                    return false;
                }else if (reg.test(email) == true) {

                if($('#hide').val()=='1')
                {
                    return false;
                }  //return false;
                }
            });
            function email_check(){
                var email = $('#email').val();
                               $.ajax({
                    url:"ajax/sub_email_check.php",
                    type:"post",
                    data:{email:email},
                    success:function(result){
                        //alert(result);
                        if (result == 'false') {
                            $('#err_sub').css('display', 'block');
                            $('#hide').val('1');
                        }else{
                            $('#hide').val('0');
                        }
                    },
            });
            }
        </script>
