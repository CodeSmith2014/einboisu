<div class="modal fade" id="editClientModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Edit Client Information
				</h4>
			</div>
			<div class="modal-body no-padding">
				{{ Form::open(['id'=>'edit-modal-client', 'class'=>'smart-form', 'method'=>'PUT']) }}
					<fieldset>
						<div class="row">
							<section class="col col-xs-12 col-sm-8 col-md-8 col-lg-8">
								<label for="name" class="label">Company Name</label>
								@if ($errors->has('name'))		<label class="input state-error"> <i class="icon-append fa fa-university"></i>
								@else							<label class="input"> <i class="icon-append fa fa-university"></i>
								@endif
									{{ Form::text('name', null, ['id'=>'name', 'placeholder'=>'Company Name']) }}
								</label>
								@if ($errors->has('name')) <div class="note note-error">{{ $errors->first('name') }}</div> @endif
							</section>
							<section class="col col-xs-12 col-sm-4 col-md-4 col-lg-4">
								<label for="reg_no" class="label">Registration No.</label>
								@if ($errors->has('reg_no'))	<label class="input state-error"> <i class="icon-append fa fa-briefcase"></i>
								@else 							<label class="input"> <i class="icon-append fa fa-briefcase"></i>
								@endif
									{{ Form::text('reg_no', null, ['id'=>'reg_no', 'placeholder'=>'Registration No.']) }}
								</label>
								@if ($errors->has('reg_no')) <div class="note note-error">{{ $errors->first('reg_no') }}</div> @endif
							</section>
						</div>
						<div class="row">
							<section class="col col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<label for="office_no" class="label">Office No.</label>
								@if ($errors->has('office_no')) <label class="input state-error"> <i class="icon-append fa fa-phone"></i>
								@else 							<label class="input"> <i class="icon-append fa fa-phone"></i>
								@endif
									{{ Form::text('office_no', null, ['id'=>'office_no', 'type'=>'tel', 'placeholder'=>'Office Number', 'data-mask'=>'+(99) 9999 9999']) }}
								</label>
								@if ($errors->has('office_no')) <div class="note note-error">{{ $errors->first('office_no') }}</div> @endif
							</section>
							<section class="col col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<label for="fax_no" class="label">Fax No.</label>
								@if ($errors->has('fax_no'))	<label class="input state-error"> <i class="icon-append fa fa-fax"></i>
								@else 							<label class="input"> <i class="icon-append fa fa-fax"></i>
								@endif
									{{ Form::text('fax_no', null, ['id'=>'fax_no', 'type'=>'tel', 'placeholder'=>'Fax Number', 'data-mask'=>'+(99) 9999 9999']) }}
								</label>
								@if ($errors->has('fax_no')) <div class="note note-error">{{ $errors->first('fax_no') }}</div> @endif
							</section>
						</div>
					</fieldset>
					<fieldset>
						<section>
							<label for="address" class="label">Address</label>
							@if ($errors->has('address'))		<label class="textarea state-error">
							@else 								<label class="textarea">
							@endif
								{{ Form::textarea('address', null, ['id'=>'address', 'class'=>'custom-scroll', 'size'=>'1x3', 'placeholder'=>'Address']) }}
							</label>
							@if ($errors->has('address')) <div class="note note-error">{{ $errors->first('address') }}</div> @endif
						</section>
						<div class="row">
							<section class="col col-xs-12 col-sm-5 col-md-5 col-lg-5">
								<label for="country" class="label">Country</label>
								@if ($errors->has('country'))	<label class="select state-error">
								@else 							<label class="select">
								@endif
									<select name="country" id='country'>
										<option value="0" disabled="">Country</option>
										<option value="Aaland Islands">Aaland Islands</option>
										<option value="Afghanistan">Afghanistan</option>
										<option value="Albania">Albania</option>
										<option value="Algeria">Algeria</option>
										<option value="American Samoa">American Samoa</option>
										<option value="Andorra">Andorra</option>
										<option value="Angola">Angola</option>
										<option value="Anguilla">Anguilla</option>
										<option value="Antarctica">Antarctica</option>
										<option value="Antigua and Barbuda">Antigua and Barbuda</option>
										<option value="Argentina">Argentina</option>
										<option value="Armenia">Armenia</option>
										<option value="Aruba">Aruba</option>
										<option value="Australia">Australia</option>
										<option value="Austria">Austria</option>
										<option value="Azerbaijan">Azerbaijan</option>
										<option value="Bahamas">Bahamas</option>
										<option value="Bahrain">Bahrain</option>
										<option value="Bangladesh">Bangladesh</option>
										<option value="Barbados">Barbados</option>
										<option value="Belarus">Belarus</option>
										<option value="Belgium">Belgium</option>
										<option value="Belize">Belize</option>
										<option value="Benin">Benin</option>
										<option value="Bermuda">Bermuda</option>
										<option value="Bhutan">Bhutan</option>
										<option value="Bolivia">Bolivia</option>
										<option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
										<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
										<option value="Botswana">Botswana</option>
										<option value="Bouvet Island">Bouvet Island</option>
										<option value="Brazil">Brazil</option>
										<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
										<option value="Brunei Darussalam">Brunei Darussalam</option>
										<option value="Bulgaria">Bulgaria</option>
										<option value="Burkina Faso">Burkina Faso</option>
										<option value="Burundi">Burundi</option>
										<option value="Cambodia">Cambodia</option>
										<option value="Cameroon">Cameroon</option>
										<option value="Canada">Canada</option>
										<option value="Canary Islands">Canary Islands</option>
										<option value="Cape Verde">Cape Verde</option>
										<option value="Cayman Islands">Cayman Islands</option>
										<option value="Central African Republic">Central African Republic</option>
										<option value="Chad">Chad</option>
										<option value="Chile">Chile</option>
										<option value="China">China</option>
										<option value="Christmas Island">Christmas Island</option>
										<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
										<option value="Colombia">Colombia</option>
										<option value="Comoros">Comoros</option>
										<option value="Congo">Congo</option>
										<option value="Cook Islands">Cook Islands</option>
										<option value="Costa Rica">Costa Rica</option>
										<option value="Cote D'Ivoire">Cote D'Ivoire</option>
										<option value="Croatia">Croatia</option>
										<option value="Cuba">Cuba</option>
										<option value="Curacao">Curacao</option>
										<option value="Cyprus">Cyprus</option>
										<option value="Czech Republic">Czech Republic</option>
										<option value="Democratic Republic of Congo">Democratic Republic of Congo</option>
										<option value="Denmark">Denmark</option>
										<option value="Djibouti">Djibouti</option>
										<option value="Dominica">Dominica</option>
										<option value="Dominican Republic">Dominican Republic</option>
										<option value="East Timor">East Timor</option>
										<option value="Ecuador">Ecuador</option>
										<option value="Egypt">Egypt</option>
										<option value="El Salvador">El Salvador</option>
										<option value="Equatorial Guinea">Equatorial Guinea</option>
										<option value="Eritrea">Eritrea</option>
										<option value="Estonia">Estonia</option>
										<option value="Ethiopia">Ethiopia</option>
										<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
										<option value="Faroe Islands">Faroe Islands</option>
										<option value="Fiji">Fiji</option>
										<option value="Finland">Finland</option>
										<option value="France, skypolitan">France, skypolitan</option>
										<option value="French Guiana">French Guiana</option>
										<option value="French Polynesia">French Polynesia</option>
										<option value="French Southern Territories">French Southern Territories</option>
										<option value="FYROM">FYROM</option>
										<option value="Gabon">Gabon</option>
										<option value="Gambia">Gambia</option>
										<option value="Georgia">Georgia</option>
										<option value="Germany">Germany</option>
										<option value="Ghana">Ghana</option>
										<option value="Gibraltar">Gibraltar</option>
										<option value="Greece">Greece</option>
										<option value="Greenland">Greenland</option>
										<option value="Grenada">Grenada</option>
										<option value="Guadeloupe">Guadeloupe</option>
										<option value="Guam">Guam</option>
										<option value="Guatemala">Guatemala</option>
										<option value="Guernsey">Guernsey</option>
										<option value="Guinea">Guinea</option>
										<option value="Guinea-Bissau">Guinea-Bissau</option>
										<option value="Guyana">Guyana</option>
										<option value="Haiti">Haiti</option>
										<option value="Heard and Mc Donald Islands">Heard and Mc Donald Islands</option>
										<option value="Honduras">Honduras</option>
										<option value="Hong Kong">Hong Kong</option>
										<option value="Hungary">Hungary</option>
										<option value="Iceland">Iceland</option>
										<option value="India">India</option>
										<option value="Indonesia">Indonesia</option>
										<option value="Iran (Islamic Republic of)">Iran (Islamic Republic of)</option>
										<option value="Iraq">Iraq</option>
										<option value="Ireland">Ireland</option>
										<option value="Israel">Israel</option>
										<option value="Italy">Italy</option>
										<option value="Jamaica">Jamaica</option>
										<option value="Japan">Japan</option>
										<option value="Jersey">Jersey</option>
										<option value="Jordan">Jordan</option>
										<option value="Kazakhstan">Kazakhstan</option>
										<option value="Kenya">Kenya</option>
										<option value="Kiribati">Kiribati</option>
										<option value="Korea, Republic of">Korea, Republic of</option>
										<option value="Kuwait">Kuwait</option>
										<option value="Kyrgyzstan">Kyrgyzstan</option>
										<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
										<option value="Latvia">Latvia</option>
										<option value="Lebanon">Lebanon</option>
										<option value="Lesotho">Lesotho</option>
										<option value="Liberia">Liberia</option>
										<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
										<option value="Liechtenstein">Liechtenstein</option>
										<option value="Lithuania">Lithuania</option>
										<option value="Luxembourg">Luxembourg</option>
										<option value="Macau">Macau</option>
										<option value="Madagascar">Madagascar</option>
										<option value="Malawi">Malawi</option>
										<option value="Malaysia">Malaysia</option>
										<option value="Maldives">Maldives</option>
										<option value="Mali">Mali</option>
										<option value="Malta">Malta</option>
										<option value="Marshall Islands">Marshall Islands</option>
										<option value="Martinique">Martinique</option>
										<option value="Mauritania">Mauritania</option>
										<option value="Mauritius">Mauritius</option>
										<option value="Mayotte">Mayotte</option>
										<option value="Mexico">Mexico</option>
										<option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
										<option value="Moldova, Republic of">Moldova, Republic of</option>
										<option value="Monaco">Monaco</option>
										<option value="Mongolia">Mongolia</option>
										<option value="Montenegro">Montenegro</option>
										<option value="Montserrat">Montserrat</option>
										<option value="Morocco">Morocco</option>
										<option value="Mozambique">Mozambique</option>
										<option value="Myanmar">Myanmar</option>
										<option value="Namibia">Namibia</option>
										<option value="Nauru">Nauru</option>
										<option value="Nepal">Nepal</option>
										<option value="Netherlands">Netherlands</option>
										<option value="Netherlands Antilles">Netherlands Antilles</option>
										<option value="New Caledonia">New Caledonia</option>
										<option value="New Zealand">New Zealand</option>
										<option value="Nicaragua">Nicaragua</option>
										<option value="Niger">Niger</option>
										<option value="Nigeria">Nigeria</option>
										<option value="Niue">Niue</option>
										<option value="Norfolk Island">Norfolk Island</option>
										<option value="North Korea">North Korea</option>
										<option value="Northern Mariana Islands">Northern Mariana Islands</option>
										<option value="Norway">Norway</option>
										<option value="Oman">Oman</option>
										<option value="Pakistan">Pakistan</option>
										<option value="Palau">Palau</option>
										<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
										<option value="Panama">Panama</option>
										<option value="Papua New Guinea">Papua New Guinea</option>
										<option value="Paraguay">Paraguay</option>
										<option value="Peru">Peru</option>
										<option value="Philippines">Philippines</option>
										<option value="Pitcairn">Pitcairn</option>
										<option value="Poland">Poland</option>
										<option value="Portugal">Portugal</option>
										<option value="Puerto Rico">Puerto Rico</option>
										<option value="Qatar">Qatar</option>
										<option value="Reunion">Reunion</option>
										<option value="Romania">Romania</option>
										<option value="Russian Federation">Russian Federation</option>
										<option value="Rwanda">Rwanda</option>
										<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
										<option value="Saint Lucia">Saint Lucia</option>
										<option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
										<option value="Samoa">Samoa</option>
										<option value="San Marino">San Marino</option>
										<option value="Sao Tome and Principe">Sao Tome and Principe</option>
										<option value="Saudi Arabia">Saudi Arabia</option>
										<option value="Senegal">Senegal</option>
										<option value="Serbia">Serbia</option>
										<option value="Seychelles">Seychelles</option>
										<option value="Sierra Leone">Sierra Leone</option>
										<option value="Singapore">Singapore</option>
										<option value="Slovak Republic">Slovak Republic</option>
										<option value="Slovenia">Slovenia</option>
										<option value="Solomon Islands">Solomon Islands</option>
										<option value="Somalia">Somalia</option>
										<option value="South Africa">South Africa</option>
										<option value="South Georgia &amp; South Sandwich Islands">South Georgia &amp; South Sandwich Islands</option>
										<option value="South Sudan">South Sudan</option>
										<option value="Spain">Spain</option>
										<option value="Sri Lanka">Sri Lanka</option>
										<option value="St. Barthelemy">St. Barthelemy</option>
										<option value="St. Helena">St. Helena</option>
										<option value="St. Martin (French part)">St. Martin (French part)</option>
										<option value="St. Pierre and Miquelon">St. Pierre and Miquelon</option>
										<option value="Sudan">Sudan</option>
										<option value="Suriname">Suriname</option>
										<option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option>
										<option value="Swaziland">Swaziland</option>
										<option value="Sweden">Sweden</option>
										<option value="Switzerland">Switzerland</option>
										<option value="Syrian Arab Republic">Syrian Arab Republic</option>
										<option value="Taiwan">Taiwan</option>
										<option value="Tajikistan">Tajikistan</option>
										<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
										<option value="Thailand">Thailand</option>
										<option value="Togo">Togo</option>
										<option value="Tokelau">Tokelau</option>
										<option value="Tonga">Tonga</option>
										<option value="Trinidad and Tobago">Trinidad and Tobago</option>
										<option value="Tunisia">Tunisia</option>
										<option value="Turkey">Turkey</option>
										<option value="Turkmenistan">Turkmenistan</option>
										<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
										<option value="Tuvalu">Tuvalu</option>
										<option value="Uganda">Uganda</option>
										<option value="Ukraine">Ukraine</option>
										<option value="United Arab Emirates">United Arab Emirates</option>
										<option value="United Kingdom">United Kingdom</option>
										<option value="United States">United States</option>
										<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
										<option value="Uruguay">Uruguay</option>
										<option value="Uzbekistan">Uzbekistan</option>
										<option value="Vanuatu">Vanuatu</option>
										<option value="Vatican City State (Holy See)">Vatican City State (Holy See)</option>
										<option value="Venezuela">Venezuela</option>
										<option value="Viet Nam">Viet Nam</option>
										<option value="Virgin Islands (British)">Virgin Islands (British)</option>
										<option value="Virgin Islands (U.S.)">Virgin Islands (U.S.)</option>
										<option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
										<option value="Western Sahara">Western Sahara</option>
										<option value="Yemen">Yemen</option>
										<option value="Zambia">Zambia</option>
										<option value="Zimbabwe">Zimbabwe</option>
									</select>
									<i></i>
								</label>
								@if ($errors->has('country')) <div class="note note-error">{{ $errors->first('country') }}</div> @endif
							</section>
							<section class="col col-xs-12 col-sm-4 col-md-4 col-lg-4">
								<label for="city" class="label">City</label>
								@if ($errors->has('city'))		<label class="input state-error">
								@else 							<label class="input">
								@endif
									{{ Form::text('city', null, ['id'=>'city', 'placeholder'=>'City']) }}
								</label>
								@if ($errors->has('city')) <div class="note note-error">{{ $errors->first('city') }}</div> @endif
							</section>
							<section class="col col-xs-12 col-sm-3 col-md-3 col-lg-3">
								<label for="postal_code" class="label">Postal Code</label>
								@if ($errors->has('postal_code'))	<label class="input state-error">
								@else 								<label class="input">
								@endif
									{{ Form::text('postal_code', null, ['id'=>'postal_code', 'placeholder'=>'Postal Code']) }}
								</label>
								@if ($errors->has('postal_code')) <div class="note note-error">{{ $errors->first('postal_code') }}</div> @endif
							</section>
						</div>
						<section>
							<label for="notes" class="label">Notes</label>
							@if ($errors->has('notes'))			<label class="textarea state-error">
							@else 								<label class="textarea">
							@endif
								{{ Form::textarea('notes', null, ['id'=>'notes', 'class'=>'custom-scroll', 'size'=>'1x3', 'placeholder'=>'Additional Information']) }}
							</label>
							@if ($errors->has('notes')) <div class="note note-error">{{ $errors->first('notes') }}</div> @endif
						</section>
					</fieldset>
					<footer>
						<button type="submit" class="btn btn-primary">
							Update
						</button>
					</footer>
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>