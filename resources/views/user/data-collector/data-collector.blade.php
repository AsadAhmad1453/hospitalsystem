@extends('user.layouts.main')
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
                        <form action="{{ route('save-data-collector', $questions->first()->form_id) }}" method="POST">
                            @csrf
                            <div class="formbold-steps" >
                                <div class="d-flex align-items-center float-right mt-3 mb-2">
                                    <button id="recordBtn" type="button" class="btn btn-sm p-1 btn-danger "><i data-feather="mic"></i></button>
                                    <button id="pauseBtn" type="button" class="btn btn-sm p-1 btn-secondary ml-1" disabled><i data-feather="pause"></i></button>
                                    <button id="stopBtn" type="button" class="btn btn-sm p-1 btn-dark ml-1" disabled><i data-feather="square"></i></button>
                                    <audio id="audioPlayback" controls class="ml-3" style="display: none"></audio>
                                </div>
                                {{-- list all the sections --}}
                                <div class="sections-slider-wrapper">
                                    <ul class="">
                                        @foreach ($sections as $section)
                                            <li class="formbold-step-menu{{ $loop->index+1 }} section-item" data-section-id="{{ $section->id }}">
                                                <span>{{ $loop->index+1 }}</span>
                                                {{ $section->name }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                           
                            <input type="hidden" id="patient_id" name="patient_id" value="{{ $patientId }}">

                            @foreach ($sections as $section)
                            <div class="section-block" id="section-{{ $section->id }}" style="display: none;">
                                @foreach ($questions->where('section.id', $section->id) as $question)
                                    <div class="question-block mb-3" id="question-{{ $question->id }}">
                                        <div class="question-step">
                                            <div class=" ">
                                                <strong class="h4">{{ $question->question }}</strong>
                                                <span id="answer-warning-{{ $question->id }}" class="text-danger mt-2 d-block" style="display: none;"></span>
                                            </div>

                                            @if($question->question_type == '0' || $question->question_type == '1')
                                                <div class="options-grid">
                                                    @foreach ($question->options as $option)
                                                        @if($question->question_type == '0')
                                                            <div class="option-box-wrapper">
                                                                <input id="q{{ $question->id }}_{{ $option->id }}"
                                                                    type="radio"
                                                                    name="{{ $question->id }}"
                                                                    value="{{ $option->id }}"
                                                                    data-question-id="{{ $question->id }}"
                                                                    data-option-id="{{ $option->id }}"
                                                                    class="option-radio">
                                                                <label for="q{{ $question->id }}_{{ $option->id }}" class="option-box">{{ $option->option }}</label>
                                                            </div>
                                                        @elseif($question->question_type == '1')
                                                            <div class="option-box-wrapper">
                                                                <input id="q{{ $question->id }}_{{ $option->id }}"
                                                                    type="checkbox"
                                                                    name="{{ $question->id }}[]"
                                                                    value="{{ $option->id }}"
                                                                    data-question-id="{{ $question->id }}"
                                                                    data-option-id="{{ $option->id }}"
                                                                    class="option-checkbox">
                                                                <label for="q{{ $question->id }}_{{ $option->id }}" class="option-box">{{ $option->option }}</label>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @elseif($question->question_type == '2')
                                            <div class="d-flex justify-content-start ">
                                                <input type="text"
                                                    class="form-control"
                                                    name="{{ $question->id }}"
                                                    data-question-id="{{ $question->id }}"
                                                    placeholder="Type your answer...">
                                            </div>
                                            @elseif($question->question_type == '3')
                                            <div class="d-flex justify-content-start ">
                                                <input type="date"
                                                    class="w-50 form-control"
                                                    name="{{ $question->id }}"
                                                    data-question-id="{{ $question->id }}">
                                            </div>
                                            @endif

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @endforeach

                            {{-- @foreach ($questions as $index => $question)
                                <div class="question-block" id="question-{{ $index }}" style="{{ $index == 0 ? '' : 'display:none;' }}">
                                    <div class="question-step">
                                        <div class="my-3 text-center">
                                            <strong class="h2">{{ $question->question }}</strong>
                                        </div>
                                        @if($question->question_type == '0' || $question->question_type == '1')
                                        <div class="options-grid">
                                            @foreach ($question->options as $option)
                                                @if($question->question_type == '0')
                                                    <div class="option-box-wrapper">
                                                        <input id="q{{ $question->id }}_{{ $option->id }}" type="radio" name="{{ $question->id }}" value="{{ $option->id }}" data-option-id="{{ $option->id }}" class="option-radio">
                                                        <label for="q{{ $question->id }}_{{ $option->id }}" class="option-box">{{ $option->option }}</label>
                                                    </div>
                                                @elseif($question->question_type == '1')
                                                    <div class="option-box-wrapper">
                                                        <input id="q{{ $question->id }}_{{ $option->id }}" type="checkbox" name="{{ $question->id }}[]" value="{{ $option->id }}" data-option-id="{{ $option->id }}" class="option-checkbox">
                                                        <label for="q{{ $question->id }}_{{ $option->id }}" class="option-box">{{ $option->option }}</label>
                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>
                                        <span id="answer-warning{{ $question->id }}" class="d-block  text-danger my-2"></span>

                                        @elseif($question->question_type == '2')
                                        <div class="d-flex justify-content-center">
                                            <input type="text" class="w-50 form-control" name="{{ $question->id }}" placeholder="Type your answer...">
                                        </div>
                                        @elseif($question->question_type == '3')
                                        <div class="d-flex justify-content-center">
                                            <input type="date" class="w-50 form-control" name="{{ $question->id }}">
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach --}}

                            <div class="formbold-form-btn-wrapper col-12 ">
                                <div class="col-2 d-flex justify-content-between    ">
                                    <button id="prev-btn" class=" formbold-back-btn">
                                        Back
                                    </button>
                                </div>
                                <div class="col-7"></div>
                                <div class="col-3  d-flex justify-content-end">
                                    <button id="next-btn" class="formbold-btn float-right mr-0">
                                        Next Step
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_1675_1807)">
                                        <path d="M10.7814 7.33312L7.20541 3.75712L8.14808 2.81445L13.3334 7.99979L8.14808 13.1851L7.20541 12.2425L10.7814 8.66645H2.66675V7.33312H10.7814Z" fill="white"/>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_1675_1807">
                                        <rect width="16" height="16" fill="white"/>
                                        </clipPath>
                                        </defs>
                                        </svg>
                                    </button>
                                    <button id="submit-btn" class="formbold-btn">
                                        Submit
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_1675_1807)">
                                        <path d="M10.7814 7.33312L7.20541 3.75712L8.14808 2.81445L13.3334 7.99979L8.14808 13.1851L7.20541 12.2425L10.7814 8.66645H2.66675V7.33312H10.7814Z" fill="white"/>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_1675_1807">
                                        <rect width="16" height="16" fill="white"/>
                                        </clipPath>
                                        </defs>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@section('custom-js')

<script>
    $(document).ready(function () {

    
       
    });
    </script>
    
<script>
$(document).ready(function () {
    var sections = @json($sections);
    var questions = @json($questions);
    var dependencies = @json($dependencies);

    let currentSectionIndex = 0;
    let skippedQuestions = {};
    let selectedAnswers = {};
    let activeDependencies = {}; // keeps track of trigger-question and selected option
    let mediaRecorder;
    let audioChunks = [];
    let audioBlob = null;

    showSection(currentSectionIndex);

    function showSection(idx) {
        $('.section-block').hide();
        let $section = $('#section-' + sections[idx].id);
        $section.show();

        $section.find('.question-block').each(function () {
            let qid = $(this).attr('id').replace('question-', '');
            let $block = $(this);

            if (skippedQuestions[qid]) {
                $block.hide().find('input,select,textarea').prop('disabled', true);
            } else {
                $block.show().find('input,select,textarea').prop('disabled', false);

                let q = questions.find(q => q.id == qid);
                if (q && selectedAnswers[qid] !== undefined) {
                    if (q.question_type == 0) {
                        $('input.option-radio[data-question-id="' + qid + '"][data-option-id="' + selectedAnswers[qid] + '"]').prop('checked', true);
                    } else if (q.question_type == 1) {
                        selectedAnswers[qid].forEach(optid => {
                            $('input.option-checkbox[data-question-id="' + qid + '"][data-option-id="' + optid + '"]').prop('checked', true);
                        });
                    } else if (q.question_type == 2 || q.question_type == 3) {
                        $block.find('input, textarea').val(selectedAnswers[qid]);
                    }
                }
            }
        });

        // Reapply dependency logic for all tracked dependencies
        Object.keys(activeDependencies).forEach(triggerQid => {
            applyDependencies(triggerQid, activeDependencies[triggerQid], true); // silent = true
        });

        $('.section-item').removeClass('active');
        $('.section-item[data-section-id="' + sections[idx].id + '"]').addClass('active');

        $('#prev-btn').toggle(idx > 0);
        $('#next-btn').toggle(idx < sections.length - 1);
        $('#submit-btn').toggle(idx === sections.length - 1);
    }

    function markQuestionSkipped(qid) {
        skippedQuestions[qid] = true;
        $('#question-' + qid).hide().find('input,select,textarea').prop('disabled', true);
        delete selectedAnswers[qid];
    }

    function unskipQuestion(qid) {
        skippedQuestions[qid] = false;
        $('#question-' + qid).show().find('input,select,textarea').prop('disabled', false);
    }

    function validateCurrentSection() {
        let valid = true;
        $('#section-' + sections[currentSectionIndex].id + ' .question-block:visible').each(function () {
            let qid = $(this).attr('id').replace('question-', '');
            let q = questions.find(q => q.id == qid);
            let answered = false;

            if (q.question_type == 0) {
                answered = $(this).find('input[type="radio"]:checked').length > 0;
            } else if (q.question_type == 1) {
                answered = $(this).find('input[type="checkbox"]:checked').length > 0;
            } else {
                answered = $(this).find('input, textarea').val().trim() !== '';
            }

            if (!answered) {
                valid = false;
                $('#answer-warning-' + qid).text('Please answer this question!').show();
            } else {
                $('#answer-warning-' + qid).hide();
            }
        });
        return valid;
    }

    $('#next-btn').click(function (e) {
        e.preventDefault();
        if (validateCurrentSection()) {
            currentSectionIndex++;
            showSection(currentSectionIndex);
        }
    });

    $('#prev-btn').click(function (e) {
        e.preventDefault();
        currentSectionIndex--;
        showSection(currentSectionIndex);
    });

    $('#submit-btn').click(function (e) {
        if (!validateCurrentSection()) {
            e.preventDefault();
            return;
        }

        // Disable all skipped questions before submission
        $('.question-block').each(function () {
            let qid = $(this).attr('id').replace('question-', '');
            if (skippedQuestions[qid]) {
                $(this).find('input,select,textarea').prop('disabled', true);
            } else {
                $(this).find('input,select,textarea').prop('disabled', false);
            }
        });
    });

    $(document).on('change keyup', 'input, select, textarea', function () {
        let qid = $(this).data('question-id');
        if (!qid) return;

        let q = questions.find(q => q.id == qid);
        $('#answer-warning-' + qid).hide();

        if (q.question_type == 0) {
            selectedAnswers[qid] = $(this).data('option-id');
        } else if (q.question_type == 1) {
            selectedAnswers[qid] = $('input[data-question-id="' + qid + '"]:checked').map(function () {
                return $(this).data('option-id');
            }).get();
        } else {
            selectedAnswers[qid] = $(this).val();
        }
    });

    $(document).on('change', '.option-radio', function () {
        let qid = $(this).data('question-id');
        let optid = $(this).data('option-id');

        $('input[name="' + qid + '"]').each(function () {
            $(this).prev('i').attr('data-feather', 'circle');
        });

        // Set selected option's icon to 'check-circle'
        $(this).prev('i').attr('data-feather', 'check-circle');

        // Re-render feather icons
        if (typeof feather !== 'undefined') {
            feather.replace({
                width: 14,
                height: 14
            });
        }

        selectedAnswers[qid] = optid;
        activeDependencies[qid] = optid;

        applyDependencies(qid, optid);
    });

    function applyDependencies(triggerQid, selectedOptionId, silent = false) {
        let deps = dependencies.filter(dep => dep.question_id == triggerQid && dep.option_id == selectedOptionId);

        // Always keep the trigger question visible
        unskipQuestion(triggerQid);

        if (deps.length === 0) {
            if (!silent) {
                questions.forEach(q => unskipQuestion(q.id));
                showSection(currentSectionIndex);
            }
            return;
        }

        // Clear previous skips
        questions.forEach(q => {
            unskipQuestion(q.id);
        });

        // For each dependency, skip all questions between trigger and dependent question
        for (const dep of deps) {
            const triggerIndex = questions.findIndex(q => q.id == triggerQid);
            const targetIndex = questions.findIndex(q => q.id == dep.dependent_question_id);

            // Skip all questions between trigger and target (excluding both trigger and target)
            for (let i = triggerIndex + 1; i < targetIndex; i++) {
                const betweenQid = questions[i].id;
                markQuestionSkipped(betweenQid);
            }

            // Ensure dependent question is visible
            unskipQuestion(dep.dependent_question_id);
        }

        // Jump to the section containing the dependent question (if not silent)
        if (!silent) {
            let targetSectionIndex = currentSectionIndex;
            deps.forEach(dep => {
                let targetQ = questions.find(q => q.id == dep.dependent_question_id);
                if (targetQ) {
                    let idx = sections.findIndex(s => s.id == targetQ.section.id);
                    if (idx !== -1) {
                        targetSectionIndex = idx;
                    }
                }
            });

            currentSectionIndex = targetSectionIndex;
            showSection(currentSectionIndex);
        }
    }

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
    
                    // Optional: Upload the audioBlob
                    uploadRecording(audioBlob);
                };
    
                mediaRecorder.start();
                $('#recordBtn').prop('disabled', true);
                $('#pauseBtn').prop('disabled', false);
                $('#stopBtn').prop('disabled', false);
            }).catch(function (err) {
                alert('Microphone access denied: ' + err.message);
            });
        });
    
        $('#pauseBtn').on('click', function () {
            if (!mediaRecorder) return;
    
            if (mediaRecorder.state === 'recording') {
                mediaRecorder.pause();
                $(this).html('<i data-feather="play"></i>');
                feather.replace();
            } else if (mediaRecorder.state === 'paused') {
                mediaRecorder.resume();
                $(this).html('<i data-feather="pause"></i>');
                feather.replace();
            }
        });
    
        $('#stopBtn').on('click', function () {
            if (mediaRecorder && (mediaRecorder.state === 'recording' || mediaRecorder.state === 'paused')) {
                mediaRecorder.stop();
                $('#recordBtn').prop('disabled', false);
                $('#pauseBtn').prop('disabled', true).html('<i data-feather="pause"></i>');
                feather.replace(); 
                $('#stopBtn').prop('disabled', true);
            }
        });
    
        // Optional: AJAX upload to Laravel
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
});
</script>
@endsection
