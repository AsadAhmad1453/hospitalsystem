@extends('website.layouts.data-collector-layout')
@section('custom-css')
<link rel="stylesheet" href="{{ asset('admin-assets/css/custom-css.css') }}">
<style>
    :root {
        --dc-primary: #0d7a65;
        --dc-primary-dark: #064337;
        --dc-accent: #14c8a1;
        --dc-muted: #7c8c84;
        --dc-panel: #f8fcfa;
        --dc-border: #dfeee8;
    }

    .dc-section {
        background: #f3f9f6;
    }

    .dc-shell {
        border-radius: 32px;
        background: #fff;
        padding: 2.5rem;
        box-shadow: 0 40px 70px rgba(6, 41, 33, 0.15);
        position: relative;
        overflow: hidden;
    }

    .dc-head {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
        border-bottom: 1px solid var(--dc-border);
        padding-bottom: 1.2rem;
        margin-bottom: 2rem;
    }

    .dc-head h4 {
        margin: 0;
        font-weight: 700;
        color: var(--dc-primary-dark);
    }

    .dc-step-pill {
        background: var(--dc-panel);
        border-radius: 999px;
        padding: .65rem 1.5rem;
        font-weight: 600;
        color: var(--dc-primary-dark);
        border: 1px solid var(--dc-border);
    }

    .dc-section-panel {
        display: none;
        animation: fadeIn .35s ease;
    }

    .dc-question {
        background: var(--dc-panel);
        border-radius: 22px;
        padding: 1.5rem;
        border: 1px solid transparent;
        transition: border-color .25s ease;
    }

    .dc-question + .dc-question {
        margin-top: 1.5rem;
    }

    .dc-question-title {
        font-weight: 600;
        color: var(--dc-primary-dark);
    }

    .dc-question.required .dc-question-title::after {
        content: '*';
        color: #dc3545;
        margin-left: .35rem;
    }

    .dc-option-input {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }

    .dc-option-tile {
        border-radius: 18px;
        border: 1px solid var(--dc-border);
        background: #fff;
        padding: 1.15rem;
        min-height: 110px;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-direction: column;
        font-weight: 600;
        color: var(--dc-primary-dark);
        box-shadow: 0 12px 25px rgba(7, 64, 51, 0.08);
        transition: transform .2s ease, border-color .2s ease, box-shadow .2s ease, background .2s ease;
        cursor: pointer;
    }

    .dc-option-tile span {
        font-size: 1rem;
    }

    .dc-option-input:checked + .dc-option-tile {
        border-color: var(--dc-primary);
        box-shadow: 0 18px 40px rgba(6, 61, 47, 0.2);
        background: linear-gradient(140deg, rgba(13,122,101,0.08), rgba(6,67,55,0.08));
    }

    .dc-line-input {
        border-radius: 14px;
        border: 1px solid var(--dc-border);
        padding: .85rem 1rem;
        font-weight: 500;
        color: var(--dc-primary-dark);
        background: #fff;
        transition: border-color .2s, box-shadow .2s;
    }

    .dc-line-input:focus {
        border-color: var(--dc-primary);
        box-shadow: 0 0 0 3px rgba(13, 122, 101, 0.12);
    }

    .dc-date-input {
        max-width: 320px;
    }

    .dc-nav {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
        margin-top: 2.5rem;
    }

    .dc-btn {
        border: none;
        border-radius: 14px;
        padding: .95rem 2.4rem;
        font-weight: 600;
        transition: transform .2s ease, box-shadow .2s ease;
    }

    .dc-btn:disabled {
        opacity: .6;
        pointer-events: none;
    }

    .dc-btn-primary {
        background: linear-gradient(135deg, var(--dc-primary), var(--dc-primary-dark));
        color: #fff;
        box-shadow: 0 20px 35px rgba(6, 65, 51, 0.25);
    }

    .dc-btn-outline {
        background: #fff;
        color: var(--dc-primary-dark);
        border: 1px solid var(--dc-border);
    }

    .dc-btn:hover {
        transform: translateY(-1px);
    }

    .dc-recorder {
        position: fixed;
        bottom: 24px;
        left: 24px;
        z-index: 55;
        background: #fff;
        border-radius: 20px;
        padding: 1rem;
        box-shadow: 0 20px 40px rgba(6, 41, 33, 0.25);
        display: flex;
        align-items: center;
        gap: .6rem;
    }

    .dc-recorder audio {
        min-width: 140px;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(12px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 991px) {
        .dc-shell {
            padding: 1.8rem;
        }
    }

    @media (max-width: 575px) {
        .dc-shell {
            border-radius: 22px;
            padding: 1.4rem;
        }

        .dc-date-input {
            max-width: 100%;
        }

        .dc-recorder {
            left: 16px;
            right: 16px;
            bottom: 16px;
            flex-wrap: wrap;
            justify-content: center;
        }
    }
</style>
@endsection

@section('content')
<section id="multiple-column-form" class="dc-section py-3 py-md-5">
    <div class="row justify-content-center">
        <div class="col-12 col-xl-10">
            <div class="dc-shell">
                <form action="{{ route('save-open-data-collector', $questions->first()->form_id) }}" method="POST">
                    @csrf
                    <input type="hidden" id="patient_id" name="patient_id" value="{{ $patient_id }}">
                    @php
                        $totalSteps = $sections->count();
                    @endphp
                    <div class="dc-head">
                        <div>
                            <p class="text-uppercase text-muted small mb-1">Currently capturing</p>
                            <h4 id="active-section-name">{{ $sections->first()->name ?? 'Section' }}</h4>
                        </div>
                        <div class="dc-step-pill">
                            Step <span id="current-step-label">1</span> / {{ $totalSteps }}
                        </div>
                    </div>

                    @foreach ($sections as $index => $section)
                        <div class="dc-section-panel" id="section-block-{{ $index }}" data-section-name="{{ $section->name }}" style="{{ $index === 0 ? '' : 'display:none;' }}">
                            <div class="question-stack">
                                @foreach ($questions->where('section.id', $section->id) as $question)
                                    <div class="dc-question {{ $question->priority == 1 ? 'required' : '' }}" id="question-{{ $question->id }}">
                                        <div class="d-flex justify-content-between flex-wrap gap-2 mb-3">
                                            <p class="mb-0 dc-question-title">{{ $question->question }}</p>
                                            <span class="badge badge-light text-uppercase">{{ $question->question_type == '0' ? 'Single' : ($question->question_type == '1' ? 'Multi' : 'Input') }}</span>
                                        </div>
                                        @if($question->question_type == '0')
                                            <div class="row g-3">
                                                @foreach ($question->options as $option)
                                                    <div class="col-12 col-md-6">
                                                        <div class="position-relative">
                                                            <input
                                                                id="q{{ $question->id }}_{{ $option->id }}"
                                                                type="radio"
                                                                name="{{ $question->id }}"
                                                                value="{{ $option->id }}"
                                                                class="dc-option-input option-radio section-select-trigger"
                                                                data-question="{{ $question->id }}"
                                                                onchange="handleSingleSelectChange({{ $question->id }}, {{ $option->id }})"
                                                            >
                                                            <label for="q{{ $question->id }}_{{ $option->id }}" class="dc-option-tile">
                                                                <span>{{ $option->option }}</span>
                                                                <small class="text-muted">Tap to select</small>
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @elseif($question->question_type == '1')
                                            <div class="row g-3">
                                                @foreach ($question->options as $option)
                                                    <div class="col-12 col-md-6">
                                                        <div class="position-relative">
                                                            <input
                                                                id="q{{ $question->id }}_{{ $option->id }}"
                                                                type="checkbox"
                                                                name="{{ $question->id }}[]"
                                                                value="{{ $option->id }}"
                                                                class="dc-option-input option-checkbox section-select-trigger"
                                                                data-question="{{ $question->id }}"
                                                                onchange="handleSingleSelectChange({{ $question->id }}, {{ $option->id }})"
                                                            >
                                                            <label for="q{{ $question->id }}_{{ $option->id }}" class="dc-option-tile">
                                                                <span>{{ $option->option }}</span>
                                                                <small class="text-muted">Select all that apply</small>
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @elseif($question->question_type == '2')
                                            <input type="text" class="form-control dc-line-input" name="{{ $question->id }}" placeholder="Type your answer..." autocomplete="off">
                                        @elseif($question->question_type == '3')
                                            <input type="date" class="form-control dc-line-input " name="{{ $question->id }}" max="{{ date('Y-m-d') }}">
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                    <div class="dc-nav">
                        <button type="button" id="prev-btn" class="dc-btn dc-btn-outline" style="display:none;">Previous</button>
                        <div class="ml-auto d-flex gap-2">
                            <button type="button" id="next-btn" class="dc-btn dc-btn-primary" style="{{ $totalSteps < 2 ? 'display:none;' : '' }}">Next section</button>
                            <button id="submit-btn" type="submit" class="dc-btn dc-btn-primary" style="{{ $totalSteps > 1 ? 'display:none;' : '' }}">Submit responses</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<div class="dc-recorder">
    <button id="recordBtn" type="button" class="btn btn-danger btn-sm rounded-pill px-3"><i data-feather="mic"></i></button>
    <button id="pauseBtn" type="button" class="btn btn-secondary btn-sm rounded-pill px-3" disabled><i data-feather="pause"></i></button>
    <button id="stopBtn" type="button" class="btn btn-dark btn-sm rounded-pill px-3" disabled><i data-feather="square"></i></button>
    <audio id="audioPlayer" controls style="display: none"></audio>
</div>
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
        const $activeSectionName = $('#active-section-name');
        const $currentStepLabel = $('#current-step-label');

        function updateSectionMeta(index) {
            const currentPanel = $('#section-block-' + index);
            $activeSectionName.text(currentPanel.data('section-name'));
            $currentStepLabel.text(index + 1);
        }

        function showStep(index) {
            $('.dc-section-panel').hide();
            $('#section-block-' + index).show();
            updateSectionMeta(index);

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
