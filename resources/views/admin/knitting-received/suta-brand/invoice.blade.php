<!DOCTYPE html>
<html lang="en, id">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
     Isha Fashion Making Send Invoice 
    </title>

  </head>
  <style>

* {
  margin: 0 auto;
  padding: 0 auto;
  user-select: none;
}

body {
  padding: 20px;

}

.wrapper-invoice {
  display: flex;
  justify-content: center;
}
.wrapper-invoice .invoice {
  height: auto;
  background: #fff;
  padding: 5vh;
  /* padding: 30px; */
  margin-top: 5vh;
  max-width: 110vh;
  width: 100%;
  box-sizing: border-box;
  /* border: 1px solid #eee; */
  box-shadow: 0 0 10px rgb(0 0 0 / 15%);
  /* border: 1px solid #dcdcdc; */
}
.wrapper-invoice .invoice .invoice-information {
  float: right;
  text-align: right;
}
.wrapper-invoice .invoice .invoice-information b {
  color: "#0F172A";
}
.wrapper-invoice .invoice .invoice-information p {
  font-size: 2vh;
  color: gray;
}
.wrapper-invoice .invoice .invoice-logo-brand h2 {
  text-transform: uppercase;
  font-size: 2.9vh;
  color: #0F172A;
}
.wrapper-invoice .invoice .invoice-logo-brand img {
  max-width: 100px;
  width: 100%;
  /* object-fit: fill; */
}
.wrapper-invoice .invoice .invoice-head {
  /* display: flex; */
  overflow: hidden;
  margin-top: 35px;
}
.wrapper-invoice .invoice .invoice-head .head {
  /* width: 100%; */
  box-sizing: border-box;
}
.wrapper-invoice .invoice .invoice-head .client-info {
  text-align: left;
  float: left !important;
}
.wrapper-invoice .invoice .invoice-head .client-info h2 {
  font-weight: 500;
  letter-spacing: 0.3px;
  font-size: 2vh;
  color: "#0F172A";
}
.wrapper-invoice .invoice .invoice-head .client-info p {
  font-size: 2vh;
  color: gray;
}
.wrapper-invoice .invoice .invoice-head .client-data {
  text-align: right;
}
.wrapper-invoice .invoice .invoice-head .client-data h2 {
  font-weight: 500;
  letter-spacing: 0.3px;
  font-size: 2vh;
  float: left !important;
  color: "#0F172A";
}
.wrapper-invoice .invoice .invoice-head .client-data p {
  font-size: 2vh;
  color: gray;
}
.wrapper-invoice .invoice .invoice-body {
  margin-top:25px;
}
.wrapper-invoice .invoice .invoice-body .table {
  border-collapse: collapse;
  width: 100%;

}
.wrapper-invoice .invoice .invoice-body .table thead tr th {
  font-size: 2vh;
  /* border: 1px solid #dcdcdc; */
  text-align: left;
  padding: 1vh;
  padding-left: 3px;
  padding: 5px;
  background-color: #eeeeee;
}
.wrapper-invoice .invoice .invoice-body .table tbody tr td {
  font-size: 2vh;
  border: 1px solid #dcdcdc;
  text-align: left;
  padding: 5px;
  background-color: #fff;
}

.wrapper-invoice .invoice .invoice-body .flex-table {
  display: flex;
}
.wrapper-invoice .invoice .invoice-body .flex-table .flex-column {
  width: 100%;
  box-sizing: border-box;
}
.wrapper-invoice .invoice .invoice-body .flex-table .flex-column .table-subtotal {
  border-collapse: collapse;
  box-sizing: border-box;
  width: 100%;
  margin-top: 2vh;
}
.wrapper-invoice .invoice .invoice-body .flex-table .flex-column .table-subtotal tbody tr td {
  font-size: 2vh;
  border-bottom: 1px solid #dcdcdc;
  text-align: left;
  padding: 1vh;
  background-color: #fff;
}
.wrapper-invoice .invoice .invoice-body .flex-table .flex-column .table-subtotal tbody tr td:nth-child(2) {
  text-align: right;
}
.wrapper-invoice .invoice .invoice-body .invoice-total-amount {
  margin-top: 1rem;
}
.wrapper-invoice .invoice .invoice-body .invoice-total-amount p {
  font-weight: bold;
  color: "#0F172A";
  text-align: right;
  font-size: 2vh;
}
.wrapper-invoice .invoice .invoice-footer {
  margin-top: 4vh;
}
.wrapper-invoice .invoice .invoice-footer p {
  font-size: 1.7vh;
  color: gray;
}

.copyright {
  margin-top: 2rem;
  text-align: center;
}
.copyright p {
  color: gray;
  font-size: 1.8vh;
}

@media print {
  .table thead tr th {
    -webkit-print-color-adjust: exact;
    background-color: #eeeeee !important;
  }

  .copyright {
    display: none;
  }
}
.rtl {
  direction: rtl;
  font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
}
.rtl .invoice-information {
  /* float: left !important; */
  text-align: left !important;
}
.rtl .invoice-head .client-info {
  text-align: right !important;
}
.rtl .invoice-head .client-data {
  text-align: left !important;
}
/* .rtl .invoice-head .invoice-head-right {
  /* text-align: right !important; */
/* } */ */
.rtl .invoice-body .table thead tr th {
  text-align: right !important;
}
.rtl .invoice-body .table tbody tr td {
  text-align: right !important;
}
.rtl .invoice-body .table tbody tr td:nth-child(2) {
  text-align: left !important;
}
.rtl .invoice-body .flex-table .flex-column .table-subtotal tbody tr td {
  text-align: right !important;
}
.rtl .invoice-body .flex-table .flex-column .table-subtotal tbody tr td:nth-child(2) {
  text-align: left !important;
}
.rtl .invoice-body .invoice-total-amount p {
  text-align: left !important;
}
</style>
  <body>
    <section class="wrapper-invoice">
      <!-- switch mode rtl by adding class rtl on invoice class -->
      <div class="invoice">
        <div class="invoice-information">
          <p class="text-uppercase" style="font-size: 22px;"> <b >Chalan Id</b> : #{{ App\Models\KnittingReceivedSutaBrand::find($knitting_received_sutabrand_id)->send_chalan_id }}</p>
          <p><b>Date </b>: {{ App\Models\KnittingReceivedSutaBrand::find($knitting_received_sutabrand_id)->date}}</p>

        </div>
        <!-- logo brand invoice -->
        <div class="invoice-logo-brand">
          <!-- <h2>Tampsh.</h2> -->
          {{-- <img src="https://bitbirds.com/web/wp-content/uploads/2021/11/bitBirds-white-logo.png" alt="" /> --}}
		   <h2 style="color: #6c757d;; font-size: 18px;"><strong>Isa Fashion</strong></h2>
        </div>
        <!-- invoice head -->
        <div class="invoice-head">
          <div class="head client-info">
            <p>IshaFashion, Inc.</p>
            <p>Email: isafashion@gmail.com</p>
            <p>Phone: 01921797982</p>
            <p>Address: Dhaka,Bangladesh</p>
          </div>

          <div class="head client-data">

            <p>Mohammad Sahrullah</p>
            <p>Email: demo@gmail.com</p>
            <p>Phone: 01921797982</p>
            <p>Address: Dhaka,Bangladesh</p>
          </div>
        </div>
        <!-- invoice body-->
        <div class="invoice-body">
            <table class="table" style="width:100%;margin-top:20px;">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Company Name</th>
                    <th>Date</th>
                    <th>Suta Name</th>
                    <th>Brand</th>
                    <th>Kapor</th>
                    <th>Weight</th>
                    <th>Carton</th>
                    <th>Rate</th>

                  </tr>
                </thead>
                {{-- {{dd($all_suta_brand)}} --}}
    
                  @foreach (App\Models\KnittingReceivedSutaBrand::find($knitting_received_sutabrand_id)->get() as $key=>$knitting_received_sutabrand)   
                    <tbody>
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$knitting_received_sutabrand->rel_to_company->company_name}}</td>
                            <td>{{$knitting_received_sutabrand->date}}</td>
                            <td>{{$knitting_received_sutabrand->rel_to_suta->suta_name}}</td>
                            <td>{{$knitting_received_sutabrand->rel_to_brand->brand_name}}</td>
                            <td>{{$knitting_received_sutabrand->rel_to_kapor->kapor_name}}</td>
                            <td>{{$knitting_received_sutabrand->weight}}</td>
                            <td>{{$knitting_received_sutabrand->cartoon}}</td>
                            <td>{{$knitting_received_sutabrand->rate}}</td>
                        </tr>                                   
                    </tbody>
                 @endforeach
    
              </table>
        </div>
        <!-- invoice footer -->
        {{-- <div class="invoice-footer">
          <p>Thankyou, happy shopping again</p>
        </div> --}}
      </div>
    </section>
    <div class="copyright">
      <p>Created by - Isa Fashion</p>
    </div>
  </body>
</html>