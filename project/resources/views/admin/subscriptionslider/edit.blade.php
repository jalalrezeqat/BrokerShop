@extends('layouts.load')

@section('content')
            <div class="content-area">

              <div class="add-product-content1">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="product-description">
                      <div class="body-area">
                        @include('includes.admin.form-error') 
                      <form id="Bshopformdata" action="{{route('admin-subscriptionslider-update',$data->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __("Title") }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="title" placeholder="{{ __("Enter Subscription Title") }}" required="" value="{{ $data->title }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __("Currency Symbol") }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="currency" placeholder="{{ __("Enter Subscription Currency") }}" required="" value="{{ $data->currency }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __("Currency Code") }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="currency_code" placeholder="{{ __("Enter Subscription Currency Code") }}" required="" value="{{ $data->currency_code }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __("Cost") }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="price" placeholder="{{ __("Enter Subscription Cost") }}" required="" value="{{ $data->price }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __("Days") }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="days" placeholder="{{ __("Enter Subscription Days") }}" required="" value="{{ $data->days }}">
                          </div>
                        </div>

                        

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              <h4 class="heading">
                                   {{ __("Details") }} *
                              </h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                              <textarea class="nic-edit" name="details" placeholder="{{ __("Details") }}">{{ $data->details }}</textarea> 
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <button class="addProductSubmit-btn" type="submit">{{ __("Save") }}</button>
                          </div>
                        </div>
                      </form>


                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


@endsection

@section('scripts')

<script type="text/javascript">

$("#limit").on('change',function() {
  val = $(this).val();
    if(val == 1) {
        $("#limits").show();
        $("#allowed_products").prop("required", true);
    }
    else
    {
        $("#limits").hide();
        $("#allowed_products").prop("required", false);

    }
});

</script>

@endsection
