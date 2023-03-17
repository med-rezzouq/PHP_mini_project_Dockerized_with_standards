<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/app/Views/layout/header.php');
?>



<div class="container-fuid d-flex justifycontent-center mx-auto my-5">
<form action="./new-donor" method="post" class="mx-auto">
<h1 class="my-4">Add new Donor</h1>
<div class="mb-3 row">
    <label for="donorName" class="col-sm-4 col-form-label">Donor Name:</label>
    <div class="col-sm-8">
    <input type="text" id="donorName"  name="donorName" placeholder="donor name" class="form-control" required /> 
    </div>
  </div>

  <div class="mb-3 row">
    <label for="phone" class="col-sm-4 col-form-label">Donor phone number:</label>
    <div class="col-sm-8">
    <input type="phone" id="phone"  name="phone" placeholder="Donor phone number" class="form-control" required />
    </div>
  </div>

  <div class="mb-3 row">
    
    
  <button type="submit" class="btn btn-primary">
    ADD
</button>
    
  </div>




</form>
</div>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/app/Views/layout/footer.php');
?>