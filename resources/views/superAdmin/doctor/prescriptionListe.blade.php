@extends('layout.mainlayout_admin', ['activePage' => 'prescription'])

@section('title', __('PrescriptionListe'))
@section('content')

    <section class="section">
        <style>
            .icon {
                color: #6c757d;
                cursor: pointer;
            }

            .fa-eye:hover {
                color: rgb(41, 154, 247);
            }

            .fa-pen-to-square:hover {
                color: rgb(211, 162, 0);
                cursor: pointer;
            }

            .fa-print:hover {
                color: rgb(1, 173, 58);
            }

            .fa-trash:hover {
                color: rgb(248, 0, 0);
                cursor: pointer;
            }
        </style>
        @include('layout.breadcrumb', [
            'title' => __('Prescription'),
        ])
        <div>
            <div class="text-right mb-4">
                <a href="{{ url('prescription') }}" class="btn btn-success btn-lg ">New Prescription</a>
            </div>
            <div class="card card mb-0">
                <div class="card-body p-0">
                    <div class=" table-responsive">
                        @if (count($prescriptions) > 0)
                            <table class="table mb-0" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>{{ __('PATIENTS') }}</th>
                                        <th>{{ __('DOCTORS') }}</th>
                                        <th>{{ __('ADDED AT') }}</th>
                                        <th>{{ __('ACTION') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    @foreach ($prescriptions as $presc)
                                        <tr class="border-bottom">
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a>
                                                        <img src="@isset($presc->user['image']) {{ asset('images/upload/' . $presc->user['image']) }} @else {{ asset('images/upload/638fa33b52fe2.png') }} @endisset"
                                                            alt="">
                                                    </a>
                                                    <a>{{ @$presc->appointment['patient_name'] }}</a>
                                                </h2>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a>
                                                        <img src="{{ asset('images/upload/' . $presc->doctor['image']) }}"
                                                            alt="">
                                                    </a>
                                                    <a>{{ $presc->doctor['name'] }}</a>
                                            </td>
                                            </h2>
                                            @php
                                                $createdAt = \Carbon\Carbon::parse($presc['created_at']);
                                            @endphp
                                            <td>{{ $createdAt->format('d M Y') }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('showPresc', $presc->id) }}">
                                                        <i class="fa-solid fa-eye icon" style="font-size: 20px;"></i>
                                                    </a>

                                                    <a href="{{ route('editPresc', $presc->id) }}">
                                                        <i class="fa-solid fa-pen-to-square icon"
                                                            style="font-size: 20px; margin-left: 5px;"></i>
                                                    </a>

                                                    <a target="_blank" href="{{ route('pdf', $presc->id) }}">
                                                        <i class="fa-solid fa-print icon"
                                                            style="font-size: 20px; margin-left: 5px;"></i>
                                                    </a>

                                                    <form
                                                        action="{{ route('deletePresc', $presc->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn p-0 px-1 fa-tras">
                                                            <i class="fa-solid fa-trash icon"
                                                                style="font-size: 20px; margin-left: 5px;"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="d-flex justify-content-center align-items-center">
                                <p class="mt-3">No Data Avalaible</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 mb-4 d-flex justify-content-center">
            {{ $prescriptions->links('pagination::bootstrap-4') }}
        </div>
    </section>

@endsection
