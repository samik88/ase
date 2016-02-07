<?php
   $index_sub="";
   $usa_sub="";
   $uk_sub="";
   $turkey_sub="";
   $orders_sub="";
   $purchases_sub="";
   $ask_buy_sub="";  
   $declaration_sub="";
   $faq_sub="active";
   $contacts_sub="";
include("header.php");
?>
     
         <!-- ============================================================== -->
         <!-- Start right Content here -->
         <!-- ============================================================== -->                      
         <div class="content-page">
            <!-- Start content -->
            <div class="content">
               <div class="row">
                  <div class="col-lg-">
                     <div class="tabs-vertical-env">
                        <ul class="nav tabs-vertical">
                           <li class="active">
                              <a href="#common" data-toggle="tab">Common</a>
                           </li>
                           <li>
                              <a href="#payments" data-toggle="tab">Payments</a>
                           </li>
                           <li>
                              <a href="#terms" data-toggle="tab">Terms of use</a>
                           </li>
                           <li>
                              <a href="#customs" data-toggle="tab">Customs</a>
                           </li>
                           <li>
                              <a href="#other" data-toggle="tab">Other</a>
                           </li>
                        </ul>
                        <div class="tab-content">
                           <div class="tab-pane active" id="common">
                              <div class="panel-group" id="accordion-test">
                                 <div class="panel panel-info panel-color">
                                    <div class="panel-heading">
                                       <h4 class="panel-title"> 
                                          <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseOne" aria-expanded="false" class="collapsed">
                                          What countries do you deliver from?
                                          </a> 
                                       </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                       <div class="panel-body">
                                          We deliver from Turkey, United Arab Emirates, United Kingdom, United States of America, Germany
                                       </div>
                                    </div>
                                 </div>
                                 <div class="panel panel-purple panel-color">
                                    <div class="panel-heading">
                                       <h4 class="panel-title"> 
                                          <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseTwo" class="collapsed" aria-expanded="false">
                                          What days do you deliver?
                                          </a> 
                                       </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse ">
                                       <div class="panel-body">
                                          We have following time schedule: Turkey — every day UAE — USA — If your goods enter the storehouse till the early hours on Friday and early hours on Tuesday, then it will be sent on Friday and Thursday accordingly UK — on Saturdays Germany — upon request
                                       </div>
                                    </div>
                                 </div>
                                 <div class="panel panel-pink panel-color">
                                    <div class="panel-heading">
                                       <h4 class="panel-title"> 
                                          <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseThree" class="collapsed" aria-expanded="false">
                                          How many types of delivery do you have?
                                          </a> 
                                       </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                       <div class="panel-body">
                                          a) Air freight delivery <br/>
                                          b) Road freight delivery
                                       </div>
                                    </div>
                                 </div>
                                 <div class="panel panel-warning panel-color">
                                    <div class="panel-heading">
                                       <h4 class="panel-title"> 
                                          <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseFour" class="collapsed" aria-expanded="false">
                                          Which goods are better to be sent by air freight and which by road freight?
                                          </a> 
                                       </h4>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse">
                                       <div class="panel-body">
                                          Small size goods up to 30 kg are better to be carried by airplane, but big size goods (such as furniture) are better to be carried by road freight
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane" id="payments">
                              <div class="panel-group" id="accordion-payments">
                                 <div class="panel panel-info panel-color">
                                    <div class="panel-heading">
                                       <h4 class="panel-title"> 
                                          <a data-toggle="collapse" data-parent="#accordion-payments" href="#collapsePurOne" aria-expanded="false" class="collapsed">
                                          Price List (Air freight delivery)
                                          </a> 
                                       </h4>
                                    </div>
                                    <div id="collapsePurOne" class="panel-collapse collapse in">
                                       <div class="panel-body">
                                          <div
                                             class="vc_toggle_content">
                                             <table class="table table-striped">
                                                <tbody>
                                                   <tr>
                                                      <td></td>
                                                      <td>USA</td>
                                                      <td>UK</td>
                                                      <td>TURKEY</td>
                                                      <td>UAE</td>
                                                      <td>GERMANY</td>
                                                   </tr>
                                                   <tr>
                                                      <td>up to 1kg</td>
                                                      <td>$ 9.00(fixed)</td>
                                                      <td>$ 12.00(fixed)</td>
                                                      <td>$ 9.00(fixed)</td>
                                                      <td>$ 9.00(fixed)</td>
                                                      <td>$ 10.00(fixed)</td>
                                                   </tr>
                                                   <tr>
                                                      <td>1-10 kg</td>
                                                      <td>$ 9 per kilo</td>
                                                      <td>$ 12.00 per kilo</td>
                                                      <td>$ 9 per kilo</td>
                                                      <td>$ 9 per kilo</td>
                                                      <td>$ 10 per kilo</td>
                                                   </tr>
                                                   <tr>
                                                      <td>11-20 kg</td>
                                                      <td>$ 8.50 per kilo</td>
                                                      <td>$ 11.50 per kilo</td>
                                                      <td>$ 8.50 per kilo</td>
                                                      <td>$ 8.50 per kilo</td>
                                                      <td>$ 9.50 per kilo</td>
                                                   </tr>
                                                   <tr>
                                                      <td>21-30 kg</td>
                                                      <td>$ 8.00 per kilo</td>
                                                      <td>$ 11.00 per kilo</td>
                                                      <td>$ 8.50 per kilo</td>
                                                      <td>$ 8.50 per kilo</td>
                                                      <td>$ 9.00 per kilo</td>
                                                   </tr>
                                                   <tr>
                                                      <td>more than 30kg</td>
                                                      <td>$ 7.50 per kilo</td>
                                                      <td>$ 10.50 per kilo</td>
                                                      <td>$ 7.50 per kilo</td>
                                                      <td>$ 7.50 per kilo</td>
                                                      <td>$ 8.50 per kilo</td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="panel panel-purple panel-color">
                                    <div class="panel-heading">
                                       <h4 class="panel-title"> 
                                          <a data-toggle="collapse" data-parent="#accordion-payments" href="#collapsePurTwo" class="collapsed" aria-expanded="false">
                                          Price List (Road freight delivery)
                                          </a> 
                                       </h4>
                                    </div>
                                    <div id="collapsePurTwo" class="panel-collapse collapse ">
                                       <div class="panel-body">
                                          <div
                                             class="vc_toggle_content">
                                             <table class="table table-striped">
                                                <tbody>
                                                   <tr>
                                                      <td></td>
                                                      <td>TURKEY</td>
                                                      <td>GERMANY</td>
                                                   </tr>
                                                   <tr>
                                                      <td>up to 1kg</td>
                                                      <td>$ 4.00(fixed)</td>
                                                      <td>$ 5.00(fixed)</td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="panel panel-pink panel-color">
                                    <div class="panel-heading">
                                       <h4 class="panel-title"> 
                                          <a data-toggle="collapse" data-parent="#accordion-payments" href="#collapsePurThree" class="collapsed" aria-expanded="false">
                                          Where can I do my purchases?
                                          </a> 
                                       </h4>
                                    </div>
                                    <div id="collapsePurThree" class="panel-collapse collapse">
                                       <div class="panel-body">
                                          You can do your purchases in any e-shop. As well as you can send the private parcels through post to an address gotten in the member ledger
                                       </div>
                                    </div>
                                 </div>
                                 <div class="panel panel-warning panel-color">
                                    <div class="panel-heading">
                                       <h4 class="panel-title"> 
                                          <a data-toggle="collapse" data-parent="#accordion-payments" href="#collapsePurFour" class="collapsed" aria-expanded="false">
                                          How much does a “call a courier” service cost?
                                          </a> 
                                       </h4>
                                    </div>
                                    <div id="collapsePurFour" class="panel-collapse collapse">
                                       <div class="panel-body">
                                          City center - 2AZN
                                          Xirdalan/Sumqayit - 6 AZN
                                          Other parts of Baku - 4AZN
                                          Couriers operates twice a day at 10:00 and 14:30.
                                       </div>
                                    </div>
                                 </div>
                                 <div class="panel panel-success panel-color">
                                    <div class="panel-heading">
                                       <h4 class="panel-title"> 
                                          <a data-toggle="collapse" data-parent="#accordion-payments" href="#collapsePurFive" class="collapsed" aria-expanded="false">
                                          In which currency do you calculate cost of delivery?
                                          </a> 
                                       </h4>
                                    </div>
                                    <div id="collapsePurFive" class="panel-collapse collapse">
                                       <div class="panel-body">
                                          Payments are made in manats, but in relation to the US dollar exchange rate, because the payments with the foreign carriers are made in dollars.
                                          Often the small parcels are received in the very big packages.If you want to cut down the expenses and if your items are shatterproof then ask the sellers to pack the parcel as smaller in volume as possible in advance
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane" id="terms">
                               <div class="panel-group" id="accordion-terms"> 
                                    <div class="panel panel-info panel-color"> 
                                        <div class="panel-heading"> 
                                            <h4 class="panel-title"> 
                                                <a data-toggle="collapse" data-parent="#accordion-terms" href="#collapseTermOne" aria-expanded="false" class="collapsed">
How do you calculate the weight of delivery?
                                                </a> 
                                            </h4> 
                                        </div> 
                                        <div id="collapseTermOne" class="panel-collapse collapse in"> 
                                            <div class="panel-body">
                                             In air carriage, the weight of delivery is calculated in compliance with outside dimensions of the package.

Calculation is made according to the following formula: LENGTH (cm) X WIGHT (cm) X HEIGHT (cm) / 5000 — if a received value is less than gross weight of the parcel in kg, then a typical weight will be used. If the value is greater, then a weight by volume will be used. See calculator

The end formula appears like this: Delivery weight = MAX (Gross weight,Width * Length * Height) / 5000)
                                            </div> 
                                        </div> 
                                    </div>
                                    <div class="panel panel-purple panel-color"> 
                                        <div class="panel-heading"> 
                                            <h4 class="panel-title"> 
                                                <a data-toggle="collapse" data-parent="#accordion-terms" href="#collapseTermTwo" class="collapsed" aria-expanded="false">
                                                   What do you do in a case of delay of delivery?
                                                </a> 
                                            </h4> 
                                        </div> 
                                        <div id="collapseTermTwo" class="panel-collapse collapse "> 
                                            <div class="panel-body">
                                                If the parcel delays more than 14 days, the client should start to search it by using the detailed information. If the client couldn’t find the parcel, then all expenses of the client are covered not later than 30 days from the date of receipt of the parcel to our abroad warehouse.
                                            </div> 
                                        </div> 
                                    </div> 
                                    <div class="panel panel-pink panel-color"> 
                                        <div class="panel-heading"> 
                                            <h4 class="panel-title"> 
                                                <a data-toggle="collapse" data-parent="#accordion-terms" href="#collapseTermThree" class="collapsed" aria-expanded="false">
                                                    When the goods are considered being lost?
                                                </a> 
                                            </h4> 
                                        </div> 
                                        <div id="collapseTermThree" class="panel-collapse collapse"> 
                                            <div class="panel-body">
                                                On arrival of your purchase from an online shop to our storehouse, a receiving storehouse operator signs for receipt and from that point forward the parcel enters into our area of liability and can be tracked by using tracking. If we don’t receive the parcel in maximum period of 14 days, then all details should be informed; if the parcel isn’t found within 30 days, the expenses of the client will be covered.

WHAT SHOULD I DO IF THE GOODS ARE LOST?
WHERE CAN I DO MY PURCHASES?

                                            </div> 
                                        </div> 
                                    </div> 
                                     <div class="panel panel-success panel-color"> 
                                        <div class="panel-heading"> 
                                            <h4 class="panel-title"> 
                                                <a data-toggle="collapse" data-parent="#accordion-terms" href="#collapseTermFour" class="collapsed" aria-expanded="false">
                                                  
                                What should I do if the goods are lost?
                                                </a> 
                                            </h4> 
                                        </div> 
                                        <div id="collapseTermFour" class="panel-collapse collapse"> 
                                            <div class="panel-body">
                                                On arrival of your purchase from an online shop to our warehouse, a receiving warehouse operator signs for receipt and from that point forward the parcel enters into our area of liability and can be tracked by using tracking. If we do not receive the parcel in maximum period of 14 days, then all details should be informed; if the parcel is not found within 30 days, the expenses of the client will be covered.

                                            </div> 
                                        </div> 
                                    </div> 
                                     <div class="panel panel-warning panel-color"> 
                                        <div class="panel-heading"> 
                                            <h4 class="panel-title"> 
                                                <a data-toggle="collapse" data-parent="#accordion-terms" href="#collapseTermFive" class="collapsed" aria-expanded="false">
                              What time and where can I collect my order and what do I need to bring?
                                                </a> 
                                            </h4> 
                                        </div> 
                                        <div id="collapseTermFive" class="panel-collapse collapse"> 
                                            <div class="panel-body">
                                              You can collect your orders in our warehouse placed at Uzeyir Hacibeyov str.61b, Baku, Azerbaijan

                                            </div> 
                                        </div> 
                                    </div> 
                                </div> 




                           </div>
                           <div class="tab-pane" id="customs">
                              <div class="panel-group" id="accordion-customs">
                                 <div class="panel panel-info panel-color">
                                    <div class="panel-heading">
                                       <h4 class="panel-title"> 
                                          <a data-toggle="collapse" data-parent="#accordion-customs" href="#collapseCusOne" aria-expanded="false" class="collapsed">
                                          What is the duty free limit for imports?(Air freight delivery)?
                                          </a> 
                                       </h4>
                                    </div>
                                    <div id="collapseCusOne" class="panel-collapse collapse in">
                                       <div class="panel-body">
                                          a) Up to 1000$ for a month per person<br/>
                                          b) Up to 30 kg per an item<br/>
                                          Duty requirement should be paid for all goods, which will excess the given limits. Thus, you are kindly requested in advance to clarify a price of delivery for an order of the given type.
                                       </div>
                                    </div>
                                 </div>
                                 <div class="panel panel-pink panel-color">
                                    <div class="panel-heading">
                                       <h4 class="panel-title"> 
                                          <a data-toggle="collapse" data-parent="#accordion-customs" href="#collapseCusThree" class="collapsed" aria-expanded="false">
                                          What are prohibited goods?
                                          </a> 
                                       </h4>
                                    </div>
                                    <div id="collapseCusThree" class="panel-collapse collapse">
                                       <div class="panel-body">
                                          Prohibited articles list is very long, thus we are giving an example of the frequently asked questions
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane" id="other">
                              <div class="panel-group" id="accordion-other"> 
                                    <div class="panel panel-info panel-color"> 
                                        <div class="panel-heading"> 
                                            <h4 class="panel-title"> 
                                                <a data-toggle="collapse" data-parent="#accordion-other" href="#collapseOtherTermOne" aria-expanded="false" class="collapsed">
What is your office address?
                                                </a> 
                                            </h4> 
                                        </div> 
                                        <div id="collapseOtherTermOne" class="panel-collapse collapse in"> 
                                            <div class="panel-body">
                                            Uzeyir Hajibeyov Str. 61b (opposite of the Central Post Office)
                                            </div> 
                                        </div> 
                                    </div>
                                    <div class="panel panel-purple panel-color"> 
                                        <div class="panel-heading"> 
                                            <h4 class="panel-title"> 
                                                <a data-toggle="collapse" data-parent="#accordion-other" href="#collapseOtherTermTwo" class="collapsed" aria-expanded="false">
                                                 What are your company's phone numbers ?
                                                </a> 
                                            </h4> 
                                        </div> 
                                        <div id="collapseOtherTermTwo" class="panel-collapse collapse "> 
                                            <div class="panel-body">
                                               (+994 12)4973775  - ask ASEshopping<br/>

(+994 12)4973775 ext 10
                                            </div> 
                                        </div> 
                                    </div> 
                                    <div class="panel panel-pink panel-color"> 
                                        <div class="panel-heading"> 
                                            <h4 class="panel-title"> 
                                                <a data-toggle="collapse" data-parent="#accordion-other" href="#collapseOtherTermThree" class="collapsed" aria-expanded="false">
                                                    What is you office working hours?
                                                </a> 
                                            </h4> 
                                        </div> 
                                        <div id="collapseOtherTermThree" class="panel-collapse collapse"> 
                                            <div class="panel-body">
                                               Week days 9:00-18:00<br/>

Saturdays 9:00-14:00

                                            </div> 
                                        </div> 
                                    </div> 
                                     <div class="panel panel-success panel-color"> 
                                        <div class="panel-heading"> 
                                            <h4 class="panel-title"> 
                                                <a data-toggle="collapse" data-parent="#accordion-other" href="#collapseOtherTermFour" class="collapsed" aria-expanded="false">
                                                  
                                What should I do if the goods are lost?
                                                </a> 
                                            </h4> 
                                        </div> 
                                        <div id="collapseOtherTermFour" class="panel-collapse collapse"> 
                                            <div class="panel-body">
                                                On arrival of your purchase from an online shop to our warehouse, a receiving warehouse operator signs for receipt and from that point forward the parcel enters into our area of liability and can be tracked by using tracking. If we do not receive the parcel in maximum period of 14 days, then all details should be informed; if the parcel is not found within 30 days, the expenses of the client will be covered.

                                            </div> 
                                        </div> 
                                    </div> 
                                     <div class="panel panel-warning panel-color"> 
                                        <div class="panel-heading"> 
                                            <h4 class="panel-title"> 
                                                <a data-toggle="collapse" data-parent="#accordion-other" href="#collapseOtherTermFive" class="collapsed" aria-expanded="false">
                              What time and where can I collect my order and what do I need to bring?
                                                </a> 
                                            </h4> 
                                        </div> 
                                        <div id="collapseOtherTermFive" class="panel-collapse collapse"> 
                                            <div class="panel-body">
                                              You can collect your orders in our warehouse placed at Uzeyir Hacibeyov str.61b, Baku, Azerbaijan

                                            </div> 
                                        </div> 
                                    </div> 
                                </div> 




                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <footer class="footer text-right">
               2015-2016 © ASEshopping.
            </footer>
         </div>
        
<?php
include("footer.php");
?>