<div class="modal fade" id="createNewCountry" tabindex="-1" role="dialog" aria-labelledby="createNewCountry-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createNewCountry-label">{{ __('Create Country') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('superadmin.settings.address.country.store') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-form-label">{{ __('Select Country') }} <sup class="required">*</sup></label>
                        <select class="select2-single form-control" name="name" id="name" required >
                            <option value="" aria-disabled="true" >{{ __('Select Country') }}</option>
                            <optgroup label="North America">
                                <option @if(is_country_exist('US')) disabled @endif value="US-United States">United States</option>
                                <option @if(is_country_exist('UM')) disabled @endif value="UM-United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                <option @if(is_country_exist('CA')) disabled @endif value="CA-Canada">Canada</option>
                                <option @if(is_country_exist('MX')) disabled @endif value="MX-Mexico">Mexico</option>
                                <option @if(is_country_exist('AI')) disabled @endif value="AI-Anguilla">Anguilla</option>
                                <option @if(is_country_exist('AG')) disabled @endif value="AG-Antigua and Barbuda">Antigua and Barbuda</option>
                                <option @if(is_country_exist('AW')) disabled @endif value="AW-Aruba">Aruba</option>
                                <option @if(is_country_exist('BS')) disabled @endif value="BS-Bahamas">Bahamas</option>
                                <option @if(is_country_exist('BB')) disabled @endif value="BB-Barbados">Barbados</option>
                                <option @if(is_country_exist('BZ')) disabled @endif value="BZ-Belize">Belize</option>
                                <option @if(is_country_exist('BM')) disabled @endif value="BM-Bermuda">Bermuda</option>
                                <option @if(is_country_exist('VG')) disabled @endif value="VG-British Virgin Islands">British Virgin Islands</option>
                                <option @if(is_country_exist('KY')) disabled @endif value="KY-Cayman Islands">Cayman Islands</option>
                                <option @if(is_country_exist('CR')) disabled @endif value="CR-Costa Rica">Costa Rica</option>
                                <option @if(is_country_exist('CU')) disabled @endif value="CU-Cuba">Cuba</option>
                                <option @if(is_country_exist('DM')) disabled @endif value="DM-Dominica">Dominica</option>
                                <option @if(is_country_exist('DO')) disabled @endif value="DO-Dominican Republic">Dominican Republic</option>
                                <option @if(is_country_exist('SV')) disabled @endif value="SV-El Salvador">El Salvador</option>
                                <option @if(is_country_exist('GD')) disabled @endif value="GD-Grenada">Grenada</option>
                                <option @if(is_country_exist('GP')) disabled @endif value="GP-Guadeloupe">Guadeloupe</option>
                                <option @if(is_country_exist('GT')) disabled @endif value="GT-Guatemala">Guatemala</option>
                                <option @if(is_country_exist('HT')) disabled @endif value="HT-Haiti">Haiti</option>
                                <option @if(is_country_exist('HN')) disabled @endif value="HN-Honduras">Honduras</option>
                                <option @if(is_country_exist('JM')) disabled @endif value="JM-Jamaica">Jamaica</option>
                                <option @if(is_country_exist('MQ')) disabled @endif value="MQ-Martinique">Martinique</option>
                                <option @if(is_country_exist('MS')) disabled @endif value="MS-Montserrat">Montserrat</option>
                                <option @if(is_country_exist('AN')) disabled @endif value="AN-Netherlands Antilles">Netherlands Antilles</option>
                                <option @if(is_country_exist('NI')) disabled @endif value="NI-Nicaragua">Nicaragua</option>
                                <option @if(is_country_exist('PA')) disabled @endif value="PA-Panama">Panama</option>
                                <option @if(is_country_exist('PR')) disabled @endif value="PR-Puerto Rico">Puerto Rico</option>
                                <option @if(is_country_exist('KN')) disabled @endif value="KN-Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                <option @if(is_country_exist('LC')) disabled @endif value="LC-Saint Lucia">Saint Lucia</option>
                                <option @if(is_country_exist('VC')) disabled @endif value="VC-Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                <option @if(is_country_exist('TT')) disabled @endif value="TT-Trinidad and Tobago">Trinidad and Tobago</option>
                                <option @if(is_country_exist('TC')) disabled @endif value="TC-Turks and Caicos Islands">Turks and Caicos Islands</option>
                                <option @if(is_country_exist('VI')) disabled @endif value="VI-US Virgin Islands">US Virgin Islands</option>
                            </optgroup>
                            <optgroup label="South America">
                                <option @if(is_country_exist('AR')) disabled @endif value="AR-Argentina">Argentina</option>
                                <option @if(is_country_exist('BO')) disabled @endif value="BO-Bolivia">Bolivia</option>
                                <option @if(is_country_exist('BR')) disabled @endif value="BR-Brazil">Brazil</option>
                                <option @if(is_country_exist('CL')) disabled @endif value="CL-Chile">Chile</option>
                                <option @if(is_country_exist('CO')) disabled @endif value="CO-Colombia">Colombia</option>
                                <option @if(is_country_exist('EC')) disabled @endif value="EC-Ecuador">Ecuador</option>
                                <option @if(is_country_exist('FK')) disabled @endif value="FK-Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                <option @if(is_country_exist('GF')) disabled @endif value="GF-French Guiana">French Guiana</option>
                                <option @if(is_country_exist('GY')) disabled @endif value="GY-Guyana">Guyana</option>
                                <option @if(is_country_exist('PY')) disabled @endif value="PY-Paraguay">Paraguay</option>
                                <option @if(is_country_exist('PE')) disabled @endif value="PE-Peru">Peru</option>
                                <option @if(is_country_exist('SR')) disabled @endif value="SR-Suriname">Suriname</option>
                                <option @if(is_country_exist('UY')) disabled @endif value="UY-Uruguay">Uruguay</option>
                                <option @if(is_country_exist('VE')) disabled @endif value="VE-Venezuela">Venezuela</option>
                            </optgroup>
                            <optgroup label="Europe">
                                <option @if(is_country_exist('GB')) disabled @endif value="GB-United Kingdom">United Kingdom</option>
                                <option @if(is_country_exist('AL')) disabled @endif value="AL-Albania">Albania</option>
                                <option @if(is_country_exist('AD')) disabled @endif value="AD-Andorra">Andorra</option>
                                <option @if(is_country_exist('AT')) disabled @endif value="AT-Austria">Austria</option>
                                <option @if(is_country_exist('BY')) disabled @endif value="BY-Belarus">Belarus</option>
                                <option @if(is_country_exist('BE')) disabled @endif value="BE-Belgium">Belgium</option>
                                <option @if(is_country_exist('BA')) disabled @endif value="BA-Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                <option @if(is_country_exist('BG')) disabled @endif value="BG-Bulgaria">Bulgaria</option>
                                <option @if(is_country_exist('HR')) disabled @endif value="HR-Croatia (Hrvatska)">Croatia (Hrvatska)</option>
                                <option @if(is_country_exist('CY')) disabled @endif value="CY-Cyprus">Cyprus</option>
                                <option @if(is_country_exist('CZ')) disabled @endif value="CZ-Czech Republic">Czech Republic</option>
                                <option @if(is_country_exist('FR')) disabled @endif value="FR-France">France</option>
                                <option @if(is_country_exist('GI')) disabled @endif value="GI-Gibraltar">Gibraltar</option>
                                <option @if(is_country_exist('DE')) disabled @endif value="DE-Germany">Germany</option>
                                <option @if(is_country_exist('GR')) disabled @endif value="GR-Greece">Greece</option>
                                <option @if(is_country_exist('VA')) disabled @endif value="VA-Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                <option @if(is_country_exist('HU')) disabled @endif value="HU-Hungary">Hungary</option>
                                <option @if(is_country_exist('IT')) disabled @endif value="IT-Italy">Italy</option>
                                <option @if(is_country_exist('LI')) disabled @endif value="LI-Liechtenstein">Liechtenstein</option>
                                <option @if(is_country_exist('LU')) disabled @endif value="LU-Luxembourg">Luxembourg</option>
                                <option @if(is_country_exist('MK')) disabled @endif value="MK-Macedonia">Macedonia</option>
                                <option @if(is_country_exist('MT')) disabled @endif value="MT-Malta">Malta</option>
                                <option @if(is_country_exist('MD')) disabled @endif value="MD-Moldova">Moldova</option>
                                <option @if(is_country_exist('MC')) disabled @endif value="MC-Monaco">Monaco</option>
                                <option @if(is_country_exist('ME')) disabled @endif value="ME-Montenegro">Montenegro</option>
                                <option @if(is_country_exist('NL')) disabled @endif value="NL-Netherlands">Netherlands</option>
                                <option @if(is_country_exist('PL')) disabled @endif value="PL-Poland">Poland</option>
                                <option @if(is_country_exist('PT')) disabled @endif value="PT-Portugal">Portugal</option>
                                <option @if(is_country_exist('RO')) disabled @endif value="RO-Romania">Romania</option>
                                <option @if(is_country_exist('SM')) disabled @endif value="SM-San Marino">San Marino</option>
                                <option @if(is_country_exist('RS')) disabled @endif value="RS-Serbia">Serbia</option>
                                <option @if(is_country_exist('SK')) disabled @endif value="SK-Slovakia">Slovakia</option>
                                <option @if(is_country_exist('SI')) disabled @endif value="SI-Slovenia">Slovenia</option>
                                <option @if(is_country_exist('ES')) disabled @endif value="ES-Spain">Spain</option>
                                <option @if(is_country_exist('UA')) disabled @endif value="UA-Ukraine">Ukraine</option>
                                <option @if(is_country_exist('DK')) disabled @endif value="DK-Denmark">Denmark</option>
                                <option @if(is_country_exist('EE')) disabled @endif value="EE-Estonia">Estonia</option>
                                <option @if(is_country_exist('FO')) disabled @endif value="FO-Faroe Islands">Faroe Islands</option>
                                <option @if(is_country_exist('FI')) disabled @endif value="FI-Finland">Finland</option>
                                <option @if(is_country_exist('GL')) disabled @endif value="GL-Greenland">Greenland</option>
                                <option @if(is_country_exist('IS')) disabled @endif value="IS-Iceland">Iceland</option>
                                <option @if(is_country_exist('IE')) disabled @endif value="IE-Ireland">Ireland</option>
                                <option @if(is_country_exist('LV')) disabled @endif value="LV-Latvia">Latvia</option>
                                <option @if(is_country_exist('LT')) disabled @endif value="LT-Lithuania">Lithuania</option>
                                <option @if(is_country_exist('NO')) disabled @endif value="NO-Norway">Norway</option>
                                <option @if(is_country_exist('SJ')) disabled @endif value="SJ-Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option>
                                <option @if(is_country_exist('SE')) disabled @endif value="SE-Sweden">Sweden</option>
                                <option @if(is_country_exist('CH')) disabled @endif value="CH-Switzerland">Switzerland</option>
                                <option @if(is_country_exist('TR')) disabled @endif value="TR-Turkey">Turkey</option>
                            </optgroup>
                            <optgroup label="Asia">
                                <option @if(is_country_exist('AF')) disabled @endif value="AF-Afghanistan">Afghanistan</option>
                                <option @if(is_country_exist('AM')) disabled @endif value="AM-Armenia">Armenia</option>
                                <option @if(is_country_exist('AZ')) disabled @endif value="AZ-Azerbaijan">Azerbaijan</option>
                                <option @if(is_country_exist('BH')) disabled @endif value="BH-Bahrain">Bahrain</option>
                                <option @if(is_country_exist('BD')) disabled @endif value="BD-Bangladesh">Bangladesh</option>
                                <option @if(is_country_exist('BT')) disabled @endif value="BT-Bhutan">Bhutan</option>
                                <option @if(is_country_exist('IO')) disabled @endif value="IO-British Indian Ocean Territory">British Indian Ocean Territory</option>
                                <option @if(is_country_exist('BN')) disabled @endif value="BN-Brunei Darussalam">Brunei Darussalam</option>
                                <option @if(is_country_exist('KH')) disabled @endif value="KH-Cambodia">Cambodia</option>
                                <option @if(is_country_exist('CN')) disabled @endif value="CN-China">China</option>
                                <option @if(is_country_exist('CX')) disabled @endif value="CX-Christmas Island">Christmas Island</option>
                                <option @if(is_country_exist('CC')) disabled @endif value="CC-Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                <option @if(is_country_exist('GE')) disabled @endif value="GE-Georgia">Georgia</option>
                                <option @if(is_country_exist('HK')) disabled @endif value="HK-Hong Kong">Hong Kong</option>
                                <option @if(is_country_exist('IN')) disabled @endif value="IN-India">India</option>
                                <option @if(is_country_exist('ID')) disabled @endif value="ID-Indonesia">Indonesia</option>
                                <option @if(is_country_exist('IR')) disabled @endif value="IR-Iran">Iran</option>
                                <option @if(is_country_exist('IQ')) disabled @endif value="IQ-Iraq">Iraq</option>
                                <option @if(is_country_exist('IL')) disabled @endif value="IL-Israel">Israel</option>
                                <option @if(is_country_exist('JP')) disabled @endif value="JP-Japan">Japan</option>
                                <option @if(is_country_exist('JO')) disabled @endif value="JO-Jordan">Jordan</option>
                                <option @if(is_country_exist('KZ')) disabled @endif value="KZ-Kazakhstan">Kazakhstan</option>
                                <option @if(is_country_exist('KP')) disabled @endif value="KP-Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                <option @if(is_country_exist('KR')) disabled @endif value="KR-Korea, Republic of">Korea, Republic of</option>
                                <option @if(is_country_exist('KW')) disabled @endif value="KW-Kuwait">Kuwait</option>
                                <option @if(is_country_exist('KG')) disabled @endif value="KG-Kyrgyzstan">Kyrgyzstan</option>
                                <option @if(is_country_exist('LA')) disabled @endif value="LA-Lao">Lao</option>
                                <option @if(is_country_exist('LB')) disabled @endif value="LB-Lebanon">Lebanon</option>
                                <option @if(is_country_exist('MY')) disabled @endif value="MY-Malaysia">Malaysia</option>
                                <option @if(is_country_exist('MV')) disabled @endif value="MV-Maldives">Maldives</option>
                                <option @if(is_country_exist('MN')) disabled @endif value="MN-Mongolia">Mongolia</option>
                                <option @if(is_country_exist('MM')) disabled @endif value="MM-Myanmar (Burma)">Myanmar (Burma)</option>
                                <option @if(is_country_exist('NP')) disabled @endif value="NP-Nepal">Nepal</option>
                                <option @if(is_country_exist('OM')) disabled @endif value="OM-Oman">Oman</option>
                                <option @if(is_country_exist('PK')) disabled @endif value="PK-Pakistan">Pakistan</option>
                                <option @if(is_country_exist('PH')) disabled @endif value="PH-Philippines">Philippines</option>
                                <option @if(is_country_exist('QA')) disabled @endif value="QA-Qatar">Qatar</option>
                                <option @if(is_country_exist('RU')) disabled @endif value="RU-Russian Federation">Russian Federation</option>
                                <option @if(is_country_exist('SA')) disabled @endif value="SA-Saudi Arabia">Saudi Arabia</option>
                                <option @if(is_country_exist('SG')) disabled @endif value="SG-Singapore">Singapore</option>
                                <option @if(is_country_exist('LK')) disabled @endif value="LK-Sri Lanka">Sri Lanka</option>
                                <option @if(is_country_exist('SY')) disabled @endif value="SY-Syria">Syria</option>
                                <option @if(is_country_exist('TW')) disabled @endif value="TW-Taiwan">Taiwan</option>
                                <option @if(is_country_exist('TJ')) disabled @endif value="TJ-Tajikistan">Tajikistan</option>
                                <option @if(is_country_exist('TH')) disabled @endif value="TH-Thailand">Thailand</option>
                                <option @if(is_country_exist('TP')) disabled @endif value="TP-East Timor">East Timor</option>
                                <option @if(is_country_exist('TM')) disabled @endif value="TM-Turkmenistan">Turkmenistan</option>
                                <option @if(is_country_exist('AE')) disabled @endif value="AE-United Arab Emirates">United Arab Emirates</option>
                                <option @if(is_country_exist('UZ')) disabled @endif value="UZ-Uzbekistan">Uzbekistan</option>
                                <option @if(is_country_exist('VN')) disabled @endif value="VN-Vietnam">Vietnam</option>
                                <option @if(is_country_exist('YE')) disabled @endif value="YE-Yemen">Yemen</option>
                            </optgroup>
                            <optgroup label="Australia / Oceania">
                                <option @if(is_country_exist('AS')) disabled @endif value="AS-American Samoa">American Samoa</option>
                                <option @if(is_country_exist('AU')) disabled @endif value="AU-Australia">Australia</option>
                                <option @if(is_country_exist('CK')) disabled @endif value="CK-Cook Islands">Cook Islands</option>
                                <option @if(is_country_exist('FJ')) disabled @endif value="FJ-Fiji">Fiji</option>
                                <option @if(is_country_exist('PF')) disabled @endif value="PF-French Polynesia (Tahiti)">French Polynesia (Tahiti)</option>
                                <option @if(is_country_exist('GU')) disabled @endif value="GU-Guam">Guam</option>
                                <option @if(is_country_exist('KB')) disabled @endif value="KB-Kiribati">Kiribati</option>
                                <option @if(is_country_exist('MH')) disabled @endif value="MH-Marshall Islands">Marshall Islands</option>
                                <option @if(is_country_exist('FM')) disabled @endif value="FM-Micronesia, Federated States of">Micronesia, Federated States of</option>
                                <option @if(is_country_exist('NR')) disabled @endif value="NR-Nauru">Nauru</option>
                                <option @if(is_country_exist('NC')) disabled @endif value="NC-New Caledonia">New Caledonia</option>
                                <option @if(is_country_exist('NZ')) disabled @endif value="NZ-New Zealand">New Zealand</option>
                                <option @if(is_country_exist('NU')) disabled @endif value="NU-Niue">Niue</option>
                                <option @if(is_country_exist('MP')) disabled @endif value="MP-Northern Mariana Islands">Northern Mariana Islands</option>
                                <option @if(is_country_exist('PW')) disabled @endif value="PW-Palau">Palau</option>
                                <option @if(is_country_exist('PG')) disabled @endif value="PG-Papua New Guinea">Papua New Guinea</option>
                                <option @if(is_country_exist('PN')) disabled @endif value="PN-Pitcairn">Pitcairn</option>
                                <option @if(is_country_exist('WS')) disabled @endif value="WS-Samoa">Samoa</option>
                                <option @if(is_country_exist('SB')) disabled @endif value="SB-Solomon Islands">Solomon Islands</option>
                                <option @if(is_country_exist('TK')) disabled @endif value="TK-Tokelau">Tokelau</option>
                                <option @if(is_country_exist('TO')) disabled @endif value="TO-Tonga">Tonga</option>
                                <option @if(is_country_exist('TV')) disabled @endif value="TV-Tuvalu">Tuvalu</option>
                                <option @if(is_country_exist('VU')) disabled @endif value="VU-Vanuatu">Vanuatu</option>
                                <option valud="WF">Wallis and Futuna Islands</option>
                            </optgroup>
                            <optgroup label="Africa">
                                <option @if(is_country_exist('DZ')) disabled @endif value="DZ-Algeria">Algeria</option>
                                <option @if(is_country_exist('AO')) disabled @endif value="AO-Angola">Angola</option>
                                <option @if(is_country_exist('BJ')) disabled @endif value="BJ-Benin">Benin</option>
                                <option @if(is_country_exist('BW')) disabled @endif value="BW-Botswana">Botswana</option>
                                <option @if(is_country_exist('BF')) disabled @endif value="BF-Burkina Faso">Burkina Faso</option>
                                <option @if(is_country_exist('BI')) disabled @endif value="BI-Burundi">Burundi</option>
                                <option @if(is_country_exist('CM')) disabled @endif value="CM-Cameroon">Cameroon</option>
                                <option @if(is_country_exist('CV')) disabled @endif value="CV-Cape Verde">Cape Verde</option>
                                <option @if(is_country_exist('CF')) disabled @endif value="CF-Central African Republic">Central African Republic</option>
                                <option @if(is_country_exist('TD')) disabled @endif value="TD-Chad">Chad</option>
                                <option @if(is_country_exist('KM')) disabled @endif value="KM-Comoros">Comoros</option>
                                <option @if(is_country_exist('CG')) disabled @endif value="CG-Congo">Congo</option>
                                <option @if(is_country_exist('CD')) disabled @endif value="CD-Congo, the Democratic Republic of the">Congo, the Democratic Republic of the</option>
                                <option @if(is_country_exist('DJ')) disabled @endif value="DJ-Dijibouti">Dijibouti</option>
                                <option @if(is_country_exist('EG')) disabled @endif value="EG-Egypt">Egypt</option>
                                <option @if(is_country_exist('GQ')) disabled @endif value="GQ-Equatorial Guinea">Equatorial Guinea</option>
                                <option @if(is_country_exist('ER')) disabled @endif value="ER-Eritrea">Eritrea</option>
                                <option @if(is_country_exist('ET')) disabled @endif value="ET-Ethiopia">Ethiopia</option>
                                <option @if(is_country_exist('GA')) disabled @endif value="GA-Gabon">Gabon</option>
                                <option @if(is_country_exist('GM')) disabled @endif value="GM-Gambia">Gambia</option>
                                <option @if(is_country_exist('GH')) disabled @endif value="GH-Ghana">Ghana</option>
                                <option @if(is_country_exist('GN')) disabled @endif value="GN-Guinea">Guinea</option>
                                <option @if(is_country_exist('GW')) disabled @endif value="GW-Guinea-Bissau">Guinea-Bissau</option>
                                <option @if(is_country_exist('CI')) disabled @endif value="CI-Cote d'Ivoire (Ivory Coast)">Cote d'Ivoire (Ivory Coast)</option>
                                <option @if(is_country_exist('KE')) disabled @endif value="KE-Kenya">Kenya</option>
                                <option @if(is_country_exist('LS')) disabled @endif value="LS-Lesotho">Lesotho</option>
                                <option @if(is_country_exist('LR')) disabled @endif value="LR-Liberia">Liberia</option>
                                <option @if(is_country_exist('LY')) disabled @endif value="LY-Libya">Libya</option>
                                <option @if(is_country_exist('MG')) disabled @endif value="MG-Madagascar">Madagascar</option>
                                <option @if(is_country_exist('MW')) disabled @endif value="MW-Malawi">Malawi</option>
                                <option @if(is_country_exist('ML')) disabled @endif value="ML-Mali">Mali</option>
                                <option @if(is_country_exist('MR')) disabled @endif value="MR-Mauritania">Mauritania</option>
                                <option @if(is_country_exist('MU')) disabled @endif value="MU-Mauritius">Mauritius</option>
                                <option @if(is_country_exist('YT')) disabled @endif value="YT-Mayotte">Mayotte</option>
                                <option @if(is_country_exist('MA')) disabled @endif value="MA-Morocco">Morocco</option>
                                <option @if(is_country_exist('MZ')) disabled @endif value="MZ-Mozambique">Mozambique</option>
                                <option @if(is_country_exist('NA')) disabled @endif value="NA-Namibia">Namibia</option>
                                <option @if(is_country_exist('NE')) disabled @endif value="NE-Niger">Niger</option>
                                <option @if(is_country_exist('NG')) disabled @endif value="NG-Nigeria">Nigeria</option>
                                <option @if(is_country_exist('RE')) disabled @endif value="RE-Reunion">Reunion</option>
                                <option @if(is_country_exist('RW')) disabled @endif value="RW-Rwanda">Rwanda</option>
                                <option @if(is_country_exist('ST')) disabled @endif value="ST-Sao Tome and Principe">Sao Tome and Principe</option>
                                <option @if(is_country_exist('SH')) disabled @endif value="SH-Saint Helena">Saint Helena</option>
                                <option @if(is_country_exist('SN')) disabled @endif value="SN-Senegal">Senegal</option>
                                <option @if(is_country_exist('SC')) disabled @endif value="SC-Seychelles">Seychelles</option>
                                <option @if(is_country_exist('SL')) disabled @endif value="SL-Sierra Leone">Sierra Leone</option>
                                <option @if(is_country_exist('SO')) disabled @endif value="SO-Somalia">Somalia</option>
                                <option @if(is_country_exist('ZA')) disabled @endif value="ZA-South Africa">South Africa</option>
                                <option @if(is_country_exist('SS')) disabled @endif value="SS-South Sudan">South Sudan</option>
                                <option @if(is_country_exist('SD')) disabled @endif value="SD-Sudan">Sudan</option>
                                <option @if(is_country_exist('SZ')) disabled @endif value="SZ-Swaziland">Swaziland</option>
                                <option @if(is_country_exist('TZ')) disabled @endif value="TZ-Tanzania">Tanzania</option>
                                <option @if(is_country_exist('TG')) disabled @endif value="TG-Togo">Togo</option>
                                <option @if(is_country_exist('TN')) disabled @endif value="TN-Tunisia">Tunisia</option>
                                <option @if(is_country_exist('UG')) disabled @endif value="UG-Uganda">Uganda</option>
                                <option @if(is_country_exist('EH')) disabled @endif value="EH-Western Sahara">Western Sahara</option>
                                <option @if(is_country_exist('ZM')) disabled @endif value="ZM-Zambia">Zambia</option>
                                <option @if(is_country_exist('ZW')) disabled @endif value="ZW-Zimbabwe">Zimbabwe</option>
                            </optgroup>
                            <option @if(is_country_exist('AQ')) disabled @endif value="AQ-Antarctica">Antarctica</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="note" class="col-form-label">{{ __('Why This Country?') }} <sup class="required">*</sup></label>
                        <textarea class="form-control" maxlength="500" name="note" id="note" placeholder="Why You Should Choose This Country? *" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="flag" class="col-form-label">{{ __('Country Flag') }} <sup class="required">*</sup></label>
                        <input class="form-control" type="file" name="flag" id="flag" placeholder="Why You Should Choose This Country? *" required  accept="jpeg/jpg"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom">{{ __('Assign Country') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
