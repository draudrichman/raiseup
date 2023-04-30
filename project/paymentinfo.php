<?php  
require 'config.php';
  $campaignID = filter_var($_GET['campaignID'], FILTER_VALIDATE_INT);
$paymentMethod = filter_var($_GET['paymentMethod'], FILTER_SANITIZE_STRING);
$donationAmount = filter_var($_GET['donationAmount'], FILTER_VALIDATE_FLOAT);


    
    if(empty($_SESSION["id"])){
      // $id = $_SESSION["id"];
      header("Location: signinup.php");
    }

    $userID = $_SESSION["id"];



    if(isset($_POST["paynow"])){
      print_r($paymentMethod);
      $query = "INSERT INTO donation (campaignID, userID, method, amount) VALUES ($campaignID, $userID, '$paymentMethod', $donationAmount)";
        mysqli_query($conn, $query);
      $query = "UPDATE campaign SET currentAmount = currentAmount + $donationAmount WHERE campaignID = $campaignID";
        mysqli_query($conn, $query);
        header("Location: campaigndetails.php?campaignID=$campaignID");

  }
  

    mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		@import url("https://fonts.googleapis.com/css?family=Montserrat&display=swap");
@import url("https://fonts.googleapis.com/css?family=Odibee+Sans&display=swap");
* {
  box-sizing: border-box;
  font-family: "Montserrat", sans-serif;
  font-size: 1rem;
}

body {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100vw;
  margin: 0;
  background: white;
  overflow-x: hidden;
}

#root {
  margin-top: 5rem;
  display: flex;
  justify-content: center;
  align-items: center;
  justify-content: space-between;
  width: 57.22rem;
}
@media (max-width: 62.22rem) {
  #root {
    width: 100%;
    flex-direction: column;
  }
}
@media (max-width: 30rem) {
  #root {
    margin-top: 0.5rem;
  }
}

#card {
  position: relative;
  width: 22.97rem;
  height: 15.5rem;
  margin-bottom: 3rem;
}
@media (max-width: 30rem) {
  #card {
    width: 20.22rem;
    height: 12.75rem;
    margin-bottom: 1.75rem;
  }
}
#card > #card-top, #card > #card-bottom {
  width: 20.22rem;
  height: 12.75rem;
  border-radius: 0.6rem;
}

#card > #card-top {
  position: absolute;
  content: "";
  top: 0;
  left: 0;
  background: linear-gradient(120deg, #FC5179, #FB5117);
  box-shadow: 1rem 1rem 2.75rem #D7BCC4;
}
#card > #card-top, #card > #card-top * {
  color: white;
  font-family: "Odibee Sans", "Montserrat", sans-serif;
}
#card > #card-top::before {
  position: absolute;
  content: "";
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: url("http://cdn.flaticon.com/svg/44/44386.svg") no-repeat center;
  background-size: cover;
  opacity: 0.04;
}
#card > #card-top > .logo {
  position: absolute;
  top: 0.25rem;
  right: 2rem;
}
#card > #card-top > .logo > svg {
  width: 4rem;
}
#card > #card-top > .card-number {
  position: absolute;
  top: 45%;
  left: 2rem;
  width: 70%;
  opacity: 0.75;
  font-size: 1.25rem;
}
#card > #card-top > .row-container {
  position: absolute;
  bottom: 1rem;
  left: 2rem;
  width: 70%;
  display: flex;
  justify-content: center;
  align-items: center;
  justify-content: space-between;
  opacity: 0.75;
}
#card > #card-top > .row-container > div {
  display: flex;
  flex-direction: column;
  justify-content: start;
  align-items: flex-start;
}
#card > #card-top > .row-container > div > span {
  height: 1rem;
  margin-bottom: 0.5rem;
  padding: 0;
}

#card > #card-bottom {
  position: absolute;
  content: "";
  top: 2.75rem;
  left: 2.75rem;
  background: #EFF1F4;
  box-shadow: 0.5rem 0.5rem 2.75rem #ADA9AB;
}
@media (max-width: 30rem) {
  #card > #card-bottom {
    display: none;
  }
}
#card > #card-bottom::after {
  position: absolute;
  content: "";
  top: 2.55rem;
  width: 100%;
  height: 2.55rem;
  background: #E2E0E1;
}

#form {
  width: 27rem;
  display: flex;
  justify-content: center;
  align-items: center;
  align-items: flex-start;
  flex-direction: column;
}
@media (max-width: 30rem) {
  #form {
    width: 20.22rem;
  }
}
#form fieldset {
  border: none;
  margin-top: 1rem;
  margin-left: 0;
  padding-left: 0;
  padding-right: 0;
  width: 100%;
}
#form fieldset input, #form fieldset select {
  width: 100%;
  padding: 0.5rem 1rem;
  outline: none;
}
#form fieldset.card-number input, #form fieldset.card-holder input {
  border: solid 1px #A9A9A9;
  background: transparent;
}
#form .row-container {
  display: flex;
  justify-content: center;
  align-items: center;
  justify-content: space-between;
  width: 100%;
}
#form .row-container fieldset {
  flex: 1;
  margin-right: 1.25rem;
}
#form .row-container fieldset:nth-child(3) {
  margin-right: 0;
}
#form .payment-details {
  margin-top: 1rem;
  width: 100%;
}
#form .payment-details > div {
  display: flex;
  justify-content: center;
  align-items: center;
  justify-content: space-between;
}
#form button {
  color: #DC4039;
  cursor: pointer;
  outline: none;
  background: white;
  border: solid 1px #DC4039;
  border-radius: 0.2rem;
  width: 100%;
  height: 3rem;
  margin-top: 1rem;
}
	</style>
</head>
<body>


		<div id="root">
  <div id="card">
    <div id="card-bottom"></div>
    <div id="card-top">
      <div class="logo">
      <svg version="1.1" id="visa" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="72px" height="72px" viewBox="0 0 47.834 47.834" style="enable-background:new 0 0 47.834 47.834;" fill="white">
        <g>
          <g>
            <path d="M44.688,16.814h-3.004c-0.933,0-1.627,0.254-2.037,1.184l-5.773,13.074h4.083c0,0,0.666-1.758,0.817-2.143
                     c0.447,0,4.414,0.006,4.979,0.006c0.116,0.498,0.474,2.137,0.474,2.137h3.607L44.688,16.814z M39.893,26.01
                     c0.32-0.819,1.549-3.987,1.549-3.987c-0.021,0.039,0.317-0.825,0.518-1.362l0.262,1.23c0,0,0.745,3.406,0.901,4.119H39.893z
                     M34.146,26.404c-0.028,2.963-2.684,4.875-6.771,4.875c-1.743-0.018-3.422-0.361-4.332-0.76l0.547-3.193l0.501,0.228
                     c1.277,0.532,2.104,0.747,3.661,0.747c1.117,0,2.313-0.438,2.325-1.393c0.007-0.625-0.501-1.07-2.016-1.77
                     c-1.476-0.683-3.43-1.827-3.405-3.876c0.021-2.773,2.729-4.708,6.571-4.708c1.506,0,2.713,0.31,3.483,0.599l-0.526,3.092
                     l-0.351-0.165c-0.716-0.288-1.638-0.566-2.91-0.546c-1.522,0-2.228,0.634-2.228,1.227c-0.008,0.668,0.824,1.108,2.184,1.77
                     C33.126,23.546,34.163,24.783,34.146,26.404z M0,16.962l0.05-0.286h6.028c0.813,0.031,1.468,0.29,1.694,1.159l1.311,6.304
                     C7.795,20.842,4.691,18.099,0,16.962z M17.581,16.812l-6.123,14.239l-4.114,0.007L3.862,19.161
                     c2.503,1.602,4.635,4.144,5.386,5.914l0.406,1.469l3.808-9.729L17.581,16.812L17.581,16.812z M19.153,16.8h3.89L20.61,31.066
                     h-3.888L19.153,16.8z"/>
          </g>
        </g>
      </svg>
    </div>
      <div class="card-number">
        XXXX XXXX XXXX XXXX
      </div>
      <div class="row-container">
        <div class="card-holder">
          <span>Card Holder</span>
          <span></span>
        </div>
        <div class="expiry">
          <span>Expires</span>
          <span>
            <span class="expiry-month">00</span> 
            / 
            <span class="expiry-year">00</span>
          </span>
        </div>
        <div class="cvc">
          <span>CVC</span>
          <span>___</span>
        </div>
      </div>
    </div>  
  </div>
  <form id="form" class = "form "method="POST">
    <header>
      <h2 style="font-family: 'Montserrat', sans-serif;">Payment Information</h2>
    </header>
    <fieldset class="card-number">
      <legend>Card Number</legend>
      <span>
        <input id="card-number" maxlength="19" placeholder="1234 5678 9123 4567"/>
      </span>
    </fieldset>
    <fieldset class="card-holder">
      <legend>Card holder</legend>
      <input type="text" id="card-holder" placeholder="John Doe"/>
    </fieldset>
    <div class="row-container">
      <fieldset class="expiry-month">
        <legend>Expiray Month</legend>
        <select>
            <option></option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
          </select>
      </fieldset>
      <fieldset class="expiry-year">
        <legend>Expiry Year</legend>
        <select id="card-expiration-year">
          <option></option>
 
          <option value="23">2023</option>
          <option value="24">2024</option>
          <option value="25">2025</option>
          <option value="26">2026</option>
          <option value="27">2027</option>
          <option value="28">2028</option>
          <option value="29">2029</option>
          <option value="30">2030</option>
        </select>
      </fieldset>
      <fieldset class="cvc">
        <legend>CVC</legend>
        <input type="text" maxlength="3" />
      </fieldset>
    </div>
    <div class="payment-details">
      <div class="total">
        <span class="category"><b>Amount:</b></span> 
        <span class="price"><b>$40.92 CAD</b></span>
      </div>
    </div>
    <button type="submit" name="paynow" >Complete Payment</button>
    
  </form>  
</div>

</body>
</html>