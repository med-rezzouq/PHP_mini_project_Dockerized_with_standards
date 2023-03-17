<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Donation plateforme</title>
  </head>
  <body>

  <?php



echo '<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
<div class="container-fluid ">
  <a class="navbar-brand" href="/">Donations Website</a>

  <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarColor02" >
    <ul class="navbar-nav mb-2 mb-lg-0 justify-content-center">

<li class="nav-item text-white" ><a href="http://'.$_SERVER['HTTP_HOST'].'/index.php/list-donations" class="nav-link text-white bg-dark mx-1" >Donations</a> </li> 
<li class="nav-item text-white"><a href="http://'.$_SERVER['HTTP_HOST'].'/index.php/new-donor" class="nav-link text-white bg-dark mx-1">New Donor</a></li>
<li class="nav-item text-white"><a href="http://'.$_SERVER['HTTP_HOST'].'/index.php/new-donation" class="nav-link text-white bg-dark mx-1">New Donation</a></li>


    </ul>

  </div>
</div>
</nav>';
