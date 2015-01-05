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
		{{ Form::open(array('url'=>URL::route('systems.update', array($settings['id']->id)),'files'=>true, 'method'=>'PUT')) }}
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
									{{ Form::select('date_format', $settings['date_format_list'], $settings['id']->date_format)}}
								</label><i></i>	
							</section>

							<!-- Form::select('product_id', $productList, null, array('class' => 'form-control')) -->

							<section class="col col-3">
								<label class="label">Timezone: </label>
								<label class="select">
									{{ Form::select('timezone', $settings['timezone_list'], $settings['id']->timezone)}}
								</label><i></i>	
							</section>

							<section class="col col-3">
								<label class="label">Paper Size: </label>
								<label class="select">
									{{ Form::select('paper_size', $settings['paper_size_list'], $settings['id']->paper_size)}}
								</label><i></i>	
							</section>

						</div>
					</fieldset>
					<fieldset>
						<div class="row">
							<section class="col col-6">
								<label class="input"><i class="icon-append fa fa-coffee"></i>
									<input type="text" name="company_name" placeholder="Company" value="{{ $settings['id']->company_name }}"/>
								</label>
							</section>
							<section class="col col-6">
								<label class="input"><i class="icon-append fa fa-barcode"></i>
									<input type="text" name="reg_no" placeholder="Registration no." value="{{ $settings['id']->reg_no }}"/>
								</label>
							</section>
						</div>	
						<div class="row">
							<section class="col col-6">
								<label class="input"><i class="icon-append fa fa-phone"></i>
									<input type="text" name="office_no" placeholder="Office no." value="{{ $settings['id']->office_no }}"/>
								</label>
							</section>
							<section class="col col-6">
								<label class="input"><i class="icon-append fa fa-globe"></i>
									<input type="text" name="web_addr" placeholder="Web Address" value="{{ $settings['id']->web_addr }}"/>
								</label>
							</section>
						</div>	

						<section>
							<label class="textarea">
								<textarea name="address" rows="3" class="custom-scroll" placeholder="Address">{{ $settings['id']->address }}</textarea>
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
									<input type="text" name="invoice_prefix" placeholder="ICS" value="{{ $settings['id']->invoice_prefix }}"/>
								</label>
							</section>
							<section class="col col-2">
								<label class="label">Year Prefix: </label>
								<label class="select">
									{{ Form::select('year_prefix', array(0 => 'Yes', 1 => 'No'), $settings['id']->year_prefix)}}
								</label><i></i>
							</section>
							<section class="col col-2">
								<label class="label">Month Prefix: </label>
								<label class="select">
									{{ Form::select('month_prefix', array(0 => 'Yes', 1 => 'No'), $settings['id']->month_prefix)}}
								</label><i></i>
							</section>
							<section class="col col-2">
								<label class="label">Left Pad: </label>
								<label class="input">
									<input type="text" name="left_pad" placeholder="0" value="{{ $settings['id']->left_pad }}"/>
								</label>
							</section>
							<section class="col col-3">
								<label class="label">Next ID: </label>
								<label class="input">
									<input type="text" disabled="" name="invoice_next_id" placeholder="Next ID"/>
								</label>
							</section>
							{{ $settings['prefix_format'] }}
						</div>	
					</fieldset>
				</div>
			</div>
			{{ Form::button('Save',array('class'=>'btn btn-primary','type'=>'submit') )}}
		</div>
		{{Form::close()}}
	</div>
</div>

@stop