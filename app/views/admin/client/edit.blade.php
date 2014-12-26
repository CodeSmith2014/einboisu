@extends('admin.master')

@section('title')
@parent
- Clients
@stop

@section('breadcrumb')
@parent
<li>Clients</li>
@stop

@section('page_title_icon')
female
@stop

@section('page_title')
Edit Client Company
@stop

@section('page_title_right')
<a href="{{URL::route('clients.index')}}" class="btn btn-danger btn-lg pull-right header-btn hidden-mobile"><i class="fa fa-circle-arrow-up fa-lg"></i>Back</a>
<a data-toggle="modal" href="#addContactModal" class="btn btn-primary btn-lg pull-right header-btn hidden-mobile" style="margin-right:10px;"><i class="fa fa-plus fa-lg"></i> Add Contact</a>
@stop

@section('modals')
<div class="modal fade" id="addContactModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Add New Contact
				</h4>
			</div>
			<div class="modal-body no-padding">
				<form id="smart-form-register" class="smart-form" action="{{URL::route('contacts.store')}}" method="post">
					<fieldset>
						<section>
							<label class="input"> <i class="icon-append fa fa-user"></i>
								<input type="text" name="name" placeholder="Name" id="name">
								<input type="hidden" name="client_id" value="{{$client->id}}" id="client-id">
							</label>
						</section>

						<section>
							<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
								<input type="text" name="email" placeholder="Email" id="email">
							</label>
						</section>

						<section>
							<label class="input"> <i class="icon-append fa fa-phone"></i>
								<input type="text" name="mobile_no" placeholder="Mobile Number" id="mobile">
							</label>
						</section>
					</fieldset>

					<footer>
						<button type="submit" class="btn btn-primary">
							Add Contact
						</button>
					</footer>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="editContactModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Edit Contact Information
				</h4>
			</div>
			<div class="modal-body no-padding">
				{{ Form::open(array('class'=>'smart-form','method'=>'PUT','id'=>'editContactModalForm')) }}
				<fieldset>

					<section>
						<label class="input"> <i class="icon-append fa fa-user"></i>
							<input type="text" name="name" id="editContactModalFormName" placeholder="Name">
							<input type="hidden" name="client_id" value="{{$client->id}}">
						</label>
					</section>

					<section>
						<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
							<input type="text" name="email" id="editContactModalFormEmail" placeholder="Email">
						</label>
					</section>

					<section>
						<label class="input"> <i class="icon-append fa fa-phone"></i>
							<input type="text" name="mobile_no" id="editContactModalFormMobile" placeholder="Mobile Number">
						</label>
					</section>

				</fieldset>
				<footer>
					<button type="submit" class="btn btn-primary">
						Edit Contact
					</button>
				</footer>
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="removeContactModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Remove Contact from Client
				</h4>
			</div>
			<div class="modal-body">
				Confirm?
			</div>
			{{ Form::open(array('id'=>'confirm-remove-form','class'=>'smart-form','method'=>'DELETE')) }}
			<footer>
				<input type="hidden" name="client_id" value="{{$client->id}}">
				<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
					Cancel
				</button>
				<button type="submit" class="btn btn-danger">
					Remove
				</button>
			</footer>
			{{Form::close()}}
		</div>
	</div>
</div>

<div class="modal fade" id="setDefaultContactModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Set Default Contact Personnel
				</h4>
			</div>
			<div class="modal-body">
				Confirm?
			</div>
			{{ Form::open(array('id'=>'editContactModalForm','class'=>'smart-form','method'=>'POST', 'route' => 'client.set.default.contact')) }}
			<footer>
				<input type="hidden" name="client_id" value="{{$client->id}}">
				<input type="hidden" name="contact_id" id="set-contact-id">
				<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
					Cancel
				</button>
				<button type="submit" class="btn btn-primary">
					Set Default
				</button>
			</footer>
			{{Form::close()}}
		</div>
	</div>
</div>
@stop

@section('content')
<div class="row">
	<article class="col-sm-12 col-md-12 col-lg-12">
		@if($errors->count() > 0)
		<div class="alert alert-block alert-danger">
			<ul>
				@foreach($errors->all() as $message)
				<li>{{$message}}</li>
				@endforeach
			</ul>
		</div>
		@endif
	</article>
</div>
<section id="widget-grid" class="">
	<div class="row">
		<article class="col-sm-12 col-md-12 col-lg-6">
			<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					@if(!empty($client->name))
					<h2>{{$client->name}}</h2>				
					@endif
				</header>

				<div>

					<div class="jarviswidget-editbox">

					</div>
					<div class="widget-body">
						{{ Form::open(array('class'=>'smart-form','id'=>'company-form','method'=>'PUT', 'url'=> URL::route("clients.update",array($client->id)))) }}
						<form id="company-form" class="smart-form" novalidate="novalidate">
							<fieldset>
								<div class="row">
									<section class="col col-8">
										<label class="input"> <i class="icon-prepend fa fa-university"></i>
											@if(!empty($client->name))
											<input type="text" name="name" value="{{$client->name}}">
											@else
											<input type="text" name="name" placeholder="Company Name">
											@endif
										</label>
									</section>
									<section class="col col-4">
										<label class="input"> <i class="icon-prepend fa fa-briefcase"></i>
											@if(!empty($client->reg_no))
											<input type="text" name="reg_no" value="{{$client->reg_no}}">
											@else
											<input type="text" name="reg_no" placeholder="Registration No.">
											@endif
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-6">
										<label class="input"> <i class="icon-prepend fa fa-phone"></i>
											@if(!empty($client->office_no))
											<input type="text" name="office_no" value="{{$client->office_no}}">
											@else
											<input type="tel" name="office_no" placeholder="Phone">
											@endif
										</label>
									</section>
									<section class="col col-6">
										<label class="input"> <i class="icon-prepend fa fa-fax"></i>
											@if(!empty($client->fax_no))
											<input type="text" name="fax_no" value="{{$client->fax_no}}">
											@else
											<input type="tel" name="fax_no" placeholder="Fax">
											@endif
										</label>
									</section>
								</div>
							</fieldset>

							<fieldset>
								<section>
									<label for="address2" class="input">
										@if(!empty($client->address))
										<input type="text" name="address" id="address" value="{{$client->address}}">
										@else
										<input type="text" name="address" id="address" placeholder="Address">
										@endif
									</label>
								</section>
								<div class="row">
									<section class="col col-5">
										<label class="select">
											<select name="country">
												<option value="0"disabled="">Country</option>
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
												@if(strcmp($client->country,"Singapore")==0)
												<option value="Singapore" selected="">Singapore</option>
												@else
												<option value="Singapore">Singapore</option>
												@endif
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
											</select> <i></i>
										</label>
									</section>

									<section class="col col-4">
										<label class="input">
											@if(!empty($client->city))
											<input type="text" name="city" value="{{$client->city}}">
											@else
											<input type="text" name="city" placeholder="City">
											@endif
										</label>
									</section>

									<section class="col col-3">
										<label class="input">
											@if(!empty($client->postal_code))
											<input type="text" name="postal_code" value="{{$client->postal_code}}">
											@else
											<input type="text" name="postal_code" placeholder="Postal Code">
											@endif							
										</label>
									</section>
								</div>

								<section>
									<label class="textarea">
										@if(!empty($client->notes))
										<textarea rows="3" name="notes" placeholder="Additional info">{{$client->notes}}</textarea> 
										@else
										<textarea rows="3" name="notes" placeholder="Additional info"></textarea> 
										@endif					

									</label>
								</section>
							</fieldset>
							<footer>
								<button type="submit" class="btn btn-primary">
									Edit Client Information
								</button>
							</footer>
							{{Form::close()}}
						</div>
					</div>
				</div>
			</article>

			<article class="col-sm-12 col-md-12 col-lg-6">
				<div class="jarviswidget" id="wid-id-3" data-widget-editbutton="false" data-widget-custombutton="false">

					<header>
						<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
						<h2>Contact Personnel</h2>

					</header>

					<div>
						<div class="jarviswidget-editbox">

						</div>
						<div class="widget-body">
							<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
								<thead>			                
									<tr>
										<th>Name</th>
										<th data-hide="phone"><i class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i> Phone</th>
										<th data-hide="phone,tablet"><i class="fa fa-fw fa-envelope-o hidden-md hidden-sm hidden-xs"></i> Address</th>
										<th><i class="fa fa-fw fa-cog hidden-md hidden-sm hidden-xs"></i> Actions</th>
									</tr>
								</thead>
								<tbody>
									@foreach($contacts as $contact)
									<tr>
										<td>{{$contact->name}}</td> 
										<td>{{$contact->mobile_no}}</td>
										<td>{{$contact->email}}</td>
										<td>
											<a data-toggle="modal" class="edit-modal" data-id="{{$contact->id}}" data-name="{{$contact->name}}" data-email="{{$contact->email}}" data-mobileno="{{$contact->mobile_no}}" href="#editContactModal" title="Edit {{$contact->name}}" >
												<button class="btn btn-xs btn-default">
													<i class="fa fa-pencil"></i>
												</button>
											</a>

											<a data-toggle="modal" class="confirm-remove" data-id="{{$contact->id}}" href="#removeContactModal" title="Remove {{$contact->name}} from {{$client->name}}" >
												<button class="btn btn-xs btn-default">
													<i class="fa fa-times"></i>
												</button>
											</a>
										</td>
									</tr>	
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</article>
		</div>
	</section>
	@stop

	@section('page_scripts')
	{{HTML::script("/assets/js/plugin/jquery-form/jquery-form.min.js");}}
	{{HTML::script("/assets/js/plugin/datatables/jquery.dataTables.min.js");}}
	{{HTML::script("/assets/js/plugin/datatables/dataTables.colVis.min.js");}}
	{{HTML::script("/assets/js/plugin/datatables/dataTables.tableTools.min.js");}}
	{{HTML::script("/assets/js/plugin/datatables/dataTables.bootstrap.min.js");}}
	{{HTML::script("/assets/js/plugin/datatable-responsive/datatables.responsive.min.js");}}
	@stop

<!-- 
	request: 	request object with a single term property.
				value currently in the text input.

	response:	expects a single argument: the data suggest to the user.

	complete:	a callback function to run when the request is complete.
				the function receives the raw request object and the text status of the request.

	data:		data to be sent to server. this can be either be an object or a query string.

	json:		evaluate the response as json and return javascript object. the JSON data is parsed in strict manner;
				any malformed JSON is rejected and a parse error is thrown. 

	jsonp:		the callback name to send in query string when making jsonp request.

	success : function(data) {
				$.each(data,function(key,val){
					console.log(val.name);
				});
			}
		-->

		@section('document_ready')
		var id = $("#client-id").val();
		$("#name").autocomplete({
		source : function(request, response) {
		$.ajax({
		url : "http://localhost/contacts/ajaxGetContacts/"+id,
		data: {
		q: request.term
	},
	dataType : "json",
	type : "post",
	delay: 1500,
	success : function(data) {
	response($.map(data, function(item) {
	return {
	label : item.name,
	value : item.name,
	mobile: item.mobile_no,
	email:	item.email
}
}));
}
});
},
minLength : 2,
select : function(event, ui) {
$("#email").val(ui.item.email);
$("#mobile").val(ui.item.mobile);
//console.log(ui.item ? "Selected: " + ui.item.label : "Nothing selected, input was " + this.value);
}
});
@stop

@section('javascript')
<script type="text/javascript">

$(document).on("click", ".edit-modal", function () {
	var id = $(this).data('id');
	var name = $(this).data('name');
	var email = $(this).data('email');
	var mobile = $(this).data('mobileno');
	var url = "{{URL::route('contacts.index')}}";
	var url = url+'/'+id;

	$("#editContactModalForm").attr("action",url);
	$("#editContactModalFormName").attr("value",name);
	$("#editContactModalFormEmail").attr("value",email);
	$("#editContactModalFormMobile").attr("value",mobile);
});

$(document).on("click", ".confirm-remove", function () {
	var id = $(this).data('id');
	var url = "{{URL::route('contacts.index')}}";
	var url = url+'/'+id;
	$("#confirm-remove-form").attr("action",url);
});

$(document).on("click", "#confirm-set-default", function () {
	var id = $(this).data('id');
	$("#set-contact-id").attr("value",id);
});
</script>
@stop