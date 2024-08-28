@extends('Layout.Main')
@section('content')




    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div id="instructionsSteps">
                        @foreach ($emergencyStatusInstructions as $instruction)
                            @if ($instruction->question)
                                <h3 style="color:red;display:inline;"><strong>Step {{ $loop->iteration }}: </strong></h3>
                                <span style="color:black">{{ $instruction->text }}</span>
                                <br>
                                <br>
                                @foreach ($emergencyStatusInstructions as $instructionAnswer)
                                    @if ($instructionAnswer->parent_id == $instruction->id)
                                        <div style="margin-left:20%;margin-top:5%;display:inline;">
                                            <input type="radio" id="answer" name="instructionAnswer"
                                                value="{{ $instructionAnswer->id }}">
                                            <label for="answer" style="color:black">{{ $instructionAnswer->text }}</label>
                                        </div>
                                    @endif
                                @endforeach
                                @php $counter = $loop->iteration; @endphp
                            @break
                        @else
                            <h3 style="color:red;display:inline;">
                                <strong>
                                    Step {{ $loop->iteration }}:
                                </strong>
                            </h3>
                            <div style="display:inline">
                                <span style="color:black">
                                    {{ $instruction->text }}
                                </span>
                            </div>
                            <br><br>
                        @endif
                        @endforeach
                    </div>

                    <p style="color:black;font-size:140%;"></p>
                    <div class="text-center">
                        <div class="div_instractions">
                            <div class="instructions">
                                <a href="#">
                                    <input class="btn btn-main btn-round-full" id="next" name="next" type="button" value="Next"
                                        style="background-color:rgba(59, 58, 58, 0.99);width:40%;" />
                                </a>
                            </div>
                            <a href="#">
                                <input class="btn btn-main btn-round-full" id="callAmbulance" name="callAmbulance"
                                    type="button" value="Call Ambulance"
                                    style="background-color:rgba(218, 0, 0, 0.99); width:40%;" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var emergency_status_id = {{ $emergencyStatusInstructions[0]->emergency_status_id }};
        var emergency_instruction = {!! $emergencyStatusInstructions !!};
        var counter = 1;
        var first = true;
        var last_instruction_id = 0;
        $(document).ready(function() {
            $('#next').on('click', function(e) {
                var break_var = false;
                var current_parent_id = $("input[type='radio'][name='instructionAnswer']:checked").val();
                var element = ``;
                if (first) {
                    counter = {{ $counter + 1 }};
                    first = false;
                }
                emergency_instruction.forEach(instruction => {
                    if (!break_var) {
                        if (instruction.parent_id == current_parent_id) {
                            if (instruction.question) {
                                element += `<h3 style="color:red;display:inline;"><strong>Step ` +
                                    counter + `: </strong></h3>
                                            <span style="color:black">` + instruction.text + `</span>
                                            <br>
                                            <br>`
                                emergency_instruction.forEach(instructionAnswer => {
                                    if (instructionAnswer.parent_id == instruction.id) {
                                        element += `<div style="margin-left:20%;margin-top:5%;display:inline;">
                                <input type="radio" id="answer" name="instructionAnswer" value="` + instructionAnswer
                                            .id + `">
                                <label for="answer" style="color:black">` + instructionAnswer.text + `</label>
                            </div>`
                                    }
                                });
                                break_var = true;
                            } else {
                                element += `<h3 style="color:red;display:inline;">
                                                <strong>
                                                    Step ` + counter + `:
                                                </strong>
                                            </h3>
                                            <div style="display:inline">
                                                <span style="color:black">
                                                    ` + instruction.text + `
                                                </span>
                                            </div>
                                            <br><br>`;
                            }
                            current_parent_id = instruction.id;
                            counter++;
                        }
                    }
                });
                $("#instructionsSteps").empty();
                $("#instructionsSteps").append(element);
                var final = true;
                emergency_instruction.forEach(instruction => {
                    if (instruction.parent_id == current_parent_id) {
                        console.log(current_parent_id);
                        final = false;
                    }
                });
                if (final) {
                    $("#next").hide();
                }
            });

            $('#callAmbulance').on('click', function(e) {
                //Getting the dates with the purchases
                jQuery.ajax({
                    url: "/api/sendOrder",
                    method: 'POST',
                    data: {
                        patient_id: 7,
                        medical_center_id: 1,
                        lng: 33.4928392,
                        lat: 36.3158176,
                        status:3,
                    },
                    success: function(result) {
                        alert(result['message']);
                    }
                });
            });
        });
    </script>
@endsection
