@php use App\Enum\RecurrenceEnum; @endphp
@extends('theme.default')


@section('content')

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">{{ __('Movement Information') }}</h5>
        </div>

        <div class="card-body">
            {{ __("Update your movement.") }}
        </div>
        <div class="card-body border-top">
            <form method="post" action="{{ route('movements.update',['id' => $movement->id]) }}" class="mt-6 space-y-6">
                @csrf
                @method('put')
                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label" for="description">{{ __('Description:') }}</label>
                    <div class="col-lg-9">
                        <div class="form-floating">
                            <input id="description" name="description" type="text" class="form-control"
                                   value="{{ old('description', $movement->description) }}"
                                   placeholder="{{ __('Description:') }}"
                                   autocomplete="description">
                            <label>{{ old('description', $movement->description) }}</label>
                            <x-input-error :messages="$errors->get('description')"
                                           class="badge d-block bg-danger mt-1"/>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label" for="value">{{ __('Value:') }}</label>
                    <div class="col-lg-9">
                        <div class="form-floating">
                            <input id="value" name="value" type="text" class="form-control"
                                   value="{{ old('value', $movement->value) }}" placeholder="{{ __('Value:') }}"
                                   autocomplete="value">
                            <label>{{ old('value', $movement->value) }}</label>
                            <x-input-error :messages="$errors->get('value')" class="badge d-block bg-danger mt-1"/>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label" for="recurrence">{{ __('Recurrence:') }}</label>
                    <div class="col-lg-9">

                        <div class="form-floating">
                            <label for="movement-recurrence">{{ old('recurrence', $movement->recurrence) }}</label>
                            <select class="form-select" name="recurrence" id="movement-recurrence">
                                @foreach(RecurrenceEnum::values() as $key=>$value)
                                    <option id="recurrence" name="recurrence"
                                            value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('recurrence')"
                                           class="badge d-block bg-danger mt-1"/>
                        </div>
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">{{ __('Save movement') }} <i
                            class="ph-paper-plane-tilt ms-2"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
