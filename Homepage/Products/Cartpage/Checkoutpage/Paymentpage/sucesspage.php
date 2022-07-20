<html>
  <head>
  <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">  </head>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: black;
      }
        h1 {
          color: #44d62c;
          font-family: 'Titillium Web', sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #44d62c;
          font-family: 'Titillium Web', sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #44d62c;
        font-size: 120px;
        line-height: 200px;
        margin-left:-20px;
        font-weight: 600;
        border-color: 2px solid black;
      }
      .card {
        background: #242426;
        padding: 60px;
        border-radius: 4px;
        display: inline-block;
        margin: 0 auto;
      }
      a{
          color: white;
          font-size: 17px;
          text-decoration: none;
          font-family: 'Titillium Web', sans-serif;
          opacity: 80%;
      }
      a:hover{
          color: #44d62c;
          font-size: 18px;
      }

     
    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Success</h1> 
        <p>We received your Purchase Request.</p>
        <p>Order ID : <?php echo $_POST['orderid']?></p><br>
        <a href="http://localhost/Website/Homepage/homepage.php">Continue Shopping</a><br>
        <a href="http://localhost/Website/Homepage/Accountpage/accountpage.php">View Orders</a>
      </div>
    </body>
</html>

<?php
    session_start();
    include "connection_db.inc.php";
    $orignalusername=$_SESSION['login_id'];

      // FETCH VALUES

      $orderid=$_POST['orderid'];
      $orderdate=$_POST['orderdate'];
      $orderadd=$_POST['shippingaddress'];
      $orderamt=$_POST['totalamount'];
      $orderstat=$_POST['orderstatus'];
      $orderqnty=$_POST['quantity'];


    
    $query="SELECT * FROM login WHERE email='$orignalusername';";
    $result=pg_query($conn,$query);

    if(pg_num_rows($result)==1)
    {
      while($row=pg_fetch_assoc($result))
                {
                  $userid=$row['id']; 
                }
    }
    
    $query="INSERT INTO orders VALUES (DEFAULT, '$orderid','$orderdate','$orderadd',$orderamt,'$orderstat','$orderqnty',$userid);";
    $result=pg_query($conn,$query);

    if(!$result){
      echo "Failed";
    }


?>