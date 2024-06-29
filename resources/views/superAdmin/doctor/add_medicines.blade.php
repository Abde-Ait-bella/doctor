@extends('layout.mainlayout_admin', ['activePage' => 'prescription'])

@section('title', __('Prescription'))
@section('content')

    <section class="section">
        <div class="card" style="background-color: #eff3f7;">
            <div class="card-header">
                <h3 class="card-title mb-0 text-dark p-3">{{ __('Add Medicines') }}</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('addMedicines') }}" method="post">
                    @csrf
                    <div class="p-4 bg<div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="" class="label-prescription">Medicine:</label>
                                <input type="text" name="name" class="form-control" placeholder="Medicine">
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="" class="label-prescription">Category:</label>
                                <select name="medicine_category_id" class="select2">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="" class="label-prescription">Brand:</label>
                                <input type="text" name="brand" class="form-control " placeholder="Brand">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="label-prescription" for="exampleInputPassword1">Salt Composition :</label>
                                <input type="text" name="salt_composition" class="form-control"
                                    id="exampleInputPassword1" placeholder="Salt Composition">
                            </div>
                        </div>-white" style="border-radius: 10px">


                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="" class="label-prescription">Buying Price :</label>
                                <input type="text" name="buying_price" class="form-control " placeholder="Buying Price">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="label-prescription" for="exampleInputPassword1">Selling Price :</label>
                                <input type="text" name="selling_price" class="form-control" id="exampleInputPassword1"
                                    placeholder="Selling Price">
                            </div>
                        </div>

                        <div class="row pt-3">
                            <div class="col-md-12 mb-4">
                                <label class="label-prescription" for="">Side Effects :</label>
                                <textarea class="form-control" name="side_effects" id="exampleFormControlTextarea1" rows="5" style="height: 100px"
                                    placeholder="Side Effects"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label class="label-prescription" for="">Description :</label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="5" style="height: 100px"
                                    placeholder="Description"></textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end w-full">
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            <div class="col-md-1">
                                <a href={{ url('prescription') }} class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    </section>

    {{-- <section class="section">
        @include('layout.breadcrumb', [
            'title' => __('Add Medicine Category'),
            'url' => url('medicineCategory'),
            'urlTitle' => __('Medicine Category'),
        ])
        <div class="section_body">
            <div class="card">
                <form action="{{ url('medicineCategory') }}" method="post" class="myform">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label class="col-form-label">{{ __('Name') }}</label>
                            <input type="text" required value="{{ old('name') }}" name="name"
                                class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('status') }}</label>
                            <label class="cursor-pointer">
                                <input type="checkbox" id="status" class="custom-switch-input" name="status">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                        <div class="text-right mt-4">
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section> --}}

@endsection
