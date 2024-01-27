@csrf

<div class="container">
    <div class="card rounded-bottom">

        <div class="card-body p-3">

            <div class="row">

                <div class="col-md-12 form-group">
                    {!! Form::label('titulo', 'Título del caso', ['class' => 'control-label small']) !!}
                    <span class="badge badge-info text-white">requerido</span>
                    {!! Form::text('titulo', old('titulo',$casos->titulo ?? ''), ['class' => 'form-control',
                    'placeholder' => 'Ingrese una descripcion', 'maxlength' => 50]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('titulo'))
                    <p class="help-block" style="color:#DD4B39">
                        {{ $errors->first('titulo') }}
                    </p>
                    @endif
                </div>

                <div class="col-md-12 form-group">
                    {!! Form::label('descripcion', 'Descripción del caso', ['class' => 'control-label small']) !!}
                    <span class="badge badge-info text-white">requerido</span>
                    {!! Form::text('descripcion', old('descripcion',$casos->descripcion ?? ''), ['class' =>
                    'form-control',
                    'placeholder' => 'Ingrese una descripción', 'maxlength' => 200]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('descripcion'))
                    <p class="help-block" style="color:#DD4B39">
                        {{ $errors->first('descripcion') }}
                    </p>
                    @endif
                </div>

                <div class="col-lg-12 form-group">
                    {!! Form::label('estado', 'Estado ', ['class' => 'control-label small']) !!} 
                    <span class="badge badge-info text-white">requerido</span>
                    {!! Form::select('estado', $estados, old('estado',$casos->estado ?? ''), ['class' => 'form-control',
                    'placeholder' => '- Seleccione un estado -','required']) !!}
                    @if($errors->has('casos'))
                    <p class="help-block" style="color:#DD4B39">
                        {{ $errors->first('casos') }}
                    </p>
                    @endif
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