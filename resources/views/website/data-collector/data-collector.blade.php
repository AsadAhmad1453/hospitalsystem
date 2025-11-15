@extends('website.layouts.data-collector-layout')
@section('custom-css')
<link rel="stylesheet" href="{{ asset('admin-assets/css/custom-css.css') }}">
@endsection

@section('content')
<section id="multiple-column-form">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="card shadow">
                <div class="formbold-main-wrapper">
                    <div class="formbold-form-wrapper">
                        <form action="{{ route('save-open-data-collector', $questions->first()->form_id) }}" method="POST">
                            @csrf

                            <div class="d-flex align-items-center float-right mt-3 mb-2">
                                <button id="recordBtn" type="button" class="btn btn-sm p-1 btn-danger"><i data-feather="mic"></i></button>
                                <button id="pauseBtn" type="button" class="btn btn-sm p-1 btn-secondary ml-1" disabled><i data-feather="pause"></i></button>
                                <button id="stopBtn" type="button" class="btn btn-sm p-1 btn-dark ml-1" disabled><i data-feather="square"></i></button>
                                <audio id="audioPlayer" controls class="ml-3" style="display: none"></audio>
                            </div>

                            <input type="hidden" id="patient_id" name="patient_id" value="{{ $patient_id }}">

                            @php
                                $totalSteps = $sections->count();
                            @endphp

                            {{-- Multi-step wizard progress --}}
                            <div class="formbold-steps mb-4">
                                <div class="sections-slider-wrapper">
                                    <ul class="">
                                        @foreach ($sections as $index => $section)
                                            <li class="formbold-step-menu{{ $loop->iteration }} section-item {{ $index === 0 ? 'active' : '' }}" data-section="{{ $index }}">
                                                <span>{{ $loop->iteration }}</span>
                                                {{ $section->name }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            {{-- Sections, ONE at a time --}}
                            @foreach ($sections as $index => $section)
                                <div class="section-block" id="section-block-{{ $index }}" style="{{ $index === 0 ? '' : 'display:none;' }}">
                                    <h4 class="mb-3">{{ $section->name }}</h4>
                                    @foreach ($questions->where('section.id', $section->id) as $question)
                                        <div class="question-block mb-4" id="question-{{ $question->id }}">
                                            <label class="h5 d-block mb-2">{{ $question->question }}@if($question->priority == 1)<span class="text-danger">*</span>@endif</label>
                                            @if($question->question_type == '0')
                                                {{-- Single select --}}
                                                <div class="options-grid">
                                                    @foreach ($question->options as $option)
                                                        <div class="option-box-wrapper">
                                                            <input
                                                                id="q{{ $question->id }}_{{ $option->id }}"
                                                                type="radio"
                                                                name="{{ $question->id }}"
                                                                value="{{ $option->id }}"
                                                                class="option-radio section-select-trigger"
                                                                data-question="{{ $question->id }}"
                                                                onchange="handleSingleSelectChange({{ $question->id }}, {{ $option->id }})"
                                                            >
                                                            <label for="q{{ $question->id }}_{{ $option->id }}" class="option-box">{{ $option->option }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>

                                            @elseif($question->question_type == '1')
                                                {{-- Multi select --}}
                                                <div class="options-grid">
                                                    @foreach ($question->options as $option)
                                                        <div class="option-box-wrapper">
                                                            <input
                                                                id="q{{ $question->id }}_{{ $option->id }}"
                                                                type="checkbox"
                                                                name="{{ $question->id }}[]"
                                                                value="{{ $option->id }}"
                                                                class="option-checkbox section-select-trigger"
                                                                data-question="{{ $question->id }}"
                                                                onchange="handleSingleSelectChange({{ $question->id }}, {{ $option->id }})"
                                                            >
                                                            <label for="q{{ $question->id }}_{{ $option->id }}" class="option-box">{{ $option->option }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @elseif($question->question_type == '2')
                                                {{-- Text --}}
                                                <input type="text" class="form-control" name="{{ $question->id }}" placeholder="Type your answer..." autocomplete="off">
                                            @elseif($question->question_type == '3')
                                                {{-- Date --}}
                                                <input type="date" class="form-control w-50" name="{{ $question->id }}" max="{{ date('Y-m-d') }}">
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach

                            {{-- Multi-step Navigation --}}
                            <div class="formbold-form-btn-wrapper col-12 mt-4">
                                <div class="row w-100">
                                    <div class="col-4 d-flex">
                                        <button type="button" id="prev-btn" class="formbold-back-btn" style="display:none;">Back</button>
                                    </div>
                                    <div class="col-4 text-center"></div>
                                    <div class="col-4 d-flex justify-content-end">
                                        <button type="button" id="next-btn" class="formbold-btn float-right" {{ $totalSteps < 2 ? 'style=display:none;' : '' }}>Next Step</button>
                                        <button id="submit-btn" type="submit" class="formbold-btn ml-2" style="{{ $totalSteps > 1 ? 'display:none;' : '' }}">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end wrappers -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('custom-js')
<script>
    // Track hidden questions per question ID
    let hiddenQuestionsTracker = {};

    function handleSingleSelectChange(questionId, optionId) {
        // Check if this is a checkbox (multi-select) or radio (single-select)
        const isCheckbox = $('#q' + questionId + '_' + optionId).is(':checkbox');

        if (isCheckbox) {
            // For multi-select: restore all hidden questions first, then check all checked options
            if (hiddenQuestionsTracker[questionId]) {
                hiddenQuestionsTracker[questionId].forEach(function(hiddenQuestionId) {
                    $('#question-' + hiddenQuestionId).show();
                });
                hiddenQuestionsTracker[questionId] = [];
            }

            // Get all checked options for this question
            const checkedOptions = $('input[name="' + questionId + '[]"]:checked');
            if (checkedOptions.length > 0) {
                // Check dependencies for all checked options
                let allHiddenQuestions = [];
                let checkedCount = checkedOptions.length;
                let processedCount = 0;

                checkedOptions.each(function() {
                    const optId = $(this).val();
                    checkDependencyForOption(questionId, optId, function(hiddenQuestions) {
                        if (hiddenQuestions && hiddenQuestions.length > 0) {
                            allHiddenQuestions = allHiddenQuestions.concat(hiddenQuestions);
                        }
                        processedCount++;
                        if (processedCount === checkedCount) {
                            // All dependencies checked, now hide unique questions
                            const uniqueHiddenQuestions = [...new Set(allHiddenQuestions)];
                            uniqueHiddenQuestions.forEach(function(questionIdToHide) {
                                $('#question-' + questionIdToHide).hide();
                            });
                            hiddenQuestionsTracker[questionId] = uniqueHiddenQuestions;
                        }
                    });
                });
            }
        } else {
            // For single-select (radio): restore previous hidden questions first
            if (hiddenQuestionsTracker[questionId]) {
                hiddenQuestionsTracker[questionId].forEach(function(hiddenQuestionId) {
                    $('#question-' + hiddenQuestionId).show();
                });
                // Clear the tracker for this question
                delete hiddenQuestionsTracker[questionId];
            }

            // Check dependency for the selected option
            checkDependencyForOption(questionId, optionId, function(hiddenQuestions) {
                if (hiddenQuestions && hiddenQuestions.length > 0) {
                    hiddenQuestions.forEach(function(questionIdToHide) {
                        $('#question-' + questionIdToHide).hide();
                    });
                    hiddenQuestionsTracker[questionId] = hiddenQuestions;
                }
            });
        }
    }

    function checkDependencyForOption(questionId, optionId, callback) {
        $.ajax({
            url: '{{ route("question-dependency") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                question_id: questionId,
                option_id: optionId
            },
            success: function(response) {
                if (response.success && response.questions_in_range && response.questions_in_range.length > 0) {
                    callback(response.questions_in_range);
                } else {
                    callback([]);
                }
            },
            error: function(xhr) {
                console.error('Error checking dependency:', xhr);
                callback([]);
            }
        });
    }
</script>
<script>
    // Only audio recording functionality
    let mediaRecorder;
    let audioChunks = [];
    let audioBlob = null;

    $('#recordBtn').on('click', function () {
        navigator.mediaDevices.getUserMedia({ audio: true }).then(function (stream) {
            mediaRecorder = new MediaRecorder(stream);
            audioChunks = [];

            mediaRecorder.ondataavailable = function (event) {
                if (event.data.size > 0) {
                    audioChunks.push(event.data);
                }
            };

            mediaRecorder.onstop = function () {
                audioBlob = new Blob(audioChunks, { type: 'audio/webm' });
                const audioURL = URL.createObjectURL(audioBlob);
                $('#audioPlayer').attr('src', audioURL).show();

                uploadRecording(audioBlob);
            };

            mediaRecorder.start();
            $('#recordBtn').prop('disabled', true);
            $('#pauseBtn').prop('disabled', false);
            $('#stopBtn').prop('disabled', false);
        }).catch(function (err) {
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'error',
                    title: 'Microphone Access Denied',
                    text: err.message,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#d33'
                });
            } else {
                alert('Microphone access denied: ' + err.message);
            }
        });
    });

    $('#pauseBtn').on('click', function () {
        if (!mediaRecorder) return;
        if (mediaRecorder.state === 'recording') {
            mediaRecorder.pause();
            $(this).html('<i data-feather="play"></i>');
            if (typeof feather !== 'undefined') feather.replace();
        } else if (mediaRecorder.state === 'paused') {
            mediaRecorder.resume();
            $(this).html('<i data-feather="pause"></i>');
            if (typeof feather !== 'undefined') feather.replace();
        }
    });

    $('#stopBtn').on('click', function () {
        if (mediaRecorder && (mediaRecorder.state === 'recording' || mediaRecorder.state === 'paused')) {
            mediaRecorder.stop();
            $('#recordBtn').prop('disabled', false);
            $('#pauseBtn').prop('disabled', true).html('<i data-feather="pause"></i>');
            if (typeof feather !== 'undefined') feather.replace();
            $('#stopBtn').prop('disabled', true);
        }
    });

    function uploadRecording(blob) {
        let formData = new FormData();
        formData.append('voice_recording', blob, 'recording.webm');

        $.ajax({
            url: "{{ route('upload-voice') }}",
            type: 'POST',
            data: formData,
            headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
            contentType: false,
            processData: false,
            success: function (response) {
                console.log('Uploaded successfully:', response);
            },
            error: function (xhr) {
                console.error('Upload failed:', xhr.responseText);
            }
        });
    }

    // MULTISTEP FORM FUNCTIONALITY
    $(function(){
        let totalSteps = {{ $sections->count() }};
        let currentStep = 0;

        function showStep(index) {
            $('.section-block').hide();
            $('#section-block-' + index).show();

            $('.section-item').removeClass('active');
            $('.section-item[data-section="' + index + '"]').addClass('active');

            if(index == 0){
                $('#prev-btn').hide();
            } else {
                $('#prev-btn').show();
            }

            if(index >= totalSteps - 1){
                $('#next-btn').hide();
                $('#submit-btn').show();
            } else {
                $('#next-btn').show();
                $('#submit-btn').hide();
            }
        }

        showStep(currentStep);

        $('#next-btn').on('click', function(e){
            e.preventDefault();
            if(currentStep < totalSteps - 1) {
                currentStep++;
                showStep(currentStep);
            }
        });

        $('#prev-btn').on('click', function(e){
            e.preventDefault();
            if(currentStep > 0) {
                currentStep--;
                showStep(currentStep);
            }
        });
    });
</script>
@endsection
