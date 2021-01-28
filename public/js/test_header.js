
$(document).ready( _=>{

  // $(document).on("click", "#deleteQuestion", function(event){ // Working AJAX call for Updating Exam Details
  //   event.preventDefault();
  //   alert("/admin/test/{{$exam->id}}/question/{{$question->id}}");
    // jQuery.ajax({
    //    url: "/admin/test/update_Exam",
    //    method: 'post',
    //    data: $('#exam_details').serialize(),
    //    success: function(result){
    //     // console.log(result['success']);
    //     if (result['success']=='Exam Details are successfully updated') {
    //       Swal.fire({
    //         position: 'top-end',
    //         title: 'Updated Successfully!',
    //         showConfirmButton: false,
    //         icon: 'success',
    //         timer: 1800
    //       })
    //     } else if (result['success']=='Exam is over so cannot update') {
    //       Swal.fire(
    //         'Oops...',
    //         '<b class="text-success">Exam is Over!</b> <br>You cannot update exam details now',
    //         'info'
    //       )
    //     } else if (result['success']=='Exam is live so cannot update') {
    //       Swal.fire(
    //         'Oops...',
    //         '<b class="text-danger">Exam is Live!</b> <br>You cannot update exam details now',
    //         'info'
    //       )
    //     } else if (result['success']=='Exam is published so cannot update') {
    //       Swal.fire(
    //         'Oops...',
    //         '<b class="text-info">Exam is Published!</b> <br>You cannot update exam details now',
    //         'info'
    //       )
    //     } 
    //    }});
    // });

  $(document).on("click", "#update_Exam", function(event){ // Working AJAX call for Updating Exam Details
    event.preventDefault();
    // alert("In 1");
    jQuery.ajax({
      //  url: "{{env('APP_URL')}}/admin/test/update_Exam", // Not working
       url: "/admin/test/update_Exam",
       method: 'post',
       data: $('#exam_details').serialize(),
       success: function(result){
        // console.log(result['success']);
        if (result['success']=='Exam Details are successfully updated') {
          Swal.fire({
            position: 'top-end',
            title: 'Updated Successfully!',
            showConfirmButton: false,
            icon: 'success',
            timer: 1800
          })
        } else if (result['success']=='Exam is over so cannot update') {
          Swal.fire(
            'Oops...',
            '<b class="text-success">Exam is Over!</b> <br>You cannot update exam details now',
            'info'
          )
        } else if (result['success']=='Exam is live so cannot update') {
          Swal.fire(
            'Oops...',
            '<b class="text-danger">Exam is Live!</b> <br>You cannot update exam details now',
            'info'
          )
        } else if (result['success']=='Exam is published so cannot update') {
          Swal.fire(
            'Oops...',
            '<b class="text-info">Exam is Published!</b> <br>You cannot update exam details now',
            'info'
          )
        } 
       }});
    });

    $(document).on("click", "#publish", function(event){ // Working AJAX call Publish button
      event.preventDefault();
      // alert("In 1");
      jQuery.ajax({
        //  url: "{{env('APP_URL')}}/admin/test/update_Exam", // Not working
         url: "/admin/test/publish_Exam",
         method: 'post',
         data: $('#exam_details').serialize(),
         success: function(result){
          // console.log(result['success']);
          if (result['success']=='Exam Details are not published') {
            
            Swal.fire({
                  title: '<strong>Alert</strong>',
                  icon: 'info',
                  html:
                    '<b>Are you sure, to publish this test?</b><br>' +
                    'Once published you <span class="text-danger">cannot</span>:<br>' +
                    '1.<span class="text-info">Update/Delete</span> exam details<br>' +
                    '2.<span class="text-info">Unpublish(deactivate)</span> the exam<br>' +
                    'But you <span class="text-success">can</span>:<br>' +
                    '1.<span class="text-success">Update/Add</span> questions of exam',
                  showCloseButton: true,
                  showCancelButton: true,
                  focusConfirm: false,
                  confirmButtonText:
                    '<i class="fa fa-upload"></i> Publish',  
                  confirmButtonColor: '	#28a745',
                  cancelButtonText:
                    '<i class="fa fa-thumbs-down"></i>',
                  cancelButtonAriaLabel: 'Thumbs down'
                }).then((result) => {
                  if (result.isConfirmed) {
                    // document.getElementById('changeValue').value='publish';
                    // document.getElementById('exam_details').submit();
                    jQuery.ajax({
                      //  url: "{{env('APP_URL')}}/admin/test/update_Exam", // Not working
                       url: "/admin/test/publish_Exam_Confirm",
                       method: 'post',
                       data: $('#exam_details').serialize(),
                       success: function(result){
                        if (result['success']=='Exam Details are successfully published') {
                          Swal.fire({
                            position: 'top-end',
                            title: 'Exam Published Successfully!',
                            showConfirmButton: false,
                            icon: 'success',
                            timer: 1800
                          })
                          setInterval(function() {
                            location.reload();
                            }, 1800);
                            // Reference : https://stackoverflow.com/questions/27654298/jquery-refresh-reload-page-if-ajax-success-after-time
                        }
                       }});
                    // Swal.fire('Published!', '', 'success')
                  } else if (result.isDenied) {
                    Swal.fire('Exam is not published<br>Try again!', '', 'info')
                  }
                }) // Reference : https://sweetalert2.github.io/
          } else if (result['success']=='Exam Details cannot be published') {
            Swal.fire(
              'Oops...',
              '<b class="text-danger">Exam cannot be Published!</b> <br>There must be atleast 1 Question to publish exam',
              'info'
            )
          } else if (result['success']=='Exam is already published') {
            Swal.fire(
              'Oops...',
              '<b class="text-warning">Exam Published!</b> <br>You cannot unpublish this exam now',
              'info'
            )
          } else {
            'Oops...',
            'Something went wrong! Try Again',
            'error'
          }
         }});
      });
  
  $(document).on("click", "#del_exam", function(event){  // Working delete exam using AJAX
    // Reference : https://abbasharoon.me/how-to-fix-laravel-ajax-500-internal-server-error/
    event.preventDefault();
      // alert("In 1");
      jQuery.ajax({
         url: "/admin/test/delete_Exam",
         method: 'post',
         data: $('#exam_details').serialize(),
         dataType: "json",
         success: function(result){
          // console.log(result['success']);
          if (result['success']=='Exam Details are not published') {
            
            Swal.fire({
                  title: '<strong>Alert</strong>',
                  icon: 'warning',
                  html:
                    '<b>Are you sure, to delete this test forever?</b><br> ' +
                    'All its corresponding questions will also be deleted<br>' +
                    '(Once deleted cannot be recovered)',
                  showCloseButton: true,
                  showCancelButton: true,
                  focusConfirm: false,
                  confirmButtonText:
                    '<i class="fas fa-trash"></i> Crush it!',  
                  confirmButtonColor: '	#d33',
                  cancelButtonText:
                    '<i class="fa fa-thumbs-down"></i>',
                  cancelButtonAriaLabel: 'Thumbs down'
                }).then((result) => {
                  if (result.isConfirmed) {
                    // document.getElementById('changeValue').value='publish';
                    // document.getElementById('exam_details').submit();
                    jQuery.ajax({
                       url: "/admin/test/delete_Exam_Confirm",
                       method: 'post',
                       data: $('#exam_details').serialize(),
                       success: function(result){
                        if (result['success']=='Exam is deleted successfully!') {
                          setInterval(function() {
                            location.href="/admin/tests";
                            // Reference : https://stackoverflow.com/questions/16959476/how-to-go-to-a-url-using-jquery
                            }, 1800);
                          Swal.fire({
                            position: 'top-end',
                            title: 'Exam Deleted Successfully!',
                            showConfirmButton: false,
                            icon: 'success',
                            timer: 1800
                          })
                            // Reference : https://stackoverflow.com/questions/27654298/jquery-refresh-reload-page-if-ajax-success-after-time
                        }
                       }});
                    // Swal.fire('Published!', '', 'success')
                  } else if (result.isDenied) {
                    Swal.fire('Exam is not deleted<br>Try again!', '', 'info')
                  }
                }) // Reference : https://sweetalert2.github.io/
          } else if (result['success']=='Exam is over so cannot delete') {
            Swal.fire(
              'Oops...',
              '<b class="text-success">Exam is Over!</b> <br>You cannot delete exam details now',
              'info'
            )
          } else if (result['success']=='Exam is live so cannot delete') {
            Swal.fire(
              'Oops...',
              '<b class="text-danger">Exam is Live!</b> <br>You cannot delete exam details now',
              'info'
            )
          } else if (result['success']=='Exam is published so cannot delete') {
            Swal.fire(
              'Oops...',
              '<b class="text-info">Exam is Published!</b> <br>You cannot delete exam details now',
              'info'
            )
          } 
         }});
    // Reference : https://sweetalert2.github.io/

  });
  // Reference : https://stackoverflow.com/questions/6912197/change-value-of-input-and-submit-form-in-javascript

  $(document).on("click", "#add_question", function(){ 
  // $("#add_question").click(function() {
    // $("#addNewQuestion").fadeIn('slow');
    // $('#addNewQuestion').fadeOut('slow');
    // Reference : https://www.youtube.com/watch?v=zK4nXa84Km4
    // AJAX call to check if test is active
    jQuery.ajax({
      url: "/admin/test/check_active",
      method: 'post',
      data: $('#exam_details').serialize(),
      success: function(result){
       if (result['success'] =='Exam is active') {
         Swal.fire({
           title: '<b class="text-info">Oops..</b>',
           html: '<b class="text-danger">Exam is Live!</b><br>' +
           'You cannot add questions now',
           showConfirmButton: false,
           icon: 'info',
           timer: 2000
          })
           setInterval(function() {
             location.reload();
             }, 2000);
           // Reference : https://stackoverflow.com/questions/27654298/jquery-refresh-reload-page-if-ajax-success-after-time
          } else if(result['success'] =='Exam is not active') {
            $("#addNewQuestion").modal("show");
            // $("#addNewQuestion").fadeIn('slow');
          }
        }});

  });


  
});