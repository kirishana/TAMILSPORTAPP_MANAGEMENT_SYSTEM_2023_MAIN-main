<section class="content">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group label-floating {{ $errors->first('club_registation_num', 'has-error') }}">
                <div class="input-group">
                    <span class="input-group-addon"><i class="material-icons text-light">person</i></span>
                    <label class="control-label" for="club_registation_num">Club Register Number</label>
                    <input id="club_registation_num" name="club_registation_num"  type="text" class="form-control" value="{!! old('club_registation_num') !!}">
                </div>
            </div>
        </div>
                                
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group label-floating {{ $errors->first('club_name', 'has-error') }}">
                <div class="input-group">
                    <span class="input-group-addon"><i class="material-icons">person</i></span>
                    <label class="control-label" for="club_name">Club Name</label>
                    <input id="club_name" name="club_name" required type="text" class="form-control" value="{{ old('club_name') }}">
                </div>
            </div>
        </div>
    </div>
</section>