
    <div class="col-sm-6">
        <div class="form-group">
            <label for="first_name">First Name <span class="text-danger" style="font-size:18px;">*</span></label>
            {{ Form::text('first_name', null, array('_required','class' => 'form-control','placeholder'=>'Your First Name')) }}
            @if($errors->has('first_name'))
            <div class="error" style="color:red">{{ $errors->first('first_name') }}</div>
            @endif
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="last_name">Last Name <span class="text-danger" style="font-size:18px;">*</span></label>
            {{ Form::text('last_name', null, array('_required','class' => 'form-control','placeholder'=>'Your Last Name')) }}
            @if($errors->has('last_name'))
            <div class="error" style="color:red">{{ $errors->first('last_name') }}</div>
            @endif
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="email">Email <span class="text-danger" style="font-size:18px;">*</span></label>
            {{ Form::text('email', null, array('_required','class' => 'form-control','placeholder'=>'Your Email')) }}
            @if($errors->has('email'))
            <div class="error" style="color:red">{{ $errors->first('email') }}</div>
            @endif
        </div>
    </div>
     
    <div class="col-sm-6">
        <div class="form-group">
            <label for="phone">Phone Number <span class="text-danger" style="font-size:18px;">*</span></label>
            {{ Form::text('phone', null, array('_required','class' => 'form-control','placeholder'=>'Your Phone Number','maxlength' => 10, 'onKeyUp' => "this.value=this.value.replace(/[^0-9,\.]/g,'');")) }}
            @if($errors->has('phone'))
            <div class="error" style="color:red">{{ $errors->first('phone') }}</div>
            @endif
        </div>
    </div>
    
    <div class="col-sm-6">
        <div class="form-group">
            <label for="street">Street <span class="text-danger" style="font-size:18px;">*</span></label>
            {{ Form::text('street', null, array('_required','class' => 'form-control','placeholder'=>'Your Street')) }}
            @if($errors->has('street'))
            <div class="error" style="color:red">{{ $errors->first('street') }}</div>
            @endif
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="city">City <span class="text-danger" style="font-size:18px;">*</span></label>
            {{ Form::text('city', null, array('_required','class' => 'form-control','placeholder'=>'Your City')) }}
            @if($errors->has('city'))
            <div class="error" style="color:red">{{ $errors->first('city') }}</div>
            @endif
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="state">State <span class="text-danger" style="font-size:18px;">*</span></label>
            {{ Form::text('state', null, array('_required','class' => 'form-control','placeholder'=>'Your State')) }}
            @if($errors->has('state'))
            <div class="error" style="color:red">{{ $errors->first('state') }}</div>
            @endif
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label for="zip_code">Zip Code <span class="text-danger" style="font-size:18px;">*</span></label>
            {{ Form::text('zip_code', null, array('_required','class' => 'form-control','placeholder'=>'Your Zip Code', 'maxlength' => 6, 'onKeyUp' => "this.value=this.value.replace(/[^0-9,\.]/g,'');")) }}
            @if($errors->has('zip_code'))
            <div class="error" style="color:red">{{ $errors->first('zip_code') }}</div>
            @endif
        </div>
    </div>

     

    
