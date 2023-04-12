@php use App\Enum\RecurrenceEnum; @endphp
@extends('theme.default')


@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h5 class="mb-0">{{ __('Total Fixed Expenses') }}</h5>
                        <div class="d-flex align-items-center ms-auto">
                            <span class="fw-bold text-success">{{$total_movements}}    &euro;</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart" id="movements">
                            <button type="button" class="btn btn-light" data-bs-toggle="modal"
                                    data-bs-target="#add_movement">{{ __('Create Movement') }} <i
                                    class="ph-play-circle ms-2"></i></button>
                            <br/>
                            <br/>
                            @if (session('status') === 'movement-store')
                                <div class="alert alert-success alert-icon-start alert-dismissible fade show">
											<span class="alert-icon bg-success text-white">
												<i class="ph-check-circle"></i>
											</span>
                                    <span class="fw-semibold">{{ __('Movement Created') }}</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif
                            @if (session('status') === 'movement-updated')
                                <div
                                    class="alert alert-success alert-icon-start alert-dismissible fade show">
											<span class="alert-icon bg-success text-white">
												<i class="ph-check-circle"></i>
											</span>
                                    <span class="fw-semibold">{{ __('Movement updated') }}</span>
                                    <button type="button" class="btn-close"
                                            data-bs-dismiss="alert"></button>
                                </div>
                            @endif
                            @if (session('status') === 'movement-destroy')
                                <div
                                    class="alert alert-success alert-icon-start alert-dismissible fade show">
											<span class="alert-icon bg-danger text-white">
												<i class="ph-check-circle"></i>
											</span>
                                    <span class="fw-semibold">{{ __('Movement deleted') }}</span>
                                    <button type="button" class="btn-close"
                                            data-bs-dismiss="alert"></button>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>value</th>
                                    <th>Recurrence</th>
                                    <th>Date</th>
                                    <th>Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($movements as $movement)
                                    <tr class="bg-success text-white">
                                        <td>
                                            {{ $movement->description }}
                                        </td>
                                        <td>
                                            {{ $movement->value }}    &euro;
                                        </td>
                                        <td>
                                            {{ $movement->recurrence }}
                                        </td>
                                        <td>
                                            {{ date('d-m-Y', strtotime($movement->created_at)) }}
                                        </td>
                                        <td>
                                            @if($movement->created_by === Auth::id())
                                                <div class="d-inline-flex">
                                                    <a href="{{ route('movements.show', ['id' => $movement->id]) }}"
                                                       class="text-body">
                                                        <i class="ph-pen"></i>
                                                    </a>
                                                    <a data-bs-toggle="modal"
                                                       data-bs-target="#remove_movement" class="text-body">
                                                        <i class="ph-trash"></i>
                                                    </a>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br/>
                    </div>
                    </form>
                    <div id="remove_movement" class="modal fade" tabindex="-1" role="dialog"
                         aria-labelledby="remove_movement"
                         aria-hidden="true">
                        <div class="modal-dialog" role="movement">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form method="post"
                                          action="{{ route('movements.destroy', ['id' => $movement->id]) }}"
                                          class="mt-6 space-y-6">
                                        @csrf
                                        @method('DELETE')
                                        <h6 class="fw-semibold">{{ __('Are you sure you want to delete your account?') }}</h6>
                                        <p> {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}</p>
                                        <hr>
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-danger">{{ __('Destroy movement') }} <i
                                                    class="ph-paper-plane-tilt ms-2"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="add_movement" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="add_movement"
                         aria-hidden="true">
                        <div class="modal-dialog" role="movement">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="add_movement">Basic modal</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">
                                    <form method="post" action="{{ route('movements.store') }}" class="mt-6 space-y-6">
                                        @csrf
                                        @method('post')
                                        <div class="row mb-3">
                                            <label class="col-form-label col-lg-3"
                                                   for="description">{{ __('Description:') }}</label>
                                            <div class="col-lg-9">
                                                <input id="description" name="description" type="text"
                                                       class="form-control">
                                                <x-input-error :messages="$errors->get('description')"
                                                               class="badge d-block bg-danger mt-1"/>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-form-label col-lg-3"
                                                   for="value">{{ __('Value:') }}</label>
                                            <div class="col-lg-9">
                                                <input id="value" name="value" type="text" class="form-control">
                                                <x-input-error :messages="$errors->get('value')"
                                                               class="badge d-block bg-danger mt-1"/>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-lg-3 col-form-label"
                                                   for="recurrence">{{ __('Recurrence:') }}</label>
                                            <div class="col-lg-9">
                                                <div class="form-floating">
                                                    <select class="form-select" name="recurrence">
                                                        @foreach(\App\Enum\RecurrenceEnum::values() as $key=>$value)
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
