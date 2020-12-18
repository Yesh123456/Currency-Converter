<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- jQuery END PART-->

<title>Currency Convertor Using PHP</title>
<!--custom javascript-->
<script src="script.js"></script>
<style>
.classWithPad { 
  margin:2px; padding:4px; 
}
#converted_amount_id{
  color:green;
}
input{
  height: 12px;
}
</style>
<?php require('templatefile/container.php');?>
<div class="content">
  <div class="container-fluid">
    <h2>Currency Converter Using PHP</h2>   
    <br><br>  
    <div class="row">
     
      <form class="form-inline" >
        <div class="form-group classWithPad">
          <label for="Name2">From Currency &nbsp;&nbsp;</label>
          <select class="form-control" id="from_currency_id" required name="from_currency" style="width:170px;">
            <?php include('db-connection.php');?>
            <?php  
              $sql_query = "SELECT currency_id,currency_name FROM currency_list";
             
              if ($result=mysqli_query($con,$sql_query))
              {
                 
                while ($currency_list = mysqli_fetch_assoc($result))
                { 
            ?>
              <option value="<?php echo $currency_list['currency_id'];?>" <?php if($currency_list['currency_id'] == "USD"){echo 'selected';}?> ><?php echo $currency_list['currency_name']; ?></option>
            <?php    } } ?>
          </select>
        </div>

        <div class="form-group classWithPad">
          <label for="Email2">Amount&nbsp;&nbsp;</label>
          <input style="width:90px;" type="text" class="form-control" name="amount" id="amount_id" required>
        </div>

        <div class="form-group classWithPad">
          <label for="Email2">To Currency &nbsp;&nbsp;</label>
          <select class="form-control" id="to_currency_id" name="to_currency" required style="width:170px;">
           <?php  
              $sql_query  = "SELECT currency_id,currency_name FROM currency_list";
              if ($result = mysqli_query($con,$sql_query))
              {
                 
                while ($currency_list = mysqli_fetch_assoc($result))
                { 
            ?>
              <option value="<?php echo $currency_list['currency_id'];?>" <?php if($currency_list['currency_id'] == "INR"){echo 'selected';}?>><?php echo $currency_list['currency_name']; ?></option>
            <?php    } } ?>
          </select>
        </div>

         <div class="form-group classWithPad">
          <label for="Email2">Converted Amount&nbsp;</label>
          <input style="width:90px;" type="text" class="form-control" id="converted_amount_id" readonly="">
        </div>

        <div class="form-group classWithPad">
          <button type="button"  onclick="convertCurrency();" class="btn btn-danger">Convert</button>
        </div>
      </form>
    </div>
    <br><br>
</div>
</div>
</body>
</html>
