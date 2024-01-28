@csrf

<div class="container">
    <div class="card rounded-bottom">

        <div class="card-body p-3">

            <div class="row">
                <div class="col-md-4 text-center">


                    @if($usuarios->photo)
                    <img src="{{'http://casos.test/'.$usuarios->photo}}" alt="Usuario" style="width: 75px; height: 75px;"><br><br>
                    @else
                    <img src="http://casos.test/images/users/default.jpeg" alt="Usuario" style="width: 75px; height: 75px;"><br><br>
                    @endif
                    
                    <input type="file" name="photo" accept="image/*">
                
                </div>

                <div class="col-md-8">
                    <div class="row">
                    <div class="col-md-12 form-group">
                        {!! Form::label('name', 'Nombre', ['class' => 'control-label small']) !!}
                        <span class="badge badge-info text-white">requerido</span>
                        {!! Form::text('name', old('name',$usuarios->name ?? ''), ['class' => 'form-control',
                        'placeholder' => 'Ingrese un nombre', 'maxlength' => 50]) !!}
                        <p class="help-block"></p>
                        @if($errors->has('name'))
                        <p class="help-block" style="color:#DD4B39">
                            {{ $errors->first('name') }}
                        </p>
                        @endif
                    </div>

                    <div class="col-md-12 form-group">
                        {!! Form::label('email', 'Correo', ['class' => 'control-label small']) !!}
                        <span class="badge badge-info text-white">requerido</span>
                        {!! Form::text('email', old('email',$usuarios->email ?? ''), ['class' =>
                        'form-control',
                        'placeholder' => 'Ingrese un correo', 'maxlength' => 200]) !!}
                        <p class="help-block"></p>
                        @if($errors->has('email'))
                        <p class="help-block" style="color:#DD4B39">
                            {{ $errors->first('email') }}
                        </p>
                        @endif
                    </div>
                    
                    <div class="col-md-12 form-group">
                        {!! Form::label('password', 'Contraseña', ['class' => 'control-label small']) !!}
                        <span class="badge badge-info text-white">requerido</span>
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Ingrese una contraseña', 'maxlength' => 10]) !!}
                        <p class="help-block"></p>
                        @if($errors->has('password'))
                        <p class="help-block" style="color:#DD4B39">
                            {{ $errors->first('password') }}
                        </p>
                        @endif
                    </div> 
                    </div>

                </div>
            </div>
        </div>
        <div class="modal-footer">
            {!! Form::button('<i class="fa fa-save mr-1"></i> Save',
            ['type'=>'submit','class' => 'btn btn-success']) !!}
            <a href="{{ URL::previous() }}" class=" btn  btn-secondary" data-toggle="tooltip" data-placement="top"
                title="Back">
                <i class="fas fa-arrow-circle-left"></i> Back
            </a>
        </div>
    </div>