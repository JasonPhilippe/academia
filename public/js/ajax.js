$(document).ready(function () {

    $('#form_university').submit(function (e) {
       e.preventDefault();
       if($('#add').val()=="add"){
          $.ajax({
              url:"{{ route('/save_university')}}",
              method:"POST",
              data: {
                  'nom':$('#nom').val(),
                  'adresse':$('#adresse').val(),
                  'logo':$('#logo').val(),
                  'email':$('#email').val(),
              },
              contentType:false,
              cache:false,
              processData:false,
              dataType:"json",
              success:function (data) {
                  if (data.error()){
                      swal({
                          title:"Message",
                          text: "Error",
                          icon: "warning"
                      });
                  }
                  if (data.success()){
                      $('#form_university')[0].reset();
                      swal({
                          title:"Message",
                          text: "Succes",
                          icon: "success"
                      });
                  }

              }

          });
       }
    });

    $('#form_facultes').submit(function () {

        var nom = $('#nom').val();
        var status = $('#status').val();
        var universite = $('#universite').val();

        if(nom =="" || status=="" || universite==""){
            $('.alert').show();
            $('#message').html("Veuillez remplir tous le champs !!!");
            $('#strong').html("Succès");
        }
        else {
            //request ajax to server db
            $.ajax({
                url:"../../controllers/ControllerFacultes.php",
                method:"post",
                data:{
                    nom:nom,
                    status:status,
                    universite:universite
                },
                success:function (data) {
                    if(data=="success"){
                         alert("mdmfm");
                        //load_universite_data("select");
                    }
                    swal({
                        title: "Message envoyé",
                        text: "votre message a été envoyé avec succès, nous allons vous repondre bientôt!!!!",
                        icon: "success",
                        button: "OK",
                        duration:5000
                    });

                },
                error:function () {

                }
            });
        }

    });
});
