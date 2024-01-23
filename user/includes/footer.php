</div>
        

        <script type="text/javascript" src="js/jquery-ui.min.js"></script>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

        <script src="js/jquery.min.js"></script>

        <script src="https://kit.fontawesome.com/a46e960981.js" crossorigin="anonymous"></script>

        <script>
              $(document).ready(function() {


                $("#venueCategory").on("change", function() {
                  var category = $(this).val();

                  $.ajax({
                    url:'filterCategory.php',
                    type:'POST',
                    data:{
                        category:category,
                    },
                    success:function(response){
                      //alert(response);
                        $('.courtList').html(response);
                            
                        }
                    });
                });


                $('.dateBtn').on("click", function () {
                    var dateValue = $(this).data('date');
                    var parts = dateValue.split('|');
                    $('input[name="selectDate"]').val(parts[0]);
                    $('#selectedDate').html(parts[0]);

                    $.ajax({
                    url:'generateAvailableTime.php',
                    type:'POST',
                    data:{
                        dateValue:dateValue,
                    },
                    success:function(response){
                      //alert(response);
                        $('.timeSlotDiv').html(response);
                            
                        }
                    });


                });
              


              });
        </script>

    </body>

</html>