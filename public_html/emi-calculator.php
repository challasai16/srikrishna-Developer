<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--head-->
     <?php
       include 'head.php';
     ?>
     <!--head ends -->
    <title>EMI Calculator - Srikrishna Developpers</title>
</head>
<body>

  <!-- header section starts here  -->
    <?php
    include 'header.php';
    ?>
  <!-- header section ends here  -->


  <section class="calculators-main">
    <div class="calculator-container s-container s-flex">
       <!-- emi calculator start here  -->
        <div class="emi-calculator calculator-box">
          <div class="calculator-title">
            <h2>EMI CALCULATOR</h2>
          </div>
          <div class="entrybox">
            <input type="number" class="loan-amount" placeholder="Loan Amount" required>
            <input type="number" class="loan-interest" placeholder="Rate Of Interest" required>
            <input type="number" class="loan-tenure" placeholder="Loan Tenure In Years" required>
            <button class="emi-cal-btn">CALCULATE</button>
          </div>
          <div class="emi-result-content">
             <p>EMI Amount : <span class="emi-amout">000000000000</span></p>
             <p>Total Interest : <span class="interest">000000000000</span></p>
             <p>Total Payable : <span class="total-payable">000000000000</span></p>
          </div>
        </div>
       <!-- emi calculator end here  -->

       <!-- distance calculator starts here  -->
       <div class="emi-calculator dist-calculator">
          <div class="calculator-title dist-calculator-title">
            <h2>DISTANCE CALCULATOR</h2>
          </div>
          <div class="entrybox">
      
            <select name="" id="distance-project">
              <option value="krishe-pearl">Krishe Pearl</option>
              <option value="krishe-avya">Krishe Avya</option>
            </select>
            <select name="" id="areadist-project">
              <option value="krishe-pearl">Madhapur</option>
              <option value="krishe-avya">Jubilee Hills</option>
              <option value="krishe-avya">Banjara Hills</option>
              <option value="krishe-avya">LB Nagar</option>
              <option value="krishe-avya">Jbs</option>
               
            </select>
            <br>
            <br>
            <button>CALCULATE DISTANCE</button>
          </div>
          <div class="emi-result-content">
             <p>Distance : <span class="distace-result">000</span> Km</p>
             
          </div>
        </div>
       <!-- distance calculator ends here  -->
       <!-- currency calculator starts here  -->
       <div class="emi-calculator calculator-box">
          <div class="calculator-title currency-converter">
            <h2>CURRENCY CALCULATOR</h2>
          </div>
          <div class="entrybox currency-converter-entry">
            <input type="text" class="curreny-amout" placeholder="Amount" required>
            <input type="text" placeholder="From" required>
            <input type="text" placeholder="To" required>
            <button>CALCULATE</button>
          </div>
          <div class="emi-result-content currence-converter-result">
             <p>Result : <span class="currence-result">000000000000</span></p>
             
          </div>
        </div>
       <!-- currency calculator ends here  -->
    </div>
  </section>


  <!-- footer section starts here  -->
  <?php
    include 'footer.php';
  ?>
  <!-- footer section ends here  -->
    
 <script>
  // emi calculator 

let loanAmount = document.querySelector(".loan-amount");
let interestRate = document.querySelector(".loan-interest");
let tenure = document.querySelector(".loan-tenure");
let emiBtn = document.querySelector('.emi-cal-btn');

let interstContent = document.querySelector(".interest");
let totalAmontContent = document.querySelector('.total-payable');
let EmiContent = document.querySelector('.emi-amout');

// values 


emiBtn.addEventListener("click", ()=> {
   let interest = (loanAmount.value*interestRate.value)/100;
   let FinalInterest = tenure.value * interest;
   let totalAmout = (parseInt(loanAmount.value) + FinalInterest);
   let Emi = (totalAmout/(tenure.value))/12;
   interstContent.innerHTML = FinalInterest;
   totalAmontContent.innerHTML = totalAmout;
   EmiContent.innerHTML = Math.round(Emi);
  
});




 </script>
  
    
</body>
</html>