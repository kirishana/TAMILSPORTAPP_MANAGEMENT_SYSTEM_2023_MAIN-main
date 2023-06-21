<!-- Name Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('name', 'Name:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div


<!-- User Id Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('user_id', 'User Id:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


<!-- Email Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('email', 'Email:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div


<!-- Tpnumber Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('tpnumber', 'Tpnumber:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('tpnumber', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div


<!-- Mobile Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('mobile', 'Mobile:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div


<!-- Address Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('address', 'Address:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('address', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div


<!-- State Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('state', 'State:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('state', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div


<!-- Postalcode Field -->
<div class="form-group">
    <div class="row">
        {!! Form::label('postalcode', 'Postalcode:',['class'=>'col-md-3 col-lg-3 col-12 control-label']) !!}
        <div class="col-md-9 col-lg-9 col-12">
            {!! Form::text('postalcode', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('organizations.index') }}" class="btn btn-default">Cancel</a>
</div>
