@extends('layouts.admin')
@section('content') 


<section class="content">
    <div class="container">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Setting</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                    </div>
                </div>

                <form method="post" enctype="multipart/form-data" action="{{ url('setting') }}">
                    @csrf
                            <div class="card-body">
                                <div class="form-group">
                                        <label>Shop Name</label>
                                        <input type="text" class="form-control @error('site_name') is-invalid @enderror" name="site_name" placeholder="Enter Name" value="{{ old('site_name',sys_config('site_name')) }}" />
                                        @error('site_name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                        <label>mobile</label>
                                        <input type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" placeholder="Enter Name" value="{{ old('mobile',sys_config('mobile')) }}" />
                                        @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                        <label>GST</label>
                                        <input type="text" class="form-control @error('GST') is-invalid @enderror" name="GST" placeholder="Enter Name" value="{{ old('GST',sys_config('GST')) }}" />
                                        @error('GST')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                        <label>Sell Biill Start No</label>
                                        <input type="text" class="form-control @error('Sell_biill_start') is-invalid @enderror" name="Sell_biill_start" placeholder="Enter Name" value="{{ old('Sell_biill_start',sys_config('Sell_biill_start')) }}" />
                                        @error('Sell_biill_start')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                        <label>bank_name</label>
                                        <input type="text" class="form-control @error('bank_name') is-invalid @enderror" name="bank_name" placeholder="Enter Name" value="{{ old('bank_name',sys_config('bank_name')) }}" />
                                        @error('bank_name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                        <label>bank_ac</label>
                                        <input type="text" class="form-control @error('bank_ac') is-invalid @enderror" name="bank_ac" placeholder="Enter Name" value="{{ old('bank_ac',sys_config('bank_ac')) }}" />
                                        @error('bank_ac')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                        <label>Bank_IFSC_Code</label>
                                        <input type="text" class="form-control @error('Bank_IFSC_Code') is-invalid @enderror" name="Bank_IFSC_Code" placeholder="Enter Name" value="{{ old('Bank_IFSC_Code',sys_config('Bank_IFSC_Code')) }}" />
                                        @error('Bank_IFSC_Code')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                        <label>Description1</label>
                                        <input type="text" class="form-control @error('Description1') is-invalid @enderror" name="Description1" placeholder="Enter Name" value="{{ old('Description1',sys_config('Description1')) }}" />
                                        @error('Description1')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                        <label>Description2</label>
                                        <input type="text" class="form-control @error('Description2') is-invalid @enderror" name="Description2" placeholder="Enter Name" value="{{ old('Description2',sys_config('Description2')) }}" />
                                        @error('Description2')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                        <label>show_quantity</label>
                                        <input type="text" class="form-control @error('show_quantity') is-invalid @enderror" name="show_quantity" placeholder="Enter Name" value="{{ old('show_quantity',sys_config('show_quantity')) }}" />
                                        @error('show_quantity')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address"  class="form-control @error('address') is-invalid @enderror" rows="5">{{ old('address',sys_config('address')) }}</textarea>
                                        @error('address')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>   
                               
                            </div>
                    <div class="card-footer con">
                        <a href="{{ url('product/type/sub_type') }}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>

@endsection
