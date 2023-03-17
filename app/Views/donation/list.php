<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/app/Views/layout/header.php');


echo '<div class="bd-example px-4">
<a href="http://'.$_SERVER['HTTP_HOST'].'/index.php/new-donation" class="btn btn-primary my-4">Add new Donation</a>
<h1 style="display:block;margin:auto;">Donation List</h1>
';

echo '<div class="bd-example px-4">
<div class="my-5">
<h4 style="display:block;margin:auto;">Search Filter </h4>  
<select name="donorId" id="donorId" class="form-control "><option value="">filter by donor</option>';


    foreach ($_GET['donors'] as $donor) {
        echo ' <option value="'.$donor['id'].'">'.$donor['donorName'].'</option>';
    }



echo'
</select></div><table class="table table-striped table-hover ">
    <thead>
  <tr>
<td>Donation Name</td><td>Donation Type</td>  </tr><tbody id="donationList">
</thead>

<tr><td colspan="2" style="text-align:center;" class="py-5"> <h2> Use the select filter above to choose donations by donor</h2></td> </tr>

</tbody></table></div>';

echo "
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js'></script>
<script>




$(document).on('change', '#donorId', function() {
    var self =$(this);
    var donorId = $('#donorId').val();
    var dataPost = {
            'donorId': donorId
    };
    var dataContact = JSON.stringify(dataPost);


    $.ajax({
        type: 'POST',
        context: this,
        url: 'filter-donations',
        data: {
            data: dataContact
        },
        dataType: 'json',
        async: false,

        success: (data) => {
       
             $.each(data, function(key, value) {
               
                if (key == 'suc') {     
                    $('#donationList').html('');
                        for(let i in value){
                                $('#donationList').append('<tr><td>'+ value[i]['donationName'] +'</td><td>'+ value[i]['donationType'] + '</td></tr>');
                            
                        
                        }
                    
                   
                }
                if (key == 'err') {
                    alert(value);
                }


            });
            return true;

        },
        error: function(data) {
        }

    });

    return false;

});
</script>
";

require_once($_SERVER['DOCUMENT_ROOT'] . '/app/Views/layout/footer.php');
