@extends('layouts.app')

@section('content')

<div class="card-header">{{ __('Contatos') }}</div>

<div class="card-body">

    @if (isset($message))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif

    @if(session()->has('warning'))
    <div class="alert alert-warning">
        {{ session()->get('warning') }}
    </div>
    @endif

    <form method="POST" action="{{ route('personsContacts.store') }}" aria-label="{{ __('Contatos') }}">
        @csrf

        @if (isset($person))
        <input name="person_id" type="hidden" value="{{ $person->id }}">
        @endif

        @if (isset($workflow))
        <input name="workflow" type="hidden" value="{{ $workflow }}">
        @endif

        @if (isset($contact))
        <input name="contact_id" type="hidden" value="{{ $contact->id }}">
        @endif

        <div class="form-group row">
            <label for="cpf_cnpj" class="col-sm-4 col-form-label text-md-right">{{ __('CNPJ/CPF') }}</label>

            <div class="col-md-6">
                <input id="cpf_cnpj" type="cpf_cnpj"
                       class="form-control{{ $errors->has('cpf_cnpj') ? ' is-invalid' : '' }}" name="cpf_cnpj"
                       value="{{is_null(old('cpf_cnpj')) ? $person->cpf_cnpj : old('cpf_cnpj')}}"  readonly="readonly">

                @if ($errors->has('cpf_cnpj'))
                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('cpf_cnpj') }}</strong>
                                        </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Nome Completo') }}</label>

            <div class="col-md-6">
                <input id="name" type="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                       name="name" value="{{is_null(old('name')) ? $person->name : old('name')}}"  readonly="readonly">

                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="mobile" class="col-sm-4 col-form-label text-md-right">{{ __('Celular') }}</label>

            <div class="col-md-6">
                <input class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                       name="mobile"
                       value="{{is_null(old('mobile')) ? $contact->mobile : old('mobile')}}"  required autofocus>

                @if ($errors->has('mobile'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('mobile') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="whatsapp" class="col-sm-4 col-form-label text-md-right">{{ __('Whatsapp') }}</label>

            <div class="col-md-6">
                <input class="form-control{{ $errors->has('whatsapp') ? ' is-invalid' : '' }}" name="whatsapp"
                       value="{{is_null(old('whatsapp')) ? $contact->whatsapp : old('whatsapp')}}"
                       autofocus>

                @if ($errors->has('whatsapp'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('whatsapp') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

            <div class="col-md-6">
                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                       value="{{is_null(old('email')) ? $contact->email : old('email')}}" required
                       autofocus>

                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="phone" class="col-sm-4 col-form-label text-md-right">{{ __('Telefone Fixo') }}</label>

            <div class="col-md-6">
                <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"
                       value="{{is_null(old('phone')) ? $contact->phone : old('phone')}}"
                       autofocus>

                @if ($errors->has('phone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Gravar') }}
                </button>
            </div>
        </div>
    </form>
</div>

@endsection
