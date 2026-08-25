<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Invoice</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
    .font{
      font-size: 15px;
    }
    .authority {
        /*text-align: center;*/
        float: right
    }
    .authority h5 {
        margin-top: -10px;
        color: green;
        /*text-align: center;*/
        margin-left: 35px;
    }
    .thanks p {
        color: green;;
        font-size: 16px;
        font-weight: normal;
        font-family: serif;
        margin-top: 20px;
    }
</style>

</head>
<body>

  <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
    <tr>
        <td valign="center">
          <!-- {{-- <img src="" alt="" width="150"/> --}} -->
          <img src="{{ public_path($logo->logo_image) }}" alt="" style="width: 100px;height:40px;margin-top:35px">
        </td>
        <td align="right">
            <p class="font" >
               Office Name...<br>
               Email:office@gmailbd.com <br>
               Mob: 1245454545 <br>
               Dhaka 1207,Dhanmondi:#4 <br>              
            </p>
        </td>
    </tr>

  </table>


  <table width="100%" style="background:white; padding:2px;"></table>

  <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
    <tr>
        <td>
          <p class="font" style="margin-left: 20px;">
            <img src="{{ public_path($enroll_data->photo) ?? null }}" alt="" style="width: 60px;height:60px;margin-top:10px;margin-bottom:10"> <br>
           <strong>Name:</strong> {{ $enroll_data->english_name ?? null }} <br>
           <strong>Roll:</strong> {{ $enroll_data->user->roll_no ?? null }} <br>
           <strong>Mobile:</strong> {{ $enroll_data->personal_mobile ?? null }} <br>
           <strong>Address:</strong> {{ $enroll_data->present_address ?? null }} <br>
           <strong>Course Name:</strong> {{ $enroll_data->service->service_title ?? null }} <br>
           <strong>Course Price:</strong> {{ $enroll_data->service->price ?? null }} <br>
           <strong>Enrol Date:</strong> {{ Carbon\Carbon::parse($enroll_data->created_at)->format('d M Y') ?? null }} <br>
           
         </p>
        </td>
        <td>
          
        </td>
    </tr>
  </table>
  <br/>



  <table width="100%">
    <thead style="background-color: green; color:#FFFFFF;">
      <tr class="font">
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th> </th>
      </tr>
    </thead>
    <tbody>

        
      <tr class="font">
        <td align="center">
            <img src="" alt="" style="width: 60px;height:60px">
        </td>
        <td align="center"></td>
        <td align="center">

        </td>
        <td align="center">
</td>
        <td align="center"></td>
        <td align="center"></td>
        <td align="center">
            
            <span></span>
           
        </td>
        <td align="center"></td>
      </tr>
     
    </tbody>
  </table>
  <br>
  <table width="100%" style=" padding:0 10px 0 10px;">
    <tr>
        <td align="right" >
            <h2><span style="color: green;"></span></h2>
            <h2><span style="color: green;"></span></h2>
            {{-- <h2><span style="color: green;">Full Payment PAID</h2> --}}
        </td>
    </tr>
  </table>
  <div class="thanks mt-3">
    <p>Thanks For Buying Products..!!</p>
  </div>
  <div class="authority float-right mt-5">
      <p>-----------------------------------</p>
      <h5>Authority Signature:</h5>
    </div>
</body>
</html>