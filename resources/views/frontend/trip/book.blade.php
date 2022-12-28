@extends('frontend.layouts.app')

@section('content')

    <!--Breadcrumb-->
    <section class="bannerimg banner-1 cover-image pt-9 pb-10 sptb-tab bg-background2" data-image-src="{{asset('assets/images/Travel&tours/mountains-6043079_1920.jpg')}}">
        <div class="header-text mb-0">
            <div class="container">
                <div class="row text-white">
                    <div class="col"><h1 class="">{{$package->name}}</h1></div>
                    <div class="col col-auto">
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Plan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--/Breadcrumb-->
    <section class="bg-white">
        <div class="container">
            <div class="row ">
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="card-header ">
                            <h3 class="card-title">Book Now</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h4 class="text-primary">Trip Detail</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label text-dark">Trip Name</label>
                                        <input class="form-control" value="{{$package->name}}" type="text" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label text-dark">From</label>
                                        <input class="form-control fc-datepicker" placeholder="Tour Start Date" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label text-dark">To</label>
                                        <input class="form-control fc-datepicker" placeholder="Tour End Date" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label text-dark">Adults</label>
                                        <select class="form-control custom-select select2">
                                            <option value="0">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label text-dark">Children</label>
                                        <select class="form-control custom-select select2">
                                            <option value="0">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h4 class="text-primary">Personal Information</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" placeholder="your@email.com">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="form-label">Contact Number</label>
                                        <input type="tel" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label text-dark">Country</label>
                                        <select class="form-control select2" data-placeholder="Choose Browser">
                                            <option value="UM" selected="selected">United States of America</option>
                                            <option value="AF">Afghanistan</option>
                                            <option value="AL">Albania</option>
                                            <option value="AD">Andorra</option>
                                            <option value="AG">Antigua and Barbuda</option>
                                            <option value="AU">Australia</option>
                                            <option value="AM">Armenia</option>
                                            <option value="AO">Angola</option>
                                            <option value="AR">Argentina</option>
                                            <option value="AT">Austria</option>
                                            <option value="AZ">Azerbaijan</option>
                                            <option value="BA">Bosnia and Herzegovina</option>
                                            <option value="BB">Barbados</option>
                                            <option value="BD">Bangladesh</option>
                                            <option value="BE">Belgium</option>
                                            <option value="BF">Burkina Faso</option>
                                            <option value="BG">Bulgaria</option>
                                            <option value="BH">Bahrain</option>
                                            <option value="BJ">Benin</option>
                                            <option value="BN">Brunei</option>
                                            <option value="BO">Bolivia</option>
                                            <option value="BT">Bhutan</option>
                                            <option value="BY">Belarus</option>
                                            <option value="CD">Congo</option>
                                            <option value="CA">Canada</option>
                                            <option value="CF">Central African Republic</option>
                                            <option value="CI">Cote d'Ivoire</option>
                                            <option value="CL">Chile</option>
                                            <option value="CM">Cameroon</option>
                                            <option value="CN">China</option>
                                            <option value="CO">Colombia</option>
                                            <option value="CU">Cuba</option>
                                            <option value="CV">Cabo Verde</option>
                                            <option value="CY">Cyprus</option>
                                            <option value="DJ">Djibouti</option>
                                            <option value="DK">Denmark</option>
                                            <option value="DM">Dominica</option>
                                            <option value="DO">Dominican Republic</option>
                                            <option value="EC">Ecuador</option>
                                            <option value="EE">Estonia</option>
                                            <option value="ER">Eritrea</option>
                                            <option value="ET">Ethiopia</option>
                                            <option value="FI">Finland</option>
                                            <option value="FJ">Fiji</option>
                                            <option value="FR">France</option>
                                            <option value="GA">Gabon</option>
                                            <option value="GD">Grenada</option>
                                            <option value="GE">Georgia</option>
                                            <option value="GH">Ghana</option>
                                            <option value="GH">Ghana</option>
                                            <option value="HN">Honduras</option>
                                            <option value="HT">Haiti</option>
                                            <option value="HU">Hungary</option>
                                            <option value="ID">Indonesia</option>
                                            <option value="IE">Ireland</option>
                                            <option value="IL">Israel</option>
                                            <option value="IN">India</option>
                                            <option value="IQ">Iraq</option>
                                            <option value="IR">Iran</option>
                                            <option value="IS">Iceland</option>
                                            <option value="IT">Italy</option>
                                            <option value="JM">Jamaica</option>
                                            <option value="JO">Jordan</option>
                                            <option value="JP">Japan</option>
                                            <option value="KE">Kenya</option>
                                            <option value="KG">Kyrgyzstan</option>
                                            <option value="KI">Kiribati</option>
                                            <option value="KW">Kuwait</option>
                                            <option value="KZ">Kazakhstan</option>
                                            <option value="LA">Laos</option>
                                            <option value="LB">Lebanons</option>
                                            <option value="LI">Liechtenstein</option>
                                            <option value="LR">Liberia</option>
                                            <option value="LS">Lesotho</option>
                                            <option value="LT">Lithuania</option>
                                            <option value="LU">Luxembourg</option>
                                            <option value="LV">Latvia</option>
                                            <option value="LY">Libya</option>
                                            <option value="MA">Morocco</option>
                                            <option value="MC">Monaco</option>
                                            <option value="MD">Moldova</option>
                                            <option value="ME">Montenegro</option>
                                            <option value="MG">Madagascar</option>
                                            <option value="MH">Marshall Islands</option>
                                            <option value="MK">Macedonia (FYROM)</option>
                                            <option value="ML">Mali</option>
                                            <option value="MM">Myanmar (formerly Burma)</option>
                                            <option value="MN">Mongolia</option>
                                            <option value="MR">Mauritania</option>
                                            <option value="MT">Malta</option>
                                            <option value="MV">Maldives</option>
                                            <option value="MW">Malawi</option>
                                            <option value="MX">Mexico</option>
                                            <option value="MZ">Mozambique</option>
                                            <option value="NA">Namibia</option>
                                            <option value="NG">Nigeria</option>
                                            <option value="NO">Norway</option>
                                            <option value="NP">Nepal</option>
                                            <option value="NR">Nauru</option>
                                            <option value="NZ">New Zealand</option>
                                            <option value="OM">Oman</option>
                                            <option value="PA">Panama</option>
                                            <option value="PF">Paraguay</option>
                                            <option value="PG">Papua New Guinea</option>
                                            <option value="PH">Philippines</option>
                                            <option value="PK">Pakistan</option>
                                            <option value="PL">Poland</option>
                                            <option value="QA">Qatar</option>
                                            <option value="RO">Romania</option>
                                            <option value="RU">Russia</option>
                                            <option value="RW">Rwanda</option>
                                            <option value="SA">Saudi Arabia</option>
                                            <option value="SB">Solomon Islands</option>
                                            <option value="SC">Seychelles</option>
                                            <option value="SD">Sudan</option>
                                            <option value="SE">Sweden</option>
                                            <option value="SG">Singapore</option>
                                            <option value="TG">Togo</option>
                                            <option value="TH">Thailand</option>
                                            <option value="TJ">Tajikistan</option>
                                            <option value="TL">Timor-Leste</option>
                                            <option value="TM">Turkmenistan</option>
                                            <option value="TN">Tunisia</option>
                                            <option value="TO">Tonga</option>
                                            <option value="TR">Turkey</option>
                                            <option value="TT">Trinidad and Tobago</option>
                                            <option value="TW">Taiwan</option>
                                            <option value="UA">Ukraine</option>
                                            <option value="UG">Uganda</option>
                                            <option value="UY">Uruguay</option>
                                            <option value="UZ">Uzbekistan</option>
                                            <option value="VA">Vatican City (Holy See)</option>
                                            <option value="VE">Venezuela</option>
                                            <option value="VN">Vietnam</option>
                                            <option value="VU">Vanuatu</option>
                                            <option value="YE">Yemen</option>
                                            <option value="ZM">Zambia</option>
                                            <option value="ZW">Zimbabwe</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label text-dark">State</label>
                                        <select class="form-control select2" data-placeholder="Choose Browser">
                                            <option value="UM">United States of America</option>
                                            <option value="AF">Afghanistan</option>
                                            <option value="AL">Albania</option>
                                            <option value="AD">Andorra</option>
                                            <option value="AG">Antigua and Barbuda</option>
                                            <option value="AU">Australia</option>
                                            <option value="AM" selected="selected">Armenia</option>
                                            <option value="AO">Angola</option>
                                            <option value="AR">Argentina</option>
                                            <option value="AT">Austria</option>
                                            <option value="AZ">Azerbaijan</option>
                                            <option value="BA">Bosnia and Herzegovina</option>
                                            <option value="BB">Barbados</option>
                                            <option value="BD">Bangladesh</option>
                                            <option value="BE">Belgium</option>
                                            <option value="BF">Burkina Faso</option>
                                            <option value="BG">Bulgaria</option>
                                            <option value="BH">Bahrain</option>
                                            <option value="BJ">Benin</option>
                                            <option value="BN">Brunei</option>
                                            <option value="BO">Bolivia</option>
                                            <option value="BT">Bhutan</option>
                                            <option value="BY">Belarus</option>
                                            <option value="CD">Congo</option>
                                            <option value="CA">Canada</option>
                                            <option value="CF">Central African Republic</option>
                                            <option value="CI">Cote d'Ivoire</option>
                                            <option value="CL">Chile</option>
                                            <option value="CM">Cameroon</option>
                                            <option value="CN">China</option>
                                            <option value="CO">Colombia</option>
                                            <option value="CU">Cuba</option>
                                            <option value="CV">Cabo Verde</option>
                                            <option value="CY">Cyprus</option>
                                            <option value="DJ">Djibouti</option>
                                            <option value="DK">Denmark</option>
                                            <option value="DM">Dominica</option>
                                            <option value="DO">Dominican Republic</option>
                                            <option value="EC">Ecuador</option>
                                            <option value="EE">Estonia</option>
                                            <option value="ER">Eritrea</option>
                                            <option value="ET">Ethiopia</option>
                                            <option value="FI">Finland</option>
                                            <option value="FJ">Fiji</option>
                                            <option value="FR">France</option>
                                            <option value="GA">Gabon</option>
                                            <option value="GD">Grenada</option>
                                            <option value="GE">Georgia</option>
                                            <option value="GH">Ghana</option>
                                            <option value="GH">Ghana</option>
                                            <option value="HN">Honduras</option>
                                            <option value="HT">Haiti</option>
                                            <option value="HU">Hungary</option>
                                            <option value="ID">Indonesia</option>
                                            <option value="IE">Ireland</option>
                                            <option value="IL">Israel</option>
                                            <option value="IN">India</option>
                                            <option value="IQ">Iraq</option>
                                            <option value="IR">Iran</option>
                                            <option value="IS">Iceland</option>
                                            <option value="IT">Italy</option>
                                            <option value="JM">Jamaica</option>
                                            <option value="JO">Jordan</option>
                                            <option value="JP">Japan</option>
                                            <option value="KE">Kenya</option>
                                            <option value="KG">Kyrgyzstan</option>
                                            <option value="KI">Kiribati</option>
                                            <option value="KW">Kuwait</option>
                                            <option value="KZ">Kazakhstan</option>
                                            <option value="LA">Laos</option>
                                            <option value="LB">Lebanons</option>
                                            <option value="LI">Liechtenstein</option>
                                            <option value="LR">Liberia</option>
                                            <option value="LS">Lesotho</option>
                                            <option value="LT">Lithuania</option>
                                            <option value="LU">Luxembourg</option>
                                            <option value="LV">Latvia</option>
                                            <option value="LY">Libya</option>
                                            <option value="MA">Morocco</option>
                                            <option value="MC">Monaco</option>
                                            <option value="MD">Moldova</option>
                                            <option value="ME">Montenegro</option>
                                            <option value="MG">Madagascar</option>
                                            <option value="MH">Marshall Islands</option>
                                            <option value="MK">Macedonia (FYROM)</option>
                                            <option value="ML">Mali</option>
                                            <option value="MM">Myanmar (formerly Burma)</option>
                                            <option value="MN">Mongolia</option>
                                            <option value="MR">Mauritania</option>
                                            <option value="MT">Malta</option>
                                            <option value="MV">Maldives</option>
                                            <option value="MW">Malawi</option>
                                            <option value="MX">Mexico</option>
                                            <option value="MZ">Mozambique</option>
                                            <option value="NA">Namibia</option>
                                            <option value="NG">Nigeria</option>
                                            <option value="NO">Norway</option>
                                            <option value="NP">Nepal</option>
                                            <option value="NR">Nauru</option>
                                            <option value="NZ">New Zealand</option>
                                            <option value="OM">Oman</option>
                                            <option value="PA">Panama</option>
                                            <option value="PF">Paraguay</option>
                                            <option value="PG">Papua New Guinea</option>
                                            <option value="PH">Philippines</option>
                                            <option value="PK">Pakistan</option>
                                            <option value="PL">Poland</option>
                                            <option value="QA">Qatar</option>
                                            <option value="RO">Romania</option>
                                            <option value="RU">Russia</option>
                                            <option value="RW">Rwanda</option>
                                            <option value="SA">Saudi Arabia</option>
                                            <option value="SB">Solomon Islands</option>
                                            <option value="SC">Seychelles</option>
                                            <option value="SD">Sudan</option>
                                            <option value="SE">Sweden</option>
                                            <option value="SG">Singapore</option>
                                            <option value="TG">Togo</option>
                                            <option value="TH">Thailand</option>
                                            <option value="TJ">Tajikistan</option>
                                            <option value="TL">Timor-Leste</option>
                                            <option value="TM">Turkmenistan</option>
                                            <option value="TN">Tunisia</option>
                                            <option value="TO">Tonga</option>
                                            <option value="TR">Turkey</option>
                                            <option value="TT">Trinidad and Tobago</option>
                                            <option value="TW">Taiwan</option>
                                            <option value="UA">Ukraine</option>
                                            <option value="UG">Uganda</option>
                                            <option value="UY">Uruguay</option>
                                            <option value="UZ">Uzbekistan</option>
                                            <option value="VA">Vatican City (Holy See)</option>
                                            <option value="VE">Venezuela</option>
                                            <option value="VN">Vietnam</option>
                                            <option value="VU">Vanuatu</option>
                                            <option value="YE">Yemen</option>
                                            <option value="ZM">Zambia</option>
                                            <option value="ZW">Zimbabwe</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <div class="form-group">
                                        <label class="form-label text-dark">City</label>
                                        <select class="form-control select2" data-placeholder="Choose Browser">
                                            <option value="UM">United States of America</option>
                                            <option value="AF">Afghanistan</option>
                                            <option value="AL">Albania</option>
                                            <option value="AD">Andorra</option>
                                            <option value="AG">Antigua and Barbuda</option>
                                            <option value="AU">Australia</option>
                                            <option value="AM">Armenia</option>
                                            <option value="AO">Angola</option>
                                            <option value="AR">Argentina</option>
                                            <option value="AT">Austria</option>
                                            <option value="AZ">Azerbaijan</option>
                                            <option value="BA">Bosnia and Herzegovina</option>
                                            <option value="BB">Barbados</option>
                                            <option value="BD">Bangladesh</option>
                                            <option value="BE" selected="selected">Belgium</option>
                                            <option value="BF">Burkina Faso</option>
                                            <option value="BG">Bulgaria</option>
                                            <option value="BH">Bahrain</option>
                                            <option value="BJ">Benin</option>
                                            <option value="BN">Brunei</option>
                                            <option value="BO">Bolivia</option>
                                            <option value="BT">Bhutan</option>
                                            <option value="BY">Belarus</option>
                                            <option value="CD">Congo</option>
                                            <option value="CA">Canada</option>
                                            <option value="CF">Central African Republic</option>
                                            <option value="CI">Cote d'Ivoire</option>
                                            <option value="CL">Chile</option>
                                            <option value="CM">Cameroon</option>
                                            <option value="CN">China</option>
                                            <option value="CO">Colombia</option>
                                            <option value="CU">Cuba</option>
                                            <option value="CV">Cabo Verde</option>
                                            <option value="CY">Cyprus</option>
                                            <option value="DJ">Djibouti</option>
                                            <option value="DK">Denmark</option>
                                            <option value="DM">Dominica</option>
                                            <option value="DO">Dominican Republic</option>
                                            <option value="EC">Ecuador</option>
                                            <option value="EE">Estonia</option>
                                            <option value="ER">Eritrea</option>
                                            <option value="ET">Ethiopia</option>
                                            <option value="FI">Finland</option>
                                            <option value="FJ">Fiji</option>
                                            <option value="FR">France</option>
                                            <option value="GA">Gabon</option>
                                            <option value="GD">Grenada</option>
                                            <option value="GE">Georgia</option>
                                            <option value="GH">Ghana</option>
                                            <option value="GH">Ghana</option>
                                            <option value="HN">Honduras</option>
                                            <option value="HT">Haiti</option>
                                            <option value="HU">Hungary</option>
                                            <option value="ID">Indonesia</option>
                                            <option value="IE">Ireland</option>
                                            <option value="IL">Israel</option>
                                            <option value="IN">India</option>
                                            <option value="IQ">Iraq</option>
                                            <option value="IR">Iran</option>
                                            <option value="IS">Iceland</option>
                                            <option value="IT">Italy</option>
                                            <option value="JM">Jamaica</option>
                                            <option value="JO">Jordan</option>
                                            <option value="JP">Japan</option>
                                            <option value="KE">Kenya</option>
                                            <option value="KG">Kyrgyzstan</option>
                                            <option value="KI">Kiribati</option>
                                            <option value="KW">Kuwait</option>
                                            <option value="KZ">Kazakhstan</option>
                                            <option value="LA">Laos</option>
                                            <option value="LB">Lebanons</option>
                                            <option value="LI">Liechtenstein</option>
                                            <option value="LR">Liberia</option>
                                            <option value="LS">Lesotho</option>
                                            <option value="LT">Lithuania</option>
                                            <option value="LU">Luxembourg</option>
                                            <option value="LV">Latvia</option>
                                            <option value="LY">Libya</option>
                                            <option value="MA">Morocco</option>
                                            <option value="MC">Monaco</option>
                                            <option value="MD">Moldova</option>
                                            <option value="ME">Montenegro</option>
                                            <option value="MG">Madagascar</option>
                                            <option value="MH">Marshall Islands</option>
                                            <option value="MK">Macedonia (FYROM)</option>
                                            <option value="ML">Mali</option>
                                            <option value="MM">Myanmar (formerly Burma)</option>
                                            <option value="MN">Mongolia</option>
                                            <option value="MR">Mauritania</option>
                                            <option value="MT">Malta</option>
                                            <option value="MV">Maldives</option>
                                            <option value="MW">Malawi</option>
                                            <option value="MX">Mexico</option>
                                            <option value="MZ">Mozambique</option>
                                            <option value="NA">Namibia</option>
                                            <option value="NG">Nigeria</option>
                                            <option value="NO">Norway</option>
                                            <option value="NP">Nepal</option>
                                            <option value="NR">Nauru</option>
                                            <option value="NZ">New Zealand</option>
                                            <option value="OM">Oman</option>
                                            <option value="PA">Panama</option>
                                            <option value="PF">Paraguay</option>
                                            <option value="PG">Papua New Guinea</option>
                                            <option value="PH">Philippines</option>
                                            <option value="PK">Pakistan</option>
                                            <option value="PL">Poland</option>
                                            <option value="QA">Qatar</option>
                                            <option value="RO">Romania</option>
                                            <option value="RU">Russia</option>
                                            <option value="RW">Rwanda</option>
                                            <option value="SA">Saudi Arabia</option>
                                            <option value="SB">Solomon Islands</option>
                                            <option value="SC">Seychelles</option>
                                            <option value="SD">Sudan</option>
                                            <option value="SE">Sweden</option>
                                            <option value="SG">Singapore</option>
                                            <option value="TG">Togo</option>
                                            <option value="TH">Thailand</option>
                                            <option value="TJ">Tajikistan</option>
                                            <option value="TL">Timor-Leste</option>
                                            <option value="TM">Turkmenistan</option>
                                            <option value="TN">Tunisia</option>
                                            <option value="TO">Tonga</option>
                                            <option value="TR">Turkey</option>
                                            <option value="TT">Trinidad and Tobago</option>
                                            <option value="TW">Taiwan</option>
                                            <option value="UA">Ukraine</option>
                                            <option value="UG">Uganda</option>
                                            <option value="UY">Uruguay</option>
                                            <option value="UZ">Uzbekistan</option>
                                            <option value="VA">Vatican City (Holy See)</option>
                                            <option value="VE">Venezuela</option>
                                            <option value="VN">Vietnam</option>
                                            <option value="VU">Vanuatu</option>
                                            <option value="YE">Yemen</option>
                                            <option value="ZM">Zambia</option>
                                            <option value="ZW">Zimbabwe</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h4 class="text-primary">Payment Method</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="form-label">Mode of Payment</label>
                                        <select name="" id="payment_method_dropdown" class="form-control">
                                            <option value="#" selected disabled>Choose your payment method</option>
                                            <option value="Paypal" selected>Paypal</option>
                                            <option value="Cash">Cash</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="paypal-div">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <h6 class="font-weight-semibold">Paypal is easiest way to pay online</h6>
                                    <p><a href="#" class="btn btn-default"><i class="fa fa-paypal"></i> Log in my Paypal</a></p>
                                    <p class="mb-0"><strong>Note:</strong> Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="float-right mb-5 mb-lg-0">
                        <a href="#" class="btn  btn-primary">Book Now</a>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="row mt-2">
                        <div class="col-lg-12 col-12">
                            <div class="card about-card pb-2">
                                <div class="card-header about-card-header bg-primary">
                                    <h3 class="text-white text-center">Best Deals</h3>
                                </div>
                                <div class="card-body about-card-body">
                                    <ul class="about-list">
                                        <li><a href="tour-detail.html"><i class="fa fa-angle-double-right mr-2 text-secondary"></i>Similar Category 1</a></li>
                                        <li><a href="tour-detail.html"><i class="fa fa-angle-double-right mr-2 text-secondary"></i>Similar Category 2</a></li>
                                        <li><a href="tour-detail.html"><i class="fa fa-angle-double-right mr-2 text-secondary"></i>Similar Category 3</a></li>
                                        <li><a href="tour-detail.html"><i class="fa fa-angle-double-right mr-2 text-secondary"></i>Similar Category 4</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <div class="card about-card pb-2">
                                <div class="card-header about-card-header bg-primary">
                                    <h3 class="text-white text-center">Popular Tours</h3>
                                </div>
                                <div class="card-body about-card-body">
                                    <ul class="about-list">
                                        <li><a href="tour-detail.html"><i class="fa fa-angle-double-right mr-2 text-secondary"></i>Annapurna Base Camp</a></li>
                                        <li><a href="tour-detail.html"><i class="fa fa-angle-double-right mr-2 text-secondary"></i>Kanyam Illam</a></li>
                                        <li><a href="tour-detail.html"><i class="fa fa-angle-double-right mr-2 text-secondary"></i>Bardiya National Park</a></li>
                                        <li><a href="tour-detail.html"><i class="fa fa-angle-double-right mr-2 text-secondary"></i>Shey-Phoksundo Lake</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

