@extends('admin.master')

@section('title')
@parent
- System Settings
@stop

@section('breadcrumb')
@parent
<li>Settings</li>
<li>System</li>
@stop

@section('page_title_icon')
hdd-o
@stop

@section('page_title')
System Settings
@stop

@section('page_title_right')
{{Form::submit('Save')}}
@stop

@section('content')

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		{{Form::open(array('url'=>'/upload','method'=>'post'))}}
		<ul class="nav nav-tabs bordered">
			<li class="active">
				<a href="#s1" data-toggle="tab">General</a>
			</li>
			<li>
				<a href="#s2" data-toggle="tab">Invoices</a>
			</li>
		</ul>
		<div class="tab-content padding-10" style="background:none repeat scroll 0 0 rgba(255, 255, 255, 0.9);">
			<div id="s1" class="tab-pane fade in active">
				<div class="smart-form">
					<fieldset>
						<div class="row">

							<section class="col col-3">
								<label class="label">Logo: </label>
								<div class="input input-file">
									<span class="button"><input type="file" id="file" name="file" onchange="this.parentNode.nextSibling.value = this.value">Browse</span><input type="text" placeholder="Select Logo Image" readonly="">
								</div>
							</section>

							<section class="col col-3">
								<label class="label">Date Format: </label>
								<label class="select">
									<select name="date-format">
										<option value="d/m/Y">{{date_format($settings['date'],'d/m/Y')}}</option>
										<option value="d-m-Y">{{date_format($settings['date'],"d-m-Y")}}</option>
										<option value="d.m.Y">{{date_format($settings['date'],"d.m.Y")}}</option>
										<option value="m/d/Y">{{date_format($settings['date'],"m/d/Y")}}</option>
										<option value="m-d-Y">{{date_format($settings['date'],"m-d-Y")}}</option>
										<option value="m.d.Y">{{date_format($settings['date'],"m.d.Y")}}</option>
									</select>
								</label><i></i>	
							</section>

							<section class="col col-3">
								<label class="label">Timezone: </label>
								<label class="select">
									<select name="timezone">
										<option selected="" value="0">Select your timezone</option>
										@foreach($settings['zones_array'] as $zl)
										<option value="{{$zl['zone']}}">{{$zl['diff_from_GMT'].' - '.$zl['zone']}}</option>
										@endforeach
									</select>
								</label><i></i>	
							</section>

							<section class="col col-3">
								<label class="label">Paper Size: </label>
								<label class="select">
									<select name="paper-size">
										<option value='letter'>Letter</option>
										<option value='a4'>A4</option>
										<option value='legal'>Legal</option>
									</select>
								</label><i></i>	
							</section>

						</div>
					</fieldset>
					<fieldset>
						<div class="row">
							<section class="col col-6">
								<label class="input"><i class="icon-append fa fa-coffee"></i>
									<input type="text" name="company" placeholder="Company"/>
								</label>
							</section>
							<section class="col col-6">
								<label class="input"><i class="icon-append fa fa-barcode"></i>
									<input type="text" name="reg_no" placeholder="Registration no."/>
								</label>
							</section>
						</div>	
						<div class="row">
							<section class="col col-6">
								<label class="input"><i class="icon-append fa fa-phone"></i>
									<input type="text" name="phone" placeholder="Phone no."/>
								</label>
							</section>
							<section class="col col-6">
								<label class="input"><i class="icon-append fa fa-globe"></i>
									<input type="text" name="web" placeholder="Web Address"/>
								</label>
							</section>
						</div>	

						<section>
							<label class="textarea"> 										
								<textarea rows="3" class="custom-scroll" placeholder="Address"></textarea> 
							</label>
						</section>

					</fieldset>
				</div>
			</div>
			<div id="s2" class="tab-pane">
				<div class="smart-form">
					<fieldset>
						<div class="row">
							<section class="col col-3">
								<label class="label">Invoice Prefix: </label>
								<label class="input">
									<input type="text" name="invoice_prefix" placeholder="ICS"/>
								</label>
							</section>

							<section class="col col-2">
								<label class="label">Year Prefix: </label>
								<label class="input">
									<input type="text" name="year_prefix" placeholder="14"/>
								</label>
							</section>

							<section class="col col-2">
								<label class="label">Year Prefix: </label>
								<label class="input">
									<input type="text" name="year_prefix" placeholder="14"/>
								</label>
							</section>
							<section class="col col-2">
								<label class="label">Left Pad: </label>
								<label class="input">
									<input type="text" name="left_pad" placeholder="0"/>
								</label>
							</section>
							<section class="col col-3">
								<label class="label">Next ID: </label>
								<label class="input">
									<input type="text" disabled="" name="invoice_next_id" placeholder="Next ID"/>
								</label>
							</section>
						</div>	
					</fieldset>
				</div>
			</div>
		</div>
		{{Form::close()}}
	</div>
</div>

@stop