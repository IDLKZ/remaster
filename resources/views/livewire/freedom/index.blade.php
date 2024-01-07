<div class="container">

    <div class="row">

        <div class="col-12 bg-warning p-3 my-4">
            <div class="mb-5 p-4 bg-white shadow-sm">
                <h3>Vertical linear stepper</h3>
                <div id="stepper4" class="bs-stepper vertical">
                    <div class="bs-stepper-header" role="tablist">
                        <div class="step" data-target="#test-vl-1">
                            <button type="button" class="step-trigger" role="tab" id="stepper4trigger1" aria-controls="test-vl-1">
                                <span class="bs-stepper-circle">1</span>
                                <span class="bs-stepper-label">Email</span>
                            </button>
                        </div>
                        <div class="bs-stepper-line"></div>
                        <div class="step" data-target="#test-vl-2">
                            <button type="button" class="step-trigger" role="tab" id="stepper4trigger2" aria-controls="test-vl-2">
                                <span class="bs-stepper-circle">2</span>
                                <span class="bs-stepper-label">Password</span>
                            </button>
                        </div>
                        <div class="bs-stepper-line"></div>
                        <div class="step" data-target="#test-vl-3">
                            <button type="button" class="step-trigger" role="tab" id="stepper4trigger3" aria-controls="test-vl-3">
                                <span class="bs-stepper-circle">3</span>
                                <span class="bs-stepper-label">Validate</span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content">
                        <form onSubmit="return false">
                            <div id="test-vl-1" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepper4trigger1">
                                <div class="form-group">
                                    <label for="exampleInputEmailV1"> address</label>
                                    <input type="email" class="form-control" id="exampleInputEmailV1" placeholder="Enter email">
                                </div>
                                <button class="btn btn-primary" onclick="stepper4.next()">Next</button>
                            </div>
                            <div id="test-vl-2" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepper4trigger2">
                                <div class="form-group">
                                    <label for="exampleInputPasswordV1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPasswordV1" placeholder="Password">
                                </div>
                                <button class="btn btn-primary" onclick="stepper4.previous()">Previous</button>
                                <button class="btn btn-primary" onclick="stepper4.next()">Next</button>
                            </div>
                            <div id="test-vl-3" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepper4trigger3">
                                <button class="btn btn-primary mt-5" onclick="stepper4.previous()">Previous</button>
                                <button type="submit" class="btn btn-primary mt-5">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@push("scripts")
    <script>
        $(document).ready(function () {
            var stepper = new Stepper($('.bs-stepper')[0])
        })
    </script>
@endpush
