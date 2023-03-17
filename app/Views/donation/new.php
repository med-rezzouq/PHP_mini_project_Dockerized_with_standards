<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/app/Views/layout/header.php');
?>



<div class="container-fuid d-flex justifycontent-center mx-auto my-5">
<form action="./new-donation" method="post" class="mx-auto">
<h1 class="my-4">Add new Donation</h1>
<div class="mb-3 row">
    <label for="donationName" class="col-sm-4 col-form-label">Donation Name:</label>
    <div class="col-sm-8">
    <input type="text" id="donationName"  name="donationName" class="form-control" placeholder="Donation name" required /> 
    </div>
  </div>

  <div class="mb-3 row">
    <label for="donationType" class="col-sm-4 col-form-label">Donor Name:</label>
    <div class="col-sm-8">

    <select name="donorId" id="donorId" class="form-control" >
    <?php
        foreach ($_GET['donors'] as $donor) {
            echo ' <option value="'.$donor['id'].'">'.$donor['donorName'].'</option>';
        }
    ?>
    </select>

    </div>
  </div>

  <div class="mb-3 row">
    <label for="donationType" class="col-sm-4 col-form-label" >Donation Type:</label>
    <div class="col-sm-8">

    <select name="donationType" id="donationType" class="form-control" required />
        <option value="Money">Money</option>
        <option value="Nutrition">Nutrition</option>
        <option value="Clothes">Clothes</option>
    </select>

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